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
            <form action="<?= base_url('home/daftar') ?>" method="POST">
              <?php foreach ($dataPendaftar as $row) : ?>
                <input type="hidden" class="form-control " id="id_pendaftar" name="id_pendaftar" value="<?= $row["id_pendaftaran"] ?>">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control " id="nama" name="nama" value="<?= $row["nama_pendaftar"] ?>" required>
                </div>

                <div class="form-group">
                  <label for="nim">NIM</label>
                  <input type="number" class="form-control" id="nim" name="nim" value="<?= $row["nim_pendaftar"] ?>" required>
                </div>

                <div class="form-group">
                  <label for="prodi">Program Studi</label>
                  <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $row["prodi_pendaftar"] ?>" required>
                </div>

                <div class="form-group">
                  <label for="kelamin">Jenis Kelamin</label>
                  <select class="form-control" id="kelamin" name="kelamin">
                    <option value="L" <?= ($row["jk_pendaftar"] == "L") ? "selected" : "" ?>>Laki - Laki</option>
                    <option value="P" <?= ($row["jk_pendaftar"] == "P") ? "selected" : "" ?>>Perempuan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="instansi">Instansi</label>
                  <select class="form-control" id="instansi" name="instansi">
                    <?php foreach ($dataInstansi as $row1) : ?>
                      <?php
                      if ($row["instansi_pendaftar"] == $row1["id_lokasi"]) {
                        $selected = "selected";
                      } else {
                        $selected = "";
                      }
                      ?>
                      <option value="<?= $row1["id_lokasi"] ?>" <?= $selected ?>><?= $row1["instansi_lokasi"] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="telepon">No Telepon</label>
                  <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $row["tlp_pendaftar"] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
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