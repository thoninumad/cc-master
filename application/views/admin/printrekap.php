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
    <div class="box-body">
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
                  <td style="width:12%"><?php echo $catunit[$i]->jumlah_ngumpulin; ?></td>
                  <td style="width:12%"><?php $belum = $catunit[$i]->jumlah_unit - $catunit[$i]->jumlah_ngumpulin; echo $belum;  ?></td>
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    <script>
        var myVar = setTimeout(pageprint, 1200);
        function pageprint() {
          window.print();
        }
    </script>
    
    <script>
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#print-btn': function (element, renderer) {
                return true;
            }
        };

        $('#submitpdf').click(function () {
            doc.fromHTML($('#print').html(), 15, 15, {
                'width': 170,
                    'elementHandlers': specialElementHandlers
            });
            doc.save('pdf-version.pdf');
        });
    </script>
    
    <script>
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#print-btn': function (element, renderer) {
                return true;
            }
        };

        $('#submitpdf2').click(function () {
            doc.fromHTML($('#divprint').html(), 15, 15, {
                'width': 170,
                    'elementHandlers': specialElementHandlers
            });
            document.print();
        });
    </script>
    
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