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

    <section class="content-header">
        <a href="<?= base_url('transaksi/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabel <?= $title ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NISS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Kekurangan</th>
                                    <th>Tanggal</th>
                                    <th class="hilang">Kontrol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $trx) : ?>
                                    <?php
                                    $idtrx = $trx['id_trx'];
                                    $qkelas = "SELECT *
                                        FROM `kelas` JOIN `transaksi`
                                        ON `kelas`.`id_kelas` = `transaksi`.`kelas`
                                        ";
                                    $kelasqu = $this->db->query($qkelas)->result_array();
                                    ?>
                                <?php endforeach; ?>
                                <?php if ($transaksi != null) : ?>
                                    <?php foreach ($kelasqu as $qu) : ?>
                                        <tr>
                                            <td><?= $qu['id_trx']; ?></td>
                                            <td><?= $qu['niss']; ?></td>
                                            <td><?= $qu['nama']; ?></td>
                                            <td><?= $qu['nkelas'] . $qu['sub']; ?></td>
                                            <td><?= $qu['jenis']; ?></td>
                                            <td>Rp. <?= $qu['nominal']; ?>,-</td>
                                            <?php if ($qu['status'] != 0) : ?>
                                                <td><span class="label label-success">Lunas</span></td>
                                            <?php else : ?>
                                                <td><span class="label label-danger">Belum Lunas</span></td>
                                            <?php endif; ?>
                                            <td>Rp. <?= $qu['kurang']; ?>,-</td>
                                            <td><?= $qu['tanggal']; ?></td>
                                            <td class="hilang">
                                                <a href="<?= base_url('transaksi/ubah/') . $qu['id_trx']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                                                <a href="<?= base_url('transaksi/hapus/') . $qu['id_trx']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus?')"><i class=" fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>NISS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Kekurangan</th>
                                    <th>Tanggal</th>
                                    <th class="hilang">Kontrol</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-primary" onclick="myFunction()"><i class="fa fa-print"></i> Cetak</button>
                        <script>
                            function myFunction() {
                                window.print();
                            }
                        </script>
                    </div>
                    <!-- /.box-footer -->
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

<style>
    @media print {
        .hilang {
            display: none;
        }
    }
</style>