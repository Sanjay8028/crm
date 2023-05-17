<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');



if(isset($_POST['delete'])) 
{
$count  = $_POST['checkbox'];
for($i=0;$i<count($count);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  $sql = "DELETE FROM tbltarget WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

if(isset($_POST['search'])) 
{
    if($_POST['emp']=='' && $_POST['salary_month']!='' && $_POST['year']!='')
    {
        $que .="target_month='".$_POST['salary_month']."' and target_year='".$_POST['year']."'";
    }
	if($_POST['emp']!='' && $_POST['salary_month']!='' && $_POST['year']!='')
    {
        $que .="target_month='".$_POST['salary_month']."' and target_year='".$_POST['year']."' and bid='".$_POST['emp']."'";
    }
    if($_POST['emp']!='' && $_POST['salary_month']=='' && $_POST['year']=='')
    {
        $que .="bid='".$_POST['emp']."'";
    }
    echo $queryus ="SELECT *FROM tbltarget where ".$que."";
    $results = $db->query($queryus);
}
else
{
	$queryus ="SELECT *FROM tbltarget ORDER BY id DESC";
    $results = $db->query($queryus); 
}
?>




<!-- START CONTENT -->
<section id="main-content">
    <section class="wrapper main-wrapper" style=''>



<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">View Target</h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<form method="POST" action="" enctype="multipart/form-data">

<div class="row">
		<div class="form-group col-12 col-md-3 col-lg-3">
		<label class="form-label btn btn-info form-control">Select Employee</label>
		
	
			<select class="form-control" name="emp">
			<option value="">--Select Employee--</option>
			<?php
			$queryuss ="SELECT *FROM tblusers where user_type='Business Consultant'";
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
        <div class="form-group col-12 col-md-3 col-lg-3">
		<label class="form-label btn btn-info form-control">Select Month</label>
        
		
		<select class="form-control" name="salary_month">
		<option value="">--Select Month--</option>
		    <option value='Janaury' <?php if($_POST['salary_month']=='Janaury'){ echo 'selected=selected';} ?>>Janaury</option>
			<option value='February' <?php if($_POST['salary_month']=='February'){ echo 'selected=selected';} ?>>February</option>
			<option value='March' <?php if($_POST['salary_month']=='March'){ echo 'selected=selected';} ?>>March</option>
			<option value='April' <?php if($_POST['salary_month']=='April'){ echo 'selected=selected';} ?>>April</option>
			<option value='May' <?php if($_POST['salary_month']=='May'){ echo 'selected=selected';} ?>>May</option>
			<option value='June' <?php if($_POST['salary_month']=='June'){ echo 'selected=selected';} ?>>June</option>
			<option value='July' <?php if($_POST['salary_month']=='July'){ echo 'selected=selected';} ?>>July</option>
			<option value='August' <?php if($_POST['salary_month']=='August'){ echo 'selected=selected';} ?>>August</option>
			<option value='September' <?php if($_POST['salary_month']=='September'){ echo 'selected=selected';} ?>>September</option>
			<option value='October' <?php if($_POST['salary_month']=='October'){ echo 'selected=selected';} ?>>October</option>
			<option value='November' <?php if($_POST['salary_month']=='November'){ echo 'selected=selected';} ?>>November</option>
			<option value='December' <?php if($_POST['salary_month']=='December'){ echo 'selected=selected';} ?>>December</option>
		</select>
	
        </div>
		<div class="form-group col-12 col-md-3 col-lg-3">
		<label class="form-label btn btn-info form-control">Select Year</label>
       
		
		<select class="form-control" name="year">
		<option value=''>--Select Year--</option>
		<option value='2021' <?php if($_POST['year']=='2021'){ echo 'selected=selected';} ?>>2021</option>
		<option value='2022' <?php if($_POST['year']=='2022'){ echo 'selected=selected';} ?>>2022</option>
		<option value='2023' <?php if($_POST['year']=='2023'){ echo 'selected=selected';} ?>>2023</option>
		<option value='2024' <?php if($_POST['year']=='2024'){ echo 'selected=selected';} ?>>2024</option>
		<option value='2025' <?php if($_POST['year']=='2025'){ echo 'selected=selected';} ?>>2025</option>
		</select>
	
        </div>
<div class="col-lg-3 col-md-3 col-12">
 <div class="controls">
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="search">Search</button>
</div>
</div>
</div>

</br>


<div class="display-data-table-area">
   <div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
		<th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
			<th>Slno</th>
            <th>Employee</th>
			<th>Designation</th>
			<th>Target Month</th>
            <th>Target Amount</th>
			
         </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($row=mysqli_fetch_array($results))
        {
		$qu="select *from tblusers where id='".$row['bid']."'";
        $rq = $db->query($qu);
        $rowss=mysqli_fetch_array($rq,MYSQLI_ASSOC);
        
        
			$queryuss ="SELECT *FROM tblusers where user_type='Business Consultant'";
			$resultss = $db->query($queryuss);
			$rows=mysqli_fetch_array($resultss);
		
		$qubm="select SUM(amount) as atotal from tblperformance where status='Approved' and bid='".$rowss['username']."'";
		$rqbm = $db->query($qubm);
		$rwbm=mysqli_fetch_array($rqbm,MYSQLI_ASSOC);
        ?>
        <tr id="r-<?php echo $row['id']?>">
		<td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
			<td class="clr-blue"><?php echo $i; ?></td>
            <td><b style="font-size:14px"><?php echo $row['bid']; ?></b></td>
			<td><b style="font-size:14px"><?php echo $rows['user_type']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['target_month']; ?>-<?php echo $row['target_year']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['target_amount']; ?></b></td>
          
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
</table>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
</section>
</section>

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
