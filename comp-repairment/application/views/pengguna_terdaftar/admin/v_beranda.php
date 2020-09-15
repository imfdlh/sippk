<section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                Informasi Pengguna <small>Informasi pengguna dengan role admin yang sedang login...</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url('admin/detail/'.$pengguna['no_badgepengguna'])?>">Detail</a></li>
                                        <li><a href="<?=base_url('admin/update/'.$pengguna['no_badgepengguna'])?>">Perbarui</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No. Badge</th>
                                            <td><span class="pull-right"><?php echo $pengguna['no_badgepengguna']; ?></span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td><span class="pull-right"><?php echo $pengguna['nama_lengkap']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td><span class="pull-right"><?php echo $role['nama_role']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Unit Kerja</th>
                                            <td><span class="pull-right"><?php echo $unit_kerja['nama_unitkerja']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><span class="pull-right"><?php echo $pengguna['email']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td><span class="pull-right"><?php echo $pengguna['alamat']; ?></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Riwayat Masuk <small>Lima aktivitas terbaru...</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url('admin/riwayat')?>">Lihat Seluruh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No. Badge</th>
                                            <th>Role</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($lima_terbaru as $row): ?>
                                        <tr>
                                            <td><?php echo $row->no_badgepengguna; ?></td>
                                            <td><?php echo $row->nama_role; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($row->waktu_aktivitas));?></td>
                                            <td><?php echo date('H:i:s', strtotime($row->waktu_aktivitas));?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-amber hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">AKUN ADMIN</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $hitung_admin;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">AKUN TEKNISI</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_teknisi;?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">AKUN MANAGER</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_manager;?></div>
                        </div>
                    </div>
                </div>

                
                
            </div>
            <!-- #END# Widgets -->
            
        </div>
    </section>