<div id="wrapper">
  <?php $this->load->view('layout/sidebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php $this->load->view('layout/navbar'); ?>
      <div class="container-fluid">
        <div class="card shadow ">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Management Admin</h6>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <a href="#" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#userModal" onclick="clearForm()">
              <i class="fas fa-plus"></i> Tambah
            </a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="5%" class="text-center">No</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Level</th>
                    <th width="5%" class="text-center">Edit</i></th>
                    <th width="5%" class="text-center">Delete</i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($dataAdmin as $row) : ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td><?= $row["nama_user"]  ?></td>
                      <td><?= $row["email_user"]  ?></td>
                      <td><?= $row["level_user"]  ?></td>
                      <td>
                        <a href="#" class="text-success" data-toggle="modal" data-target="#userModal" onclick="ubahData(<?= $row['id_user'] ?>)">
                          <i class="fas fa-pen" aria-hidden="true"></i>
                        </a>
                      </td>
                      <td>
                        <a href="<?= base_url("admin/deleteAdmin/") . $row["id_user"]  ?>" class="text-danger" onclick="return confirm('Yakin menghapus data ini ..? ')">
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

        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?= base_url("admin/addAdmin") ?>" method="post">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">User</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <input type="text" id="id_user" class="form-control" name="id_user" hidden>
                  <div class="form-group">
                    <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                    <input type="text" id="username" class="form-control" name="username" placeholder="Masukan Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" id="password1" class="form-control" name="password1" placeholder="Masukan Password">
                  </div>
                  <div class="form-group">
                    <input type="password" id="password2" class="form-control" name="password2" placeholder="Retype Password">
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
    $.getJSON('<?php echo base_url("admin/editAdmin/"); ?>' + id, function(data) {
      data = data.dataAdmin;
      console.log(data);
      $.each(data, function(i, data) {
        $("#id_user").val(data.id_user);
        $("#nama").val(data.nama_user);
        $("#username").val(data.email_user);
      });
    });
  }

  function clearForm() {
    $("#id_user").val("");
    $("#nama").val("");
    $("#username").val("");
  }
</script>