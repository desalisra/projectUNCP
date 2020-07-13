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
              <h4 class="text-center"><strong>Jadwal PKL</strong></h4>
              <div class="table-responsive-md">
                <table class="table">
                  <thead>
                    <tr>
                      <th width="5%" class="text-center" scope="col">No</th>
                      <th width="25%" scope="col">Nama Mahasiswa</th>
                      <th scope="col">Instansi</th>
                      <th scope="col">Waktu Mulai</th>
                      <th scope="col">Waktu Selesai</th>
                      <th width="25%" scope="col">Dosen Pembimbing</th>
                      <th width="5%" class="text-center" scope="col">Print</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dataJadwal as $row) : ?>
                      <tr>
                        <th class="text-center" scope="row"><?= $no++ ?></th>
                        <td><?= $row["nama_pendaftar"] ?></td>
                        <td><?= $row["instansi_lokasi"] ?></td>
                        <td><?= (is_null($row["mulai_jadwal"])) ? "Menunggu jadwal dari TU" : $row["mulai_jadwal"] ?></td>
                        <td><?= (is_null($row["selesai_jadwal"])) ? "Menunggu jadwal dari TU" : $row["selesai_jadwal"] ?></td>
                        <td><?= (is_null($row["pembimbing_jadwal"])) ? "Menunggu jadwal dari TU" : $row["pembimbing_jadwal"] ?></td>
                        <td class="text-center">
                          <a href="<?= base_url('jadwal/exportPDF/') . $row["id_pendaftaran"] ?>" target="_balnk"><i class="fas fa-print"></i></a>
                        </td>
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
              <h6 class="m-0 font-weight-bold text-primary">Management Jadwal</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataJadwal" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%" class="text-center">No</th>
                      <th class="text-center">NIM</th>
                      <th class="text-center">Nama Mahasiswa</th>
                      <th class="text-center">Jenis Kelamin</th>
                      <th class="text-center">Program Studi</th>
                      <th class="text-center">Instansi</th>
                      <th class="text-center">Status</th>
                      <th width="5%" class="text-center">Jadwalkan</i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($dataPendaftar as $row) : ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row["nim_pendaftar"] ?></td>
                        <td><?= $row["nama_pendaftar"] ?></td>
                        <td><?= ($row["jk_pendaftar"] == "L") ? "Laki - Laki" : "Perempuan" ?> </td>
                        <td><?= $row["prodi_pendaftar"] ?></td>
                        <td><?= $row["instansi_lokasi"] ?></td>
                        <td><?= ($row["status_pendaftar"] > 0) ? "Terjadwal" : "Menunggu Jadwal" ?></td>
                        <td class="text-center">
                          <a href="#" class="text-success" data-toggle="modal" data-target="#lokasiModal" onclick="ubahData(<?= $row['id_pendaftaran'] ?>)">
                            <i class="fas fa-calendar-plus"></i>
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
                <form action="<?= base_url("jadwal/addJadwal") ?>" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jadwal</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="text" id="id_pendaftar" class="form-control" name="id_pendaftar" hidden>
                    <div class="form-group">
                      <input type="text" id="nim" class="form-control" name="nim" disabled>
                    </div>
                    <div class="form-group">
                      <input type="text" id="nama" class="form-control" name="nama" disabled>
                    </div>
                    <div class="form-group">
                      <span>Tanggal Mulai</span>
                      <input type="date" id="mulai_jadwal" class="form-control" name="mulai_jadwal" placeholder="Masukan Program Studi" required>
                    </div>
                    <div class="form-group">
                      <span>Tanggal Selesai</span>
                      <input type="date" id="selesai_jadwal" class="form-control" name="selesai_jadwal" placeholder="Masukan Program Studi" required>
                    </div>
                    <div class="form-group">
                      <input type="text" id="pembimbing" class="form-control" name="pembimbing" placeholder="Masukan Dosen Pembimbing" required>
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
    clearForm();
    $.getJSON('<?php echo base_url("jadwal/editJadwal/"); ?>' + id, function(data) {
      data = data.dataPendaftar;

      $.each(data, function(i, data) {
        $("#id_pendaftar").val(data.id_pendaftaran);
        $("#nim").val(data.nim_pendaftar);
        $("#nama").val(data.nama_pendaftar);
      });
    });
  }

  function clearForm() {
    $("#id_lokasi").val("");
    $("#prodi").val("");
    $("#instansi").val("");
  }
</script>