<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5"><br>
      <h1 class="d-flex justify-content-center">Form Peminjaman Barang</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php if (session()->getFlashdata('message')) : ?>
          <div class="alert alert_primary mt-5" role="alert">
              <?= session()->getFlashdata('message'); ?>
          </div>
        <?php endif; ?>
          <form action="/peminjaman/save" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Barang</label>
              <select class="form-select" aria-label="Default select example" name="kode_barang" >
                <option selected>pilih barang</option>
                <?php foreach ($barang as $k) : ?> 
                      <option value="<?= $k['kode_barang']; ?>"><?= $k['kode_barang'] . "-" . $k['nama_barang']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">pegawai</label>
              <select class="form-select" aria-label="Default select example" name="id_pegawai" >
                <option selected>pilih pegawai</option>
                <?php foreach ($pegawai as $k) : ?> 
                      <option value="<?= $k['id_pegawai']; ?>"><?= $k['id_pegawai'] . "-" . $k['nama_pegawai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Tgl Peminjaman</label>
              <input type="date" class="form-control <?= ($validation->hasError ('tgl_pinjam')) ? 
              'is-invalid' : '';?>" name="tgl_pinjam" value="<?= old('tgl_pinjam'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("tgl_pinjam"); ?>

            </div>
            <div class="mb-3"> 
            <label for="inputdatakode" class="form-label">Tgl Kembali</label>
            <input type="date" class="form-control <?= ($validation->hasError ('tgl_kembali')) ? 
              'is-invalid' : '';?>" name="tgl_kembali" value="<?= old('tgl_kembali'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("tgl_kembali"); ?>

            </div>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Peminjam</label>
              <input type="text" class="form-control <?= ($validation->hasError ('nama_peminjam')) ? 
              'is-invalid' : '';?>" name="nama_peminjam" value="<?= old('nama_peminjam'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("nama_peminjam"); ?>

            </div>
              <div class="mb-3">
              <label for="inputdatakode" class="form-label">No Hp</label>
              <input type="text" class="form-control <?= ($validation->hasError ('no_hp')) ? 
              'is-invalid' : '';?>" name="no_hp" value="<?= old('no_hp'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("no_hp"); ?>

            </div>
            <div class="mb-3">
              <label for="inputpenanggungjawab" class="form-label">Keterangan</label>
              <input type="text" class="form-control <?= ($validation->hasError ('keterangan')) ? 
              'is-invalid' : '';?>" name="keterangan" value="<?= old('keterangan'); ?>">
            <div class="invalid-feedback">
              <?=$validation->getError("keterangan"); ?>

            </div>
            </div>

            <Br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>