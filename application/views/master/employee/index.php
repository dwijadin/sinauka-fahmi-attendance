        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg-3">
              <a href="<?= base_url('master/a_employee'); ?>" class="btn btn-info btn-icon-split mb-4">
                <span class="icon text-white-600">
                  <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Tambah Karyawan Baru</span>
              </a>
            </div>
            <div class="col-lg-3">
              <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-calendar"></i> Lihat Kontrak Pegawai
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo base_url('master/employee') ?>">Keseluruhan</a>
                    <?php for ( $i = 1; $i <= 12; $i++ ) : ?>  
                    <a class="dropdown-item" href="<?php echo base_url('master/employee?contract=m&time='. $i) ?>"><?php echo $i . " bulan"; ?></a>
                    <?php endfor; ?>
                    <a class="dropdown-item" href="<?php echo base_url('master/employee?contract=1y') ?>">Lebih dari setahun</a>
                  </div>
              </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <!-- Data Table employee-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Karyawan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Shift</th>
                      <th>Jenis kelamin</th>
                      <th>Gambar</th>
                      <th>Tgl Lahir</th>
                      <th>Tgl.Kontrak</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($employee as $emp) :
                    ?>
                      <?php if ($emp['shift_id'] == 0) {
                        continue;
                      } ?>
                      <tr>
                        <td class=" align-middle"><?= $i++; ?></td>
                        <td class=" align-middle"><?= $emp['id']; ?></td>
                        <td class=" align-middle"><?= $emp['name']; ?></td>
                        <td class=" align-middle"><?= $emp['shift_id']; ?></td>
                        <td class=" align-middle"><?php if ($emp['gender'] == 'M') {
                                                    echo 'Male';
                                                  } else {
                                                    echo 'Female';
                                                  }; ?></td>
                        <td class="text-center"><img src="<?= base_url('images/pp/') . $emp['image']; ?>" style="width: 55px; height:55px" class="img-rounded"></td>
                        <td class=" align-middle"><?= $emp['birth_date']; ?></td>
                        <td class=" align-middle"><?= $emp['hire_date']; ?> <br><code>sampai</code> <br><?= $emp['hire_end_date'] ?? " -"; ?></td>
                        <td class="text-center align-middle">
                          <a href="<?= base_url('master/e_employee/') . $emp['id'] ?>" class="btn btn-primary btn-circle">
                            <span class="icon text-white" title="Edit">
                              <i class="fas fa-edit"></i>
                            </span>
                          </a> |
                          <a href="<?= base_url('master/d_employee/') . $emp['id'] ?>" class="btn btn-danger btn-circle" onclick="return confirm('Deleted employee will lost forever. Still want to delete?')">
                            <span class="icon text-white" title="Delete">
                              <i class="fas fa-trash-alt"></i>
                            </span>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->