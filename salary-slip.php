<?php
include("inc/config.php"); 
include('lock.php');

$querys="select *from tblsalaryslip where id='".$_GET['uid']."'";
$results = $db->query($querys);
$rows=mysqli_fetch_array($results,MYSQLI_ASSOC);

$queryss="select *from tblusers where employee_id='".$rows['emp_id']."'";
$resultss = $db->query($queryss);
$rowss=mysqli_fetch_array($resultss,MYSQLI_ASSOC);

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
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

        
		<title>Adsgrill Salery Salip</title>
        
       
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
.personal-details p{
	font-size:16px;
}
.personal-details p span{
	font-weight:600;
}
.company-address p{
	font-weight:600;
	font-size:15px;
	text-align:center;
}


    </style>
</head>

<body>
   
     <p style="text-align: right;
    margin-top: 13px;
    margin-right: 225px;"><input type="button" name="btnprint" value="Print" onclick="printDiv('printableArea')"/></p> 
 <div id="printableArea">  
    <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;"><h2 class="text-center title-h2">PAY SLIP</h2></td>
        </tr>        
    </table>
    
    <div class="invoice-box">
    
    <div class="worlds-india-details">
    <div class="row">

<div class="col-md-6">
    <div >
<img src="images/ads.png" style="height:130px; width:130px" class="inv-logo"> 
</div>
</div>

<div class="col-md-6">
    <div class="pd-10 center company-address">
<h2 class="title-h2">
                Asdgrills Pvt Ltd</h2>
                <p>5B/14, 3rd Floor,</p>                            
                <p>Tilak Nagar New Delhi-110018</p> 
