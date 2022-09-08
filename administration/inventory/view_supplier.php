<?php
  if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once '../dBConfig/dBConnect.php';
   require_once 'add_stock.php';

     $id = $_GET['id'];
     $_SESSION['sup'] = $id;
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>SMS | <?php echo $id;?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
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
                <?php require_once '../incs/sidelink1.php';?>
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
						    <li><a href="user_profile.php"><span class="fa fa-user"></span> My profile</a></li>
                            <li><a href="../lock_screen.php"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Stock Management</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <!-- PAGE CONTENT TABBED -->
                <div class="page-tabs">
                    <a href="#fourth-tab" class = "active">SUPPLIERS HISTORY</a>
                </div>
                <div class="page-content-wrap page-tabs-item active" id="fourth-tab">
                
                <?php
				$sup = $connect->query("SELECT * FROM sms_supplied WHERE supplier = '$id' ORDER BY reg_date ASC");
				$num = mysqli_num_rows($sup);
				if($num == 0){
					
					echo "<p style = 'color:red;padding-left:50px;font-weight:bold'>No any history added yet</p>";
					
				}
				else{
				?>
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><i class="fa fa-user"></i>&nbsp;SUPPLIERS HISTORY (<?php echo $id;?>)</h3><hr>
                                    <table class = "table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Invoiced Date</th>
                                            <th>Registered Date</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Invoice</th>
                                            <th>Receiver</th>
                                            <tr>
                                            </thead>
                                        <tbody>
										 <?php
										  while($rws = mysqli_fetch_array($sup)){
										 ?>
                                          <tr>
                                            <td><?php echo $rws['invoice_date'];?></td>
                                            <td><?php echo $rws['reg_date'];?></td>
                                            <td><?php echo $rws['item'];?></td>
                                            <td><?php echo $rws['unit'];?></td>
                                            <td><a href = "view_invoice_item.php?id=<?php echo $rws['invoice'];?>"><?php echo $rws['invoice'];?></a></td>
                                            <td><?php echo $rws['adder'];?></td>
                                           </tr>
										  <?php
										  }
										  ?>									  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php
				    }
					 ?>
                
                </div> 			

                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- END PAGE CONTENT TABBED -->

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
                            <a href="../logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->		
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

       <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="../js/plugins/datatables/jquery.dataTables.min.js"></script>
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

    </body>

</html>






