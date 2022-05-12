<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5"><br>
      <h1 class="d-flex justify-content-center">Form Tambah Ruangan</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
          <form action="/ruangan/save" method="POST">
          <?= csrf_field(); ?>
          <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Ruangan</label>
              <input type="text" class="form-control <?= ($validation->hasError ('kode_ruangan')) ? 
              'is-invalid' : '';?>" name="kode_ruangan" autofocus value="<?= old('kode_ruangan'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("kode_ruangan"); ?>

            </div>
            </div>

            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control <?= ($validation->hasError ('nama_ruangan')) ? 
              'is-invalid' : '';?>" name="nama_ruangan" value="<?= old('nama_ruangan'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("nama_ruangan"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">lokasi</label>
              <input type="text" class="form-control <?= ($validation->hasError ('lokasi')) ? 
              'is-invalid' : '';?>" name="lokasi" value="<?= old('lokasi'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("lokasi"); ?>

            </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>