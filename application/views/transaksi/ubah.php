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
                    <div class="box-body">
                        <form role="form" method="POST" action="">
                            <div class="box-body">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $transaksi['id_trx'] ?>">
                                <div class="form-group">
                                    <label for="niss">NISS</label><small class="text-danger"><?= form_error('niss'); ?></small>
                                    <input type="text" class="form-control" id="niss" name="niss" value="<?= $transaksi['niss']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label><small class="text-danger"><?= form_error('nama'); ?></small>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $transaksi['nama']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label><small class="text-danger"><?= form_error('jenis'); ?></small>
                                    <select class="custom-select select2" id="jenis" name="jenis" style="width: 100%;">
                                        <?php foreach ($jenis as $jns) : ?>
                                            <?php if ($jns['jenisp'] == $transaksi['jenis']) : ?>
                                                <option selected value="<?= $jns['jenisp']; ?>"><?= $jns['jenisp']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $jns['jenisp']; ?>"><?= $jns['jenisp']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nominal">Nominal</label><small class="text-danger"><?= form_error('nominal'); ?></small>
                                    <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal" value="<?= $transaksi['nominal'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label><small class="text-danger"><?= form_error('tanggal'); ?></small>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control pull-right" id="tanggal" name="tanggal" value="<?= $transaksi['tanggal'] ?>">
                                    </div>
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