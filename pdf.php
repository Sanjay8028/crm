<?php 
$html = file_get_contents('salary-slip.php');

$html2pdf = new html2pdf();
$html2pdf->writeHTML($html); // pass in the HTML
$html2pdf->output('myPdf.pdf', 'D'); // Generate the PDF and start download
?>
