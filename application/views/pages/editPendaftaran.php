<div id="wrapper">
  <?php $this->load->view('layout/sidebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php $this->load->view('layout/navbar'); ?>
      <div class="container">
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow">
          <div class="card-header py-3">
            <h4 class="text-center"><strong>Edit Pendaftaran</strong></h4>
            <form action="<?= base_url('pendaftaran/daftar') ?>" method="POST">
              <?php foreach ($dataPendaftar as $row) : ?>
                <input type="hidden" class="form-control" id="id_pendaftar" name="id_pendaftar" value="<?= $row["id_pendaftaran"] ?>">
                <P><strong>Data Calon Mahasiswa PKL</strong></P>

                <div class="form-group">
                  <label for="nim">NIM</label>
                  <input type="number" class="form-control <?= (strlen(form_error('nim')) > 0) ? "is-invalid" : "" ?>" id="nim" name="nim" value="<?= (strlen(form_error('nim')) > 0) ? set_value("nim") : $row["nim_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('nim', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control <?= (strlen(form_error('nama')) > 0) ? "is-invalid" : "" ?>" id="nama" name="nama" value="<?= (strlen(form_error('nama')) > 0) ? set_value("nama") : $row["nama_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('nama', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tempat-lahir">Tempat Lahir</label>
                  <input type="text" class="form-control <?= (strlen(form_error('tempat-lahir')) > 0) ? "is-invalid" : "" ?>" id="tempat-lahir" name="tempat-lahir" value="<?= (strlen(form_error('tempat-lahir')) > 0) ? set_value("tempat-lahir") : $row["tempat_lahir_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('tempat-lahir', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tanggal-lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control <?= (strlen(form_error('tanggal-lahir')) > 0) ? "is-invalid" : "" ?>" id="tanggal-lahir" name="tanggal-lahir" value="<?= (strlen(form_error('tanggal-lahir')) > 0) ? set_value("tanggal-lahir") : $row["tanggal_lahir_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('tanggal-lahir', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelamin">Jenis Kelamin</label>
                  <select class="form-control <?= (strlen(form_error('kelamin')) > 0) ? "is-invalid" : "" ?>" id="kelamin" name="kelamin" value="<?= set_value("kelamin") ?>">
                    <option value="L" <?= ($row["jk_pendaftar"] == "L") ? "selected" : "" ?>>Laki - Laki</option>
                    <option value="P" <?= ($row["jk_pendaftar"] == "P") ? "selected" : "" ?>>Perempuan</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= form_error('kelamin', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="agama">Agama</label>
                  <input type="text" class="form-control <?= (strlen(form_error('agama')) > 0) ? "is-invalid" : "" ?>" id="agama" name="agama" value="<?= (strlen(form_error('agama')) > 0) ? set_value("agama") : $row["agama_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('agama', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="telepon">No Telepon</label>
                  <input type="number" class="form-control <?= (strlen(form_error('telepon')) > 0) ? "is-invalid" : "" ?>" id="telepon" name="telepon" value="<?= (strlen(form_error('telepon')) > 0) ? set_value("telepon") : $row["telepon_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('telepon', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat Lengkap</label>
                  <textarea class="form-control <?= (strlen(form_error('alamat')) > 0) ? "is-invalid" : "" ?>" name="alamat" id="alamat" rows="5" style="resize: none;"><?= (strlen(form_error('alamat')) > 0) ? set_value("alamat") : $row["alamat_pendaftar"] ?></textarea>
                  <div class="invalid-feedback">
                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <hr>
                <P><strong>Data Orang Tua / Wali</strong></P>
                <div class="form-group">
                  <label for="nama-wali">Nama Wali</label>
                  <input type="text" class="form-control <?= (strlen(form_error('nama-wali')) > 0) ? "is-invalid" : "" ?> " id="nama-wali" name="nama-wali" value="<?= (strlen(form_error('nama-wali')) > 0) ? set_value("nama-wali") : $row["nama_wali_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('nama-wali', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="alamat-wali">Alamat Lengkap</label>
                  <textarea class="form-control <?= (strlen(form_error('alamat-wali')) > 0) ? "is-invalid" : "" ?>" name="alamat-wali" id="alamat-wali" rows="5" style="resize: none;"><?= (strlen(form_error('alamat-wali')) > 0) ? set_value("alamat-wali") : $row["alamat_wali_pendaftar"] ?></textarea>
                  <div class="invalid-feedback">
                    <?= form_error('alamat-wali', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="telepon-wali">No Telepon</label>
                  <input type="number" class="form-control <?= (strlen(form_error('telepon-wali')) > 0) ? "is-invalid" : "" ?> " id="telepon-wali" name="telepon-wali" value="<?= (strlen(form_error('telepon-wali')) > 0) ? set_value("telepon-wali") : $row["telepon_wali_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('telepon-wali', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="pendidikan-wali">Pendidikan Wali</label>
                  <input type="text" class="form-control <?= (strlen(form_error('pendidikan-wali')) > 0) ? "is-invalid" : "" ?> " id="pendidikan-wali" name="pendidikan-wali" value="<?= (strlen(form_error('pendidikan-wali')) > 0) ? set_value("pendidikan-wali") : $row["pendidikan_wali_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('pendidikan-wali', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="pekerjaan-wali">Pekerjaan Wali</label>
                  <input type="text" class="form-control <?= (strlen(form_error('pekerjaan-wali')) > 0) ? "is-invalid" : "" ?> " id="pekerjaan-wali" name="pekerjaan-wali" value="<?= (strlen(form_error('pekerjaan-wali')) > 0) ? set_value("pekerjaan-wali") : $row["pekerjaan_wali_pendaftar"] ?>">
                  <div class="invalid-feedback">
                    <?= form_error('pekerjaan-wali', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>
                <hr>
                <P><strong>Data Program Studi / Tempat PKL</strong></P>
                <div class="form-group">
                  <label for="prodi">Program Studi</label>
                  <select class="form-control <?= (strlen(form_error('prodi')) > 0) ? "is-invalid" : "" ?>" id="prodi" name="prodi" value="<?= (strlen(form_error('prodi')) > 0) ? set_value("prodi") : $row["prodi_pendaftar"] ?>">
                    <option value="matematika" <?= ($row["prodi_pendaftar"] == "matematika") ? "selected" : "" ?>>Matematika</option>
                    <option value="fisika" <?= ($row["prodi_pendaftar"] == "fisika") ? "selected" : "" ?>>Fisika</option>
                    <option value="kimia" <?= ($row["prodi_pendaftar"] == "kimia") ? "selected" : "" ?>>Kimia</option>
                    <option value="biologi" <?= ($row["prodi_pendaftar"] == "biologi") ? "selected" : "" ?>>Biologi</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= form_error('prodi', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="instansi">Instansi</label>
                  <select class="form-control <?= (strlen(form_error('instansi')) > 0) ? "is-invalid" : "" ?>" id="instansi" name="instansi" value="<?= (strlen(form_error('instansi')) > 0) ? set_value("instansi") : $row["instansi_pendaftar"] ?>">
                    <option value="">Pilih Instansi</option>
                    <?php foreach ($dataInstansi as $row1) : ?>
                      <option value="<?= $row1["id_lokasi"] ?>" <?= ($row1["id_lokasi"] == $row["instansi_pendaftar"]) ? "selected" : "" ?>> <?= $row1["instansi_lokasi"] ?> </option>
                    <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= form_error('instansi', '<small class="text-danger pl-2">', '</small>') ?>
                  </div>
                </div>
                <input type="hidden" class="form-control" id="user_pendaftar" name="user_pendaftar" value="<?= $row["user_pendaftar"] ?>">
                <button type="submit" class="btn btn-primary">Edit</button>
              <?php endforeach ?>
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