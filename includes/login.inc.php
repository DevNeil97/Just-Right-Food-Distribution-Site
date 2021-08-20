<?php

if (isset($_POST["submit"])) {
	
	$username = $_POST["uid"];
	$pwd = $_POST["pass"];
	
	require_once 'db.inc.php';
	require_once 'functions.inc.php';
	
	if (emptyInputLogin($username, $pwd) !== false){
		header("location: ../account.php?error=emptyinput");
		exit();
	}
	
	loginUser($conn, $username, $pwd);
}
else {
	header("loaction: ../account.php");
	exit();
}
?>