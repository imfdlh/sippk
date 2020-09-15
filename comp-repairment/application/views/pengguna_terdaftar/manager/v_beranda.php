<section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?=base_url('manager/riwayat');?>" style="text-decoration: none;">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">history</i>
                            </div>
                            <div class="content">
                                <div class="text">DATA RIWAYAT PERBAIKAN</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_riwayat;?></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">PERBAIKAN SELESAI</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_selesai;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">build</i>
                        </div>
                        <div class="content">
                            <div class="text">PERBAIKAN DIPROSES</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_diproses;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">close</i>
                        </div>
                        <div class="content">
                            <div class="text">PERBAIKAN DIHENTIKAN</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $hitung_dihentikan;?></div>
                        </div>
                    </div>
                </div>


                <!-- Line Chart -->
                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>LINE CHART</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div> -->
                <!-- #END# Line Chart -->

                
                
            </div>
            <!-- #END# Widgets -->
            
        </div>
    </section>
>