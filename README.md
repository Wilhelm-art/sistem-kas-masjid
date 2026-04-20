<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

# Sistem Informasi & Keuangan Masjid AT-Tijaniyah

Sistem Informasi Manajemen Masjid AT-Tijaniyah adalah aplikasi berbasis web *mobile-first* yang dikembangkan untuk memfasilitasi kebutuhan administrasi transparansi dana umat (kas), penyebaran informasi agenda kegiatan, serta akses aktual ke jadwal ibadah/sholat secara dinamis.

Didesain secara khusus dengan pendekatan *modern UI/UX* layaknya aplikasi premium (memanfaatkan teknik Glassmorphism dan Alpine.js interaktif) yang merepresentasikan citra instansi modern yang inklusif namun profesional.

## ✨ Fitur Utama

### 1. 🕌 Portal Publik Interaktif (Guest Dashboard)
* **Live Prayer Clock**: Sinkronisasi jadwal sholat aktual seluruh waktu berbasis lokasi (API Aladhan terintegrasi) menampilkan antarmuka *glass card* khusus yang menyorot (*highlight*) sholat yang sedang berlangsung.
* **Transparansi Keuangan Responsif**: Modul laporan publik kas masjid terbaru yang mudah dipahami umat dengan rincian pemasukan, pengeluaran bulan ini, serta sisa saldo utama. Merupakan fitur komitmen keterbukaan dana umat.
* **Agenda Kajian & Ibadah**: Menampilkan jadwal khatib Jumat, dan pengajian/kajian rutin berbasis *Timeline Cards* yang intuitif dan apik secara estetik di peramban ponsel mapun desktop.

### 2. 🔐 Panel Admin DKM (Secure Dashboard)
* **Manajemen Laporan Laba/Rugi (Buku Kas)**: Pencatatan mutasi transaksi komprehensif, multi filter bulanan dan tahunan.
* **Master Kategori Kas**: Pengelompokan jenis-jenis transaksi spesifik.
* **Manajemen Agenda Masjid**: Menambah jadwal peribadatan dan nama penceramah.
* **Rekapitulasi Sedekah & Donasi**: Sinkronisasi jalur donasi instansi untuk dikonversikan ke dalam kas.

## 🛠 Teknologi yang Digunakan

* **Backend**: [Laravel 10.x](https://laravel.com) (PHP 8.2)
* **Frontend CSS**: [Tailwind CSS 3.4](https://tailwindcss.com) (Pendekatan Utilitas modern untuk responsivitas)
* **Frontend JS**: [Alpine.js 3.x](https://alpinejs.dev) (+ Intersect Plugin untuk *Scroll Reveal Animations*)
* **Database**: MySQL 8.x
* **Deployment System**: Dockerized (Railway.app Optimized) dengan *Apache MPM Prefork* isolation.

## 🚀 Instalasi & Konfigurasi Lokal

Untuk berkontribusi pada repositori ini atau sekadar menjalankan aplikasi pada mode *development*, kuti langkah berikut:

### Prasyarat
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- MySQL Database

### Langkah Instalasi
1. Klon *repository* ke lokasi mesin pengembang:
   ```bash
   git clone https://github.com/Wilhelm-art/sistem-kas-masjid.git
   cd sistem-kas-masjid
   ```
2. Instal pustaka dependensi PHP:
   ```bash
   composer install
   ```
3. Instal dan _compile_ aset Frontend:
   ```bash
   npm install
   npm run build
   ```
4. Salin konfigurasi kerangka lingkungan (`.env`):
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Sesuaikan konfigurasi _database_ di `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_masjid_attijaniyah
   DB_USERNAME=root
   DB_PASSWORD=
   ```
6. Jalankan kerangka migrasi dan _seeder_ (jika ada) ke database lokal:
   ```bash
   php artisan migrate --seed
   ```
7. Mulai pengembangan:
   ```bash
   php artisan serve
   ```
   Kunjungi sistem di `http://localhost:8000`.

## 🐳 Deployment Production (Docker / Railway)

Aplikasi ini sudah dipaketisasi (*containerized*) untuk ditempatkan pada infrastruktur _cloud_ secara mulus. File `Dockerfile` yang kami sematkan mengonfigurasi instalasi PHP _extension_ mandiri seperti `gd`, `intl`, `pdo_mysql`, dan `zip`, dan menyempurnakan alokasi MPM Apache2 untuk menghindari *bottleneck* maupun konfigurasi tabrakan asbtraksi.

Seluruh repositori dapat dideploy langsung melalui opsi *"Deploy from Github"* di *platform* PaaS (contoh: Railway) karena dukungan Native Docker Builder otomatis. Jangan lupa mengeksklusi `vendor`, `node_modules`, dan berkas lokal melalui `.dockerignore`.

---
*Dibuat untuk Masjid AT-Tijaniyah | Semiga menjadi amal jariyah.*
