# CRUD Daftar Belanja

Proyek ini adalah aplikasi **CRUD (Create, Read, Update, Delete)** untuk daftar belanja berbasis web yang dibangun menggunakan **PHP** dan **Plates** sebagai template engine. Proyek ini menggunakan **Bootstrap 5.3.3** untuk antarmuka pengguna (UI) dan menerapkan praktik pengembangan modern dengan **PSR-4 autoloading** untuk manajemen kelas.

## Fitur

- **Tambah Item**: Menambahkan item baru ke daftar belanja.
- **Lihat Daftar Belanja**: Menampilkan daftar belanja yang sudah ada.
- **Hapus Item**: Menghapus item dari daftar belanja.

## Struktur Proyek

Berikut adalah struktur direktori proyek:

```markdown
/belanja-crud
├── /public
│   ├── index.php
│   ├── /assets
│   │   ├── /css
│   │   │   ├── bootstrap.min.css
│   │   ├── /js
│   │   │   ├── bootstrap.bundle.min.js
│   │   │   ├── script.js
├── /src
│   ├── /Controllers
│   │   ├── BelanjaController.php
│   ├── /Models
│   │   ├── Belanja.php
│   ├── /Views
│   │   ├── belanja
│   │   │   ├── index.php
│   │   │   ├── form.php
│   │   │   ├── list.php
│   │   ├── layout.php
│   ├── config.php
│   ├── Database.php
├── /vendor
├── composer.json
├── .htaccess
```

### Deskripsi Folder dan Berkas

- **`/public/index.php`**: Halaman utama aplikasi yang menampilkan daftar belanja.
- **`/src/Controllers/BelanjaController.php`**: Kontroler untuk menangani logika bisnis aplikasi, seperti menambah dan menghapus item.
- **`/src/Models/Belanja.php`**: Model untuk menangani interaksi dengan basis data.
- **`/src/Views/`**: Template untuk menampilkan antarmuka pengguna. Menggunakan Plates untuk rendering template.
- **`/src/config.php`**: Konfigurasi untuk pengaturan basis data.
- **`/src/Database.php`**: Koneksi ke basis data.
- **`/public/assets/`**: Berisi file CSS dan JavaScript (termasuk Bootstrap dan file kustom).
- **`composer.json`**: File konfigurasi untuk **Composer**, untuk mengelola dependensi proyek.
- **`.htaccess`**: Konfigurasi untuk server Apache.

## Instalasi

1. **Clone repository ini**:
   ```bash
   git clone https://github.com/username/belanja-crud.git
   cd belanja-crud
   ```

2. **Instalasi dependensi dengan Composer**:
   Pastikan Anda telah menginstal **Composer** di sistem Anda. Jika belum, kunjungi [getcomposer.org](https://getcomposer.org) untuk informasi lebih lanjut.

   Kemudian jalankan:
   ```bash
   composer install
   ```

3. **Atur koneksi basis data**:
   Di dalam berkas **`/src/config.php`**, pastikan Anda mengonfigurasi pengaturan **host**, **username**, **password**, dan **nama basis data** sesuai dengan lingkungan pengembangan Anda.

4. **Membuat basis data**:
   Anda perlu membuat basis data dengan nama yang sesuai. Misalnya:
   ```sql
   CREATE DATABASE belanja;
   ```

5. **Akses aplikasi**:
   Setelah mengikuti langkah-langkah di atas, Anda dapat membuka aplikasi melalui browser di `http://localhost/belanja-crud/public`.

## Penggunaan

- **Menambah Item**: Klik tombol "Tambah Item" untuk membuka modal dan mengisi nama dan harga barang.
- **Menghapus Item**: Klik tombol "Hapus" pada item yang ingin dihapus dari daftar belanja.
- **Melihat Daftar Belanja**: Daftar belanja akan ditampilkan secara otomatis pada halaman utama.

## Pengaturan `.htaccess`

File **`.htaccess`** sudah dikonfigurasi untuk mengarahkan permintaan ke folder `/public`. Pastikan Anda menggunakan server **Apache** untuk proyek ini. Jika Anda menggunakan XAMPP atau server lain, pastikan mod_rewrite diaktifkan dan **.htaccess** dikenali oleh server.

## Contributing

Jika Anda ingin berkontribusi pada proyek ini, Anda dapat melakukan fork pada repository ini dan mengajukan pull request. Sebelum mengirimkan pull request, pastikan bahwa kode Anda telah diuji dan tidak mengganggu fungsionalitas yang ada.

## Lisensi

Proyek ini dilisensikan di bawah lisensi MIT - lihat file [LICENSE](LICENSE) untuk detailnya 😁.