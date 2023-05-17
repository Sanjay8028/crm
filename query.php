<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

 $uname=$_SESSION['username'];
extract($_POST);

if(isset($_GET['did']))
{
	$did=$_GET['did'];
	
	mysqli_query($db,"delete from query where id='$did'");
	
   $_SESSION['status']=" delete successfully";
	header("location:query.php");
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
          <h2 class="title float-left btn btn-danger">Query Request status </h2>
          
          <?php

if(!empty($_SESSION['status']))
{
	?>
	<label class="class-info"> <?php echo $_SESSION['status'] ?> </label>
	<?php
	unset($_SESSION['status']);
	
}

?>
          
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
              
                <div class="display-data-table-area">
                  <div class="table-responsive">
                    <table id="example-11" class="display table table-hover table-condensed dataTable no-footer" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          
                          <th>S No.</th>
                          <th>Name</th>
                          <th>Query</th>
                          <th>Solution</th>
                          <th>Date</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                           $result=mysqli_query($db,"select * from query");
                           
                           
						$i=1;
				while($row=mysqli_fetch_array($result))
						{
				
						?>
                        <tr id="r-<?php echo $row['id']?>">
                         
                          <td class="clr-blue"><?php echo $i; ?></td>
                          <td><b style="font-size:14px"><?php echo $row['name'];?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['query'];?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['solution'];?></b></td>
                          <td><b style="font-size:14px"><?php echo $row['date'];?></b></td>
                         
                          
                          
                          <td> 
                         
                           <a href="query.php?did=<?php echo $row['id'];?>"><i class="fa fa-trash" title="delete work"></i></a> 
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
<script type="text/javascript">
  $(document).on('click', '.getid', function(){  
   var id = $(this).attr("id");
   $.ajax({  
        url:"ajax/get_allleads.php",  
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
      <div class="modal-header"> <span class="modal-title">All Parties</span>
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
