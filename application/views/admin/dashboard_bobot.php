
<?php
                              if($this->input->post('is_submitted')){
                                          $bobot1      = set_value('bobot1');
                                          $bobot2      = set_value('bobot2');
                                          $bobot3      = set_value('bobot3');
                                          $bobot4      = set_value('bobot4');
                                          $bobot5      = set_value('bobot5');
                                          $bobot6      = set_value('bobot6');
                              }
                              else {
                                          $bobot1      = $bobot->bobot1;
                                          $bobot2      = $bobot->bobot2;
                                          $bobot3      = $bobot->bobot3;
                                          $bobot4      = $bobot->bobot4;
                                          $bobot5      = $bobot->bobot5;
                                          $bobot6      = $bobot->bobot6;
                              }
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
                            <li class="active"><a href="<?php echo base_url()?>admin/dashboard_bobot"><i class="fa fa-pencil"></i> Nilai Bobot</a></li>
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
          

              


        <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Bobot Nilai <small>Berisi persentase bobot dari masing - masing asessment yang ada.</small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>

                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="ibox-content">                            
                            <?php echo form_open_multipart('admin/dashboard_bobot/')?>
                                <div class="box-body">                              
<!--
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5><strong>Bobot 1</strong></h5>
                                            <h5>Memiliki Warrior, Booster, dan Tim Implementasi Budaya</h5>
                                        </div>

                                        <div class="col-md-3">
                                        <br>
                                            <div class="input-group">                  
                                                <input type="text" class="form-control" name="bobot1" placeholder="Bobot" style="font-size: 11px" value="<?= $bobot1 ?>">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>
-->

                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5><strong>Bobot 1</strong></h5>
                                            <h5>Ketepatan Waktu Laporan (setiap tanggal 26)</h5>
                                        </div>

                                        <div class="col-md-3">
                                        <br>
                                            <div class="input-group">                  
                                                <input type="text" class="form-control" name="bobot2" placeholder="Bobot" style="font-size: 11px" value="<?= $bobot2 ?>">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5><strong>Bobot 2</strong></h5>
                                            <h5>Tingkat Pencapaian Implementasi Program (terecord di system)</h5>
                                        </div>

                                        <div class="col-md-3">
                                        <br>
                                            <div class="input-group">                  
                                                <input type="text" class="form-control" name="bobot3" placeholder="Bobot" style="font-size: 11px" value="<?= $bobot3 ?>">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5><strong>Bobot 3</strong></h5>
                                            <h5>Konsistensi Pelaksanaan Tracking (ada evidence)</h5>
                                        </div>

                                        <div class="col-md-3">
                                        <br>
                                            <div class="input-group">                  
                                                <input type="text" class="form-control" name="bobot4" placeholder="Bobot" style="font-size: 11px" value="<?= $bobot4 ?>">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5><strong>Bobot 4</strong></h5>
                                            <h5>Konsistensi Pemberian Reinforcement Positif</h5>
                                        </div>

                                        <div class="col-md-3">
                                        <br>
                                            <div class="input-group">                  
                                                <input type="text" class="form-control" name="bobot5" placeholder="Bobot" style="font-size: 11px" value="<?= $bobot5 ?>">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5><strong>Bobot 5</strong></h5>
                                            <h5>Konsistensi Pemberian Reinforcement Negatif (Corrective Action)</h5>
                                        </div>

                                        <div class="col-md-3">
                                        <br>
                                            <div class="input-group">                  
                                                <input type="text" class="form-control" name="bobot6" placeholder="Bobot" style="font-size: 11px" value="<?= $bobot5 ?>">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>
                                    </div> 
                                    <!-- /.box-body -->
                              
                                    <div class="hr-line-dashed"></div>
                                    <div class="box-footer">
                                        <button type="submit" 
                                                class="btn btn-success" 
                                                onclick="return confirm(\'Apakah Anda Yakin?\')">Simpan
                                        </button>
                                    </div>
                                </div>
                            <?php echo form_close()?>                              
                            </div>

                        </div>
                    </div


              

              </div>
            </div>
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

    var echartGauge = echarts.init(document.getElementById('echart_guage'), theme);

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
        name: 'Employee Innovation Index',
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
            [0.49, '#F44336'],
            [0.74, '#FFEB3B '],
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
          value: <?php echo number_format($progrescorporate[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
    });
</script>
<?php for ($i=1; $i <=9 ; $i++) { ?>
<script type="text/javascript">
        //GAUGE CHART//
        var dom<?php echo $i?> = document.getElementById("echart_guage<?php echo $i?>");
        var myChart<?php echo $i?> = echarts.init(dom<?php echo $i?>);
        var app = {};
        option = null;
        option = 
            {

                color: {
                    type: 'linear',
                    x: 0,
                    y: 0,
                    x2: 0,
                    y2: 1,
                    colorStops: [{
                        offset: 0, color: 'red' // color at 0% position
                    }, {
                        offset: 1, color: 'blue' // color at 100% position
                    }],
                    globalCoord: false // false by default
                },
                resize  : true,
                tooltip : 
                    {
                        formatter: "{a} <br/>{b} : <?php echo $progres[$i-1]->progress; ?> %"
                    },


                series: [
                    {
                        name: '业务指标',
                        type: 'gauge',
                        detail: {formatter: '<?php echo number_format($progres[$i-1]->progress,1,".","."); ?> %'},
                        data: <?php echo number_format($progres[$i-1]->progress,0,".","."); ?>, 
                        name:'Prosentase Ketercapaian <?php echo $progres[$i-1]->kode_dir; ?>',
                        axisLine: {
                            show: true,
                            lineStyle: {
                              color: [
                              [0.49, '#F44336'],
                              [0.74, '#FFEB3B '],
                              [1, '#00e676']
                              ],
                              width: 30
                            }
                          }
                    }
                        ]
            };


            if (option && typeof option === "object") 
                {
                    myChart<?php echo $i?>.setOption(option, true);
                }
    </script>
    <?php } ?>
</body>
</html>
    