<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
    if($_GET['id']=='')
    {

    }
    else
    {

       
        $qu="Update tblrequest_recharge set 
        
        
        qty='".addslashes($_POST['qty'])."',remark='".addslashes($_POST['remark'])."',
        recharge_amount='".addslashes($_POST['recharge_amount'])."',status='".$_POST['status']."'
        
        
        where id='".$_GET['id']."'";
        
        $rs=$db->query($qu);
        // $error="Update Successfully !";
      
       echo "<script>
window.open('request-mobile.php', );
</script>";
        
    }
}
    $qus="select *from tblrequest_recharge where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
?>
<!-- START CONTENT -->

<section id="main-content" class=" ">
  <section class="wrapper main-wrapper" style=''>
    <div class="col-12">
      <section class="box ">
      <header class="panel_header">
        <h2 class="title float-left">Update  Recharge Status</h2>
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
                      <label>Mobile Number</label>
                      <input name="qty" type="text" value="<?php echo $rowq['qty']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label>Sim(Brand)</label>
                      <input name="remark" type="text"
                      value="<?php echo $rowq['remark']; ?>" class="form-control" required="required">
                    </div>
                  </div>
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label>Recharge amount</label>
                      <input name="recharge_amount" value="<?php echo $rowq['recharge_amount']; ?>" type="text" class="form-control" required="required">
                    </div>
                  </div>
                  
                   <div class="col-lg-3 col-md-5 col-12">
                    <div class="form-group">
                      <label>Recharge Status</label>
                      <input name="status" type="text" value="<?php echo $rowq['status']; ?>" class="form-control" required="required">
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
