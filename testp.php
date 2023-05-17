<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['search'])) 
{
    if($_POST['emp']!='' && $_POST['fdate']!='' && $_POST['tdate']!='')
    {
        $que .="bid='".$_POST['emp']."' and recive_date BETWEEN '".date("Y-m-d", strtotime($_POST['fdate']))."' and '".date("Y-m-d", strtotime($_POST['tdate']))."'";
    }
    if($_POST['emp']=='' && $_POST['fdate']!='' && $_POST['tdate']!='')
    {
        $que .="recive_date BETWEEN '".date("Y-m-d", strtotime($_POST['fdate']))."' and '".date("Y-m-d", strtotime($_POST['tdate']))."'";
    }
	if($_POST['emp']!='' && $_POST['fdate']=='' && $_POST['tdate']=='')
    {
        $que .="bid='".$_POST['emp']."'";
    }
    
    $queryus ="SELECT *FROM tblperformance where ".$que."";
    $results = $db->query($queryus);
}
else
{
	if($_GET['uid'] !='' && $_GET['action']=='Approved')
	{
		$qu="Update tblperformance set status='Approved' where id='".$_GET['uid']."'";
		$rs=$db->query($qu);
		$error="Update Successfully !";
	}
	$queryus ="SELECT *FROM tblperformance ORDER BY recive_date DESC";
    $results = $db->query($queryus); 
}

