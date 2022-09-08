<?php
 session_start();
   if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
 }
?>
<!DOCTYPE html>
<html lang="en" ng-app = "myapp">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - Drivers</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css"/>

        <script src="../js/angular.js"></script>
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
                            <li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                   
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">                   
                    <li>Home</li>
                    <li class="active">Drivers</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> Drivers management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" ng-controller = "cntrl">
                
                    <div class="row">
                        <div class="col-md-8">

                            <div class="panel panel-default">
							 <div class="panel-heading">
                             <div class="panel-title-box">
                            <?php 
                             require_once("../dBConfig/dBConnect.php");
                             $sel = $connect->query("select * from tms_drivers");
                              $num = mysqli_num_rows($sel);
                             ?>
                               <h3 class="panel-title"><i class="fa fa-list"></i>&nbsp;List of registered drivers(<?php echo $num;?>)</h3>
                              </div>                                    
                              <ul class="panel-controls" style="margin-top: 2px;">
							   <span style="float:right"><i class="fa fa-plus-circle"></i>&nbsp;<a href="add_driver.php"><b>Create new driver</b></a></span>
                                      
                               </ul>                                    
                              </div>
                                <div class="panel-body">
								<?php
								if($num < 1){
								?>
								<div class="alert alert-warning"><center>No driver created...!</center></div>
								<?php
								}else{
								?>
                                <div class="row">
                                  <div class="form-group">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" ng-model="search" class="form-control" placeholder="Search here"/>
                                                </div>                 
                                            </div>
                                        </div>
                                 </div><br>
                                    <table class = "table table-striped">
										 <tr>
											 <th>Driver Name</th>
											 <th>License No.</th>
											 <th>Contact</th>
											 </tr>
											 <tr ng-repeat = "drivers in data | filter:search">
												 <td>{{ drivers.name }}</td>
												 <td>{{ drivers.licence_class }}</td>
												 <td>{{ drivers.contact }}</td>
												 </tr>
											 	 
										</table>
										<?php
								          }
										?>
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

         <script>
        var app = angular.module('myapp',[]);
        app.controller('cntrl',function($scope,$http){  
               //function data display
        $scope.display_data = function(){
            $http.get("display_drivers.php")
                .success(function(data){
                    $scope.data = data;
                    //$scope.data.length = data;
                    $scope.user = $scope.data[0];
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                   
                });
            }
            $scope.display_data();

        });
        </script>
    <!-- END SCRIPTS -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>






