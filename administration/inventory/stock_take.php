<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once('../dBConfig/dBConnect.php');
  if(isset($_POST['submit'])){
	  $name = strtoupper(mysqli_real_escape_string($_POST['name']));
	  $qnty = mysqli_real_escape_string($_POST['qnty']);
      $truck = mysqli_real_escape_string($_POST['truck']);
      $descript = ucfirst(mysqli_real_escape_string($_POST['descript']));
      $date = mysqli_real_escape_string($_POST['date']);
      $jobcard = mysqli_real_escape_string($_POST['jobcard']);
	  $auth = mysqli_real_escape_string($_POST['authby']);
      //$date = date('Y-m-d');
      $mon = date('m');
      $year = date('Y');

	  $in = "insert into tms_stock_take values('','$name','$qnty','$truck','$date','$mon','$year','$jobcard','$auth')";
	   $insert = $connect->query($in);
			   if($insert){
                $check = $connect->query("select * from tms_items where item_name = '$name'");
                 $ch = mysqli_fetch_array($check);
                 $tr = $ch['cost'];
                 $ded = $ch['qnty'];
                 $total = $tr * $qnty;
                 $inexpenses = $connect->query("insert into tms_expenses values('','$truck','$total','$descript','$date','$mon','$year')");
                 if($inexpenses){
                   $update = $ded - $qnty;
                   $n = $connect->query("update tms_items set qnty = '$update' where item_name = '$name'"); 
                    if($n){
                        $er = "<div class = 'alert alert-success flush'>Successfully Stock Taken</div>";
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
        <title>TMS - Home</title>            
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
                 <?php require_once '../incs/inventory_links.php';?>
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
                    <li>Manage Stock</li>
                    <li class="active">Add New Stock Taking</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-cog"></span> Stock Take management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">

                            <div class="panel-heading">
                             <div class="panel-title-box">
                                    <h3 class="panel-title"><i class="fa fa-plus-circle"></i>&nbsp;Stock taking</h3>
                              </div>                                    
                              <ul class="panel-controls" style="margin-top: 2px;">
                               <span style="float:right"><i class="fa fa-eye"></i>&nbsp;<a href="items_taken.php"><b>Item(s) issued</b></a></span>
                                     
                               </ul>                                    
                              </div> 
                   <div class="panel-body">
                                  
                 <form action = "" method = "POST">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                     <?php if(isset($er)){ echo $er;}?>
                                     <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Item Name</label>
                                    <select class="form-control select" data-live-search="true" name="name" required>
                                                    <option>Select</option>
                                                    <?php
                                                 $sel = $connect->query("select * from tms_items");
                                                  while($rw=mysqli_fetch_array($sel)){
                                                ?>
                                                <option value="<?php echo $rw['item_name'];?>"><?php echo $rw['item_name'];?></option>
                                                    <?php
                                                }
                                                    ?>
                                                </select>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Qnty</label>
                                            <div class="col-md-12">
                                                <input type="number" name="qnty" class="form-control" placeholder="" required/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                    <div class="form-group">
                                    <label>Truck ID</label>
                                           <select class="form-control select" data-live-search="true" name="truck" required>
                                                    <option>Select</option>
                                                    <?php
                                                 $sel = $connect->query("select * from tms_trucks");
                                                  while($rw=mysqli_fetch_array($sel)){
                                                ?>
                                                <option value="<?php echo $rw['truck_id'];?>"><?php echo $rw['truck_id'];?></option>
                                                    <?php
                                                }
                                                    ?>
                                                </select>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Description</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="descript"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                    <div class="form-group">
                                    <label>Issue Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="date" class="form-control datepicker" value="<?php echo date('Y-m-d');?>" required>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Job Card #</label>
                                            <div class="col-md-12">
                                                <input type="text" name="jobcard" class="form-control" placeholder="" required/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                    <div class="form-group">
                                    <label>Authirised by</label>
                                            <div class="col-md-12">
                                                <input type="text" name="authby" class="form-control" placeholder="" required/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   
                                    </td>
                                    </tr> 
                                   
                                    </table>
                                    <hr>

                                    <div class = "row">
                                        <button class = "btn btn-primary" name="submit" style = "float:right"><i class="fa fa-file"></i>Save</button>
										<button class = "btn btn-danger" type="reset" style = "float:right;margin-right:2px">Cancel</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
								   
								   
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
                    </div>
                    </div>
                    </div>
                    
                    
                
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
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
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
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-select.js"></script>    
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>  
        <!-- END PLUGINS -->
		<script>
		 $(function(){
			 $('.flush').delay(3000).fadeOut();
		 });
		</script>

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>






