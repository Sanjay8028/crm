<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Admin : CRM</title>
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
<!-- <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/> -->
<link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
<!-- CORE CSS FRAMEWORK - END -->

<!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START --> 


<link href="assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/icheck/skins/minimal/white.css" rel="stylesheet" type="text/css" media="screen"/>

<!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

<!-- CORE CSS TEMPLATE - START -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<!-- CORE CSS TEMPLATE - END -->
<script>
 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
        
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
</script>
</head>
<body class=" ">
<!-- START TOPBAR -->
<div class='page-topbar '>
<div style="width: 210px;
    background-color: #3F51B5;
    display: block;
    min-height: 60px;
    color:#ffffff;
    float: left;">
<p style="text-align: center;
    margin-top: 20px;font-size: 25px;">ADMIN</p>
</div>
<div class='quick-area'>
<div class='float-left'>
<ul class="info-menu left-links list-inline list-unstyled">
<li class="sidebar-toggle-wrap list-inline-item">
<a href="#" data-toggle="sidebar" class="sidebar_toggle">
<i class="fa fa-bars"></i>
</a>
</li>
<li class="message-toggle-wrapper list-inline-item">
<ul class="dropdown-menu messages animated fadeIn">
<li class="list dropdown-item">
<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
</ul>
</li>
</ul>
</li>
</ul>
</div>		
<div class="float-right">
<ul class="info-menu right-links list-inline list-unstyled">
<li class="profile list-inline-item showopacity">
<a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">

<span>Admin <i class="fa fa-angle-down"></i></span>
</a>
<ul class="dropdown-menu profile animated fadeIn" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 60px, 0px); top: 0px; left: 0px; will-change: transform;">

<li class="last dropdown-item">
    <a href="logout.php">
        <i class="fa fa-lock"></i>
        Logout
    </a>
</li>
</ul>
</li>

</ul>			
</div>		
</div>

</div>
<!-- END TOPBAR -->
<div class="page-container row-fluid container-fluid">
<?php //include('inc/side.php'); ?>
</div>