<?php
include("inc/config.php"); 
include('inc/header.php');
include('lock.php');
include('inc/side.php');
$qtlead = "select *from tblleads";
$rtlead = $db->query($qtlead);
$count=mysqli_num_rows($rtlead);


echo $quled ="SELECT *FROM tblleads where assigns_date='".date('d-m-Y')."'";
$resled = $db->query($quled);
$todaycontact=mysqli_num_rows($resled);

$quledu ="SELECT *FROM tblleads where status=''";
$resledu = $db->query($quledu);
$untuch=mysqli_num_rows($resledu);

$quledt ="SELECT *FROM tblleads";
$resledt = $db->query($quledt);
$totalcontact=mysqli_num_rows($resledt);

$quledtodayf ="SELECT *FROM tblleads where f_date='".date('Y-m-d')."' and status IN ('Interested','Follow-Up')";
$resledtodayf = $db->query($quledtodayf);
$todayflowup=mysqli_num_rows($resledtodayf);

$quledtotalf ="SELECT *FROM tblleads where f_date NOT IN ('".date('Y-m-d')."','')  and status IN ('Interested','Follow-Up')";
$resledtotalf = $db->query($quledtotalf);
$totalflowup=mysqli_num_rows($resledtotalf);

$qupropective ="SELECT *FROM tblleads where update_data='".date('d-m-Y')."' and status='Prospective'";
$rslprop = $db->query($qupropective);
$propective=mysqli_num_rows($rslprop);

$qutotalpropective ="SELECT *FROM tblleads where status='Prospective'";
$rsltotalprop = $db->query($qutotalpropective);
$totalpropective=mysqli_num_rows($rsltotalprop);

$qumateralize ="SELECT *FROM tblleads where status='Materalize'";
$rslmater = $db->query($qumateralize);
$materalize=mysqli_num_rows($rslmater);

$qurblock ="SELECT *FROM tblleads where status='Company Closed / Wrong Number'";
$rsblock = $db->query($qurblock);
$block=mysqli_num_rows($rsblock);

$qurni ="SELECT *FROM tblleads where status='Not Interested'";
$rsni = $db->query($qurni);
$ni=mysqli_num_rows($rsni);





$quledu12 ="SELECT *FROM tblleads where status='Trash'";
$resledu12 = $db->query($quledu12);
$trash=mysqli_num_rows($resledu12);




$quledu122 ="SELECT *FROM tblleads where status='Ringing'";
$resledu122 = $db->query($quledu122);
$Ringing=mysqli_num_rows($resledu122);



$quledu1212 ="SELECT *FROM tblleads where status='Switch Off'";
$resledu1212 = $db->query($quledu1212);
$swi=mysqli_num_rows($resledu1212);





?>
<style type="text/css">
.stats
{
text-align: center;
}
</style>
<!-- START CONTENT -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper row" style=''>

<div class='col-12'>
<div class="page-title">

<div class="float-left">
	<!-- PAGE HEADING TAG - START -->
	<h1 class="title" style="color:#f8f8f8;">
	    <button type="button" class="btn btn-success" style="font-size:18px">Dashboard</button></h1><!-- PAGE HEADING TAG - END -->                            
</div>


</div>
</div>

<div class="clearfix"></div>
<!-- MAIN CONTENT AREA STARTS -->


