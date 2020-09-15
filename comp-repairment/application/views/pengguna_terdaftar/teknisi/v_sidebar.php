<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?=base_url('assets/adminbsb/images/admin-teknisi.png')?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $pengguna['nama_lengkap']; ?></div>
                <div class="email">Teknisi</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right" style="top: 3em;">
                        <li><a><i class="material-icons">person</i><?php echo $pengguna['no_badgepengguna']; ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?=base_url('halaman/keluar');?>" class=" waves-effect waves-block"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <div class="menu">
            <ul class="list">
                <li class="header">MAIN MENU</li>
                <!-- if unconfirmed -->

                <?php if ($page == 'beranda'): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('teknisi')?>">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li>

                <?php if ($page == 'permintaan_perbaikan' || $page == 'detail'): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('teknisi/permintaan')?>">
                        <i class="material-icons">add_to_queue</i>
                        <span>Permintaan Perbaikan</span>
                    </a>
                </li>
                
                <?php if ($page == 'kelola_status' || $page == 'update'): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                        <a href="<?=base_url('teknisi/kelola')?>">
                            <i class="material-icons">add_box</i>
                            <span>Kelola Status Perbaikan</span>
                        </a>
                </li>
                
                <?php if ($page == 'riwayat_perbaikan' || $page == 'riwayat_kerusakan' || $page == 'detail_perbaikan'): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">history</i>
                            <span>Riwayat Perbaikan Perangkat</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if ($page == 'riwayat_perbaikan' || $page == 'detail_perbaikan'): ?>
                              <li class="active">
                            <?php else: ?>
                                <li>
                            <?php endif; ?>
                                <a href="<?=base_url('teknisi/riwayat')?>">Riwayat Perbaikan Perangkat</a>
                                </li>
                            <?php if ($page == 'riwayat_kerusakan'): ?>
                              <li class="active">
                            <?php else: ?>
                                <li>
                            <?php endif; ?>
                                <a href="<?=base_url('teknisi/perangkat')?>">Riwayat Kerusakan Perangkat</a>
                            </li>
                        </ul>
                </li>

            </ul>
        </div>
            </ul> 
                
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                <a href="javascript:void(0);">© 2018 Copyright: </a>
            </div>
            <div class="version">
                <b>PT Pupuk Sriwidjaja Palembang</b>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
