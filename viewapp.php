<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

// $userid = $_SESSION['username'];
// $rgdate = date("d-m-Y");



    $ques ="SELECT *FROM appraisal ORDER BY app_date ASC";
    $rslts = $db->query($ques);

// else
// {
//     $ques ="SELECT *FROM tblrequest_recharge ORDER BY id desc";
//     $rslts = $db->query($ques);
// }


// if($_GET['uid'] !='' && $_GET['action']=='Approved')
// 	{
// 		$qu="Update tblrequest_recharge set status='Approved' where id='".$_GET['uid']."'";
// 		$rs=$db->query($qu);
// 		$error="Update Successfully !";
// 	}
// 	else
// 	{
// 	    echo "<alert>Update not </alert>";
// 	}
	
	

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">View Appraisal</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
<div class="row">
<div class="col-12">


<div class="display-data-table-area">
    <div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Old Designation</th>
            <th>New Designation</th>
            <th>Salary</th>
            <th>Appraisal Date</th>
          
           
           
          
        </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($rows=mysqli_fetch_array($rslts))
        {

        ?>
        <tr>
            <td class="clr-blue"><?php echo $i; ?></td>
           
             <td> <b style="font-size:14px"><?php echo $rows['emp_list']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['old_des']; ?></b></td>
           
           
           <td><b style="font-size:14px"><?php echo $rows['new_des']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['salary']; ?></b></td>
        <td><b style="font-size:14px"><?php echo $rows['app_date']; ?></b></td>
            
           
            
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
</table>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
</section>
</section>
<?php include('inc/footer.php'); ?>


