<?php include("inc/config.php"); ?>
<?php
if (isset($_SESSION['useradmin'])) { echo '<script>window.location ="dashboard.php";</script>'; }
if(isset($_POST['submit'])) 
{
$myusername=mysqli_real_escape_string($db,$_POST['username']); 
$mypassword=mysqli_real_escape_string($db,$_POST['password']); 

$sql="SELECT * FROM tbladmin WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1)
{
$_SESSION['useradmin']=$myusername;
$_SESSION['aid'] = $row['id'];

	echo '<script>window.location ="dashboard.php";</script>';
}
else 
{
	$error="Invalid Username or Password";
}
}
?>
<!DOCTYPE html>
<html class=" ">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Admin : Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
<link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->
<!-- CORE CSS FRAMEWORK - START -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- <link href="../assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/> -->
<link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
<!-- CORE CSS FRAMEWORK - END -->
<link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- CORE CSS TEMPLATE - START -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<!-- CORE CSS TEMPLATE - END -->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>

<div class="customised-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 fxt-bg-color">
                <div class="fxt-content">						
                    <div class="fxt-style-line">
                        <h2>Login as Admin</h2>
                    </div>
                    <div class="fxt-form">
                        <form name="loginform" id="loginform" action="" method="POST">
                            <div class="form-group">                            
                                <input type="text" class="form-control" name="username" placeholder="Email Address" required="required">  
                                <i class="fa fa-envelope-o"></i>                         
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="required"> 
                                <i class="fa fa-lock"></i>                           
                            </div>
                            
                            <div class="form-group">                            
                                <div class="fxt-content-between">
                                    <input type="submit" name="submit" class="btn-login" value="Sign In" />
                                    <a href="#" class="switcher-text2">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    </div>						
                </div>
            
            </div>
            
            <div class="col-lg-6 col-12 fxt-none-991 fxt-bg-img" data-bg-image="images/login.png" style="background-image: url(&quot;images/login.png&quot;);"></div>
                
        </div>
    </div>
</div>

<!-- CORE JS FRAMEWORK - START --> 
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
<script src="assets/js/popper.min.js" type="text/javascript"></script> 
<script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
<script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.2.min.js"><\/script>');</script>
<!-- CORE JS FRAMEWORK - END --> 
<script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<!-- CORE TEMPLATE JS - START --> 
<script src="assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
</body>
</html>



