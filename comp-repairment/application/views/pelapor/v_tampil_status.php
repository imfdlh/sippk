<main class="mt-5 pt-4">
  <div class="container dark-grey-text mt-5">
    <div class="col-md-12 mx-1 justify-content-center">
      <hr>
        <h2 class="text-center mb-4 pt-2"><strong><?php echo $title;?></strong></h2>
      <hr>
    </div>

    <div class="col-md-12 jarak pt-3">
      <div class="row">
        <div class="col-md-4 mt-2">
          <div class="row mx-1">
            <!-- Card -->
            <div class="card rounded-0 hoverable">
              <!-- Card body -->
              <div class="card-body">
                <h4 class="h4-responsive card-title">
                  <span class="align-middle">#No. Tiket : </span>
                    <div class="badge indigo rounded-0 float-right">
                      <?php echo $status['no_tiket']; ?>
                    </div>
                </h4>
                <hr>
                <p>
                  Nama Teknisi : <?php echo $nama_teknisi['nama_lengkap']; ?>
                  <br>
                  No. Badge : <?php echo $status['no_badgeteknisi']; ?>
                  <hr>
                </p>
              </div>
              <!--/.Card body -->
            </div>
            <!--/.Card -->
          </div>
        </div>

        <div class="col-md-8 mt-2">
          <div class="row mx-1">
            <!-- Card -->
            <div class="card rounded-0 hoverable">
              <!-- Card body -->
              <div class="card-body">
                <h4 class="h4-responsive card-title">
                  <span class="align-middle">Status Perbaikan : </span>
                  <?php if(!empty($status['id_keterangansekarang']))
                  {
                    if ((($status['id_keterangansekarang']) == '1') == TRUE)
                    {
                      echo '<div class="success-color badge rounded-0 float-right">';
                    }
                    else if ((($status['id_keterangansekarang']) == '2') == TRUE)
                    {
                      echo '<div class="info-color badge rounded-0 float-right">';
                    }
                    else
                    {
                      echo '<div class="danger-color badge rounded-0 float-right">';
                    }
                  }
                  
                    echo $keterangan_sekarang['keterangan_sekarang'];?>
                  </div>
                </h4>
                <hr>
                <p>
                <div class="steps py-2">
                  <div class="step">
                    <div class="step-header">
                      <h5 class="h5-responsive">
                        <label class="badge badge-default rounded-0">
                          <?php echo $waktu_permintaanmasuk['waktu_permintaanmasuk']?>
                        </label><span class="align-middle"> - Permintaan diterima</span>
                      </h5>
                    </div>
                  </div>
                  <?php if(!empty($status['waktu_barangmasuk']))
                  {
                    if((($status['waktu_barangmasuk']) == '0000-00-00 00:00:00') == FALSE) {
                  ?>
                  <div class="step">
                    <div class="step-header">
                      <h5 class="h5-responsive">
                        <label class="badge badge-default rounded-0">
                          <?php echo $status['waktu_barangmasuk']; ?>
                        </label><span class="align-middle"> - Barang Masuk Bengkel</span>
                      </h5>
                    </div>
                  </div>
                  <?php }} ?>
                  <?php if(!empty($status['diagnosa_awal']))
                  {
                    if((($status['waktu_diagnosaawal']) == '0000-00-00 00:00:00') == FALSE) {
                  ?>
                  <div class="step">
                    <div class="step-header">
                      <h5 class="h5-responsive">
                        <label class="badge badge-default rounded-0">
                          <?php echo $status['waktu_diagnosaawal']; ?>
                        </label>
                        <span class="align-middle"> - Diagnosa Awal</span>
                        <span class="position-relative">
                          <input type="checkbox" id="unchecked" data-toggle="collapse" data-target="#collapseDiv" class=" toggle-icon cbx hidden"/>
                            <label for="unchecked" class="lbl float-right"></label>
                        </span>
                      </h5>
                    </div>
                    <div class="collapse customCollapse step-content" id="collapseDiv">
                      <p><?php echo $status['diagnosa_awal']; ?></p>
                    </div>
                  </div>
                  <?php }} ?>
                  <?php if(!empty($status['tindakan_lanjut']))
                  {
                    if((($status['waktu_tindakanlanjut']) == '0000-00-00 00:00:00') == FALSE) {
                  ?>
                  <div class="step">
                    <div class="step-header">
                      <h5 class="h5-responsive">
                        <label class="badge badge-default rounded-0">
                          <?php echo $status['waktu_tindakanlanjut']; ?>
                        </label>
                        <span class="align-middle"> - Tindakan Lanjut</span>
                        <span class="position-relative">
                          <input type="checkbox" id="unchecked2" data-toggle="collapse" data-target="#collapseDiv2" class=" toggle-icon cbx hidden"/>
                            <label for="unchecked2" class="lbl float-right"></label>
                        </span>
                      </h5>
                    </div>
                    <div class="collapse customCollapse step-content" id="collapseDiv2">
                      <p><?php echo $status['tindakan_lanjut']; ?></p>
                    </div>
                  </div>
                  <?php }} ?>
                  <?php if(!empty($status['solusi_akhir']))
                  {
                    if((($status['waktu_solusiakhir']) == '0000-00-00 00:00:00') == FALSE) {
                  ?>
                  <div class="step">
                    <div class="step-header">
                      <h5 class="h5-responsive">
                        <label class="badge badge-default rounded-0">
                          <?php echo $status['waktu_solusiakhir']; ?>
                        </label>
                        <span class="align-middle"> - Solusi Akhir</span>
                        <span class="position-relative">
                          <input type="checkbox" id="unchecked3" data-toggle="collapse" data-target="#collapseDiv3" class=" toggle-icon cbx hidden"/>
                            <label for="unchecked3" class="lbl float-right"></label>
                        </span>

                      </h5>
                    </div>
                    <div class="collapse customCollapse step-content" id="collapseDiv3">
                      <p><?php echo $status['solusi_akhir']; ?></p>
                    </div>
                  </div>
                  <?php }} ?>
                  <?php if(!empty($status['waktu_perbaikanselesai']))
                  {
                    if((($status['waktu_perbaikanselesai']) == '0000-00-00 00:00:00') == FALSE) {
                  ?>
                  <div class="step">
                    <div class="step-header">
                      <h5 class="h5-responsive">
                        <label class="badge badge-default rounded-0">
                          <?php echo $status['waktu_perbaikanselesai']; ?>
                        </label><span class="align-middle"> - Perbaikan Selesai</span>
                      </h5>
                    </div>
                  </div>
                  <?php }} ?>
                </div>
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


  