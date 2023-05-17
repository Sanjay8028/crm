<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
    if($_GET['id']=='')
    {
        $qu="select *from tblusers where id='".$_POST['emp']."'";
        $rq = $db->query($qu);
        $rowss=mysqli_fetch_array($rq,MYSQLI_ASSOC);
		
		$gg = $_POST['basic_amt'] + $_POST['hra_amt'] + $_POST['conveyance_amt'] + $_POST['variable_amt'];
		$gross = $gg - $_POST['deduction_amt'];
            $quss="Insert Into tblapr (emp_id,emp_name,salary_month,salary_year,working_days,basic_salary,hra_amt,
			conveyance_amt,variable_amt,gross_salary,regdate,deduction_amt) 
            Values('".$rowss['employee_id']."','".$rowss['name']."','".addslashes($_POST['salary_month'])."','".addslashes($_POST['year'])."',
            '".$_POST['days']."','".$_POST['basic_amt']."','".$_POST['hra_amt']."','".$_POST['conveyance_amt']."',
            '".$_POST['variable_amt']."','".$gross."','".date('d-m-Y')."','".$_POST['deduction_amt']."')";
            $rs=$db->query($quss);
            $error="Add Successfully !";
    }
    else
    {
            $qu="Update tblusers set name='".addslashes($_POST['name'])."',mobile='".addslashes($_POST['mobile'])."',
            email='".addslashes($_POST['email'])."',user_type='".$_POST['usertype']."',username='".$_POST['username']."',
            password='".$_POST['password']."',add_permission='".$_POST['addper']."',edit_permission='".$_POST['editper']."',delete_permission='".$_POST['deleteper']."' where id='".$_GET['id']."'";
            //$rs=$db->query($qu);
            $error="Update Successfully !";
    }
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
<header class="panel_header">
    <h2 class="title float-left">Resignation Aproval</h2>
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
    		<div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Select Employee</label>
            <span class="desc"></span>
            <div class="controls">
                <select class="form-control" name="emp" required>
				<option value="">--Select Employee--</option>
				<?php
				$queryuss ="SELECT *FROM tblusers";
				$resultss = $db->query($queryuss);
				while($rows=mysqli_fetch_array($resultss))
				{
				?>
				<option value="<?php echo $rows['id']; ?>" <?php if($rows['id']==$_POST['emp']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?> ( <?php echo $rows['user_type']; ?> )</option>
				<?php
				}
				?>
				</select>
            </div>
        </div>
        <div class="form-group col-12 col-md-3 col-lg-3">
		<label class="form-label">Select Type</label>
        <span class="desc"></span>
		<select class="form-control" name="salary_month" required>
		<option value="">--Select --</option>
		    <option value='Urgent'>Urgent</option>
			<option value='15 days'>15 days</option>
			<option value='30 Days'>30 Days</option>
			
		</select>
        </div>
		
		
		
		

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label">Comment</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="days" value="<?php echo $rowq['days']; ?>" class="form-control" required="">
            </div>
        </div>

       

    </div>
	    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
            <button type="button" class="btn">Cancel</button>
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

<script>
var start = 2005;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option value="+ year +">"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;
</script>