<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');

if(isset($_POST['submit']))
{
    if($_GET['id']!='' && $_GET['eid']=='')
    {
        $qu="select *from tblkeyword_report where com_id='".$_GET['id']."' and keyword='".$_POST['keyword']."'";
        $rq = $db->query($qu);
        $count=mysqli_num_rows($rq);
        //$rowq=mysqli_fetch_array($rq,MYSQLI_ASSOC);
        if($count==0)
        {

            $qu="Insert Into tblkeyword_report (com_id,keyword) 
            Values('".$_GET['id']."','".$_POST['keyword']."')";
            $rs=$db->query($qu);
            $error="Add Successfully !";
        }
        else
        {
           $error="Already Exits Keyword !"; 
        }
    }
    
    if($_GET['id']!='' && $_GET['eid']!='')
    {
            $qu="Update tblkeyword_report set keyword='".$_POST['keyword']."' where id='".$_GET['eid']."'";
            $rs=$db->query($qu);
            $error="Update Successfully !";
    }
}

if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];      

	$id = $_GET['id'];
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 100, ",")) !== FALSE)
         {
            if($getData[0]!='Keyword')
			{
				$sql="Insert Into tblkeyword_report (com_id,keyword,yahoo_rank,bing_rank,google_rank,update_date) Values('".$_GET['id']."','".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".date('Y-m-d')."')";
				$results =$db->query($sql);
				if(!isset($results))
				{
					echo "<script>alert('Invalid File:Please Upload CSV File.'); window.location.assign('add-keyword.php?id=$id');</script>";
				}
				else {

					echo "<script>alert('CSV File has been successfully Imported..'); window.location.assign('view-keyword-report.php?id=$id');</script>";
				}
			}
         }
        
         fclose($file); 
     }
}


    $qus="select *from tbldigitalmarketing_client where id='".$_GET['id']."'";
    $rqs = $db->query($qus);
    $rowq=mysqli_fetch_array($rqs,MYSQLI_ASSOC);
    
    if($_GET['eid']!='')
    {
        $quss="select *from tblkeyword_report where id='".$_GET['eid']."'";
        $rqss = $db->query($quss);
        $row=mysqli_fetch_array($rqss,MYSQLI_ASSOC);
    }

?>

<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper row" style=''>
<div class="clearfix"></div>
<!-- MAIN CONTENT AREA STARTS -->

<div class="col-12">
<section class="box ">
<header class="panel_header"><h2 class="title float-left">Add Keyword For <?php echo $rowq['company_name']; ?> &nbsp; | &nbsp;  Website :- <?php echo $rowq['website_url']; ?></h2></header>
<div class="content-body">
<form  name="importkeyword" action="" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-4 col-md-6 col-12">
    <label class="form-label"><b>Choose A File To Import</b></label>
    <input type="file" name="file" class="form-control">
</div>

<div class="col-lg-4 col-md-6 col-12">
    <button type="submit" class="btn btn-primary btn-mt-20 btn-width-100" name="Import">Import</button> &nbsp;
	<!--<a href="https://crm.webintermesh.com/Import-Keyword.csv" download>Download Import Formate</a>-->
</div>
</div>
</form>
<form name="add" action="" method="POST">
        <p style="text-align: center;color:green;"><?php echo $error; ?></p>

    <div class="row">

       
        <div class="form-group col-12 col-md-6 col-lg-6">
            <label class="form-label">Kewyword Name</label>
            <span class="desc"></span>
            <div class="controls">
                <input type="text" name="keyword" class="form-control" value="<?php echo $row['keyword']; ?>" required="">
            </div>
        </div>


    <div class="col-12 col-md-9 col-lg-8 padding-bottom-30">
        <div class="text-left">
            <?php
            if($_GET['id']!='' && $_GET['eid']!='')
            {
            ?>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <?php
            }
            else
            {
                ?>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                <?php
            }
            ?>
            <button type="button" class="btn">Cancel</button>
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