<div class="col-xl-12">
<section class="box nobox ">
<div class="content-body">

	<div class="row">
		
		<div class="col-lg-4 col-md-4 col-12">
			<a href="today-contact.php">
			<div class="db_box" style="height:230px">
				<div class="stats">
				<span><img src="https://www.seekpng.com/png/detail/14-148741_person-icon-leader-icon-png.png" style="width:120px"></span>	<h4><strong><?php if($todaycontact==''){ echo '0'; }else{ echo $todaycontact; } ?></strong></h4>
					<span style="font-size:18px" class="btn btn-info">TODAYS CONTACT</span>
				</div>
			</div>
			</a>
		</div>
		
	
		
		<div class="col-lg-4 col-md-4 col-12" >
			<a href="untuchparties.php">
			<div class="db_box" style="height:230px">
				<div class="stats">
				    <span><img src="https://img.c3dt.com/SUVpb2lEVkMwWG56UDJ6aVhQRmp6dz09=w200" style="width:120px"></span>
					<h4><strong><?php if($untuch==''){ echo '0'; }else{ echo $untuch; } ?></strong></h4>
					<span style="font-size:18px" class="btn btn-info">UNTOUCH PARTIES</span>
				</div>
			</div>
			</a>
		</div>
		 
		
		<div class="col-lg-4 col-md-4 col-12">
			<a href="totalcontact.php">
			<div class="db_box" style="height:230px">
				<div class="stats">
				    <span><img src="https://pngimage.net/wp-content/uploads/2018/06/logo-people-png.png" style="width:180px"></span>
					<h4><strong><?php if($totalcontact==''){ echo '0'; }else{ echo $totalcontact; } ?></strong></h4>
					<span style="font-size:18px" class="btn btn-info">TOTAL CONTACTS</span>
				</div>
			</div>
			</a>
		</div>

	</div> 	

	<br/><br/>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-12">
			<a href="todays-follow-ups.php">
			<div class="db_box" style="height:230px">
			   
				<div class="stats">
				<span><img src="http://cdn.onlinewebfonts.com/svg/img_180395.png" style="width:130px"></span>
					<h4><strong><?php if($todayflowup==''){ echo '0'; }else{ echo $todayflowup; } ?></strong></h4>
					<span style="font-size:16px" class="btn btn-info">TODAYS FOLLOW-UPS PARTIES</span>
				</div>
			</div>
			</a>
		</div>
		
		
		
		<div class="col-lg-4 col-md-4 col-12">
			<a href="total-follow-ups.php">
			<div class="db_box" style="height:230px">
				<div class="stats">
				    <span><img src="https://p.kindpng.com/picc/s/185-1854247_collection-of-free-time-vector-schedule-calendar-and.png" style="width:115px"></span>
					<h4><strong><?php if($totalflowup==''){ echo '0'; }else{ echo $totalflowup; } ?></strong></h4>
					<span style="font-size:16px" class="btn btn-info">TOTAL FOLLOW-UPS</span>
				</div>
			</div>
			</a>
		</div>
		
	
		
		<div class="col-lg-4 col-md-4 col-12">
			<a href="prospective-leads.php">
			<div class="db_box" style="height:230px">
				<div class="stats">
				     <span><img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/future-1660847-1409378.png" style="width:115px"></span>
					<h4><strong><?php if($propective==''){ echo '0'; }else{ echo $propective; } ?></strong></h4>
					<span style="font-size:16px" class="btn btn-info">TODAYS PROSPECTIVE (LEADS)</span>
				</div>
			</div>
			</a>
		</div>

	</div>

	<br/><br/>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-12">
			<a href="total-prospective-leads.php">
			<div class="db_box" style="height:230px">
				
				<div class="stats">
				    <span><img src="https://anpcoaching.nl/wp-content/uploads/2020/02/img_454531-2.png" style="width:115px"></span>
					<h4><strong><?php if($totalpropective==''){ echo '0'; }else{ echo $totalpropective; } ?></strong></h4>
					<span style="font-size:16px" class="btn btn-info">TOTAL PROSPECTIVE (LEADS)</span>
				</div>
			</div>
			</a>
		</div>
		
		
		
		<div class="col-lg-4 col-md-4 col-12">
			<a href="materalize.php">
			<div class="db_box" style="height:230px">
			   
				<div class="stats">
				    <span><img src="https://cdn-icons-png.flaticon.com/512/1786/1786971.png" style="width:115px"></span>
					<h4><strong><?php if($materalize==''){ echo '0'; }else{ echo $materalize; } ?></strong></h4>
					<span style="font-size:16px" class="btn btn-info">MATERALIZE (MATURE LEADS)</span>
				</div>
			</div>
			</a>
		</div>
		
		
		
		<div class="col-lg-4 col-md-4 col-12">
			<a href="block-parties.php">
			<div class="db_box" style="height:230px">
				<div class="stats">
				    <span><img src="https://cdn2.iconfinder.com/data/icons/prohibited-forbidden-signs/100/Prohibited-01-512.png" style="width:115px"></span>
					<h4><strong><?php if($block==''){ echo '0'; }else{ echo $block; } ?></strong></h4>
					<span style="font-size:16px" class="btn btn-info">BLOCK PARTIES</span>
				</div>
			</div>
			</a>
		</div>

	</div>
	<br/><br/>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-12">
			<a href="not-interested.php">
			<div class="db_box" style="height:230px">
				<div class="stats">
				    <span><img src="https://cdn-icons-png.flaticon.com/512/1027/1027670.png" style="width:115px"></span>
					<h4><strong><?php if($ni==''){ echo '0'; }else{ echo $ni; } ?></strong></h4>
					<span style="font-size:16px" class="btn btn-info">NOT INTERESTED</span>
				</div>
			</div>
			</a>
		</div>
		
		
		
		<div class="col-lg-4 col-md-4 col-12">
				<a href="trash.php">
				<div class="db_box">
					<div class="stats">
					    <span><img src="https://elements-video-cover-images-0.imgix.net/files/2e7093bc-26be-49ac-baab-813c91f0f983/inline_image_preview.jpg?auto=compress%2Cformat&fit=min&h=225&w=400&s=c01211179cef6cf4980ed845c53b793c" style="width:200px"></span>
						<h4><strong><?php if($trash==''){echo '0';}else{ echo $trash; }?></strong></h4>
						<span style="font-size:16px" class="btn btn-info">View Trash</span>
					</div>
				</div>
				</a>
			</div>
			
		
		
			<div class="col-lg-4 col-md-4 col-12">
				<a href="other.php">
				<div class="db_box">
					<div class="stats">
					    <span><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRsJAIj_xMQXCyp6x7FP1FWGho-DabVfwehRESPnnft3pm4cP22UgB0xw2eT4iX102eWc&usqp=CAU" style="width:115px"></span>
						<h4><strong><?php if($Ringing=='' and $swi==''){echo '0';}else{ echo $Ringing+$swi; }?></strong></h4>
						<span style="font-size:16px" class="btn btn-info">Others</span>
					</div>
				</div>
				</a>
			</div>
			
		
		
	</div>
	
