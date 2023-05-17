<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

// if(isset($_POST['submit']))
// {
//     if($_GET['id']=='')
//     {
//         $qu="select *from tblusers where username='".$_POST['username']."'";
//         $rq = $db->query($qu);
//         $count=mysqli_num_rows($rq);
//         //$rowq=mysqli_fetch_array($rq,MYSQLI_ASSOC);
//         if($count==0)
//         {
//             $qus="select *from tblusers ORDER BY id DESC LIMIT 1";
//             $rqs = $db->query($qus);
//             $counts=mysqli_num_rows($rqs);
//             $rowqs=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
//             if($counts == 0)
//             {
//                 $newid ='1001';  
//             }
//             else
//             {
//                 $newid=$rowqs['employee_id']+1;
//             }
            
//             $qu="Insert Into tblusers (employee_id,name,mobile,email,user_type,username,password,add_permission,edit_permission,
//             delete_permission,regdate,status,joiningdate,pfno,esino) 
//             Values('".$newid."','".addslashes($_POST['name'])."','".addslashes($_POST['mobile'])."','".addslashes($_POST['email'])."',
//             '".$_POST['usertype']."','".$_POST['username']."','".$_POST['password']."','".$_POST['addper']."',
//             '".$_POST['editper']."','".$_POST['deleteper']."','".date('d-m-Y')."','1','".$_POST['joiningdate']."','".$_POST['pfno']."','".$_POST['esino']."')";
//             $rs=$db->query($qu);
//             $error="Add Successfully !";
			
// 			$upnimg = $_FILES['fileToUpload']['name'];
// 			$nimgtxt = mt_rand();
// 			$upimg = "../photo/".$nimgtxt.$_FILES['fileToUpload']['name'];
			
// 			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$upimg))
// 			{
// 				$upimgname = $nimgtxt.$upnimg;
// 				$quss="Update tblusers set pimg='".$upimgname."' where employee_id='".$newid."'";
// 				$rs=$db->query($quss);
// 				$error="Update Successfully !";
// 			}
//         }
//     }
//     else
//     {
// 			$upnimg = $_FILES['fileToUpload']['name'];
// 			$nimgtxt = mt_rand();
// 			$upimg = "../photo/".$nimgtxt.$_FILES['fileToUpload']['name'];
			
// 			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$upimg))
// 			{
// 				$upimgname = $nimgtxt.$upnimg;
// 				echo $quss="Update tblusers set pimg='".$upimgname."' where id='".$_GET['id']."'";
// 				$rss=$db->query($quss);
// 				$error="Update Successfully !";
// 			}
			
//             $qu="Update tblusers set name='".addslashes($_POST['name'])."',mobile='".addslashes($_POST['mobile'])."',pfno='".$_POST['pfno']."',esino='".$_POST['esino']."',
//             email='".addslashes($_POST['email'])."',user_type='".$_POST['usertype']."',username='".$_POST['username']."',joiningdate='".$_POST['joiningdate']."',
//             password='".$_POST['password']."',add_permission='".$_POST['addper']."',edit_permission='".$_POST['editper']."',delete_permission='".$_POST['deleteper']."' where id='".$_GET['id']."'";
//             $rs=$db->query($qu);
//             $error="Update Successfully !";
//     }
// }
$err="";
extract($_POST);
if(isset($submit))
{

        $quss= mysqli_query($db,"select *from tblusers where username='$telecaller'");
        
     $rowqs=mysqli_fetch_array($quss,MYSQLI_ASSOC);
     $iid=$rowqs['id'];

  $res=mysqli_query($db,"insert into appraisal(empid,emp_list,old_des,new_des,salary,app_date) Values ('$iid','$telecaller','$olddes','$newdes','$Salary','$appdate')");

  if($res)
  {
      $err="Add successfully";
  }
  
  else
  {
      $err="invalid";
  }
   
}


    $qus="select *from tblusers";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);

$empp;
?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper row" style=''>
<div class="clearfix"></div>
<!-- MAIN CONTENT AREA STARTS -->

