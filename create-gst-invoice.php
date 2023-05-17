<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

$queryu ="SELECT *FROM tblleads where id='".$_GET['pid']."'";
$result = $db->query($queryu);
$rowq=mysqli_fetch_array($result);

$queryus ="SELECT *FROM tblusers where username='".$rowq['assign_to']."'";
$results = $db->query($queryus);
$rowqs=mysqli_fetch_array($results);


$quss="select *from tblgstinvoice ORDER BY id DESC LIMIT 1";
$rqss = $db->query($quss);
$countss=mysqli_num_rows($rqss);
$rowqss=mysqli_fetch_array($rqss,MYSQLI_ASSOC);
if($countss == 0)
{
    $sum ='1001';  
}
else
{
    $sum=$rowqss['invoice_no']+1;
}   

if(isset($_POST['submit']))
{
    $gst = round($_POST['amount'] - ($_POST['amount'] * (100 / (100 + $_POST['gst'])))); 
    $amount = $_POST['amount'] - $gst;

    //$gst = $_POST['amount']*$_POST['gst']/100;
    //$amount = $_POST['amount'] - $gst;
    $subtotal = $amount + $gst;

    $qu="Insert Into tblgstinvoice (uid,invoice_no,service_name,amount,gst,gst_amount,subtotal,invoice_date,invoice_time,gst_no,state,company_name,mobile,email,address) 
    Values('','".addslashes($_POST['invoice_no'])."','".addslashes($_POST['service'])."','".$amount."',
    '".addslashes($_POST['gst'])."','".$gst."','".$subtotal."','".$_POST['invoice_date']."','".date('h:i:s')."','".$_POST['gst_no']."','".$_POST['state']."','".$_POST['company_name']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['address']."')";
    $rs=$db->query($qu);
    $error="Add Successfully !";
}

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper row" style=''>
<div class="clearfix"></div>
<!-- MAIN CONTENT AREA STARTS -->

<div class="col-12">
<section class="box ">
<header class="panel_header"><h2 class="title float-left">Create GST Invoice</h2></header>
<div class="content-body">

<form action="" method="POST">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <p style="text-align: center;color:green;"><?php echo $error; ?></p>
        </div>
    </div>
        
     <div class="row">      
     	<div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Invoice No.</label>
           <input type="text" name="invoice_no" class="form-control" required="">
        </div>
        
        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Invoice Date</label>
           <input type="date" name="invoice_date" class="form-control" required="">
        </div>   
        
        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Company Name</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="company_name" value="<?php echo $rowq['company_name']; ?>" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Mobile</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="mobile" value="<?php echo $rowq['mobile']; ?>" class="form-control" required="" >
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Email</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="email" name="email" value="<?php echo $rowq['email']; ?>" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Address</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="address" value="<?php echo $rowq['address']; ?>" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">GST No.</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="gst_no" value="<?php echo $rowq['gst_no']; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Place of Supply</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="state" value="<?php echo $rowq['state']; ?>" class="form-control" required="">
            </div>
        </div>


        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Service Name</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="service" class="form-control" required="" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">GST(%)</label>
            <span class="desc"></span>
            <div class="controls">
             
                <input type="text" readonly name="gst" value="18" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Amount Without GST</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="amount" class="form-control" required="">
            </div>
        </div>


    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-primary" name="submit">CREATE GST INVOICE</button>
           
        </div>
    </div>

    </div>
    </form>


</div>
</section>
</div>


                    <!-- MAIN CONTENT AREA ENDS -->
                </section>
            </section>
            <!-- END CONTENT -->

<?php include('inc/footer.php'); ?>


