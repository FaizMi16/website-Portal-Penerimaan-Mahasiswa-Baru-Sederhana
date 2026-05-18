<div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-header bg-warning text-dark fw-bold"><h5><i class="bi bi-megaphone"></i> Hasil Evaluasi Kelulusan</h5></div>
    <div class="card-body text-center">
        <?php
        $id_maba = $_SESSION['id_pendaftar'];
        $q = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id_pendaftar='$id_maba'");
        $data = mysqli_fetch_assoc($q);

        if ($data['status_kelulusan'] == 'Lulus') {
            echo "<div class='alert alert-success shadow-sm'>
                    <h4>🎉 SELAMAT!</h4>
                    <p>Anda dinyatakan <strong>LULUS</strong> Seleksi Ujian Masuk Kampus dengan perolehan nilai: <strong>".$data['nilai_ujian']."</strong>.</p>
                    <a href='index.php?page=daftar_ulang' class='btn btn-success btn-sm fw-bold'>Lanjut ke Registrasi Ulang</a>
                  </div>";
        } elseif ($data['status_kelulusan'] == 'Tidak Lulus') {
            echo "<div class='alert alert-danger shadow-sm'><h4>MOHON MAAF</h4><p>Anda dinyatakan tidak lulus seleksi kali ini. Tetap semangat!</p></div>";
        } else {
            echo "<div class='alert alert-info shadow-sm'><h4>STATUS PENDING</h4><p>Berkas Anda sedang diperiksa / Menunggu penilaian ujian masuk selesai.</p></div>";
        }
        ?>

        <div class="mt-4 border-top pt-3">
            <a href="index.php" class="btn btn-secondary btn-sm fw-bold"><i class="bi bi-arrow-left-short"></i> Kembali ke Beranda</a>
        </div>
    </div>
</div>