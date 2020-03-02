<?php
session_start();
include('connection/conn.php');
?>
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
                    <li class="active">
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
              <h4 >Program History</h4>
              <br/>
              </div>
            </div>
            
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row wrapper white-bg page-heading" style="padding-top:20px">
                <div class="row">
                    <form id="demo-form2" action="<?php echo base_url()?>user/ganti_bulan_history/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pilih Bulan
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <select class="form-control" required="true" name="bulan">
                                      <option value="<?php echo $bulan; ?><?php echo $bulan2; ?>"><?php echo $bulan2; ?></option>
                                      <option value="01Jan">-----</option>
                                      <option value="01Jan">Jan</option>
                                      <option value="02Feb">Feb</option>
                                      <option value="03Mar">Mar</option>
                                      <option value="04Apr">Apr</option>
                                      <option value="05May">May</option>
                                      <option value="06Jun">Jun</option>
                                      <option value="07Jul">Jul</option>
                                      <option value="08Aug">Aug</option>
                                      <option value="09Sep">Sep</option>
                                      <option value="10Oct">Oct</option>
                                      <option value="11Nov">Nov</option>
                                      <option value="12Dec">Dec</option>
                                  </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-9">
                                     <button type="submit" name="submit" class="btn btn-success" value="simpan">Pilih</button>
                                </div>
                              </div>
                      </form>
                              
                        </div>
        
                <div class="col-lg-6">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Evaluasi yang telah dilakukan</a>
                        </h4>
                      </div>
                      <div id="collapse" class="panel-collapse collapse in">
                        <div class="panel-body">
                  <div class="table-responsive">
                       <?php
                              $a=count($program);
                              if ($a>=1) {
                              ?>
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:2%">No</th>
                          <th class="text-center" style="width:55%%">Program</th>
                          <th class="text-center" style="width:10%">Target</th>
                          <th class="text-center" style="width:10%">Capaian</th>
                          <th class="text-center" style="width:13%">Persentase (%)</th>
                          <th class="text-center" style="width:5%">Status</th>    
                          <th class="text-center" style="width:5%">Action</th>
                        </tr>
                      </thead>
                <tbody >
                  <?php 
                    $n = 1;
                    foreach ($program as $h) { ?>
                  <tr>
                  <td style="width:2%"><?php echo $n ?></td>
                  <td style="width:25%"><?php echo $h->input_detail_c ?></td>
                  <td style="width:5%"><?php echo $h->input_target ?></td>      
                  <td style="width:5%"><?php echo $h->input_realisasi ?></td>
                  <td style="width:12%"><?php echo $h->input_realisasi_ ?>%</td>
                  <td style="width:5%" class="text-center"> <?php if ($h->input_status  !=5 ){ ?> <span class="label label-success">Assessed</span> <?php }else { ?>  <span class="label label-danger">Unassessed</span> <?php  }  ?> </td>
                  <td style="width:5%" class="text-center">  <button type="button" class="btn btn-danger btn-xs table-hover" data-toggle="modal"  data-target="#lihat_feedback<?php echo $h->input_id ?>">Edit</button>
                  </td>
                </tr>
                    
                                    <?php $n++; } ?>
                    </tbody>
                        </table>
                      <?php } else { ?>
                        <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                            <thead>
                                    <tr class="headings">
                                      <th class="text-center" style="width:2%">No</th>
                          <th class="text-center" style="width:55%%">Program</th>
                          <th class="text-center" style="width:10%">Target</th>
                          <th class="text-center" style="width:10%">Capaian</th>
                          <th class="text-center" style="width:13%">Persentase (%)</th>
                          <th class="text-center" style="width:5%">Status</th>    
                          <th class="text-center" style="width:5%">Action</th>
                                    </tr>
                                  </thead>
                            <tbody >
                              <tr>
                                  <td colspan="7" class="text-center">Anda Belum Melakukan Evaluasi </td>
                                </tr>
                                 </tbody>
                        </table>
                      <?php } ?>
                        </div>
                          </div>
                        </div>
                      </div>
                    </div>
                        </div>
                
                <div class="col-lg-6">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Evaluasi yang telah dinilai</a>
                        </h4>
                      </div>
                      <div id="collapse" class="panel-collapse collapse in">
                        <div class="panel-body">
                  <div class="table-responsive">
                       <?php
                              $a=count($history);
                              if ($a>=1) {
                              ?>
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:2%">No</th>
                          <th class="text-center" style="width:55%%">Program</th>
                          <th class="text-center" style="width:10%">Score</th>
                          <th class="text-center" style="width:10%">Capaian</th>
                          <th class="text-center" style="width:13%">Tanggal</th>
                          <th class="text-center" style="width:5%">Status</th>    
                          <th class="text-center" style="width:5%">Feedback</th>
                        </tr>
                      </thead>
                <tbody >
                  <?php 
                    $n = 1;
                    foreach ($history as $h) { ?>
                  <tr>
                  <td style="width:2%"><?php echo $n ?></td>
                  <td style="width:25%"><?php echo $h->input_detail_c ?></td>
                  <td style="width:5%"><?php echo $h->input_score ?></td>      
                  <td style="width:5%"><?php echo $h->input_realisasi_ ?>%</td>
                  <td style="width:12%"><?php echo $h->last_modified_c ?></td>
                  <td style="width:5%" class="text-center"> <?php if ($h->input_status  !=5 ){ ?> <span class="label label-success">Assessed</span> <?php }else { ?>  <span class="label label-danger">Unassessed</span> <?php  }  ?> </td>
                  <td style="width:5%" class="text-center"> <?php if ($h->feedback_status  == 1 ){ ?>  <button type="button" class="btn btn-primary btn-xs table-hover" data-toggle="modal"  data-target="#lihat_feedback<?php echo $h->input_id ?>">Lihat</button> <?php }else { ?>   <button disabled="disabled" type="button" class="btn btn-primary btn-xs table-hover" data-toggle="modal"  data-target="#lihat_feedback<?php echo $h->input_id ?>">Lihat</button> <?php  }  ?>
                     
                  </td>
                </tr>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="lihat_feedback<?php echo $h->input_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">View Feedback </h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <div class="row">
                                                                  <div >
                                                                    <div class="form-group">
                                                                      <h5>Feedback</h5>
                                                                      <textarea class="form-control" rows="10" name="feedback" autocomplete="off" readonly><?php echo $h->fb_content ?></textarea>
                                                                    </div>
                                                                  </div>
                                                                    <br/>
                                                                <div class="row">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </div>

                                                          </div>
                                                              </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                    
                                    <?php $n++; } ?>
                        </tbody>
                      </table>
                      <?php } else { ?>
                        <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                            <thead>
                                    <tr class="headings">
                                      <th class="text-center" style="width:2%">No</th>
                          <th class="text-center" style="width:55%%">Program</th>
                          <th class="text-center" style="width:10%">Score</th>
                          <th class="text-center" style="width:10%">Capaian</th>
                          <th class="text-center" style="width:13%">Tanggal</th>
                          <th class="text-center" style="width:5%">Status</th>    
                          <th class="text-center" style="width:5%">Action</th>
                                    </tr>
                                  </thead>
                            <tbody >
                              <tr>
                                  <td colspan="7" class="text-center">Tidak ada evaluasi yang telah dinilai </td>
                                </tr>
                                 </tbody>
                        </table>
                      <?php } ?>
                        </div>
                          </div>
                        </div>
                      </div>
                    </div>
                        </div>
                  
                    </div>
                </div>
            
            <?php  foreach ($program as $h) { ?>
             <!-- Modal -->
                                                    <div class="modal fade" id="lihat_feedback<?php echo $h->input_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Edit Evaluasi </h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <div class="row">
                                                                <div class="col-md-12">
                                                                  <form id="demo-form2" action="<?php echo base_url()?>user/evaluasi_update/<?php echo $h->input_id;?>" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                                                      <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">
                                                                      <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Program
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                          <input type="text" id="first-name" name="program" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $h->input_detail?>">
                                                                          <input type="hidden" id="first-name" name="id_input" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $h->_input_id?>">
                                                                        </div>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Target Satuan
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                          <select id="heard" class="form-control col-md-7 col-xs-12" name="satuan" required>
                                                                                                                  <option value="<?php echo $h->input_satuan?>"><?php echo $h->input_satuan?></option>
                                                                                                                  <option disabled ></option>
                                                                                                                  <option value="Uang (Rp)">Uang (Rp)</option>
                                                                                                                  <option value="Persentase (%)">Persentase (%)</option>
                                                                                                                  <option value="Waktu (Hari)">Waktu (Hari)</option>
                                                                                                                  <option value="Jumlah (kali)">Jumlah (kali)</option>
                                                                                                                </select>
                                                                        </div>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Target
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                          <input type="text" name="target" id="first-name" required class="form-control col-md-7 col-xs-12" value="<?php echo $h->input_target?>" >
                                                                        </div>
                                                                      </div>
                                                                      <div class="ln_solid"></div>

                                                                      <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Capaian
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                          <input type="number" lang="nb" name="capaian" id="first-name" required class="form-control col-md-7 col-xs-12" value="<?php echo $h->input_realisasi ?>" >
                                                                        </div>
                                                                          <input type="hidden" class="form-control" name="status" autocomplete="off" value="5">
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Metode Tracking
                                                                        </label>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                          <select class="form-control" required="true" name="metodologi">
                                                                              <option value="<?php echo $h->input_metodologi ?>"><?php echo $h->input_metodologi ?></option>
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
                                                                              <option value="<?php echo $h->input_reinforcement_positif ?>"><?php echo $h->input_reinforcement_positif ?></option>
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
                                                                              <option value="<?php echo $h->input_reinforcement_negatif ?>"><?php echo $h->input_reinforcement_negatif ?></option>
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
                                                                          <input type="file" id="file" name="file"   value="" required>
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
                    <?php } ?>
            
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
    
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Daftar Evaluasi'},
                    {extend: 'pdf', title: 'Daftar Evaluasi'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    <!-- Mainly scripts -->
     <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url()?>js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url()?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url()?>js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url()?>js/inspinia.js"></script>
    <script src="<?php echo base_url()?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url()?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url()?>js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url()?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url()?>js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url()?>js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php echo base_url()?>js/plugins/toastr/toastr.min.js"></script>
    <!-- ECharts -->
    <script src="<?php echo base_url()?>vendors/echarts/dist/echarts.min.js"></script>
    <script src="<?php echo base_url()?>vendors/echarts/map/js/world.js"></script>
     <!-- Knob -->
    <script src="<?php echo base_url()?>js/plugins/jsKnob/jquery.knob.js"></script>

    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
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
    <!-- easy-pie-chart -->
    <script src="<?php echo base_url();?>js/jquery.easypiechart.min.js"></script>
  <script>
  $(function() {
    $('.chart').easyPieChart({
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: '#26B99A',
      trackColor: '#F5F7FA',
      scaleColor: false,
      lineWidth: 20,
      trackWidth: 20,
      lineCap: 'butt',
      onStep: function(from, to, percent) {
        $(this.el).find('.percent').text(Math.round(percent));
      }
    });
  });
  </script>
</body>
</html>
