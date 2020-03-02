
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

<body class="top-navigation"  onload="StartTimers();" onmousemove="ResetTimers();">

    <div id="wrapper">
        <div id="page-wrapper" style="background: url(<?php echo base_url().'assets/home-bg.jpg' ?>) no-repeat center center scroll;background-size:cover;width: 100%; ">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-collapse collapse white-bg" id="navbar">
                <div class="navbar-header">
                    <a ><img src="<?php echo base_url().'assets/logo.png' ?>" width="100" class="img-responsive"></a>
                </div>
                <ul class="nav navbar-top-links navbar-right"  style="color:black">
                    <li>
                           <h4><a style="color:black" data-toggle="modal"  data-target="#edit_profile"><i class="fa fas fa-building"></i> Unit <?php echo $unit[0]->nama_unit; ?></a></h4>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/logout" style="color:black">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-left"  style="color:black">	
                    <li>
                        <a href="<?php echo base_url()?>user" style="color:black">
                            <i class="	fa fa-area-chart"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/anggota_view" style="color:black">
                            <i class="fa fa-users"></i> Culture Team
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/history" style="color:black">
                            <i class="fa fa-book"></i> History
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
            
            
            
        </div>
              <br/>
            <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-12"></div>
            <div class="col-md-10 col-sm-10 col-xs-12">
              <h3 >Track - Corporate Culture </h3>
              <h4 >Welcome</h4>
              <br/>
              </div>
            </div>
          
            
            <?php foreach ($program as $p) { ?>
            <div class="col-md-4 col-sm-4    col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                        <h2 style='font-weight: bold; width: 350px; '><a style="color: #595959; " data-toggle="modal"  data-target="#detailed<?php echo $p->cc_id ?>"><?php echo $p->cc_detail ?> </a> </h2>
                      <br/><br/>
                  </div>
                  <div class="x_content" >
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Average Progress</h4>
                           <?php
                              $username = $this->session->userdata('username');
                              $queries=mysqli_query($con,"SELECT AVG(input_realisasi_) as rata2 FROM cc_program_eval JOIN cc_program_input on cc_program_eval.input_user_c=cc_program_input.input_user  and cc_program_input.input_detail=cc_program_eval.input_detail_c where input_user='".$username."' and input_detail='".$p->cc_detail."'");
                          while($row = mysqli_fetch_array($queries)){ ?>
                           <?php if ($row['rata2']==null&&empty($row['rata2'])) { ?>
                            <h1 style="color:black; font-size:70px"><b>0%</b></h1> <?php } else if (0< $row['rata2'] && $row['rata2']<= 30) { ?>
                            <h1 style="color:#ff3333; font-size:70px"><b><?php echo $row['rata2'] ?>%</b></h1> <?php } else if (30< $row['rata2'] && $row['rata2']<= 60) { ?>
                            <h1 style="color:yellow; font-size:70px"><b><?php echo $row['rata2'] ?>%</b></h1> <?php } else if (60< $row['rata2'] && $row['rata2']<= 80) { ?>
                            <h1 style="color:#6699ff; font-size:70px"><b><?php echo $row['rata2'] ?>%</b></h1> <?php } else { ?>
                            <h1 style="color:#00cc00; font-size:70px"><b><?php echo $row['rata2'] ?>%</b></h1>
                          <?php } ?>
                          <br/>
                        <p href="#" class="card-link"></p>   
                        <p href="#" class="card-link"><b>Tujuan : </b></p>
                        <p href="#" class="card-link"><?php echo substr($p->cc_tujuan,0,80) ?></p>
                        <p href="#" class="card-link"><b>End Program :</b> <?php echo $p->end_month ?></p>
                        <?php if ($p->_input_id && $row['rata2'] < 100) { ?>
                          <div>  <a href="<?php echo base_url()?>user/evaluasi_data/<?php echo $p->cc_id ?>"><button class="btn btn-success" ><i class="fa fa-tachometer"></i> Progress</button> </a></div> 
                          <?php } else if ($row['rata2'] >= 100) { ?>
                          <div ><a href="<?php echo base_url()?>user/evaluasi_data/<?php echo $p->cc_id ?>"><button class="btn btn-danger"><i class="fa fa-cogs"></i> Finished</button></a></div>
                          <?php } else { ?>
                          <div ><button class="btn btn-primary" data-toggle="modal"  data-target="#isi<?php echo $p->cc_id?>"><i class="fa fa-cogs"></i> Not Started</button></div>
                          <?php } } ?>
                       
                      </div>
                    </div>
                  </div>             
            </div> 

               <br/><br/>
            </div>
            
            <div class="modal fade" id="isi<?php echo $p->cc_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Isi Program</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <?php echo form_open_multipart('user/isi_data/') ?>
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                      <input type="text" class="form-control" autocomplete="off" disabled="true" value="<?php echo $p->cc_detail?>">
                                                                      <input type="hidden" class="form-control" name="program" autocomplete="off" value="<?php echo $p->cc_detail?>">      
                                                                      <input type="hidden" class="form-control" name="program_id" autocomplete="off" value="<?php echo $p->cc_id?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Deskripsi Program</h5>
                                                                      <textarea id="desc" name="deskripsi" style="height: 200px" class="resizable_textarea form-control input" disabled="true" value="<?php echo $p->cc_desc?>"><?php echo $p->cc_desc?></textarea>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Tujuan Program</h5>
                                                                      <input type="text" class="form-control" autocomplete="off" disabled="true" value="<?php echo $p->cc_tujuan ?>">
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                  <div class="row">
                                                                   <div class="col-md-6">
                                                                      <div class="form-group" id="data_1">
                                                                          <label>Target Satuan</label>
                                                                          <select id="heard" class="form-control col-md-7 col-xs-12" name="satuan" required>
                                                                          <option disabled selected hidden>Choose..</option>
                                                                          <option disabled ></option>
                                                                          <option value="Uang (Rp)">Uang (Rp)</option>
                                                                          <option value="Persentase (%)">Persentase (%)</option>
                                                                          <option value="Waktu (Hari)">Waktu (Hari)</option>
                                                                          <option value="Jumlah (kali)">Jumlah (kali)</option>
                                                                        </select>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                      <div class="form-group" id="data_1">
                                                                          <label>Target</label>
                                                                          <input type="number" name="target" id="first-name" min="1" required class="form-control col-md-7 col-xs-12" value="">
                                                                      </div>
                                                                  </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <?php echo form_close()?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
            
            <div class="modal fade" id="detailed<?php echo $p->cc_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Detail Program</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                                <!-- Isi Modal -->
                                                                <div class="box-body">
                                                                <div class="row">
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Nama Program</h5>
                                                                      <textarea id="desc" name="deskripsi" style="height: 100px" class="resizable_textarea form-control input" disabled="true"><?php echo $p->cc_detail?></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Deskripsi Program</h5>
                                                                      <textarea id="desc" name="deskripsi" style="height: 250px" class="resizable_textarea form-control input" disabled="true" value="<?php echo $p->cc_desc?>"><?php echo $p->cc_desc?></textarea>
                                                                    </div>
                                                                  </div>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group">
                                                                      <h5>Tujuan Program</h5>
                                                                      <input type="text" class="form-control" autocomplete="off" disabled="true" value="<?php echo $p->cc_tujuan ?>">
                                                                      <textarea id="desc" name="deskripsi" style="height: 150px" class="resizable_textarea form-control input" disabled="true" ><?php echo $p->cc_tujuan ?></textarea>
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    </div>
                              
                        <?php } ?>
    
            
            
           
        </div>
        </div>
   
    
            
            <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>

                <h4 class="modal-title"><?php echo $unit[0]->kode_unit; ?> - <?php echo $unit[0]->nama_unit; ?></h4>
                <small class="font-bold"><?php echo $unit[0]->kode_dir; ?></small>
                </div>                                              
              <div class="modal-body">
                    <!-- Isi Modal -->
                    <div class="box-body">
                    <form id="demo-form2" action="<?php echo base_url()?>user/editprofilepwd/" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                  <input type="text" id="first-name" name="user" readonly class="form-control col-md-7 col-xs-12" value="<?php echo $this->session->userdata('username');?>" style="display:none">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="first-name"  required name="passworda" class="form-control col-md-7 col-xs-12" placeholder="Type New Password">
                    </div>
                  </div>
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="first-name" required name="passwordb" class="form-control col-md-7 col-xs-12" placeholder="Confirm New Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-success" value="simpan">Submit Password</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                  </div>
                </form>
              </div>
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

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>
    
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
    
</body>
</html>
