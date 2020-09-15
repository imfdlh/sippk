<section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FORMULIR PERMINTAAN PERBAIKAN MASUK
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php echo $this->session->flashdata('berhasilditambahkan');?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Tiket</th>
                                            <th>No. Badge</th>
                                            <th>Unit Kerja</th>
                                            <th>Jabatan</th>
                                            <th>No. Inventaris</th>
                                            <th>Jenis Perangkat - Merk - Seri</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Tambah</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Tiket</th>
                                            <th>No. Badge</th>
                                            <th>Unit Kerja</th>
                                            <th>Jabatan</th>
                                            <th>No. Inventaris</th>
                                            <th>Jenis Perangkat - Merk - Seri</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Tambah</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($permintaan_masuk as $row): ?>
                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <td>
                                                <a href="<?=base_url('teknisi/formulir/'.$row['no_tiket'])?>" class="detail">
                                                    <?php echo $row['no_tiket']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $row['no_badgepelapor']; ?></td>
                                            <td><?php echo $row['nama_unitkerja']; ?></td>
                                            <td><?php echo $row['nama_jabatan']; ?></td>
                                            <td><?php echo $row['no_inventaris'];?></td>
                                            <td><?php echo $row['nama_jenisperangkat']; ?> - <?php echo $row['nama_merk']; ?> (<?php echo $row['keterangan_seri'];?>)</td>
                                            <td><?php echo date('d/m/Y', strtotime($row['waktu_permintaanmasuk']));?></td>
                                            <td><?php echo date('H:i:s', strtotime($row['waktu_permintaanmasuk']));?></td>
                                            <td>
                                                <div>
                                                    <a href="<?=base_url('teknisi/tambah/'.$row['no_tiket'])?>" class="btn btn-primary waves-effect">
                                                        <i class="material-icons">add</i>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php $i++;?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

        </div>
    </section>
