<?php
 session_start();
   if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
   require_once("../dBConfig/dBConnect.php");
    $id = $_GET['id'];
    $_SESSION['item_name'] = $id;
}
?>
<!DOCTYPE html>
<html lang="en" ng-app = "myapp">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - Item History</title>            
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
                    <li>Manage inventory</li>
                    <li class="active">Item history</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-fa fa-archive"></span> Inventory management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" ng-controller = "cntrl">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
							<div class="panel-heading">
                             <div class="panel-title-box">
                             <?php 
                             $all = $connect->query("select * from tms_stock_take,tms_items where item = item_name and item = '$id'");
                              $r = mysqli_fetch_array($all);
                             ?>
                               <h3 class="panel-title"><i class="fa fa-list"></i>&nbsp;Item history (<?php echo $r['item'];?>-<?php echo $r['qnty'];
                               ?>)</h3>
                              </div>                                    
                              <ul class="panel-controls" style="margin-top: 2px;">
                              <span style="float:right"><i class="fa fa-eye"></i>&nbsp;<a href="items.php"><b>View item (s)</b></a>&nbsp;|&nbsp;<i class="fa fa-file"></i>&nbsp;<a href="mpdf60/reports/item_report.php"><b>EXPORT PDF REPORT</b></a></span>

                                 </li>      
                               </ul>                                    
                              </div>
                              
                                <div class="panel-body">
                                 <?php
                                 $s = $connect->query("select * from tms_stock_take,tms_items where item = item_name and item = '$id'");
                                  $num = mysqli_num_rows($s);
                                  if($num < 1){

                                    echo "<div class='alert alert-warning'><center>No data for this item....!</center></div>";
                                  
                                  }else{
                                 ?>
                                    <table class = "table table-striped">
                                         <tr>
                                             <th>S#</th>
                                             <th>Date</th>
                                             <th>Qnty</th>
                                             <th>Issued to</th>
                                             <th>Job Card #</th>
                                             <th>Authorized by</th>
                                             </tr>
                                             <?php
                                             $a = 1;
                                             while($rw=mysqli_fetch_array($s)){
                                             ?>
                                             <tr>
                                                 <td><?php echo $a;?></td>
                                                 <td><?php echo $rw['dat'];?></td>
                                                 <td><?php echo $rw['qnt'];?></td>
                                                 <td><?php echo $rw['truck'];?></td>
                                                 <td><?php echo $rw['jobcad'];?></td>
                                                 <td><?php echo $rw['auth_by'];?></td>
                                            </tr>
                                             <?php
                                             $a++;
                                           }
                                             ?>    
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
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>






