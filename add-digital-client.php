<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
    if($_GET['id']=='')
    {
        $qu="select *from tbldigitalmarketing_client where company_name='".$_POST['company_name']."' and mobile='".$_POST['mobile']."'";
        $rq = $db->query($qu);
        $count=mysqli_num_rows($rq);
        //$rowq=mysqli_fetch_array($rq,MYSQLI_ASSOC);
        if($count==0)
        {

            $qu="Insert Into tbldigitalmarketing_client (company_name,product,mobile,website_url) 
            Values('".$_POST['company_name']."','".addslashes($_POST['product'])."','".$_POST['mobile']."','".$_POST['website_url']."')";
            $rs=$db->query($qu);
            $error="Add Successfully !";
        }
        else
        {
           $error="Already Exits Client !"; 
        }
    }
    else
    {
            $qu="Update tbldigitalmarketing_client set product='".addslashes($_POST['product'])."',company_name='".addslashes($_POST['company_name'])."',mobile='".addslashes($_POST['mobile'])."',website_url='".$_POST['website_url']."' where id='".$_GET['id']."'";
            $rs=$db->query($qu);
            $error="Update Successfully !";
    }
}

    $qus="select *from tbldigitalmarketing_client where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Add Digital Marketing Client</h2>
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
            <label class="form-label btn btn-info form-control">Company Name</label>
           
            
                <input type="text" name="company_name" value="<?php echo $rowq['company_name']; ?>" class="form-control" required="">
            
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Mobile</label>
           
           
                <input type="text" name="mobile" value="<?php echo $rowq['mobile']; ?>" class="form-control" required="" >
           
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Product</label>
           
            
                <textarea type="textarea" name="product" class="form-control" required=""><?php echo $rowq['product']; ?></textarea>
            
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label btn btn-info form-control">Website Url</label>
            
           
                <input type="text" name="website_url" value="<?php echo $rowq['website_url']; ?>" class="form-control" required="">
          
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


