<html lang="en" class="full-height">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="icon" href="<?=base_url('assets/img/custom/logo-pusri-hd.png')?>" type="image/x-icon">

  <title><?php echo $title;?></title>

  <!--FONT AWESOME CSS MIN-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!--BOOTSTRAP CSS MIN-->
  <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

  <!--MDB CSS-->
  <link href="<?=base_url('assets/css/mdb.css')?>" rel="stylesheet">

  <!--STYLE MIN-->
  <link href="<?=base_url('assets/css/style.min.css')?>" rel="stylesheet">

  <!--TOGGLE-->
  <link href="<?=base_url('assets/css/toggle.css')?>" rel="stylesheet">

  <!--TIMELINE MIN-->
  <link href="<?=base_url('assets/css/timeline.min.css')?>" rel="stylesheet">

  <!--SCROLLBAR MIN-->
  <link href="<?=base_url('assets/css/scrollbar.min.css')?>" rel="stylesheet">

  <!--SELECT-->
  <link href="<?=base_url('assets/css/select.css')?>" rel="stylesheet">

  <!--FIELDSET-->
  <link href="<?=base_url('assets/css/fieldset.css')?>" rel="stylesheet">
  
</head>
<body class="scrollbar square scrollbar-special-color bordered-white" style="background-color: #2BBBAD;">

<main class="mt-5 pt-4">
  <div class="container dark-grey-text mt-5">
    <div class="col-md-12 mx-1 justify-content-center">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h2 class="display-5 white-text text-center"><strong><a href="<?=base_url('status')?>" style="color: #fff;">SI-PPPK</a></strong> <span class="font-weight-bold">Pusri</span></h2>
          <h6 class="h6-responsive mb-5 white-text text-center">Sistem Informasi Permintaan Perbaikan Perangkat Komputer</h6>
          <!-- Card -->
          <div class="card rounded-0 hoverable">
            <!-- Card body -->
            <div class="card-body">

              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">

                  <?php echo form_open('halaman/masuk'); ?>
                  <?php
                    if (isset($pesan))
                    {
                      echo $pesan;
                    }
                  ?>
                  <div class="md-form">
                    <i class="fa fa-user prefix active"></i>
                    <input type="text" id="form1" class="form-control" name="no_badgepengguna" required>
                    <label for="form1" class="active">Nama Pengguna / No. Badge</label>
                  </div>

                  <div class="md-form">
                    <i class="fa fa-lock prefix active"></i>
                    <input type="password" id="form2" class="form-control" name="sandi" required>
                    <label for="form2" class="active">Kata Sandi</label>
                  </div>

                  <div class="md-form text-center mt-1-half">
                      <button class="btn btn-indigo indigo rounded-0 hoverable" type="submit" name="login">Masuk<i class="fa fa-sign-in ml-2"></i>
                      </button>
                  </div>
                  <!-- Register -->
                  <h6 class="text-center">Lapor kerusakan atau<br>Periksa permintaan perbaikan: <a href="<?=base_url('formulir')?>" style="color: #2BBBAD;">Formulir</a>
                  </h6>
                  <?php echo form_close() ?>

                <div class="col-md-1"></div>
                  
              </div>

            </div>
          </div>

        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </div>
</main>

</body>
  <!--JQEURY 3.3.1 MIN-->
  <script src="<?=base_url('assets/js/jquery-3.3.1.min.js')?>"></script>

  <!--BOOTSTRAP MIN JS-->
  <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>

  <!--MDB JS-->
  <script src="<?=base_url('assets/js/mdb.js')?>"></script>

  <!--POPPER MIN-->
  <script src="<?=base_url('assets/js/popper.min.js')?>"></script>

  <!--GOOGLE RECAPTCHA-->
  <script src='https://www.google.com/recaptcha/api.js?hl=id'></script>

</html>