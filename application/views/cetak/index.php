<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><?= $title ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cetak Per NISS</h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" method="POST" action="<?= base_url('Cetak/perniss'); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control" style="width: 100%;" id="niss" name="niss" required>
                                    <option value="" selected disabled>- Pilih NISS -</option>
                                    <?php foreach ($siswa as $sw) : ?>
                                        <option value="<?= $sw['niss'] ?>"><?= $sw['niss'] . ' - ' . $sw['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cetak Per Kelas</h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" method="POST" action="<?= base_url('Cetak/perkelas'); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control" style="width: 100%;" id="kelas" name="kelas" required>
                                    <option value="" selected disabled>- Pilih Kelas -</option>
                                    <?php foreach ($kelas as $kls) : ?>
                                        <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nkelas'] . $kls['sub'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cetak Per Status</h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" method="POST" action="<?= base_url('Cetak/perstatus'); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <small class="text-danger"><?= form_error('kelas'); ?></small>
                                <select class="form-control" style="width: 100%;" id="kelas" name="kelas" required>
                                    <option value="" selected disabled>- Pilih Kelas -</option>
                                    <?php foreach ($kelas as $kls) : ?>
                                        <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nkelas'] . $kls['sub'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <small class="text-danger"><?= form_error('status'); ?></small>
                                <select class="form-control" style="width: 100%;" id="status" name="status" required>
                                    <option value="" selected disabled>- Pilih Status -</option>
                                    <option value="1">Lunas</option>
                                    <option value="0">Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->