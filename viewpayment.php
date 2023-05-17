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
  $sql = "DELETE FROM tblpay WHERE id='$del_id'";
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
          <h2 class="title float-left btn btn-danger">View Payment</h2>
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
                          <th>Bank</th>
                          <th>Amount</th>
                          <th>company</th>
                          <th>Mode</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						$queryu ="SELECT *FROM tblpay";
						$result = $db->query($queryu);
						$i=1;
						while($row=mysqli_fetch_array($result))
						{
						?>
                        <tr id="r-<?php echo $row['id']?>">
                          <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
                          <td class="clr-blue"><?php echo $i; ?></td>
                         <td><b style="font-size:14px"><?php echo $row['bank_name']; ?></b></td>
                          <td> <b style="font-size:14px"><?php echo $row['amount']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['company']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['mode']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['date']; ?></b></td>
                          <td style="display:inline-flex">
                              <a href="#"><i class="fa fa-penc" title="Edit"> <img src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-pencil-icon-png-image_313118.jpg" style="width:30px;float:left"></i></a> 
                              <a href="#" target="_blank"><i class="fa fa-penc" title="Edit"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqdV_TgwjyVgB6KDmAJGN3oT9XTME0sflargbMBwODuYwJA19RDXRS0aDEtDkXmZdL2aU&usqp=CAU" style="width:30px;float:left"></i></a> 
                              <!--<a href="#" target="_blank"><i class="fa fa-book" title="View Keyword Report"></i></a> -->
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
