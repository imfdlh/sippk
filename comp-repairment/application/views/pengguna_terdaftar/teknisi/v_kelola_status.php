<section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PERBAIKAN SEDANG DIPROSES TEKNISI: <?php echo $pengguna['nama_lengkap']?>
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo $this->session->flashdata('berhasilperbarui');?>
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
                                            <th>Ubah</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Tiket</th>
                                            <th>No. Inventaris</th>
                                            <th>Keluhan</th>
                                            <th>Diagnosa Awal</th>
                                            <th>Tindakan Lanjut</th>
                                            <th>Telah diproses selama</th>
                                            <th>Teknisi</th>
                                            <th>Ubah</th>
                                        </tr>
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
                                            <td>
                                                <div>
                                                    <a href="<?=base_url('teknisi/update/'.$row->no_tiket);?>" class="btn btn-primary waves-effect">
                                                        <i class="material-icons">mode_edit</i>
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
            <!-- #END# Widgets -->
            
        </div>
    </section>