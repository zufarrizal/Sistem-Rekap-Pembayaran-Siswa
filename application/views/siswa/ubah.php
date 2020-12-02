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
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $siswa['id_siswa'] ?>">
                            <div class="form-group">
                                <label for="niss">NISS</label><small class="text-danger"><?= form_error('niss'); ?></small>
                                <input type="text" class="form-control" id="niss" name="niss" placeholder="Nomor Induk Sekolah Siswa" value="<?= $siswa['niss'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap Siswa</label><small class="text-danger"><?= form_error('nama'); ?></small>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Siswa" value="<?= $siswa['nama'] ?>">
                            </div>
                            <div class=" form-group">
                                <label for="kelas">Kelas</label><small class="text-danger"><?= form_error('kelas'); ?></small>
                                <select class="form-control" style="width: 100%;" id="kelas" name="kelas">
                                    <?php foreach ($kelas as $kls) : ?>
                                        <?php if ($kls['id_kelas'] == $siswa['kelas']) : ?>
                                            <option selected value="<?= $kls['id_kelas'] ?>"><?= $kls['nkelas'] . $kls['sub'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nkelas'] . $kls['sub'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
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