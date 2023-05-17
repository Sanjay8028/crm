<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
	$qu="Insert Into tblbirthday_wish (uid,vid,message,reg_date) 
	Values('".$_SESSION['uid']."','".$_GET['vid']."','".addslashes($_POST['message'])."','".date('Y-d-m')."')";
	$rs=$db->query($qu);
	echo "<script>alert('Message has been successfully'); window.location.assign('dashboard.php');</script>";
}
    $qus="select *from tblusers where id='".$_GET['vid']."'";
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
<header class="panel_header"><h2 class="title float-left">Wishes Birth Day Message For <?php echo $rowq['name']; ?></h2></header>
<div class="content-body">

<form name="add" action="" method="POST">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>

    <div class="row">

       
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Birth Day Wishes Message</label>
            <span class="desc"></span>
            <div class="controls">
                <textarea type="text" name="message" class="form-control" rows="5" required=""></textarea>
            </div>
        </div>


    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">

            <button type="submit" class="btn btn-primary" name="submit">Sent Message</button>
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


