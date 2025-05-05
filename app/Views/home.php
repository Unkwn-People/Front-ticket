<?= $this->extend('/layout/template.php') ?>

<?= $this->section('content') ?>


<link rel="stylesheet" href="<?= base_url('halaman_user_css/home.css'); ?>">


<div class="carousel-container">
  <div class="carousel-slide">
    <img src="foto/Museum_fatahillah.jpg" alt="Museum Fatahillah">
    <img src="foto/museum_siwalima.jpg" alt="museum_siwalima">
    <img src="foto/Museum-Ullen-Sentalu.jpg" alt="Museum-Ullen-Sentalu">
    <!-- Tambahkan gambar lain sesuai kebutuhan -->
  </div>
</div>

<!-- Intro -->
<div class="intro">
  <h3>Selamat Datang di Website Pemesanan Tiket Museum (HeritageTic.)</h3>
  <p>Disini Kami menyediakan Pembelian Tiket Museum di seluruh Indonesia secara Online.</p>
</div>

<!-- Kartu Museum -->
<div class="museum-list">

    <div class="museum-card">
      <img src="foto/Museum_fatahillah.jpg" alt="Museum Fatahillah">
    </div>

    <div class="museum-card">
      <img src="foto/museum_siwalima.jpg" alt="museum siwalima">
    </div>

    <div class="museum-card">
      <img src="foto/Museum-Ullen-Sentalu.jpg" alt="Museum-Ullen-Sentalu">
    </div>

</div>

<?= $this->endSection() ?>
