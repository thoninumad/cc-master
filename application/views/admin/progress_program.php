<?php
session_start();
include('connection/conn.php');
$username=$unit;
$user=$unit;
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
                <button class="btn btn-default btn-xs table-hover" onclick="myFunction()"><i class="fa fa-print"></i> Print this page</button>
            </div>
          </div>
        </div>
      
      <div class="container-fluid border-bottom white-bg dashboard-header">
          <div class="x_panel" style="border-top: 6px solid #4F8BB1;">

                <div class="x_content" >
                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="x_title" style="text-align:center">
                      <h4 >Index Pencapaian Unit</h4>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div style="text-align: center; margin-bottom: 17px"><br/>
                        <?php $ppp=0; for ($i=0; $i <count($program) ; $i++) {
                            if ($program[$i]->persen_realisasi) $ppp=$ppp+$program[$i]->persen_realisasi;
                            $persenbar=$ppp/count($program); 
                        } ?> 
                        <input type="text" class="knob"                                             
                                                value=<?php echo round($persenbar) ?>
                                                data-min="0" 
                                                data-max=<?php echo 100;?>
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">
                      </div>
                    </div>
                    <h4 style="text-align:center"><?php echo $get_unit[0]->kode_unit; ?></h4>
                    <h3 style="text-align:center"><?php echo $get_unit[0]->nama_unit; ?></h3>
                    <h5 style="text-align:center"><?php echo $get_unit[0]->kode_dir; ?></h5>
                    <div class="divider"></div>
                    <br />
                    <div style="text-align:center">
                      <a ><button type="submit" class="btn btn-primary btn-xs" style="width: 70% ; height: 45 px ; font-size: 100%" ><b>Score : <?php echo $get_score[0]->total_score; ?></b></button></a>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Program Progress Report</h2>
                      </div>

                    </div>
                    <div class="x_panel ui-ribbon-container ">

                  <div class="x_content">
                   <?php 

                   $cc=mysqli_query($con, "SELECT * FROM cc_program where status= 'Default'");
                   if (mysqli_num_rows($cc)>0){

                     ?>
                     <table class="table table-hover" style="font-size:14px">
                      <thead>
                        <tr>
                          <th style="width:5%">#</th>
                          <th style="width:35%">Program</th>
                          <th style="width:15%; text-align:center">Target</th>
                          <th style="width:15%; text-align:center">Satuan</th>
                          <th style="width:15%; text-align:center">Capaian</th>
                          <th style="width:15%; text-align:center">Capaian (%)</th>
                          <th style="width:15%; text-align:center">Gap (%)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        while ($cc_program=mysqli_fetch_array($cc)) {
                          $xmen=$cc_program['cc_detail'];

                          ?>
                          <tr>

                            <?php
                            $sudah=mysqli_query($con, "SELECT * FROM cc_program_input where input_user='$user' and input_detail='$xmen'");
                            $gap=mysqli_query($con, "SELECT * FROM cc_program_eval where input_user_c='$user' and input_detail_c='$xmen'");
                            $isimen=mysqli_fetch_array($sudah);
                            $gapmen=mysqli_fetch_array($gap);
                            
                            ?>
                            <th scope="row" style="text-align:center; vertical-align:middle"><?php echo $no++; ?></th>
                            <td><?php echo $cc_program['cc_detail']; 
                              ?></td>
                              <td style="text-align:center">
                                <?php if(!$isimen['input_target']) echo "-"; else echo $isimen['input_target'];?>
                              </td> 
                              <td style="text-align:center">
                                <?php if(!$isimen['input_satuan']) echo "-"; else echo $isimen['input_satuan'];?>
                              </td>
                              <td style="text-align:center">
                                <?php if(!$gapmen['input_realisasi_']) echo "-"; else echo $gapmen['input_realisasi'];?>
                              </td>
                              <td style="text-align:center">
                                <?php if(!$gapmen['input_realisasi_']) echo "-"; else echo $gapmen['input_realisasi_'];?>%
                              </td>
                              <td style="text-align:center">
                                <?php if(!$gapmen['input_gap']) echo "0"; else echo $gapmen['input_gap'];?>%
                              </td>


                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php 

                  } else {
                    echo "Saat ini tidak ada program berjalan";
                  }
                  ?>
                </div>
              </div>



          </div>
          <div class="col-md-1 col-sm-1 col-xs-12"></div>

        </div>
        </div>
        </div>      
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row wrapper white-bg page-heading" style="padding-top:20px">
           

                <div class="col-lg-12">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Rekap Akumulasi Score</a>
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
                          <th class="text-center" style="width:25%">Program</th>
                          <th class="text-center" style="width:5%">Score</th>
                          <th class="text-center" style="width:5%">Capaian</th>
                          <th class="text-center" style="width:25%">Metodologi</th>
                          <th class="text-center" style="width:8%">Reinforcement Positif</th>
                          <th class="text-center" style="width:8%">Reinforcement Negatif</th>
                          <th class="text-center" style="width:12%">Tanggal</th>
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
                  <td style="width:25%"><?php echo $h->input_metodologi ?></td>
                  <td style="width:8%"><?php echo $h->input_reinforcement_positif ?></td>
                  <td style="width:8%"><?php echo $h->input_reinforcement_negatif ?></td>
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
                                      <th class="text-center" style="width:25%">Program</th>
                                      <th class="text-center" style="width:5%">Score</th>
                                      <th class="text-center" style="width:5%">Capaian</th>
                                      <th class="text-center" style="width:25%">Metodologi</th>
                                      <th class="text-center" style="width:8%">Reinforcement Positif</th>
                                      <th class="text-center" style="width:8%">Reinforcement Negatif</th>
                                      <th class="text-center" style="width:12%">Tanggal</th>
                                      <th class="text-center" style="width:5%">Status</th>    
                                      <th class="text-center" style="width:5%">Feedback</th>
                                    </tr>
                                  </thead>
                            <tbody >
                              <tr>
                                  <td colspan="9" class="text-center">Anda Belum Melakukan Evaluasi </td>
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
   <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    
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
        function myFunction() {
          window.print();
        }
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
    
</body>
</html>
