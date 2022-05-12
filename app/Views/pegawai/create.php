<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5"><br>
      <h1 class="d-flex justify-content-center">Form Tambah Pegawai</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
          <form action="/pegawai/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Pegawai</label>
              <input type="text" class="form-control <?= ($validation->hasError ('nama_pegawai')) ? 
              'is-invalid' : '';?>" name="nama_pegawai" autofocus value="<?= old('nama_pegawai'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("nama_pegawai"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">No Hp</label>
              <input type="text" class="form-control <?= ($validation->hasError ('no_hp')) ? 
              'is-invalid' : '';?>" name="no_hp" autofocus value="<?= old('no_hp'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("no_hp"); ?>

            </div>
            </div>
            
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Alamat</label>
              <input type="text" class="form-control <?= ($validation->hasError ('alamat')) ? 
              'is-invalid' : '';?>" name="alamat" autofocus value="<?= old('alamat'); ?>"/>
            <div class="invalid-feedback">
              <?=$validation->getError("alamat"); ?>

            </div>
            </div>
            <select class="form-select" aria-label="Default select example" name="jabatan">
              <option selected>Jabatan</option>
              <option value="sekertaris">Sekertaris</option>
              <option value="bendahara">Bendahara</option>
              <option value="menerjer">menejer</option>
            </select>
            <div class="mb-3">
              <label for="formFile" class="form-label">Masukan Gambar</label>
              <input class="form-control <?= ($validation->hasError ('image')) ? 
              'is-invalid' : '';?>" type="file" id="formFile" name="image">
              <div class="invalid-feedback">
              <?=$validation->getError("image"); ?>

            </div>
            </div>
            <div class="table-responsive mt-3">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-danger">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>