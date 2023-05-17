<?php
error_reporting(0);
define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'crmworldsindia1');
// define('DB_PASSWORD', 'crmworldsindia1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'test91');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
session_start();
ini_set('session.gc_maxlifetime', 60 * 60 * 6);
?>