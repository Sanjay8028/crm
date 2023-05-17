<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
    if($_GET['id']=='')
    {
        $qu="select *from tblleads where mobile='".$_POST['mobile']."' or email='".$_POST['email']."'";
        $rq = $db->query($qu);
        $count=mysqli_num_rows($rq);
        $rowq=mysqli_fetch_array($rq,MYSQLI_ASSOC);
        if($count==0)
        {
            $qu="Insert Into tblleads (company_name,email,client_name,mobile,address,product,regdate) 
            Values('".addslashes($_POST['company_name'])."','".addslashes($_POST['email'])."',
            '".addslashes($_POST['client_name'])."','".$_POST['mobile']."','".$_POST['address']."',
            '".$_POST['product']."','".date('d-m-Y')."')";
            $rs=$db->query($qu);
            $error="Add Successfully !";
        }
        else
        {
            $error="Parties already exits !";
        }
    }
    else
    {
        $qu="Update tblleads set company_name='".addslashes($_POST['company_name'])."',email='".addslashes($_POST['email'])."',
        client_name='".addslashes($_POST['client_name'])."',mobile='".$_POST['mobile']."',address='".$_POST['address']."',
        product='".$_POST['product']."' where id='".$_GET['id']."'";
        $rs=$db->query($qu);
        $error="Update Successfully !";
    }
}
    $qus="select *from tblleads where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Add Parties</h2>
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
            <label class="form-label btn btn-info form-control">Company Name</label>
           
           
                <input type="text" name="company_name" value="<?php echo $rowq['company_name']; ?>" class="form-control" required="">
           
        </div>
        </div>
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Mobile</label>
            
            
                <input type="text" name="mobile" value="<?php echo $rowq['mobile']; ?>" class="form-control" required="">
           
        </div>
        </div>
        
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Email</label>
            
            
                <input type="email" name="email" value="<?php echo $rowq['email']; ?>" class="form-control" required="">
            
        </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Client Name</label>
            
           
                <input type="text" name="client_name" value="<?php echo $rowq['client_name']; ?>" class="form-control" required="">
            
        </div>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Products</label>
            
           
                <input type="text" name="product" value="<?php echo $rowq['product']; ?>" class="form-control" required="">
         
        </div>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label class="form-label btn btn-info form-control">Address</label>
            
            
                <input type="text" name="address" value="<?php echo $rowq['address']; ?>" class="form-control" required="">
           
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


