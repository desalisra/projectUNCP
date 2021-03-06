<div id="wrapper">
  <?php $this->load->view('layout/sidebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php $this->load->view('layout/navbar'); ?>
      <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php if ($this->session->userdata("user_level") == "User") : ?>
          <div class="card shadow ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Lokasi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="10%" class="text-center">No</th>
                      <th>Program Studi</th>
                      <th>Instansi</th>
                      <th>Telepon Instansi</th>
                      <th>Alamat Instansi</th>
                      <th width="15%">Kuota Tampung</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dataLokasi as $row) : ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row["prodi_lokasi"]  ?></td>
                        <td><?= $row["instansi_lokasi"]  ?></td>
                        <td><?= $row["telepon_lokasi"]  ?></td>
                        <td><?= $row["alamat_lokasi"]  ?></td>
                        <td><?= $row["pendaftar"] . " / " . $row["kuota_lokasi"] . " Mahasiswa" ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php else : ?>
          <div class="card shadow ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Management Lokasi</h6>
            </div>
            <div class="card-body">
              <a href="#" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#lokasiModal" onclick="clearForm()">
                <i class="fas fa-plus"></i> Tambah
              </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%" class="text-center">No</th>
                      <th class="text-center">Program Studi</th>
                      <th class="text-center">Instansi</th>
                      <th class="text-center">Telepon Instansi</th>
                      <th class="text-center">Alamat Instansi</th>
                      <th width="10%" class="text-center">Kuota</th>
                      <th width="5%" class="text-center">Edit</i></th>
                      <th width="5%" class="text-center">Delete</i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dataLokasi as $row) : ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row["prodi_lokasi"]  ?></td>
                        <td><?= $row["instansi_lokasi"]  ?></td>
                        <td><?= $row["telepon_lokasi"]  ?></td>
                        <td><?= $row["alamat_lokasi"]  ?></td>
                        <td class="text-center"><?= $row["pendaftar"]  ?> / <?= $row["kuota_lokasi"]  ?></td>
                        <td class="text-center">
                          <a href="#" class="text-success" data-toggle="modal" data-target="#lokasiModal" onclick="ubahData(<?= $row['id_lokasi'] ?>)">
                            <i class="fas fa-pen" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td class="text-center">
                          <a href="<?= base_url("lokasi/deleteLokasi/") . $row["id_lokasi"]  ?>" class="text-danger" onclick="return confirm('Yakin menghapus data ini ..? ')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal fade" id="lokasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?= base_url("lokasi/addLokasi") ?>" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lokasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="text" id="id_lokasi" class="form-control" name="id_lokasi" hidden>
                    <div class="form-group">
                      <input type="text" id="prodi" class="form-control" name="prodi" placeholder="Masukan Program Studi" required>
                    </div>
                    <div class="form-group">
                      <input type="text" id="instansi" class="form-control" name="instansi" placeholder="Masukan Instansi" required>
                    </div>
                    <div class="form-group">
                      <input type="number" id="tlp-instansi" class="form-control" name="tlp-instansi" placeholder="Masukan Telepon Instansi" required>
                    </div>
                    <div class="form-group">
                      <input type="text" id="alamat-instansi" class="form-control" name="alamat-instansi" placeholder="Masukan Alamat Instansi" required>
                    </div>
                    <div class="form-group">
                      <input type="number" id="kuota" class="form-control" name="kuota" placeholder="Masukan Kuota" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endif ?>
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


<script>
  function ubahData(id) {
    $.getJSON('<?php echo base_url("lokasi/editLokasi/"); ?>' + id, function(data) {
      data = data.dataLokasi;
      $.each(data, function(i, data) {
        $("#id_lokasi").val(data.id_lokasi);
        $("#prodi").val(data.prodi_lokasi);
        $("#instansi").val(data.instansi_lokasi);
        $("#tlp-instansi").val(data.telepon_lokasi);
        $("#alamat-instansi").val(data.alamat_lokasi);
        $("#kuota").val(data.kuota_lokasi);
      });
    });
  }

  function clearForm() {
    $("#id_lokasi").val("");
    $("#prodi").val("");
    $("#instansi").val("");
    $("#tlp-instansi").val("");
    $("#alamat-instansi").val("");
    $("#kuota").val("");
  }
</script>