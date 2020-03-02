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
        <div id="page-wrapper" style="background: url(<?php echo base_url() ?>assets/home-bg.jpg) no-repeat center center scroll;background-size:cover;width: 100%;">
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
        <div class="wrapper wrapper-content animated fadeInRight" style="background: url(assets/home-bg.jpg) no-repeat center center scroll;">
            <div class="container " style="color:black">
          <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-md-10 col-sm-10 col-xs-12">
              <h3 >Track - Corporate Culture </h3>
              <h4 >Evaluasi</h4>
              <br/>
              <!-- form grid slider -->
              <div class="x_panel" style="border-top: 6px solid #4F8BB1;">

                <div class="x_content" >
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                    <div class="profile_img" >
                      <div id="crop-avatar"  >
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="<?php echo base_url()?>assets/user.png" alt="Avatar" >
                      </div>
                    </div>
                    <br>
                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-map-marker user-profile-icon"></i> Unit : <?php echo $this->session->userdata('username'); ?>
                      </li>
                    </ul>



                  </div>
                  <div class="container-fluid">
                      <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Program Report</h2>
                      </div>

                    </div>
                    <br>
                    <div class="x_panel ui-ribbon-container ">
                      <p style="font-size:14px"><?php echo $programunit->cc_desc?></p>
                    </div>
                    <div class="x_panel ui-ribbon-container ">
                      <div class="x_title">
                        <h2>Daftar Evaluasi</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <?php
                              $a=count($daftarevaluasi);
                              if ($a>=1) {
                              ?>
                          <?php for ($i=0; $i <$a ; $i++) {
                              ?>
                          <table class="table table-hover table-bordered" style="font-size:14px">
                            <thead style="font-size:12px">
                              <tr>
                                <th style="width:30%">Tanggal</th>
                                <th style="width:10%">Target</th>
                                <th>Capaian Dalam <?php echo $daftarevaluasi[0]->input_satuan;?></th>
                                <th style="width:15%">Capaian (%)</th>
                                <th style="width:10%">Metode Tracking</th>
                                <th style="width:10%">Reinforcement Positif</th>
                                <th style="width:10%">Reinforcement Negatif</th>
                                <th style="width:10%">Attachment File</th>
                                <th style="width:10%">Evaluasi Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                                <tr style="font-size:12px">
                                  <td><?php echo $daftarevaluasi[$i]->last_modified_c;?></td>
                                  <td><?php echo $daftarevaluasi[$i]->input_target ?></td>
                                  <td><?php echo $daftarevaluasi[$i]->input_realisasi ?></td>
                                  <td><?php echo $daftarevaluasi[$i]->input_realisasi_ ?></td>
                                  <td><?php echo $daftarevaluasi[$i]->input_metodologi ?></td>
                                  <td><?php echo $daftarevaluasi[$i]->input_reinforcement_positif ?></td>
                                  <td><?php echo $daftarevaluasi[$i]->input_reinforcement_negatif ?></td>
                                  <td><a href="<?php echo base_url()?>/uploads/<?php echo $daftarevaluasi[$i]->input_attach ?>" download><i class="fa fa-download" style="color:blue"></i>  <?php echo $daftarevaluasi[$i]->input_attach ?></a></td>
                                  <td><?php if ($daftarevaluasi[$i]->input_status!=5 ){ ?> <span class="label label-success">Assessed</span> <?php } else { ?>  <span class="label label-info">Submitted</span> <?php  }  ?></td>
                                </tr>
                              
                            </tbody>
                          </table>
                          <?php } ?>
                          
                          <?php
                          } else { ?>
                          <table class="table table-hover table-bordered" style="font-size:14px">
                            <thead style="font-size:12px">
                              <tr>
                                <th style="width:30%">Tanggal</th>
                                <th style="width:10%">Target</th>
                                <th>Capaian</th>
                                <th style="width:15%">Capaian (%)</th>
                                <th style="width:10%">Gap (%)</th>
                                <th style="width:10%">Metode Tracking</th>
                                <th style="width:10%">Reinforcement Positif</th>
                                <th style="width:10%">Reinforcement Negatif</th>
                                <th style="width:10%">Evaluasi Status</th>
                              </tr>
                            </thead>
                            <tbody thead style="font-size:12px">
                                <tr>
                                  <td colspan="9" class="text-center">Anda Belum Melakukan Evaluasi di Bulan <?php echo date("M"); ?></td>
                                </tr>

                            </tbody>
                          </table>
                          
                          <?php } ?>
                      </div>
                        <?php if(count($daftarevaluasi) > 0){ ?>
                        <div ><button class="btn btn-danger" data-toggle="modal"  data-target="#evaluasi" disabled><i class="fa fa-edit"></i> Evaluate</button>
                        <?php } else { ?>
                        <div ><button class="btn btn-info" data-toggle="modal"  data-target="#evaluasi"><i class="fa fa-edit"></i> Evaluate</button>
                        <?php } ?>
                        <a style="color:black" href="<?php echo base_url()?>user"><button class="btn btn-default" > Back</button></a></div>
                    </div>
                </div>

              </div>
            </div>
            <br />
            <br />
            <!-- /form grid slider -->

          </div>
          <div class="col-md-1 col-sm-1 col-xs-12"></div>

        </div>
        </div>
        </div>
            
            <div class="modal fade" id="evaluasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Evaluasi Program</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                        <div class="x_panel ui-ribbon-container ">
                          <div class="x_content">
                            <form id="demo-form2" action="<?php echo base_url()?>user/evaluasi_data/<?php echo $programunit->cc_id?>" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                              <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Program
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="first-name" name="program" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $programunit->input_detail?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Target Satuan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="heard" class="form-control col-md-7 col-xs-12" name="satuan" required>
                                                                          <option value="<?php echo $programunit->input_satuan?>"><?php echo $programunit->input_satuan?></option>
                                                                          <option disabled ></option>
                                                                          <option value="Uang (Rp)">Uang (Rp)</option>
                                                                          <option value="Persentase (%)">Persentase (%)</option>
                                                                          <option value="Waktu (Hari)">Waktu (Hari)</option>
                                                                          <option value="Jumlah (kali)">Jumlah (kali)</option>
                                                                        </select>
                                    <input type="hidden" id="first-name" name="id_input" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $programunit->_input_id?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Target
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="target" id="first-name" required class="form-control col-md-7 col-xs-12" value="<?php echo $programunit->input_target?>" >
                                </div>
                              </div>
                              <div class="ln_solid"></div>

                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Capaian
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" lang="nb" name="capaian" id="first-name" required class="form-control col-md-7 col-xs-12" value="" >
                                </div>
                                  <input type="hidden" class="form-control" name="status" autocomplete="off" value="5">
                                  <input type="hidden" class="form-control" name="bobot2" autocomplete="off" value="<?php echo $nilai[0]->nilai_bobot2 ?>">
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Metode Tracking
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" required="true" name="metodologi">
                                      <option value="">Choose..</option>
                                      <?php foreach($monitoring as $mm){ ?>
                                      <option value="<?php echo $mm->reinforcement ?>"><?php echo $mm->reinforcement ?></option>
                                      <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Reinforcement Positif
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" required="true" name="r_positif">
                                      <option value="">Choose..</option>
                                      <?php foreach($reinforcement_p as $rp){ ?>
                                      <option value="<?php echo $rp->reinforcement ?>"><?php echo $rp->reinforcement ?></option>
                                      <?php } ?>
                                      <option value="Other">Other..</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Reinforcement Negatif
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select class="form-control" required="true" name="r_negatif">
                                      <option value="">Choose..</option>
                                      <?php foreach($reinforcement_n as $rn){ ?>
                                      <option value="<?php echo $rn->reinforcement ?>"><?php echo $rn->reinforcement ?></option>
                                      <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bukti
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="file" id="file" name="file" required  value="" >
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <p><i>*Bukti harus dengan format .zip atau .rar dan ukuran max 4MB</i></p>
                                  <p><i>*Bukti berisi 3 folder dengan konten 1. Bukti Capaian Program, 2. Bukti  Metode Tracking, 3. Bukti Reinforcement</i></p>
                                  <p><i>*Jika file lebih dari 4MB, harap upload video di drive, copy link kedalam file txt dan upload dalam format .zip atau .rar</i></p>
                                </div>
                              </div>
                              <div class="ln_solid"></div>
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
                                                    </div>
                                                    </div>
            
        <div class="footer">
            <div class="pull-right">

            </div>
            <div>
                <strong>Copyright</strong> &copy; 2017 Bank Jatim. All rights reserved.
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

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>
    <style>
      .x_panel {
  position: relative;
  width: 100%;
  margin-bottom: 10px;
  padding: 10px 17px;
  display: inline-block;
  background: #fff;
  border: 1px solid #E6E9ED;
  -webkit-column-break-inside: avoid;
  -moz-column-break-inside: avoid;
  column-break-inside: avoid;
  opacity: 1;
  transition: all .2s ease; }
  .profile_title {
  background: #F5F7FA;
  border: 0;
  padding: 7px 0;
  display: -ms-flexbox;
  display: flex; }
    </style>
</body>
</html>
