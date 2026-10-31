<x-layout title="Tugas">
    <main>
        <section class="hero">
            <div class="container">
                <p class="hero-label">Pekerjaan</p>
                <h1>Tugas Praktikum</h1>
                <p class="hero-sub">Daftar tugas dan tenggat waktu pengumpulan.</p>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="section-title">Daftar Tugas</h2>
                <div class="table-wrap">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Tugas</th>
                                <th>Due Date</th>
                                <th>Bobot</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Analisis Kebutuhan Sistem (Studi Kasus)</td>
                                <td>20 Sep 2026</td>
                                <td>15%</td>
                                <td><span class="badge badge-upcoming">Belum Dikerjakan</span></td>
                                <td><a href="#" class="link-btn"
                                        onclick="event.preventDefault(); alert('Form upload akan dibuka.');">Kumpulkan</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>ERD &amp; DFD — Sistem Peminjaman Buku</td>
                                <td>27 Sep 2026</td>
                                <td>20%</td>
                                <td><span class="badge badge-upcoming">Belum Dikerjakan</span></td>
                                <td><a href="#" class="link-btn"
                                        onclick="event.preventDefault(); alert('Form upload akan dibuka.');">Kumpulkan</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Desain Basis Data (Skema Relasi)</td>
                                <td>4 Okt 2026</td>
                                <td>20%</td>
                                <td><span class="badge badge-upcoming">Belum Dikerjakan</span></td>
                                <td><a href="#" class="link-btn"
                                        onclick="event.preventDefault(); alert('Form upload akan dibuka.');">Kumpulkan</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Quiz SQL — Modul Insert, Update, Delete</td>
                                <td>11 Okt 2026</td>
                                <td>10%</td>
                                <td><span class="badge badge-upcoming">Belum Dikerjakan</span></td>
                                <td><a href="#" class="link-btn"
                                        onclick="event.preventDefault(); alert('Form upload akan dibuka.');">Kumpulkan</a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Wireframe Aplikasi (Tim)</td>
                                <td>18 Okt 2026</td>
                                <td>15%</td>
                                <td><span class="badge badge-upcoming">Belum Dikerjakan</span></td>
                                <td><a href="#" class="link-btn"
                                        onclick="event.preventDefault(); alert('Form upload akan dibuka.');">Kumpulkan</a>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Tugas Akhir — Buat SI Sederhana</td>
                                <td>1 Nov 2026</td>
                                <td>20%</td>
                                <td><span class="badge badge-upcoming">Belum Dikerjakan</span></td>
                                <td><a href="#" class="link-btn"
                                        onclick="event.preventDefault(); alert('Form upload akan dibuka.');">Kumpulkan</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="section section-alt">
            <div class="container">
                <h2 class="section-title">Pedoman Pengumpulan</h2>
                <div class="guidelines">
                    <div class="guideline-item">
                        <h4>1. Format File</h4>
                        <p>PDF atau DOCX. Maksimal 10 MB per file.</p>
                    </div>
                    <div class="guideline-item">
                        <h4>2. Penamaan File</h4>
                        <p>Format: <code>NIM_Nama_Tugas.pdf</code></p>
                    </div>
                    <div class="guideline-item">
                        <h4>3. Keterlambatan</h4>
                        <p>Penalti 10% per hari keterlambatan. Maksimal 3 hari terlambat.</p>
                    </div>
                    <div class="guideline-item">
                        <h4>4. Plagiarisme</h4>
                        <p>Tidak ditoleransi. Deteksi menggunakan Turnitin.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-layout>
