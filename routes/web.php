<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\NotikasiController;
use App\Http\Controllers\SiswaController;
use App\Exports\TabunganPerKelasExport;
use Maatwebsite\Excel\Facades\Excel;


// ==============================
// Landing Page
// ==============================
Route::view('/', 'LandingPage');
Route::view('/LandingPage', 'LandingPage')->name('landingpage');


// ==============================
// Ngide
// ==============================
Route::get('/login', function () {
    return redirect(to: '/Login/Admin');
})->name('login');

Route::get('/login', function () {
    return redirect(to: 'LoginSiswa');
})->name('login');

Route::get('/login', function () {
    return redirect(to: 'LoginGuru');
})->name('login');


// =============================
// Register
// =============================
Route::get('/register/guru', [GuruController::class, 'showregisterformGuru'])->name('register.guru.form');
Route::post('/register/guru', [GuruController::class, 'registerGuru'])->name('register.guru');



// ==============================
// Export Excel
// ==============================
Route::get('/admin/export-tabungan-kelas/{kelasId}', function ($kelasId) {
    return Excel::download(new TabunganPerKelasExport($kelasId), 'tabungan_kelas_' . $kelasId . '.xlsx');
})->name('export.tabungan.kelas');



// ==============================
// Login Routes
// ==============================
// Route untuk login admin
Route::get('/Login/Admin', [AdminController::class, 'showLoginForm'])->name('login.admin.form');
Route::post('/Login/Admin', [AdminController::class, 'login'])->name('login.admin');


// Route untuk login guru
Route::get('/LoginGuru', [GuruController::class, 'showLoginFormGuru'])->name(name: 'login.guru.form');
Route::post('/LoginGuru', [GuruController::class, 'loginGuru'])->name('login.guru');

// Route untuk login siswa
Route::get('/LoginSiswa', [SiswaController::class, 'showLoginFormSiswa'])->name('login.siswa.form');
Route::post('/LoginSiswa', [SiswaController::class, 'loginSiswa'])->name('login.siswa');

// ==============================
// Admin Routes (Protected by auth)
// ==============================
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'logoutAdmin'])->name('logout');


    //  Crud Guru
    Route::get('/tambahguru', [AdminController::class, 'createguru'])->name('tambahguru');
    Route::post('/storeguru', [AdminController::class, 'storeguru'])->name('storeguru');
    Route::get('/guru/{id}/edit', [AdminController::class, 'editguru'])->name('editguru');
    Route::put('/guru/{id}/update', [AdminController::class, 'updateguru'])->name('updateguru');
    Route::delete('/guru/{id}/hapus', [AdminController::class, 'hapusguru'])->name('hapusguru');


    // notifikasi
    Route::get('/notifikasi', [AdminController::class, 'notifikasi'])->name('notifikasi');

    // Cari Kelas DI management
    Route::get('/admin/cariKelas', [AdminController::class, 'Kelas'])->name('cariKelas');


    Route::get('/Kelas', [AdminController::class, 'Kelas'])->name('Kelas');
    // User
    Route::get('/Users', [AdminController::class, 'Users'])->name('Users');

    // Management Kelas
    Route::get('/ManagementKelas', [AdminController::class, 'Kelas'])->name('admin.managementkelas');

    // Laporan Tabungan
    Route::get('/LaporanTabungan', [AdminController::class, 'LaporanTabungan'])->name('laporantabungan');

    // Verivikasi Akun
    Route::get('/verifikasiakun', [AdminController::class, 'verifikasiakun'])->name('verifikasiakun');
    Route::post('/verifikasiakun', [AdminController::class, 'verifikasiakun'])->name('admin.verifikasiakun');

    Route::get('/approve-guru/{guru}', [AdminController::class, 'approveGuru'])->name('approve.guru');
    Route::get('/reject-guru/{guru}', [AdminController::class, 'rejecteGuru'])->name('rejecte.guru');

    Route::post('/approve-guru/{guru}', [AdminController::class, 'approveGuru'])->name('admin.approve.guru');
    Route::post('/reject-guru/{guru}', [AdminController::class, 'rejectGuru'])->name('admin.reject.guru');



    // Crud Kelas
    Route::get('/tambahkelas', [AdminController::class, 'createKelas'])->name('tambahkelas');
    Route::post('/storekelas', [AdminController::class, 'storeKelas'])->name('storekelas');
    Route::get('/kelas/{id}/edit', [AdminController::class, 'editKelas'])->name('editKelas');
    Route::put('/kelas/{id}/update', [AdminController::class, 'updateKelas'])->name('updateKelas');
    Route::delete('/kelas/{id}/hapus', [AdminController::class, 'hapusKelas'])->name('hapusKelas');



    // Siswa
    Route::get('/tambahsiswa', [AdminController::class, 'createsiswa'])->name('tambahsiswa');
    Route::post('/storesiswa', [AdminController::class, 'storesiswa'])->name('storesiswa');
    Route::get('/siswa/{id}/edit', [AdminController::class, 'editsiswa'])->name('editsiswa');
    Route::put('/siswa/{id}/update', [AdminController::class, 'updatesiswa'])->name('updatesiswa');
    Route::delete('/siswa/{id}/hapus', [AdminController::class, 'hapusSiswa'])->name('hapussiswa');
});

