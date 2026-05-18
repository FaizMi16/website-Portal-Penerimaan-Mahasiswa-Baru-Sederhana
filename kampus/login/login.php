<?php
session_start();
include "../config/koneksi.php";

if (isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {
    $username_email = mysqli_real_escape_string($koneksi, $_POST['username_email']);
    $password = $_POST['password'];
    $captcha_input = trim($_POST['captcha_input']);

    // 1. Verifikasi Captcha (Huruf besar/kecil disamakan)
    if (strcasecmp($captcha_input, $_SESSION['captcha_code']) !== 0) {
        $error = "Kode Captcha yang Anda masukkan salah!";
    } else {
        
        // 2. Cek ke tabel users (Akses Admin) - Menggunakan Teks Biasa
        $query_admin = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username_email'");
        if (mysqli_num_rows($query_admin) === 1) {
            $row_admin = mysqli_fetch_assoc($query_admin);
            
            // JALUR TANPA ENKRIPSI: Langsung dicocokkan tulisannya
            if ($password == $row_admin['password']) {
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $row_admin['nama_lengkap'];
                $_SESSION['role'] = 'admin';
                header("Location: ../index.php");
                exit;
            }
        }

        // 3. Cek ke tabel pendaftaran (Akses Mahasiswa) - Menggunakan Teks Biasa
        $query_maba = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE email = '$username_email'");
        if (mysqli_num_rows($query_maba) === 1) {
            $row_maba = mysqli_fetch_assoc($query_maba);
            
            // Mahasiswa bisa login menggunakan password teks biasa yang mereka buat atau nomor HP-nya
            if ($password == $row_maba['password'] || $password == $row_maba['no_hp']) {
                $_SESSION['login'] = true;
                $_SESSION['id_pendaftar'] = $row_maba['id_pendaftar'];
                $_SESSION['nama'] = $row_maba['nama_lengkap'];
                $_SESSION['role'] = 'mahasiswa';
                header("Location: ../index.php");
                exit;
            }
        }

        $error = "Username/Email atau Password Anda salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Plain Text</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0d3b66; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .card-login { width: 100%; max-width: 400px; border-radius: 10px; border: none; }
    </style>
</head>
<body>
<div class="card card-login shadow p-4 bg-white">
    <div class="text-center mb-3">
        <h4 class="fw-bold text-primary mb-0">PORTAL PMB</h4>
        <small class="text-muted">Login Mudah Tanpa Enkripsi</small>
    </div>

    <?php if ($error !== "") : ?>
        <div class="alert alert-danger py-1 small text-center"><?= $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST" autocomplete="off">
        <div class="mb-3">
            <label class="form-label small fw-bold">Username / Email</label>
            <input type="text" name="username_email" class="form-control" placeholder="admin / email maba" required>
        </div>
        <div class="mb-3">
            <label class="form-label small fw-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <div class="mb-3">
            <label class="form-label small fw-bold">Verifikasi Captcha</label>
            <div class="d-flex gap-2 align-items-center mb-2">
                <img src="captcha.php" alt="Captcha" class="border rounded">
                <span class="text-muted small">← Ketik kode ini</span>
            </div>
            <input type="text" name="captcha_input" class="form-control" placeholder="Input kode keamanan" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100 fw-bold">Masuk</button>
    </form>
    <div class="text-center mt-3 small">
        <a href="register_maba.php" class="text-decoration-none fw-bold">Registrasi Akun Baru</a>
    </div>
</div>
</body>
</html>