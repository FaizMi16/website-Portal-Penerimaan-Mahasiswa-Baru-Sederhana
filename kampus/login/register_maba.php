<?php
include "../config/koneksi.php";

if (isset($_POST['register'])) {
    $nama  = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $hp    = $_POST['no_hp'];
    $password = $_POST['password']; // SEKARANG: Langsung teks asli tanpa password_hash()

    $cek = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Email sudah dipakai!');</script>";
    } else {
        $q = mysqli_query($koneksi, "INSERT INTO pendaftaran (nama_lengkap, email, password, no_hp) VALUES ('$nama', '$email', '$password', '$hp')");
        if ($q) {
            echo "<script>alert('Registrasi sukses! Silakan Login dengan password Anda.'); window.location='login.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun Maba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container">
    <div class="card shadow mx-auto" style="max-width: 450px;">
        <div class="card-header bg-primary text-white"><h5>Form Pendaftaran Akun Maba</h5></div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-2"><label class="small fw-bold">Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control form-control-sm" required></div>
                <div class="mb-2"><label class="small fw-bold">Email</label><input type="email" name="email" class="form-control form-control-sm" required></div>
                <div class="mb-2"><label class="small fw-bold">Password Akun</label><input type="password" name="password" class="form-control form-control-sm" required></div>
                <div class="mb-3"><label class="small fw-bold">No HP</label><input type="text" name="no_hp" class="form-control form-control-sm" required></div>
                <button type="submit" name="register" class="btn btn-success w-100 btn-sm">Daftar Akun</button>
            </form>
            <div class="text-center mt-2 small"><a href="login.php">Kembali ke Login</a></div>
        </div>
    </div>
</div>
</body>
</html>