<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg">
      <h1 class="h1 mb-4 text-gray-900"><?= $title; ?></h1>
      <a href="<?= base_url('admin') ?>" class="btn btn-md btn-info mb-2">Kembali</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-7 ml-auto mb-3 float-right">
      <form action="" method="GET">
        <div class="row">
          <div class="col-5 offset-2">
            <input type="month" name="waktu" value="<?php echo date('Y-m') ?>" class="form-control">
          </div>
          <div class="col-3">
            <select class="form-control" name="dept">
              <option disabled>Department</option>
              <?php foreach ($department as $d) : ?>
                <option value="<?= $d['id']; ?>"><?= $d['id']; ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('dept', '<small class="text-danger pl-3">', '</small>') ?>

          </div>
          <div class="col-2">
            <button type="submit" class="btn btn-success btn-fill btn-block">Tampilkan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- End of row show -->
  <?php if ($attendance == false) : ?>
    <h3 class="text-center">Tidak ada data, silahkan memilih departemen perusahaan</h3>
  <?php else : ?>
    <?php if ($attendance != null) : ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Kehadiran</h6>
            <?php if ( !empty($dept) && !empty( $waktu ) ) : ?>
            <a href="<?= base_url('report/report_task/?waktu='.$waktu.'&dept='. $dept) ?>" target="blank" class="d-none d-sm-inline-block btn btn-sm btn-danger ml-2 shadow-sm float-right"><i class="fas fa-download fa-sm text-white"></i> Generate Laporan</a>
            <?php endif; ?>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-info text-white">
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ( $attendance AS $index => $row ) : ?>
                <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td><?php echo $row->department_id . $row->id ?></td>
                    <td><?php echo $row->name ?></td>
                    <td><?php echo $row->total_task > 0 ? $row->total_task . ' link' : '-';  ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->