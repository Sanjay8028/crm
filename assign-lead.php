<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');
 
if(isset($_POST['delete'])) 
{
$count  = $_POST['checkbox'];
for($i=0;$i<count($count);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  $sql = "DELETE FROM tblleads WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

if(isset($_POST['ass'])) 
{
$count1  = $_POST['checkbox'];
for($i=0;$i<count($count1);$i++)
{
    $ques="select *from tblusers where username='".$_POST['telecallers']."'";
    $rqs = $db->query($ques);
    $rwsq=mysqli_fetch_array($rqs);
    
    $ques1="select *from tblusers where username='".$rwsq['assign_to']."'";
    $rqs1 = $db->query($ques1);
    $rwsq1=mysqli_fetch_array($rqs1);
    
    $del_id=$_POST['checkbox'][$i];
    $sql = "Update tblleads set assign_to='".$_POST['telecallers']."',to_teamleader='".$rwsq['assign_to']."',to_manager='".$rwsq1['assign_to']."', assign_date='".date('d-m-Y')."' WHERE id='$del_id'";
    $result2 = $db->query($sql);
}
 
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>alert('Lead Assign Successfully !');</script>";
}
}

if(isset($_POST['filer'])) 
{
    $queryu ="SELECT *FROM tblleads where assign_to!='' and assign_to='".$_POST['telecaller']."'";
    $result = $db->query($queryu);
}
else
{
    $queryu ="SELECT *FROM tblleads where assign_to!=''";
    $result = $db->query($queryu);
}

if(isset($_POST['search'])) 
{

    if($_POST['bclead']!='' && $_POST['startdate']!='' && $_POST['enddate']!='')
    {
        $que .="lead_source='".$_POST['bclead']."' and DATE_FORMAT(STR_TO_DATE(regdate,'%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$_POST['startdate']."' and '".$_POST['enddate']."'";
    }

    if($_POST['bclead']!='' && $_POST['startdate']=='' && $_POST['enddate']=='')
    {
        $que .="lead_source='".$_POST['bclead']."'";
    }

    $queryu ="SELECT *FROM tblleads where ".$que."";
    $result = $db->query($queryu);
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
<section class="wrapper main-wrapper row" style=''>

<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left">All Assign Parties</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
<div class="row">
<div class="col-12">
<form method="POST" action="" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-4 col-md-4 col-12">
<label class="form-label"><b>Filter By Business Consultant</b></label>
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
<div class="col-lg-1 col-md-1 col-12">
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="filer" >Filter</button>
</div>


<div class="col-lg-4 col-md-4 col-12">
<label class="form-label"><b>Assign to Business Consultant</b></label>
<select class="form-control" name="telecallers">
<option value="">--Select Business Consultant--</option>
<?php
$queryusb ="SELECT *FROM tblusers where user_type='Business Consultant'";
$resultsb = $db->query($queryusb);
while($rowsb=mysqli_fetch_array($resultsb))
{
?>
<option value="<?php echo $rowsb['username']; ?>" <?php if($rowsb['username']==$_POST['telecallers']){ echo 'selected=selected';} ?>><?php echo $rowsb['name']; ?></option>
<?php
}
?>
</select>
</div>
<div class="col-lg-1 col-md-1 col-12">
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="ass" onSubmit="return validate();">Assign</button>
</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-12"><hr/><h6>Filter Add Lead By Business Consultant</h6><hr/></div>
<div class="col-lg-4 col-md-4 col-12">
<label class="form-label"><b>Filter By Business Consultant</b></label>
<select class="form-control" name="bclead">
<option value="">--Select Business Consultant--</option>
<?php
$queryus ="SELECT *FROM tblusers where user_type='Business Consultant'";
$results = $db->query($queryus);
while($rows=mysqli_fetch_array($results))
{
?>
<option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$_POST['bclead']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?></option>
<?php
}
?>
</select>
</div>
<div class="col-lg-3 col-md-3 col-12">
<label class="form-label"><b>Start Date</b></label>
<input type="date" name="startdate" class="form-control" value="<?php echo $_POST['startdate']; ?>">
</div>
<div class="col-lg-3 col-md-3 col-12">
<label class="form-label"><b>End Date</b></label>
<input type="date" name="enddate" class="form-control" value="<?php echo $_POST['enddate']; ?>">
</div>
<div class="col-lg-1 col-md-1 col-12">
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="search">Search</button>
</div>
</div>

</div>
<div class="row">
<div class="col-lg-1 col-md-1 col-12">
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="delete" onSubmit="return validate();">Delete</button>
<br/>
</div>

<div class="display-data-table-area">
    <div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>S No.</th>
            <th>Company Name</th>
            <th>Email Id</th>
            <th>Client Name</th>
            <th>Mobile No.</th>
            <th>Assing To</th>
            <th>Team Leader</th>
            <th>Parties Status</th>
            <th>Reg Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
            $ques ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
            $rstu = $db->query($ques);
            $rows=mysqli_fetch_array($rstu);

            //$ques ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
            //$rstu = $db->query($ques);
            //$rows=mysqli_fetch_array($rstu);
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $i; ?></td>
            <td><?php echo $row['company_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['client_name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php if($row['assign_to']!=''){ echo $row['assign_to'];}else{ echo 'Not Assing';} ?></td>
            <td><?php echo $rows['assign_to']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['regdate']; ?></td>
            <td>
            
            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" id="<?php echo $row['id']; ?>" class="getid"><i class="fa fa-book" title="Read More"></i></a>
            <a href="update-lead.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil" title="Edit"></i></a>
            <a class="" href="invoice-genrate.php?pid=<?php echo $row['id'];?>" target="_blank"><i class="fa fa-file" title="Generate Invoice"></i></a>
			<a href="history.php?id=<?php echo $row['id'];?>"><i class="fa fa-history" title="History"></i></a>
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
 
