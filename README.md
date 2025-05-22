<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">Edusavings 💰📚</h1>

<p align="center">
  Aplikasi pengelolaan tabungan siswa berbasis web yang modern dan efisien. <br />
  Dibuat untuk memudahkan proses menabung, pemantauan, dan manajemen transaksi tabungan di lingkungan sekolah.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-^8.2-777BB4?logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel" alt="Laravel Framework">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql" alt="MySQL">
</p>

---

## 🚀 Sekilas Tentang Edusavings

**Edusavings** adalah sistem informasi tabungan siswa berbasis Laravel yang dirancang untuk mempermudah pengelolaan keuangan siswa di lingkungan sekolah. Aplikasi ini mendukung berbagai peran pengguna:

- 👩‍🏫 **Admin**  
  Mengelola akun guru dan siswa, memantau laporan keuangan, serta mengatur konfigurasi sistem.

- 🧑‍🏫 **Guru**  
  Menginput transaksi tabungan siswa, mencetak laporan, dan memantau data siswa.

- 🙋‍♂️ **Siswa**  
  Melihat riwayat transaksi dan saldo tabungan 

---

## ✅ Fitur Utama

- Manajemen akun admin, guru, dan siswa
- Input dan pemrosesan transaksi tabungan
- Riwayat dan detail tabungan per siswa
- Statistik tabungan per kelas
- Fitur ekspor data tabungan ke Excel
- Antarmuka ramah pengguna & desain responsive

---

## 🛠️ Teknologi yang Digunakan

- **Laravel 11**
- **PHP 8.2+**
- **MySQL**
- **Tailwind CSS**
- **Vite (untuk build frontend)**

---

## ✅ Prasyarat Sistem

Pastikan perangkat lunak berikut sudah terinstal dan terkonfigurasi dengan baik di sistem Anda:

* 🐘 **PHP:** Versi `^8.2` (atau sesuai kebutuhan proyek Anda)
* 📦 **Composer:** [Versi terbaru](https://getcomposer.org/)
* 🟢 **Node.js & NPM (atau Yarn):** Versi `^18.0` direkomendasikan
* 🐬 **Database:** MySQL (Pastikan server database Anda berjalan)
* 🌿 **Git:** Untuk kloning repositori

---

## 📦 Langkah Instalasi

 1. **Clone repositori**
```bash
git clone -b master https://github.com/CARLESMARVINDevvv/Tabungan.git
```

 2. **Lalu jalankan `composer install/composer install --no-cache(jika terjadi eror di install composer)`**
  ```bash
  composer install
 ```
**Atau**

```bash
composer install --no-cache
```

3. **lalu Jalankan**
```bash
cp .env.example .env
```

4. **lalu jalankan**
```bash
php artisan key:generate
```

5. **lalu konfigurasi database di file `.env` seperti di bawah ini**
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tabungansiswa
DB_USERNAME=root
DB_PASSWORD=
```

6. **lalu jalankan**
```bash
php artisan key:generate
```

7. **lalu jalankan untuk nge link**
```bash
php artisan storage:link
```

8. **lalu install Depedensi Untuk Frontend**
```bash
npm install
```

9. **Lalu jalan untuk `Node.Js nya` Untuk Frontend nya**
```bash
npm run dev
```

**Dan Jalankan untuk migrasi database**
```bash
php artisan migarate
```

10. **lalu jalankan Server Seedernya untuk dummy data(data test)**
```bash
php artisan db:seed
```

11 **lalu jalankan di localhost anda dengan perintah**
```bash
php artisan ser
```

### Selamat Seharusnya Aplikasi Sudah  Bisa Berjalan Di Laptop anda


---

### Note :
### Saat menjalankan seeder
```bash
php artisan db:seed
```
 ### mungkin ad di bagian  seeder siswa yg g bisa di jalankan jangan khawatir itu tidak ada masalah jika inginseeder siswa ingin bisa jalan anda masuk ke login admin jangan lupa jalankan seedernya dlu speerti perintah di atas lalu buat kelasnya terlebih dahulu lalu jalankan ulang seeder siswanya 
```bash
php artisan db:seed --class= nama seeder siswa
```

Selamat Seharusnya seeder siswa sudah bisa terbuat


    
