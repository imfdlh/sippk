<section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RIWAYAT AKTIVITAS PENGGUNA
                            </h2>
                            
                        </div>
                        <div class="body">
                        	<table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                        		<tfoot>
                        			<tr>
                        				<th>No.</th>
                        				<th>No. Badge</th>
                        				<th>Role</th>
                        				<th>Aktivitas</th>
                                        <th>Tanggal</th>
                        				<th>Waktu</th>
                        			</tr>
                        		</tfoot>
                        		<tbody>
                                    <?php $i=1; ?>
                        			<?php foreach($data_riwayat as $row): ?>
                        				<tr>
                        					<td><?php echo $i; ?></td>
                                            <td>
                                                <a href="<?=base_url('admin/detail/'.$row->no_badgepengguna)?>" class="detail">
                                                    <?php echo $row->no_badgepengguna; ?>
                                                </a>
                                            </td>
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
            <!-- #END# Exportable Table -->

    </section>

