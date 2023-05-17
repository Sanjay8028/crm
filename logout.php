<?php
session_start();
session_destroy();
ob_start();
?>
<center><img src="images/processing.gif" style="margin-top:200px;"/></center>
<meta HTTP-EQUIV="REFRESH" content="3; url=./index.php">