<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left btn btn-danger">Employee Appraisal <span class="btn btn-info"><?php echo $err; ?> </span></h2>
    
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header> 
<div class="content-body">

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
    <p style="text-align: center;color:green;"><?php echo $error; ?></p>
       
       
       <div class="col-lg-4 col-md-4 col-12">
<label class="form-label btn btn-info form-control"><b>Employee List</b></label>
<select class="form-control" name="telecaller">
<option value="">--Employee List--</option>

<?php
$queryus ="SELECT *FROM tblusers";
$results = $db->query($queryus);
while($rows=mysqli_fetch_array($results))
{
?>
<option value="<?php echo $rows['username']; ?>" <?php if($rows['username']==$_POST['telecaller']){ echo 'selected=selected';} ?>><?php echo $rows['name']; ?></option>
<?php
}
?>
</select>
</div>
  
        <div class="form-group col-12 col-md-4 col-lg-4">
            <label class="form-label btn btn-info form-control">Old Designation</label>
            <span class="desc"></span>
            <select class="form-control" name="olddes" required="">
            <option value="">--User Type--</option>
            <option value="Manager" <?php if($rowq['user_type']=='Manager') { echo 'selected=selected';} ?>>Manager</option>
            <option value="Team Leader" <?php if($rowq['user_type']=='Team Leader') { echo 'selected=selected';} ?>>Team Leader</option>
            
           
            <option value="Business Consultant" <?php if($rowq['user_type']=='Business Consultant') { echo 'selected=selected';} ?>>Business Consultant</option>
            
            	<option value="Backend Executive">Backend Executive</option>
            	
			<option value="Backend Manager">Backend Manager</option>
            
			<option value="Digital Marketing" <?php if($rowq['user_type']=='Digital Marketing') { echo 'selected=selected';} ?>>Digital Marketing</option>
			<option value="Developer Executive">Developer Executive</option>
			<option value="Developer Team leader">Developer Manager</option>



           
            </select>
        </div>
        
        
        
        <div class="form-group col-12 col-md-4 col-lg-4">
            <label class="form-label btn btn-info form-control">New Designation</label>
            <span class="desc"></span>
            <select class="form-control" name="newdes" required="">
            <option value="">--User Type--</option>
            <option value="Manager" <?php if($rowq['user_type']=='Manager') { echo 'selected=selected';} ?>>Manager</option>
            <option value="Team Leader" <?php if($rowq['user_type']=='Team Leader') { echo 'selected=selected';} ?>>Team Leader</option>
            
            <!--<option value="Backend" <php if($rowq['user_type']=='Backend') { echo 'selected=selected';} ?>>Backend</option>-->
            
            <option value="Business Consultant" <?php if($rowq['user_type']=='Business Consultant') { echo 'selected=selected';} ?>>Business Consultant</option>
            
            
            	<option value="Backend Executive">Backend Executive</option>
            	
			<option value="Backend Manager">Backend Manager</option>
            
			<option value="Digital Marketing" <?php if($rowq['user_type']=='Digital Marketing') { echo 'selected=selected';} ?>>Digital Marketing</option>
			
				<option value="Developer Executive">Developer Executive</option>
			<option value="Developer Manager">Developer Manager</option>


           
            </select>
        </div>

        <div class="form-group col-12 col-md-4 col-lg-4">
            <label class="form-label btn btn-info form-control">Salary</label>
           
            
                <input type="text" name="Salary" value="" class="form-control" required="" placeholder="Enter salary">
          
        </div>

        

       
        
       
        <div class="form-group col-12 col-md-4 col-lg-4">
            <label class="form-label btn btn-info form-control">Appraisal Date </label>
           
           
                <input type="date" name="appdate" value="<?php echo $rowq['joiningdate']; ?>" class="form-control" required="">
           
        </div>

       

        <!--<div class="form-group col-12 col-md-4 col-lg-4">-->
        <!--    <label class="form-label">Upload Profile Image</label>-->
        <!--    <span class="desc"></span>-->
        <!--    <div class="controls">-->
        <!--        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">-->
        <!--    </div>-->
        <!--</div>-->


    <div class="col-12 col-md-12 col-lg-12 padding-bottom-30">
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


