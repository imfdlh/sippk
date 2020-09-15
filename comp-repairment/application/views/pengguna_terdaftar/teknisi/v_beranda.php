<section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?=base_url('teknisi/permintaan');?>" style="text-decoration: none;">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">input</i>
                            </div>
                            <div class="content">
                                <div class="text">PERMINTAAN MASUK</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_formulir;?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">PERBAIKAN SELESAI</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_selesai;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">build</i>
                        </div>
                        <div class="content">
                            <div class="text">PERBAIKAN DIPROSES</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_diproses;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">close</i>
                        </div>
                        <div class="content">
                            <div class="text">PERBAIKAN DIHENTIKAN</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_dihentikan;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                Sedang diproses <small>Seluruh permintaan perbaikan yang sedang diproses oleh teknisi: <?php echo $pengguna['no_badgepengguna']?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Tiket</th>
                                            <th>No. Inventaris</th>
                                            <th>Keluhan</th>
                                            <th>Diagnosa Awal</th>
                                            <th>Tindakan Lanjut</th>
                                            <th>Telah diproses selama</th>
                                            <th>Teknisi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $i=1;
                                        ?>

                                        <?php foreach($status_diproses as $row): ?>
                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <td><?php echo $row->no_tiket; ?></td>
                                            <td><?php echo $row->no_inventaris;?></td>
                                            <td><?php echo $row->keluhan;?></td>
                                            <td><?php echo $row->diagnosa_awal;?></td>
                                            <td>
                                                <?php
                                                    if($row->tindakan_lanjut == NULL) {
                                                        echo "Belum";
                                                    }
                                                    else {
                                                        echo $row->tindakan_lanjut;
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row->hitunghari;?> hari</td>
                                            <td><?php echo $row->nama_lengkap;?></td>
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
            <!-- #END# Widgets -->
            
        </div>
    </section>