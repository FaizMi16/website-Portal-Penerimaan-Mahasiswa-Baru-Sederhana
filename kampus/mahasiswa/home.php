<div class="p-5 mb-4 bg-white text-dark rounded-3 shadow-sm border text-center">
    <div class="container-fluid py-2">
        <h1 class="display-6 fw-bold text-primary">Selamat Datang, <?= $_SESSION['nama']; ?>!</h1>
        <p class="fs-6 text-muted">Selamat datang di portal pendaftaran mahasiswa baru. Silakan pantau perkembangan dan tahapan seleksi Anda melalui menu di bawah ini.</p>
    </div>
</div>

<h3 class="fw-bold mb-4 text-center">Alur Pendaftaran Anda</h3>
<div class="row g-4 justify-content-center">
    
    <div class="col-md-5">
        <div class="card h-100 shadow-sm border-start border-primary border-4 p-3 bg-white">
            <div class="card-body d-flex flex-column">
                <h5 class="fw-bold text-primary"><i class="bi bi-megaphone-fill"></i> 1. Hasil Kelulusan</h5>
                <p class="small text-muted flex-grow-1">Lihat status evaluasi berkas pendaftaran Anda dan hasil pengumuman kelulusan nilai ujian masuk dari pihak universitas secara real-time.</p>
                <a href="index.php?page=pengumuman" class="btn btn-sm btn-primary mt-3 fw-bold">Cek Status & Hasil</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-5">
        <div class="card h-100 shadow-sm border-start border-success border-4 p-3 bg-white">
            <div class="card-body d-flex flex-column">
                <h5 class="fw-bold text-success"><i class="bi bi-cash-coin"></i> 2. Daftar Ulang & OSPEK</h5>
                <p class="small text-muted flex-grow-1">Halaman khusus bagi calon mahasiswa yang telah dinyatakan Lulus untuk melakukan registrasi ulang, simulasi pelunasan biaya kuliah, dan persiapan masa OSPEK.</p>
                <a href="index.php?page=daftar_ulang" class="btn btn-sm btn-success mt-3 fw-bold">Lanjut Daftar Ulang</a>
            </div>
        </div>
    </div>

</div>