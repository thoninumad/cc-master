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
    <title>Bank Jatim</title>

    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">

</head>

<body class="top-navigation" onload="StartTimers();" onmousemove="ResetTimers();">
    <div id="wrapper">
        <div id="page-wrapper" style="background: url(<?php echo base_url() ?>assets/home-bg.jpg) no-repeat center center scroll;background-size:cover;width: 100%;">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="/cc/user" class="navbar-brand"><img src="<?php echo base_url() ?>assets/logo.png" width="100" class="img-responsive"></a>
            </div>
            <div class="navbar-collapse collapse blue-bg" id="navbar">
                <ul class="nav navbar-top-links navbar-right"  style="color:black">
                    <li>
                           <h4><i class="fa fa-user"></i> Unit <?php echo $this->session->userdata('username') ?></h4>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/logout" style="color:black">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight" style="background: url(assets/home-bg.jpg) no-repeat center center scroll;">
            <div class="container " style="color:black">
          <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-md-10 col-sm-10 col-xs-12">
              <h3 >Track - Corporate Culture </h3>
              <h4 >Selamat Datang</h4>
              <br/>
              <!-- form grid slider -->
              <div class="x_panel" style="border-top: 6px solid #4F8BB1;">

                <div class="x_content" >
                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="x_title" style="text-align:center">
                      <h4 >Index Pencapaian Unit</h4>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div style="text-align: center; margin-bottom: 17px">
                        <span class="chart" data-percent="<?php echo $rerata; ?>">
                          <span class="percent"></span>
                        </span>persen
                      </div>
                    </div>
                    <h3 style="text-align:center"><?php echo $this->session->userdata('username'); ?></h3>
                    <div class="divider"></div>
                    <br />
                    <div style="text-align:center">
                      <a href="<?php echo base_url()?>user/history"><button type="submit" class="btn btn-primary btn-xs" style="width: 80% ; font-size: 100%" >Kembali</button></a>
                    </div>
                    <br>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <!-- after 2 -->
                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>Program Progress Feedback</h2>
                      </div>

                    </div>
                    <br>

                    <?php
                    $user=$this->session->userdata('username');
                    $id_pesan=$id_pesan;
                    $fb=mysqli_query($con, "SELECT * FROM cc_program_feedback where fb_recipient= '$user' and fb_id='$id_pesan'");
                    $fb_=mysqli_fetch_array($fb);
                    $sql=mysqli_query($con,"UPDATE cc_program_feedback set status='read' where fb_id='$id_pesan'");
                    if (mysqli_num_rows($fb)>0)
                    {

                      ?>
                      <div class="x_panel">
                        <div class="x_title">
                          <h2><?php echo $fb_['fb_subject']; ?></h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <p>from : <b><?php echo $fb_['fb_sender']; ?></b></p>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:right">
                            <p><?php echo $fb_['last_modified']; ?></p>
                          </div>
                          <br>
                          <br>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2><?php echo str_replace(array("\r\n", "\n"), array("<br />", "<br />"), $fb_['fb_detail']); ?></h2>
                          </div>
                        </div>
                      </div>
                      <?php

                    } else {
                      echo "<div class='x_panel'>";
                      echo "<div class='x_content'>";
                      echo "<p style='text-align:center'>Anda tidak memiliki Feedback</p>";
                      echo "</div>";
                      echo "</div>";
                    }
                    ?>

                    <!-- after 2 -->

                  </div>
                </div>
            </div>
            <br />
            <br />
            <!-- /form grid slider -->

          </div>
          <div class="col-md-1 col-sm-1 col-xs-12"></div>

        </div>
        </div>
        </div>
        <div class="footer">
            <div class="pull-right">

            </div>
            <div>
                <strong>Copyright</strong> &copy; 2017 Bank Jatim. All rights reserved.
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

    <script>
        // Set timeout variables.
        var timoutWarning = 3500000; // Display warning in 14 Mins.
        var timoutNow = 3600000; // Timeout in 15 mins.
        var logoutUrl = '<?php echo base_url()?>user/logout'; // URL to logout page.
        
        var warningTimer;
        var timeoutTimer;
        
        // Start timers.
        function StartTimers() {
            warningTimer = setTimeout("IdleWarning()", timoutWarning);
            timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
        }
        
        // Reset timers.
        function ResetTimers() {
            clearTimeout(warningTimer);
            clearTimeout(timeoutTimer);
            StartTimers();
        }
        
        // Show idle timeout warning dialog.
        function IdleWarning() {
            
        }
        
        // Logout the user.
        function IdleTimeout() {
            window.location = logoutUrl;
        }
    </script> 
    
    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>
    <style>
      .x_panel {
  position: relative;
  width: 100%;
  margin-bottom: 10px;
  padding: 10px 17px;
  display: inline-block;
  background: #fff;
  border: 1px solid #E6E9ED;
  -webkit-column-break-inside: avoid;
  -moz-column-break-inside: avoid;
  column-break-inside: avoid;
  opacity: 1;
  transition: all .2s ease; }
  .profile_title {
  background: #F5F7FA;
  border: 0;
  padding: 7px 0;
  display: -ms-flexbox;
  display: flex; }
    </style>
    <!-- easy-pie-chart -->
    <script src="<?php echo base_url();?>js/jquery.easypiechart.min.js"></script>
  <script>
  $(function() {
    $('.chart').easyPieChart({
      easing: 'easeOutElastic',
      delay: 3000,
      barColor: '#26B99A',
      trackColor: '#F5F7FA',
      scaleColor: false,
      lineWidth: 20,
      trackWidth: 20,
      lineCap: 'butt',
      onStep: function(from, to, percent) {
        $(this.el).find('.percent').text(Math.round(percent));
      }
    });
  });
  </script>
</body>
</html>
