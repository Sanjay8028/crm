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
  $sql = "DELETE FROM workstatus WHERE id='$del_id'";
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
<!-- START CONTENT -->

<section id="main-content">
  <section class="wrapper main-wrapper" style=''>
    <div class="col-12">
      <section class="box ">
        <header class="panel_header">
          <h2 class="title float-left btn btn-danger">All Backend Work Report</h2>
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
                <div class="display-data-table-area">
                  <div class="table-responsive">
                    <table id="example-11" class="display table table-hover table-condensed dataTable no-foote" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th><INPUT type="checkbox" onchange="checkAll(this)" /></th>
                          <th>S No.</th>
                          <th>Company Name</th>
                          <th>Work Status</th>
                          <th>Promotion</th>
                          <th>Domain</th>
                          <th>Expected Complete Date</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						$queryu ="SELECT *FROM workstatus";
						$result = $db->query($queryu);
						$i=1;
						while($row=mysqli_fetch_array($result))
						{
						?>
                        <tr id="r-<?php echo $row['id']?>">
                          <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
                          <td><b style="font-size:14px"><?php echo $i; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['company']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['amount']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['bank_name']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['mode']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['date']; ?></b></td>
                          <td style="display:inline-flex">
                              <a href="addwork.php?id=<?php echo $row['id'];?>"><i class="fa fa-penc" title="Edit"> <img src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-pencil-icon-png-image_313118.jpg" style="width:30px;float:left"></i></a> 
                              <a href="addwork.php?id=<?php echo $row['id'];?>" target="_blank"><i class="fa fa-plu" title="Add Keywords"><img src="https://t3.ftcdn.net/jpg/02/65/22/04/360_F_265220497_nfGmA1jeLQwsHdz0qGIIOpmAQaCsfGfJ.jpg" style="width:30px;float:left"></i></a> 
                              <a href="workprocess.php?id=<?php echo $row['id'];?>" target="_blank"><i class="fa fa-boo" title="Read More"><img src="https://i.pinimg.com/originals/d9/62/3f/d9623fc777b7498ab50cb37520975ef5.png" style="width:30px;float:left"></i></a> 
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
    </div>
  </section>
</section>
<?php include('inc/footer.php'); ?>
