<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

$username = $_SESSION['username'];
$rgdate = date("d-m-Y");

$error='';
extract($_POST);
if(isset($ksubmit)) 
{
 
if ($resu=mysqli_query($db,"insert into keyclient (cname,mobile,websitelink,ads,smo,banner,remark) values('$kcname','$kmob','$klink','$kads','$smo','$bann','$rem') "))
{
 $error="your request has been complete";
}

else
    {
       $error='Your request has been not completed !'; 
    }
 
   
    }
    
        



$query="select *from tblrequest_recharge ORDER BY id desc";
$result = $db->query($query);
?>
<!-- START CONTENT -->

<section id="main-content" class=" ">
  <section class="wrapper main-wrapper row" style=''>
    <div class="col-12">
      <section class="box ">
        <header class="panel_header">
          <h2 class="title float-left btn btn-danger">Add Key Client</h2>
          <div class="actions panel_actions float-right"> 
              <a class="box_toggle fa fa-chevron-down"></a> 
              <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> 
              <a class="box_close fa fa-times"></a> 
          </div>
        </header>
        <div class="content-body">
          <div class="row">
            <div class="col-12">
              <form action="" name="updatehistory" method="POST">
                <p style="text-align: center;color:green;"><?php echo $error; ?></p>
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Client Name</label>
                      <input name="kcname" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Mobile Number</label>
                      <input name="kmob" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Website Link</label>
                      <input name="klink" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Ads Status</label>
                      <input name="kads" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">SMO Status</label>
                      <input name="smo" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Banner Status</label>
                      <input name="bann" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                       <label class="form-label btn btn-info form-control">Remarks</label>
  <textarea name="rem" rows="3" cols="25"></textarea>
                    </div>
                  </div>
                  
                  
                  <!-- <div class="col-lg-3 col-md-5 col-12">-->
                  <!--  <div class="form-group">-->
                  <!--    <label class="form-label btn btn-info form-control">Recharge amount</label>-->
                  <!--    <input name="recharge_amount" type="text" class="form-control" required="required">-->
                  <!--  </div>-->
                  <!--</div>-->
                  
                  <div class="col-lg-3 col-md-2 col-12">
                    <div class="text-left">
                      <button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="ksubmit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
              <hr/>
             
              
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
</section>
<?php include('inc/footer.php'); ?>
