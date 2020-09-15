<section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <?php foreach($detail_perbaikan as $row): ?>
                        <div class="header bg-cyan">
                            <h2>
                                Informasi Formulir Permintaan <span class="pull-right label bg-indigo"><?php echo $row->no_tiket; ?></span><small>Informasi detail formulir permintaan...</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No. Tiket</th>
                                            <th>No. Badge Pelapor</th>
                                            <th>Nama Pelapor</th>
                                            <th>Email</th>
                                            <th>Unit Kerja</th>
                                            <th>Jabatan</th>
                                            <th>Lokasi</th>
                                            <th>No. Inventaris</th>
                                            <th>Keterangan Seri</th>
                                            <th>Jenis Perangkat</th>
                                            <th>Merk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td><?php echo $row->no_tiket; ?></td>
                                            <td><?php echo $row->no_badgepelapor; ?></td>
                                            <td><?php echo $row->nama_pelapor; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->nama_unitkerja; ?></td>
                                            <td><?php echo $row->nama_jabatan; ?></td>
                                            <td><?php echo $row->lokasi; ?></td>
                                            <td><?php echo $row->no_inventaris; ?></td>
                                            <td><?php echo $row->keterangan_seri; ?></td>
                                            <td><?php echo $row->nama_jenisperangkat; ?></td>
                                            <td><?php echo $row->nama_merk; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RIWAYAT PERBAIKAN PERANGKAT
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Waktu</th>
                                        <th>Keterangan</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Waktu</th>
                                        <th>Keterangan</th>
                                        <th>Detail</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($detail_perbaikan as $row): ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $row->waktu_permintaanmasuk; ?></td>
                                            <td>Permintaan Masuk</td>
                                            <td><?php echo $row->keluhan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><?php echo $row->waktu_barangmasuk; ?></td>
                                            <td>Barang Masuk</td>
                                            <td>Teknisi: <?php echo $row->nama_lengkap; ?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $row->waktu_diagnosaawal; ?></td>
                                            <td>Diagnosa Awal</td>
                                            <td><?php echo $row->diagnosa_awal; ?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><?php echo $row->waktu_tindakanlanjut; ?></td>
                                            <td>Tindakan Lanjut</td>
                                            <td><?php echo $row->tindakan_lanjut; ?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><?php echo $row->waktu_solusiakhir; ?></td>
                                            <td>Solusi Akhir</td>
                                            <td><?php echo $row->solusi_akhir; ?></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><?php echo $row->waktu_perbaikanselesai; ?></td>
                                            <td>Perbaikan Selesai</td>
                                            <td>
                                                <?php
                                                    if ((($row->keterangan_sekarang) == 'Selesai') == TRUE)
                                                    {
                                                      echo '<span class="label label-success">'.$row->keterangan_sekarang.'</span>';
                                                    }
                                                    else if ((($row->keterangan_sekarang) == 'Dihentikan') == TRUE)
                                                    {
                                                      echo '<span class="label label-danger">'.$row->keterangan_sekarang.'</span>';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
            
        </div>
    </section>