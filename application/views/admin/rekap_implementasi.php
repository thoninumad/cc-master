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
                    <form id="demo-form2" action="<?php echo base_url()?>admin/rekap_bulan_impl/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                     <a class="btn btn-default btn-xs table-hover" href="<?php echo base_url()?>admin/printrekap/<?php echo $bulan; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>
                                </div>
                              </div>
                      </form>
                              
                        </div>
                        <hr>
            <div class="row">
               <div class="x_title" style="text-align:center">
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="col-lg-12">
                    <h2>Rekapitulasi Laporan Bulan ke-<?php echo $bulan; ?>, <?php echo date("Y"); ?></h2><br/>
                          <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-hover dataTables-example">
                      <thead>
                        <tr class="headings">
                          <th class="text-center" style="width:3%">No</th>
                          <th class="text-center" style="width:35%">Unit</th>
                            <th class="text-center" style="width:12%">Total</th>
                            <th class="text-center" style="width:12%">Sudah</th>
                          <th class="text-center" style="width:12%">Belum</th>
                          <th class="text-center" style="width:14%">Presentase</th>
                        </tr>
                      </thead>
                <tbody class="text-center">
                  <tr>
                  <td style="width:3%">1</td>
                  <td style="width:35%">Corporate</td>
                  <td style="width:12%"><?php if(count($all) < 1){$semua = 0; echo 0;}else{ $semua = count($all); echo $semua; } ?></td>
                  <?php $totalsudah=0; $totalbelum=0; foreach ($catunit as $c){
                        $totalsudah = $totalsudah + $c->jumlah_ngumpulin;
                        $totalbelum = $totalbelum + $c->jumlah_unit - $c->jumlah_ngumpulin;
                    } ?>
                      
                  <td style="width:12%"><?php echo $totalsudah; ?></td>
                  <td style="width:12%"><?php echo $totalbelum; ?></td>
                  <td style="width:14%"><?php $presentase = ($totalsudah/$semua)*100; echo number_format($presentase,0,".","."); ?>%</td>
                  </tr>
                  <?php $a=count($catunit);  $b=2; for ($i=0; $i < $a; $i++) { $b++; ?>
                  <tr>
                  <td style="width:3%"><?php echo $b?></td>
                  <td style="width:35%"><?php echo $catunit[$i]->nama; ?></td>
                  <td style="width:12%"><?php echo $catunit[$i]->jumlah_unit; ?></td>
                  <td style="width:12%"><a data-toggle="modal" data-target="#myModal<?php echo $catunit[$i]->id; ?>"><b><?php echo $catunit[$i]->jumlah_ngumpulin; ?></b></a></td>
                  <td style="width:12%"><a style="color: red" data-toggle="modal" data-target="#myModalXX<?php echo $catunit[$i]->id; ?>"><b><?php $belum = $catunit[$i]->jumlah_unit - $catunit[$i]->jumlah_ngumpulin; echo $belum;  ?></b></a></td>
                  <td style="width:14%"><?php $presentase = ($catunit[$i]->jumlah_ngumpulin/$catunit[$i]->jumlah_unit)*100; echo number_format($presentase,0,".","."); ?>%</td>
                    </tr>
                    <?php } ?>
                        </tbody>
                              </table>
                       
                    </div>
                <div style="text-align:center">
                  
                </div>
                </div></div>
              </div>
                <hr>
                     <div class="row">
                        <div class="col-lg-6">
                            <div id="containerCol" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
                        </div>
                        <div class="col-lg-6">
                           <div id="container" style="min-width: 100%; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        </div>
            </div>    
                </div>
            
            
            <?php $a=count($catunit);  $b=2; for ($i=0; $i < $a; $i++) { $b++; ?>
            <div class="modal inmodal" id="myModal<?php echo $catunit[$i]->id; ?>" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Daftar Unit Telah Melakukan Laporan Evaluasi</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">

                                                              <div class="table-responsive">
                                                              <table id="example1" class="table table-bordered table-striped table-hover dataTables-example" style="font-size:14px">
                                                                <thead>
                                                                  <tr>
                                                                    <th class="text-center" style="width:80%">Unit</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <?php
                                                                  $n=1;
                                                                  $id =  $catunit[$i]->id;       
                                                                  $queries=mysqli_query($con,"SELECT c.id_unit, c.kode_unit, c.total_score, a.input_user_c, a.unit_name, b.nama_unit FROM (SELECT DISTINCT(unit_name),id_ca,kode,input_user_c FROM ca_performance_upload LEFT JOIN cc_program_eval on ca_performance_upload.unit_name=cc_program_eval.input_user_c where ca_performance_upload.kode='$id' AND cc_program_eval.input_bulan = '$bulan')a JOIN unit b on a.unit_name=b.kode_unit JOIN total_score c ON b.kode_unit=c.kode_unit");
                                                                  while ($row=mysqli_fetch_array($queries)) {

                                                                    ?>
                                                                   
                                                                      <tr>
                                                                        <td><a href="<?php echo base_url()?>admin/progress_program/<?php echo $row['unit_name']?>"><b><?php echo $row['unit_name'];?></b> (<?php echo $row['nama_unit'];?>)</a></td>
                                                                      </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                              </table>
                                                            </div>

                                                            </div>
                                                          </div>
                                                        
                                            </div>
                                        </div>
                              </div>
            <?php } ?>
            
            <?php $a=count($catunit);  $b=2; for ($i=0; $i < $a; $i++) { $b++; ?>
            <div class="modal inmodal" id="myModalXX<?php echo $catunit[$i]->id; ?>" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Daftar Unit Yang Belum Melaporkan Evaluasi</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">

                                                              <div class="table-responsive">
                                                              <table id="example1" class="table table-bordered table-striped table-hover dataTables-example" style="font-size:14px">
                                                                <thead>
                                                                  <tr>
                                                                    <th class="text-center" style="width:80%">Unit</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <?php
                                                                  $n=1;
                                                                  $id =  $catunit[$i]->id;       
                                                                  $queries=mysqli_query($con,"select a.kode_unit, a.nama_unit from (SELECT kode_unit, nama_unit FROM unit WHERE kode_lokasi = '$id') a left outer join (SELECT cc_program_eval.input_user_c FROM cc_program_eval WHERE cc_program_eval.input_bulan = '$bulan') b on a.kode_unit = b.input_user_c where b.input_user_c is null");
                                                                  while ($row=mysqli_fetch_array($queries)) {

                                                                    ?>
                                                                   
                                                                      <tr>
                                                                        <td><b><?php echo $row['kode_unit'];?></b> (<?php echo $row['nama_unit'];?>)</td>
                                                                      </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                              </table>
                                                            </div>

                                                            </div>
                                                          </div>
                                                        
                                            </div>
                                        </div>
                              </div>
            <?php } ?>
            
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
    <script>
        function openCity(evt, cityName) {
              // Declare all variables
              var i, tabcontent, tablinks;

              // Get all elements with class="tabcontent" and hide them
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }

              // Get all elements with class="tablinks" and remove the class "active"
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }

              // Show the current tab, and add an "active" class to the button that opened the tab
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }
        </script>
        <script>
            Highcharts.chart('containerCol', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Rekapitulasi Laporan'
        },
        subtitle: {
            text: 'Selama bulan ke-<?php echo $bulan; ?>'
        },
        xAxis: {
            categories: [
                'Divisi',
                'KC',
                'KCP',
                'KK',
                'KCS',
                'KCPS',
                'Corporate'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (kali)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Kali</b></td></tr>',
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
            name: 'Sudah',
            <?php if(count($catunit)<5){ ?>
                data: [0, 0, 0, 0, 0, 0, <?php echo $totalsudah; ?>]
            <?php } else{ ?>
                data: [<?php echo $catunit[0]->jumlah_ngumpulin; ?>, <?php echo $catunit[1]->jumlah_ngumpulin; ?>, <?php echo $catunit[2]->jumlah_ngumpulin; ?>, <?php echo $catunit[3]->jumlah_ngumpulin; ?>, <?php echo $catunit[4]->jumlah_ngumpulin; ?>, <?php echo $catunit[5]->jumlah_ngumpulin; ?>, <?php echo $totalsudah; ?>]
            <?php } ?>
            

        }, {
            name: 'Belum',
            <?php if(count($catunit)<5){ ?>
                data: [0, 0, 0, 0, 0, 0, <?php echo $totalsudah; ?>]
            <?php } else{ ?>
                data: [<?php echo $catunit[0]->jumlah_unit - $catunit[0]->jumlah_ngumpulin; ?>, <?php echo $catunit[1]->jumlah_unit - $catunit[1]->jumlah_ngumpulin; ?>, <?php echo $catunit[2]->jumlah_unit - $catunit[2]->jumlah_ngumpulin; ?>, <?php echo $catunit[3]->jumlah_unit - $catunit[3]->jumlah_ngumpulin; ?>, <?php echo $catunit[4]->jumlah_unit - $catunit[4]->jumlah_ngumpulin; ?>, <?php echo $catunit[5]->jumlah_unit - $catunit[5]->jumlah_ngumpulin; ?>, <?php echo $totalbelum; ?>]
            <?php } ?>

        }]
    });
    </script>
   

    
    <script>
                // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Presentase Pengumpulan Laporan'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Presentase',
                colorByPoint: true,
                data: [{
                    name: 'Sudah',
                    y: <?php echo $totalsudah; ?>,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Belum',
                    y: <?php echo $totalbelum; ?>
                }]
            }]
        });
    </script>
</body>
</html>
