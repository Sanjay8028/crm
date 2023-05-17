<?php include("inc/config.php"); ?>
<?php
$user_check=$_SESSION['useradmin'];
$ses_sql=mysqli_query($db,"select username from tbladmin where username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['username'];

if(!isset($login_session))
{
echo '<script>window.location ="index.php";</script>';
}
?>
