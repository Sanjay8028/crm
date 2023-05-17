<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['search'])) 
{
    if($_POST['emp']!='' && $_POST['fdate']!='' && $_POST['tdate']!='')
    {
        $que .="uid='".$_POST['emp']."' and  updat_date BETWEEN '".date("Y-m-d", strtotime($_POST['fdate']))."' and '".date("Y-m-d", strtotime($_POST['tdate']))."' ORDER BY updat_date DESC";
    }
    if($_POST['emp']=='' && $_POST['fdate']!='' && $_POST['tdate']!='')
    {
        $que .="updat_date BETWEEN '".date("Y-m-d", strtotime($_POST['fdate']))."' and '".date("Y-m-d", strtotime($_POST['tdate']))."' ORDER BY updat_date DESC";
    }
    
    echo $queryus ="SELECT *FROM tblattendance where ".$que."";
    $results = $db->query($queryus);
}
else
{
	$queryus ="SELECT *FROM tblattendance ORDER BY updat_date DESC";
    $results = $db->query($queryus);
}
?>

<!-- START CONTENT -->
<section id="main-content">
    <section class="wrapper main-wrapper" style=''>



<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Attendance Report</h2>
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

<div class="row">
<div class="col-lg-3 col-md-2 col-12">
    Employee
<select class="form-control" name="emp">
<option value="">--Select Employee--</option>
<?php
$queryuss ="SELECT *FROM tblusers";
$resultss = $db->query($queryuss);
while($rows=mysqli_fetch_array($resultss))
{
?>
<option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$_POST['emp']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?> ( <?php echo $rows['user_type']; ?> )</option>
<?php
}
?>
</select>
</div>
<div class="col-lg-3 col-md-2 col-12">
    First Date
<input type="date" name="fdate" value="<?php echo $_POST['fdate']; ?>" class="form-control" required="">
</div>
<div class="col-lg-3 col-md-2 col-12">
    To Date
<input type="date" name="tdate" value="<?php echo $_POST['tdate']; ?>" class="form-control" required="">
</div>
<div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="search">Search</button>
</div>
</div>


<div class="display-data-table-area">
<div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Emp Id</th>
            <th>Employee Name</th>
            <th>Employee Mobile</th>
            <th>Employee Email</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($rows=mysqli_fetch_array($results))
        {
            $queryu ="SELECT *FROM tblusers where id='".$rows['uid']."'";
            $result = $db->query($queryu);
            $row=mysqli_fetch_array($result);
        ?>
        <tr id="r-<?php echo $row['id']?>">
            <td class="clr-blue"><?php echo 'WI-'.$row['employee_id']; ?></td>
            <td><b style="font-size:14px"><?php echo $row['name']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['mobile']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['email']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['updat_date']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['today_time']; ?></b></td>
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


