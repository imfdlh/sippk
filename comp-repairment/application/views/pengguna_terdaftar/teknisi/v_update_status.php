<section class="content">
        <div class="container-fluid">

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PERBARUI STATUS PERBAIKAN: <?php echo $update_status['no_tiket']; ?>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php echo $this->session->flashdata('berhasilditambahkan');?>
                            <?php echo form_open('teknisi/updated'); ?>
                            	
                                <input type="hidden" class="form-control" name="no_tiket" value="<?php echo $update_status['no_tiket']; ?>" required>
                                <div class="form-group form-float">
                                    <label class="form-label">Waktu Barang Masuk</label>
                                    <div class="form-line">
                                        <input id="waktu_barangmasuk" name="waktu_barangmasuk" type="text" class="waktu_barangmasuk form-control" placeholder="<?php echo $update_status['waktu_barangmasuk']; ?>">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Diagnosa Awal</label>
                                    <div class="form-line">
                                        <textarea name="diagnosa_awal" cols="30" rows="5" class="form-control no-resize"><?php echo $update_status['diagnosa_awal']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Waktu Diagnosa Awal</label>
                                    <div class="form-line">
                                        <input id="waktu_diagnosaawal" name="waktu_diagnosaawal" type="text" class="waktu_diagnosaawal form-control" placeholder="<?php echo $update_status['waktu_diagnosaawal']; ?>">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Tindakan Lanjut</label>
                                    <div class="form-line">
                                        <textarea name="tindakan_lanjut" cols="30" rows="5" class="form-control no-resize"><?php echo $update_status['tindakan_lanjut']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Waktu Tindakan Lanjut</label>
                                    <div class="form-line">
                                        <input id="waktu_tindakanlanjut" name="waktu_tindakanlanjut" type="text" class="waktu_tindakanlanjut form-control" placeholder="<?php echo $update_status['waktu_tindakanlanjut']; ?>">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Solusi Akhir</label>
                                    <div class="form-line">
                                        <textarea name="solusi_akhir" cols="30" rows="5" class="form-control no-resize"><?php echo $update_status['solusi_akhir']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Waktu Solusi Akhir</label>
                                    <div class="form-line">
                                        <input id="waktu_solusiakhir" name="waktu_solusiakhir" type="text" class="waktu_solusiakhir form-control" placeholder="<?php echo $update_status['waktu_solusiakhir']; ?>">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Waktu Perbaikan Selesai</label>
                                    <div class="form-line">
                                        <input id="waktu_perbaikanselesai" name="waktu_perbaikanselesai" type="text" class="waktu_perbaikanselesai form-control" placeholder="<?php echo $update_status['waktu_perbaikanselesai']; ?>">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                	<label class="form-label">Keterangan Sekarang</label>
                                	<select class="form-control show-tick" name="keterangan_sekarang">
                                		<option value="<?php echo $update_status['id_keterangansekarang']; ?>" selected><?php echo $update_status['keterangan_sekarang']; ?></option>
                                		<?php foreach($keterangan_sekarang as $keterangan): ?>
                                			<option value="<?php echo $keterangan->id_keterangansekarang; ?>"><?php echo $keterangan->keterangan_sekarang; ?></option>
                                		<?php endforeach; ?>
	                                </select>
                                </div>
                  
                                <input type="hidden" class="form-control" name="no_badgeteknisi" value="<?php echo $update_status['no_badgeteknisi']; ?>" required>
                                
                                <button class="btn btn-primary waves-effect" type="submit">UBAH</button>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            
        </div>
    </section>