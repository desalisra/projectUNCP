<div id="wrapper">
  <?php $this->load->view('layout/sidebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php $this->load->view('layout/navbar'); ?>
      <div class="container">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
          <div class="card-header py-3">
            <h4 class="text-center"><strong>Form Pendaftaran</strong></h4>
            <form action="<?= base_url('pendaftaran/validasiInput') ?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control" id="id_pendaftar" name="id_pendaftar" value="">
              <P><strong>Data Calon Mahasiswa PKL</strong></P>

              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control <?= (strlen(form_error('nim')) > 0) ? "is-invalid" : "" ?>" id="nim" name="nim" value="<?= set_value("nim") ?>">
                <div class="invalid-feedback">
                  <?= form_error('nim', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control <?= (strlen(form_error('nama')) > 0) ? "is-invalid" : "" ?>" id="nama" name="nama" value="<?= set_value("nama") ?>">
                <div class="invalid-feedback">
                  <?= form_error('nama', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tempat-lahir">Tempat Lahir</label>
                <input type="text" class="form-control <?= (strlen(form_error('tempat-lahir')) > 0) ? "is-invalid" : "" ?>" id="tempat-lahir" name="tempat-lahir" value="<?= set_value("tempat-lahir") ?>">
                <div class="invalid-feedback">
                  <?= form_error('tempat-lahir', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal-lahir">Tanggal Lahir</label>
                <input type="date" class="form-control <?= (strlen(form_error('tanggal-lahir')) > 0) ? "is-invalid" : "" ?>" id="tanggal-lahir" name="tanggal-lahir" value="<?= set_value("tanggal-lahir") ?>">
                <div class="invalid-feedback">
                  <?= form_error('tanggal-lahir', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="kelamin">Jenis Kelamin</label>
                <select class="form-control <?= (strlen(form_error('kelamin')) > 0) ? "is-invalid" : "" ?>" id="kelamin" name="kelamin" value="<?= set_value("kelamin") ?>">
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('kelamin', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" class="form-control <?= (strlen(form_error('agama')) > 0) ? "is-invalid" : "" ?>" id="agama" name="agama" value="<?= set_value("agama") ?>">
                <div class="invalid-feedback">
                  <?= form_error('agama', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="telepon">No Telepon</label>
                <input type="number" class="form-control <?= (strlen(form_error('telepon')) > 0) ? "is-invalid" : "" ?>" id="telepon" name="telepon" value="<?= set_value("telepon") ?>">
                <div class="invalid-feedback">
                  <?= form_error('telepon', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat Lengkap</label>
                <input type="text" class="form-control <?= (strlen(form_error('alamat')) > 0) ? "is-invalid" : "" ?>" name="alamat" id="alamat" value="<?= set_value("alamat") ?>">
                <div class="invalid-feedback">
                  <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <hr>
              <P><strong>Data Orang Tua / Wali</strong></P>
              <div class="form-group">
                <label for="nama-wali">Nama Wali</label>
                <input type="text" class="form-control <?= (strlen(form_error('nama-wali')) > 0) ? "is-invalid" : "" ?> " id="nama-wali" name="nama-wali" value="<?= set_value("nama-wali") ?>">
                <div class="invalid-feedback">
                  <?= form_error('nama-wali', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="alamat-wali">Alamat Wali</label>
                <input class="form-control <?= (strlen(form_error('alamat-wali')) > 0) ? "is-invalid" : "" ?>" name="alamat-wali" id="alamat-wali" value="<?= set_value("alamat-wali") ?>">
                <div class="invalid-feedback">
                  <?= form_error('alamat-wali', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="telepon-wali">No Telepon</label>
                <input type="number" class="form-control <?= (strlen(form_error('telepon-wali')) > 0) ? "is-invalid" : "" ?> " id="telepon-wali" name="telepon-wali" value="<?= set_value("telepon-wali") ?>">
                <div class="invalid-feedback">
                  <?= form_error('telepon-wali', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="pendidikan-wali">Pendidikan Wali</label>
                <input type="text" class="form-control <?= (strlen(form_error('pendidikan-wali')) > 0) ? "is-invalid" : "" ?> " id="pendidikan-wali" name="pendidikan-wali" value="<?= set_value("pendidikan-wali") ?>">
                <div class="invalid-feedback">
                  <?= form_error('pendidikan-wali', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="pekerjaan-wali">Pekerjaan Wali</label>
                <input type="text" class="form-control <?= (strlen(form_error('pekerjaan-wali')) > 0) ? "is-invalid" : "" ?> " id="pekerjaan-wali" name="pekerjaan-wali" value="<?= set_value("pekerjaan-wali") ?>">
                <div class="invalid-feedback">
                  <?= form_error('pekerjaan-wali', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>
              <hr>
              <P><strong>Data Program Studi / Tempat PKL</strong></P>
              <div class="form-group">
                <label for="prodi">Program Studi</label>
                <select class="form-control <?= (strlen(form_error('prodi')) > 0) ? "is-invalid" : "" ?>" id="prodi" name="prodi" value="<?= set_value("prodi") ?>">
                  <option value="">Pilih Program Studi</option>
                  <?php foreach ($dataProdi as $row) : ?>
                    <option value="<?= $row["prodi_lokasi"] ?>"><?= $row["prodi_lokasi"] ?></option>
                  <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('prodi', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="instansi">Instansi</label>
                <select class="form-control <?= (strlen(form_error('instansi')) > 0) ? "is-invalid" : "" ?>" id="instansi" name="instansi" value="<?= set_value("instansi") ?>">
                  <option value="">Pilih Instansi</option>
                  <?php foreach ($dataInstansi as $row) : ?>
                    <option value="<?= $row["id_lokasi"] ?>"><?= $row["instansi_lokasi"] ?></option>
                  <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('instansi', '<small class="text-danger pl-2">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="bukti-pembayaran">Upload Bukti Pembayaran</label>
                <input type="file" class="d-block" id="bukti-pembayaran" name="bukti-pembayaran">
              </div>
              <input type="hidden" class="form-control" id="user_pendaftar" name="user_pendaftar" value="<?= $dataUser ?>">
              <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
          </div>
        </div>
      </div>


      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UNCP 2020</span>
          </div>
        </div>
      </footer>

    </div>
  </div>


  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</div>