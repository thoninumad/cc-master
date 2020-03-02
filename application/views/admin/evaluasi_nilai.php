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

    <title>Bank Jatim | Dashboard</title>
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    
    <style>
            body {font-family: Arial;}

            /* Style the tab */
            .tab {
              overflow: hidden;
              border: 1px solid #ccc;
              background-color: #f1f1f1;
            }

            /* Style the buttons inside the tab */
            .tab button {
              background-color: inherit;
              float: left;
              border: none;
              outline: none;
              cursor: pointer;
              padding: 14px 16px;
              transition: 0.3s;
              font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
              background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
              background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
              display: none;
              padding: 6px 12px;
              border: 1px solid #ccc;
              border-top: none;
            }
</style>

</head>

<body>
    <div id="wrapper">
       <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url()?>img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('username')?></strong>
                             </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url()?>admin/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            GI
                        </div>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>admin/index"><i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard Utama</span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="<?php echo base_url()?>admin/index"><i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard Utama</span></a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_indexP/<?php echo date("m"); ?>"><i class="	fa fa-line-chart"></i> Dashboard Rekapitulasi</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_topEx"><i class="	fa fa-line-chart"></i> Dashboard Top Execution</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_botEx"><i class="	fa fa-line-chart"></i> Dashboard Bottom Execution</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>admin/dashboard_dir"><i class="fa fa-dashboard"></i> <span class="nav-label"> Dashboard Direktorat</span></a>
                    </li>
                    <li >
                        <a href=""><i class="	fa fa-area-chart"></i> <span class="nav-label"> Dashboard Cabang</span><span class="fa fa-caret-down pull-right"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>admin/dashboard_cb_utama"><i class="fa fa-area-chart"></i> Dashboard Cabang Utama</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_cb_pembantu"><i class="fa fa-area-chart"></i> Dashboard Cabang Pembantu</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_k_kas"><i class="fa fa-area-chart"></i> Dashboard Kantor Kas</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_cb_syariah"><i class="fa fa-area-chart"></i> Dashboard Cabang Utama Syariah</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_cb_pembantusy"><i class="fa fa-area-chart"></i> Dashboard Cabang Pembantu Syariah</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>admin/team_overall"><i class="	fa fa-puzzle-piece"></i> <span class="nav-label">Culture Team</span></a>
                    </li>
                    <li class="active">
                        <a href=""><i class="fa fa-edit"></i> <span class="nav-label">Culture Program Setting</span><span class="fa fa-caret-down pull-right"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>admin/program"><i class="fa fa-calendar"></i> List Program</a></li>
                            <li><a href="<?php echo base_url()?>admin/tambah_program"><i class="fa fa-bar-chart-o"></i> Tambah Program</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_bobot"><i class="fa fa-pencil"></i> Nilai Bobot</a></li>
                            <li class="active"><a href="<?php echo base_url()?>admin/evaluasi_nilai"><i class="fa fa-edit"></i> Evaluasi Nilai</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href=""><i class="	fa fa-users"></i> <span class="nav-label">User dan Pendaftaran</span><span class="fa fa-caret-down pull-right"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>admin/daftar_user"><i class="fa fa-user-plus"></i> Daftar User</a></li>
                            <li><a href="<?php echo base_url()?>admin/daftar_warrior"><i class="	fa fa-user-secret"></i> Daftar Culture Agent</a></li>
                            <li><a href="<?php echo base_url()?>admin/daftar_tib"><i class="	fa fa-shield"></i> Daftar TIB</a></li>
                            <li><a href="<?php echo base_url()?>admin/daftar_booster"><i class="	fa fa-paper-plane"></i> Daftar Booster</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
          <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

          </div>
              <ul class="nav navbar-top-links navbar-right">
                  <li>
                      <span class="m-r-sm text-muted welcome-message">Welcome to Culture Program</span>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>admin/logout">
                          <i class="fa fa-sign-out"></i> Log out
                      </a>
                  </li>
              </ul>
          </nav>
        </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Score Management</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admin">Home</a>
                        </li>
                        <li class="active">
                            <strong>Evaluate Scoring</strong>
                        </li>
                    </ol>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
        

            <div class="row wrapper white-bg page-heading" style="padding-top:20px">
                <div class="row">
                    <form id="demo-form2" action="<?php echo base_url()?>admin/ganti_bulan_evaluasinilai/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
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

                <div class="col-lg-12">
                        <div class="tab">
                          <button class="tablinks" onclick="openCity(event, 'dir')">Direktorat</button>
                          <button class="tablinks" onclick="openCity(event, 'kc')">Kantor Cabang</button>
                          <button class="tablinks" onclick="openCity(event, 'kcp')">Kantor CaPem</button>
                          <button class="tablinks" onclick="openCity(event, 'kk')">Kantor Kas</button>
                          <button class="tablinks" onclick="openCity(event, 'kcs')">Kantor Cabang Syariah</button>
                          <button class="tablinks" onclick="openCity(event, 'kcps')">Kantor CaPem Syariah</button>
                        </div>

                        <div id="dir" class="tabcontent">
                          <br/>
                          <h3>Direktorat</h3>
                           <div class="panel-group" id="accordion">             
                               <div class="panel panel-default">               
                                   <div class="panel-heading">                 
                                       <h4 class="panel-title">                   
                                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Assesment List</a>                 
                                       </h4>               
                                   </div>               
                                   <div id="collapse" class="panel-collapse collapse in">                 
                                       <div class="panel-body">  
                                           <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Program</th>
                            <th class="text-center" style="width:12%">Kode Unit</th>
                            <th class="text-center" style="width:12%">Unit</th>
                          <th class="text-center" style="width:12%">Capaian</th>
                            <th class="text-center" style="width:12%">Target</th>
                          <th class="text-center" style="width:14%">Input Date</th>
                          <th class="text-center" style="width:11%">Action</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <?php $a=count($nilaidir);  $b=0; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $nilaidir[$i]->input_detail_c?></td>
                      <td style="width:12%"><?php echo $nilaidir[$i]->input_user_c?></td>
                      <td style="width:12%"><?php echo $nilaidir[$i]->nama_unit?></td>
                  <td style="width:12%"><?php echo $nilaidir[$i]->input_realisasi?></td>
                  <td style="width:12%"><?php echo $nilaidir[$i]->	input_target?></td>
                  <td style="width:14%"><?php echo $nilaidir[$i]->last_modified_c?></td>
                  <td style="width:11%" class="text-center">
                                        <button type="button" class="btn btn-warning btn-xs table-hover" data-toggle="modal"  data-target="#evaluate<?php echo $nilaidir[$i]->input_id?>">Evaluate</button>
                  </td>
                </tr>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="evaluate<?php echo $nilaidir[$i]->input_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Evaluate Scoring</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart('admin/evaluate_scoring')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                        <input type="hidden" class="form-control" readonly name="id" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_id ?>">
                                                                      <input type="text" class="form-control" readonly name="program" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_detail_c?>">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Unit</h5>
                                                                      <input type="text" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaidir[$i]->nama_unit?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Target Capaian</h5>
                                                                      <input type="text" class="form-control" readonly name="target" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_target?>">
                                                                        <input type="hidden" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_user_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="tgl" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_tanggal ?>">
                                                                        <input type="hidden" class="form-control" readonly name="bln" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_bulan ?>">
                                                                        <input type="hidden" class="form-control" readonly name="thn" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_tahun ?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Capaian</h5>
                                                                      <input type="text" class="form-control" name="score" autocomplete="off" required value="<?php echo $nilaidir[$i]->input_realisasi?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Feedback</h5>
                                                                      <textarea class="form-control" rows="5" name="feedback" autocomplete="off" required></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Download Evidence</h5>
                                                                      <a href="<?php echo base_url()?>/uploads/<?php echo $nilaidir[$i]->input_attach ?>" class="btn btn-primary" download><i class="fa fa-download" style="color:white"></i>  Download Evidence</a>
                                                                    </div>
                                                                  </div>
                                                                     <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot4" value="100">Tracking Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot5" value="100">Enforcement Positif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                      <label><input type="checkbox" name="nlbobot6" value="100" >Enforcement Negatif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                         </div></div>    
                                                                   
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>            
                                        </div>
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                    </div>
                                       </div>
                                   </div>
                               </div>
                            </div>
                        </div>

                        <div id="kc" class="tabcontent">
                          <br/>
                          <h3>Kantor Cabang</h3>
                           <div class="panel-group" id="accordion">             <div class="panel panel-default">               <div class="panel-heading">                 <h4 class="panel-title">                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Assesment List</a>                 </h4>               </div>               <div id="collapse" class="panel-collapse collapse in">                 <div class="panel-body">  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Program</th>
                            <th class="text-center" style="width:12%">Kode Unit</th>
                            <th class="text-center" style="width:12%">Unit</th>
                          <th class="text-center" style="width:12%">Capaian</th>
                            <th class="text-center" style="width:12%">Target</th>
                          <th class="text-center" style="width:14%">Input Date</th>
                          <th class="text-center" style="width:11%">Action</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <?php $a=count($nilaikc);  $b=0; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $nilaikc[$i]->input_detail_c?></td>
                      <td style="width:12%"><?php echo $nilaikc[$i]->input_user_c?></td>
                      <td style="width:12%"><?php echo $nilaikc[$i]->nama_unit?></td>
                  <td style="width:12%"><?php echo $nilaikc[$i]->input_realisasi?></td>
                  <td style="width:12%"><?php echo $nilaikc[$i]->	input_target?></td>
                  <td style="width:14%"><?php echo $nilaikc[$i]->last_modified_c?></td>
                  <td style="width:11%" class="text-center">
                                        <button type="button" class="btn btn-warning btn-xs table-hover" data-toggle="modal"  data-target="#evaluate<?php echo $nilaikc[$i]->input_id?>">Evaluate</button>
                  </td>
                </tr>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="evaluate<?php echo $nilaikc[$i]->input_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Evaluate Scoring</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart('admin/evaluate_scoring')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                        <input type="hidden" class="form-control" readonly name="id" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_id ?>">
                                                                      <input type="text" class="form-control" readonly name="program" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_detail_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="tgl" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_tanggal ?>">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Unit</h5>
                                                                      <input type="text" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikc[$i]->nama_unit?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Target Capaian</h5>
                                                                      <input type="text" class="form-control" readonly name="target" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_target?>">
                                                                        <input type="hidden" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_user_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="bln" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_bulan ?>">
                                                                        <input type="hidden" class="form-control" readonly name="thn" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_tahun ?>">
                                                                        <?php
                                                                          $n=1;
                                                                          $queries=mysqli_query($con,"select * from total_score where kode_unit='". $nilaikc[$i]->input_user_c. "'");
                                                                          while ($row=mysqli_fetch_array($queries)) { ?>
                                                                        <?php if ($row['kode_unit']==null&&empty($row['kode_unit'])) { ?>
                                                                            <?php echo 'kosong'; } else{?>
                                                                                <input type="hidden" class="form-control" name="bobot3" autocomplete="off" value="<?php echo round($row['nilai_bobot3']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot4" autocomplete="off" value="<?php echo round($row['nilai_bobot4']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot5" autocomplete="off" value="<?php echo round($row['nilai_bobot5']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot6" autocomplete="off" value="<?php echo round($row['nilai_bobot6']) ?>">
                                                                        <?php } } ?>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Capaian</h5>
                                                                      <input type="text" class="form-control" name="score" autocomplete="off" required value="<?php echo $nilaikc[$i]->input_realisasi?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Feedback</h5>
                                                                      <textarea class="form-control" rows="5" name="feedback" autocomplete="off" required></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Download Evidence</h5>
                                                                      <a href="<?php echo base_url()?>/uploads/<?php echo $nilaikc[$i]->input_attach ?>" class="btn btn-primary" download><i class="fa fa-download" style="color:white"></i>  Download Evidence</a>
                                                                    </div>
                                                                  </div>
                                                                     <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot4" value="100">Tracking Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot5" value="100">Enforcement Positif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                      <label><input type="checkbox" name="nlbobot6" value="100" >Enforcement Negatif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                         </div></div>    
                                                                   
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>            
                                        </div>
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                    </div>
                        </div>
                               </div>
                                   </div>
                               </div>
                            </div>

                        <div id="kcp" class="tabcontent">
                          <br/>
                          <h3>Kantor Cabang Pembantu</h3>
                           <div class="panel-group" id="accordion">             <div class="panel panel-default">               <div class="panel-heading">                 <h4 class="panel-title">                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Assesment List</a>                 </h4>               </div>               <div id="collapse" class="panel-collapse collapse in">                 <div class="panel-body">  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Program</th>
                            <th class="text-center" style="width:12%">Kode Unit</th>
                            <th class="text-center" style="width:12%">Unit</th>
                          <th class="text-center" style="width:12%">Capaian</th>
                            <th class="text-center" style="width:12%">Target</th>
                          <th class="text-center" style="width:14%">Input Date</th>
                          <th class="text-center" style="width:11%">Action</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <?php $a=count($nilaikcp);  $b=0; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $nilaikcp[$i]->input_detail_c?></td>
                      <td style="width:12%"><?php echo $nilaikcp[$i]->input_user_c?></td>
                      <td style="width:12%"><?php echo $nilaikcp[$i]->nama_unit?></td>
                  <td style="width:12%"><?php echo $nilaikcp[$i]->input_realisasi?></td>
                  <td style="width:12%"><?php echo $nilaikcp[$i]->	input_target?></td>
                  <td style="width:14%"><?php echo $nilaikcp[$i]->last_modified_c?></td>
                  <td style="width:11%" class="text-center">
                                        <button type="button" class="btn btn-warning btn-xs table-hover" data-toggle="modal"  data-target="#evaluate<?php echo $nilaikcp[$i]->input_id?>">Evaluate</button>
                  </td>
                </tr>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="evaluate<?php echo $nilaikcp[$i]->input_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Evaluate Scoring</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart('admin/evaluate_scoring')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                        <input type="hidden" class="form-control" readonly name="id" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_id ?>">
                                                                      <input type="text" class="form-control" readonly name="program" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_detail_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="tgl" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_tanggal ?>">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Unit</h5>
                                                                      <input type="text" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikcp[$i]->nama_unit?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Target Capaian</h5>
                                                                      <input type="text" class="form-control" readonly name="target" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_target?>">
                                                                        <input type="hidden" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_user_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="bln" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_bulan ?>">
                                                                        <input type="hidden" class="form-control" readonly name="thn" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_tahun ?>">
                                                                        <?php
                                                                          $n=1;
                                                                          $queries=mysqli_query($con,"select * from total_score where kode_unit='". $nilaikcp[$i]->input_user_c. "'");
                                                                          while ($row=mysqli_fetch_array($queries)) { ?>
                                                                        <?php if ($row['kode_unit']==null&&empty($row['kode_unit'])) { ?>
                                                                            <?php echo 'kosong'; } else{?>
                                                                                <input type="hidden" class="form-control" name="bobot3" autocomplete="off" value="<?php echo round($row['nilai_bobot3']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot4" autocomplete="off" value="<?php echo round($row['nilai_bobot4']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot5" autocomplete="off" value="<?php echo round($row['nilai_bobot5']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot6" autocomplete="off" value="<?php echo round($row['nilai_bobot6']) ?>">
                                                                        <?php } } ?>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Capaian</h5>
                                                                      <input type="text" class="form-control" name="score" autocomplete="off" required value="<?php echo $nilaikcp[$i]->input_realisasi?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Feedback</h5>
                                                                      <textarea class="form-control" rows="5" name="feedback" autocomplete="off" required></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Download Evidence</h5>
                                                                      <a href="<?php echo base_url()?>/uploads/<?php echo $nilaikcp[$i]->input_attach ?>" class="btn btn-primary" download><i class="fa fa-download" style="color:white"></i>  Download Evidence</a>
                                                                    </div>
                                                                  </div>
                                                                     <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot4" value="100">Tracking Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot5" value="100">Enforcement Positif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                      <label><input type="checkbox" name="nlbobot6" value="100" >Enforcement Negatif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                         </div></div>    
                                                                   
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>            
                                        </div>
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                    </div>
                               </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                    
                        <div id="kk" class="tabcontent">
                          <br/>
                          <h3>Kantor Kas</h3>
                           <div class="panel-group" id="accordion">             <div class="panel panel-default">               <div class="panel-heading">                 <h4 class="panel-title">                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Assesment List</a>                 </h4>               </div>               <div id="collapse" class="panel-collapse collapse in">                 <div class="panel-body">  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Program</th>
                            <th class="text-center" style="width:12%">Kode Unit</th>
                            <th class="text-center" style="width:12%">Unit</th>
                          <th class="text-center" style="width:12%">Capaian</th>
                            <th class="text-center" style="width:12%">Target</th>
                          <th class="text-center" style="width:14%">Input Date</th>
                          <th class="text-center" style="width:11%">Action</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <?php $a=count($nilaikk);  $b=0; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $nilaikk[$i]->input_detail_c?></td>
                      <td style="width:12%"><?php echo $nilaikk[$i]->input_user_c?></td>
                      <td style="width:12%"><?php echo $nilaikk[$i]->nama_unit?></td>
                  <td style="width:12%"><?php echo $nilaikk[$i]->input_realisasi?></td>
                  <td style="width:12%"><?php echo $nilaikk[$i]->	input_target?></td>
                  <td style="width:14%"><?php echo $nilaikk[$i]->last_modified_c?></td>
                  <td style="width:11%" class="text-center">
                                        <button type="button" class="btn btn-warning btn-xs table-hover" data-toggle="modal"  data-target="#evaluate<?php echo $nilaikk[$i]->input_id?>">Evaluate</button>
                  </td>
                </tr>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="evaluate<?php echo $nilaikk[$i]->input_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Evaluate Scoring</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart('admin/evaluate_scoring')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                        <input type="hidden" class="form-control" readonly name="id" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_id ?>">
                                                                      <input type="text" class="form-control" readonly name="program" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_detail_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="tgl" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_tanggal ?>">
                                                                        <input type="hidden" class="form-control" readonly name="bln" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_bulan ?>">
                                                                        <input type="hidden" class="form-control" readonly name="thn" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_tahun ?>">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Unit</h5>
                                                                      <input type="text" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikk[$i]->nama_unit?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Target Capaian</h5>
                                                                      <input type="text" class="form-control" readonly name="target" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_target?>">
                                                                        <input type="hidden" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_user_c?>">
                                                                        <?php
                                                                          $n=1;
                                                                          $queries=mysqli_query($con,"select * from total_score where kode_unit='". $nilaikk[$i]->input_user_c. "'");
                                                                          while ($row=mysqli_fetch_array($queries)) { ?>
                                                                        <?php if ($row['kode_unit']==null&&empty($row['kode_unit'])) { ?>
                                                                            <?php echo 'kosong'; } else{?>
                                                                                <input type="hidden" class="form-control" name="bobot3" autocomplete="off" value="<?php echo round($row['nilai_bobot3']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot4" autocomplete="off" value="<?php echo round($row['nilai_bobot4']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot5" autocomplete="off" value="<?php echo round($row['nilai_bobot5']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot6" autocomplete="off" value="<?php echo round($row['nilai_bobot6']) ?>">
                                                                        <?php } } ?>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Capaian</h5>
                                                                      <input type="text" class="form-control" name="score" autocomplete="off" required value="<?php echo $nilaikk[$i]->input_realisasi?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Feedback</h5>
                                                                      <textarea class="form-control" rows="5" name="feedback" autocomplete="off" required></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Download Evidence</h5>
                                                                      <a href="<?php echo base_url()?>/uploads/<?php echo $nilaikk[$i]->input_attach ?>" class="btn btn-primary" download><i class="fa fa-download" style="color:white"></i>  Download Evidence</a>
                                                                    </div>
                                                                  </div>
                                                                     <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot4" value="100">Tracking Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot5" value="100">Enforcement Positif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                      <label><input type="checkbox" name="nlbobot6" value="100" >Enforcement Negatif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                         </div></div>    
                                                                   
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>            
                                        </div>
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                    </div>
                               </div>
                                   </div>
                               </div>
                            </div>
                        </div>

                        <div id="kcs" class="tabcontent">
                          <br/>
                          <h3>Kantor Cabang Syariah</h3>
                           <div class="panel-group" id="accordion">             <div class="panel panel-default">               <div class="panel-heading">                 <h4 class="panel-title">                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Assesment List</a>                 </h4>               </div>               <div id="collapse" class="panel-collapse collapse in">                 <div class="panel-body">  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Program</th>
                            <th class="text-center" style="width:12%">Kode Unit</th>
                            <th class="text-center" style="width:12%">Unit</th>
                          <th class="text-center" style="width:12%">Capaian</th>
                            <th class="text-center" style="width:12%">Target</th>
                          <th class="text-center" style="width:14%">Input Date</th>
                          <th class="text-center" style="width:11%">Action</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <?php $a=count($nilaikcs);  $b=0; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $nilaikcs[$i]->input_detail_c?></td>
                      <td style="width:12%"><?php echo $nilaikcs[$i]->input_user_c?></td>
                      <td style="width:12%"><?php echo $nilaikcs[$i]->nama_unit?></td>
                  <td style="width:12%"><?php echo $nilaikcs[$i]->input_realisasi?></td>
                  <td style="width:12%"><?php echo $nilaikcs[$i]->	input_target?></td>
                  <td style="width:14%"><?php echo $nilaikcs[$i]->last_modified_c?></td>
                  <td style="width:11%" class="text-center">
                                        <button type="button" class="btn btn-warning btn-xs table-hover" data-toggle="modal"  data-target="#evaluate<?php echo $nilaikcs[$i]->input_id?>">Evaluate</button>
                  </td>
                </tr>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="evaluate<?php echo $nilaikcs[$i]->input_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Evaluate Scoring</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart('admin/evaluate_scoring')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                        <input type="hidden" class="form-control" readonly name="id" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_id ?>">
                                                                      <input type="text" class="form-control" readonly name="program" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_detail_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="tgl" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_tanggal ?>">
                                                                        <input type="hidden" class="form-control" readonly name="bln" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_bulan ?>">
                                                                        <input type="hidden" class="form-control" readonly name="thn" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_tahun ?>">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Unit</h5>
                                                                      <input type="text" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikcs[$i]->nama_unit?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Target Capaian</h5>
                                                                      <input type="text" class="form-control" readonly name="target" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_target?>">
                                                                        <input type="hidden" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_user_c?>">
                                                                        <?php
                                                                          $n=1;
                                                                          $queries=mysqli_query($con,"select * from total_score where kode_unit='". $nilaikcs[$i]->input_user_c. "'");
                                                                          while ($row=mysqli_fetch_array($queries)) { ?>
                                                                        <?php if ($row['kode_unit']==null&&empty($row['kode_unit'])) { ?>
                                                                            <?php echo 'kosong'; } else{?>
                                                                                <input type="hidden" class="form-control" name="bobot3" autocomplete="off" value="<?php echo round($row['nilai_bobot3']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot4" autocomplete="off" value="<?php echo round($row['nilai_bobot4']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot5" autocomplete="off" value="<?php echo round($row['nilai_bobot5']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot6" autocomplete="off" value="<?php echo round($row['nilai_bobot6']) ?>">
                                                                        <?php } } ?>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Capaian</h5>
                                                                      <input type="text" class="form-control" name="score" autocomplete="off" required value="<?php echo $nilaikcs[$i]->input_realisasi?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Feedback</h5>
                                                                      <textarea class="form-control" rows="5" name="feedback" autocomplete="off" required></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Download Evidence</h5>
                                                                      <a href="<?php echo base_url()?>/uploads/<?php echo $nilaikcs[$i]->input_attach ?>" class="btn btn-primary" download><i class="fa fa-download" style="color:white"></i>  Download Evidence</a>
                                                                    </div>
                                                                  </div>
                                                                     <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot4" value="100">Tracking Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot5" value="100">Enforcement Positif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                      <label><input type="checkbox" name="nlbobot6" value="100" >Enforcement Negatif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                         </div></div>    
                                                                   
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>            
                                        </div>
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                    </div>
                               </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                        
                        <div id="kcps" class="tabcontent">
                          <br/>
                          <h3>Kantor Cabang Pembantu Syariah</h3>
                           <div class="panel-group" id="accordion">             <div class="panel panel-default">               <div class="panel-heading">                 <h4 class="panel-title">                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Assesment List</a>                 </h4>               </div>               <div id="collapse" class="panel-collapse collapse in">                 <div class="panel-body">  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Program</th>
                            <th class="text-center" style="width:12%">Kode Unit</th>
                            <th class="text-center" style="width:12%">Unit</th>
                          <th class="text-center" style="width:12%">Capaian</th>
                            <th class="text-center" style="width:12%">Target</th>
                          <th class="text-center" style="width:14%">Input Date</th>
                          <th class="text-center" style="width:11%">Action</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <?php $a=count($nilaikcps);  $b=0; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $nilaikcps[$i]->input_detail_c?></td>
                      <td style="width:12%"><?php echo $nilaikcps[$i]->input_user_c?></td>
                      <td style="width:12%"><?php echo $nilaikcps[$i]->nama_unit?></td>
                  <td style="width:12%"><?php echo $nilaikcps[$i]->input_realisasi?></td>
                  <td style="width:12%"><?php echo $nilaikcps[$i]->	input_target?></td>
                  <td style="width:14%"><?php echo $nilaikcps[$i]->last_modified_c?></td>
                  <td style="width:11%" class="text-center">
                                        <button type="button" class="btn btn-warning btn-xs table-hover" data-toggle="modal"  data-target="#evaluate<?php echo $nilaikcps[$i]->input_id?>">Evaluate</button>
                  </td>
                </tr>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="evaluate<?php echo $nilaikcps[$i]->input_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Evaluate Scoring</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart('admin/evaluate_scoring')?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                        <input type="hidden" class="form-control" readonly name="id" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_id ?>">
                                                                      <input type="text" class="form-control" readonly name="program" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_detail_c?>">
                                                                        <input type="hidden" class="form-control" readonly name="tgl" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_tanggal ?>">
                                                                        <input type="hidden" class="form-control" readonly name="bln" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_bulan ?>">
                                                                        <input type="hidden" class="form-control" readonly name="thn" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_tahun ?>">
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Unit</h5>
                                                                      <input type="text" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikcps[$i]->nama_unit?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Target Capaian</h5>
                                                                      <input type="text" class="form-control" readonly name="target" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_target?>">
                                                                        <input type="hidden" class="form-control" readonly name="unit" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_user_c?>">
                                                                        <?php
                                                                          $n=1;
                                                                          $queries=mysqli_query($con,"select * from total_score where kode_unit='". $nilaikcps[$i]->input_user_c. "'");
                                                                          while ($row=mysqli_fetch_array($queries)) { ?>
                                                                        <?php if ($row['kode_unit']==null&&empty($row['kode_unit'])) { ?>
                                                                            <?php echo 'kosong'; } else{?>
                                                                                <input type="hidden" class="form-control" name="bobot3" autocomplete="off" value="<?php echo round($row['nilai_bobot3']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot4" autocomplete="off" value="<?php echo round($row['nilai_bobot4']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot5" autocomplete="off" value="<?php echo round($row['nilai_bobot5']) ?>">
                                                                                <input type="hidden" class="form-control" name="bobot6" autocomplete="off" value="<?php echo round($row['nilai_bobot6']) ?>">
                                                                        <?php } } ?>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Capaian</h5>
                                                                      <input type="text" class="form-control" name="score" autocomplete="off" required value="<?php echo $nilaikcps[$i]->input_realisasi?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Feedback</h5>
                                                                      <textarea class="form-control" rows="5" name="feedback" autocomplete="off" required></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Download Evidence</h5>
                                                                      <a href="<?php echo base_url()?>/uploads/<?php echo $nilaikcps[$i]->input_attach ?>" class="btn btn-primary" download><i class="fa fa-download" style="color:white"></i>  Download Evidence</a>
                                                                    </div>
                                                                  </div>
                                                                     <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot4" value="100">Tracking Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                      <label><input type="checkbox" name="nlbobot5" value="100">Enforcement Positif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                    <div class="checkbox disabled">
                                                                      <label><input type="checkbox" name="nlbobot6" value="100" >Enforcement Negatif Method berjalan (view evidence)</label>
                                                                    </div>
                                                                         </div></div>    
                                                                   
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-success" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>            
                                        </div>
                                            <?php } ?>
                                            </tbody>
                                          </table>
                                    </div>
                               </div>
                                   </div>
                               </div>
                            </div>
                        </div>

                  

                    </div>
                </div>
                <div class="footer">
                  <div class="row">

                      <div class="footer">
                          <div>
                              <strong>Copyright</strong> &copy; 2019 Empowered by TRAX . All rights reserved.
                          </div>
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

    <!-- Page-Level Scripts -->
        <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Daftar Unit'},
                    {extend: 'pdf', title: 'Daftar Unit'},

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
    <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        </script>    
    


</body>
</html>
