<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['search']))
{

    $queryus ="SELECT *FROM tblinvoice where invoice_date BETWEEN '".date("d-m-Y", strtotime($_POST['fdate']))."' and '".date("d-m-Y", strtotime($_POST['tdate']))."'";
    $results = $db->query($queryus);
}
else
{
    $queryus ="SELECT *FROM tblinvoice ORDER BY id DESC";
    $results = $db->query($queryus);
}

if(isset($_POST['sub'])) 
{
echo $count1  = $_POST['checkbox'];
for($i=0;$i<count($count1);$i++)
{
  echo $del_id=$_POST['checkbox'][$i];
  //$sql = "DELETE FROM tblusers WHERE id='$del_id'";
  //$result2 = $db->query($sql);
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
<section class="wrapper main-wrapper row" style=''>

<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Invoice List</h2>
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
<div class="col-lg-3 col-md-2 col-12">
   <label class="form-label btn btn-info form-control"> First Date </label>
<input type="date" name="fdate" value="<?php echo $_POST['fdate']; ?>" class="form-control" required="">
</div>
<div class="col-lg-3 col-md-2 col-12">
   <label class="form-label btn btn-info form-control"> To Date </label>
<input type="date" name="tdate" value="<?php echo $_POST['tdate']; ?>" class="form-control" required="">
</div>
<div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="search">Search</button>
</div>
</div>


<div class="display-data-table-area">
	<div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>Invoice No.</th>
            <th>Company Name</th>
            <th>Mobile No.</th>
            <th>Email Id</th>
            <th>Service Name</th>
            <th>Invoice Date</th>
             <th>Add By</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($rows=mysqli_fetch_array($results))
        {
            //$queryu ="SELECT *FROM tblleads where id='".$rows['client_id']."'";
            //$result = $db->query($queryu);
            //$row=mysqli_fetch_array($result);

        ?>
       <tr id="r-<?php echo $rows['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $rows['invoice_no']; ?></td>
            <td><b style="font-size:14px"><?php echo $rows['company_name']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['mobile']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['email']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['service_name']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $rows['invoice_date']; ?></b></td>
            <td>
             <b style="font-size:14px"><?php echo $rows['add_by']; ?></b></td>
            <td>
            <a class="" href="invoice.php?pid=<?php echo $rows['id'];?>" target="_blank"><i class="fa fa-prin" title="Print Invoice"><img src="https://toppng.com/uploads/preview/icon-printer02-black-icon-print-data-11553457644zutfcky9ex.png" style="width:30px;float:left"></i></a>
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
<script>
function Export()
{
var conf = confirm("Export Leads to CSV?");
if(conf == true)
{
    window.open("leadexport.php", '_blank');
}
}
</script>
<?php include('inc/footer.php'); ?>


