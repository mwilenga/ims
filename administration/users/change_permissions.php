<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once('../dBConfig/dBConnect.php');
  $id = $_GET['id'];
   $dat = mysql_query("select * from tms_users where id = '$id'");
    $data = mysql_fetch_array($dat);


  if(isset($_POST['save'])){
	  $create = ucfirst(mysql_real_escape_string($_POST['create']));
	  $view = mysql_real_escape_string($_POST['view']);
      $update = mysql_real_escape_string($_POST['update']);
      $delete = mysql_real_escape_string($_POST['delete']);

      //590c81789bf56
	  $update = mysql_query("update tms_users set create_auth='$create',up_auth='$update',del_auth='$delete',view_auth='$view' where id='$id'");

      if($update){
        header('location:user_permisions.php');
      }else{
         $er = "<div class = 'alert alert-danger flush'>Ooooops! Something Went Wrong</div>";
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
                    <li class="active">Change user privillege</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> Users  management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-edit"></i>&nbsp;Change user privillege&nbsp;(<?php echo $data['name'];?>)</h3>
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
                                    <label>Create</label>

                                    </div>
                                    </td>
                                    <td width="350px">
                                    <?php
                                    if($data['create_auth'] == 1){
                                    ?>
                                    <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="create" checked="checked"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" name="create"/> No</label>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="create"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" checked="checked" name="create"/> No</label>
                                        </div>
                                        <?php
                                      }
                                    ?>
                                    </td>
                                    </tr> 
                                </table>
                                <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>View</label>

                                    </div>
                                    </td>
                                    <td width="350px">
                                    <?php
                                    if($data['view_auth'] == 1){
                                    ?>
                                    <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="view" checked="checked"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" name="view"/> No</label>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="view"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" checked="checked" name="view"/> No</label>
                                        </div>
                                        <?php
                                      }
                                    ?>
                                    </td>
                                    </tr> 
                                </table>
                                <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Update</label>

                                    </div>
                                    </td>
                                    <td width="350px">
                                    <?php
                                    if($data['up_auth'] == 1){
                                    ?>
                                    <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="update" checked="checked"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" name="update"/> No</label>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="update"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" checked="checked" name="update"/> No</label>
                                        </div>
                                        <?php
                                      }
                                    ?>
                                    </td>
                                    </tr> 
                                </table>
                                <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Delete</label>

                                    </div>
                                    </td>
                                    <td width="350px">
                                    <?php
                                    if($data['del_auth'] == 1){
                                    ?>
                                    <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="delete" checked="checked"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" name="delete"/> No</label>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="1" class="iradio" name="delete"/> Yes</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="radio" value="0" class="iradio" checked="checked" name="delete"/> No</label>
                                        </div>
                                        <?php
                                      }
                                    ?>
                                    </td>
                                    </tr> 
                                </table>
                                

                                    <hr>

                                    <div class = "row">
                                        <button class = "btn btn-primary" name="save" style = "float:right"><i class="fa fa-plus"></i>Save changes</button>
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
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-select.js"></script>     
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






