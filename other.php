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
  $sql = "DELETE FROM tblusers WHERE id='$del_id'";
  $result2 = $db->query($sql);
}
if($result2)
{
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>window.location='$url'</script>";
}
}
if(isset($_GET['did'])) 
{
	$pdelid=$_GET['did'];
	
	$del="delete from tblleads where id='$pdelid'";
	$resl = $db->query($del);
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
          <h2 class="title float-left btn btn-danger">Ringing/Switch Off Parties</h2>
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
                          <th>Client Name</th>
                          <th>Email Id</th>
                          <th>Mobile No.</th>
                          <th>Status</th>
                          <th>Assigned To</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						$queryu ="SELECT *FROM tblleads where status='Ringing' or status='Switch Off'";
						$result = $db->query($queryu);
						$i=1;
						while($row=mysqli_fetch_array($result))
						{
						?>
                        <tr id="r-<?php echo $row['id']?>">
                          <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
                          <td class="clr-blue"><?php echo $i; ?></td>
                          <td><b style="font-size:14px"><?php echo $row['company_name']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['client_name']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['email']; ?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['mobile']; ?></b></td>
                            
                          <td style="display:inline-flex">
                              <!--<a href="totalcontact.php?did=<php echo $row['id'];?>"><i class="fa fa-delete" title="Permanent Delete"><img src="https://play-lh.googleusercontent.com/Si72P4Dn-_54FeMqGtnDOAOwYcHVIAnSzB8OpeYp8BTP0xNUx0S_G4Cv5rxhlNPK2CA" style="width:30px"></i></a> -->
                              
                              <b style="font-size:14px"><?php echo $row['status']; ?></b>
                              
                          </td>
                          <td><b style="font-size:14px"><?php echo $row['assign_to']; ?></b></td>
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
<script type="text/javascript">
  $(document).on('click', '.getid', function(){  
   var id = $(this).attr("id");
   $.ajax({  
        url:"ajax/get_blockparties.php",  
        method:"POST",  
        data:{id:id},    
        success:function(data){  
    $('#getdata').html(data);
        }  
   });  
});
</script>
<div class="modal display-data-table-area fade" id="myModal">
  <div class="modal-dialog my-modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header"> <span class="modal-title">Block Parties</span>
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="table-responsive">
          <div id="getdata"></div>
        </div>
      </div>
    </div>
  </div>
</div>
