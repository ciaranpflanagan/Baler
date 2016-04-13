<?php

// Get Price Function
function get_price($user_name, $dbc)
{
	$q = "SELECT `price` FROM baler WHERE `user_name` = '$user_name';";
	$r = @mysqli_query ($dbc, $q);

	$price = $r;
	return $price;
}