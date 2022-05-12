<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<    <div class="container mt-5">
      <h1 class="d-flex justify-content-center">Data Pegawai</h1>
      <a href="/pegawai/create" type="button" class="btn btn-primary">Tambah Data <i class="bi bi-plus"></i></a>
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
              <th>Foto</th>
              <th>Nama Pegawai</th>
              <th>No Hp</th>
              <th>alamat</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            <?php foreach ($pegawai as $n) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><img src="<?= base_url(); ?>/assets/img/<?= $n['poto']; ?>"  width="50px" alt="" class="img-thumbnail"></td>
              <td><?= $n['nama_pegawai']; ?></td>
              <td><?= $n['no_hp']; ?></td>
              <td><?= $n['alamat']; ?></td>
              <td><?= $n['jabatan']; ?></td>

              <td>
                <a href="/pegawai/edit/<?= $n['id_pegawai']; ?>" class="btn btn-success btn-sm">Ubah<i class="bi bi-pencil-square"></i></a> | <a 
                href="/pegawai/delete/<?= $n['id_pegawai']; ?>" class="btn btn-danger btn-sm"
                onClick="return confirm('yakin mau hapus data <?= $n['nama_pegawai']; ?>'); ">Delete<i class="bi bi-calendar-x"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>



<?= $this->endSection(); ?>