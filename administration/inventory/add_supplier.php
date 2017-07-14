<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once('../dBConfig/dBConnect.php');
  if(isset($_POST['submit'])){
	  $q = mysql_query("select * from tms_users where id = '".$_SESSION['id']."'");
	  $fetch_data = mysql_fetch_array($q);
	  $create_auth = $fetch_data['crea_auth'];
	  $name = strtoupper(mysql_real_escape_string($_POST['name']));
      $cont = mysql_real_escape_string($_POST['cont']);
	  $email = mysql_real_escape_string($_POST['email']);
	  $loc = ucfirst(mysql_real_escape_string($_POST['loc']));

      if($name == ''){
        $er = "<div class = 'alert alert-danger flush'>Fill the empty fields</div>";
      }
      if($create_auth == 0){
			 $er = "<div class = 'alert alert-danger flush'>Sorry! You don't have previllege to add supplier informations,please see system administration</div>";
	  }
      else{
        $check = mysql_query("select * from tms_supplier where name = '$name' and contact = '$cont' and email = '$email'");
         if(mysql_num_rows($check) > 0){
           $er = "<div class = 'alert alert-danger flush'>Sorry...customer your trying to register exist. </div>";
        }else{
	  $in = "insert into tms_supplier values('','$name','$cont','$email','$loc')";
	   $insert = mysql_query($in);
			   if($insert){
				   $er = "<div class = 'alert alert-success flush'>Successfully Added....!</div>";
			   }else{
				   $er = "<div class = 'alert alert-danger flush'>Ooooops! Something went wrong</div>";
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
                    <li>Suppliers</li>
                    <li class="active">Add new supplier</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-user"></span> Supplier  management</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-plus-circle"></i>&nbsp;Add new supplier</h3>
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
                                    <label>Supplier Name&nbsp;<span style="color: red">*</span></label>
                                            <div class="col-md-12">
                                                <input type="text" name="name" id = "name" class="form-control" placeholder="" required/>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Contact&nbsp;<span style="color: red">*</span></label>
                                            <div class="col-md-12">
                                                <input type="number" name="cont" id = "name" class="form-control" placeholder="" required/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                    </table>

                                    <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                   <div class="form-group">
                                    <label>Email</label>
                                            <div class="col-md-12">
                                                <input type="email" name="email" id = "name" class="form-control" placeholder="" />
                                            </div>
                                        </div>
                                    </td>
                                    <td width="350px">
                                  <div class="form-group">
                                    <label>Location&nbsp;<span style="color: red">*</span></label>
                                            <div class="col-md-12">
                                                <input type="text" name="loc" id = "name" class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr> 
                                   
                                    </table>

                                    <hr>

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
        <script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
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

     <script>
            $(function(){
                //Spinner
                $(".spinner_default").spinner()
                $(".spinner_decimal").spinner({step: 0.01, numberFormat: "n"});                
                //End spinner
                
                //Datepicker
                $('#dp-2').datepicker();
                $('#dp-3').datepicker({startView: 2});
                $('#dp-4').datepicker({startView: 1});                
                //End Datepicker
            });
        </script>        
    <!-- END SCRIPTS -->                   

    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
        <!-- GOOGLE -->
        <script type="text/javascript">
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-36783416-1', 'aqvatarius.com');
          ga('send', 'pageview');
        </script>        
        <!-- END GOOGLE -->
        
        <!-- YANDEX -->
        <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({id:25836617,
                            webvisor:true,
                            accurateTrackBounce:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
        </script>
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>






