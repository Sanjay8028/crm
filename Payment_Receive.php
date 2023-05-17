<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
    if($_GET['id']=='')
    {
        $qu="select *from tblpay where bank_name='".$_POST['bank_name']."' and company='".$_POST['company']."'";
        $rq = $db->query($qu);
        $count=mysqli_num_rows($rq);
        //$rowq=mysqli_fetch_array($rq,MYSQLI_ASSOC);
        if($count==0)
        {

            $qu="Insert Into tblpay (bank_name,amount,company,mode,date) 
            Values('".$_POST['bank_name']."',
            '".addslashes($_POST['amount'])."',
            '".$_POST['company']."',
            '".$_POST['mode']."',
            '".$_POST['date']."'
            )";
            $rs=$db->query($qu);
            $error="Add Successfully !";
        }
        else
        {
           $error="Already Exits Client !"; 
        }
    }
    else
    {
            $qu="Update tblpay set product='".addslashes($_POST['amount'])."',
            bank_name='".addslashes($_POST['bank_name'])."',
            company='".addslashes($_POST['company'])."',
            mode='".$_POST['mode']."' ,
            date='".$_POST['date']."' 
            
            where id='".$_GET['id']."'";
            $rs=$db->query($qu);
            $error="Update Successfully !";
    }
}

    $qus="select *from tblpay where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper row" style=''>
<div class="clearfix"></div>
<!-- MAIN CONTENT AREA STARTS -->

<div class="col-12">
<section class="box ">
<header class="panel_header"><h2 class="title float-left btn btn-danger">Add Payment</h2></header>
<div class="content-body">

<form action="" method="POST">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>

    <div class="row">

       
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Bank</label>
            <span class="desc"></span>
           
                <input type="text" name="bank_name" value="<?php echo $rowq['bank_name']; ?>" class="form-control" required="">
            
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">company</label>
            
          
                <input type="text" name="company" value="<?php echo $rowq['company']; ?>" class="form-control" required="" >
          
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Amount</label>
            
          
                <textarea type="textarea" name="amount" class="form-control" required=""><?php echo $rowq['amount']; ?></textarea>
          
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">mode</label>
           
           
                <input type="text" name="mode" value="<?php echo $rowq['mode']; ?>" class="form-control" required="">
            
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Date</label>
           
           
                <input type="date" name="date" value="<?php echo $rowq['date']; ?>" class="form-control" required="">
          
        </div>


    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <button type="button" class="btn btn-danger">Cancel</button>
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


