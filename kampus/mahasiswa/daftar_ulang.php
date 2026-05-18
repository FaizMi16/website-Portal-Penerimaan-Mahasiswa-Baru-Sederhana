<?php
if (isset($_GET['bayar'])) {
    $id_maba = $_SESSION['id_pendaftar'];
    mysqli_query($koneksi, "UPDATE pendaftaran SET status_pembayaran='Lunas' WHERE id_pendaftar='$id_maba'");
    echo "<script>window.location='index.php?page=daftar_ulang';</script>";
}
?>
<div class="card shadow-sm mx-auto" style="max-width: 650px;">
    <div class="card-header bg-success text-white fw-bold"><h5><i class="bi bi-cash-coin"></i> Daftar Ulang & Biaya Pendidikan</h5></div>
    <div class="card-body text-center">
        <?php
        $id_maba = $_SESSION['id_pendaftar'];
        $q = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftar='$id_maba'");
        $data = mysqli_fetch_assoc($q);

        if ($data['status_kelulusan'] !== 'Lulus') {
            echo "<p class='text-muted py-3'>Halaman ini hanya tersedia bagi pendaftar yang sudah dinyatakan lulus seleksi.</p>";
        } else {
            if ($data['status_pembayaran'] == 'Belum Bayar') {
                echo "<p class='fs-5'>Status Pembayaran Registrasi Ulang Anda: <span class='badge bg-danger'>Belum Lunas</span></p>
                      <a href='index.php?page=daftar_ulang&bayar=1' class='btn btn-warning text-dark btn-sm fw-bold shadow-sm my-2'>Simulasi Bayar Kuliah (Klik Pelunasan)</a>";
            } else {
                echo "<div class='alert alert-success shadow-sm'>
                        <h5>Status Pembayaran: LUNAS ✔</h5>
                        <p class='small mb-0'>Selamat! Anda resmi menjadi mahasiswa baru. Persiapkan diri Anda untuk mengikuti kegiatan <strong>OSPEK & Pengenalan Kampus</strong>.</p>
                      </div>";
            }
        }
        ?>

        <div class="mt-4 border-top pt-3">
            <a href="index.php" class="btn btn-secondary btn-sm fw-bold"><i class="bi bi-arrow-left-short"></i> Kembali ke Beranda</a>
        </div>
    </div>
</div>