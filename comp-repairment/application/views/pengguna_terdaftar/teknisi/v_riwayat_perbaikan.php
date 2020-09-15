<section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
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
                        				<th>No. Tiket</th>
                        				<th>Durasi</th>
                        				<th>Pelapor</th>
                                        <th>Unit Kerja</th>
                                        <th>Jabatan</th>
                                        <th>No. Inventaris</th>
                                        <th>Jenis Perangkat</th>
                                        <th>Merk</th>
                                        <th>Seri</th>
                                        <th>Teknisi</th>
                        				<th>Keterangan</th>
                        			</tr>
                        		</thead>
                        		<tfoot>
                        			<tr>
                        				<th>No.</th>
                                        <th>No. Tiket</th>
                                        <th>Durasi</th>
                                        <th>Pelapor</th>
                                        <th>Unit Kerja</th>
                                        <th>Jabatan</th>
                                        <th>No. Inventaris</th>
                                        <th>Jenis Perangkat</th>
                                        <th>Merk</th>
                                        <th>Seri</th>
                                        <th>Teknisi</th>
                                        <th>Keterangan</th>
                        			</tr>
                        		</tfoot>
                        		<tbody>
                                    <?php $i=1; ?>
                        			<?php foreach($riwayat as $row): ?>
                        				<tr>
                        					<td><?php echo $i; ?></td>
                                            <td>
                                                <a href="<?=base_url('teknisi/detail/'.$row->no_tiket)?>" class="detail">
                                                    <?php echo $row->no_tiket; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                    if ((($row->keterangan_sekarang) == 'Selesai') == TRUE)
                                                    {
                                                      echo $row->hitunghari.' hari';
                                                    }
                                                    else if ((($row->keterangan_sekarang) == 'Dihentikan') == TRUE)
                                                    {
                                                      echo '0 hari';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row->no_badgepelapor; ?></td>
                                            <td><?php echo $row->nama_unitkerja; ?></td>
                                            <td><?php echo $row->nama_jabatan; ?></td>
                                            <td><?php echo $row->no_inventaris; ?></td>
                                            <td><?php echo $row->nama_jenisperangkat; ?></td>
                                            <td><?php echo $row->nama_merk; ?></td>
                                            <td><?php echo $row->keterangan_seri; ?></td>
                                            <td><?php echo $row->nama_lengkap; ?></td>
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
                                    <?php $i++;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

        </div>

    </section>

