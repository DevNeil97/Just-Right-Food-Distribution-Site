<?php

session_start();
require_once 'db.inc.php';

if (isset($_POST["add"])){
	
	$postcode = $_POST["postcode"];	
	$county = $_POST["county"];
	$ad_1 = $_POST["address_1"];
	$ad_2 = $_POST["address_2"];
	$mobile = $_POST["cstr_mobile"];
	$id = $_SESSION["cstr_id"];
	
	$sql = "UPDATE customer SET postcode='".$postcode."', county='".$county."', address_1='".$ad_1."', address_2='".$ad_2."', cstr_mobile='".$mobile."' WHERE cstr_id='".$id."'";

	
	$query_run = mysqli_query($conn, $sql);

	if($query_run===TRUE)
	{
		header("location: ../details.php?=updated");
	}
	else
	{
		header("location; ../details.php?=error");
	}
}
else {
	header("loaction: ../details.php");
	exit();
}

?>
