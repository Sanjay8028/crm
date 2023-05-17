<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{

    $qu="Update tbladmin set password='".$_POST['password']."' where username='admin'";
    $rs=$db->query($qu);
    $error="Update Successfully !";

}

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper row" style=''>
<div class="clearfix"></div>
<!-- MAIN CONTENT AREA STARTS -->

<div class="col-12">
<section class="box ">
<header class="panel_header"><h2 class="title float-left">Change Password</h2></header>
<div class="content-body">

<form action="" method="POST">
    <div class="row">
    <p style="text-align: center;color:green;"><?php echo $error; ?></p>
       
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Enter New Password</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="password" class="form-control" required="" placeholder="Enter New Password">
            </div>
        </div>


    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-primary" name="submit">Change Password</button>
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


