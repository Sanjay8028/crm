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
  $sql = "DELETE FROM tblkeyword_report WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}


if(isset($_POST['update'])) 
{
$count  = $_POST['checkbox'];
for($i=0;$i<count($count);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  $sql = "Update tblkeyword_report set yahoo_rank='".$_POST['yahoo_rank'][$i]."',bing_rank='".$_POST['bing_rank'][$i]."',google_rank='".$_POST['google_rank'][$i]."',update_date='".date('Y-m-d')."' WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

    $qus="select *from tbldigitalmarketing_client where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
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
<section class="box">

<header class="panel_header">
    <h2 class="title float-left">All Keyword Rank For <?php echo $rowq['company_name']; ?> &nbsp; | &nbsp;  Website :- <?php echo $rowq['website_url']; ?></h2>
</header>
<div class="content-body">
<a href="" onclick="Export()" class="btn btn-primary btn-mt-20 btn-width-100">Export</a><br/><br/>
<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<form method="POST" action="" enctype="multipart/form-data">
<div class="display-data-table-area">
  <div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Sl No.</th>
            <th>Keyword</th>
            <th>Yahoo Rank</th>
            <th>Bing Rank</th>
            <th>Goolge Rank</th>
            <th>Update Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $queryu ="SELECT *FROM tblkeyword_report where com_id='".$_GET['id']."'";
        $result = $db->query($queryu);
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <tr id="r-<?php echo $row['id']?>">
            <input name="checkbox[]" type="hidden" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass" checked>
            <td class="clr-blue"><?php echo $i; ?></td>
            <td><?php echo $row['keyword']; ?></td>
            <td><input type="text" name="yahoo_rank[]" class="form-control" value="<?php echo $row['yahoo_rank']; ?>"></td>
            <td><input type="text" name="bing_rank[]" class="form-control" value="<?php echo $row['bing_rank']; ?>"></td>
            <td><input type="text" name="google_rank[]" class="form-control" value="<?php echo $row['google_rank']; ?>"></td>
            <td><?php echo $row['update_date']; ?></td>
            <td>
            <a href="add-keyword.php?id=<?php echo $_GET['id']; ?>&eid=<?php echo $row['id']; ?>"><i class="fa fa-pencil" title="Edit"></i></a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
</table>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-12">
    </br>
    <button type="submit" class="btn btn-primary" name="update" onSubmit="return validate();">Update</button>
</div>
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
<script>
function Export()
{
var conf = confirm("Export Rank to CSV?");
if(conf == true)
{
    window.open("rankexport.php?id=<?php echo $_GET['id']; ?>", '_blank');
}
}
</script>
<?php include('inc/footer.php'); ?>


