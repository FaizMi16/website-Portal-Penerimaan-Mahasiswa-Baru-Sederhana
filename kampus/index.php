<?php
session_start();
// Proteksi: Jika belum login, paksa seret ke folder login
if (!isset($_SESSION['login'])) {
    header("Location: login/login.php");
    exit;
}
include __DIR__ . "/config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem PMB University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body { background-color: #f4f6f9; } .navbar-custom { background-color: #0d3b66; }</style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">PMB PORTAL</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-uppercase small fw-bold align-items-center">
                    
                    <?php if ($_SESSION['role'] == 'mahasiswa') : ?>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?page=pengumuman">Hasil Kelulusan</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?page=daftar_ulang">Daftar Ulang</a></li>
                    
                    <?php elseif ($_SESSION['role'] == 'admin') : ?>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php">Dashboard Admin</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?page=review_berkas">1. Review Berkas</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?page=input_nilai">2. Input Nilai</a></li>
                    <?php endif; ?>

                    <li class="nav-item ms-3">
                        <a class="btn btn-sm btn-danger text-white py-1 px-3" href="login/logout.php">Keluar (<?= $_SESSION['nama']; ?>)</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <?php
        $page = $_GET['page'] ?? '';

        if ($_SESSION['role'] == 'admin') {
            if ($page == "review_berkas") include "admin/review_berkas.php";
            elseif ($page == "input_nilai") include "admin/input_nilai.php";
            else include "admin/dashboard.php";
        } else {
            if ($page == "pengumuman") include "mahasiswa/pengumuman.php";
            elseif ($page == "daftar_ulang") include "mahasiswa/daftar_ulang.php";
            else include "mahasiswa/home.php";
        }
        ?>
    </div>
    
    <footer class="text-center text-white py-3 mt-auto" style="background-color: #0d3b66; border-top: 3px solid #f4d35e;">
        <div class="container">
            <p class="mb-1 small fw-bold">© 2026 Portal Penerimaan Mahasiswa Baru (PMB) University</p>
            <small class="text-white-50">Sistem Informasi Kampus Terintegrasi • Halaman Mahasiswa & Admin</small>
        </div>
    </footer>

</body>
</html>