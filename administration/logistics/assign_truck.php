<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../index.php'); 
  exit;
 }else{
  require_once('../dBConfig/dBConnect.php');
  if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $q = mysql_query("select * from tms_users where id = '".$_SESSION['id']."'");
	  $fetch_data = mysql_fetch_array($q);
	  $create_auth = $fetch_data['create_auth'];
	  $truck = mysql_real_escape_string($_POST['truck']);
      $trailer = mysql_real_escape_string($_POST['trailer']);
      $driver = mysql_real_escape_string($_POST['driver']);
	  $descrip = mysql_real_escape_string($_POST['descrip']);
      $date = date('Y-m-d');
      $mon = date('m');
      $year = date('Y');

	  if($truck == '' || $driver == '' || $trailer == ''){
		  $er = "<div class = 'alert alert-danger flush'>Sorry Fill the empty fields</div>";
	  }
	  else if($create_auth == 0){
		 $er = "<div class = 'alert alert-danger flush'>Sorry! You don't have previllege to assign trip to truck,please see system administration</div>";
	  }else{
                 $up = mysql_query("update tms_loads set status=1,assigned_truck='$truck',assigned_driver='$driver',trailer = '$trailer' where id = '$id'");
                  if($up){
                    $sel = mysql_query("select * from tms_loads where id = '$id'");
                     $row = mysql_fetch_array($sel);
                      $pr = $row['price'];
                    $in = mysql_query("insert into tms_income values('','$date','$descrip','$pr','$mon','$year','$truck','$trailer')");
                    if($in){
                       $er = "<div class = 'alert alert-success flush'>Successfully Assigned</div>"; 
                    }else{
                   $er = "<div class = 'alert alert-danger flush'>Ooooops! Something Went Wrong</div>";
                    
                  } 
		   }
		   
	  }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - Assign load</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                 <?php require_once '../incs/links.php';?>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">                   
                    <li>Home</li>
                    <li>Trips</li>
                    <li class="active">Assign trip</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-truck"></span> Trips management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-8">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-plus-circle"></i>&nbsp;Assign trip to truck</h3>
                                    <span style = "float:right;padding-left:15px"><a href = "add_truck.php"><b><i class = "fa fa-plus-circle"></i> Create new truck/trailer</b></a></span>
                                    <span style = "float:right"><a href = "add_driver.php"><b><i class = "fa fa-plus-circle"></i> Create new driver</b></a></span>
                                </div>
                                <div class="panel-body">
                                  
                 <form action = "" method = "POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                     <?php if(isset($er)){ echo $er;}?>
                                     <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Truck Reg No</label>
                                            <div class="form-group">
                                            <div class="col-md-9">                                                                                
                                                <select class="form-control select" data-live-search="true" name="truck">

                                                    <option value = "">Select truck</option>
                                                    <?php
                                                 $sel = mysql_query("select * from tms_trucks");
                                                  while($rw=mysql_fetch_array($sel)){
                                                ?>
                                                <option value="<?php echo $rw['truck_id'];?>"><?php echo $rw['truck_id'];?></option>
                                                    <?php
                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Trailer Reg No</label>
                                            <div class="form-group">
                                            <div class="col-md-9">                                                                                
                                                <select class="form-control select" data-live-search="true" name="trailer">

                                                    <option value = "">Select trailer</option>
                                                    <?php
                                                 $sel = mysql_query("select * from tms_trucks");
                                                  while($rw=mysql_fetch_array($sel)){
                                                ?>
                                                <option value="<?php echo $rw['truck_id'];?>"><?php echo $rw['truck_id'];?></option>
                                                    <?php
                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Driver</label>
                                            <div class="form-group">
                                            <div class="col-md-9">                                                                            
                                                <select class="form-control select" data-live-search="true" name="driver">
                                                    <option value = "">Select driver</option>
                                                    <?php
                                                 $sel = mysql_query("select * from tms_drivers");
                                                  while($rw=mysql_fetch_array($sel)){
                                                ?>
                                                <option value="<?php echo $rw['name'];?>"><?php echo $rw['name'];?></option>
                                                    <?php
                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                   </table>
                                   <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                    <label>Description</label>
                                   <div class="form-group">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="descrip"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                   
                                    </tr> 
                                   
                                   </table>
                                   <hr>

                                    <div class = "row">
                                        <button class = "btn btn-primary" name="submit" style = "float:right"><i class="fa fa-plus"></i>Submit</button>
										<button class = "btn btn-danger" type="reset" style = "float:right;margin-right:2px">Cancel</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
								   
								   
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- FOOTER --> 
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-body" style = "background:linen">
                                    &copy; 2017 TMS
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END FOOTER --> 
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script> 
        <script type="text/javascript" src="../js/plugins/datatables/jquery.dataTables.min.js"></script>       
        <!-- END PLUGINS -->
		<script>
		 $(function(){
			 $('.flush').delay(3000).fadeOut();
		 });
		</script>

        <!-- THIS PAGE PLUGINS -->
        <script type="text/javascript" src="../js/plugins/icheck/icheck.min.js"></script>
        <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->            

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>






