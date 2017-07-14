<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../index.php'); 
  exit;
 }
  require_once('../dBConfig/dBConnect.php');
  if(isset($_POST['submit'])){
	  $id = strtoupper(mysql_real_escape_string($_POST['id']));
	  $name = strtoupper(mysql_real_escape_string($_POST['make']));
	  $model = strtoupper(mysql_real_escape_string($_POST['model']));
	  $color = strtoupper(mysql_real_escape_string($_POST['engine']));
	  $btype = strtoupper(mysql_real_escape_string($_POST['btype']));
	  $fuel = strtoupper(mysql_real_escape_string($_POST['fuels']));
	  $chasis = mysql_real_escape_string($_POST['chasis']);
	  $pdate = mysql_real_escape_string($_POST['pdate']);
	  $sup = strtoupper(mysql_real_escape_string($_POST['sup']));
	  $policyNO = mysql_real_escape_string($_POST['policyNO']);
	  $insu_type = mysql_real_escape_string($_POST['insu_type']);
	  $cont = mysql_real_escape_string($_POST['cont']);
	  $load_price = mysql_real_escape_string($_POST['load_price']);
	  $com_date = mysql_real_escape_string($_POST['com_date']);
	  $exp_date = mysql_real_escape_string($_POST['exp_date']);
	  $ins_date = mysql_real_escape_string($_POST['ins_date']);
	  $ins_exp_date = mysql_real_escape_string($_POST['ins_exp_date']);
	  $su_price = mysql_real_escape_string($_POST['su_price']);
	  $su_date = mysql_real_escape_string($_POST['su_date']);
	  $su_exp_date = mysql_real_escape_string($_POST['su_exp_date']);
      $status = 0;
      
	  if($id == ''){
		  $er = "<div class = 'alert alert-danger flush'>Sorry truck registration must be filled</div>";
	  }else{
		   $truck = mysql_query("select * from tms_trucks where truck_id = '$id'");
		    $num = mysql_num_rows($truck);
		     if($num == 1){
			   $er = "<div class = 'alert alert-danger flush'>A truck you are trying to register already exist!</div>";
		      }else{
			   $in = "insert into tms_trucks values('$id','$name','$model','$color','$btype','$fuel','$chasis','$pdate','$sup','$policyNO','$insu_type','$cont','$load_price','$com_date','$exp_date','$ins_date','$ins_exp_date','$su_price','$su_date','$su_exp_date')";
			   
			   $insert = mysql_query($in);
			   if($insert){
				   $er = "<div class = 'alert alert-success flush'>Successfully Registered</div>";
			   }else{
				   $er = "<div class = 'alert alert-danger flush'>Ooooops! Something Went Wrong</div>";
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
        <title>TMS - Add truck</title>            
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
                    <li class="active">Add new truck</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-truck"></span> Trucks management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-plus-circle"></i>&nbsp;Add new truck</h3>
                                    <a href = "trucks.php"><h3 class="panel-title" style = "float:right"><i class="fa fa-eye"></i>&nbsp;View registered trucks</h3></a>
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
                                    <label>Truck reg No.</label>
                                            <div class="col-md-12">
                                                <input type="text" name="id" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Truck make</label>
                                            <div class="col-md-12">
                                                <input type="text" name="make" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>   
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Truck model</label>
                                            <div class="col-md-12">
                                                <input type="text" name="model" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                    <div class="form-group">
                                    <label>Engine No.</label>
                                            <div class="col-md-12">
                                                <input type="text" name="engine" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Body Type</label>
                                            <div class="col-md-12">
                                                <input type="text" name="btype" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px"> 
                                   <div class="form-group">
                                    <label>Fuels</label>
                                            <div class="col-md-12">
                                                <input type="text" name="fuels" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                  </tr>
                                </table>
                                
                                 <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                         <div class="form-group">
                                             <label>Purchased Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="pdate" class="form-control datepicker" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px"> 
                                    <div class="form-group">
                                    <label>Chassis No</label>
                                            <div class="col-md-12">
                                                <input type="text" name="chasis" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                  </tr>
                                </table>
           
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><i class="fa fa-plus-circle"></i>&nbsp;Insurance Info</h3><hr>
                                     
                                     <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Insuarance agent</label>
                                            <div class="col-md-12">
                                                <input type="text" name="sup" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Policy No</label>
                                            <div class="col-md-12">
                                                <input type="text" name="policyNO" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>   
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Insurance Type</label>
                                            <div class="col-md-12">
                                                <input type="text" name="insu_type" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                    <div class="form-group">
                                    <label>Contacts</label>
                                            <div class="col-md-12">
                                                <input type="number" name="cont" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Insuared date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="ins_date" class="form-control datepicker" value="2017-01-01">
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                    <div class="form-group">
                                    <label>Expire date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="ins_exp_date" class="form-control datepicker" value="2017-01-01">
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                    </table>
                               
           
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                        <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><i class="fa fa-plus-circle"></i>&nbsp;Summatra licence</h3><hr>
                                     
                                   <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Price</label>
                                            <div class="col-md-12">
                                                <input type="text" name="su_price" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Commence Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="su_date" class="form-control datepicker" value="2017-01-01">
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                    <tr>
                                     <td width="350px">
                                   <div class="form-group">
                                    <label>Expire Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="su_exp_date" class="form-control datepicker" value="2015-08-04">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>   
                                    </table>
                               
           
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><i class="fa fa-plus-circle"></i>&nbsp;Road Licence Details</h3><hr>
                                     
                                     <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Price</label>
                                            <div class="col-md-12">
                                                <input type="text" name="load_price" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Commence Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="com_date" class="form-control datepicker" value="2017-01-01">
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                    <tr>
                                     <td width="350px">
                                   <div class="form-group">
                                    <label>Expire Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="exp_date" class="form-control datepicker" value="2015-08-04">
                                            </div>
                                        </div>
                                    </td>
                                    </tr>   
                                    </table><hr>

                                    <div class = "row">
                                        <button class = "btn btn-primary" name="submit" style = "float:right"><i class="fa fa-plus"></i>Add</button>
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
        <!-- END PLUGINS -->
		<script>
		 $(function(){
			 $('.flush').delay(3000).fadeOut();
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
        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>






