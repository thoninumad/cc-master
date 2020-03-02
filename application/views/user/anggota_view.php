
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Bank Jatim</title>

    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">

</head>

<body class="top-navigation" onload="StartTimers();" onmousemove="ResetTimers();">

    <div id="wrapper">
        <div id="page-wrapper" style="background: url(<?php echo base_url().'assets/home-bg.jpg' ?>) no-repeat center center scroll;background-size:cover;width: 100%;">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-collapse collapse white-bg" id="navbar">
                <div class="navbar-header">
                    <a href="<?php echo base_url()."/user" ?>" ><img src="<?php echo base_url().'assets/logo.png' ?>" width="100" class="img-responsive"></a>
                </div>
                <ul class="nav navbar-top-links navbar-right"  style="color:black">
                    <li>
                           <h4><a style="color:black" data-toggle="modal"  data-target="#edit_profile"><i class="fa fas fa-building"></i> Unit <?php echo $unit[0]->nama_unit; ?></a></h4>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/logout" style="color:black">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-left"  style="color:black">	
                    <li>
                        <a href="<?php echo base_url()?>user" style="color:black">
                            <i class="	fa fa-area-chart"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/anggota_view" style="color:black">
                            <i class="fa fa-users"></i> Culture Team
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/history" style="color:black">
                            <i class="fa fa-book"></i> History
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
            <br/>
          <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-md-10 col-sm-10 col-xs-12">
              <h3 >Track - Corporate Culture </h3>
              <h4 >Culture Team</h4>
              <br/>
              </div>
            </div>
            
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6" >
                    <?php $w=count($warrior); if($w==0){ ?>
                        <div class="x_panel">
                            <div class="x_title">
                                  <h2 style='font-weight: bold'>Change Agent</h2>
                              <br/><br/>
                          </div>
                          <div class="x_content">
                            <div class="card" style="width:400px">

                              <div class="card-body">
                                <h4 class="card-title">Anda belum memiliki Changer Agent</h4>
                                  <p class="card-text"></p>
                                  <br/>
                                  <button class="btn btn-success" data-toggle="modal"  data-target="#addwarrior">Add Anggota</button>
                                  <p class="card-text"></p>
                                  <p class="card-text"></p>
                                  <p class="card-text"></p>
                                  <p class="card-text"></p>
                              </div>
                          </div>
                        </div>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($warrior as $w) { ?> 
                        <div class="x_panel">
                            <div class="x_title">
                                  <h2 style='font-weight: bold'>Change Agent</h2>
                              <br/><br/>
                          </div>
                          <div class="x_content">
                              <div class="col-md-3 col-sm-3 col-xs-12 " >
                                <div class="profile_img" >
                                  <div id="crop-avatar"  >
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view"  src="<?php echo base_url().'assets/photo_warrior/'.$w->photo ?>"  alt="Avatar" >
                                  </div>
                                </div>
                                <br>
                                <ul class="list-unstyled user_data">
                                  <li><i class="fa fa-map-marker user-profile-icon"></i> Unit : <?php echo $this->session->userdata('username'); ?>
                                  </li>
                                </ul>
                                <ul class="list-unstyled user_data">
                                  <li><?php if($w->status_aktif==1){ ?>
                                    <i class="fa fa-check-circle" style="color:#6699ff"></i><span> Valid until : <?php echo $w->aktif_end ?></span>  <?php } else { ?>
                                   <i class="fa fa-warning" style="color:red"></i><span>Tidak Aktif</span>  <?php } ?>
                                  </li>
                                </ul>
                              </div>  
                             <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="card" style="width:400px">
                              <div class="card-body">
                            
                                <h3 class="card-title"><?php echo $w->nama_warrior ?></h3>
                                  <p class="card-text">Id: <?php echo $w->nopeg ?></p>
                                    <br/>
                                  <p class="card-text"><b>Phone :</b> <?php echo $w->no_hp ?></p>
                                  <p class="card-text"><b>Email :</b> <?php echo $w->email ?></p>
                                  <p class="card-text"><b>Direktorat :</b> <?php echo $w->direktorat ?></p>
                                  <br/><br/>
                                  <div>
                                    <button class="btn btn-primary" data-toggle="modal"  data-target="#updateW<?php echo $w->nopeg ?>">Edit Change Agent</button>
                                    <button class="btn btn-danger" data-toggle="modal"  data-target="#deleteW<?php echo $w->nopeg ?>">Remove</button>
                                  </div>
                              </div>
                          </div>
                              </div>
                        </div>
                        </div>
                    <div class="modal fade" id="deleteW<?php echo $w->nopeg ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Remove Culture Change Agent</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <form id="demo-form2" action="<?php echo base_url()?>user/deleteW/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                              <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                                                                    <div class="form-group">
                                                                <div >
                                                                    <h3  for="first-name">Are you sure to remove <?php echo $w->nama_warrior ?> from Culture Warrior?
                                                                </h3>
                                                                     <input type="hidden" id="first-name" readonly required name="nopeg"  value="<?php echo $w->nopeg ?>">
                                                                    <input type="hidden" class="form-control" name="bobot1" autocomplete="off" value="<?php echo $nilai[0]->nilai_bobot1 ?>">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <div>
                                                                  <button type="submit" name="submit" class="btn btn-success" value="simpan">Yes</button>
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">No</button>
                                                                </div>
                                                              </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
                    
                    <div class="modal fade" id="updateW<?php echo $w->nopeg ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Form Change Agent</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <form id="demo-form2" action="<?php echo base_url()?>user/editwarrior/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                              <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomer Pegawai
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" readonly required name="nopeg" class="form-control col-md-7 col-xs-12" value="<?php echo $w->nopeg ?>">
                                                                </div>
                                                              </div>
                                                             <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required name="nama_warrior" class="form-control col-md-7 col-xs-12" value="<?php echo $w->nama_warrior ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Handphone
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required name="no_hp" class="form-control col-md-7 col-xs-12" value="<?php echo $w->no_hp ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="email" id="first-name" required name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $w->email ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Foto
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="file" id="first-name" required name="file" class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                              </div>
                                                              <div class="ln_solid"></div>
                                                                 <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('unit');?>">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Direktorat
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12"  readonly value="<?php echo $this->session->userdata('direktorat');?>">
                                                                </div>
                                                              </div>
                                                                <br/>
                                                              <div class="form-group">
                                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                  <button type="submit" name="submit" class="btn btn-success" value="simpan">Submit</button>
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                                                                </div>
                                                              </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
                    
                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-lg-6" >
                    <?php $b=count($booster); if($b==0){ ?>
                        <div class="x_panel">
                            <div class="x_title">
                                  <h2 style='font-weight: bold'>Culture Booster</h2>
                              <br/><br/>
                          </div>
                          <div class="x_content">
                            <div class="card" style="width:400px">

                              <div class="card-body">
                                <h4 class="card-title">Anda belum memiliki Booster</h4>
                                  <p class="card-text"></p>
                                  <br/>
                                  <button class="btn btn-success" data-toggle="modal"  data-target="#addbooster">Add Anggota</button>
                                  <p class="card-text"></p>
                                  <p class="card-text"></p>
                                  <p class="card-text"></p>
                                  <p class="card-text"></p>
                              </div>
                          </div>
                        </div>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($booster as $b) { ?> 
                         <div class="x_panel">
                            <div class="x_title">
                                  <h2 style='font-weight: bold'>Culture Booster</h2>
                              <br/><br/>
                          </div>
                          <div class="x_content">
                              <div class="col-md-3 col-sm-3 col-xs-12 " >
                                <div class="profile_img" >
                                  <div id="crop-avatar"  >
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view"  src="<?php echo base_url().'assets/photo_booster/'.$b->photo ?>"  alt="Avatar" >
                                  </div>
                                </div>
                                <br>
                                <ul class="list-unstyled user_data">
                                  <li><i class="fa fa-map-marker user-profile-icon"></i> Unit : <?php echo $this->session->userdata('username'); ?>
                                  </li>
                                </ul>
                                <ul class="list-unstyled user_data">
                                  <li><?php if($b->status_aktif==1){ ?>
                                    <i class="fa fa-check-circle" style="color:#6699ff"></i><span> Valid until : <?php echo $b->aktif_end ?></span>  <?php } else { ?>
                                   <i class="fa fa-warning" style="color:red"></i><span>Tidak Aktif</span>  <?php } ?>
                                  </li>
                                </ul>
                              </div>        
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="card" style="width:400px">
                              <div class="card-body">
                            
                                <h3 class="card-title"><?php echo $b->nama_booster ?></h3>
                                  <p class="card-text">Id: <?php echo $b->nopeg ?></p>
                                    <br/>
                                  <p class="card-text"><b>Tanggal Lahir :</b> <?php echo $b->tanggal_lahir ?></p>
                                  <p class="card-text"><b>Phone :</b> <?php echo $b->no_hp ?></p>
                                  <p class="card-text"><b>Email :</b> <?php echo $b->email ?></p>
                                  <p class="card-text"><b>Direktorat :</b> <?php echo $b->direktorat ?></p>
                                  <div>
                                    <button class="btn btn-primary" data-toggle="modal"  data-target="#updateB<?php echo $b->nopeg ?>">Edit Booster</button>
                                    <button class="btn btn-danger" data-toggle="modal"  data-target="#deleteB<?php echo $b->nopeg ?>">Remove</button>
                                  </div>
                              </div>
                          </div>
                              </div>
                        </div>
                        </div>
                    <div class="modal fade" id="deleteB<?php echo $b->nopeg ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Remove Culture Change Agent</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <form id="demo-form2" action="<?php echo base_url()?>user/deleteB/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                              <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                                                                    <div class="form-group">
                                                                <div >
                                                                    <h3  for="first-name">Are you sure to remove <?php echo $b->nama_booster ?> from Culture Booster?
                                                                </h3>
                                                                     <input type="hidden" id="first-name" readonly required name="nopeg"  value="<?php echo $b->nopeg ?>">
                                                                    <input type="hidden" class="form-control" name="bobot1" autocomplete="off" value="<?php echo $nilai[0]->nilai_bobot1 ?>">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <div>
                                                                  <button type="submit" name="submit" class="btn btn-success" value="simpan">Yes</button>
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">No</button>
                                                                </div>
                                                              </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
                    
                     <div class="modal fade" id="updateB<?php echo $b->nopeg ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Form Booster</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <form id="demo-form2" action="<?php echo base_url()?>user/editbooster/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                              <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomer Pegawai
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" readonly required name="nopeg" class="form-control col-md-7 col-xs-12" value="<?php echo $b->nopeg ?>">
                                                                </div>
                                                              </div>
                                                             <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required name="nama_booster" class="form-control col-md-7 col-xs-12" value="<?php echo $b->nama_booster ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Handphone
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required name="no_hp" class="form-control col-md-7 col-xs-12" value="<?php echo $b->no_hp ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="email" id="first-name" required name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $b->email ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Foto
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="file" id="first-name" required name="file" class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                              </div>
                                                              <div class="ln_solid"></div>
                                                                 <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('unit');?>">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Direktorat
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12"  readonly value="<?php echo $this->session->userdata('direktorat');?>">
                                                                </div>
                                                              </div>
                                                                <br/>
                                                              <div class="form-group">
                                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                  <button type="submit" name="submit" class="btn btn-success" value="simpan">Submit</button>
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                                                                </div>
                                                              </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
              </div>
            </div>

            <div class="container-fluid">
                <div class="x_panel">
              <div class="x_title">
                  <h2 style='font-weight: bold'>Tim Implementasi Budaya</h2>
                <br/><br/>
                    </div></div>
              <div class="row">
            <?php $a=count($anggota); if($a==0){ ?>
             <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="card" style="width:400px">
            
                      <div class="card-body">
                        <h4 class="card-title">Anda belum memiliki Tim Implementasi Budaya</h4>
                          <p class="card-text"></p>
                          <br/>
                          <button class="btn btn-success" data-toggle="modal"  data-target="#addtib">Add Anggota</button>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
           
            <?php } else { ?>
            <?php foreach ($anggota as $a) { ?>
            <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-3 col-sm-3 col-xs-12 " >
                                <div class="profile_img" >
                                  <div id="crop-avatar"  >
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" width="80px" height="130px"  src="<?php echo base_url().'assets/photo_tib/'.$a->photo ?>" alt="Avatar" >
                                  </div>
                                </div>
                                <br>
                                <ul class="list-unstyled user_data">
                                  <li><i class="fa fa-map-marker user-profile-icon"></i> Unit : <?php echo $this->session->userdata('username'); ?>
                                  </li>
                                </ul>
                          <ul class="list-unstyled user_data">
                                  <li><?php if($a->status_aktif==1){ ?>
                                    <i class="fa fa-check-circle" style="color:#6699ff"></i><span> Valid until : <?php echo $a->aktif_end ?></span>  <?php } else { ?>
                                   <i class="fa fa-warning" style="color:red"></i><span>Tidak Aktif</span>  <?php } ?>
                                  </li>
                                </ul>
                              </div>    
                      <div class="card-body">
                        <h3 class="card-title"><?php echo $a->nama ?> </h3>
                          <p class="card-text">Id : <?php echo $a->nopeg ?></p>
                          <br/>
                          <p class="card-text"><b>Posisi :</b> <?php echo $a->posisi ?></p>
                          <p class="card-text"><b>Phone :</b> <?php echo $a->no_hp ?></p>
                          <p class="card-text"><b>Email :</b> <?php echo $a->email ?></p>
                          <p class="card-text"><b>Direktorat :</b> <?php echo $a->direktorat ?></p>
                          <br/>
                          <div>
                            <button class="btn btn-primary" data-toggle="modal"  data-target="#updateA<?php echo $a->nopeg ?>">Edit Profile</button>
                            <button class="btn btn-danger" data-toggle="modal"  data-target="#deleteB<?php echo $a->nopeg ?>">Remove</button>
                          </div>
             
                    </div>
                  </div>
                </div>
            </div>
                  <div class="modal fade" id="deleteB<?php echo $a->nopeg ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Remove Anggota Tim Implementasi Budaya</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <form id="demo-form2" action="<?php echo base_url()?>user/deletettib/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                              <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                                                                    <div class="form-group">
                                                                <div >
                                                                    <h3  for="first-name">Are you sure to remove <?php echo $a->nama ?> from Tim Implementasi Budaya?
                                                                </h3>
                                                                     <input type="hidden" id="first-name" readonly required name="nopeg"  value="<?php echo $a->nopeg ?>">
                                                                    <input type="hidden" class="form-control" name="bobot1" autocomplete="off" value="<?php echo $nilai[0]->nilai_bobot1 ?>">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <div>
                                                                  <button type="submit" name="submit" class="btn btn-success" value="simpan">Yes</button>
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">No</button>
                                                                </div>
                                                              </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
                  
                   <div class="modal fade" id="updateA<?php echo $a->nopeg ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Form Anggota TIB</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <form id="demo-form2" action="<?php echo base_url()?>user/editbudaya/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                              <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomer Pegawai
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" readonly required name="nopeg" class="form-control col-md-7 col-xs-12" value="<?php echo $a->nopeg ?>">
                                                                </div>
                                                              </div>
                                                             <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required name="nama" class="form-control col-md-7 col-xs-12" value="<?php echo $a->nama ?>">
                                                                </div>
                                                              </div>
                                                                    <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Posisi
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required name="posisi" class="form-control col-md-7 col-xs-12" value="<?php echo $a->posisi ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Handphone
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required name="no_hp" class="form-control col-md-7 col-xs-12" value="<?php echo $a->no_hp ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="email" id="first-name" required name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $a->email ?>">
                                                                </div>
                                                              </div>
                                                                <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Foto
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="file" id="first-name" required name="file" class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                              </div>
                                                              <div class="ln_solid"></div>
                                                                 <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unit
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('unit');?>">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Direktorat
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                  <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12"  readonly value="<?php echo $this->session->userdata('direktorat');?>">
                                                                </div>
                                                              </div>
                                                                <br/>
                                                              <div class="form-group">
                                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                  <button type="submit" name="submit" class="btn btn-success" value="simpan">Submit</button>
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                                                                </div>
                                                              </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
            <?php } ?>
                  <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="card" style="width:400px">
                      
                      <div class="card-body">
                        <h4 class="card-title">Tambahkan Anggota baru</h4>
                          <p class="card-text"></p>
                          <br/>
                          <button class="btn btn-success" data-toggle="modal"  data-target="#addtib">Add Anggota</button>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <?php } ?>
                </div>
                      <br/>
                      <br/>
                      <br/></div>
            
            <div class="modal fade" id="addwarrior" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Form Change Agent</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart(base_url().'user/addwarrior')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                      <br/>
                                                                    <div class="form-group">
                                                                      <h5>Nomor Pegawai</h5>
                                                                      <input type="text" name="nopeg" class="form-control" autocomplete="off"  required>
                                                                    </div>
                                                                    </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Pegawai</h5>
                                                                      <input type="text" name="nama_warrior" class="form-control" autocomplete="off"  required>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nomor Handphone</h5>
                                                                      <input type="text" name="no_hp" class="form-control" autocomplete="off"  required>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Email</h5>
                                                                      <input type="email" name="email" class="form-control" autocomplete="off" required>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Display Picture</h5>
                                                                      <input type="file" id="file" name="file" required  value="" >
                                                                        <p><i>*foto harus dengan format .jpg atau .png dan ukuran max 2MB</i> <br/> <i>*format file : nopeg_nama.jpg</i></p>
                                                                    </div>
                                                                    </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Unit</h5>
                                                                      <input type="text" class="form-control" name="unit" autocomplete="off" disabled="true" value="<?php echo $this->session->userdata('unit') ?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Direktorat</h5>
                                                                      <input type="text" class="form-control" name="direktorat" autocomplete="off" disabled="true" value="<?php echo $this->session->userdata('direktorat') ?>">
                                                                        <input type="hidden" class="form-control" name="bobot1" autocomplete="off" value="<?php echo $nilai[0]->nilai_bobot1 ?>">
                                                                    </div>
                                                                  </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
            </div>
            
             <div class="modal fade" id="addbooster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Form Change Agent</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart(base_url().'user/addbooster')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                      <br/>
                                                                    <div class="form-group">
                                                                      <h5>Nomor Pegawai</h5>
                                                                      <input type="text" name="nopeg" class="form-control" autocomplete="off"  required>
                                                                    </div>
                                                                    </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Pegawai</h5>
                                                                      <input type="text" name="nama_booster" class="form-control" autocomplete="off"  required>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Tanggal Lahir</h5>
                                                                      <input type="date" name="tanggal_lahir" class="form-control" autocomplete="off"  required>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nomor Handphone</h5>
                                                                      <input type="text" name="no_hp" class="form-control" autocomplete="off"  required>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Email</h5>
                                                                      <input type="email" name="email" class="form-control" autocomplete="off" required>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Display Picture</h5>
                                                                      <input type="file" id="file" name="file" required  value="" >
                                                                        <p><i>*foto harus dengan format .jpg atau .png dan ukuran max 2MB</i> <br/> <i>*format file : nopeg_nama.jpg</i></p>
                                                                    </div>
                                                                    </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Unit</h5>
                                                                      <input type="text" class="form-control" name="unit" autocomplete="off" disabled="true" value="<?php echo $this->session->userdata('unit') ?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Direktorat</h5>
                                                                      <input type="text" class="form-control" name="direktorat" autocomplete="off" disabled="true" value="<?php echo $this->session->userdata('direktorat') ?>">
                                                                        <input type="hidden" class="form-control" name="bobot1" autocomplete="off" value="<?php echo $nilai[0]->nilai_bobot1 ?>">
                                                                    </div>
                                                                  </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
            </div>
            <div class="modal fade" id="addtib" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Form Anggota Tim Implementasi Budaya</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart(base_url().'user/add_timbudaya')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                      <br/>
                                                                    <div class="form-group">
                                                                      <h5>Nomor Pegawai</h5>
                                                                      <input type="text" name="nopeg" class="form-control" autocomplete="off"  value="">
                                                                  </div>
                                                                    </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Pegawai</h5>
                                                                      <input type="text" name="nama"  class="form-control" autocomplete="off"  value="">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Posisi</h5>
                                                                      <input type="text" name="posisi" class="form-control" autocomplete="off"  value="">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nomor Handphone</h5>
                                                                      <input type="text" name="no_hp" class="form-control" autocomplete="off"  value="">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Email</h5>
                                                                      <input type="email" name="email" class="form-control" autocomplete="off"  value="">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Display Picture</h5>
                                                                      <input type="file" id="file" name="file" required  value="" >
                                                                          <p><i>*foto harus dengan format .jpg atau .png dan ukuran max 2MB</i> <br/> <i>*format file : nopeg_nama.jpg</i></p>
                                                                    </div>
                                                                    </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Unit</h5>
                                                                      <input type="text" name="unit" class="form-control" autocomplete="off" disabled="true" value="<?php echo $this->session->userdata('unit') ?>">
                                                                        <input type="hidden" class="form-control" name="bobot1" autocomplete="off" value="<?php echo $nilai[0]->nilai_bobot1 ?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Direktorat</h5>
                                                                      <input type="text" name="direktorat" class="form-control" autocomplete="off" disabled="true" value="<?php echo $this->session->userdata('direktorat') ?>">
                                                                    </div>
                                                                  </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
            </div>
                
        <div class="footer">
            <div class="pull-right">

            </div>
            <div>
                <strong>Copyright</strong> &copy; 2019 Empowered by TRAX . All rights reserved.
            </div>
        </div>

        </div>
        </div>
<div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>

                <h4 class="modal-title"><?php echo $unit[0]->kode_unit; ?> - <?php echo $unit[0]->nama_unit; ?></h4>
                <small class="font-bold"><?php echo $unit[0]->kode_dir; ?></small>
                </div>                                              
              <div class="modal-body">
                    <!-- Isi Modal -->
                    <div class="box-body">
                    <form id="demo-form2" action="<?php echo base_url()?>user/editprofilepwd/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                  <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="first-name"  required name="passworda" class="form-control col-md-7 col-xs-12" placeholder="Type New Password">
                    </div>
                  </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="first-name" required name="passwordb" class="form-control col-md-7 col-xs-12" placeholder="Confirm New Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-success" value="simpan">Submit Password</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>
    
    <script>
        // Set timeout variables.
        var timoutWarning = 3500000; // Display warning in 14 Mins.
        var timoutNow = 3600000; // Timeout in 15 mins.
        var logoutUrl = '<?php echo base_url()?>user/logout'; // URL to logout page.
        
        var warningTimer;
        var timeoutTimer;
        
        // Start timers.
        function StartTimers() {
            warningTimer = setTimeout("IdleWarning()", timoutWarning);
            timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
        }
        
        // Reset timers.
        function ResetTimers() {
            clearTimeout(warningTimer);
            clearTimeout(timeoutTimer);
            StartTimers();
        }
        
        // Show idle timeout warning dialog.
        function IdleWarning() {
            
        }
        
        // Logout the user.
        function IdleTimeout() {
            window.location = logoutUrl;
        }
    </script> 
    
    <script>
          function move() {
              var elem = document.getElementById("linechartgauge"); 
              var width = 10;
              var id = setInterval(frame, 10);
              function frame() {
                if (width >= 100) {
                  clearInterval(id);
                } else {
                  width++; 
                  elem.style.width = width + '%'; 
                  elem.innerHTML = width * 1 + '%';
                }
              }
            }
    </script>
    
    <style>
        #linechartgauge {
          width: 10%;
          height: 30px;
          background-color: #52b4f2;
          text-align: center; /* To center it horizontally (if you want) */
          line-height: 30px; /* To center it vertically */
          color: white; 
        }
    </style>

</body>
</html>
