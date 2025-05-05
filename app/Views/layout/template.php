<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Tiket Museum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  
    
  <!-- Custom CSS (setelah Bootstrap agar bisa override) -->
  <link rel="stylesheet" href="<?= base_url('halaman_user_css/layout/template.css'); ?>">
</head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>"><span>HerritageTic.</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="<?= base_url(''); ?>">Home</a>
                    <a class="nav-link" href="<?= base_url('museum'); ?>">List Museum</a>
                </div>
                </div>
            </div>
        </nav>
        
        <?= $this->renderSection('content'); ?>
        <div class="container-fluid mt-4">
        <div class="row">
        <div class="col-md-12 bg-dark text-white py-4 text-center">
        <h2>Kontak</h2>  
        <p> IG: <a href="https://www.instagram.com/" target="_blank" class="text-white">@HeritageTic
          </a>
        </p>
    
        <p>
            Email: 
            <a href="mailto: Mamble_Club@mamble.com" class="text-white">
                Mamble_Club@mamble.com
            </a>
        </p>
    
          <p class="my-auto">
              &copy; <?php echo date("Y"); ?> Mamble_Club.
          </p>
        </div>

             </div> 
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>