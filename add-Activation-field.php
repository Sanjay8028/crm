<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

extract($_POST);
if(isset($submit))
{
   
            $qu="Insert Into tbActivation (Month,Executive,NewCounters,Upgrade,CompanyName,Branch,gstno,gstpaid,mail,cnamee,mob,cservice,uservice,adate,edate,tenure,samt,ramt,bal,mop,recdate,astatus,web) 
            Values('$month','$executive','$ncount','$upgrade','$cname',
            '$branch','$gstno','$gstpaid','$mail','$cnamee','$mob','$cservice','$uservice','$adate','$edate','$tenure','$samt','$ramt','$bal','$mop','$recdate','$astatus','$web')";
            if($rs=$db->query($qu))
            {
            $error="Add Successfully !";
            }
        
        else
        {
            $error="not";
        }
}
    
  

  
?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Add Activation Field</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>

<div class="content-body">
<form action="" method="POST">
    <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
    <div class="col-12 col-md-12 col-lg-12">
    <p style="text-align: center;color:green;"><?php echo $error; ?></p>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Month</label>
           
           
                <input type="text" name="month" value="" class="form-control" required="">
           
        </div>
        </div>
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Executive</label>
            
            
                <input type="text" name="executive" value="" class="form-control" required="">
           
        </div>
        </div>
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">New Counters</label>
            
            
                <input type="text" name="ncount" value="" class="form-control" required="">
            
        </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Upgrade</label>
            
           
                <input type="text" name="upgrade" value="" class="form-control" required="">
            
        </div>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Company Name</label>
            
           
                <input type="text" name="cname" value="" class="form-control" required="">
         
        </div>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Branch</label>
            
            
                <input type="text" name="branch" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
      
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Gst No</label>
            
            
                <input type="text" name="gstno" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Gst Paid</label>
            
            
                <input type="text" name="gstpaid" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Mail Id</label>
            
            
                <input type="text" name="mail" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Client Name</label>
            
            
                <input type="text" name="cnamee" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Mobile</label>
            
            
                <input type="text" name="mob" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Current Service</label>
            
            
                <input type="text" name="cservice" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Upgrade Service</label>
            
            
                <input type="text" name="uservice" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Activation Date</label>
            
            
                <input type="date" name="adate" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Expiry Date</label>
            
            
                <input type="date" name="edate" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Tenure</label>
            
            
                <input type="text" name="tenure" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Settlement Amt</label>
            
            
                <input type="text" name="samt" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Received Amount</label>
            
            
                <input type="text" name="ramt" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Balance</label>
            
            
                <input type="text" name="bal" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">M.O.P</label>
            
            
                <input type="text" name="mop" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
         <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Received date</label>
            
            
                <input type="date" name="recdate" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Activation Status</label>
            
            
                <input type="text" name="astatus" value="" class="form-control" required="">
           
        </div>
        </div>
        
        
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Website</label>
            
            
                <input type="text" name="web" value="" class="form-control" required="">
           
        </div>
        </div>
        
     
        

        </div>
    </div>

    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </div>
    </div>
    <div class="col-12 col-md-3 col-lg-3">
    </div>
    </div>
    </div>
    </form>


</div>
</section>
</div>
</section>
</section>


<?php include('inc/footer.php'); ?>


