<div id="wrapper">
  <?php $this->load->view('layout/sidebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php $this->load->view('layout/navbar'); ?>
      <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php if ($this->session->userdata("user_level") == "Admin") : ?>
          <div class="card shadow ">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Management Program Studi</h6>
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
                      <th width="85%">Program Studi</th>
                      <th width="5%" class="text-center">Edit</i></th>
                      <th width="5%" class="text-center">Delete</i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dataProdi as $row) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row["prodi"]  ?></td>
                        <td class="text-center">
                          <a href="#" class="text-success" data-toggle="modal" data-target="#syaratModal" onclick="ubahData(<?= $row['id_prodi']  ?>)">
                            <i class="fas fa-pen" aria-hidden="true"></i>
                          </a>
                        </td>
                        <td class="text-center">
                          <a href="<?= base_url("prodi/deleteProdi/") . $row["id_prodi"]  ?>" class="text-danger" onclick="return confirm('Yakin menghapus data ini ..? ')">
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
                <form action="<?= base_url("prodi/addProdi") ?>" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prodi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="text" id="id_prodi" class="form-control" name="id_prodi" hidden>
                    <div class="form-group">
                      <input type="text" id="prodi" class="form-control" name="prodi" placeholder="Masukan Prodi" required>
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
    $.getJSON('<?php echo base_url("prodi/editProdi/"); ?>' + id, function(data) {
      data = data.dataProdi;
      $.each(data, function(i, data) {
        $("#id_prodi").val(data.id_prodi);
        $("#prodi").val(data.prodi);
      });
    });
  }

  function clearForm() {
    $("#id_prodi").val("");
    $("#prodi").val("");
  }
</script>