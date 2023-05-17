<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

$userid = $_SESSION['username'];
$rgdate = date("d-m-Y");


// if(isset($_POST['filer'])) 
// {
//     $ques ="SELECT *FROM tblrequest_recharge where username='".$_POST['telecaller']."' ORDER BY id desc";
//     $rslts = $db->query($ques);
// }
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
	


    $res="select * from smo order by id desc";
    $rst=$db->query($res);
    

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">View SMO List</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
<div class="row">
<div class="col-12">

<br/>
<form method="POST" name="filter" action="" enctype="multipart/form-data">

<div class="display-data-table-area">
    <div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S No.</th>
            <th>Company Name</th>
            <th>Client Name</th>
            <th>Mobile Number</th>
          
            <th>Post Day</th>
            <th>Date</th>
             <th>Status</th>
             <th>Links</th>
            <!--<th>Banner Status</th>-->
            <!--<th>Action</th>-->
            
           
          
        </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($rows=mysqli_fetch_array($rst))
        {

        ?>
        <tr>
            <td class="clr-blue"><?php echo $i; ?></td>
            <td><b style="font-size:14px"><?php echo $rows['cname']; ?></b></td>
             <td> <b style="font-size:14px"><?php echo $rows['clname']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['mobile']; ?></b></td>
           
           
           <td><b style="font-size:14px"><?php echo $rows['postday']; ?></b></td>
           <td><b style="font-size:14px"><?php echo $rows['date']; ?></b></td>
           
            <td><b style="font-size:14px"><?php echo $rows['notpost']; ?></b></td>
            
            <td style="display:inline-flex">
            
            <a href="<?php echo $rows['facebook'];?>"><i class="fa fa-penc" title="Edit"> <img src="https://www.pngitem.com/pimgs/m/0-7214_circle-facebook-icon-png-image-free-download-searchpng.png" style="width:30px;float:left"></i></a>
            
            <a href="<?php echo $rows['insta'];?>" style="color:blue;" target="_blank"><i class="fa fa-pl" title="Add Keyword"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1200px-Instagram-Icon.png" style="width:30px;float:left"></i></a>
            
            <!--<a href="" style="color:blue;" target="_blank"><i class="fa fa-boo" title="Read More"><img src="https://i.pinimg.com/originals/d9/62/3f/d9623fc777b7498ab50cb37520975ef5.png" style="width:30px;float:left"></i></a>-->
            </td>
          
          
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


