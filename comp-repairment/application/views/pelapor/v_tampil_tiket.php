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
                  <div class="row mt-5 pb-4">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <div class="row">

                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-8">
                              <img src="<?=base_url('assets/img/custom/logo-pusri-hd.png')?>" class="img-fluid" alt="Responsive image">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2"></div>
                          </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-5 text-center mt-4 pt-2">
                          <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                              <h3>
                                <strong>Tiket</strong><br>
                                Permintaan Perbaikan Perangkat Komputer
                              </h3>
                            </div>
                            <div class="col-md-1"></div>
                          </div>                          
                        </div>

                      </div>

                    </div>
                    <div class="col-md-1"></div>
                  </div>
                </h4>
                <hr>
                <div class="row mt-5 pt-3 pb-4">
                    <div class="col-md-1"></div>
                    <?php foreach($formulir as $row): ?>
                    <div class="col-md-5 mt-2">
                      
                        <h5><strong>No.Badge : <?php echo $row->no_badgepelapor;?></strong></h5>
                        <h5><strong>Pelapor : <?php echo $row->nama_pelapor;?></strong></h5>
                        <br>
                        <h6>No. Inventaris : <?php echo $row->no_inventaris;?></h6>
                        <h6><?php echo $row->nama_jenisperangkat.' | '.$row->nama_merk;?></h6>

                        <br>
                          <small><i><strong>Tanggal: <?php echo date('d/m/Y', strtotime($row->waktu_permintaanmasuk));?></strong></i> - <i><strong>Waktu: <?php echo date('H:i:s', strtotime($row->waktu_permintaanmasuk));?></strong></i></small>
                        <br>
                        <br>
                        <a href="<?=base_url('formulir/unduh/'.$row->no_tiket)?>" class="btn btn-indigo indigo rounded-0 hoverable">Unduh<i class="fa fa-file-pdf-o ml-2"></i>
                        </a>
                    </div>
                    <div class="col-md-5 text-center mt-1 mb-4">
                      <!-- Card -->
                      <div class="card info-color rounded-0" style="border: 1px solid rgba(0,0,0,.1);">

                        <div class="card-header white-text hoverable">
                          <p class="my-3 py-5 text-center">
                            <div class="h4" style="margin-top: -3rem;">No. Tiket :</div>
                            <br>
                            <div class="h3 pb-5"><?php echo $row->no_tiket;?></div>

                            </p>

                        </div>
                        </div>
                        <!-- Card content -->

                      </div>
                      <!-- Card -->
                      
                    
                    </div>
                    
                    <div class="col-md-1"></div>
                    <hr>
                    <?php endforeach;?>
                </div>
                
                <p>
                      <!-- Grid row -->
                      <div class="form-row">

                          <!-- Grid column -->
                          <div class="col-md-12">
                              <!-- Footer -->
                              <footer class="page-footer special-color-dark font-small">
                                <!-- Copyright -->
                                <div class="footer-copyright text-center py-4" style="margin-bottom: -1rem">© 2018 Copyright:
                                  <a href="#"> PT Pupuk Sriwidjaja Palembang</a>
                                </div>
                                <!-- Copyright -->

                              </footer>
                              <!-- Footer -->
                          </div>
                          <!-- Grid column -->

                      </div>
                      <!-- Grid row -->
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


  