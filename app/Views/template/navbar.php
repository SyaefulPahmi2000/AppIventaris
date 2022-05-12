<nav style="width: 100%; position: fixed; top: 0px;" class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-door"></i>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/barang"><i class="bi bi-box-seam"></i>Data Barang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pegawai"><i class="bi bi-file-person"></i>Data Pegawai</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ruangan"><i class="bi bi-file-person"></i>Data ruangan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/peminjaman"><i class="bi bi-file-person"></i>Peminjaman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout') ?>">Log Out</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>