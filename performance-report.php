<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['search'])) 
{
    if($_POST['emp']!='' && $_POST['fdate']!='' && $_POST['tdate']!='')
    {
        $que .="bid='".$_POST['emp']."' and recive_date BETWEEN '".date("Y-m-d", strtotime($_POST['fdate']))."' and '".date("Y-m-d", strtotime($_POST['tdate']))."'";
    }
    if($_POST['emp']=='' && $_POST['fdate']!='' && $_POST['tdate']!='')
    {
        $que .="recive_date BETWEEN '".date("Y-m-d", strtotime($_POST['fdate']))."' and '".date("Y-m-d", strtotime($_POST['tdate']))."'";
    }
	if($_POST['emp']!='' && $_POST['fdate']=='' && $_POST['tdate']=='')
    {
        $que .="bid='".$_POST['emp']."'";
    }
    
    $queryus ="SELECT *FROM tblperformance where ".$que."";
    $results = $db->query($queryus);
}
else
{
	if($_GET['uid'] !='' && $_GET['action']=='Approved')
	{
		$qu="Update tblperformance set status='Approved' where id='".$_GET['uid']."'";
		$rs=$db->query($qu);
		$error="Update Successfully !";
	}
	$queryus ="SELECT *FROM tblperformance ORDER BY recive_date DESC";
    $results = $db->query($queryus); 
}

if(isset($_POST['delete'])) 
{
	echo $count1  = $_POST['checkbox'];
	for($i=0;$i<count($count1);$i++)
	{
	  $del_id=$_POST['checkbox'][$i];
	  $sql = "DELETE FROM tblperformance WHERE id='$del_id'";
	  $result2 = $db->query($sql);
	}
}
?>
<script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var j = 0; j < chks.length; j++)
{
if (chks[j].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}

$(document).ready(function(){
$('#ckbCheckAll').click(function(event) { 

            if($(this).is(":checked")) {

                $('.checkBoxClass').each(function(){

                    $(this).prop("checked",true);

                });

            }

            else{

                $('.checkBoxClass').each(function(){

                    $(this).prop("checked",false);

                });

            }   
    }); 

    });
</script>
<!-- START CONTENT -->
<section id="main-content">
<section class="wrapper main-wrapper" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left">Performance Report</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<form method="POST" action="" enctype="multipart/form-data">
<!--<form name="frm" method="POST" action="" enctype="multipart/form-data">-->
<div class="row">
    
    
<div class="col-lg-3 col-md-2 col-12">
    Employee
<select class="form-control" name="emp">
<option value="">--Select Employee--</option>
<?php
$queryuss ="SELECT *FROM tblusers where user_type='Business Consultant'";
$resultss = $db->query($queryuss);
while($rows=mysqli_fetch_array($resultss))
{
?>
<option value="<?php echo $rows['username']; ?>" <?php if($rows['id']==$_POST['emp']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?> ( <?php echo $rows['user_type']; ?> )</option>
<?php
}
?>
</select>
</div>
<div class="col-lg-3 col-md-2 col-12">
    First Date
<input type="date" name="fdate" value="<?php echo $_POST['fdate']; ?>" class="form-control">
</div>
<div class="col-lg-3 col-md-2 col-12">
    To Date
<input type="date" name="tdate" value="<?php echo $_POST['tdate']; ?>" class="form-control">
</div>
<div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="search">Search</button>
</div>
</div>



<div class="display-data-table-area">
<div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
			<th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
			<th>Slno</th>
             <th>Employee</th>
            <th>Client Name</th>
            <th>Client Mobile</th>
			<th>Service Name</th>
			<th> Settelment Amount</th>
			<th>Receive Amount</th>
			<th>Balance Due</th>
			<th>Recived Date</th>
			<th>Payment Status</th>
			
	
			<th>Action</th>
         </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($row=mysqli_fetch_array($results))
        {
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
			<td class="clr-blue"><?php echo $i; ?></td>
            <td><?php echo $row['bid']; ?></td>
            <td><?php echo $row['client_name']; ?></td>
            <td><?php echo $row['client_mobileno']; ?></td>
			<td><?php echo $row['service']; ?></td>
            <td style="background:#000;color:#f8f8f8;font-weight:bold;"><?php echo $row['amount']; ?></td>
             <td style="background:green;color:#f8f8f8;font-weight:bold;"><?php echo $row['paymode']; ?></td>
              <td style="background:orange;color:#f8f8f8;font-weight:bold;"><?php echo $ne=($row['amount']- $row['paymode']); ?></td>
            <td><?php echo $row['recive_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <!--<td><?php echo  $tt= $tot+= $row['paymode'];?></td>-->
            
			<td><?php if($row['status']!='Approved'){?>
			<a href="performance-report.php?uid=<?php echo $row['id']; ?>&action=Approved" style="color:blue;">Approved</a>
			<?php
			}
			?>
			</td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
     <h2 class="btn btn-success">Total Recieved: <?php echo  $tt= $tot+= $row['paymode'];?></h2>
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


