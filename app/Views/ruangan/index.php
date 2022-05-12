<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<    <div class="container mt-5">
      <h1 class="d-flex justify-content-center">Data ruangan</h1>
      <a href="/ruangan/create" type="button" class="btn btn-primary">Tambah Data <i class="bi bi-plus"></i></a>
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
              <th>Kode Ruangan</th>
              <th>Nama Ruangan</th>
              <th>Lokasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            <?php foreach ($ruangan as $r) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $r['kode_ruangan']; ?></td>
              <td><?= $r['nama_ruangan']; ?></td>
              <td><?= $r['lokasi']; ?></td>


              <td>
                <a href="/ruangan/edit/<?= $r['kode_ruangan']; ?>"  class="btn btn-success btn-sm">Ubah<i class="bi bi-pencil-square"></i></a> | <a 
                href="/ruangan/delete/<?= $r['kode_ruangan']; ?>" class="btn btn-danger btn-sm"
                onClick="return confirm('yakin mau hapus data <?= $r['nama_ruangan']; ?>'); ">Delete<i class="bi bi-calendar-x"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>



<?= $this->endSection(); ?>