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


if(isset($_POST['delete'])) 
{
$count  = $_POST['checkbox'];
for($i=0;$i<count($count);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  $sql = "DELETE FROM tblreg WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

?>
<script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var j = 0; j < chks.length; j++)
{
if (chks[j].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}

$(document).ready(function(){
$('#ckbCheckAll').click(function(event) { 

            if($(this).is(":checked")) {

                $('.checkBoxClass').each(function(){

                    $(this).prop("checked",true);

                });

            }

            else{

                $('.checkBoxClass').each(function(){

                    $(this).prop("checked",false);

                });

            }   
    }); 

    });
</script>

 <?php

            $queryu ="SELECT *FROM tblusers";
            $result = $db->query($queryu);
            $i=1;
            $row=mysqli_fetch_array($result);
           
            ?>

<!-- START CONTENT -->

<section id="main-content">
  <section class="wrapper main-wrapper" style=''>
    <div class="col-12">
      <section class="box ">
        <header class="panel_header">
          <h2 class="title float-left btn btn-danger">All Employee Resignation</h2>
          <div class="actions panel_actions float-right"> 
             
             
          </div>
        </header>
        <div class="content-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="display-data-table-area">
                  <div class="table-responsive">
                    <table id="example-11" class="display table table-hover table-condensed dataTable no-foote" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
                          <th>S No.</th>
                          <th>Notice type</th>
                          
                          <th>Name:</th>
                          <th>Employee Id</th>
                          
                          <th>Reason For Resignation</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
            $queryu ="SELECT *FROM tblreg";
            $result = $db->query($queryu);
            $i=1;
            while($row=mysqli_fetch_array($result))
            {
            ?>
                        <tr id="r-<?php echo $row['id']?>">
                          <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
                          <td class="clr-blue"><?php echo $i; ?></td>
                            <td><b style="font-size:14px"><?php echo $row['drp']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['e_name']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['emp_id']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['reason']; ?></b></td>
                         
                          <td><b style="font-size:14px"><?php echo $row['date']; ?></b></td>
                          <td>
                            
                         <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Accept</button>


              <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Reject</button>

                          </td>
                        </tr>
                        <?php
            $i++;
            }
            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <style>



/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}


/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 100%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


















 <div class="modal  " id="myModal" role="dialog">
    <div class="modal-dialog modal-content">

 <label class="form-label">Resignation Approval/Refusal  </label>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    

<div class="col-12 ">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left">Resignation Aproval</h2>
    <div class="actions panel_actions float-right">
       
       
    </div>
</header>
<div class="content-body">
<form action="" method="POST">
<p style="text-align: center;color:green;"><?php echo $error; ?></p>
    <div class="row">
    		<div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Select Employee</label>
            <span class="desc"></span>
            <div class="controls">
                <select style="width:100%;height:80%;" class="form-control" name="emp" required>
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
        <div class="form-group col-12 col-md-6 col-lg-6">
		<label class="form-label">Select Type</label>
        <span class="desc"></span>
		<select style="width:100%;height:80%;" class="form-control" name="salary_month" required>
		<option value="">--Select --</option>
		    <option value='Urgent'>Urgent</option>
			<option value='15 days'>15 days</option>
			<option value='30 Days'>30 Days</option>
			
		</select>
        </div>
	
		
		
		<br>

        <div class="form-group col-12 col-md-12 col-lg-12">
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

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn1");
var btn = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

    </div>
  </section>
</section>
<?php include('inc/footer.php'); ?>
