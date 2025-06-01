<?php
namespace App\Exports;
use App\Models\Tabungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TabunganPerKelasExport implements FromCollection, WithHeadings, WithStyles, WithEvents, WithColumnFormatting, ShouldAutoSize
{
    protected $kelasId;

    public function __construct($kelasId)
    {
        $this->kelasId = $kelasId;
    }

    public function collection()
    {
        $tabunganKelas = Tabungan::with('siswa')
            ->whereHas('siswa', function ($query) {
                $query->where('kelas_id', $this->kelasId);
            })
            ->get();

        $tabunganPerSiswa = $tabunganKelas->groupBy('siswa_id');

        $data = collect();
        $totalSaldoBersih = 0;

        foreach ($tabunganPerSiswa as $siswaId => $transaksis) {
            $namaSiswa = $transaksis->first()->siswa->name;

            $totalSetoran = $transaksis->where('jenis_penarikan', 'setoran')->sum('jumlah');
            $totalPenarikan = $transaksis->where('jenis_penarikan', 'penarikan')->sum('jumlah');
            $saldoBersih = $totalSetoran - $totalPenarikan;

            $totalSaldoBersih += $saldoBersih;

            foreach ($transaksis as $transaksi) {
                $data->push([
                    'Nama Siswa' => $namaSiswa,
                    'Jenis' => $transaksi->jenis_penarikan,
                    'Jumlah' => $transaksi->jumlah,
                    'Tanggal' => $transaksi->created_at->format('Y-m-d'),
                ]);
            }
        }

        $jumlahTransaksi = $tabunganKelas->count();
        $rataRata = $jumlahTransaksi > 0 ? $totalSaldoBersih / $jumlahTransaksi : 0;

        $data->push([
            'Nama Siswa' => 'TOTAL',
            'Jenis' => '',
            'Jumlah' => $totalSaldoBersih,
            'Tanggal' => '',
        ]);

        $data->push([
            'Nama Siswa' => 'RATA-RATA TABUNGAN',
            'Jenis' => '',
            'Jumlah' => round($rataRata),
            'Tanggal' => '',
        ]);

        return $data;
    }





    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Jenis',
            'Jumlah',
            'Tanggal',
        ];
    }

    // Styling header dan baris total
    public function styles(Worksheet $sheet)
    {
        // Header bold dan background abu muda
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => 'D3D3D3'],
            ],
        ]);

        // Baris total (terakhir) bold dan background kuning muda
        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle("A{$lastRow}:D{$lastRow}")->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => 'FFFACD'], // LightYellow
            ],
            'borders' => [
                'top' => ['borderStyle' => 'thick', 'color' => ['rgb' => '000000']],
            ],
        ]);

        return [];
    }

    // Event untuk border semua data
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $lastRow = $sheet->getHighestRow();
                $lastColumn = $sheet->getHighestColumn();

                // Border seluruh tabel
                $sheet->getStyle("A1:{$lastColumn}{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }

    // Format kolom Jumlah sebagai mata uang Rp
    public function columnFormats(): array
    {
        return [
            'C' => '"Rp" #,##0', // format angka dengan prefix Rp di depan tanpa desimal
        ];
    }
}
