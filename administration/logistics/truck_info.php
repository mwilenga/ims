<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  $id = $_GET['id'];
  require_once('../dBConfig/dBConnect.php');
   $all = mysql_query("select * from tms_trucks where truck_id = '$id'");
   $rw = mysql_fetch_array($all);
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - <?php echo $id;?></title>            
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
                    <li>Trucks</li>
                    <li class="active"><?php echo $id;?> details</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-truck"></span> Trucks management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-8">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Truck details (<?php echo $rw['truck_id'];?>)</h3>
                                    <strong><a href="trucks.php"><span style="float:right;padding-right:20px"><i class="fa fa-arrow-left"></i> Go back</span></a></strong>
                                </div>
                                <div class="panel-body">
									<h3><span class = "fa fa-info-circle"></span> Truck details</h3>
                                    <table class = "table table-striped">
											 <tr>
												 <td width="350px"><b>Truck ID</b></td>
												 <td width="350px"><?php echo $rw['truck_id'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Make</b></td>
												 <td width="350px"><?php echo $rw['truck_name'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Model</b></td>
												 <td width="350px"><?php echo $rw['truck_model'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Engine No.</b></td>
												 <td width="350px"><?php echo $rw['truck_color'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Body type</b></td>
												 <td width="350px"><?php echo $rw['body_type'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Fuel</b></td>
												 <td width="350px"><?php echo $rw['fuels'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Chasses No</b></td>
												 <td width="350px"><?php echo $rw['chasis_no'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Purchases date</b></td>
												 <td width="350px"></td>
											 </tr>	 	 
										</table>
										
										<h3><span class = "fa fa-info-circle"></span> Vehicle insuarance</h3>
                                         <table class = "table table-striped">
											 <tr>
												 <td width="350px"><b>Insuarance agent</b></td>
												 <td width="350px"><?php echo $rw['supplier'];?></td>
											 </tr>
											  <tr>
												 <td width="350px"><b>Contact</b></td>
												 <td width="350px"><?php echo $rw['supplier_contact'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Policy No</b></td>
												 <td width="350px"><?php echo $rw['policy_no'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Insurance type</b></td>
												 <td width="350px"><?php echo $rw['insurence_type'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Commence date</b></td>
												 <td width="350px"><?php echo $rw['ins_date'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Expire date</b></td>
												 <td width="350px"><?php echo $rw['ins_exp'];?></td>
											 </tr>
											 <tr>
												 <?php
												 if($rw['ins_exp'] == date('Y-m-d')){
													 $status = "<span style = 'color:red'>Expired</span> - <a href = 'update_vehicle_insuarance.php?truck=$id'>Update</a>";
													 }
													 else{
														 $status = "<span style = 'color:green'>Not expired</span>";
														 }
												 ?>
												 <td width="350px"><b>Expire status</b></td>
												 <td width="350px"><?php echo $status;?></td>
											 </tr>	 	 
										</table>
										
										<h3><span class = "fa fa-info-circle"></span> Road licence</h3>
                                         <table class = "table table-striped">
											 <tr>
												 <td width="350px"><b>Price</b></td>
												 <td width="350px"><?php echo number_format($rw['price'],2);?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Commence date</b></td>
												 <td width="350px"><?php echo $rw['commence_date'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Expire date</b></td>
												 <td width="350px"><?php echo $rw['expire_date'];?></td>
											 </tr>
											 <tr>
												 <?php
												 if($rw['expire_date'] == date('Y-m-d')){
													 $status = "<span style = 'color:red'>Expired</span> - <a href = 'update_vehicle_insuarance.php?truck=$id'>Update</a>";
													 }
													 else{
														 $status = "<span style = 'color:green'>Not expired</span>";
														 }
												 ?>
												 <td width="350px"><b>Expire status</b></td>
												 <td width="350px"><?php echo $status;?></td>
											 </tr>	 	 
										</table>
										
										<h3><span class = "fa fa-info-circle"></span> Summatra</h3>
                                         <table class = "table table-striped">
											 <tr>
												 <td width="350px"><b>Price</b></td>
												 <td width="350px"><?php echo number_format($rw['su_price'],2);?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Commence date</b></td>
												 <td width="350px"><?php echo $rw['su_date'];?></td>
											 </tr>
											 <tr>
												 <td width="350px"><b>Expire date</b></td>
												 <td width="350px"><?php echo $rw['su_exp'];?></td>
											 </tr>
											 <tr>
												 <?php
												 if($rw['su_exp'] == 0000-00-00){
													 $status = "<span style = 'color:red'>Expired</span> - <a href = 'update_vehicle_insuarance.php?truck=$id'>Update</a>";
													 }
													 else{
														 $status = "<span style = 'color:green'>Not expired</span>";
														 }
												 ?>
												 <td width="350px"><b>Expire status</b></td>
												 <td width="350px"><?php echo $status;?></td>
											 </tr>	 	 
										</table>
										
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
        <!-- END PLUGINS -->

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






