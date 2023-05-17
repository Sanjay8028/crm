<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');
$idd=$_GET['id'];
extract($_POST);
if(isset($submit))
{
    if($_GET['id']=='')
    {

    }
    else
    {

     $qu="Update tbActivation set Month='$month',Executive='$executive',
        NewCounters='$newcounter',Upgrade='$upgrade',CompanyName='$cname',Branch='$branch',gstno='$gstno',gstpaid='$gstpaid',mail='$mail',cnamee='$cnamee',mob='$mob',cservice='$cservice',uservice='$uservice',adate='$adate',edate='$edate',tenure='$tenure',samt='$samt',ramt='$ramt',bal='$bal',mop='$mop',recdate='$recdate',astatus='$astatus',web='$web' where sno= $idd";
        
      if($db->query($qu))  
      {
      $error="Update Successfully !";
      }
     else
     {
        $error= "$db->error";
     }
//       echo "<script>
// window.open('request-mobile.php', );
// </script>";
        
    }
}
    $qus="select *from tbActivation where sno='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
?>
<!-- START CONTENT -->

<section id="main-content" class=" ">
  <section class="wrapper main-wrapper" style=''>
    <div class="col-12">
      <section class="box ">
      <header class="panel_header">
        <h2 class="title float-left">Update Activation 
        <?php 
        if(isset($error))
        {
        ?>
        <label><?php echo $error;?> </label>
        <?php
        }
        ?>
        </h2>
        <div class="actions panel_actions float-right"> 
            <a class="box_toggle fa fa-chevron-down"></a> 
            <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> 
            <a class="box_close fa fa-times"></a> 
        </div>
      </header>
      <div class="content-body">
      <form action="" name="updatehistory" method="POST">
                <p style="text-align: center;color:green;"><?php echo $error; ?></p>
                <div class="row">
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Month</label>
                      <input name="month" type="text" value="<?php echo $rowq['Month']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Executive</label>
                      <input name="executive" type="text"
                      value="<?php echo $rowq['Executive']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                       <label class="form-label btn btn-info form-control">New Counters</label>
                      <input name="newcounter" value="<?php echo $rowq['NewCounters']; ?>" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                     <label class="form-label btn btn-info form-control">Upgrade</label>
                      <input name="upgrade" type="text" value="<?php echo $rowq['Upgrade']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                     <label class="form-label btn btn-info form-control">Company Name</label>
                      <input name="cname" type="text" value="<?php echo $rowq['CompanyName']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                     <label class="form-label btn btn-info form-control">Branch</label>
                      <input name="branch" type="text" value="<?php echo $rowq['Branch']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                     <label class="form-label btn btn-info form-control">Gst No</label>
                      <input name="gstno" type="text" value="<?php echo $rowq['gstno']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Gst Paid</label>
                      <input name="gstpaid" type="text" value="<?php echo $rowq['gstpaid']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                     <label class="form-label btn btn-info form-control">Mail Id</label>
                      <input name="mail" type="text" value="<?php echo $rowq['mail']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                     <label class="form-label btn btn-info form-control">Client Name</label>
                      <input name="cnamee" type="text" value="<?php echo $rowq['cnamee']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                     <label class="form-label btn btn-info form-control">Mobile</label>
                      <input name="mob" type="text" value="<?php echo $rowq['mob']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Current Service</label>
                      <input name="cservice" type="text" value="<?php echo $rowq['cservice']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                 
                 <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Upgrade Service</label>
                      <input name="uservice" type="text" value="<?php echo $rowq['uservice']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Activation Date</label>
                      <input name="adate" type="text" value="<?php echo $rowq['adate']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Expiry Date</label>
                      <input name="edate" type="text" value="<?php echo $rowq['edate']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                   
                   
                   
                    <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                        <label class="form-label btn btn-info form-control">Tenure</label>
                      <input name="tenure" type="text" value="<?php echo $rowq['tenure']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  
                  <!-- <div class="col-lg-3 col-md-5 col-12">-->
                  <!--  <div class="form-group">-->
                  <!--      <label class="form-label btn btn-info form-control">Tenure</label>-->
                  <!--    <input name="tenu" type="text" value="<php echo $rowq['tenure']; ?>" class="form-control" required="required">-->
                  <!--  </div>-->
                  <!--</div>-->
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                        <label class="form-label btn btn-info form-control">Settlement Amt</label>
                      <input name="samt" type="text" value="<?php echo $rowq['samt']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                        <label class="form-label btn btn-info form-control">Received Amount</label>
                      <input name="ramt" type="text" value="<?php echo $rowq['ramt']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                        <label class="form-label btn btn-info form-control">Balance</label>
                      <input name="bal" type="text" value="<?php echo $rowq['bal']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                         <label class="form-label btn btn-info form-control">M.O.P</label>
                      <input name="mop" type="text" value="<?php echo $rowq['mop']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                          <label class="form-label btn btn-info form-control">Received date</label>
                      <input name="recdate" type="text" value="<?php echo $rowq['recdate']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                           <label class="form-label btn btn-info form-control">Activation Status</label>
            
                      <input name="astatus" type="text" value="<?php echo $rowq['astatus']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                          <label class="form-label btn btn-info form-control">Website</label>
            
                      <input name="web" type="text" value="<?php echo $rowq['web']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                   
                   
                  
                 
                  
                  
                  
                  
                  
                  <div class="col-lg-3 col-md-2 col-12">
                    <div class="text-left">
                      <button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="submit">Submit</button>
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
