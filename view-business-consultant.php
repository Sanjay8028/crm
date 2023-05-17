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
    <h2 class="title float-left">All Business Consultant of <?php echo $_GET['uid']; ?></h2>
</header>

<div class="content-body">
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<form method="POST" action="" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-2 col-md-2 col-12">
<button type="submit" class="btn btn-primary" name="delete" onSubmit="return validate();">Delete</button>
</div>
<div class="col-lg-2 col-md-2 col-12">
<label class="form-label"><b>Team Leader</b></label>
</div>
<div class="col-lg-3 col-md-2 col-12">
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
<button type="submit" class="btn btn-primary" name="ass" onSubmit="return validate();">Assign</button>
</div>
</div>


    <div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>Sl No.</th>
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
        $queryu ="SELECT *FROM tblusers where assign_to='".$_GET['uid']."'";
        $result = $db->query($queryu);
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
			$queryus ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
			$results = $db->query($queryus);
			$rows=mysqli_fetch_array($results);
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td><?php echo $i; ?></td>
            <td><a href="view-assign-leads.php?uid=<?php echo $row['username']; ?>" style="color:blue;" target="_blank"><?php echo $row['name']; ?></a></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php if($row['assign_to']!=''){ echo $row['assign_to'];}else{ echo 'Not Assing';} ?></td>
			<td><?php if($rows['assign_to']!=''){ echo $rows['assign_to'];}else{ echo 'Not Assing';} ?></td>
            <td><?php echo $row['regdate']; ?></td>
            <td>
            <a href="add-users.php?id=<?php echo $row['id'];?>"><img src="images/edit.png"/></a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
</table>
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


