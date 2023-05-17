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

if(isset($_POST['ass'])) 
{

    if($_POST['mid']!='' && $_POST['tid']=='' && $_POST['bid']=='')
    {
        $que .="to_manager='".$_POST['mid']."'";
    }
    if($_POST['mid']=='' && $_POST['tid']=='' && $_POST['bid']!='')
    {
        $que .="assign_to='".$_POST['bid']."'";
    }
    if($_POST['mid']=='' && $_POST['tid']!='' && $_POST['bid']=='')
    {
        $que .="to_teamleader='".$_POST['tid']."'";
    }

    if($_POST['mid']!='' && $_POST['tid']!='' && $_POST['bid']!='')
    {
        $que .="to_manager='".$_POST['mid']."' and to_teamleader='".$_POST['tid']."' and assign_to='".$_POST['bid']."'";
    }

    if($_POST['mid']!='' && $_POST['tid']!='' && $_POST['bid']=='')
    {
        $que .="to_manager='".$_POST['mid']."' and to_teamleader='".$_POST['tid']."'";
    }

    if($_POST['mid']=='' && $_POST['tid']!='' && $_POST['bid']!='')
    {
        $que .="to_teamleader='".$_POST['tid']."' and assign_to='".$_POST['bid']."'";
    }

    if($_POST['mid']!='' && $_POST['tid']=='' && $_POST['bid']!='')
    {
        $que .="to_manager='".$_POST['mid']."' and assign_to='".$_POST['bid']."'";
    }
    $queryu ="SELECT *FROM tblleads where ".$que."";
    $result = $db->query($queryu);
}
else
{
    if(isset($_POST['search']))
    {

    }
    else
    {
        $queryu ="SELECT *FROM tblleads";
        $result = $db->query($queryu);
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
else
{
    if(isset($_POST['ass']))
    {

    }
    else
    {
        $queryu ="SELECT *FROM tblleads";
        $result = $db->query($queryu);
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
        <section class="box">
            <header class="panel_header">
                <h2 class="title float-left btn btn-danger">Total Contact</h2>
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
                        	<div class="row pb-25 pt-10">
                                <div class="col-lg-3 col-md-3 col-12">
                                    <label class="form-label btn btn-info form-control"><b>Manager</b></label>
                                    <select class="form-control" name="mid" id="mid">
                                        <option value="">--Select Manager--</option>
                                        <?php
                                        $queryusm ="SELECT *FROM tblusers where user_type='Manager'";
                                        $resultsm = $db->query($queryusm);
                                        while($rowsm=mysqli_fetch_array($resultsm))
                                        {
                                        ?>
                                        <option value="<?php echo $rowsm['username']; ?>"><?php echo $rowsm['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-12">
                                    <label class="form-label btn btn-info form-control"><b>Team Leader</b></label>
                                        <select class="form-control" name="tid" id="tid">
                                        <option value="">--Team Leader--</option>
                                    </select>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-12">
                                    <label class="form-label btn btn-info form-control"><b>Business Consultant</b></label>
                                        <select class="form-control" name="bid" id="bid">
                                        <option value="">--Select Business Consultant--</option>
                                    </select>
                                </div>                                
                                
                                <div class="col-lg-3 col-md-3 col-12">
                                    <button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="ass">Search</button>
                                </div>
                            
                            </div>
                            
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
                                
                                <div class="col-lg-3 col-md-2 col-12">
                               	   <button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="search" >Search</button>
                                </div>
                            
                            </div>
                        
                        </form>
                    </div>
                
                </div>
            </div>
            
            
            
            <div class="display-data-table-area">
                <!--<div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                    	<button type="submit" class="btn btn-primary" name="delete" onSubmit="return validate();">Delete</button>
                    </div>
                </div>-->
                <div class="table-responsive">
                    <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="3%"><INPUT type="checkbox" onchange="checkAll(this)" /></th>
                                <th width="5%">S No.</th>
                                <th width="15%">Company Name</th>
                                <th width="15%">Client Name</th>
                                <th width="15%">Email Id</th>            
                                <th width="10%">Mobile No.</th>
                                <th width="10%">Assign To</th>
                                <th width="15%">Comment</th>
                                <th width="12%">Action</th>
                            </tr>
                        </thead>
                
                        <tbody>
                            <?php

							$i=1;
							while($row=mysqli_fetch_array($result))
							{
								$queryus ="SELECT *FROM tblhistory where lead_Id='".$row['id']."' ORDER BY id DESC LIMIT 1";
								$results = $db->query($queryus);
								$rows=mysqli_fetch_array($results);
							?>
                            <tr id="r-<?php echo $row['id']?>">
                            <td class="clr-blue"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>" class="checkBoxClass"></td>
                                <td class="clr-blue"><?php echo $i; ?></td>
                                <td><b style="font-size:14px"><?php echo $row['company_name']; ?></b></td>
                                <td><b style="font-size:14px"><?php echo $row['client_name']; ?></b></td>
                                <td><b style="font-size:14px"><?php echo $row['email']; ?></b></td>
                                
                                <td><b style="font-size:14px"><?php echo $row['mobile']; ?></b></td>
                    
                                <td><b style="font-size:14px"><?php echo $row['assign_to']; ?></b></td>
                                <td><b style="font-size:14px"><?php echo substr($rows['remark'], 0, 15); ?></b></td>
                                
                                <td style="display:inline-flex">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" id="<?php echo $row['id']; ?>" class="getid"><i class="fa fa-boo" title="Read More"><img src="https://i.pinimg.com/originals/d9/62/3f/d9623fc777b7498ab50cb37520975ef5.png" style="width:30px;float:left"></i></a>
                                <a href="update-lead.php?id=<?php echo $row['id'];?>"><i class="fa fa-penc" title="Edit"> <img src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-pencil-icon-png-image_313118.jpg" style="width:30px;float:left"></i></a>
                                <a href="history.php?hid=<?php echo $row['id'];?>"><i class="fa fa-histor" title="History"><img src="https://cdn2.iconfinder.com/data/icons/racket-sports-1/24/badminton_Copy-512.png" style="width:30px"></i></a>
                                <!--<a href="#"><i class="fa fa-trash-o" title="Delete"></i></a>-->
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
          </section>  
        </div>
    </section>
</section>  
    
    
    




<?php include('inc/footer.php'); ?>

<script type="text/javascript">
  $(document).on('click', '.getid', function(){  
   var id = $(this).attr("id");
   $.ajax({  
        url:"ajax/get_totalcontact.php",  
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
        <div class="modal-header">
       	  <span class="modal-title">Total Contacts</span>
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


<script type="text/javascript">
$(document).ready(function(){
    $("#mid").change(function(){
        var mid = $(this).val();
        //var ptid = "<?php echo $_POST['telecaller']; ?>";
        $.ajax({
            url: 'ajax/data.php',
            type: 'post',
            data: {mid:mid},
            dataType: 'json',
            success:function(response){
                var len = response.length;
                $("#tid").empty();
                $("#tid").append("<option value=''>--Team Leader--</option>");
                for( var i = 0; i<len; i++){
                    var id = response[i]['username'];
                    var name = response[i]['name'];
                    $("#tid").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    });

});
</script>


<script type="text/javascript">
$(document).ready(function(){
    $("#tid").change(function(){
        var tid = $(this).val();
        //var ttid = "<?php echo $_POST['bid']; ?>";
        $.ajax({
            url: 'ajax/data.php',
            type: 'post',
            data: {tid:tid},
            dataType: 'json',
            success:function(response){
                var len = response.length;
                $("#bid").empty();
                $("#bid").append("<option value=''>--Business Consultant--</option>");
                for( var i = 0; i<len; i++){
                    var id = response[i]['username'];
                    var name = response[i]['name'];
                    $("#bid").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        });
    });

});
</script>