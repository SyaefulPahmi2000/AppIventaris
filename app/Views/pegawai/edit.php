<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5"><br>
      <h1 class="d-flex justify-content-center">Form Edit Pegawai</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php foreach ($pegawai as $d) : ?>
          <form action="/pegawai/update/<?= $d['id_pegawai']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="foto" value="<?= $d['poto'] ?>">
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">id Pegawai</label>
              <input type="text" class="form-control" name="id_pegawai" 
              autofocus value="<?= $d['id_pegawai']; ?>" readonly>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Pegawai</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="nama_pegawai" 
              value="<?= $d['nama_pegawai']; ?>"/>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">No Hp</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="no_hp" 
              value="<?= $d['no_hp'];  ?>" />
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="alamat" 
              value="<?= $d['alamat']; ?>"/>
            </div>
            <select class="form-select" aria-label="Default select example" name="jabatan" value="<?= $d['jabatan']; ?>">
              <option selected>Jabatan</option>
              <option value="sekertaris">Sekertaris</option>
              <option value="bendahara">Bendahara</option>
              <option value="menejer">menejer</option>
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
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>