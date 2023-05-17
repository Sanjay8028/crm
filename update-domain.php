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
        $qu="Update domain set 
        
        
        dname='".addslashes($_POST['udname'])."',cname='".addslashes($_POST['ucname'])."',
       	status='".addslashes($_POST['recharge_amount'])."',status='".$_POST['ustatus']."',plan='".$_POST['uplan']."',bdate='".$_POST['ubdate']."',edate='".$_POST['uedate']."'
        
        
        where id='".$_GET['id']."'";
        $rs=$db->query($qu);
        $error="Update Successfully !";
    }
}
    $qus="select *from domain where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
?>
<!-- START CONTENT -->

<section id="main-content" class=" ">
  <section class="wrapper main-wrapper" style=''>
    <div class="col-12">
      <section class="box ">
      <header class="panel_header">
        <h2 class="title float-left btn btn-danger" >Update Domain</h2>
        <div class="actions panel_actions float-right"> 
            <a class="box_toggle fa fa-chevron-down"></a> 
            <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> 
            <a class="box_close fa fa-times"></a> 
        </div>
      </header>
      <div class="content-body">
     <form action="" method="POST">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>

    <div class="row">

       
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Domain Name</label>
           
            <div class="control">
                <input type="text" name="udname" value="<?php echo $rowq['dname']; ?>" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Company Name</label>
           
            <div class="control">
                <input type="text" name="ucname" value="<?php echo $rowq['cname']; ?>" class="form-control" required="" >
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Status</label>
           
            <div class="control">
                <input type="text" name="ustatus" value="<?php echo $rowq['status']; ?>" class="form-control" required="" >
            </div>
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Plan</label>
           
            <div class="control">
                <input type="text" name="uplan" value="<?php echo $rowq['plan']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Booking Date</label>
            
            <div class="control">
                <input type="date" name="ubdate" value="<?php echo $rowq['bdate']; ?>" class="form-control" required="">
            </div>
        </div>
        
        
         <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Expires Date</label>
            
            <div class="control">
                <input type="date" name="uedate" value="<?php echo $rowq['edate']; ?>" class="form-control" required="">
            </div>
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
  </section>
</section>
<?php include('inc/footer.php'); ?>
