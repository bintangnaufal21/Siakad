<x-layout title="Kontak">
    <main>
        <section class="hero">
            <div class="container">
                <p class="hero-label">Hubungi Kami</p>
                <h1>Kontak</h1>
                <p class="hero-sub">Informasi dosen pengampu dan asisten praktikum.</p>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="section-title">Tim Pengampu</h2>
                <div class="contacts-grid">
                    <div class="contact-card">
                        <div class="contact-avatar">J</div>
                        <h4>Junidar, S.Si, M.Kom</h4>
                        <p class="contact-role">Dosen Pengampu</p>
                        <p><strong>Email:</strong> junidar@unsyiah.ac.id</p>
                        <p><strong>Jabatan:</strong> Dosen Tetap FMIPA UNSYIAH</p>
                        <p><strong>Ruangan:</strong> Gedung FMIPA Lt.2</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-avatar">A</div>
                        <h4>Dr. Ahmad Fauzi, M.Kom</h4>
                        <p class="contact-role">Dosen Pendamping</p>
                        <p><strong>Email:</strong> afauzi@unsyiah.ac.id</p>
                        <p><strong>Jabatan:</strong> Dosen Tetap FMIPA UNSYIAH</p>
                        <p><strong>Ruangan:</strong> Gedung FMIPA Lt.3</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-alt">
            <div class="container">
                <h2 class="section-title">Asisten Praktikum</h2>
                <div class="contacts-grid">
                    <div class="contact-card">
                        <div class="contact-avatar">R</div>
                        <h4>Rina Putri, S.Kom</h4>
                        <p class="contact-role">Asisten Utama</p>
                        <p><strong>Email:</strong> rina.praktikan@mail.unsyiah.ac.id</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-avatar">B</div>
                        <h4>Budi Santoso, S.Kom</h4>
                        <p class="contact-role">Asisten</p>
                        <p><strong>Email:</strong> budi.praktikan@mail.unsyiah.ac.id</p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-avatar">D</div>
                        <h4>Dewi Lestari, S.Kom</h4>
                        <p class="contact-role">Asisten</p>
                        <p><strong>Email:</strong> dewi.praktikan@mail.unsyiah.ac.id</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="section-title">Kirim Pesan</h2>
                <form class="contact-form" id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" id="npm" name="npm" placeholder="Contoh: 2408007010026"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="contoh@mail.unsyiah.ac.id"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </section>
    </main>
</x-layout>
