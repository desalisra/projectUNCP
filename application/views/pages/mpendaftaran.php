<div id="wrapper">
  <?php $this->load->view('layout/sidebar'); ?>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <?php $this->load->view('layout/navbar'); ?>
      <div class="container-fluid">

        <div class="card shadow ">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Management Penfaftaran</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="5%" class="text-center">No</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Nama Mahasiswa</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Program Studi</th>
                    <th class="text-center">Instansi</th>
                    <th class="text-center">Status</th>
                    <th width="3%" class="text-center">Edit</th>
                    <th width="3%" class="text-center">Delete</th>
                    <th width="3%" class="text-center">Print</th>
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
                        <a href="<?= base_url("pendaftaran/editPendaftar/") . $row['id_pendaftaran'] ?>" class="text-success">
                          <i class="fas fa-pen" aria-hidden="true"></i>
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="<?= base_url("pendaftaran/deletePendaftar/") . $row['id_pendaftaran'] ?>" class="text-danger" onclick="return confirm('Yakin menghapus data ini ..? ')">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="<?= base_url('jadwal/exportPDF/') . $row["id_pendaftaran"] ?>" target="_blank" class="text-primary">
                          <i class="fas fa-print" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
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