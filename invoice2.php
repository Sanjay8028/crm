<?php
include("inc/config.php"); 
include('lock.php');

$queryus ="SELECT *FROM tblinvoice where id='".$_GET['pid']."'";
$results = $db->query($queryus);
$rows=mysqli_fetch_array($results);

//$queryu ="SELECT *FROM tblleads where id='".$rows['client_id']."'";
//$result = $db->query($queryu);
//$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700,800" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="assets/css/favicon.png">

		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/icofont.min.css">
		<link rel="stylesheet" href="css/style.css">
        
        
		<title>Test Example</title>
        
 <style>
 	.text-center{
		text-align:center;
	}
	.text-right{
		text-align:right;
	}
	.logo img{
		width: 250px;
	}
	.worlds-india-details h2{
		font-size:24px;
	}
	.worlds-india-details p{
		margin-bottom:5px;
	}
	.buyers-details p{
		margin-bottom:5px;
	}
	.buyers-details h2{
		font-size:24px;	
	}
	.print-row{
		width:100%;
	}
	.print-column-3{
		width:25%;
		float:left;
	}
	
	.print-column-6{
		width:50%;
		float:left;
	}
 h2{
		font-size:24px;	
	}
 
 </style>       
 
        
        
</head>

	<body>
	
		<!-- desktop menu start here -->
		<div class="top-header">
        	<div class="container">
            	<div class="row">
                	<div class="col-lg-12 col-12">
                    	<h2 class="text-center">Performa Invoice</h2>
                    </div>
            	</div>
            </div>  
        </div>
		
		
		<div class="top-header">
        	<div class="container">
            	<div class="row">
					<div class="col-md-6 print-column-6" style="float:left;">
                    	<p><strong>PI  Invoice No.</strong></p>
                        <p><strong><?php echo $rows['invoice_no']; ?> </strong></p>
                    </div>
                    
                    <div class="col-md-6 print-column-6 text-right">
                    	<p><strong>Date </strong></p>
                        <p><strong><?php echo date('d-m-Y'); ?> </strong></p>
                    </div>
            	</div>
            </div>  
        </div>
		
        
        <div class="section-middle">
        	<div class="container">
            	<div class="row print-row">
					<div class="col-md-6 print-column-6">
                    	<div class="worlds-india-details">
                        	<div class="logo">
								<img src="css/logo.png">
							</div>	
							<h2>Web Intermesh Pvt Ltd</h2>
                            <p>17/4 2nd Floor Near Tilak Nagar Metro Station Gate No. 2 </p>                            
                            <p>Tilak Nagar New Delhi 110018</p>                            
                            <p>PAN NO : - AACCW5857C</p>                            
                            <p>GSTIN NO:- 07AACCW5857C1Z9</p>                            
                            <p>STATE NAME- DELHI, CODE-07, </p>                            
                            <p>PHONE:- 011-42512524 | E-Mail-info@worldsindia.com</p>                        
                        </div>
                    </div>
                    
					<div class="col-md-6 print-column-6">
                    	<div class="buyers-details">
                        	<h2>Buyer:-</h2>
                            <h2><?php echo $rows['company_name']; ?></h2>
                            <p><?php echo $rows['address']; ?></p>                                    
                            <p>GSTIN NO:- <?php echo $rows['gst_no']; ?></p>                            
                            <p>STATE NAME- <?php echo $rows['state']; ?> </p>                            
                            <p>MOB NO:- <?php echo $rows['mobile']; ?> | E-Mail-<?php echo $rows['email']; ?></p>     
                        </div>
                    </div>                   
                </div>        
            </div>
        </div>
        
        
       <section class="description-details">
            <div class="container">
                <div class="row">
					<div class="table-responsive-sm">
						<table class="table table-striped">
							<thead>
								<tr>
									<th class="center">S.No</th>
									<th>DESCRIPTION</th>
									<th>HSN/SAC</th>
									<th class="right">IGST RATE</th>
									<th class="center">Qty</th>
									<th class="center">Rate</th>
									<th class="right">Total</th>
								</tr>
							</thead>							
							
							<tbody>
								<tr>						
									<td class="center">1</td>
									<td class="left strong"><?php echo $rows['service_name']; ?></td>
									<td class="left">998361</td>
									<td class="right"><?php echo $rows['gst']; ?>%</td>
									<td class="center">1</td>
									<td class="right"><?php echo $rows['amount']; ?></td>
									<td class="right"><?php echo $rows['subtotal']; ?></td>
								</tr>
								
															
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-6 col-sm-5">	</div>

					<div class="col-lg-4 col-sm-5 ml-auto">
						<table class="table table-clear">
							<tbody>
								<tr>
									<td class="left">
									<strong>Total</strong>
									</td>
									<td class="right"><?php echo $rows['amount']; ?></td>
								</tr>
								
								<tr>
									<td class="left">
									<strong>Output IGST@18%</strong>
									</td>
									<td class="right"><?php echo $rows['gst_amount']; ?></td>
								</tr>						
																
								<tr>
									<td class="left">
									<strong>Total Payable</strong>
									</td>
									<td class="right">
									<strong><?php echo $rows['subtotal']; ?></strong>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>	

				<div class="row">								
					<div class="col-lg-12">
						<h2>This is a computer generated slip and do not require any signature</h2>
					</div>					
				</div>	
            </div>
        </section>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
 </html>