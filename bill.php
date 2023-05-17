<?php
include("inc/config.php"); 
include('lock.php');

$queryus ="SELECT *FROM tblinvoice2 where id='".$_GET['pid']."'";
$results = $db->query($queryus);
$rows=mysqli_fetch_array($results);

//$queryu ="SELECT *FROM tblleads where id='".$rows['client_id']."'";
//$result = $db->query($queryu);
//$row=mysqli_fetch_array($result);

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'seven', 8 => 'Eight', 9 => 'nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
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

        
		<title>Worlds India Invoice</title>
        
       
    <style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); 
body {
	font-family: sans-serif;
	font-size: 10pt;
}

p {
	margin: 0pt;
	font-family: 'Poppins', sans-serif;
}
td {
	vertical-align: top;
}
.center{
	text-align:center;
}
.right{
	text-align:right;
}
.pd-10{
	padding:10px;
}	
.invoice-box{
	border:2px solid #000 !important;
	width:900px;
	margin-right: auto;
	margin-left: auto;
}
.worlds-india-details{
	border-bottom: 2px solid #000;
}
.title-h2{
   font-family: 'Poppins', sans-serif;
   font-size:22px;
   margin-top:5px;
   margin-bottom:5px;
   font-weight:600;
}
.title-h3{
   font-family: 'Poppins', sans-serif;
   font-size:18px;
   margin-top:5px;
   margin-bottom:5px;
   font-weight:600;
}
table tr td{
   font-family: 'Poppins', sans-serif;
}

img{
	width:100%;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
.performa-invoice-no p{
	border-bottom: 2px solid #000;;
	border-spacing: 0;
}

.bdr-bottom td{
	border-bottom:2px solid #000;
}
.bdr-right td{
	border-right:2px solid #000;
	vertical-align: middle;
}
.bdr-right td:last-child{
	border-right:none;
}
.prd-desc-height{
	height:50px;
}
.inv-logo{
	width:275px;
}

    </style>
</head>

<body>
   
   <p style="text-align: right;
    margin-top: 13px;
    margin-right: 225px;"><button onclick="window.print()">Print</button></p>
   
    <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;"><h2 class="text-center title-h2">Payment receipt</h2></td>
        </tr>        
    </table>
    
    <div class="invoice-box">
    
    <div class="worlds-india-details">
     <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="50%" style="border-right: 2px solid #000;" class="pd-10"> 
            	<img src="css/logo.png" class="inv-logo"> 
            	<h2 class="title-h2">Web Intermesh Pvt Ltd</h2>
                <p>17/4 2nd Floor Near Tilak Nagar Metro Station Gate No. 2 </p>                            
                <p>Tilak Nagar New Delhi 110018</p>                            
                <p>PAN NO : - AACCW5857C</p>                            
                <p>GSTIN NO:- 07AACCW5857C1Z9</p>                            
                <p>STATE NAME- DELHI, CODE-07, </p>                            
                <p>PHONE:- 011-42512524 | E-Mail-info@worldsindia.com</p> 
           </td>
            
            <td width="25%" style="border-right:2px solid #000; text-align: center;">
                <div class="performa-invoice-no">
                    <p class="pd-10"><strong>Payment receipt No</strong></p>
                    <p class="pd-10"><strong><?php echo $rows['invoice_no']; ?></strong></p>
                </div>
            </td>
       
            <td width="25%" style="text-align: center;">
                <div class="performa-invoice-no">
                    <p class="pd-10"><strong>Date</strong></p>
                    <p class="pd-10"><strong><?php echo $rows['invoice_date']; ?></strong></p>
                </div>
            </td>
        </tr>
     </table>
    </div>
    
    
     <div class="worlds-india-details">
      <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="50%" style="border-right: 2px solid #000;" class="pd-10"> 
            	<h2 class="title-h2">Buyer:-</h2><br>
                <h2 class="title-h2"><?php echo $rows['company_name']; ?></h2>
                <p><?php echo $rows['address']; ?></p>                                                       
                                           
                                           
                <p>MOB NO:- <?php echo $rows['mobile']; ?> |<br> E-Mail-<?php echo $rows['email']; ?></p> 
           </td>
            
            <td width="50%" style="text-align: center;">
               
            </td>
        </tr>
      </table>
    </div>

    <table  width="100%" style="font-size: 14px;">
        <thead>
            <tr class="bdr-bottom bdr-right center">
                <td width="12%" class="pd-10"><strong>S.No</strong></td>
                <td width="55%" class="pd-10"><strong>DESCRIPTION</strong></td>
                
              
               
               
                <td width="20%" class="pd-10"><strong>TOTAL</strong></td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <tr class="bdr-bottom bdr-right center prd-desc-height">
                <td class="pd-10">1</td>
                <td class="pd-10"><?php echo $rows['service_name']; ?></td>
               
              
               
               
                <td class="pd-10"><?php echo $rows['amount']; ?></td>
            </tr>
            
           
        </tbody>
    </table>
    
    
    <table class="bdr-bottom bdr-right"  width="100%">
        <tbody>
            <tr>
                <td class="pd-10"><h3 class="title-h3 center"><?php echo getIndianCurrency($rows['subtotal']); ?></h3></td>
            </tr>
        </tbody>
    </table>
    
    
    
    
    <table class="bdr-bottom bdr-right"  width="100%">
        <tbody>
            <tr>
                
            </tr>
        </tbody>
    </table>
    
     <table width="100%" style="font-family: sans-serif;">
        <tr class="bdr-right bdr-bottom">
           
            
            
        </tr>
     </table>
     
     <table width="100%">
        <tbody>
            <tr>
                <td class="pd-10">
                	<h3 class="title-h3">Declaration</h3>
                    <p>We declare that this invoice shows the actual price of the  service described and that all particulars are true & correct.</p>    
                </td>
            </tr>
        </tbody>
    </table>
  </div>
    
    <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;"><h2 class="text-center title-h2">This is a computer generated slip and do not require any signature</h2></td>
        </tr>        
    </table>
    
    
    
</body>
</html>