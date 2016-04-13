<?php

$q = "SELECT CONCAT(price) AS price FROM baler WHERE `user_name` = '$user_name';";
$r = @mysqli_query ($dbc, $q);

// Fetch and print all records
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $price = $row['price'];
}