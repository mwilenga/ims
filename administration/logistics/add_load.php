<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once('../dBConfig/dBConnect.php');
  if(isset($_POST['submit'])){
	  $from = strtoupper(mysql_real_escape_string($_POST['from']));
	  $to = strtoupper(mysql_real_escape_string($_POST['to']));
      $name = strtoupper(mysql_real_escape_string($_POST['name']));
      $price = mysql_real_escape_string($_POST['price']);
	  $date = mysql_real_escape_string($_POST['date']);
	  $note = ucfirst(mysql_real_escape_string($_POST['note']));
      $q = mysql_query("select * from tms_users where id = '".$_SESSION['id']."'");
	  $fetch_data = mysql_fetch_array($q);
	  $create_auth = $fetch_data['create_auth'];
	  if($from == '' || $to == '' || $price == '' || $date == '' || $name == ''){
		  $er = "<div class = 'alert alert-danger flush'>Sorry fill the empty field(s)</div>";
	  }
	 // else if($create_auth == 0){
		// $er = "<div class = 'alert alert-danger flush'>Sorry! You don't have previllege to create new trip,please see system administration</div>";
	 // }
	 // else{
	       $sel = mysql_query("select * from tms_loads where load_from = '$from' and load_to = '$to' and customer = '$name' and date = '$date'");
		   $num = mysql_num_rows($sel);
	        if($num > 0){
			 $er = "<div class = 'alert alert-danger flush'>Sorry! this trip has already registered</div>";
			}
			else{
			   $in = "insert into tms_loads values('','$from','$to','$name','$note','$price','$date','','','','','')";
			   $insert = mysql_query($in);
			   if($insert){
				   $er = "<div class = 'alert alert-success flush'>Successfully registered</div>";
			   }else{
				   $er = "<div class = 'alert alert-danger flush'>Ooooops! Something went wrong</div>";
		   }
		   
	  }
	 } 
  }
?>
<!DOCTYPE html>
<html lang="en" ng-app = "">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - Create trips/load</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE --> 
        <script type="text/javascript" src="../js/angular.js"></script>        
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
                    <li class="active">Create trip/load</li>
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
                             <div class="panel-title-box">
                                    <h3 class="panel-title"><i class="fa fa-plus-circle"></i>&nbsp;Create new trip/load</h3>

                              </div>                                    
                              <ul class="panel-controls" style="margin-top: 2px;">
									 <strong><a href="loads.php"><span style="float:right;padding-right:20px"><i class="fa fa-eye"></i> View created trips</span></a></strong>
                                      
                               </ul>                                    
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
                                    <label>From</label>
                                            <div class="col-md-12">
                                                <input type="text" name="from" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>To</label>
                                            <div class="col-md-12">
                                                <input type="text" name="to" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                    <div class="form-group">
                                      <label>Customer Name</label>
                                            <div class="form-group">
                                            <div class="col-md-9">                                                                                
                                                <select class="form-control select" data-live-search="true" name="name">

                                                <option value = "">Select customer</option>
                                                    <?php
                                                 $sel = mysql_query("select * from tms_customer");
                                                  while($rw=mysql_fetch_array($sel)){
                                                ?>
                                                <option value="<?php echo $rw['customer_name'];?>"><?php echo $rw['customer_name'];?></option>
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
                                   <div class="form-group">
                                    <label>Cargo type</label>
                                            <div class="col-md-12">
                                                <textarea name="note" class="form-control"/></textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Price (TZS {{price | number}})</label>
                                            <div class="col-md-12">
                                                <input type="number" name="price" class="form-control" ng-model = "price" />
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Departure Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="date" class="form-control datepicker" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                    </table><hr>

                                    <div class = "row">
                                        <button class = "btn btn-primary" name="submit" style = "float:right"><i class="fa fa-plus"></i>Save</button>
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
			 $('.flush').delay(5000).fadeOut();
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






