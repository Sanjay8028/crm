<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');



if(isset($_GET['did']))
{

$pdelid=$_GET['did'];
mysqli_query($db,"delete from tblusers where id='$pdelid'");


}


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

if(isset($_POST['ass'])) 
{
$count1  = $_POST['checkbox'];
for($i=0;$i<count($count1);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  $sql = "Update tblusers set assign_to='".$_POST['teamleader']."' WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

if($_GET['sid']!='') 
{
    $status=$_GET['status']==1?0:1;

  $sql = "Update tblusers set status='.$status' WHERE id='".$_GET['sid']."'";
  $result2 = $db->query($sql);
   
   if($result2)
  {
    echo "<script>alert('Status changed!');</script>";
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
    <h2 class="title float-left btn btn-danger">All Business Consultant</h2>
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
<label class="form-label btn btn-info form-control"><b>Team Leader</b></label>
<select class="form-control" name="teamleader">
<option value="">--Select Team Leader--</option>
<?php
$queryus ="SELECT *FROM tblusers where user_type='Team Leader'";
$results = $db->query($queryus);
while($rows=mysqli_fetch_array($results))
{
?>
<option value="<?php echo $rows['username']; ?>"><?php echo $rows['name']; ?></option>
<?php
}
?>
</select>
</div>
<div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="ass" onSubmit="return validate();">Assign</button>
</div>
</div>


  <div class="display-data-table-area">
    <div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>S No.</th>
			<th>Profile Pic</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>User Type</th>
            <th>UserName</th>
            <th>Password</th>
            <th>Assign Team Leader</th>
			<th>Assign Manager</th>
            <th>Reg Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $queryu ="SELECT *FROM tblusers where user_type='Business Consultant'";
        $result = $db->query($queryu);
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
			$queryus ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
			$results = $db->query($queryus);
			$rows=mysqli_fetch_array($results);
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $i; ?></td>
			<td><?php if($row['pimg']!=''){ ?>
			<img src="../photo/<?php echo $row['pimg']; ?>" style="width:73px;" />
			<?php
			} ?>
			</td>
			<td><b style="font-size:14px"><a href="view-assign-leads.php?uid=<?php echo $row['username']; ?>" style="color:#3F51B5 !important; background:none;" target="_blank"><?php echo $row['name']; ?></a></b></td>
            <td><b style="font-size:14px"><?php echo $row['mobile']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['email']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['user_type']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['username']; ?></b></td>
            <td><b style="font-size:14px;color:red"><?php echo $row['password']; ?></b></td>
            <td><b style="font-size:14px"><?php if($row['assign_to']!=''){ echo $row['assign_to'];}else{ echo 'Not Assing';} ?></b></td>
			<td><b style="font-size:14px"><?php if($rows['assign_to']!=''){ echo $rows['assign_to'];}else{ echo 'Not Assing';} ?></b></td>
            <td><?php echo $row['regdate']; ?></td>
            <td style="display:inline-flex">
            <a href="add-users.php?id=<?php echo $row['id'];?>"><i class="fa fa-penc" title="Edit"> <img src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-pencil-icon-png-image_313118.jpg" style="width:30px;float:left"></i></a>
            &nbsp;
            <a href="update-empolyee.php?id=<?php echo $row['id'];?>"><i class="fa fa-boo" title="Read More"><img src="https://i.pinimg.com/originals/d9/62/3f/d9623fc777b7498ab50cb37520975ef5.png" style="width:30px;float:left"></i></a>

             <!--<a href="all-telecaller.php?did=<php echo $row['id'];?>"><i class="fa fa-trash" title="Delete"></i></a> -->

           <a href="all-telecaller.php?sid=<?php echo $row['id'];?>&status=<?php echo $row['status']?>" class="btn btn-info">Status </a>

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


