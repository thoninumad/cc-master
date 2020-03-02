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
    <title>Garuda Indonesia Group</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
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
                    <li >
                        <a href="<?php echo base_url()?>admin/index"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard Utama</span></a>

                    </li>
                    <li class="active">
                        <a href="<?php echo base_url()?>admin/dashboard_performance"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard Direktorat</span></a>

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
   

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                   

                    <div class="navbar-header">
              <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
              
          </div>
              <ul class="nav navbar-top-links navbar-right">
                  <li>
                      <span class="m-r-sm text-muted welcome-message">Welcome to Bank Jatim</span>
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
                <div class="col-sm-4">
                    <h2>Bank Jatim</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <a href="<?php echo base_url()?>admin/index">Home</a>
                        </li>
                        <li>
                            <a>Admin</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row">                 

                    
                <div class="row">
                    <?php  foreach ($direktorat as $d){ ?>                    
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">            
                            <div class="ibox-content">
                                <h2>Direktorat <b><?php echo $d->dir_code ?></b></h2>
                                <br/>
                                <div>
                                    <canvas id="radarChart<?php echo $d->dir_id ?>"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                
                </div>
            </div>


            <div class="footer">
                    <strong>Copyright</strong> Garuda Indonesia &copy; 2018
            </div>
        </div>
    </div>




    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url()?>js/inspinia.js"></script>
    <script src="<?php echo base_url()?>js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url()?>js/jquery-2.1.1.js"></script>
    <script>
        $('body.canvas-menu .sidebar-collapse').slimScroll({
                        height: '100%',
                        railOpacity: 0.9
                    });
    </script>
    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url();?>js/plugins/chartJs/Chart.min.js"></script>

    <!-- Knob -->
    <script src="<?php echo base_url()?>js/plugins/knob/jquery.knob.js"></script>

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

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($CBUSBY as $a) { ?>
                    "<?php echo $a->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($CBUSBY as $a) { ?>
                    "<?php echo $a->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart1").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    
    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div style="margin-top:5px;"><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field"> Remove</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        }); 
    </script>

    <script type="text/javascript">
    <?php 
    for ($i=1;$i<=count($list_pertanyaan);$i++) {
    ?>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap<?php echo $i?>"); //Fields wrapper
            var add_button      = $(".add_field_button<?php echo $i?>"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div style="margin-top:5px;"><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field<?php echo $i?>"> Remove</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field<?php echo $i?>", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        }); 
    <?php } ?>
    </script>
    
     <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BANYUWANGI as $b) { ?>
                    "<?php echo $b->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BANYUWANGI as $b) { ?>
                    "<?php echo $b->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart2").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
     <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($JEMBER as $c) { ?>
                    "<?php echo $c->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($JEMBER as $c) { ?>
                    "<?php echo $c->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart3").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
     <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($MALANG as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($MALANG as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart4").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($MADIUN as $e) { ?>
                    "<?php echo $e->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($MADIUN as $e) { ?>
                    "<?php echo $e->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart5").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($KEDIRI as $f) { ?>
                    "<?php echo $f->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($KEDIRI as $f) { ?>
                    "<?php echo $f->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart6").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($PAMEKASAN as $g) { ?>
                    "<?php echo $g->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($PAMEKASAN as $g) { ?>
                    "<?php echo $g->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart7").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BOJONEGORO as $h) { ?>
                    "<?php echo $h->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BOJONEGORO as $h) { ?>
                    "<?php echo $h->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart8").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($LUMAJANG as $i) { ?>
                    "<?php echo $i->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($LUMAJANG as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart9").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($NGAWI as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($NGAWI as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart10").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($JOMBANG as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($JOMBANG as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart11").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($KRAKSAAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($KRAKSAAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart12").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($PROBOLINGGO as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($PROBOLINGGO as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart13").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BLITAR as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BLITAR as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart14").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($TULUNGAGUNG as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($TULUNGAGUNG as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart15").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($TUBAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($TUBAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart16").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($MOJOKERTO as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($MOJOKERTO as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart17").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($SUMENEP as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($SUMENEP as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart18").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($SAMPANG as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($SAMPANG as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart19").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BANGKALAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BANGKALAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart20").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($PASURUAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($PASURUAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart21").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($NGANJUK as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($NGANJUK as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart22").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($TRENGGALEK as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($TRENGGALEK as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart23").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($PONOROGO as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($PONOROGO as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart24").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($PACITAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($PACITAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart25").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($GRESIK as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($GRESIK as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart26").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($SIDOARJO as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($SIDOARJO as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart27").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($LAMONGAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($LAMONGAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart28").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($SITUBONDO as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($SITUBONDO as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart29").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BONDOWOSO as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BONDOWOSO as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart30").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($MAGETAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($MAGETAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart31").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($SOETOMO as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($SOETOMO as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart32").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($PERAK as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($PERAK as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart33").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($KANGEAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($KANGEAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart34").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($JAKARTA as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($JAKARTA as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart35").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BATU as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BATU as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart36").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BAWEAN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BAWEAN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart37").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($PARE as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($PARE as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart38").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($KEPANJEN as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($KEPANJEN as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart39").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($BATAM as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($BATAM as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart40").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>
    
    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: [
                <?php foreach ($SYARIAH as $d) { ?>
                    "<?php echo $d->nama_unit; ?>",
                <?php } ?>
                ],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                <?php foreach ($SYARIAH as $d) { ?>
                    "<?php echo $d->progress; ?>",
                <?php } ?>
                      ],
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart41").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

</body>

</html>
