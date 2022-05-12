<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
      <br>
      <h1 class="d-flex justify-content-center mb-3">Data Barang</h1>
      <a href="/barang/create" type="button" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah Data</a>
      <a href="<?= base_url('barang/export'); ?>" type="button" class="btn btn-warning"><i class="bi bi-plus"></i>Export Data</a>
      <!--Bagian Navbar-->
      <?php if (session()->getFlashdata('message')) : ?>
          <div class="alert alert_primary mt-5" role="alert">
              <?= session()->getFlashdata('message'); ?>
          </div>
        <?php endif; ?>
      <div class="table-responsive mt-3">
        <table class="table table-striped" id="dataTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>jenis barang</th>
              <th>tahun</th>
              <th>Penanggung Jawab</th>
              <th>kode ruang</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($barang as $m) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $m['kode_barang']; ?></td>
              <td><?= $m['nama_barang']; ?></td>
              <td><?= $m['jumlah']; ?></td>
              <td><?= $m['jenis_barang']; ?></td>
              <td><?= $m['tahun_pembelian']; ?></td>
              <td><?= $m['nama_pegawai']; ?></td>
              <td><?= $m['nama_ruangan']; ?></td>

              <td>
                <a href="barang/edit/<?= $m['kode_barang']; ?>" class="btn btn-success btn-sm">Ubah<i class="bi bi-pencil-square"></i></a> | <a 
                href="/barang/delete/<?= $m['kode_barang']; ?>" class="btn btn-danger btn-sm"
                onClick="return confirm('yakin mau hapus data <?= $m['nama_barang']; ?>'); ">Delete<i class="bi bi-calendar-x"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
<?= $this->endSection(); ?>