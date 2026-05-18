<?php
// Mengambil data statistik secara real-time dari database
$query_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pendaftaran");
$data_total  = mysqli_fetch_assoc($query_total);

$query_lolos = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pendaftaran WHERE status_berkas = 'Lolos'");
$data_lolos  = mysqli_fetch_assoc($query_lolos);

$query_lunas = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pendaftaran WHERE status_pembayaran = 'Lunas'");
$data_lunas  = mysqli_fetch_assoc($query_lunas);
?>

<div class="p-4 mb-5 bg-white text-dark rounded-3 shadow-sm border border-light">
    <h1 class="display-6 fw-bold text-primary">Selamat Datang di Dashboard Admin</h1>
    <p class="fs-6 text-muted mb-0">Halo <strong><?= $_SESSION['nama']; ?></strong>, Anda masuk sebagai Administrator. Gunakan menu navigasi di atas untuk mengelola berkas pendaftaran dan nilai ujian mahasiswa baru.</p>
</div>

<div class="row g-4">
    
    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-3 text-center py-4 bg-white">
            <div class="card-body">
                <h6 class="text-uppercase fw-bold text-muted mb-2">Total Pendaftar</h6>
                <h1 class="display-4 fw-bold text-dark mb-0"><?= $data_total['total']; ?></h1>
                <small class="text-secondary">Calon Mahasiswa</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-3 text-center py-4 bg-white">
            <div class="card-body">
                <h6 class="text-uppercase fw-bold text-muted mb-2">Berkas Lolos</h6>
                <h1 class="display-4 fw-bold text-primary mb-0"><?= $data_lolos['total']; ?></h1>
                <small class="text-primary">Verifikasi Selesai</small>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 rounded-3 text-center py-4 bg-white">
            <div class="card-body">
                <h6 class="text-uppercase fw-bold text-muted mb-2">Total Lunas</h6>
                <h1 class="display-4 fw-bold text-success mb-0"><?= $data_lunas['total']; ?></h1>
                <small class="text-success">Sudah Daftar Ulang</small>
            </div>
        </div>
    </div>

</div>