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
                                <label for="kelas">Kelas</label><small class="text-danger"><?= form_error('kelas'); ?></small>
                                <select class="form-control" style="width: 100%;" id="kelas" name="kelas">
                                    <?php foreach ($kelas as $kls) : ?>
                                        <?php if ($lastClass != $kls['nkelas']) : ?>
                                            <option value="<?= $kls['nkelas']; ?>"><?= $kls['nkelas']; ?></option>
                                        <?php endif; ?>
                                        <?php $lastClass = $kls['nkelas']; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label><small class="text-danger"><?= form_error('jenis'); ?></small>
                                <select class="form-control" style="width: 100%;" id="jenis" name="jenis">
                                    <?php foreach ($jenis as $jns) : ?>
                                        <option value="<?= $jns['id_jenis'] ?>"><?= $jns['jenisp']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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