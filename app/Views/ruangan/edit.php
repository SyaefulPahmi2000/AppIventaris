<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5"><br>
      <h1 class="d-flex justify-content-center">Form Edit Ruangan</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php foreach ($ruangan as $t) : ?>
          <form action="/ruangan/update/<?= $t['kode_ruangan']; ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Ruangan</label>
              <input type="text" class="form-control"  name="kode_ruangan" 
              autofocus value="<?= $t['kode_ruangan']; ?>" readonly>
            
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control " name="nama_ruangan" value="<?= $t['nama_ruangan']; ?>">

            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Lokasi</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="lokasi" value="<?= $t['lokasi']; ?>"/>
            
            <Br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>