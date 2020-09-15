<section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KELOLA DATA PENGGUNA
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php echo $this->session->flashdata('berhasildiperbarui');?>
                            <?php echo $this->session->flashdata('hapus');?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Badge</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Unit Kerja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Badge</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Unit Kerja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach($semua_data as $row): ?>
                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <td>
                                                <a href="<?=base_url('admin/detail/'.$row->no_badgepengguna)?>" class="detail">
                                                    <?php echo $row->no_badgepengguna; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $row->nama_lengkap; ?></td>
                                            <td><?php echo $row->nama_role; ?></td>
                                            <td><?php echo $row->nama_unitkerja; ?></td>
                                            <td>
                                                <div>
                                                    <a href="<?=base_url('admin/update/'.$row->no_badgepengguna)?>" class="btn btn-primary waves-effect">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <a href="<?=base_url('admin/hapus/'.$row->no_badgepengguna)?>" class="btn btn-danger waves-effect">
                                                        <i class="material-icons">delete</i>
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
