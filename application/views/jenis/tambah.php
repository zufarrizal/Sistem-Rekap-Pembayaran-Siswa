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
                            <div class="form-group">
                                <label for="jenisp">Jenis Pembayaran</label><small class="text-danger"><?= form_error('jenisp'); ?></small>
                                <input type="text" class="form-control" id="jenisp" name="jenisp" placeholder="Jenis Pembayaran" value="<?= set_value('jenisp'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label><small class="text-danger"><?= form_error('total'); ?></small>
                                <input type="text" class="form-control" id="total" name="total" placeholder="Total" value="<?= set_value('total'); ?>">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button>
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