</div>
</div>
</div>
   
     <!-- <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="35%" class="pd-10"> 
            	<img src="images/ads.png"   height="px;" class="inv-logo"> 
           </td>
           
           <td width="40%" style="margin-top: -38%" class="pd-10 center company-address"> 
            	<h2 class="title-h2"> Asdgrills Pvt Ltd</h2>
                <p>5B/14, 3rd Floor,</p>                            
                <p>Tilak Nagar New Delhi-110018</p>     
           </td>
           
           <td width="25%" class="pd-10 company-address"> 
           </td>
        </tr>
     </table> -->
    </div>
    
    <div class="worlds-india-details">
      <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="100%" class="pd-10" style="text-align: center;"> 
            	<h2 class="title-h2">Pay Slip For <?php echo $rows['salary_month']; ?>-<?php echo $rows['salary_year']; ?></h2>
                <h2 class="title-h2"><?php echo $rows['emp_name']; ?> WI- 0004</h2>
           </td>
            
           
        </tr>
      </table>
    </div>
    
    <div class="worlds-india-details personal-details">
      <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="50%" class="pd-10"> 
            	<p><span>Emp Number : </span> WI-<?php echo $rows['emp_id']; ?> </p>
                <p><span>Designation :</span> <?php echo $rowss['user_type']; ?></p>
                <p><span>Location :</span>  Delhi</p>
                <p><span>Bank Details :</span> <?php echo $rowss['bank_account_no']; ?>, <?php echo $rowss['bank_name']; ?></p>
           </td>
            
            <td width="50%" class="pd-10">
                <p><span>Income Tax Number (PAN) :</span>  <?php echo $rowss['pancard_no']; ?></p>
                <p><span>PF Account No :</span> <?php echo $rowss['pfno']; ?></p>
                <p><span>ESI Number :</span> <?php echo $rowss['esino']; ?></p>
                <!-- <p><span>Date of Joining :</span> <?php echo $rowss['joiningdate']; ?></p> -->
                <p><span>Working Days :</span> <?php echo $rows['working_days']; ?></p>
            </td>
        </tr>
      </table>
    </div>
    
    

    <table  width="100%" style="font-size: 14px;">
        <thead>
            <tr class="bdr-bottom bdr-right center">
                <td width="30%" class="pd-10"><strong>Earnings</strong></td>
                <td width="10%" class="pd-10"><strong>Amount</strong></td>
                <td width="15%" class="pd-10"><strong>Gross Salary</strong></td>
                <td width="20%" class="pd-10"><strong>Deductions</strong></td>
                <td width="10%" class="pd-10"><strong>Amount</strong></td>
                <td width="15%" class="pd-10"><strong>Gross Salary</strong></td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <tr class="bdr-bottom bdr-right center prd-desc-height">
                <td class="pd-10"><span>Basic </span></td>
                <td class="pd-10"><?php echo $rows['basic_salary']; ?>.00</td>
                <td class="pd-10"><?php echo $rows['basic_salary']; ?>.00</td>
                <td class="pd-10"><?php //echo $rows['working_days']; ?></td>
                <td class="pd-10"><?php //echo $rows['working_days']; ?></td>
                <td class="pd-10"><?php //echo $rows['working_days']; ?></td>
            </tr>
            
            <tr class="bdr-right bdr-bottom center prd-desc-height">
                <td class="pd-10">HRA</td>
                <td class="pd-10"><?php echo $rows['hra_amt']; ?>.00</td>
                <td class="pd-10"><?php echo $rows['hra_amt']; ?>.00</td>
                <td class="pd-10"></td>
                <td class="pd-10"></td>
                <td class="pd-10">-----</td>
            </tr>
            
            <tr class="bdr-right bdr-bottom center prd-desc-height">
                <td class="pd-10">Conveyance Allowance</td>
                <td class="pd-10"><?php echo $rows['conveyance_amt']; ?>.00</td>
                <td class="pd-10"><?php echo $rows['conveyance_amt']; ?>.00</td>
                <td class="pd-10"></td>
                <td class="pd-10"></td>
                <td class="pd-10">-----</td>
            </tr>
            
            <tr class="bdr-right bdr-bottom center prd-desc-height">
                <td class="pd-10">Variable Pay</td>
                <td class="pd-10"><?php echo $rows['variable_amt']; ?>.00</td>
                <td class="pd-10"><?php echo $rows['variable_amt']; ?>.00</td>
                <td class="pd-10"></td>
                <td class="pd-10"></td>
                <td class="pd-10">-----</td>
            </tr>
            
            <tr class="bdr-right bdr-bottom center prd-desc-height">
                <td class="pd-10">Total Earnings</td>
                <td class="pd-10"><?php echo $rows['gross_salary']; ?>.00</td>
                <td class="pd-10"><?php echo $rows['gross_salary']; ?>.00</td>
                <td class="pd-10">Total Deductions</td>
                <td class="pd-10"><?php //echo $rows['variable_amt']; ?></td>
                <td class="pd-10"><?php //echo $rows['variable_amt']; ?></td>
            </tr>
            
            <tr class="bdr-bottom bdr-right center">
                <td class="pd-10" colspan="4"><h2 class="title-h2 center">Net Amount</h2></td>
                <td class="pd-10"><?php echo $rows['gross_salary']; ?>.00</td>
                <td class="pd-10"><?php echo $rows['gross_salary']; ?>.00</td>
            </tr>
        </tbody>
    </table>
    
    
    <table class="bdr-bottom bdr-right"  width="100%">
        <tbody>
            <tr>
                <td class="pd-10"><h3 class="title-h3 center">Amount Payable (in words)  <?php echo getIndianCurrency($rows['gross_salary']);?>.</h3></td>
            </tr>
        </tbody>
    </table>
    
  </div>
    
    <table width="100%" style="font-family: sans-serif;">
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;"><h2 class="text-center title-h2">This is a computer generated slip and do not require any signature</h2></td>
        </tr>        
    </table>
    
   </div> 
    
   </body>
</html>
<script>
function printDiv(id){
        var printContents = document.getElementById(id).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
}
</script>

