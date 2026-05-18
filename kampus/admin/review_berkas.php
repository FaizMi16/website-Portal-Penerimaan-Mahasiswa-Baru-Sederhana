<?php
if (isset($_GET['aksi']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $aksi = $_GET['aksi'];
    if ($aksi == "lolos") {
        mysqli_query($koneksi, "UPDATE pendaftaran SET status_berkas='Lolos' WHERE id_pendaftar='$id'");
    } elseif ($aksi == "gagal") {
        mysqli_query($koneksi, "UPDATE pendaftaran SET status_berkas='Gagal', status_kelulusan='Tidak Lulus' WHERE id_pendaftar='$id'");
    }
    echo "<script>window.location='index.php?page=review_berkas';</script>";
}
?>
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white"><h5><i class="bi bi-file-earmark-check"></i> Tahap 2: Document Review</h5></div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped align-middle small">
            <thead class="table-dark">
                <tr><th>Nama Pendaftar</th><th>Email</th><th>Status Berkas</th><th>Tindakan Verifikasi</th></tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($koneksi, "SELECT * FROM pendaftaran");
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <tr>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><span class="badge bg-secondary"><?= $row['status_berkas']; ?></span></td>
                    <td>
                        <?php if ($row['status_berkas'] == 'Pending') { ?>
                            <a href="index.php?page=review_berkas&aksi=lolos&id=<?= $row['id_pendaftar']; ?>" class="btn btn-xs btn-success py-0 px-2 small">Terima</a>
                            <a href="index.php?page=review_berkas&aksi=gagal&id=<?= $row['id_pendaftar']; ?>" class="btn btn-xs btn-danger py-0 px-2 small">Tolak</a>
                        <?php } else { echo "<span class='text-muted small'>Selesai</span>"; } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="mt-4 border-top pt-3 text-center">
            <a href="index.php" class="btn btn-secondary btn-sm fw-bold">
                <i class="bi bi-arrow-left-short"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>