// ==============================
// Guru Routes (Protected by auth)
// ==============================
Route::middleware('auth:guru')->prefix('Teacher')->name('Teacher.')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'dashboardGuru'])->name('dashboard');
    // Route::view('/dashboard', 'Teacher.dashboard')->name('dashboard');
    Route::post('/logout', [GuruController::class, 'logoutGuru'])->name('logout');

    // halamn transaksi
    Route::get('/transaksi', action: [GuruController::class, 'tabungan'])->name('transaksi');
    Route::post('/transaksi/store', [GuruController::class, 'storetabungan'])->name('storetabungan');
    Route::get('/transaksi/{id}/edit', [GuruController::class, 'edittabungan'])->name('edittabungan');
    Route::get('/transaksi/create', [GuruController::class, 'createtabungan'])->name('tambahtabungan');
    Route::put('/transaksi/{id}/update', [GuruController::class, 'update'])->name('updatetabungan');
    Route::delete('/transaksi/{id}/hapus', [GuruController::class, 'destroy'])->name('hapustabungan');



    // Datasiswa
    Route::get('/datasiswa', [GuruController::class, 'Datasiswa'])->name('datasiswa');

    //   Create Notifikasi
    Route::get('/notifikasi', [NotikasiController::class, 'notifikasi'])->name('createNotifikasi');
    Route::get('/notifikasi/create', [NotikasiController::class, 'create'])->name('tambahNotifikasi');
    Route::post('/notifikasi/store', [NotikasiController::class, 'store'])->name('storeNotifikasi');
    Route::get('/notifikasi/{id}/edit', [NotikasiController::class, 'editNotifikasi'])->name('edit');
    Route::put('/notifikasi/{id}/update', [NotikasiController::class, 'updateNotifikasi'])->name('update');
    Route::delete('/notifikasi/{id}/hapus', [NotikasiController::class, 'destroy'])->name('notifikasi.hapus');
});

// ==============================
// Siswa Routes (Protected by auth)
// ==============================
Route::middleware('auth:siswa')->prefix('Student')->name('Student.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [SiswaController::class, 'logoutSiswa'])->name('logout');
    Route::get('/siswa/riwayat-tabungan', [SiswaController::class, 'riwayatTabungan'])->name('riwayat');

    // Rute untuk menandai notifikasi sebagai dibaca
    Route::patch('/notifikasi/{id}/read', [NotikasiController::class, 'markAsRead'])->name('markAsRead');

    // Route untuk notifikasi
    Route::get('/notifikasi', [SiswaController::class, 'notifikasi'])->name('notifikasi');
});
