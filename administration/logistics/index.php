<?php
 session_start();
  if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }
 //else if($_SESSION['role'] != 'Admin' || $_SESSION['role'] != 'Logistics'){
	// header('location:../index.php'); 
	// }
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
                    <li class="active">Home</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-home"></span> Home</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    
                                </div>
                                <div class="panel-body">
                                     <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SLIDER -->
                             <a href="trucks.php">
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-truck"></span>
                                </div> 
                                <?php 
                                require_once('../dBConfig/dBConnect.php');
                                $trucks = $connect->query("select * from tms_trucks");
                                 $num = mysqli_num_rows($trucks);
                                ?>                            
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $num;?></div>
                                    <div class="widget-title">Registered Trucks</div>
                                    <div class="widget-subtitle"></div>
                                </div>      
                                
                            </div> 
                            </a>     
                            <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <a href="drivers.php">
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div> 
                                <?php 
                                require_once('../dBConfig/dBConnect.php');
                                $drivers = $connect->query("select * from tms_drivers");
                                 $nam = mysqli_num_rows($drivers);
                                ?>                              
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $nam;?></div>
                                    <div class="widget-title">Drivers</div>
                                    <div class="widget-subtitle"></div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            </a>
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <a href="loads.php">
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-fa fa-sitemap"></span>
                                </div>
                                <?php 
                                require_once('../dBConfig/dBConnect.php');
                                $loads = $connect->query("select * from tms_loads where status=0");
                                 $nm = mysqli_num_rows($loads);
                                ?>   
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo $nm;?></div>
                                    <div class="widget-title">Trips on progress</div>
                                    <div class="widget-subtitle"></div>
                                </div>
                                                         
                            </div> 
                            </a>                           
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
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
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="../js/plugins/icheck/icheck.min.js"></script>        
        <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="../js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="../js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="../js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="../js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="../js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script type='text/javascript' src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src="../js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="../js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="../js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="../js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->          

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>






