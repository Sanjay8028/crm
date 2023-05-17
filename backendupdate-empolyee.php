<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');
$ff='001';




session_start();




echo $ff+'1';
if(isset($_POST['submit']))
{
            $qu="Update tblbackend set name='".addslashes($_POST['name'])."',mobile='".addslashes($_POST['mobile'])."',pfno='".$_POST['pfno']."',esino='".$_POST['esino']."',dob='".$_POST['dob']."',
            joiningdate='".$_POST['joiningdate']."',email='".addslashes($_POST['email'])."',address='".addslashes($_POST['address'])."',adharcard_no='".addslashes($_POST['adharcard_no'])."',
            pancard_no='".addslashes($_POST['pancard_no'])."',salary='".addslashes($_POST['salary'])."',bank_account_holder='".addslashes($_POST['bank_account_holder'])."',
            bank_account_no='".addslashes($_POST['bank_account_no'])."',bank_ifsc='".addslashes($_POST['bank_ifsc'])."',bank_name='".addslashes($_POST['bank_name'])."' where id='".$_GET['id']."'";
            $rs=$db->query($qu);
            $error="Update Successfully !";
}

    $qus="select *from tblusers where id='".$_GET['id']."'";
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
<header class="panel_header"><h2 class="title float-left">Add / Update Employee</h2></header>
<div class="content-body">

<form action="" method="POST">
    <div class="row">
    <p style="text-align: center;color:green;"><?php echo $error; ?></p>
       
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Employee ID</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="username" value="<?php echo 'WI-'.$rowq['employee_id']; ?>" class="form-control" required="" readonly>
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Employee Name</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="name" value="<?php echo $rowq['name']; ?>" class="form-control" required="" placeholder="Enter Name">
            </div>
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Employee Mobile</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="mobile" value="<?php echo $rowq['mobile']; ?>" class="form-control" required="" placeholder="Enter Phone No">
            </div>
        </div>

        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Employee Email</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="email" name="email" value="<?php echo $rowq['email']; ?>" class="form-control" required="" placeholder="Enter Email">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Address</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="address" value="<?php echo $rowq['address']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Aadhar Card Number</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="adharcard_no" value="<?php echo $rowq['adharcard_no']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Pan Card Number</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="pancard_no" value="<?php echo $rowq['pancard_no']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Date Of Birth</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="date" name="dob" value="<?php echo $rowq['dob']; ?>" class="form-control" required="">
            </div>
        </div>
        
                <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">PF Account No</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="pfno" value="<?php echo $rowq['pfno']; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">ESI Number</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="esino" value="<?php echo $rowq['esino']; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Date of Joining</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="date" name="joiningdate" value="<?php echo $rowq['joiningdate']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Salary</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="salary" value="<?php echo $rowq['salary']; ?>" class="form-control" required="">
            </div>
        </div>
<div class="form-group col-12 col-md-12 col-lg-12">
    <h2>Account Details</h2>
</div>
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Bank Account Holder</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="bank_account_holder" value="<?php echo $rowq['bank_account_holder']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Bank Account Number</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="bank_account_no" value="<?php echo $rowq['bank_account_no']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">IFSC</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="bank_ifsc" value="<?php echo $rowq['bank_ifsc']; ?>" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Bank Name</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="bank_name" value="<?php echo $rowq['bank_name']; ?>" class="form-control" required="">
            </div>
        </div>


    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
            <button type="button" class="btn">Cancel</button>
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


