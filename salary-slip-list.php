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
  $sql = "DELETE FROM tblsalaryslip WHERE id='$del_id'";
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
    <h2 class="title float-left btn btn-danger">Salary Slip</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>

<div class="content-body">
<form method="POST" action="" enctype="multipart/form-data">

<div class="display-data-table-area">
  <div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>Sl No.</th>
            <th>Employee Id</th>
            <th>Name</th>
            <th>Month - Year</th>
            <th>Working Days</th>
            <th>Basic Salary</th>
            <th>HRA</th>
			<th>Conveyance Allowance</th>
			<th>Variable Pay</th>
			<th>Gross Salary</th>
            <th>Reg Date</th>
			<th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $queryu ="SELECT *FROM tblsalaryslip ORDER BY id DESC";
        $result = $db->query($queryu);
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $i; ?></td>
            <td><b style="font-size:14px"><?php echo $row['emp_id']; ?></b></td>
        <td><b style="font-size:14px"><?php echo $row['emp_name']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['salary_month'].'-'. $row['salary_year']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['working_days']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['basic_salary']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['hra_amt']; ?></b></td>
			<td><b style="font-size:14px"><?php echo $row['conveyance_amt']; ?></b></td>
			<td><b style="font-size:14px"><?php echo $row['variable_amt']; ?></b></td>
			<td><b style="font-size:14px"><?php echo $row['gross_salary']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['regdate']; ?></b></td>
			
			<td><a href="salary-slip.php?uid=<?php echo $row['id']; ?>" target="_blank" style="color:blue;"><i class="fa fa-prin" title="Print Invoice"><img src="https://toppng.com/uploads/preview/icon-printer02-black-icon-print-data-11553457644zutfcky9ex.png" style="width:30px;float:left"></i></a></td>
			
			<!--<td><a href="salary-slip-list.php?file=<php echo $row['id']; ?>">Download PDF Now</a></td>-->
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
</section>
</div>
</section>
</section>
<?php include('inc/footer.php'); ?>


