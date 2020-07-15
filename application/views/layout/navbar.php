<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>
  <h5 class="text-center"><strong>INFORMASI PENDAFTARAN PKL FAKULTAS SAINS UNCP</strong> </h5>
  <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata("user_nama"); ?></span>
        <i class="fas fa-user"></i>
      </a>

      <?php if ($this->session->userdata("user_level") == "Admin") : ?>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= base_url('admin') ?>">
            <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
            Management Admin
          </a>
        </div>
      <?php endif ?>
    </li>
  </ul>
</nav>