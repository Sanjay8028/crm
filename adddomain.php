<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
   
       

            $qu="Insert Into domain (dname,cname,status,plan,bdate,edate) 
            Values('".$_POST['dname']."',
            '".addslashes($_POST['cname'])."',
            '".$_POST['status']."',
            '".$_POST['plan']."',
            '".$_POST['bdate']."',
            '".$_POST['edate']."'
            )";
            $rs=$db->query($qu);
            $error="Add Successfully !";
       
       
    }
    


 
?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper row" style=''>
<div class="clearfix"></div>
<!-- MAIN CONTENT AREA STARTS -->

<div class="col-12">
<section class="box ">
<header class="panel_header"><h2 class="title float-left btn btn-danger">Add Domain</h2></header>
<div class="content-body">

<form action="" method="POST">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>

    <div class="row">

       
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Domain Name</label>
           
            <div class="control">
                <input type="text" name="dname" value=" " class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Company Name</label>
           
            <div class="control">
                <input type="text" name="cname" value=" " class="form-control" required="" >
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Status</label>
           
            <div class="control">
                <input type="text" name="status" value=" " class="form-control" required="" >
            </div>
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Plan</label>
           
            <div class="control">
                <input type="text" name="plan" value=" " class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Booking Date</label>
            
            <div class="control">
                <input type="date" name="bdate" value=" " class="form-control" required="">
            </div>
        </div>
        
        
         <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Expires Date</label>
            
            <div class="control">
                <input type="date" name="edate" value="" class="form-control" required="">
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


                    <!-- MAIN CONTENT AREA ENDS -->
                </section>
            </section>
            <!-- END CONTENT -->

<?php include('inc/footer.php'); ?>


