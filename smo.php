<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

$username = $_SESSION['username'];
$rgdate = date("d-m-Y");

$error='';
extract($_POST);
if(isset($clsubmit)) 
{
 
if ($resu=mysqli_query($db,"insert into smo (cname,clname,mobile,postday,date,notpost,facebook,insta) values('$ecname','$clname','$cmob','$smost','$da','$notpst','$fblink','$instalink') "))
{
 $error="your request has been complete";
}

else
    {
      $error='Your request has been not completed !'; 
    
    // $error= mysqli_error($db);
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
          <h2 class="title float-left btn btn-danger">Add SMO Report</h2>
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
                      <label class="form-label btn btn-info form-control">Company Name</label>
                      <input name="ecname" type="text" class="form-control" required="required">
                    </div>
                  </div>
                    
                    <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Client Name</label>
                      <input name="clname" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Mobile Number</label>
                      <input name="cmob" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                   <label class="form-label btn btn-info form-control">Post Day</label>
                     <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  value="Wednesday" name="smost">
  <label class="form-check-label">Wednesday</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  value="Saturday" name="smost">
  <label class="form-check-label">saturday</label>
</div>
                    </div>
                  </div>
                  
                  
                  <!--<div class="col-lg-3 col-md-5 col-12">-->
                  <!--  <div class="form-group">-->
                  <!--    <label class="form-label btn btn-info form-control">Saturday</label>-->
                  <!--    <input name="smost" type="radio" class="form-control" required="required">-->
                  <!--  </div>-->
                  <!--</div>-->
                  
                  
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Date </label>
                      <input name="da" type="date" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                    <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Status or (IF not Post) </label>
                      <input name="notpst" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Facebook Link</label>
                      <input name="fblink" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                  
                    <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label class="form-label btn btn-info form-control">Instagram Link</label>
                      <input name="instalink" type="text" class="form-control" required="required">
                    </div>
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
                      <button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="clsubmit">Submit</button>
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
