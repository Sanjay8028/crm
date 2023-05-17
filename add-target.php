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
		
		$qubm="select *from tblusers where username='".$rowss['assign_to']."'";
		$rqbm = $db->query($qubm);
		$rwbm=mysqli_fetch_array($rqbm,MYSQLI_ASSOC);
			
          $quss="Insert Into tbltarget (mid,tid,bid,name,target_month,target_year,target_amount,target_achived,percentage) 
            Values('".$rwbm['assign_to']."','".$rowss['assign_to']."','".$_POST['emp']."','".$rowss['name']."',
			'".$_POST['salary_month']."','".$_POST['year']."','".$_POST['target_amount']."')";
            $rs=$db->query($quss);
            $error="Add Successfully !";
    }
    else
    {
            $qu="Update tblusers set name='".addslashes($_POST['name'])."',mobile='".addslashes($_POST['mobile'])."',
            email='".addslashes($_POST['email'])."',user_type='".$_POST['usertype']."',username='".$_POST['username']."',
            password='".$_POST['password']."',add_permission='".$_POST['addper']."',edit_permission='".$_POST['editper']."',delete_permission='".$_POST['deleteper']."' where id='".$_GET['id']."'";
            $rs=$db->query($qu);
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
    <h2 class="title float-left btn btn-danger">Add Target</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">

<form action="" method="POST">
	<div class="row">
    	<div class="col-md-12">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>
        </div>
    </div>

    
    <div class="row">
		<div class="form-group col-12 col-md-3 col-lg-3">
		<label class="form-label btn btn-info form-control">Select Employee</label>
		<span class="desc"></span>
		<div class="controls">
			
			
			
			<select class="form-control btn btn-info form-control" name="emp">
   
<option value="">--Select Employee--</option>
<?php
$queryuss ="SELECT *FROM tblusers where user_type='Business Consultant'";
$resultss = $db->query($queryuss);
while($rows=mysqli_fetch_array($resultss))
{
?>
<option value="<?php echo $rows['username']; ?>" <?php if($rows['id']==$_POST['emp']){ echo 'selected=selected';} ?>
>
    <?php echo $rows['username']; ?></option>
<?php
}
?>
</select>



		</div>
        </div>
        <div class="form-group col-12 col-md-3 col-lg-3">
		<label class="form-label btn btn-info form-control">Select Month</label>
        <span class="desc"></span>
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
            <label class="form-label btn btn-info form-control">Set Target </label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="target_amount" value="<?php echo $rowq['target_amount']; ?>" class="form-control" required="">
            </div>
        </div>

 
        <div class="form-group col-12 col-md-3 col-lg-3">
            <label class="form-label btn btn-info form-control">Target Achived</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="target_achived" value="<?php echo $rowq['target_achived']; ?>" class="form-control" required="">
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
            <!-- END CONTENT -->

<?php include('inc/footer.php'); ?>

<script>
var start = 2021;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option value="+ year +">"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;
</script>