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

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url()?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url()?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">

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
                    <li class="active">
                        <a href="<?php echo base_url()?>admin/index"><i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard Utama</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>admin/index"><i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard Utama</span></a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_indexP/<?php echo date("m"); ?>"><i class="	fa fa-line-chart"></i> Dashboard Rekapitulasi</a></li>
                            <li class="active"><a href="<?php echo base_url()?>admin/dashboard_topEx"><i class="	fa fa-line-chart"></i> Dashboard Top Execution</a></li>
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
                    <li >
                        <a href=""><i class="fa fa-edit"></i> <span class="nav-label">Culture Program Setting</span><span class="fa fa-caret-down pull-right"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>admin/program"><i class="fa fa-calendar"></i> List Program</a></li>
                            <li><a href="<?php echo base_url()?>admin/tambah_program"><i class="fa fa-bar-chart-o"></i> Tambah Program</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_bobot"><i class="fa fa-pencil"></i> Nilai Bobot</a></li>
                            <li><a href="<?php echo base_url()?>admin/evaluasi_nilai"><i class="fa fa-edit"></i> Evaluasi Nilai</a></li>
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
                      <span class="m-r-sm text-muted welcome-message">Welcome to Bank Jatim Culture Program.</span>
                  </li>
                  <li>
                      <a href="<?php echo base_url()?>admin/logout">
                          <i class="fa fa-sign-out"></i> Log out
                      </a>
                  </li>
              </ul>
          </nav>
        </div>
            
       
             <div class="row border-bottom white-bg dashboard-header">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 widget_tally_box">

              <div class="x_title" style="text-align:center">
                <h2 >Top 3 Culture Execution</h2>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      
                  <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Top 3 Kantor Pusat</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover table-bordered" style="font-size:14px">
                      <thead>
                        <tr>
                          <th style="width:20%; text-align:center">Rank</th>
                          <th style="text-align:center">Unit Code</th>
                         <th style="text-align:center">Unit Name</th>   
                          <th style="text-align:center">Score</th>
                          
                        </tr>
                      </thead>
                      <tbody>       
                           

                              <tr>
                              <td style="text-align:center" >
                              1
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderDV[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                                    <?php echo substr($leaderDV[0]->nama_unit,0,35); ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $leaderDV[0]->total_score; ?> 
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderDV[1]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo substr($leaderDV[1]->nama_unit,0,35); ?>
                                 </td>
                              <td style="text-align:center" >
                              <?php echo $leaderDV[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderDV[2]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo substr($leaderDV[2]->nama_unit,0,20); ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $leaderDV[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>
                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModalb1">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModalb1" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Head Office Leaderboard</h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit yang masuk dalam kategori head office.</small>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(). 'admin/tambah_label'?>" method="post">
                                                            <table class="table table-hover table-bordered" style="font-size:14px">
                                                        <thead>
                                                          <tr>
                                                            <th style="width:20%; text-align:center">Rank</th>
                                                              <th style="text-align:center">Unit Code</th>
                                                            <th style="text-align:center">Unit Name</th>
                                                            <th style="text-align:center">Score</th>
                                                            
                                                          </tr>
                                                        </thead>
                                                        <tbody>       
                                                             
                                                                <?php for ($i=0; $i < count($leaderDV) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderDV[$i]->kode_unit; ?>
                                                                </td>
                                                                      <td style="text-align:center" ><a href="<?php echo base_url()?>admin/progress_program/<?php echo $leaderDV[$i]->kode_unit; ?>"><?php echo $leaderDV[$i]->nama_unit; ?></a>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderDV[$i]->total_score; ?> 
                                                                </td>
                                                              </tr>

                                                                <?php } ?>

                                                        </tbody>
                                                      </table>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                  </div>
                </div>
              </div>



              <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Top 3 Kantor Cabang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover table-bordered" style="font-size:14px">
                      <thead>
                        <tr>
                          <th style="width:20%; text-align:center">Rank</th>
                            <th style="text-align:center">Unit Code</th>
                          <th style="text-align:center">Unit Name</th>
                          <th style="text-align:center">Score</th>
                          
                        </tr>
                      </thead>
                      <tbody>       
                           

                              <tr>
                              <td style="text-align:center" >
                                1
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKC[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                              <?php echo substr($leaderKC[0]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKC[0]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKC[1]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKC[1]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKC[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKC[2]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKC[2]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKC[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>


                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModalb2">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModalb2" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Branch Office Leaderboard</h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit yang masuk dalam kategori branch office.</small>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(). 'admin/tambah_label'?>" method="post">
                                                            <table class="table table-hover table-bordered" style="font-size:14px">
                                                        <thead>
                                                          <tr>
                                                            <th style="width:20%; text-align:center">Rank</th>
                                                            <th style="text-align:center">Unit code</th>
                                                            <th style="text-align:center">Unit Name</th>
                                                            <th style="text-align:center">Score</th>
                                                            
                                                          </tr>
                                                        </thead>
                                                        <tbody>                                                                 

                                                                
                                                                 
                                                                 
                                                                <?php for ($i=0; $i < count($leaderKC) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKC[$i]->kode_unit; ?>
                                                                </td>
                                                                    <td style="text-align:center" ><a href="<?php echo base_url()?>admin/progress_program/<?php echo $leaderKC[$i]->kode_unit; ?>"><?php echo $leaderKC[$i]->nama_unit; ?></a>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKC[$i]->total_score; ?> 
                                                                </td>
                                                              </tr>

                                                                <?php } ?>
                                                              

                                                        </tbody>
                                                      </table>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                  </div>
                </div>
              </div></div>
                  
                  <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Top 3 Kantor Cabang Syariah</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover table-bordered" style="font-size:14px">
                      <thead>
                        <tr>
                          <th style="width:20%; text-align:center">Rank</th>
                            <th style="text-align:center">Unit Code</th>
                          <th style="text-align:center">Unit Name</th>
                          <th style="text-align:center">Score</th>
                          
                        </tr>
                      </thead>
                      <tbody>       
                           

                              <tr>
                              <td style="text-align:center" >
                                1
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCS[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                              <?php echo substr($leaderKCS[0]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCS[0]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCS[1]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKCS[1]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCS[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCS[2]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKCS[2]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCS[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>


                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModalb3">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModalb3" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Syariah Branch Office </h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit yang masuk dalam kategori syariah branch office.</small>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(). 'admin/tambah_label'?>" method="post">
                                                            <table class="table table-hover table-bordered" style="font-size:14px">
                                                        <thead>
                                                          <tr>
                                                            <th style="width:20%; text-align:center">Rank</th>
                                                            <th style="text-align:center">Unit code</th>
                                                            <th style="text-align:center">Unit Name</th>
                                                            <th style="text-align:center">Score</th>
                                                            
                                                          </tr>
                                                        </thead>
                                                        <tbody>                                                                 

                                                                
                                                                 
                                                                 
                                                                <?php for ($i=0; $i < count($leaderKCS) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKCS[$i]->kode_unit; ?>
                                                                </td>
                                                                    <td style="text-align:center" >
                                                                     <a href="<?php echo base_url()?>admin/progress_program/<?php echo $leaderKCS[$i]->kode_unit; ?>"><?php echo $leaderKCS[$i]->nama_unit; ?></a>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKCS[$i]->total_score; ?> 
                                                                </td>
                                                              </tr>

                                                                <?php } ?>
                                                              

                                                        </tbody>
                                                      </table>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                  </div>
                </div>
                      </div>
            </div>
             <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Top 3 Kantor Cabang Pembantu</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover table-bordered" style="font-size:14px">
                      <thead>
                        <tr>
                          <th style="width:20%; text-align:center">Rank</th>
                          <th style="text-align:center">Unit Code</th>
                         <th style="text-align:center">Unit Name</th>   
                          <th style="text-align:center">Score</th>
                          
                        </tr>
                      </thead>
                      <tbody>       
                           

                              <tr>
                              <td style="text-align:center" >
                              1
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCP[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                                    <?php echo substr($leaderKCP[0]->nama_unit,0,35); ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCP[0]->total_score; ?> 
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCP[1]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo substr($leaderKCP[1]->nama_unit,0,35); ?>
                                 </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCP[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCP[2]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo substr($leaderKCP[2]->nama_unit,0,35); ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCP[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>
                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModalb4">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModalb4" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Branch Office Leaderboard</h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit yang masuk dalam kategori Branch office.</small>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(). 'admin/tambah_label'?>" method="post">
                                                            <table class="table table-hover table-bordered" style="font-size:14px">
                                                        <thead>
                                                          <tr>
                                                            <th style="width:20%; text-align:center">Rank</th>
                                                              <th style="text-align:center">Unit Code</th>
                                                            <th style="text-align:center">Unit Name</th>
                                                            <th style="text-align:center">Score</th>
                                                            
                                                          </tr>
                                                        </thead>
                                                        <tbody>       
                                                             
                                                                <?php for ($i=0; $i < count($leaderKCP) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKCP[$i]->kode_unit; ?>
                                                                </td>
                                                                      <td style="text-align:center" ><a href="<?php echo base_url()?>admin/progress_program/<?php echo $leaderKCP[$i]->kode_unit; ?>"><?php echo $leaderKCP[$i]->nama_unit; ?></a>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKCP[$i]->total_score; ?> 
                                                                </td>
                                                              </tr>

                                                                <?php } ?>

                                                        </tbody>
                                                      </table>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                  </div>
                </div>
              </div>



              <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Top 3 Kantor Kas</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover table-bordered" style="font-size:14px">
                      <thead>
                        <tr>
                          <th style="width:20%; text-align:center">Rank</th>
                            <th style="text-align:center">Unit Code</th>
                          <th style="text-align:center">Unit Name</th>
                          <th style="text-align:center">Score</th>
                          
                        </tr>
                      </thead>
                      <tbody>       
                           

                              <tr>
                              <td style="text-align:center" >
                                1
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKK[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                              <?php echo substr($leaderKK[0]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKK[0]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKK[1]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKK[1]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKK[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKK[2]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKK[2]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKK[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>


                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModalb5">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModalb5" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Kas Office Leaderboard</h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit yang masuk dalam kategori Kas office.</small>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(). 'admin/tambah_label'?>" method="post">
                                                            <table class="table table-hover table-bordered" style="font-size:14px">
                                                        <thead>
                                                          <tr>
                                                            <th style="width:20%; text-align:center">Rank</th>
                                                            <th style="text-align:center">Unit code</th>
                                                            <th style="text-align:center">Unit Name</th>
                                                            <th style="text-align:center">Score</th>
                                                            
                                                          </tr>
                                                        </thead>
                                                        <tbody>                                                                 

                                                                
                                                                 
                                                                 
                                                                <?php for ($i=0; $i < count($leaderKK) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKK[$i]->kode_unit; ?>
                                                                </td>
                                                                    <td style="text-align:center" ><a href="<?php echo base_url()?>admin/progress_program/<?php echo $leaderKK[$i]->kode_unit; ?>"><?php echo $leaderKK[$i]->nama_unit; ?></a>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKK[$i]->total_score; ?> 
                                                                </td>
                                                              </tr>

                                                                <?php } ?>
                                                              

                                                        </tbody>
                                                      </table>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                  </div>
                </div>
              </div></div>
                  
                  <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Top 3 Kantor Cabang Pembantu Syariah</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover table-bordered" style="font-size:14px">
                      <thead>
                        <tr>
                          <th style="width:20%; text-align:center">Rank</th>
                            <th style="text-align:center">Unit Code</th>
                          <th style="text-align:center">Unit Name</th>
                          <th style="text-align:center">Score</th>
                          
                        </tr>
                      </thead>
                      <tbody>       
                           

                              <tr>
                              <td style="text-align:center" >
                                1
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCPS[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                              <?php echo substr($leaderKCPS[0]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCPS[0]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCPS[1]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKCPS[1]->nama_unit,0,35); ?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCPS[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCPS[2]->kode_unit; ?>  
                              </td>
                                <td style="text-align:center" >
                              <?php echo substr($leaderKCPS[2]->nama_unit,0,35);?>
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderKCPS[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>


                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModalb6">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModalb6" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Syariah Branch Office Leaderboard</h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit yang masuk dalam kategori syariah branch office.</small>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(). 'admin/tambah_label'?>" method="post">
                                                            <table class="table table-hover table-bordered" style="font-size:14px">
                                                        <thead>
                                                          <tr>
                                                            <th style="width:20%; text-align:center">Rank</th>
                                                            <th style="text-align:center">Unit code</th>
                                                            <th style="text-align:center">Unit Name</th>
                                                            <th style="text-align:center">Score</th>
                                                            
                                                          </tr>
                                                        </thead>
                                                        <tbody>                                                                 

                                                                
                                                                 
                                                                 
                                                                <?php for ($i=0; $i < count($leaderKCPS) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKCPS[$i]->kode_unit; ?>
                                                                </td>
                                                                    <td style="text-align:center" ><a href="<?php echo base_url()?>admin/progress_program/<?php echo $leaderKCPS[$i]->kode_unit; ?>"><?php echo $leaderKCPS[$i]->nama_unit; ?></a>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderKCPS[$i]->total_score; ?> 
                                                                </td>
                                                              </tr>

                                                                <?php } ?>
                                                              

                                                        </tbody>
                                                      </table>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                  </div>
                </div>
                      </div>
            </div>
            
            
<div class="row border-bottom white-bg dashboard-header">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 widget_tally_box">

              <div class="x_title" style="text-align:center">
               
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
          
         
          <div class="footer">
              <div>
                  <strong>Copyright</strong> &copy; 2019 Empowered by TRAX . All rights reserved.
              </div>
          </div>
        </div>
        </div>




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

    <script type="text/javascript">
        //KNOB CHART//
        $(".knob").knob(
        {
            draw: function ()
                {
                    // "tron" case
                    if (this.$.data('skin') == 'tron')
                        {
                            var a = this.angle(this.cv)  // Angle
                            , sa = this.startAngle          // Previous start angle
                            , sat = this.startAngle         // Start angle
                            , ea                            // Previous end angle
                            , eat = sat + a                 // End angle
                            , r = true;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                            && (sat = eat - 0.3)
                            && (eat = eat + 0.3);

                            if (this.o.displayPrevious)
                                {
                                    ea = this.startAngle + this.angle(this.value);
                                    this.o.cursor
                                    && (sa = ea - 0.3)
                                    && (ea = ea + 0.3);
                                    this.g.beginPath();
                                    this.g.strokeStyle = this.previousColor;
                                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                    this.g.stroke();
                                }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                }
        });
    </script>

       <script>
    var theme = {
      color: [
      '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
      '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
      ],

      gauge: {
        startAngle: 225,
        endAngle: -45,
        axisLine: {
          show: true,
          lineStyle: {
            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
            width: 8
          }
        },
        axisTick: {
          splitNumber: 10,
          length: 12,
          lineStyle: {
            color: 'auto'
          }
        },
        axisLabel: {
          textStyle: {
            color: 'auto'
          }
        },
        splitLine: {
          length: 18,
          lineStyle: {
            color: 'auto'
          }
        },
        pointer: {
          length: '90%',
          color: 'auto'
        },
        title: {
          textStyle: {
            color: '#333'
          }
        },
        detail: {
          textStyle: {
            color: 'auto'
          }
        }
      },
      textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
      }
    };

    var echartGauge = echarts.init(document.getElementById('echart_gauge'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          restore: {
            show: true,
            title: "Restore"
          },
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'Corporate Progress',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 220,
        endAngle: -40,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.50, '#F44336'],
            [0.75, '#FFEB3B '],
            [1, '#00e676']
            ],
            width: 30
          }
        },
        axisTick: {
          show: true,
          splitNumber: 5,
          length: 8,
          lineStyle: {
            color: '#eee',
            width: 1,
            type: 'solid'
          }
        },

        splitLine: {
          show: true,
          length: 30,
          lineStyle: {
            color: '#eee',
            width: 2,
            type: 'solid'
          }
        },
        pointer: {
          length: '80%',
          width: 8,
          color: 'auto'
        },
        title: {
          show: true,
          offsetCenter: ['0%', 100],
          textStyle: {
            color: '#333',
            fontSize: 15
          }
        },
        detail: {
          show: true,
          backgroundColor: 'rgba(0,0,0,0)',
          borderWidth: 0,
          borderColor: '#ccc',
          width: 100,
          height: 40,
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo number_format($progresutama[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>

       <script>
    var theme = {
      color: [
      '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
      '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
      ],

      gauge: {
        startAngle: 225,
        endAngle: -45,
        axisLine: {
          show: true,
          lineStyle: {
            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
            width: 8
          }
        },
        axisTick: {
          splitNumber: 10,
          length: 12,
          lineStyle: {
            color: 'auto'
          }
        },
        axisLabel: {
          textStyle: {
            color: 'auto'
          }
        },
        splitLine: {
          length: 18,
          lineStyle: {
            color: 'auto'
          }
        },
        pointer: {
          length: '90%',
          color: 'auto'
        },
        title: {
          textStyle: {
            color: '#333'
          }
        },
        detail: {
          textStyle: {
            color: 'auto'
          }
        }
      },
      textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
      }
    };

    var echartGauge = echarts.init(document.getElementById('echart_gauge2'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          restore: {
            show: true,
            title: "Restore"
          },
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'Corporate Progress',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 220,
        endAngle: -40,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.50, '#F44336'],
            [0.75, '#FFEB3B '],
            [1, '#00e676']
            ],
            width: 30
          }
        },
        axisTick: {
          show: true,
          splitNumber: 5,
          length: 8,
          lineStyle: {
            color: '#eee',
            width: 1,
            type: 'solid'
          }
        },

        splitLine: {
          show: true,
          length: 30,
          lineStyle: {
            color: '#eee',
            width: 2,
            type: 'solid'
          }
        },
        pointer: {
          length: '80%',
          width: 8,
          color: 'auto'
        },
        title: {
          show: true,
          offsetCenter: ['0%', 100],
          textStyle: {
            color: '#333',
            fontSize: 15
          }
        },
        detail: {
          show: true,
          backgroundColor: 'rgba(0,0,0,0)',
          borderWidth: 0,
          borderColor: '#ccc',
          width: 100,
          height: 40,
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo number_format($progrescabang[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>

    <script>
    var theme = {
      color: [
      '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
      '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
      ],

      gauge: {
        startAngle: 225,
        endAngle: -45,
        axisLine: {
          show: true,
          lineStyle: {
            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
            width: 8
          }
        },
        axisTick: {
          splitNumber: 10,
          length: 12,
          lineStyle: {
            color: 'auto'
          }
        },
        axisLabel: {
          textStyle: {
            color: 'auto'
          }
        },
        splitLine: {
          length: 18,
          lineStyle: {
            color: 'auto'
          }
        },
        pointer: {
          length: '90%',
          color: 'auto'
        },
        title: {
          textStyle: {
            color: '#333'
          }
        },
        detail: {
          textStyle: {
            color: 'auto'
          }
        }
      },
      textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
      }
    };

    var echartGauge = echarts.init(document.getElementById('echart_gauge3'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          restore: {
            show: true,
            title: "Restore"
          },
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'Corporate Progress',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 220,
        endAngle: -40,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.50, '#F44336'],
            [0.75, '#FFEB3B '],
            [1, '#00e676']
            ],
            width: 30
          }
        },
        axisTick: {
          show: true,
          splitNumber: 5,
          length: 8,
          lineStyle: {
            color: '#eee',
            width: 1,
            type: 'solid'
          }
        },

        splitLine: {
          show: true,
          length: 30,
          lineStyle: {
            color: '#eee',
            width: 2,
            type: 'solid'
          }
        },
        pointer: {
          length: '80%',
          width: 8,
          color: 'auto'
        },
        title: {
          show: true,
          offsetCenter: ['0%', 100],
          textStyle: {
            color: '#333',
            fontSize: 15
          }
        },
        detail: {
          show: true,
          backgroundColor: 'rgba(0,0,0,0)',
          borderWidth: 0,
          borderColor: '#ccc',
          width: 100,
          height: 40,
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo number_format($progressyariah[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>
    
    
       <script>
    var theme = {
      color: [
      '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
      '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
      ],

      gauge: {
        startAngle: 225,
        endAngle: -45,
        axisLine: {
          show: true,
          lineStyle: {
            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
            width: 8
          }
        },
        axisTick: {
          splitNumber: 10,
          length: 12,
          lineStyle: {
            color: 'auto'
          }
        },
        axisLabel: {
          textStyle: {
            color: 'auto'
          }
        },
        splitLine: {
          length: 18,
          lineStyle: {
            color: 'auto'
          }
        },
        pointer: {
          length: '90%',
          color: 'auto'
        },
        title: {
          textStyle: {
            color: '#333'
          }
        },
        detail: {
          textStyle: {
            color: 'auto'
          }
        }
      },
      textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
      }
    };

    var echartGauge = echarts.init(document.getElementById('echart_gauge4'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          restore: {
            show: true,
            title: "Restore"
          },
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'Corporate Progress',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 220,
        endAngle: -40,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.50, '#F44336'],
            [0.75, '#FFEB3B '],
            [1, '#00e676']
            ],
            width: 30
          }
        },
        axisTick: {
          show: true,
          splitNumber: 5,
          length: 8,
          lineStyle: {
            color: '#eee',
            width: 1,
            type: 'solid'
          }
        },

        splitLine: {
          show: true,
          length: 30,
          lineStyle: {
            color: '#eee',
            width: 2,
            type: 'solid'
          }
        },
        pointer: {
          length: '80%',
          width: 8,
          color: 'auto'
        },
        title: {
          show: true,
          offsetCenter: ['0%', 100],
          textStyle: {
            color: '#333',
            fontSize: 15
          }
        },
        detail: {
          show: true,
          backgroundColor: 'rgba(0,0,0,0)',
          borderWidth: 0,
          borderColor: '#ccc',
          width: 100,
          height: 40,
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo number_format($progresutama[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>

       <script>
    var theme = {
      color: [
      '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
      '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
      ],

      gauge: {
        startAngle: 225,
        endAngle: -45,
        axisLine: {
          show: true,
          lineStyle: {
            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
            width: 8
          }
        },
        axisTick: {
          splitNumber: 10,
          length: 12,
          lineStyle: {
            color: 'auto'
          }
        },
        axisLabel: {
          textStyle: {
            color: 'auto'
          }
        },
        splitLine: {
          length: 18,
          lineStyle: {
            color: 'auto'
          }
        },
        pointer: {
          length: '90%',
          color: 'auto'
        },
        title: {
          textStyle: {
            color: '#333'
          }
        },
        detail: {
          textStyle: {
            color: 'auto'
          }
        }
      },
      textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
      }
    };

    var echartGauge = echarts.init(document.getElementById('echart_gauge5'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          restore: {
            show: true,
            title: "Restore"
          },
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'Corporate Progress',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 220,
        endAngle: -40,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.50, '#F44336'],
            [0.75, '#FFEB3B '],
            [1, '#00e676']
            ],
            width: 30
          }
        },
        axisTick: {
          show: true,
          splitNumber: 5,
          length: 8,
          lineStyle: {
            color: '#eee',
            width: 1,
            type: 'solid'
          }
        },

        splitLine: {
          show: true,
          length: 30,
          lineStyle: {
            color: '#eee',
            width: 2,
            type: 'solid'
          }
        },
        pointer: {
          length: '80%',
          width: 8,
          color: 'auto'
        },
        title: {
          show: true,
          offsetCenter: ['0%', 100],
          textStyle: {
            color: '#333',
            fontSize: 15
          }
        },
        detail: {
          show: true,
          backgroundColor: 'rgba(0,0,0,0)',
          borderWidth: 0,
          borderColor: '#ccc',
          width: 100,
          height: 40,
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo number_format($progrescabang[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>

    <script>
    var theme = {
      color: [
      '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
      '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
      ],

      gauge: {
        startAngle: 225,
        endAngle: -45,
        axisLine: {
          show: true,
          lineStyle: {
            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
            width: 8
          }
        },
        axisTick: {
          splitNumber: 10,
          length: 12,
          lineStyle: {
            color: 'auto'
          }
        },
        axisLabel: {
          textStyle: {
            color: 'auto'
          }
        },
        splitLine: {
          length: 18,
          lineStyle: {
            color: 'auto'
          }
        },
        pointer: {
          length: '90%',
          color: 'auto'
        },
        title: {
          textStyle: {
            color: '#333'
          }
        },
        detail: {
          textStyle: {
            color: 'auto'
          }
        }
      },
      textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
      }
    };

    var echartGauge = echarts.init(document.getElementById('echart_gauge6'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          restore: {
            show: true,
            title: "Restore"
          },
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'Corporate Progress',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 220,
        endAngle: -40,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.50, '#F44336'],
            [0.75, '#FFEB3B '],
            [1, '#00e676']
            ],
            width: 30
          }
        },
        axisTick: {
          show: true,
          splitNumber: 5,
          length: 8,
          lineStyle: {
            color: '#eee',
            width: 1,
            type: 'solid'
          }
        },

        splitLine: {
          show: true,
          length: 30,
          lineStyle: {
            color: '#eee',
            width: 2,
            type: 'solid'
          }
        },
        pointer: {
          length: '80%',
          width: 8,
          color: 'auto'
        },
        title: {
          show: true,
          offsetCenter: ['0%', 100],
          textStyle: {
            color: '#333',
            fontSize: 15
          }
        },
        detail: {
          show: true,
          backgroundColor: 'rgba(0,0,0,0)',
          borderWidth: 0,
          borderColor: '#ccc',
          width: 100,
          height: 40,
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo number_format($progressyariah[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>
    
    
    <style>
        #highgauge1 {
            margin: 0 auto;
            max-width: 400px;
            min-width: 380px;
    }
    </style>
    <script>
            function renderIcons() {

            // Move icon
            if (!this.series[0].icon) {
                this.series[0].icon = this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8])
                    .attr({
                        'stroke': '#303030',
                        'stroke-linecap': 'round',
                        'stroke-linejoin': 'round',
                        'stroke-width': 2,
                        'zIndex': 10
                    })
                    .add(this.series[2].group);
            }
            this.series[0].icon.translate(
                this.chartWidth / 2 - 10,
                this.plotHeight / 2 - this.series[0].points[0].shapeArgs.innerR -
                    (this.series[0].points[0].shapeArgs.r - this.series[0].points[0].shapeArgs.innerR) / 2
            );

            // Exercise icon
            if (!this.series[1].icon) {
                this.series[1].icon = this.renderer.path(
                    ['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8,
                        'M', 8, -8, 'L', 16, 0, 8, 8]
                    )
                    .attr({
                        'stroke': '#ffffff',
                        'stroke-linecap': 'round',
                        'stroke-linejoin': 'round',
                        'stroke-width': 2,
                        'zIndex': 10
                    })
                    .add(this.series[2].group);
            }
            this.series[1].icon.translate(
                this.chartWidth / 2 - 10,
                this.plotHeight / 2 - this.series[1].points[0].shapeArgs.innerR -
                    (this.series[1].points[0].shapeArgs.r - this.series[1].points[0].shapeArgs.innerR) / 2
            );

            // Stand icon
            if (!this.series[2].icon) {
                this.series[2].icon = this.renderer.path(['M', 0, 8, 'L', 0, -8, 'M', -8, 0, 'L', 0, -8, 8, 0])
                    .attr({
                        'stroke': '#303030',
                        'stroke-linecap': 'round',
                        'stroke-linejoin': 'round',
                        'stroke-width': 2,
                        'zIndex': 10
                    })
                    .add(this.series[2].group);
            }

            this.series[2].icon.translate(
                this.chartWidth / 2 - 10,
                this.plotHeight / 2 - this.series[2].points[0].shapeArgs.innerR -
                    (this.series[2].points[0].shapeArgs.r - this.series[2].points[0].shapeArgs.innerR) / 2
            );
        }

        Highcharts.chart('highgauge1', {

            chart: {
                type: 'solidgauge',
                height: '110%',
                events: {
                    render: renderIcons
                }
            },

            title: {
                text: 'Corporate Tingkat Pencapaian',
                style: {
                    fontSize: '24px'
                }
            },

            tooltip: {
                borderWidth: 0,
                backgroundColor: 'none',
                shadow: false,
                style: {
                    fontSize: '16px'
                },
                pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}%</span>',
                positioner: function (labelWidth) {
                    return {
                        x: (this.chart.chartWidth - labelWidth) / 2,
                        y: (this.chart.plotHeight / 2) + 15
                    };
                }
            },

            pane: {
                startAngle: 0,
                endAngle: 360,
                background: [{ // Track for Move
                    outerRadius: '112%',
                    innerRadius: '88%',
                    backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[0])
                        .setOpacity(0.3)
                        .get(),
                    borderWidth: 0
                }, { // Track for Exercise
                    outerRadius: '87%',
                    innerRadius: '63%',
                    backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[1])
                        .setOpacity(0.3)
                        .get(),
                    borderWidth: 0
                }, { // Track for Stand
                    outerRadius: '62%',
                    innerRadius: '38%',
                    backgroundColor: Highcharts.Color(Highcharts.getOptions().colors[2])
                        .setOpacity(0.3)
                        .get(),
                    borderWidth: 0
                }]
            },

            yAxis: {
                min: 0,
                max: 100,
                lineWidth: 0,
                tickPositions: []
            },

            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        enabled: false
                    },
                    linecap: 'round',
                    stickyTracking: false,
                    rounded: true
                }
            },

            series: [{
                name: 'Utama',
                data: [{
                    color: Highcharts.getOptions().colors[0],
                    radius: '112%',
                    innerRadius: '88%',
                    y: <?php echo number_format($progresutama[0]->progress,0,".","."); ?>
                }]
            }, {
                name: 'Cabang',
                data: [{
                    color: Highcharts.getOptions().colors[1],
                    radius: '87%',
                    innerRadius: '63%',
                    y: <?php echo number_format($progrescabang[0]->progress,0,".","."); ?> 
                }]
            }, {
                name: 'Syariah',
                data: [{
                    color: Highcharts.getOptions().colors[2],
                    radius: '62%',
                    innerRadius: '38%',
                    y: <?php echo number_format($progressyariah[0]->progress,0,".","."); ?>
                }]
            }]
        });
    </script>
    
    <script>
    var theme = {
      color: [
      '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
      '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
      ],

      gauge: {
        startAngle: 225,
        endAngle: -45,
        axisLine: {
          show: true,
          lineStyle: {
            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
            width: 8
          }
        },
        axisTick: {
          splitNumber: 10,
          length: 12,
          lineStyle: {
            color: 'auto'
          }
        },
        axisLabel: {
          textStyle: {
            color: 'auto'
          }
        },
        splitLine: {
          length: 18,
          lineStyle: {
            color: 'auto'
          }
        },
        pointer: {
          length: '90%',
          color: 'auto'
        },
        title: {
          textStyle: {
            color: '#333'
          }
        },
        detail: {
          textStyle: {
            color: 'auto'
          }
        }
      },
      textStyle: {
        fontFamily: 'Arial, Verdana, sans-serif'
      }
    };

    var echartGauge = echarts.init(document.getElementById('echart_gauge10'), theme);

    echartGauge.setOption({
      tooltip: {
        formatter: "{a} <br/>{b} : {c}%"
      },
      toolbox: {
        show: true,
        feature: {
          restore: {
            show: true,
            title: "Restore"
          },
          saveAsImage: {
            show: true,
            title: "Save Image"
          }
        }
      },
      series: [{
        name: 'Corporate Progress',
        type: 'gauge',
        center: ['50%', '50%'],
        startAngle: 220,
        endAngle: -40,
        min: 0,
        max: 100,
        precision: 0,
        splitNumber: 10,
        axisLine: {
          show: true,
          lineStyle: {
            color: [
            [0.50, '#F44336'],
            [0.75, '#FFEB3B '],
            [1, '#00e676']
            ],
            width: 30
          }
        },
        axisTick: {
          show: true,
          splitNumber: 5,
          length: 8,
          lineStyle: {
            color: '#eee',
            width: 1,
            type: 'solid'
          }
        },

        splitLine: {
          show: true,
          length: 30,
          lineStyle: {
            color: '#eee',
            width: 2,
            type: 'solid'
          }
        },
        pointer: {
          length: '80%',
          width: 8,
          color: 'auto'
        },
        title: {
          show: true,
          offsetCenter: ['0%', 100],
          textStyle: {
            color: '#333',
            fontSize: 15
          }
        },
        detail: {
          show: true,
          backgroundColor: 'rgba(0,0,0,0)',
          borderWidth: 0,
          borderColor: '#ccc',
          width: 100,
          height: 40,
          formatter: '{value}%',
          textStyle: {
            color: 'auto',
            fontSize: 30
          }
        },
        data: [{
          value: <?php echo number_format($progrescorp[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>
    
</body>
</html>
