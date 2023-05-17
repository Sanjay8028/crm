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
            $quss="Insert Into tblsalaryslip (emp_id,emp_name,salary_month,salary_year,working_days,basic_salary,hra_amt,
			conveyance_amt,variable_amt,gross_salary,regdate,deduction_amt,	mobrecharge,fine,adv,tds) 
            Values('".$rowss['employee_id']."','".$rowss['name']."','".addslashes($_POST['salary_month'])."','".addslashes($_POST['year'])."',
            '".$_POST['days']."','".$_POST['basic_amt']."','".$_POST['hra_amt']."','".$_POST['conveyance_amt']."',
            '".$_POST['variable_amt']."','".$gross."','".date('d-m-Y')."','".$_POST['deduction_amt']."','".$_POST['mobrech']."','".$_POST['fine']."','".$_POST['adv']."','".$_POST['tds']."')";
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
    <h2 class="title float-left btn btn-danger">Create Salary Slip</h2>
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
            <label class="form-label btn btn-info form-control">Select Employee</label>
           
            <div class="control">
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
		<label class="form-label btn btn-info form-control">Select Month</label>
       
		<select class="form-control" name="salary_month" required>
		<option value="">--Select Month--</option>
		    <option value='Janaury'>Janaury</option>
			<option value='February'>February</option>
			<option value='March'>March</option>
			<option value='April'>April</option>
			<option value='May'>May</option>
			<option value='June'>June</option>
			<option value='July'>July</option>
			<option value='August'>August</option>
			<option value='September'>September</option>
			<option value='October'>October</option>
			<option value='November'>November</option>
			<option value='December'>December</option>
		</select>
        </div>
		
		<div class="form-group col-12 col-md-3 col-lg-3">
		<label class="form-label btn btn-info form-control">Select Year</label>
        <span class="desc"></span>
		<select class="form-control" id="year" name="year" required>
		</select>
        </div>
		
		

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Days</label>
         
            <div class="control">
                <input type="text" name="days" value="<?php echo $rowq['days']; ?>" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Basic Salary</label>
            
            <div class="control">
                <input type="text" name="basic_amt" value="<?php echo $rowq['basic_amt']; ?>" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">HRA</label>
          
            <div class="control">
                <input type="text" name="hra_amt" value="<?php echo $rowq['hra_amt']; ?>" class="form-control" required="">
            </div>
        </div>

        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Conveyance Allowance</label>
            
            <div class="control">
                <input type="text" name="conveyance_amt" value="<?php echo $rowq['conveyance_amt']; ?>" class="form-control" required="">
            </div>
        </div>

		<!--<div class="form-group col-12 col-md-3 col-lg-3">-->
  <!--      <label class="form-label btn btn-info form-control">Deduction</label>-->
           
  <!--          <div class="control">-->
  <!--              <input type="text" name="deduction_amt" value="<php echo $rowq['deduction_amt']; ?>" class="form-control">-->
  <!--          </div>-->
  <!--      </div>-->
		
		<div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Variable Pay</label>
            
            <div class="control">
                <input type="text" name="variable_amt" value="<?php echo $rowq['variable_amt']; ?>" class="form-control" required="">
            </div>
        </div>
        
        
        
        	<div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Mobile Recharge</label>
            
            <div class="control">
                <input type="text" name="mobrech" value="" class="form-control" required="">
            </div>
        </div>
        
        
        	<div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Fine</label>
            
            <div class="control">
                <input type="text" name="fine" value="" class="form-control" required="">
            </div>
        </div>
        
        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Advance</label>
            
            <div class="control">
                <input type="text" name="adv" value="" class="form-control" required="">
            </div>
        </div>
        
        
        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">TDS</label>
            
            <div class="control">
                <input type="text" name="tds" value="" class="form-control" required="">
            </div>
        </div>
        
        
        

    </div>
	    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <button type="button" class="btn btn-danger">Cancel</button>
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