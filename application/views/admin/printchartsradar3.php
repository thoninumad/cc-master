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
    
     <div class="container-fluid border-bottom white-bg dashboard-header">
          <div class="row"> 
    <div class="ibox float-e-margins">  
                    <?php  foreach ($direktorat as $d){ ?>       
                    <div class="row" >
                        <div class="ibox float-e-margins">            
                            <div class="ibox-content">
                                <br/>
                                <div>
                                    <h2><b><?php echo $d->dir_code ?></b></h2>
                                    <canvas id="radarChart<?php echo $d->dir_id ?>" height="150px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
        var myVar = setTimeout(pageprint, 3000);
        function pageprint() {
          window.print();
        }
    </script>
    
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
          value: <?php echo number_format($avgkcp[0]->progress,0,".","."); ?> ,
          name: 'Corporate Progress'
        }]
      }]
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
        scaleShowLabels: true,
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
</body>
</html>
