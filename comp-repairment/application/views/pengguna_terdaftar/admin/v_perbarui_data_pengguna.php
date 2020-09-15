<section class="content">
        <div class="container-fluid">

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PERBARUI DATA PENGGUNA
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php echo form_open('admin/updated'); ?>
                            	<?php foreach($perbarui as $row): ?>
                                <input type="hidden" class="form-control" name="no_badgepengguna" value="<?php echo $row->no_badgepengguna; ?>" required>
                                <div class="form-group form-float">
                                	<label class="form-label">Nama Lengkap</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row->nama_lengkap; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                	<label class="form-label">Sandi</label>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="sandi" value="<?php echo $row->sandi; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                	<label class="form-label">Role</label>
                                	<select class="form-control show-tick" name="role">
                                		<option value="<?php echo $row->id_role; ?>" selected><?php echo $row->nama_role; ?></option>
                                		<?php foreach($role as $rolenya): ?>
                                			<option value="<?php echo $rolenya->id_role; ?>"><?php echo $rolenya->nama_role; ?></option>
                                		<?php endforeach; ?>
	                                </select>
                                </div>
                                <div class="form-group form-float">
                                	<label class="form-label">Unit Kerja</label>
                                	<select class="form-control show-tick" name="unit_kerja">
                                		<option value="<?php echo $row->id_unitkerja; ?>" selected><?php echo $row->nama_unitkerja; ?></option>
                                		<?php foreach($unit_kerja as $unitkerja): ?>
                                			<option value="<?php echo $unitkerja->id_unitkerja; ?>"><?php echo $unitkerja->nama_unitkerja; ?></option>
                                		<?php endforeach; ?>
	                                </select>
                                </div>
                                <div class="form-group form-float">
                                	<label class="form-label">Email</label>
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" value="<?php echo $row->email; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                	<label class="form-label">Alamat</label>
                                    <div class="form-line">
                                        <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required><?php echo $row->alamat; ?></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">UBAH</button>
                                <?php endforeach; ?>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            
        </div>
    </section>