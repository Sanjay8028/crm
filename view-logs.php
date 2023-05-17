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
  $sql = "DELETE FROM tblusers WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

if(isset($_POST['search'])) 
{

    $date_time = "11-Dec-13 8:05:44 AM";
    $new_date = date("Y-m-d H:i:s",strtotime($date_time));

    if($_POST['users']!='' && $_POST['date']=='')
    {
        $que .="username='".$_POST['users']."'";
    }
    if($_POST['users']=='' && $_POST['date']!='')
    {
        $que .="date_log='".$_POST['date']."'";
    }

    if($_POST['users']!='' && $_POST['date']!='')
    {
        $que .="username='".$_POST['users']."' and date_log='".$_POST['date']."'";
    }

    $queryu ="SELECT *FROM tbllogs where ".$que."";
    $result = $db->query($queryu);
}
else
{
    $queryu ="SELECT *FROM tbllogs";
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
    <section class="wrapper main-wrapper" style=''>



<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">View Users Logs</h2>
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
</br>
<div class="row">
<div class="col-lg-3 col-md-2 col-12">
<label class="form-label btn btn-info form-control"><b>Users</b></label>
<select class="form-control" name="users">
<option value="">--Select--</option>
<?php
$queryus ="SELECT *FROM tblusers";
$results = $db->query($queryus);
while($rows=mysqli_fetch_array($results))
{
?>
<option value="<?php echo $rows['username']; ?>" <?php if($rows['username']==$_POST['users']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?></option>
<?php
}
?>
</select>
</div>
<div class="col-lg-3 col-md-2 col-12">
<label class="form-label btn btn-info form-control"><b>Date</b></label>
<input type="date" name="date" class="form-control" value="<?php echo $_POST['date']; ?>" >
</div>
<div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="search">Search</button>
</div>

</div>
</br>

<div class="display-data-table-area">
  <div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>Sl No.</th>
            <th>Name</th>
            <th>UserName</th>
            <th>Log Date Time</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $i; ?></td>
            <td><b style="font-size:14px"><?php echo $row['name']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['username']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['log_date']; ?></b></td>
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

