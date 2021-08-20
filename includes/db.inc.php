<?php

$serverName = "Localhost";
$dBUsername = "1913224";
$dBPassword = "323489";
$dBName = "db1913224";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
	die("connection failed: " . mysqli_connect_error());
}