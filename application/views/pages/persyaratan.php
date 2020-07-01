<div id="wrapper">
  <?php $this->load->view('layout/sidebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php $this->load->view('layout/navbar'); ?>
      <div class="container-fluid">

        <?php if ($this->session->userdata("user_level") == "User") : ?>
          <div class="card shadow ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Persyaratan</h6>
            </div>
            <div class="card-body">
              <h5><strong>Berikut ini adalah beberapa persyaratan</strong></h5>
              <?php $no = 1; ?>
              <?php foreach ($dataPersyaratan as $row) : ?>
                <h6 class="mb-0"><?= $no++ . " " . $row["persyaratan"]  ?></h6>
              <?php endforeach ?>
            </div>
          </div>
        <?php else :  ?>
          <div class="card shadow ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Management Persyaratan</h6>
            </div>
            <div class="card-body">
              <a href="#" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#syaratModal" onclick="clearForm()">
                <i class="fas fa-plus"></i> Tambah
              </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%" class="text-center">No</th>
                      <th width="85%" class="text-center">Persyaratan</th>
                      <th width="10%" class="text-center" colspan="2">Aksi</i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dataPersyaratan as $row) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row["persyaratan"]  ?></td>
                        <td>
                          <a href="#" class="text-success" data-toggle="modal" data-target="#syaratModal" onclick="ubahData(<?= $row['id_persyaratan']  ?>)">
                            <i class="fas fa-pen" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td>
                          <a href="<?= base_url("home/deletePersyaratan/") . $row["id_persyaratan"]  ?>" class="text-danger" onclick="return confirm('Yakin menghapus data ini ..? ')">
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

          <div class="modal fade" id="syaratModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?= base_url("home/addPersyaratan") ?>" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Persyaratan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="text" id="id_persyaratan" class="form-control" name="id_persyaratan" hidden>
                    <div class="form-group">
                      <input type="text" id="persyaratan" class="form-control" name="persyaratan" placeholder="Masukan Persyaratan" required>
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

        <?php endif  ?>
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
    $.getJSON('<?php echo base_url("home/editPersyaratan/"); ?>' + id, function(data) {
      data = data.dataPersyaratan;
      $.each(data, function(i, data) {
        $("#id_persyaratan").val(data.id_persyaratan);
        $("#persyaratan").val(data.persyaratan);
      });
    });
  }

  function clearForm() {
    $("#id_persyaratan").val("");
    $("#persyaratan").val("");
  }
</script>