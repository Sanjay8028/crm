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
  $sql = "Update tblleads set block_status='1' WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>alert('Blocked Successfully !');</script>";
}
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
          <h2 class="title float-left btn btn-danger">Search Global Parties</h2>
          <div class="actions panel_actions float-right"> 
              <a class="box_toggle fa fa-chevron-down"></a> 
              <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a> 
              <a class="box_close fa fa-times"></a> 
          </div>
        </header>
        <div class="content-body">
          <div class="row">
            <div class="col-12">
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-3 col-md-2 col-12">
                    <label class="form-label btn btn-info form-control"><b>Company Name</b></label>
                    <input type="text" name="name" value="<?php echo $_POST['name']; ?>" class="form-control" placeholder="Enter Company Name">
                  </div>
                  <div class="col-lg-3 col-md-2 col-12">
                    <label class="form-label btn btn-info form-control"><b>Mobile No.</b></label>
                    <input type="text" name="mobile" value="<?php echo $_POST['mobile']; ?>" class="form-control" placeholder="Enter Nobile No">
                  </div>
                  <div class="col-lg-3 col-md-2 col-12">
                    <label class="form-label btn btn-info form-control"><b>Email Id</b></label>
                    <input type="text" name="email" value="<?php echo $_POST['email']; ?>" class="form-control" placeholder="Enter Email Id">
                  </div>
                  <div class="col-lg-3 col-md-3 col-12">
                    <button type="submit" class="btn btn-success btn-mt-20 btn-width-100" name="search" >Search</button>
                  </div>
                </div>
                <div class="display-data-table-area">
                  <div class="table-responsive">
                    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Sl No.</th>
                          <th>Company Name</th>
                          <th>Mobile No.</th>
                          <th>Email</th>
                          <th>Assign To</th>
                          <th>Status</th>
                          <th>Comments</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

						$i=1;
						while($row=mysqli_fetch_array($result))
						{
							$queryus ="SELECT *FROM tblhistory where lead_Id='".$row['id']."'";
							
						
							
							$results = $db->query($queryus);
								$tmp=mysqli_fetch_array($results);
						 if(isset($tmp)){
								 
			
					       foreach($results as $rows)
							{
						?>
						
					
						
						
                        <tr id="r-<?php echo $row['id']?>">
                          <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
                          <td class="clr-blue"><?php echo $i; ?></td>
                          <td><?php echo $row['company_name']; ?></td>
                          <td><?php echo $row['mobile']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['assign_to']; ?></td>
                           <td><?php echo $row['status']; ?></td>
                          
                          <td><?php echo $rows['remark']; ?></td>
                        </tr>
                        <?php
						$i++;
							}
							}
							else{
							    ?>
							    
							    
							     <tr id="r-<?php echo $row['id']?>">
                          <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
                          <td class="clr-blue"><?php echo $i; ?></td>
                          <td><?php echo $row['company_name']; ?></td>
                          <td><?php echo $row['mobile']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['assign_to']; ?></td>
                           <td><?php echo $row['status']; ?></td>
                          
                          <!--<td><php echo $rows['remark']; ?></td>-->
                        </tr>
							    
							    
							    
							    <?php
							    
							    $i++;
							    
							}
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
