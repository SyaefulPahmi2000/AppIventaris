<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>


    <!--content-->
    <div class="container mt-5">
      <h1 class="d-flex justify-content-center">Aplikasi Iventaris Barang</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-4">
          <div class="card">
            <img src="assets/img/logo.png " class="rounded-circle img-thumbnail shadow-sm mx-auto d-block mt-3" width="50%" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">selanjutnya <i class="bi bi-arrow-right-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="assets/img/petugas.jpg" class="rounded-circle img-thumbnail shadow-sm mx-auto d-block mt-3" width="50%" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">selanjutnya <i class="bi bi-arrow-right-circle"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="assets/img/shope.png" class="rounded-circle img-thumbnail shadow-sm mx-auto d-block mt-3" width="50%" />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">selanjutnya <i class="bi bi-arrow-right-circle"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--akhir content-->
<?= $this-> endSection(); ?>