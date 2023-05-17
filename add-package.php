<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
        $fn=$_FILES['pdf']['name'];
    $tmp=$_FILES['pdf']['tmp_name'];
        $fnn=rand().$fn;
        if(move_uploaded_file($tmp,"pdf/".$fnn))
        {







    if($_GET['id']=='')
    {
        $qu="select *from tblpackage where package_name='".$_POST['package_name']."'";
        $rq = $db->query($qu);
        $count=mysqli_num_rows($result);
        //$rowq=mysqli_fetch_array($rq,MYSQLI_ASSOC);
        if($count==0)
        {
            $qu="Insert Into tblpackage (package_name,package_amount,package_duration,pdf) 
            Values('".addslashes($_POST['package_name'])."','".addslashes($_POST['package_amount'])."',
            '".addslashes($_POST['package_duration'])."','".$fnn."')";
            $rs=$db->query($qu);
            $error="Add Successfully !";
        }
    }
    else
    {
        $qu="Update tblpackage set package_name='".addslashes($_POST['package_name'])."',
        package_amount='".addslashes($_POST['package_amount'])."',package_duration='".addslashes($_POST['package_duration'])."', pdf='".$fnn."'  where id='".$_GET['id']."'";
        $rs=$db->query($qu);
        $error="Update Successfully !";
    }
}
}
    $qus="select *from tblpackage where id='".$_GET['id']."'";
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
<header class="panel_header"><h2 class="title float-left btn btn-danger">Add Package</h2></header>
<div class="content-body">

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>
    </div>  
    
        <div class="form-group col-12 col-md-4 col-lg-3">
            <label class="form-label btn btn-info form-control">Package Name</label>
            
          
                <input type="text" name="package_name" value="<?php echo $rowq['package_name']; ?>" class="form-control" required="">
           
        </div>
        
        <div class="form-group col-12 col-md-4 col-lg-3">
            <label class="form-label btn btn-info form-control">Package Amount</label>
           
            
                <input type="text" name="package_amount" value="<?php echo $rowq['package_amount']; ?>" class="form-control" required="">
           
        </div>
        
        <div class="form-group col-12 col-md-4 col-lg-3">
            <label class="form-label btn btn-info form-control">Package Duration</label>
           
            
                <input type="text" name="package_duration" value="<?php echo $rowq['package_duration']; ?>" class="form-control" required="">
            
        </div>
        <div class="form-group col-12 col-md-4 col-lg-3">
            <label class="form-label btn btn-info form-control">Package pdf</label>
           
                    <input type="file" name="pdf" value="<?php echo $rowq['pdf']; ?>"   class="form-control"/>
               
            
        </div>

    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
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


