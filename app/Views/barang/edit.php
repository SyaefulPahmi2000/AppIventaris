<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5"><br>
      <h1 class="d-flex justify-content-center">Form Edit Barang</h1>
      <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-5">
        <?php foreach ($barang as $b) : ?>
          <form action="/barang/update/<?= $b['kode_barang']; ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Kode Barang</label>
              <input type="text" class="form-control"  name="kode_barang" 
              autofocus value="<?= $b['kode_barang']; ?>" readonly>
            
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Nama Barang</label>
              <input type="text" class="form-control " name="nama_barang" value="<?= $b['nama_barang']; ?>">

            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">Jumlah</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="jumlah" value="<?= $b['jumlah']; ?>"/>
            <div class="mb-3">
            <label for="inputdatakode" class="form-label">jenis</label>
              <select class="form-select" aria-label="Default select example" name="jenis_barang" value="<?= $b['jenis_barang']; ?>">
                <option selected>jenis</option>
                <option value="elektronik">elektronik</option>
                <option value="tv">tv</option>
                <option value="ATK">ATK</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="inputdatakode" class="form-label">tahun</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="tahun" value="<?= $b['tahun_pembelian']; ?>" />
              <div class="mb-3">
              <label for="inputdatakode" class="form-label">harga</label>
              <input type="text" class="form-control" id="" aria-describedby="" name="harga" value="<?= $b['harga_barang']; ?>"/>
            <div class="mb-3">
              <label for="inputpenanggungjawab" class="form-label">Penanggung Jawab</label>
              <select class="form-select" aria-label="Default select example" name="penanggung_jawab" value="<?= $b['id_pegawai']; ?>">
                <option selected>penanggung jawab</option>
                <?php foreach ($pegawai as $p) : ?> 
                      <option value="<?= $p['id_pegawai']; ?>"><?= $p['id_pegawai'] . "-" . $p['nama_pegawai']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
            <label for="inputdatakode" class="form-label">ruangan</label>
              <select class="form-select" aria-label="Default select example" name="ruangan" value="<?= $b['kode_ruangan']; ?>">
                <option selected>ruangan</option>
                <?php foreach ($ruangan as $r) : ?> 
                      <option value="<?= $r['kode_ruangan']; ?>"><?= $r['kode_ruangan'] . "-" . $r['nama_ruangan']; ?></option>
                <?php endforeach; ?>
              </select>
            <Br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>