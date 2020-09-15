<main class="mt-5 pt-4">
  <div class="container dark-grey-text mt-5">
    <div class="col-md-12 mx-1 justify-content-center">
      <hr>
        <h2 class="text-center mb-4 pt-2"><strong><?php echo $title;?></strong></h2>
      <hr>
    </div>

    <div class="col-md-12 jarak pt-3">
      <div class="row">
        <div class="col-md-12 mt-2">
          <div class="row mx-1">
            <!-- Card -->
            <div class="card rounded-0 hoverable mb-5">
              <!-- Card body -->
              <div class="card-body">
                <h4 class="card-title">
                  
                </h4>
                <p>
                  <!-- Extended material form grid -->
                  <?php echo form_open('formulir/simpan'); ?>
                    <fieldset>
                      <legend class="right"><span>Informasi Pribadi</span></legend>
                      <!-- Grid row -->
                      <div class="form-row">
                          <!-- Grid column -->
                          <div class="col-md-3">
                              <!-- Material input -->
                              <div class="md-form form-group">
                                  <input type="text" class="form-control" name="no_badge" placeholder="No. Badge" required >
                                  <label>No. Badge</label>
                              </div>
                          </div>
                          <!-- Grid column -->

                          <!-- Grid column -->
                          <div class="col-md-5">
                              <!-- Material input -->
                              <div class="md-form form-group">
                                  <input type="text" class="form-control" name="nama_pelapor" placeholder="Nama Pelapor" required >
                                  <label>Nama Pelapor</label>
                              </div>
                          </div>
                          <!-- Grid column -->

                          <!-- Grid column -->
                          <div class="col-md-4">
                              <!-- Material input -->
                              <div class="md-form form-group">
                                  <input type="email" class="form-control" name="email" placeholder="Email" >
                                  <label>Email</label>
                              </div>
                          </div>
                          <!-- Grid column -->
                      </div>
                      <!-- Grid row -->

                      </fieldset>

                      <fieldset>
                      <legend class="right"><span>Unit Kerja</span></legend>

                      <!-- Grid row -->
                      <div class="form-row pb-4">
                          <!-- Grid column -->
                          <div class="col-md-6 py-2">
                              <!-- Material input -->
                              <div class="md-form form-group select">
                                <select class="form-control mdb-select " name="unit_kerja" required >
                                  <option class="option-v" value="" disabled selected>Unit Kerja</option>
                                  <?php foreach($unit_kerja as $row): ?>
                                    <option class="option-v" value="<?php echo $row->id_unitkerja; ?>"><?php echo $row->nama_unitkerja; ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <label div="select-label">Unit Kerja</label>

                              </div>
                          </div>
                          <!-- Grid column -->

                          <!-- Grid column -->
                          <div class="col-md-6 py-2">
                              <!-- Material input -->
                              <div class="md-form form-group select">
                                <select class="form-control mdb-select " name="jabatan" required >
                                  <option class="option-v" value="" disabled selected>Jabatan</option>
                                  <?php foreach($jabatan as $row): ?>
                                    <option class="option-v" value="<?php echo $row->id_jabatan; ?>"><?php echo $row->nama_jabatan; ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <label div="select-label">Jabatan</label>
                              </div>
                          </div>
                          <!-- Grid column -->
                      </div>
                      <!-- Grid row -->

                      <!-- Grid row -->
                      <div class="form-row pb-2">
                          <!-- Grid column -->
                          <div class="col-md-12">
                              <!-- Material input -->
                              <div class="md-form form-group">
                                <input type="text" class="form-control" name="lokasi" placeholder="Lokasi" required >
                                <label>Lokasi</label>
                              </div>
                          </div>
                          <!-- Grid column -->
                      </div>
                      <!-- Grid row -->
                      </fieldset>

                      <fieldset>
                      <legend class="right"><span>Informasi Perangkat</span></legend>
                      <!-- Grid row -->
                      <div class="form-row pb-4">
                          <!-- Grid column -->
                          <div class="col-md-12 pt-2">
                              <!-- Material input -->
                              <div class="md-form form-group select">
                                <select class="form-control mdb-select " name="no_inventaris" required >
                                  <option class="option-v" value="" disabled selected>No. Inventaris / SN</option>
                                  <?php foreach($no_inventaris as $row): ?>
                                    <option class="option-v" value="<?php echo $row->no_inventaris; ?>"><?php echo $row->no_inventaris; ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <label div="select-label">No. Inventaris / SN</label>
                              </div>
                          </div>
                          <!-- Grid column -->
                          
                      </div>
                      <!-- Grid row -->

                      <!-- Grid row -->
                      <div class="form-row pb-2">
                          <!-- Grid column -->
                          <div class="col-md-12">
                              <!-- Material input -->
                              <div class="md-form form-group">
                                <input type="text" class="form-control" name="keterangan_seri" placeholder="Keterangan / Seri" required >
                                <label>Keterangan / Seri</label>
                              </div>
                          </div>
                          <!-- Grid column -->
                      </div>
                      <!-- Grid row -->
                      </fieldset>

                      <fieldset>
                      <legend class="right"><span>Kerusakan</span></legend>
                      <!-- Grid row -->
                      <div class="form-row">
                          <!-- Grid column -->
                          <div class="col-md-12 pt-2">
                              <!-- Material input -->
                              <div class="md-form form-group">
                                <textarea type="text" name="keluhan" class="md-textarea form-control" rows="3" placeholder="Keluhan" required ></textarea>
                                <label>Keluhan</label>
                              </div>
                          </div>
                          <!-- Grid column -->
                      </div>
                      <!-- Grid row -->
                      </fieldset>
                      <div> 
                      
                      <!-- Grid row -->
                      <div class="form-row text-xs-center" style="margin-top: -3rem;">
                        <div class="mt-4 col-md-12 text-center g-recaptcha text-xs-center" data-sitekey="6LcF-GQUAAAAAE49lC-LELM-b27ZZqG1Jch3TK5I">
                        </div>
                        <div style="margin-left: 0.3rem;">
                          <?php echo form_error('g-recaptcha-response');?>
                        </div>
                        
                      </div>
                
                          
                      <!-- Grid row -->
                      <hr>
                      <button type="submit" class="btn btn-indigo rounded-0 hoverable" style="margin-left: 0;" name="kirim ">Kirim<i class="fa fa-send ml-2"></i></button>
                      
                      </div>
                  <?php echo form_close() ?>
                  <!-- Extended material form grid -->
                </p>
              </div>
              <!--/.Card body -->
            </div>
            <!--/.Card -->
          </div>
        </div>

      </div>
    </div>
  </div>
</main>


  