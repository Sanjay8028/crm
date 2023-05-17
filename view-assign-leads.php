<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');
 
if(isset($_POST['ass'])) 
{

$count1  = $_POST['checkbox'];
for($i=0;$i<count($count1);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  echo $sql = "Update tblleads set assign_to='".$_POST['telecaller']."', assign_date='".date('d-m-Y')."' WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>alert('Lead Assign Successfully !');</script>";
}
}

if(isset($_POST['delete'])) 
{
$count  = $_POST['checkbox'];
for($i=0;$i<count($count);$i++)
{
  $del_id=$_POST['checkbox'][$i];
  $sql = "DELETE FROM tblleads WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}

if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];      


     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 100, ",")) !== FALSE)
         {
             

           $sql = "INSERT into tblleads (company_name,email,client_name,mobile,address,product,regdate) 
               values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".date('d-m-Y')."')";
               $results =$db->query($sql);
            if(!isset($results))
            {
                echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location = \"all-leads.php\"
                      </script>";       
            }
            else {
                  echo "<script type=\"text/javascript\">
                    alert(\"CSV File has been successfully Imported.\");
                    window.location = \"all-leads.php\"
                </script>";
            }
         }
        
         fclose($file); 
     }
}

if(isset($_POST['filer'])) 
{
    $queryu ="SELECT *FROM tblleads where assign_to!='' and assign_to='".$_POST['telecaller']."'";
    $result = $db->query($queryu);
}
else
{
    $queryu ="SELECT *FROM tblleads where assign_to='".$_GET['uid']."'";
    $result = $db->query($queryu);
}

if(isset($_POST['search'])) 
{
    if($_POST['name']!='' && $_POST['email']=='' && $_POST['mobile']=='')
    {
        $que .="company_name='".$_POST['name']."'";
    }
    if($_POST['name']=='' && $_POST['email']=='' && $_POST['mobile']!='')
    {
        $que .="mobile='".$_POST['mobile']."'";
    }
    if($_POST['name']=='' && $_POST['email']!='' && $_POST['mobile']=='')
    {
        $que .="email='".$_POST['email']."'";
    }

    if($_POST['name']!='' && $_POST['mobile']!='' && $_POST['email']!='')
    {
        $que .="company_name='".$_POST['name']."' and mobile='".$_POST['mobile']."' and email='".$_POST['email']."'";
    }

    if($_POST['name']!='' && $_POST['mobile']!='' && $_POST['email']=='')
    {
        $que .="company_name='".$_POST['name']."' and mobile='".$_POST['mobile']."'";
    }

    if($_POST['name']=='' && $_POST['mobile']!='' && $_POST['email']!='')
    {
        $que .="mobile='".$_POST['mobile']."' and email='".$_POST['email']."'";
    }

    if($_POST['name']!='' && $_POST['mobile']=='' && $_POST['email']!='')
    {
        $que .="company_name='".$_POST['name']."' and email='".$_POST['email']."'";
    }

    $queryu ="SELECT *FROM tblleads where ".$que."";
    $result = $db->query($queryu);
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
<section class="wrapper main-wrapper row" style=''>

<div class="col-12">
<section class="box ">
<header class="panel_header">
    <h2 class="title float-left">All Assign Parties Of <?php echo $_GET['uid']; ?></h2>
    <div class="actions panel_actions float-right">
        <a class="box_toggle fa fa-chevron-down"></a>
        <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
        <a class="box_close fa fa-times"></a>
    </div>
</header>
<div class="content-body">
<br/>
<div class="row">
<div class="col-12">
<form method="POST" action="" enctype="multipart/form-data">
<!--<div class="row">
<div class="col-lg-2 col-md-2 col-12">
<button type="submit" class="btn btn-primary" name="delete" onSubmit="return validate();">Delete</button>
</div>
<div class="col-lg-3 col-md-2 col-12">
<label class="form-label"><b>Business Consultant</b></label>
</div>
<div class="col-lg-3 col-md-2 col-12">
<select class="form-control" name="telecaller">
<option value="">--Select Business Consultant--</option>
<?php
$queryus ="SELECT *FROM tblusers where user_type='Business Consultant'";
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
<div class="col-lg-1 col-md-2 col-12">
<button type="submit" class="btn btn-primary" name="ass" onSubmit="return validate();">Assign</button>
<button type="submit" class="btn btn-primary" name="filer" >Filter</button>
</div>

</div>-->
<br/>
<div class="row">
<div class="col-lg-3 col-md-2 col-12">
<label class="form-label"><b>Company Name</b></label>   
<input type="text" name="name" value="<?php echo $_POST['name']; ?>" class="form-control" placeholder="Enter Company Name">
</div>
<div class="col-lg-3 col-md-2 col-12">
<label class="form-label"><b>Mobile No.</b></label>
<input type="text" name="mobile" value="<?php echo $_POST['mobile']; ?>" class="form-control" placeholder="Enter Nobile No">
</div>
<div class="col-lg-3 col-md-2 col-12">
<label class="form-label"><b>Email Id</b></label>   
<input type="text" name="email" value="<?php echo $_POST['email']; ?>" class="form-control" placeholder="Enter Email Id">
</div>
<div class="col-lg-1 col-md-2 col-12">
&nbsp;&nbsp;
<button type="submit" class="btn btn-primary" name="search" >Search</button>
</div>

</div>
</br>
    <div class="table-responsive">
    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
            <th>Sl No.</th>
            <th>Company Name</th>
            <th>Email Id</th>
            <th>Client Name</th>
            <th>Mobile No.</th>
            <th>Address</th>
            <th>Product</th>
            <th>Assing To</th>
            <th>Team Leader</th>
            <th>Parties Status</th>
            <th>Reg Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i=1;
        while($row=mysqli_fetch_array($result))
        {
            $ques ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
            $rstu = $db->query($ques);
            $rows=mysqli_fetch_array($rstu);

            //$ques ="SELECT *FROM tblusers where username='".$row['assign_to']."'";
            //$rstu = $db->query($ques);
            //$rows=mysqli_fetch_array($rstu);
        ?>
        <tr id="r-<?php echo $row['id']?>">
        <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['company_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['client_name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['product']; ?></td>
            <td><?php if($row['assign_to']!=''){ echo $row['assign_to'];}else{ echo 'Not Assing';} ?></td>
            <td><?php echo $rows['assign_to']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['regdate']; ?></td>
            <td>
            <a href="update-lead.php?id=<?php echo $row['id'];?>"><img src="images/edit.png"/></a>
            <a class="" href="invoice-genrate.php?pid=<?php echo $row['id'];?>" target="_blank">Generate Invoice</a>
			<a href="history.php?id=<?php echo $row['id'];?>"><img src="images/hi.png"/></a>
            </td>
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
<script>
function Export()
{
var conf = confirm("Export Leads to CSV?");
if(conf == true)
{
    window.open("leadexport.php", '_blank');
}
}
</script>
<?php include('inc/footer.php'); ?>


