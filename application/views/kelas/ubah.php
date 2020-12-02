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
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Form <?= $title ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" method="POST" action="">
                        <div class="box-body">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $kelas['id_kelas'] ?>">
                            <div class="form-group">
                                <label for="nkelas">Nama Kelas</label><small class="text-danger"><?= form_error('nkelas'); ?></small>
                                <input type="text" class="form-control" id="nkelas" name="nkelas" placeholder="Nama Kelas" value="<?= $kelas['nkelas'] ?>">
                            </div>
                            <div class=" form-group">
                                <label for="sub">Sub Kelas</label><small class="text-danger"><?= form_error('sub'); ?></small>
                                <input type="text" class="form-control" id="sub" name="sub" placeholder="Sub Kelas" value="<?= $kelas['sub'] ?>">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Ubah</button>
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