<br/>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<h4 style="color:#f8f8f8;">Today's Birth Day</h4>
				<hr>
			</div>

			<?php
			
			$queryub ="SELECT *FROM tblusers";
			$resultb = $db->query($queryub);
			while($rowb=mysqli_fetch_array($resultb))
			{
				if($rowb['dob']!='' && $rowb['status']==1)
				{
				$birthday = new DateTime($rowb['dob']);
				$today = new DateTime(date("Y-m-d"));
				if ($birthday->format("m-d") == $today->format("m-d")) {
			?>
			<div class="col-lg-3 col-md-3 col-12">
				
				<div class="db_box">
					<div class="stats">
						<h4><strong><?php if($rowb['pimg']==''){ ?><img src="../photo/dummy.jpg"/ style="width: 50%;"><?php }else{ ?><img src="../photo/<?php echo $rowb['pimg'];?>" style="width: 50%;"/><?php } ?></strong></h4>
						<span><b>Name :</b> <?php echo $rowb['name'];?></span><br/>
						<span><b>Designation :</b> <?php echo $rowb['user_type'];?></span><br/>
						<a href="wish-birthday-message.php?vid=<?php echo $rowb['id'];?>"><span><b>Sent Birth Day Message </b></span></a>
					</div>
				</div>
			</div>
			
			<?php
			}
			}
			}
			?>
			
		</div>
		
		<div class="content-body wrapper main-wrapper">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<h5 style="color:#f8f8f8;">
				    Birth Day Wishes Messages</h5>
				<hr>

		<table id="example-11" class="display table table-hover table-condensed dataTable no-foote" cellspacing="0" width="100%">
		<thead>
		<tr style="background: #3F51B5;">
		<th style="color:#fff;">S No.</th>
		<th style="color:#fff;">Name</th>
		<th style="color:#fff;">Wishes Message</th>
		</tr>
		</thead>
		<tbody>
		<?php

		$i=1;
		$quem="select *from tblbirthday_wish where vid='".$_SESSION['uid']."' and reg_date='".date('Y-d-m')."' ORDER BY id DESC";
		$rsm = $db->query($quem);
		while($rwm=mysqli_fetch_array($rsm))
		{
		$qusers ="SELECT *FROM tblusers where id='".$rwm['uid']."'";
		$rsu = $db->query($qusers);
		$rwuser=mysqli_fetch_array($rsu);
		?>
		<tr id="r-<?php echo $row['id']?>">
		<td class="clr-blue"><?php echo $i; ?></td>
		<td><?php echo $rwuser['name']; ?></td>
		<td><?php echo $rwm['message']; ?></td>
		</tr>
		<?php
		$i++;
		}
		
		
			$result= mysqli_query($db,"select * from tblbirthday_wish");
		$sn=1;
		while($arr=mysqli_fetch_assoc($result))
			
		{
			$qusers ="SELECT * FROM tblusers where id='".$arr['uid']."'";
		$rsu = $db->query($qusers);
		$rwuser=mysqli_fetch_array($rsu);
			?>
			<tr>
			<td><?php echo $sn; ?></td>
			<td><?php echo $rwuser['name']; ?></td>
			<td><?php echo $arr['message'];?></td>
			</tr>
			
			<?php
		
			 $sn++;
		}
		
		
		
		?>
		</tbody>
		</table>
		</div>
		</div>
		</div>
</div>
</section>
</div>


<!-- MAIN CONTENT AREA ENDS -->
</section>
</section>
<!-- END CONTENT -->

<?php include('inc/footer.php'); ?>


