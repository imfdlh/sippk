<section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <?php foreach($formulir as $row): ?>
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
                                            <td>: <span><?php echo $row->no_tiket; ?></span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>No. Badge Pelapor</th>
                                            <td>: <span><?php echo $row->no_badgepelapor; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pelapor</th>
                                            <td>: <span><?php echo $row->nama_pelapor; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>: <span><?php echo $row->email; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Unit Kerja</th>
                                            <td>: <span><?php echo $row->nama_unitkerja; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td>: <span><?php echo $row->nama_jabatan; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Lokasi</th>
                                            <td>: <span><?php echo $row->lokasi; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>No. Inventaris</th>
                                            <td>: <span><?php echo $row->no_inventaris; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Keterangan Seri</th>
                                            <td>: <span><?php echo $row->keterangan_seri; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Perangkat</th>
                                            <td>: <span><?php echo $row->nama_jenisperangkat; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Merk</th>
                                            <td>: <span><?php echo $row->nama_merk; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Keluhan</th>
                                            <td>: <span><?php echo $row->keluhan; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Permintaan Masuk</th>
                                            <td>: <span><?php echo date('d/m/Y', strtotime($row->waktu_permintaanmasuk));?> <?php echo date('h:i:s', strtotime($row->waktu_permintaanmasuk));?></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
            
        </div>
    </section>