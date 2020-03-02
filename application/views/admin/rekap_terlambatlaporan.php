<?php
session_start();
include('connection/conn.php');
?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
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
    <style>
        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
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

<body >
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
                            <li class="active"><a href="<?php echo base_url()?>admin/dashboard_indexP/<?php echo date("m"); ?>"><i class="	fa fa-line-chart"></i> Dashboard Rekapitulasi</a></li>
                            <li ><a href="<?php echo base_url()?>admin/dashboard_topEx"><i class="	fa fa-line-chart"></i> Dashboard Top Execution</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_botEx"><i class="	fa fa-line-chart"></i> Dashboard Bottom Execution</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="<?php echo base_url()?>admin/dashboard_dir"><i class="fa fa-dashboard"></i> <span class="nav-label"> Dashboard Direktorat</span></a>
                    </li>
                    <li>
                        <a href=""><i class="	fa fa-area-chart"></i> <span class="nav-label"> Dashboard Cabang</span><span class="fa fa-caret-down pull-right"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>admin/dashboard_cb_utama"><i class="fa fa-area-chart"></i> Dashboard Cabang Utama</a></li>
                            <li ><a href="<?php echo base_url()?>admin/dashboard_cb_pembantu"><i class="fa fa-area-chart"></i> Dashboard Cabang Pembantu</a></li>
                            <li><a href="<?php echo base_url()?>admin/dashboard_k_kas"><i class="fa fa-area-chart"></i> Dashboard Kantor Kas</a></li>
                            <li ><a href="<?php echo base_url()?>admin/dashboard_cb_syariah"><i class="fa fa-area-chart"></i> Dashboard Cabang Utama Syariah</a></li>
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
            </div>
          </div>
        </div>
            
            <div class="tab">
              <button class="tablinks" ><a style="color:black;" href="<?php echo base_url()?>admin/dashboard_indexP/<?php echo date("m"); ?>">Jumlah Unit</a></button>
              <button class="tablinks" ><a style="color:black;" href="<?php echo base_url()?>admin/rekap_terlambatlaporan/<?php echo date("m"); ?>">Terlambat Laporan</a></button>
              <button class="tablinks" ><a style="color:black;" href="<?php echo base_url()?>admin/rekap_implementasi/<?php echo date("m"); ?>">Rekap Implementasi</a></button>
              <button class="tablinks" ><a style="color:black;" href="<?php echo base_url()?>admin/rekap_evaluasinilai/<?php echo date("m"); ?>">Rekap Evaluasi Nilai</a></button>
              <button class="tablinks" ><a style="color:black;" href="<?php echo base_url()?>admin/rekap_score/<?php echo date("m"); ?>">Rekap Score</a></button>
            </div>
               
            <!-- Tab content -->
                <div>
                       <div class="container-fluid border-bottom white-bg dashboard-header">
                          
                          <div class="row"> 
                            <div class="col-lg-12">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <div style="text-align:center">

                        </div>

                      </div>
                    </div>
                    </div>
            
            <div class="container-fluid border-bottom white-bg dashboard-header">
                  <div class="row">
                    
                  </div>
            <div class="row">
               <div class="x_title" style="text-align:center">
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="col-lg-12">
                    <h2>Unit Terlambat Laporan</h2><br/>
                          <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Program</th>
                            <th class="text-center" style="width:12%">Kode Unit</th>
                            <th class="text-center" style="width:12%">Unit</th>
                          <th class="text-center" style="width:12%">Kantor</th>
                          <th class="text-center" style="width:14%">Input Date</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <?php $a=count($lateeval);  $b=0; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $lateeval[$i]->input_detail_c?></td>
                      <td style="width:12%"><?php echo $lateeval[$i]->input_user_c?></td>
                      <td style="width:12%"><?php echo $lateeval[$i]->nama_unit?></td>
                  <td style="width:12%"><?php echo $lateeval[$i]->kode_dir?></td>
                  <td style="width:14%"><?php echo $lateeval[$i]->last_modified_c?></td>
                    </tr>
                        <?php } ?>
                        </tbody>
                              </table>
                  </div>
                <div style="text-align:center">
                  
                </div>
                </div></div>
              </div>
            </div>
                </div>
            
           <br/>
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
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Unit Terlambat Laporan "
            },
            axisY: {
                title: "Jumlah Unit Terlambat Laporan"
            },
            data: [{        
                type: "column",  
                showInLegend: true, 
                legendMarkerColor: "grey",
                legendText: "Bulan",
                dataPoints: [      
                    { y: <?php if(count($janb) < 1){echo 0;}else{ echo number_format($janb[0]->jumlah,0,".",".");} ?>, label: "Jan" },
                    { y: <?php if(count($febb) < 1){echo 0;}else{ echo number_format($febb[0]->jumlah,0,".",".");} ?>,  label: "Feb" },
                    { y: <?php if(count($marb) < 1){echo 0;}else{ echo number_format($marb[0]->jumlah,0,".",".");} ?>,  label: "Mar" },
                    { y: <?php if(count($aprb) < 1){echo 0;}else{ echo number_format($aprb[0]->jumlah,0,".",".");} ?>,  label: "Apr" },
                    { y: <?php if(count($meib) < 1){echo 0;}else{ echo number_format($meib[0]->jumlah,0,".",".");} ?>,  label: "Mei" },
                    { y: <?php if(count($junb) < 1){echo 0;}else{ echo number_format($junb[0]->jumlah,0,".",".");} ?>, label: "Jun" },
                    { y: <?php if(count($julb) < 1){echo 0;}else{ echo number_format($julb[0]->jumlah,0,".",".");} ?>, label: "Jul" },
                    { y: <?php if(count($agub) < 1){echo 0;}else{ echo number_format($agub[0]->jumlah,0,".",".");} ?>,  label: "Agu" },
                    { y: <?php if(count($sepb) < 1){echo 0;}else{ echo number_format($sepb[0]->jumlah,0,".",".");} ?>,  label: "Sep" },
                    { y: <?php if(count($oktb) < 1){echo 0;}else{ echo number_format($oktb[0]->jumlah,0,".",".");} ?>,  label: "Okt" },
                    { y: <?php if(count($novb) < 1){echo 0;}else{ echo number_format($novb[0]->jumlah,0,".",".");} ?>,  label: "Nov" },
                    { y: <?php if(count($desb) < 1){echo 0;}else{ echo number_format($desb[0]->jumlah,0,".",".");} ?>, label: "Des" }
                ]
            }]
        });
        chart.render();

        }
    </script>
    
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

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
   
</body>
</html>
