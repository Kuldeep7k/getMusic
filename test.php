<?php
include('config/db_connect.php');
$count = $con->query("SELECT count(id) FROM songs_data ");
$count_row = $count->fetch_assoc();


$range_a = $count_row['count(id)'];
$range_b = $range_a - 31;
echo $range_a,"<br>";
echo $range_b;
?>