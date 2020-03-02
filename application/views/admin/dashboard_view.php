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
    <link rel="stylesheet" type="text/css" href="path/to/chartjs/dist/Chart.min.css">

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
                            <li class="active"><a href="<?php echo base_url()?>admin/index"><i class="fa fa-th-large"></i> <span class="nav-label"> Dashboard Utama</span></a></li>
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
                <h2 >Index Pencapaian Corporate</h2>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      
      <div class="container-fluid border-bottom white-bg dashboard-header">
          <div class="row"> 
            <div class="col-lg-6">
                <div id="containerCol" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="col-lg-6" >

              <div class="x_title" style="text-align:center">
                <h2 style='font-weight: bold'>Average Corporate Progress</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="echart_gauge" style="height:370px;"></div>
                <div style="text-align:center">
                  
                </div>
              
              </div>
            </div>
          </div>
        </div>      
            
            <div class="container-fluid border-bottom white-bg dashboard-header">
          <div class="row"> 
            <div class="col-lg-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Top 3 Performers</h2>
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
                              <?php echo $leaderall[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                                    <?php echo $leaderall[0]->nama_unit; ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $leaderall[0]->total_score; ?> 
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderall[1]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo $leaderall[1]->nama_unit; ?>
                                 </td>
                              <td style="text-align:center" >
                              <?php echo $leaderall[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $leaderall[2]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo $leaderall[2]->nama_unit; ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $leaderall[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>
                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModal">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModal" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Top Performers</h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit yang masuk dalam kategori seluruh corporate dari tinggi ke rendah.</small>
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
                                                             
                                                                <?php for ($i=0; $i < count($leaderall) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderall[$i]->kode_unit; ?>
                                                                </td>
                                                                      <td style="text-align:center" >
                                                                      <?php echo $leaderall[$i]->nama_unit; ?>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $leaderall[$i]->total_score; ?> 
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
<!--
                <div class="widget red-bg p-lg text-center">
                  <?php
                  $cc=mysqli_query($con, "SELECT * FROM cc_program where status= 'Default'");
                  $count=mysqli_num_rows($cc);
                  
                  ?>
                   <?php
                  $cc2=mysqli_query($con, "SELECT * FROM cc_program where status IN ('Default', 'Active')");
                  $count2=mysqli_num_rows($cc2);
                  ?>
                            <div class="m-b-md">
                                <i class="fa fa-bell fa-4x"></i>
                                <h1 class="m-xs"><?php echo $count?></h1>
                                <h3 class="font-bold no-margins">
                                    Culture Program Aktif
                                </h3>
                            </div>
                        </div>  
-->
            </div>
            <div class="col-lg-6" >
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style='font-weight: bold'>Bottom 3 Performers</h2>
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
                              <?php echo $botall[0]->kode_unit; ?>
                              </td>
                                  <td style="text-align:center" >
                                    <?php echo $botall[0]->nama_unit; ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $botall[0]->total_score; ?> 
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                2
                              </td>
                              <td style="text-align:center" >
                              <?php echo $botall[1]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo $botall[1]->nama_unit; ?>
                                 </td>
                              <td style="text-align:center" >
                              <?php echo $botall[1]->total_score; ?>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td style="text-align:center" >
                                3
                              </td>
                              <td style="text-align:center" >
                              <?php echo $botall[2]->kode_unit; ?>
                              </td>
                                <td style="text-align:center" >
                                <?php echo $botall[2]->nama_unit; ?>
                                </td>
                              <td style="text-align:center" >
                              <?php echo $botall[2]->total_score; ?>  
                              </td>
                            </tr>

                      </tbody>
                    </table>
                    <button type="button" 
                            class="btn btn-block btn-outline btn-primary" 
                            data-toggle="modal" 
                            data-target="#myModalbot">
                    See All...
                    </button>

                    <div class="modal inmodal" id="myModalbot" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Bottom Performers</h4>
                                                        <small class="font-bold">urutan skor dari masing-masing unit dari rendah ke tinggi.</small>
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
                                                             
                                                                <?php for ($i=0; $i < count($botall) ; $i++) {  ?>
                                                                  
                                                                <tr>
                                                                <td style="text-align:center" >
                                                                <?php echo $i+1; ?>
                                                                </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $botall[$i]->kode_unit; ?>
                                                                </td>
                                                                      <td style="text-align:center" >
                                                                      <?php echo $botall[$i]->nama_unit; ?>
                                                                      </td>
                                                                <td style="text-align:center" >
                                                                <?php echo $botall[$i]->total_score; ?> 
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
            Highcharts.chart('containerCol', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Rata-rata Progress'
        },
        subtitle: {
            text: 'Setiap Kantor'
        },
        xAxis: {
            categories: [
                'Divisi',
                'KC',
                'KCP',
                'KK',
                'KCS',
                'KCPS'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Persentase (%)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Average Progress',
                data: [<?php echo number_format($progresdir[0]->progress,0,".","."); ?>, <?php echo number_format($progreskc[0]->progress,0,".","."); ?>, <?php echo number_format($progreskcp[0]->progress,0,".","."); ?>, <?php echo number_format($progreskk[0]->progress,0,".","."); ?>, <?php echo number_format($progreskcs[0]->progress,0,".","."); ?>, <?php echo number_format($progreskcps[0]->progress,0,".","."); ?>]
        
            

        }]
    });
    </script>
    <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Implementation Progress "
            },
            axisY: {
                title: "Average (%)"
            },
            data: [{        
                type: "column",  
                showInLegend: true, 
                legendMarkerColor: "grey",
                legendText: "Kantor",
                dataPoints: [      
                    { y: <?php echo number_format($progresdir[0]->progress,0,".","."); ?>, label: "Direktorat" },
                    { y: <?php echo number_format($progreskc[0]->progress,0,".","."); ?>,  label: "Cabang" },
                    { y: <?php echo number_format($progreskcp[0]->progress,0,".","."); ?>,  label: "Capem" },
                    { y: <?php echo number_format($progreskk[0]->progress,0,".","."); ?>,  label: "Kas" },
                    { y: <?php echo number_format($progreskcs[0]->progress,0,".","."); ?>,  label: "Cabang Syariah" },
                    { y: <?php echo number_format($progreskcps[0]->progress,0,".","."); ?>, label: "Capem Syariah" }
                ]
            }]
        });
        chart.render();

        }
    </script>
    <?php $avg = ($progresdir[0]->progress + $progreskc[0]->progress + $progreskcp[0]->progress + $progreskk[0]->progress + $progreskcs[0]->progress + $progreskcps[0]->progress)/6; ?>
    
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
          value: <?php echo number_format($avg,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });


</script>

    
</body>
</html>
