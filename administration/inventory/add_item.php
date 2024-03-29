<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once('../dBConfig/dBConnect.php');
  if(isset($_POST['submit'])){
	  $q = $connect->query("select * from tms_users where id = '".$_SESSION['id']."'");
	  $fetch_data = mysqli_fetch_array($q);
	  $update_auth = $fetch_data['up_auth'];
	  $name = strtoupper(mysqli_real_escape_string($_POST['name']));
      $qnty = mysqli_real_escape_string($_POST['qnty']);
      $bcode = mysqli_real_escape_string($_POST['bcode']);
      $purchased = mysqli_real_escape_string($_POST['cost']);
      $sup = mysqli_real_escape_string($_POST['sup']);
      $partno = mysqli_real_escape_string($_POST['partno']);
	  $date = mysqli_real_escape_string($_POST['date']);
      //$date = date('Y-m-d');
      $mon = date('m');
      $year = date('Y');

      $checks = $connect->query("select * from tms_items where item_name = '$name' and cost = '$purchased'");
       $num = mysqli_num_rows($checks);
       if($num > 0){
        $r = mysqli_fetch_array($checks);
        $qn = $r['qnty']; 
        $q = $r['o_qnty'];
         $new = $qn + $qnty;
         $new1 = $q + $qnty;
         $up = $connect->query("update tms_items set qnty='$new', o_qnty='$new1' where item_name='$name' and cost='$purchased'");

         if($up){

            $inside = $connect->query("insert into tms_item_in_history values('','$name','$bcode','$qnty','$purchased','$sup','$partno','$date')");
            if($inside){
               $er = "<div class = 'alert alert-success flush'>Successfully stock updated</div>"; 
           }else{
            $er = "<div class = 'alert alert-danger flush'>Ooooops! something went wrong</div>";
           }
         }else{
            $er = "<div class = 'alert alert-danger flush'>Ooooops! Something fail in updating</div>";
         }
       }else{

	   $in = "insert into tms_items values('','$name','$bcode','$qnty','$qnty','$purchased','$sup','$partno','$date','".$_SESSION['name']."')";
	   $insert = $connect->query($in);
			   if($insert){
                $inside = $connect->query("insert into tms_item_in_history values('','$name','$bcode','$qnty','$purchased','$sup','$partno','$date')");
                if($inside){
                   $er = "<div class = 'alert alert-success flush'>Successfully Saved.</div>"; 
                }else{
                   $er = "<div class = 'alert alert-danger flush'>Ooooops! Something Went Wrong</div>";
				   
                }
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
        <title>TMS - Add Item</title>            
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
                    <li class="active">Add new item</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-cog"></span> Inventory management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">

                            <div class="panel-heading">
                             <div class="panel-title-box">
                                    <h3 class="panel-title"><i class="fa fa-plus-circle"></i>&nbsp;Create new item</h3>
                              </div>                                    
                              <ul class="panel-controls" style="margin-top: 2px;">
                               <span style="float:right"><i class="fa fa-eye"></i>&nbsp;<a href="items.php"><b>View item(s)</b></a></span>
                                     
                               </ul>                                    
                              </div> 
                                <div class="panel-body">
                                  
                 <form action = "" method = "POST">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                     <?php if(isset($er)){ echo $er;}?>
                                     <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Item Name <span style="color: red">*</span></label>
                                            <div class="col-md-12">
                                                <input type="text" name="name" class="form-control" placeholder="" required />
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Barcode</label>
                                            <div class="col-md-12">
                                                <input type="text" name="bcode" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Part No</label>
                                            <div class="col-md-12">
                                                <input type="text" name="partno" class="form-control" placeholder="" required/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                    </table>
                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Purchased Unit Price <span style="color: red">*</span></label>
                                            <div class="col-md-12">
                                                <input type="number" name="cost" class="form-control" placeholder="" required />
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Qnty <span style="color: red">*</span></label>
                                            <div class="col-md-12">
                                                <input type="number" name="qnty" class="form-control" placeholder="" required/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Supplier Name <span style="color: red">*</span></label>
                                            <div class="col-md-12">                                                                            
                                                <select class="form-control select" data-live-search="true" name="sup">
                                                    <option>Select</option>
                                                    <?php
                                                 $sel = $connect->query("select * from tms_supplier");
                                                  while($rw=mysqli_fetch_array($sel)){
                                                ?>
                                                <option value="<?php echo $rw['name'];?>"><?php echo $rw['name'];?></option>
                                                    <?php
                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                    </table>
									<table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Received Date</label>
                                            <div class="col-md-12">
                                                <input type="text" name="date" class="form-control datepicker" value="<?php echo date('Y-m-d');?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  
                                    </td>
                                    <td width="350px">
                                    
                                    </td>
                                    </tr> 
                                   
                                    </table>
                                  
                                    <hr>

                                    <div class = "row">
                                    <div class="col-md-6">
                                     <p><strong>Fiel with <span style="color: red">*</span> are compulsory</strong></p>   
                                    </div>
                                    <div class="col-md-6">
                                       <button class = "btn btn-primary" name="submit" style = "float:right"><i class="fa fa-file"></i>Save</button>
                                        <button class = "btn btn-danger" type="reset" style = "float:right;margin-right:2px">Cancel</button> 
                                    </div>
                                        
                                    </div>

                                </div>
                            </div>
                            </div>
                        </div>
                    </form>  


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
                    </div>
                    </div>
                    </div>

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
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-select.js"></script> 
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>		
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






