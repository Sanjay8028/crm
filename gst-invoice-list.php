<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['search']))
{

    $queryus ="SELECT *FROM tblgstinvoice where invoice_date BETWEEN '".date("d-m-Y", strtotime($_POST['fdate']))."' and '".date("d-m-Y", strtotime($_POST['tdate']))."' ORDER BY id DESC";
    $results = $db->query($queryus);
}
else
{
    $queryus ="SELECT *FROM tblgstinvoice ORDER BY id DESC";
    $results = $db->query($queryus);
}


if(isset($_POST['delete'])) 
{
$count  = $_POST['checkbox'];
for($i=0;$i<count($count);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  $sql = "DELETE FROM tblgstinvoice WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
} 



if(isset($_POST['filer'])) 
{
    $ques ="SELECT *FROM tblgstinvoice where company_name='".$_POST['cn']."' ORDER BY id desc";
    $results = $db->query($ques);
}



$sum;


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
    <h2 class="title float-left btn btn-danger">GST Invoice List</h2>
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
   <label class="form-label btn btn-info form-control">First Date</label>    
<input type="date" name="fdate" value="<?php echo $_POST['fdate']; ?>" class="form-control">
</div>

<div class="col-lg-4 col-md-4 col-12">
  <label class="form-label btn btn-info form-control">To Date</label>  
<input type="date" name="tdate" value="<?php echo $_POST['tdate']; ?>" class="form-control">
</div>

<div class="col-lg-2 col-md-2 col-12">
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="search">Search</button>
</div>

<div class="col-lg-2 col-md-2 col-12">
<a href="create-gst-invoice.php" class="btn btn-success btn-mt-20 btn-width-100">Create GST Invoice</a>
</div>
</div>
</br>

<div class="row">
<div class="col-lg-2 col-md-2 col-12">
<button type="submit" class="btn btn-danger" name="delete" onSubmit="return validate();">Delete</button>
</div>






<div class="col-lg-4 col-md-4 col-12">
<label class="form-label btn btn-info form-control"><b>Company</b></label>
<select class="form-control" name="cn">
<option value="">--Select Company name--</option>
<?php
$querys ="SELECT DISTINCT company_name FROM tblgstinvoice ";
$reslts = $db->query($querys);
while($rws=mysqli_fetch_array($reslts))
{
?>
<option value="<?php echo $rws['company_name']; ?>" <?php if($rws['company_name']==$_POST['cn']){ echo 'selected=selected';} ?>><?php echo $rws['company_name']; ?></option>
<?php
}
?>
</select>
</div>

<div class="col-lg-1 col-md-2 col-12">
<!--<button type="submit" class="btn btn-primary" name="ass" onSubmit="return validate();">Assign</button>-->
<button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="filer" >Filter</button>
</div>


</div>
</br>




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
             <th>Amt.</th>
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
            
            
            
            $sum+=$rows['subtotal'];

        ?>
       <tr id="r-<?php echo $rows['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>" class="checkBoxClass"></td>
            <td class="clr-blue"><?php echo $rows['invoice_no']; ?></td>
            <td><?php echo $rows['company_name']; ?></td>
            <td><?php echo $rows['mobile']; ?></td>
            <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['service_name']; ?></td>
            <td><?php echo $rows['invoice_date']; ?></td>
             <td><?php echo $rows['subtotal']; ?></td>
            <td>
            <a class="" href="gst-invoice.php?pid=<?php echo $rows['id'];?>" target="_blank"><i class="fa fa-print" title="Print"></i></a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
    
</table>

<label style="font-size:18px">Subtotal=Rs. <?php setlocale(LC_MONETARY,"en_IN"); echo money_format('%!i',$sum); ?></label>
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


