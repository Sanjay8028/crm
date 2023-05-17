<?php
include('../inc/config.php');
if(isset($_POST['mid']))
{
	$queryitem = "select *from tblusers where assign_to='".$_POST['mid']."' and user_type='Team Leader'";
	$resultitem = $db->query($queryitem);
	$users_arr = array();
	while ($rows = mysqli_fetch_assoc($resultitem)) 
	{
		
		$id = $rows['username'];
		$name = $rows['name'];
		$users_arr[] = array("username" => $id, "name" => $name);

	}	
	echo json_encode($users_arr);
}

if(isset($_POST['tid']))
{
	$queryitem = "select *from tblusers where assign_to='".$_POST['tid']."' and user_type='Business Consultant'";
	$resultitem = $db->query($queryitem);
	$users_arr = array();
	while ($rows = mysqli_fetch_assoc($resultitem)) 
	{
		
		$id = $rows['username'];
		$name = $rows['name'];
		$users_arr[] = array("username" => $id, "name" => $name);

	}	
	echo json_encode($users_arr);
} 

?>