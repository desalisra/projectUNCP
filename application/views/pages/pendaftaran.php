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
            <form action="<?= base_url('home/daftar') ?>" method="POST">
              <input type="hidden" class="form-control " id="id_pendaftar" name="id_pendaftar" value="">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control " id="nama" name="nama" required>
              </div>

              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" required>
              </div>

              <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" required>
              </div>

              <div class="form-group">
                <label for="kelamin">Jenis Kelamin</label>
                <select class="form-control" id="kelamin" name="kelamin">
                  <option value="">---</option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label for="instansi">Instansi</label>
                <select class="form-control" id="instansi" name="instansi">
                  <option value="">---</option>
                  <?php foreach ($dataInstansi as $row) : ?>
                    <option value="<?= $row["id_lokasi"] ?>"><?= $row["instansi_lokasi"] ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label for="telepon">No Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" required>
              </div>
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