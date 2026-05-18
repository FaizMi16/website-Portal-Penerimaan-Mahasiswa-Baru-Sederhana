<?php
if (isset($_POST['submit_nilai'])) {
    $id = $_POST['id_pendaftar'];
    $nilai = $_POST['nilai_ujian'];
    $status_lulus = ($nilai >= 70) ? 'Lulus' : 'Tidak Lulus';
    mysqli_query($koneksi, "UPDATE pendaftaran SET nilai_ujian='$nilai', status_kelulusan='$status_lulus' WHERE id_pendaftar='$id'");
    echo "<script>window.location='index.php?page=input_nilai';</script>";
}
?>
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white"><h5><i class="bi bi-pencil-square"></i> Tahap 3: Entrance Exam (Input Nilai)</h5></div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped align-middle small">
            <thead class="table-dark">
                <tr><th>Nama Calon Mahasiswa</th><th>Nilai</th><th>Status Kelulusan</th><th>Aksi Input</th></tr>
            </thead>
            <tbody>
                <?php
                $res = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE status_berkas='Lolos'");
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <tr>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['nilai_ujian'] ?? '-'; ?></td>
                    <td><span class="badge bg-info text-dark"><?= $row['status_kelulusan']; ?></span></td>
                    <td>
                        <form action="" method="POST" class="d-flex gap-1">
                            <input type="hidden" name="id_pendaftar" value="<?= $row['id_pendaftar']; ?>">
                            <input type="number" name="nilai_ujian" class="form-control form-control-sm py-0" style="width: 70px;" min="0" max="100" required>
                            <button type="submit" name="submit_nilai" class="btn btn-primary btn-sm py-0 px-2">Simpan</button>
                        </form>
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