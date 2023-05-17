<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

$userid = $_SESSION['username'];
$rgdate = date("d-m-Y");
$querys="select *from tblleads where id='".$_GET['hid']."'";
$results = $db->query($querys);
$rows=mysqli_fetch_array($results,MYSQLI_ASSOC);
$datet1 = new DateTime('now', new DateTimeZone('Asia/Calcutta'));
$dtime = $datet1->format('d-m-Y h:i:s a');
$rm = $_POST['template'].$_POST['remdatetime'].' ('.$dtime.')';
$datet11 = new DateTime('now', new DateTimeZone('Asia/Calcutta'));
$dtime1 = $datet11->format('d-m-Y h:i:s a');
$error='';
if(isset($_POST['submit'])) 
{
    if($userid == $rows['assign_to'])
    {
        echo $queryh="INSERT INTO tblhistory(lead_Id,prf_time,activity,remark,f_date,n_date,udate,username)VALUES('".$_GET['hid']."','".$_POST['precalls']."','".$_POST['activity']."','".$rm."','".$dtime1."','".$_POST['nextfdatetime']."','".$rgdate."','".$userid."')";
        $resulth = $db->query($queryh);
        $error='Updated successfully !';
        $queryh1="Update tblleads set status='".$_POST['activity']."',f_date='".$_POST['nextfdatetime']."' where id='".$_GET['hid']."'";
        $resulth1 = $db->query($queryh1);
    }
    else
    {
        $error='Not assigned for you this lead !';
    }
}


echo $query="select *from tblhistory where lead_Id='".$_GET['hid']."' ORDER BY id desc";
$result = $db->query($query);
?>

<!-- START CONTENT -->
<section id="main-content">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left">Follow Up Update History</h2>
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
            <th>Sl No.</th>
            <th>Company Name</th>
            <th>Activity</th>
            <th>Comment</th>
            <th>Preferred Call Time</th>
            <th>Next Follow-Up</th>
            <th>Update Date</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $queryus ="SELECT *FROM tblhistory where lead_Id='".$_GET['hid']."'";
        $results = $db->query($queryus);
        $i=1;
        while($rows=mysqli_fetch_array($results))
        {
            $queryu ="SELECT *FROM tblleads where id='".$rows['lead_Id']."'";
            $result = $db->query($queryu);
            $row=mysqli_fetch_array($result);
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['company_name']; ?></td>
            <td><?php echo $rows['activity']; ?></td>
            <td><?php echo $rows['remark']; ?></td>
            <td><?php echo $rows['prf_time']; ?></td>
            <td><?php echo $rows['n_date']; ?></td>
            <td><?php echo $rows['udate']; ?></td> 
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
</table>
</div>
</div>

<hr/>
<form action="" name="updatehistory" method="POST">
    <br/><br/>
    <p style="text-align: center;color:green;"><?php echo $error; ?></p>
    <div class="row">
        
    <div class="col-lg-6 col-md-6 col-12">
   
        <div class="form-group">
        <label>Preferred Call Time</label>
        <input name="precalls" type="time" class="form-control" required="required">
        </div>

        <div class="form-group">
        <label>Activity</label>
        <select name="activity" id="assignedto" required="required" class="form-control">
        <option value="">Select Activity</option>
        <?php
        $query9 ="SELECT *FROM tblactivity";
        $result9 = $db->query($query9);
        while($row9=mysqli_fetch_array($result9,MYSQLI_ASSOC))
        {  
        ?>                    
        <option value="<?php echo $row9['activity'];  ?>"><?php echo $row9['activity'];  ?></option>
        <?php
        }
        ?>          
        </select>
        </div>
        
    </div>

    <!--<div class="col-12 col-md-9 col-lg-8 padding-bottom-30">

    </div>-->
    <div class="col-lg-6 col-md-6 col-12">
        
        <div class="form-group">
        <label>Next Follow-Up</label>
        <input name="nextfdatetime" type="date" class="form-control" required="required">
        </div>

        <div class="form-group">
        <label>Comment</label>
        <textarea name="remdatetime" type="text" class="form-control"></textarea>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-12">
    <div class="col-lg-4 col-md-4 col-12">
    </div>
    <div class="col-lg-4 col-md-4 col-12">
        <div class="text-left">
            <?php if($_GET['hid']!=''){ ?>
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
            <button type="button" class="btn">Cancel</button>
        <?php } ?>


        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">
    </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
</section>
</div>
</section>
</section>
<?php include('inc/footer.php'); ?>


