<?php
include('inc/config.php'); 
include('lock.php');
// get Users
$query = "SELECT company_name,email,client_name,mobile,address,product,assign_to,regdate FROM tblleads";
if (!$result = mysqli_query($db, $query)) {
    exit(mysqli_error($db));
}
 
$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
 
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=LeadsList.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Company Name', 'Email Id', 'Client Name', 'Mobile', 'Address', 'Product', 'Assigned To', 'Reg Date'));
 
if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>