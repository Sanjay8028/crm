<?php
include('inc/config.php'); 
include('lock.php');
// get keyword
$query = "SELECT keyword,yahoo_rank,bing_rank,google_rank,update_date FROM tblkeyword_report where com_id='".$_GET['id']."'";
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
header('Content-Disposition: attachment; filename=KeywordRank.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Keyword', 'Yahoo Rank', 'Bing Rank', 'Google Rank', 'Update Date'));
 
if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>