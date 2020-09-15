<section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <?php foreach($detail as $row): ?>
                        <div class="header bg-cyan">
                            <h2>
                                Informasi Pengguna <span class="pull-right label bg-indigo"><?php echo $row->no_badgepengguna; ?></span><small>Informasi detail pengguna...</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table dashboard-task-infos">
                                    
                                    <thead>
                                        <tr>
                                            <th>No. Badge</th>
                                            <td><span class="pull-right"><?php echo $row->no_badgepengguna; ?></span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td><span class="pull-right"><?php echo $row->nama_lengkap; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td><span class="pull-right"><?php echo $row->nama_role; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Unit Kerja</th>
                                            <td><span class="pull-right"><?php echo $row->nama_unitkerja; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><span class="pull-right"><?php echo $row->email; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td><span class="pull-right"><?php echo $row->alamat; ?></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Riwayat Aktivitas Pengguna <span class="pull-right label bg-amber"><?php echo $row->no_badgepengguna; ?></span><small>Riwayat aktivitas pengguna...</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable js-small dashboard-task-infos">
                                    
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Badge</th>
                                            <th>Role</th>
                                            <th>Aktivitas</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($riwayat as $row): ?>
                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <td><?php echo $row->no_badgepengguna; ?></td>
                                            <td><?php echo $row->nama_role; ?></td>
                                            <td><?php echo $row->nama_aktivitas; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($row->waktu_aktivitas));?></td>
                                            <td><?php echo date('H:i:s', strtotime($row->waktu_aktivitas));?></td>
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