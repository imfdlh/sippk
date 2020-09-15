<section class="content">
        <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RIWAYAT KERUSAKAN PERANGKAT
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Inventaris</th>
                                        <th>Jenis Perangkat</th>
                                        <th>Merk</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa Awal</th>
                                        <th>Tindakan Lanjut</th>
                                        <th>Solusi Akhir</th>
                                        <th>Keterangan</th>
                                        <th>Durasi Perbaikan</th>
                                        <th>Teknisi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Inventaris</th>
                                        <th>Jenis Perangkat</th>
                                        <th>Merk</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa Awal</th>
                                        <th>Tindakan Lanjut</th>
                                        <th>Solusi Akhir</th>
                                        <th>Keterangan</th>
                                        <th>Durasi Perbaikan</th>
                                        <th>Teknisi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($riwayat as $row): ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->no_inventaris; ?></td>
                                            <td><?php echo $row->nama_jenisperangkat; ?></td>
                                            <td><?php echo $row->nama_merk; ?></td>
                                            <td><?php echo $row->keluhan; ?></td>
                                            <td><?php echo $row->diagnosa_awal; ?></td>
                                            <td><?php echo $row->tindakan_lanjut; ?></td>
                                            <td><?php echo $row->solusi_akhir; ?></td>
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
                                            <td><?php echo $row->nama_lengkap; ?></td>
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

