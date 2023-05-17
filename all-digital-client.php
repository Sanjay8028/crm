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
  $sql = "DELETE FROM tbldigitalmarketing_client WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

if(isset($_POST['datesearch'])) 
{

    if($_POST['name']!='' && $_POST['mobile']!='')
    {
        $que .="company_name='".$_POST['name']."' and mobile='".$_POST['mobile']."'";
    }
	else if ($_POST['name']!='')
	{
		$que .="company_name='".$_POST['name']."'";
	}
	else if ($_POST['mobile']!='')
	{
		$que .="mobile='".$_POST['mobile']."'";
	}

    $queryu ="SELECT *FROM tbldigitalmarketing_client where ".$que."";
    $result = $db->query($queryu);
}
else
{
	$queryu ="SELECT *FROM tbldigitalmarketing_client";
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
    <h2 class="title float-left btn btn-danger">All Digital Marketing</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
	<form method="POST" action="" enctype="multipart/form-data">			
	<div class="row">
	<div class="col-lg-12 col-md-12 col-12"><hr/><h6 style="color:#ff6666">Filter By Client Name, Mobile</h6><hr/></div>
	<div class="col-lg-4 col-md-4 col-12">
	<label class="form-label btn btn-info form-control"><b>Client Name</b></label>
	<input type="text" name="name" class="form-control" value="<?php echo $_POST['name']; ?>">
	</div>
	<div class="col-lg-4 col-md-4 col-12">
	<label class="form-label btn btn-info form-control"><b>Mobile</b></label>
	<input type="text" name="mobile" class="form-control" value="<?php echo $_POST['mobile']; ?>">
	</div>
	<div class="col-lg-1 col-md-1 col-12">
	<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="datesearch">Search</button>
	</div>
	</div>
	</form>
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<form method="POST" action="" enctype="multipart/form-data">


<div class="display-data-table-area">
  <div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>Sl No.</th>
            <th>Company Name</th>
            <th>Mobile</th>
            <th>Product</th>
            <th>Website Url</th>
            <th>Action</th>
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
            <td><b style="font-size:14px"><?php echo $row['company_name']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['mobile']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['product']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['website_url']; ?></b></td>
            <td style="display:inline-flex">
            
            <a href="add-digital-client.php?id=<?php echo $row['id'];?>"><i class="fa fa-penc" title="Edit"> <img src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-pencil-icon-png-image_313118.jpg" style="width:30px;float:left"></i></a>
            <a href="add-keyword.php?id=<?php echo $row['id'];?>" style="color:blue;" target="_blank"><i class="fa fa-pl" title="Add Keyword"><img src="https://flyclipart.com/thumb2/plus-icons-163246.png" style="width:30px;float:left"></i></a>
            <a href="view-keyword-report.php?id=<?php echo $row['id'];?>" style="color:blue;" target="_blank"><i class="fa fa-boo" title="Read More"><img src="https://i.pinimg.com/originals/d9/62/3f/d9623fc777b7498ab50cb37520975ef5.png" style="width:30px;float:left"></i></a>
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