if(isset($_POST['delete'])) 
{
	echo $count1  = $_POST['checkbox'];
	for($i=0;$i<count($count1);$i++)
	{
	  $del_id=$_POST['checkbox'][$i];
	  $sql = "DELETE FROM tblperformance WHERE id='$del_id'";
	  $result2 = $db->query($sql);
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
<!-- START CONTENT -->
<section id="main-content">
<section class="wrapper main-wrapper" style=''>
<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Performance Report
    <?php// echo $_POST['tdate'] ?>
    <?php //echo $_POST['fdate'] ?>
    <?php echo $_POST['emp'] ?></h2>
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
<!--<form name="frm" method="POST" action="" enctype="multipart/form-data">-->
<div class="row">
    
    
<div class="col-lg-3 col-md-2 col-12">
  	<label class="form-label btn btn-info form-control">  Employee  </label>
<select class="form-control" name="emp">
   
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
 <div class="form-group col-12 col-md-5 col-lg-5">
                    <label class="form-label btn btn-info form-control">Select starting month</label>
                    
                 
                        
                      <select class="form-control" name="fdate">
                        <option value="">--Select Month--</option>
                        
                        <option value='2022-01-01'<?php if($_POST['fdate']=='2022-01-01'){ echo 'selected=selected';} ?> >Janaury</option>
                          <option value='2022-02-01' <?php if($_POST['fdate']=='2022-02-01'){ echo 'selected=selected';} ?>>February</option>
                            <option value='2022-03-01' <?php if($_POST['fdate']=='2022-03-01'){ echo 'selected=selected';} ?> >March</option>
                              <option value='2022-04-01' <?php if($_POST['fdate']=='2022-04-01'){ echo 'selected=selected';} ?> >April</option>
                                <option value='2022-05-01' <?php if($_POST['fdate']=='2022-05-01'){ echo 'selected=selected';} ?> >May</option>
                                  <option value='2022-06-01' <?php if($_POST['fdate']=='2022-06-01'){ echo 'selected=selected';} ?> >June</option>
                                    <option value='2022-07-01' <?php if($_POST['fdate']=='2022-07-01'){ echo 'selected=selected';} ?> >July</option>
                                      <option value='2022-08-01' <?php if($_POST['fdate']=='2022-08-01'){ echo 'selected=selected';} ?> >August</option>
                                        <option value='2022-09-01' <?php if($_POST['fdate']=='2022-09-01'){ echo 'selected=selected';} ?> >September</option>
                                          <option value='2022-10-01' <?php if($_POST['fdate']=='2022-10-01'){ echo 'selected=selected';} ?> >October</option>
                                            <option value='2022-11-01' <?php if($_POST['fdate']=='2022-11-01'){ echo 'selected=selected';} ?> >November</option>
                                        <option value='2022-12-01' <?php if($_POST['fdate']=='2022-12-01'){ echo 'selected=selected';} ?> >December</option>
                                
                             
                      </select>
                    
                  </div>
 <div class="form-group col-12 col-md-5 col-lg-5">
                    <label class="form-label btn btn-info form-control">Select Last month</label>
                   
                 
                      <select class="form-control" name="tdate">
                        <option value="">--Select Month--</option>
                        <option value='2022-01-31' <?php if($_POST['tdate']=='2022-01-31'){ echo 'selected=selected';} ?> >Janaury</option>
                          <option value='2022-02-28' <?php if($_POST['tdate']=='2022-02-28'){ echo 'selected=selected';} ?> >February</option>
                            <option value='2022-03-31' <?php if($_POST['tdate']=='2022-03-31'){ echo 'selected=selected';} ?> >March</option>
                              <option value='2022-04-30' <?php if($_POST['tdate']=='2022-04-30'){ echo 'selected=selected';} ?> >April</option>
                                <option value='2022-05-31' <?php if($_POST['tdate']=='2022-05-31'){ echo 'selected=selected';} ?> >May</option>
                                  <option value='2022-06-30' <?php if($_POST['tdate']=='2022-06-30'){ echo 'selected=selected';} ?> >June</option>
                                    <option value='2022-07-31' <?php if($_POST['tdate']=='2022-07-31'){ echo 'selected=selected';} ?> >July</option>
                                      <option value='2022-08-31' <?php if($_POST['tdate']=='2022-08-31'){ echo 'selected=selected';} ?> >August</option>
                                        <option value='2022-09-30' <?php if($_POST['tdate']=='2022-09-30'){ echo 'selected=selected';} ?> >September</option>
                                          <option value='2022-10-31' <?php if($_POST['tdate']=='2022-10-31'){ echo 'selected=selected';} ?> >October</option>
                                            <option value='2022-11-30' <?php if($_POST['tdate']=='2022-11-30'){ echo 'selected=selected';} ?> >November</option>
                                <option value='2022-12-31' <?php if($_POST['tdate']=='2022-12-31'){ echo 'selected=selected';} ?> >December</option>
                       
                      </select>
                   
                  </div><div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="search">Search</button>
</div>
</div>



<div class="display-data-table-area">
<div class="table-responsive">
    <table id="example-11" class="table table-striped dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
			<th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
			<th>Slno</th>
             <th>Employee</th>
            <th>Client Name</th>
            <th>Client Mobile</th>
             <th>GST NO.</th>
            <th>Payment Mode</th>
			<th>Service Name</th>
			<th> Settelment Amount</th>
			<th>Receive Amount</th>
			<!--<th>Balance Due</th>-->
			<th>Recived Date</th>
			<th>Payment Status</th>
			
		<!--<th>Action</th>-->
			<th>Action</th>
			<!--<th>testb</th>-->
         </tr>
    </thead>

    <tbody>
        <?php

        $i=1;
        while($row=mysqli_fetch_array($results))
        {
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
			<td class="clr-blue"><?php echo $i; ?></td>
            <td><?php echo $row['bid']; ?></td>
            <td><b style="font-size:14px"><?php echo $row['client_name']; ?></b></td>
            <td> <b style="font-size:14px"><?php echo $row['client_mobileno']; ?></b></td>
            
              <td><b style="font-size:14px"><?php echo $row['gst']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['paymentmode']; ?></b></td>
            
            
			<td><b style="font-size:14px"><?php echo $row['service']; ?></b></td>
            <td style="background:#000;color:#f8f8f8;font-weight:bold;"><?php echo $row['amount']; ?></td>
             <td style="background:green;color:#f8f8f8;font-weight:bold;"><?php 
             
           // echo $ab+= $row['paymode']; 
            echo $row['paymode']; 
            ?></td>
              <!--<td style="background:orange;color:#f8f8f8;font-weight:bold;"><?php //echo $ne=($row['amount']- $row['paymode']); ?></td>-->
            <td><b style="font-size:14px"><?php echo $row['recive_date']; ?></b></td>
            <td><b style="font-size:14px"><?php echo $row['status']; ?></b></td>
            <!--<td><?php echo  $tt= $tot+= $row['paymode'];?></td>-->
            
            	<td><?php if($row['status']!='Approved'){?>
			<a href="performance-report.php?uid=<?php echo $row['id']; ?>&action=Approved" style="color:green; font-size:16px" class="btn btn-info">Approved</a>
			<?php
			}
			?>
			</td>
			<!--<td>-->
			<!--     <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Accept</button>-->


   <!--           <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Reject</button>-->

			<!--</td>-->
            
			
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
     <h2 class="btn btn-success">Total Recieved: <?php echo  $tt= $tot+= $row['paymode'];?></h2>
     
     
       
                       <h2  class="btn btn-success">Total target: 
                      <?php
                      
                    if($_POST['fdate']!='' && $_POST['tdate']!='')  {
                      
                      $date1 = strtotime($_POST['fdate']);
$date2 = strtotime($_POST['tdate']);
$months = 1;

while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2){
    $months++; 

    
// $date1 = $_POST['fdate'];
// $date2 = $_POST['tdate'];

// $ts1 = strtotime($date1);
// $ts2 = strtotime($date2);



// $month1 = date('m', $ts1);
// $month2 = date('m', $ts2);

// $diff = ($month2 - $month1);
}
} 
echo  $months;
?></h2>
<h2  >
    <?php
     $queryus ="SELECT *FROM tbltarget where bid='".$_SESSION['username']."' and ".$que."";
    $results = $db->query($queryus);
    
    $rrr=mysqli_fetch_array($results);
  
    //echo $rrr['target_amount'];
    $so= $rrr['target_amount'];
    //echo $so;
    
    
    ?>
    
    
    
    
    
    
</h2 >
 <?php
    $queryus ="SELECT target_amount FROM tbltarget where bid='".$_POST['emp']."'"; 
    $results = $db->query($queryus);
    
   while($rrr=mysqli_fetch_array($results)) 
    
    $bad=$rrr['target_amount'];
    
  
    {
    echo $rrr['target_amount']."<br>";
     $autsum=$suum+=$rrr['target_amount'];
    }
  $autsum;
    
    ?>

<h2><?php echo $rrr['target_amount'];?></h2>


 <?php
$good= (($tot+= $row['target_amount']));
//  echo "$good" ;


 $sut=($bad)*($months);
//echo "$sut" ;
//  echo "$good" ;
 if(!empty($sut))
 {
  $final= ($good)*100/($sut);
//echo round($final,2)."%";
}
 ?>

                      <h2 class="btn btn-success" >  
                      &nbsp;&nbsp;&nbsp; Total Percentage:<?php 
                      
                      echo round($final,2)."%"; 
                      
                     
                      ?>
                      
                     
                      </h2>
                      <br>
</table>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
</section>
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



<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->


<!-- Option 1: Bootstrap Bundle with Popper -->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    
    
          





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
<?php include('inc/footer.php'); ?>


