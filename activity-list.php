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
  $sql = "DELETE FROM tblactivity WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

$error='';
if(isset($_POST['submit'])) 
{
    if($_GET['uid']=='')
    {
        $querys="select *from tblactivity where activity='".$_POST['activity']."'";
        $results = $db->query($querys);
        $count=mysqli_num_rows($results);

        if($count==0)
        {

            $queryh="INSERT INTO tblactivity(activity)VALUES('".$_POST['activity']."')";
            $resulth = $db->query($queryh);
            $error='Add  successfully !';
        }
    }
    else
    {
            $queryh="Update tblactivity set activity='".$_POST['activity']."' where id='".$_GET['uid']."'";
            $resulth = $db->query($queryh);
            $error='Add  successfully !';

            echo "<script>window.location='activity-list.php'</script>";
    }
}

    $querys="select *from tblactivity where id='".$_GET['uid']."'";
    $results = $db->query($querys);
    $rows=mysqli_fetch_array($results,MYSQLI_ASSOC);
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
    <h2 class="title float-left btn btn-success">Activity List</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<form action="" name="updatehistory" method="POST">
    <p style="text-align: center;color:green;"><?php echo $error; ?></p>
    <div class="row">
        
    <div class="col-lg-6 col-md-6 col-12">
        <div class="form-group">
        <label class="btn btn-info form-control">Activity</label>
        <input name="activity" type="text" value="<?php echo $rows['activity']; ?>" class="form-control" required="required">
        </div>       
    </div>
    
    <div class="col-lg-2 col-md-2 col-12">
        <div class="text-left">
            <button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="submit">Save</button>
        </div>
    </div>
  </form>



<form method="POST" name="tables" action="" enctype="multipart/form-data">

<div class="display-data-table-area">
  <div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>Sl No.</th>
            <th>Activity Name</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $queryu ="SELECT *FROM tblactivity";
        $result = $db->query($queryu);
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $i; ?></td>
            <td><b style="font-size:14px"><?php echo $row['activity']; ?></b></td>
            <td style="display:inline-flex"> <a href="activity-list.php?uid=<?php echo $row['id']; ?>"><i class="fa fa-penc" title="Edit"> <img src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-pencil-icon-png-image_313118.jpg" style="width:30px;float:left"></i></a></td>

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


