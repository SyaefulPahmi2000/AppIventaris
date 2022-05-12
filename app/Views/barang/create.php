<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5"><br>
      <h1 class="d-flex justify-content-center">Form Tambah Barang</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
          <form action="/barang/save" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Barang</label>
              <input type="text" class="form-control <?= ($validation->hasError ('kode_barang')) ? 
              'is-invalid' : '';?>" name="kode_barang" autofocus value="<?= old('kode_barang'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("kode_barang"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Barang</label>
              <input type="text" class="form-control <?= ($validation->hasError ('nama_barang')) ? 
              'is-invalid' : '';?>" name="nama_barang" value="<?= old('nama_barang'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("nama_barang"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Jumlah</label>
              <input type="text" class="form-control <?= ($validation->hasError ('jumlah')) ? 
              'is-invalid' : '';?>" name="jumlah" value="<?= old('jumlah'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("jumlah"); ?>

            </div>
            <div class="mb-3"> 
            <label for="inputdatakode" class="form-label">jenis</label>
              <select class="form-select" aria-label="Default select example" name="jenis_barang" >
                <option selected>jenis</option>
                <option value="elektroknik">elektronik</option>
                <option value="tv">tv</option>
                <option value="ATK">suku cadang</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">tahun</label>
              <input type="text" class="form-control <?= ($validation->hasError ('tahun')) ? 
              'is-invalid' : '';?>" name="tahun" value="<?= old('tahun'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("tahun"); ?>

            </div>
              <div class="mb-3">
              <label for="inputdatakode" class="form-label">harga</label>
              <input type="text" class="form-control <?= ($validation->hasError ('harga')) ? 
              'is-invalid' : '';?>" name="harga" value="<?= old('harga'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("harga"); ?>

            </div>
            <div class="mb-3">
              <label for="inputpenanggungjawab" class="form-label">Penanggung Jawab</label>
              <select class="form-select" aria-label="Default select example" name="penanggung_jawab">
                <option selected>penanggung jawab</option>
                <?php foreach ($pegawai as $p) : ?> 
                      <option value="<?= $p['id_pegawai']; ?>"><?= $p['id_pegawai'] . "-" . $p['nama_pegawai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
            <label for="inputdatakode" class="form-label">ruangan</label>
              <select class="form-select" aria-label="Default select example" name="ruangan" >
                <option selected>ruangan</option>
                <?php foreach ($ruangan as $r) : ?> 
                      <option value="<?= $r['kode_ruangan']; ?>"><?= $r['kode_ruangan'] . "-" . $r['nama_ruangan']; ?></option>
                <?php endforeach; ?>
              </select>
            <Br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>