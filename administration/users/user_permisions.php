<?php
 session_start();
  if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once('../dBConfig/dBConnect.php');
  $all = $connect->query("select * from tms_users");
}
?>
<!DOCTYPE html>
<html lang="en" ng-app = "myapp">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - Users</title>            
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
                 <?php require_once '../incs/admin_links.php';?>
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
                    <li>Users</li>
                    <li class="active">User previlleges</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> Users management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" ng-controller = "cntrl">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                            
                             <div class="panel-heading">
                             
                               <h3 class="panel-title"><i class="fa fa-key"></i>&nbsp;User previllege</h3>
                             
                             </div>
                             
                             <div class="panel-body">
                                 </table>
                                    <table class = "table table-striped">
                                         <thead>
                                            <th>S#</th>
                                             <th>Full Name</th>
                                             <th>Create</th>
                                             <th>View</th>
                                             <th>Update</th>
                                             <th>Delete</th>
                                             <th>Action</th>
                                             </thead>
                                             <tbody>
                                             <?php
                                             $a = 1;
                                             while ($rw=mysqli_fetch_array($all)) {
                                                $cr = $rw['create_auth'];
                                                if($cr == 1){
                                                    $c = "Yes";
                                                }else{
                                                    $c = "No";
                                                }
                                                $vw = $rw['view_auth'];
                                                if($vw == 1){
                                                    $v = "Yes";
                                                }else{
                                                    $v = "No";
                                                }
                                                $up = $rw['up_auth'];
                                                if($up == 1){
                                                    $upd = "Yes";
                                                }else{
                                                    $upd = "No";
                                                }
                                                $delt = $rw['del_auth'];
                                                if($delt == 1){
                                                    $del = "Yes";
                                                }else{
                                                    $del = "No";
                                                }
                                             ?>
                                             <tr>
                                                 <td><?php echo $a;?></td>
                                                 <td><?php echo $rw['name'];?></td>
                                                 <td><?php echo $c;?></td>
                                                 <td><?php echo $v;?></td>
                                                 <td><?php echo $upd;?></td>
                                                 <td><?php echo $del;?></td>
                                                 <td><i class="fa fa-edit"></i>&nbsp;<a href="change_permissions.php?id=<?php echo $rw['id'];?>">change</a></td>
                                                 </tr>
                                                 <?php
                                                 $a++;
                                             }
                                                 ?>
                                                 </tbody>
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






