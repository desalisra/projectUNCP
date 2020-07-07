<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block ">
              <img style="display: block; margin: auto; padding-top: 50px;" src="<?= base_url('assets/img/login.png') ?>">
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Selamat Datang !</h1>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" action="<?= base_url('auth/login') ?>" method="post">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control form-control-user <?= (strlen(form_error('username')) > 0) ? "is-invalid" : "" ?>" id="username" name="username">
                    <div class="invalid-feedback">
                      <?= form_error('username', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-user <?= (strlen(form_error('password')) > 0) ? "is-invalid" : "" ?>" id="password" name="password">
                    <div class="invalid-feedback">
                      <?= form_error('password', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  <hr>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>