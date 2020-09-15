<main>
  <div class="view intro-2 parallax" style="">
    <div class="full-bg-img">
      <div class="mask rgba-black-strong flex-center">
        <div class="container">
          <div class="row">
            <div class="col-md-6 jarak my-3 white-text text-center text-md-left ">
              <h1 class="display-4 font-weight-bold">Sistem Informasi PPPK</h1>

              <hr class="hr-light">

              <p>
                <strong>Sistem Informasi permintaan perbaikan perangkat komputer berbasis website.</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>Isi form permintaan perbaikan dan dapatkan nomor tiketmu. Kamu juga dapat memeriksa status perbaikan dengan mengisi form disamping ini.</strong>
              </p>

              <a href="<?=base_url('formulir')?>" class="btn btn-indigo indigo rounded-0 hoverable">Form Perbaikan<i class="fa fa-pencil ml-2"></i>
              </a>
            </div>
            <div class="col-md-2">
              
            </div>
            <div class="col-md-4 jarak my-3">
              <!-- Card -->
              <div class="card rounded-0 hoverable">

                <div class="card-header indigo rounded-0 white-text">
                  <!-- Material form register -->
                  <p class="h4 py-3 text-center">Periksa Status Perbaikan</p>
                </div>

                  <!-- Card body -->
                  <div class="card-body">

                      <!-- Material form register -->
                      
                      <?php echo form_open('status'); ?>

                          <!-- Material input text -->
                          <div class="md-form">
                            <input type="text" id="" class="form-control form-control-sm" name="no_tiket" placeholder="ABc123dE45" required>
                            <label for="" class="font-weight-light">Nomor tiket</label>
                          </div>

                          <div class="mt-2">
                              <?php echo form_error('g-recaptcha-response');?>
                            </div>
                          <div class="md-form text-xs-center">
                            
                            <div class="text-center g-recaptcha text-xs-center" data-sitekey="6LcF-GQUAAAAAE49lC-LELM-b27ZZqG1Jch3TK5I">
                            </div>
                            
                          </div>
                          
                          <hr>
                          <div class="md-form text-center">
                              <button class="btn btn-indigo indigo rounded-0 hoverable" type="submit">Periksa Status<i class="fa fa-search ml-2"></i></button>
                              
                          </div>
                      <?php echo form_close() ?>
                      <!-- Material form register -->

                  </div>
                  <!-- Card body -->

              </div>
              <!-- Card -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
  