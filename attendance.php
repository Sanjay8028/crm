<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

?>

<!-- START CONTENT -->
<section id="main-content">
    <section class="wrapper main-wrapper" style=''>



<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Today Attendance</h2>
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
        $queryus ="SELECT *FROM tblattendance where updat_date='".date('Y-m-d')."'";
        $results = $db->query($queryus);

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


