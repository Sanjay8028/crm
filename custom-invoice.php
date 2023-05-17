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


$quss="select *from tblinvoice2 ORDER BY id DESC LIMIT 1";
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
    $amount = $_POST['amount'] ;

    //$gst = $_POST['amount']*$_POST['gst']/100;
    //$amount = $_POST['amount'] - $gst;
    $subtotal = $amount + 0;

    $qu="Insert Into tblinvoice2 (uid,invoice_no,service_name,amount,gst,gst_amount,subtotal,invoice_date,invoice_time,gst_no,state,company_name,mobile,email,address) 
    Values('".$_SESSION['uid']."','".addslashes($_POST['invoice_no'])."','".addslashes($_POST['service'])."','".$amount."',
    '".addslashes($_POST['gst'])."','".$gst."','".$subtotal."','".date('d-m-Y')."','".date('h:i:s')."','".$_POST['gst_no']."','".$_POST['state']."','".$_POST['company_name']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['address']."')";
    $rs=$db->query($qu);
    echo "<script> alert('Hello! I am an alert box!'); </script>";
      echo "<script>window.location='dashboard.php'</script>";
    $error="Add Successfully !";
}

$inid=$_GET['id'];
     $queryuey ="SELECT *FROM tblleads where id='$inid'";
       $rqsss = $db->query( $queryuey);
    $rowqqq=mysqli_fetch_array( $rqsss,MYSQLI_ASSOC);

?>
<!-- START CONTENT -->

<section id="main-content" class=" ">
  <section class="wrapper main-wrapper row" style=''>
    <div class="col-12">
      <section class="box ">
        <header class="panel_header">
          <h2 class="title float-left btn btn-danger">Generate Payment Receipt
</h2>
          <div class="actions panel_actions float-right"> 
              <a class="box_toggle fa fa-chevron-down"></a> 
              <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> 
              <a class="box_close fa fa-times"></a> 
          </div>
        </header>
        <div class="content-body" style="background:url('https://media.istockphoto.com/photos/blue-background-picture-id157571423?k=20&m=157571423&s=612x612&w=0&h=GxSD_uRBNlBtsvXo54kGstPong-zzqKR545fF1Y5Mws=');background-repeat:no-repeat;background-size:cover">
          <form action="" method="POST">
            <div class="row">
              <div class="form-group col-12 col-md-12 col-lg-12">
                <p style="text-align: center;color:green;"><?php echo $error; ?></p>
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-12 col-md-3 col-lg-3">
                <label class="form-label" style="color:#03A9F4;font-size:16px;">Payment Receipt No.</label>
                <span class="desc"></span>
                <div class="controls">
                  <input type="text" name="invoice_no" value="<?php echo $sum; ?>" class="form-control" required="" readonly>
                </div>
              </div>
              
              <div class="form-group col-12 col-md-3 col-lg-3">
                <label class="form-label" style="color:#03A9F4;font-size:16px;">Company Name</label>
                <span class="desc"></span>
                <div class="controls">
                  <input type="text" name="company_name" value="<?php echo $rowqqq['company_name']; ?>" class="form-control" required="">
                </div>
              </div>
              
              <div class="form-group col-12 col-md-3 col-lg-3">
                <label class="form-label" style="color:#03A9F4;font-size:16px;">Mobile</label>
                <span class="desc"></span>
                <div class="controls">
                  <input type="text" name="mobile" value="<?php echo $rowqqq['mobile']; ?>" class="form-control" required="" >
                </div>
              </div>
              
              <div class="form-group col-12 col-md-3 col-lg-3">
                <label class="form-label" style="color:#03A9F4;font-size:16px;">Email</label>
                <span class="desc"></span>
                <div class="controls">
                  <input type="email" name="email" value="<?php echo $rowqqq['email']; ?>" class="form-control" required="">
                </div>
              </div>
              
              <div class="form-group col-12 col-md-6 col-lg-6">
                <label class="form-label" style="color:#03A9F4;font-size:16px;">Address</label>
                <span class="desc"></span>
                <div class="controls">
                  <input type="text" name="address" value="<?php echo $rowqqq['address']; ?>" class="form-control" required="">
                </div>
              </div>
              
              
            
              
              <div class="form-group col-12 col-md-6 col-lg-6">
                <label class="form-label" style="color:#03A9F4;font-size:16px;">Payment Details</label>
                <span class="desc"></span>
                <div class="controls">
                  <input type="text" name="service" class="form-control" required="" required="">
                </div>
              </div>
              
              
              
              <div class="form-group col-12 ">
                <label class="form-label" style="color:#03A9F4;font-size:16px;">Received Amount </label>
                <span class="desc"></span>
                <div class="controls">
                  <input type="text" name="amount" class="form-control" >
                </div>
              </div>
              
              <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
                <div class="text-left">
                  <button type="submit" class="btn btn-success" name="submit">CREATE INVOICE</button>
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
