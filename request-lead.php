<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');


// if(isset($_POST['nmdel']))
// {
// 	$deliid=$_GET['delid'];
	 
// 	$resl09="delete from tblrequest_lead where id='$deliid'";
// 	 $rslts = $db->query($resl09);

// }


$userid = $_SESSION['username'];
$rgdate = date("d-m-Y");
$ree;

if(isset($_POST['filer'])) 
{
    $ques ="SELECT *FROM tblrequest_lead where username='".$_POST['telecaller']."' ORDER BY id desc";
  
    $rslts = $db->query($ques);
}
else
{
    $ques =" SELECT tblrequest_lead.*,tblusers.employee_id,tblusers.assign_to from tblrequest_lead JOIN tblusers ON tblrequest_lead.username=tblusers.username order by id desc";
    // SELECT tblrequest_lead.*,tblusers.employee_id from tblrequest_lead JOIN tblusers ON tblrequest_lead.username=tblusers.username
    $rslts = $db->query($ques);
}



if(isset ($_GET['id']))
{
	$ree="0";
	$uname=$_GET['name'];
	$uqty=$_GET['qty'];
	$uiid=$_GET['id'];
	$uitl=$_GET['tl'];

$quledt ="SELECT *FROM tblleads where status NOT IN('Materalize','Trash') and assign_to='".$uname."'";
$resledt = $db->query($quledt);
$totalcontact=mysqli_num_rows($resledt);
$ree="1";

$rema=150-$totalcontact;

$assiang_qty=$rema > $uqty ? $uqty : $rema;

if($assiang_qty!=0)
{
	
	$upd20 ="update tblleads set assign_to='".$uname."',assigns_date='".date('d-m-Y')."' where id in (SELECT id FROM(
		SELECT id FROM tblleads WHERE assign_to='' and status not in('Not Interested','Company Closed / Wrong Number','Materalize') and regdate LIKE '%2022' order by rand()  LIMIT 0,$assiang_qty)tmp)";
		$resl = $db->query($upd20);
		$ree=$resl;
		
		
// 		$upd20 ="update tblleads set assign_to='".$uname."',assigns_date='".date('d-m-Y')."' where id in (SELECT id FROM(
// 		SELECT id FROM tblleads WHERE assign_to='' and id in(SELECT id FROM tblleads where STR_TO_DATE(regdate, '%d-%m-%Y') > '2022-3-12')order by rand() LIMIT 0,$assiang_qty)tmp )";
// 		$resl = $db->query($upd20);
// 		$ree=$resl;
		
		
		
// 			$upd20 ="update tblleads set assign_to='".$uname."',assigns_date='".date('d-m-Y')."',to_teamleader='".$uitl."' where id in (SELECT id FROM(
// 		SELECT id FROM tblleads WHERE assign_to='' and status not in('Not Interested','Company Closed / Wrong Number') and id in(SELECT id FROM tblleads where STR_TO_DATE(regdate, '%d-%m-%Y') > '2022-3-12')order by rand() LIMIT 0,$assiang_qty)tmp )";
// 		$resl = $db->query($upd20);
// 		$ree=$resl;
		
		
		if($resl)
		{
			
			$upd20 ="update tblrequest_lead set assign_qty='".$assiang_qty."',status='approved',assign_date='".date('d-m-Y')."' where id='".$uiid."'";
		$resl1 = $db->query($upd20);
			
			if(!empty($resl1))
			{
				$ree="party assigned1";
			}
			
		}
		else
		{
			$ree=  "niot";
		}
		
		
		
}

else
{
	$ree="already 150 parties assign";
}
}


if(isset($_GET['delid']))
{
	$deliid=$_GET['delid'];
	 
	$resl09="delete  from tblrequest_lead where id='$deliid'";
	 $rslts = $db->query($resl09);
	header("dashboard.php");
	
}



// $dataauser="select username,employee_id from tblusers where user_type='Business Consultant'";
// 	$resl23 = $db->query($dataauser);
// 	$rows32=mysqli_fetch_array($resl23);
	

	


?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Request For Parties List <?php echo $ree ?></h2>
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
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="filer" >Filter</button>
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
            <th>E.ID</th>
            <th>Requested Parties Qty</th>
            <th>Assign Parties Qty</th>
            <th>Assign Status</th>
            <th>Request Date</th>
            <th>Assign Date</th>
            <th>Remarks</th>
			<th>Action</th>
			<th>Delete</th>
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
            <td><b style="font-size:14px"><?php echo $rows['username']; ?></b></td>
            
   <td><b style="font-size:14px"><?php echo $rows['employee_id'];?></b></td>
            
            <td><b style="font-size:14px"><?php echo $rows['qty']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['assign_qty']; ?></b></td>
            
            <!--<td><b style="font-size:14px"><?php echo $rows['status']; ?></b></td>-->
            
            <td><b style="font-size:14px"><?php if($rows['status']=='approved') {
            echo "<span style='color:green'>".$rows['status']."</span>"; 
            }
            else
            {
        echo "<span style='color:red'>".$rows['status']."</span>";
            } ?></b></td>
            
            <td><b style="font-size:14px"><?php echo $rows['regdate']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['assigns_date']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['remark']; ?></b></td>
			<td><b style="font-size:14px"><?php if($rows['assign_qty']==''){ 
			?>
			<a href="request-lead.php?name=<?php echo $rows['username']?>&qty=<?php echo $rows['qty'] ?>&id=<?php echo $rows['id']?>&tl=<?php echo $rows['assign_to']?> " name="nm"  class="btn btn-success">Submit</a>
			
			
			<?php
			}
			?>
	  
			
			</b></td>
			
			<td><b style="font-size:14px"><a href="request-lead.php?delid=<?php echo $rows['id']?> " name="nmdel"  class="btn btn-danger" onclick="return confirm('Are you sure to delete this file ?')">Delete</a></b></td>
			
			
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


