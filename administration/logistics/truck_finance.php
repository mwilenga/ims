<?php session_start();?>
<?php
  if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }
 $truckID = $_GET['truckId'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - <?php echo $truckID;?></title>            
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
                    <li class="active">Trucks</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-truck"></span> Trucks management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
					
					<!-- date range --> 
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-body" style = "background:#f3f3f3">
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">Search by choosing date range</label>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" value="<?php echo date('Y-m-d');?>"/>
                                                    <span class="input-group-addon add-on"> To </span>
                                                    <input type="text" class="form-control datepicker" value="<?php echo date('Y-m-d');?>"/>
                                                </div>
                                            </div>
                                            <button class = "btn btn-default"><span class = "fa fa-search"></span> Search</button>
                                        </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <!-- END date range -->
                
                    <div class="row">
                        <div class="col-md-6">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Truck expenses details (T 200 ADC) 2017</h3>
                                </div>
                                <div class="panel-body">
									<h3><span class = "fa fa-info-circle"></span> Expenses details</h3>
                                    <table class = "table table-striped">
											 <tr>
												 <th style = "width:25%">Date</th>
												 <th style = "width:50%">Description</th>
												 <th style = "width:25%">Cost used</th>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Changing tyres</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Changing tyres</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Changing tyres</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Changing tyres</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>	 	 
										</table><hr/>
										<p><strong>Total expenses TZS 100,000,000</strong></p><hr/>
										<p><strong><button class = "btn btn-default"><span class = "fa fa-print"></span> Export report</button></strong></p>
                                </div>
                            </div>

                        </div>
                         <div class="col-md-6">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Truck income generated per trip (T 200 ADC) 2017</h3>
                                </div>
                                <div class="panel-body">
									<h3><span class = "fa fa-info-circle"></span> Income details</h3>
                                    <table class = "table table-striped">
											 <tr>
												 <th style = "width:25%">Date</th>
												 <th style = "width:50%">Description</th>
												 <th style = "width:25%">Price</th>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Loading car spares to singida</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Loading car spares to singida</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Loading car spares to singida</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>
											 <tr>
												 <td style = "width:25%">12/12/2017</td>
												 <td style = "width:50%">Loading car spares to singida</td>
												 <td style = "width:25%">TZS 100,000</td>
											 </tr>	 	 
										</table><hr/>
										<p><strong>Total income TZS 100,000,000</strong></p>
										<p><strong>Revenue TZS 100,000,000 (Total Income - Total Expenses)</strong></p><hr/>
										<p><strong><button class = "btn btn-default"><span class = "fa fa-print"></span> Export report</button></strong></p>
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






