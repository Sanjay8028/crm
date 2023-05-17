<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

$userid = $_SESSION['username'];
$rgdate = date("d-m-Y");


if(isset($_POST['filer'])) 
{
    $ques ="SELECT *FROM tblrequest_recharge where username='".$_POST['telecaller']."' ORDER BY id desc";
    $rslts = $db->query($ques);
}
else
{
    $ques ="SELECT *FROM tblrequest_recharge ORDER BY id desc";
    $rslts = $db->query($ques);
}


if($_GET['uid'] !='' && $_GET['action']=='Approved')
	{
		$qu="Update tblrequest_recharge set status='Approved' where id='".$_GET['uid']."'";
		$rs=$db->query($qu);
		$error="Update Successfully !";
	}
	else
	{
	    echo "<alert>Update not </alert>";
	}
	
	

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Request For Mobile Recharge</h2>
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
<div class="row">
<div class="col-lg-4 col-md-4 col-12">
<label class="form-label btn btn-info form-control"><b>Business Consultant</b></label>
<select class="form-control" name="telecaller">
<option value="">--Select Business Consultant--</option>
<?php
$queryus ="SELECT *FROM tblusers where user_type='Business Consultant'";
$results = $db->query($queryus);
while($rows=mysqli_fetch_array($results))
{
?>
<option value="<?php echo $rows['username']; ?>" <?php if($rows['username']==$_POST['telecaller']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?></option>
<?php
}
?>
</select>
</div>
<div class="col-lg-1 col-md-2 col-12">
<!--<button type="submit" class="btn btn-primary" name="ass" onSubmit="return validate();">Assign</button>-->
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="filer" >Filter</button>
</div>
<!--<div class="col-lg-2 col-md-6 col-12">
<input type="file" name="file" class="form-control" style="margin-left: 6px;">
</div>
<div class="col-lg-1 col-md-6 col-12">
<button type="submit" class="btn btn-primary" name="Import" style="margin-left: 65px;">Import</button>
</div>
<div class="col-lg-1 col-md-6 col-12">
<a href="" onclick="Export()" class="btn btn-primary" style="margin-left: 78px;">Export</a>
</div>-->
</div>
</br>

<div class="display-data-table-area">
    <div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Mobie Number</th>
            <th>Sim (Brand)</th>
          
            <th>Recharge Status</th>
            <th>Request Date</th>
            <th>Action</th>
           
          
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
            <td><b style="font-size:14px"><?php echo $rows['name']; ?></b></td>
             <td> <b style="font-size:14px"><?php echo $rows['qty']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['remark']; ?></b></td>
           
           
           <td><b style="font-size:14px"><?php echo $rows['status']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['regdate']; ?></b></td>
            <td style="display:inline-flex"><a href="update-recharge.php?id=<?php echo $rows['id'];?>"><i class="fa fa-boo" title="Read More"><img src="https://i.pinimg.com/originals/d9/62/3f/d9623fc777b7498ab50cb37520975ef5.png" style="width:30px;float:left"></i></a> </td>
           
            
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


