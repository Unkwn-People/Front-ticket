<?= $this->extend('/layout/template.php') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('halaman_user_css/museum/index.css'); ?>">

<div class="custom-container">
    <h2 class="title">Pilihan Museum</h2>
    <div class="museum-list">
        <div class="museum-card">
            <img src="foto/Museum_fatahillah.jpg" alt="Museum_fatahillah" class="museum-img">
            <div class="museum-info">
                <h3>Museum Fatahillah</h3>
                <p>Museum Fatahillah adalah sebuah museum yang terletak di kawasan Kota Tua Jakarta, Indonesia. Bangunan megah bergaya kolonial Belanda ini sangat bersejarah.</p>
                <p class="harga">30.000/Orang</p>
                <a href="museum/pesan" class="btn-pesan">Beli Tiket</a>
            </div>
        </div>

        <div class="museum-card">
            <img src="foto/Museum_siwalima.jpg" alt="Museum_siwalima.jpg" class="museum-img">
            <div class="museum-info">
                <h3>Museum Siwalima</h3>
                <p>Museum Siwalima adalah museum provinsi Maluku yang terletak di Ambon. Museum ini menyimpan koleksi yang beragam, mencerminkan kekayaan budaya dan sejarah Maluku.

                </p>
                <p class="harga">Rp40.000/Orang</p>
                <a href="pesan" class="btn-pesan">Beli Tiket</a>
            </div>
        </div>

        <div class="museum-card">
            <img src="foto/Museum-Ullen-Sentalu.jpg" alt="Museum-Ullen-Sentalu" class="museum-img">
            <div class="museum-info">
                <h3>Museum Ullen Sentalu</h3>
                <p>Museum Ullen Sentalu adalah museum seni dan budaya Jawa yang terletak di kawasan Kaliurang, Yogyakarta. Keunikannya terletak pada penyajian sejarah dan budaya Jawa</p>
                <p class="harga">Rp60.000/Orang</p>
                <a href="pesan" class="btn-pesan">Beli Tiket</a>
            </div>
        </div>
        
    </div>
</div>


<?= $this->endSection() ?>