<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data <?= $title ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><?= $title ?></a></li>
        </ol>
    </section>

    <section class="content-header">
        <a href="<?= base_url('siswa/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Tabel <?= $title ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NISS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Kontrol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($siswa as $sw) : ?>
                                    <?php
                                    $idsw = $sw['id_siswa'];
                                    $qkelas = "SELECT *
                                        FROM `kelas` JOIN `siswa`
                                        ON `kelas`.`id_kelas` = `siswa`.`kelas`
                                        ";
                                    $kelasqu = $this->db->query($qkelas)->result_array();
                                    ?>
                                <?php endforeach; ?>
                                <?php if ($siswa != null) : ?>
                                    <?php foreach ($kelasqu as $qu) : ?>
                                        <tr>
                                            <td><?= $qu['niss']; ?></td>
                                            <td><?= $qu['nama']; ?></td>
                                            <td><?= $qu['nkelas'] . $qu['sub']; ?></td>
                                            <td>
                                                <a href="<?= base_url('siswa/ubah/') . $qu['id_siswa']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                                                <a href="<?= base_url('siswa/hapus/') . $qu['id_siswa']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus?')"><i class=" fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NISS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Kontrol</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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