# 🏛️ Portal PMB University (Sistem Penerimaan Mahasiswa Baru)

Sistem Informasi berbasis web untuk mengelola alur pendaftaran calon mahasiswa baru (Maba) secara otomatis, terintegrasi, dan modular. Proyek ini memisahkan hak akses antara **Admin** dan **Mahasiswa** secara cerdas melalui satu gerbang login tanpa memerlukan dropdown pilihan role (*Roleless Login Flow*).

---

## 🚀 Fitur Utama

### 🔐 1. Smart Authentication (Tanpa Dropdown Role)
* **Gerbang Tunggal:** Pengguna cukup memasukkan Username/Email dan Password. Sistem secara otomatis mendeteksi apakah akun tersebut milik Admin (`tabel users`) atau Mahasiswa (`tabel pendaftaran`).
* **Verifikasi Captcha:** Pengamanan tambahan menggunakan GD Library PHP untuk memproduksi kode keamanan unik *case-insensitive* guna menangkal serangan bot.
* **Plain Text Authentication:** Sistem pencocokan kata sandi langsung (tanpa enkripsi rumit) memudahkan pengelolaan data uji coba langsung dari phpMyAdmin.

### 📊 2. Dashboard Administrator
* **Statistik Real-Time Card:** Tampilan 3 blok informasi utama (Total Pendaftar, Berkas Lolos Verifikasi, dan Total Calon Mahasiswa Lunas).
* **Review Berkas:** Kelola validasi dokumen calon mahasiswa baru dengan status *Pending*, *Lolos*, atau *Gagal*.
* **Input Nilai Ujian:** Mengisi hasil nilai exam masuk maba untuk menentukan kelulusan secara otomatis.

### 🎓 3. Portal Calon Mahasiswa (Maba)
* **Alur Interaktif:** Dilengkapi kartu navigasi alur PMB mulai dari pemeriksaan berkas, hasil kelulusan, hingga daftar ulang.
* **Simulasi Pembayaran:** Mahasiswa yang dinyatakan *Lulus* dapat melakukan simulasi pelunasan biaya pendidikan langsung di dalam sistem.
* **Navigasi Fleksibel:** Tombol "Kembali ke Beranda" di setiap sub-menu (Pengumuman & Daftar Ulang) memudahkan eksplorasi halaman.

---

## 📁 Struktur Dokumen & Folder Proyek

```text
xampp/htdocs/kampus/
 ├── index.php                 # Gerbang induk utama & routing halaman dashboard
 ├── config/
 │    └── koneksi.php          # Konfigurasi koneksi database MySQLi
 ├── login/
 │    ├── login.php            # Form login pintar dengan captcha terintegrasi
 │    ├── captcha.php          # Script generator gambar kode keamanan
 │    ├── register_maba.php    # Form registrasi mandiri calon mahasiswa baru
 │    └── logout.php           # Pembersih session sistem
 ├── admin/
 │    ├── dashboard.php        # Halaman statistik utama admin (3 info card)
 │    ├── review_berkas.php    # Panel verifikasi berkas pendaftar
 │    └── input_nilai.php      # Panel pengisian nilai ujian masuk
 └── mahasiswa/
      ├── home.php             # Beranda alur navigasi mahasiswa baru
      ├── pengumuman.php       # Halaman status kelulusan exam
      └── daftar_ulang.php     # Panel simulasi pembayaran biaya kuliah & OSPEK
