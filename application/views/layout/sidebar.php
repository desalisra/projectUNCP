<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon ">
      <img src="<?= base_url() ?>assets/img/pp.png">
    </div>
  </a>

  <hr class="sidebar-divider my-0">

  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>">
      <span>Beranda</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('home/pages/persyaratan') ?>">
      <span>Persyaratan</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('home/pages/lokasi') ?>">
      <span>Lokasi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('home/pages/pendaftaran') ?>">
      <span>Pendaftaran</span>
    </a>
  </li>

  <?php if ($this->session->userdata("user_level") == "Admin") : ?>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('home/pages/mpendaftaran') ?>">
        <span>Management Pendaftaran</span>
      </a>
    </li>
  <?php endif ?>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('home/pages/jadwal') ?>">
      <span>Jadwal</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <span>Keluar</span>
    </a>
  </li>
  <hr class="sidebar-divider">
</ul>