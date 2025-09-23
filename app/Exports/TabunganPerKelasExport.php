<?php

namespace App\Exports;

use App\Models\Tabungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TabunganPerKelasExport implements FromCollection, WithStyles, WithEvents, WithColumnFormatting, ShouldAutoSize
{
    protected $kelasId;

    public function __construct($kelasId)
    {
        $this->kelasId = $kelasId;
    }

    public function collection()
    {
        $tabunganKelas = Tabungan::with('siswa.kelas.guru')
            ->whereHas('siswa', function ($query) {
                $query->where('kelas_id', $this->kelasId);
            })
            ->get();

        $tabunganPerSiswa = $tabunganKelas->groupBy('siswa_id');
        $data = collect();

        // Ambil info kelas
        $kelas = $tabunganKelas->first()?->siswa?->kelas;
        $namaKelas = $kelas ? ($kelas->tingkat . ' ' . $kelas->nama_kelas) : '-';
        $guru = $kelas?->guru?->name ?? '-';
        $jumlahTransaksi = $tabunganKelas->count();
        // Ambil jumlah siswa
        $jumlahSiswa = $tabunganKelas->pluck('siswa_id')->unique()->count();


        // Header informasi
        $data->push(['LAPORAN TABUNGAN SISWA']);
        $data->push(['Kelas', $namaKelas]);
        $data->push(['Wali Kelas', $guru]);
        $data->push(['Jumlah Siswa', $jumlahSiswa]);
        $data->push(['Jumlah Transaksi', $jumlahTransaksi]);
        $data->push([]); // Baris kosong

        // Heading utama
        $data->push(['Nama Siswa', 'Jenis Transaksi', 'Jumlah', 'Tanggal Transaksi']);

        $totalSaldoBersih = 0;

        foreach ($tabunganPerSiswa as $siswaId => $transaksis) {
            $namaSiswa = $transaksis->first()->siswa->name;

            $totalSetoran = $transaksis->where('jenis_penarikan', 'setoran')->sum('jumlah');
            $totalPenarikan = $transaksis->where('jenis_penarikan', 'penarikan')->sum('jumlah');
            $saldoBersih = $totalSetoran - $totalPenarikan;

            $totalSaldoBersih += $saldoBersih;

            foreach ($transaksis as $transaksi) {
                $data->push([
                    $namaSiswa,
                    ucfirst($transaksi->jenis_penarikan),
                    $transaksi->jumlah,
                    $transaksi->created_at->format('d-m-Y H:i'),
                ]);
            }

            // Tambahkan subtotal per siswa
            $data->push([
                'Subtotal ' . $namaSiswa,
                '',
                $saldoBersih,
                ''
            ]);
        }

        $rataRata = $jumlahTransaksi > 0 ? $totalSaldoBersih / $jumlahTransaksi : 0;

        // Tambahkan baris total
        $data->push(['TOTAL TABUNGAN', '', $totalSaldoBersih, '']);

        // Tambahkan baris rata-rata
        $data->push(['RATA-RATA TABUNGAN', '', round($rataRata), '']);

        return $data;
    }

    public function styles(Worksheet $sheet)
    {
        // Font default dan font family
        $sheet->getParent()->getDefaultStyle()->getFont()->setName('Calibri')->setSize(11);

        // Merge dan style judul laporan
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 18,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2E7D32'], // hijau emerald
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Style untuk info tambahan (Kelas, Wali Kelas, Jumlah Transaksi)
        $sheet->getStyle('A2:B4')->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);
        // Tambahkan border bawah untuk pisahkan info tambahan
        $sheet->getStyle('A4:B4')->getBorders()->getBottom()->setBorderStyle(Border::BORDER_MEDIUM);

        // Style header utama tabel
        $sheet->getStyle('A6:D6')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '388E3C'], // hijau lebih gelap untuk header tabel
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);


        $lastRow = $sheet->getHighestRow();

        // Style data transaksi
        $sheet->getStyle("A7:D{$lastRow}")->applyFromArray([
            'font' => ['size' => 11],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'CCCCCC'],
                ],
            ],
        ]);

        // Highlight baris subtotal siswa dengan warna latar biru muda dan font tebal
        foreach (range(7, $lastRow) as $row) {
            $cellValue = $sheet->getCell("A{$row}")->getValue();
            if (strpos($cellValue, 'Subtotal') !== false) {
                $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'C8E6C9'], // hijau muda lembut
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '388E3C'],
                        ],
                        'bottom' => [
                            'borderStyle' => Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '388E3C'],
                        ],
                    ],
                ]);
            }
        }

        // Style baris TOTAL dan RATA-RATA (2 baris terakhir)
        $sheet->getStyle("A" . ($lastRow - 1) . ":D{$lastRow}")->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1B5E20'], // hijau tua solid
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Format angka kolom jumlah dengan format mata uang Rp
        $sheet->getStyle("C7:C{$lastRow}")->getNumberFormat()->setFormatCode('"Rp" #,##0');

        // Format tanggal kolom D dengan format dd MMM yyyy HH:mm (contoh: 08 Jun 2025 14:30)
        $sheet->getStyle("D7:D{$lastRow}")->getNumberFormat()->setFormatCode('dd MMM yyyy HH:mm');

        // Set lebar kolom khusus jika ingin override auto size
        // Contoh: nama siswa dan jenis transaksi lebih lebar
        $sheet->getColumnDimension('A')->setWidth(30);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(20);

        return [];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Set tinggi baris untuk judul
                $sheet->getRowDimension(1)->setRowHeight(25);

                // Set tinggi baris untuk header
                $sheet->getRowDimension(6)->setRowHeight(20);

                // Set alignment untuk judul
                $sheet->getStyle('A1')->getAlignment()->setWrapText(true);

                // Freeze pane pada header
                $sheet->freezePane('A7');
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => '"Rp" #,##0',
        ];
    }
}
