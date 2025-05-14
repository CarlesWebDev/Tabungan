<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use App\Models\notikasi;
use Illuminate\Http\Request;

class NotikasiController extends Controller
{


    public function notifikasi()
    {
        // Ambil siswa yang sedang logi
        $unread = Notikasi::where('siswa_id', auth('siswa')->id())
            ->where('status', 'unread')
            ->count();

        $siswas = Siswa::with('kelas')->get();
        $notifikasis = notikasi::with(['guru', 'siswa', 'kelas'])->get();
        return view('Teacher.notifikasi', compact('notifikasis', 'siswas', 'unread'));
    }



    public function markAsRead($id)
    {
        $notikasi = notikasi::find($id);


        if ($notikasi) {
            $notikasi->read_at = now();
            $notikasi->status = 'read';
            $notikasi->save();

            return redirect()->route('Student.notifikasi')->with('success', 'Notifikasi berhasil di baca.');
        }

        return redirect()->route('Student.notifikasi')->with('error', 'Notifikasi tidak ditemukan.');
    }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $siswas = Siswa::all();
        return view('Teacher.tambahnotifikasi', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // //Ini satu pilih
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'siswa_id' => 'required|exists:siswas,id',
    //         'notikasi' => 'required|string|max:255',
    //     ]);

    //     $guru = Auth::guard('guru')->user();

    //     Notikasi::create([
    //         'siswa_id' => $request->siswa_id,
    //         'notikasi' => $request->notikasi,
    //         'guru_id' => $guru->id,
    //         'kelas_id' => Siswa::find($request->siswa_id)?->kelas_id,
    //         'status' => 'unread',
    //     ]);

    //     return redirect()->route('Teacher.createNotifikasi')->with('success', 'Notifikasi berhasil dikirim!');
    // }

    // Ini banyak pilih multi select
    public function store(Request $request)
{
    $request->validate([
        'siswa_id' => 'required|array',
        'siswa_id.*' => 'exists:siswas,id',// di sini kita tambahkan data ke array agar bisa ambil banyak yah
        'notikasi' => 'required|string|max:255',
    ]);

    $guru = Auth::guard('guru')->user();

    foreach ($request->siswa_id as $id) {
        $siswa = Siswa::find($id);
        if ($siswa) {
            Notikasi::create([
                'siswa_id' => $siswa->id,
                'notikasi' => $request->notikasi,
                'guru_id' => $guru->id,
                'kelas_id' => $siswa->kelas_id,
                'status' => 'unread',
            ]);
        }
    }

    return redirect()->route('Teacher.createNotifikasi')->with('success', 'Notifikasi berhasil dikirim!');
}


    /**
     * Display the specified resource.
     */
    public function show(notikasi $notikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notikasi $notikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, notikasi $notikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $notikasi = Notikasi::find($request->id);

        if (!$notikasi) {
            return back()->with('error', 'Notifikasi tidak ditemukan.');
        }

        $notikasi->delete();
        return redirect()->route('Teacher.createNotifikasi')->with('success', 'Notifikasi berhasil dihapus!');
    }
}
