<?php

if (isset($_POST["submit"])){
	
	$name = $_POST["Name"];	
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pass"];
	$pwdRepeat = $_POST["cpass"];
	
	require_once 'db.inc.php';
	require_once 'functions.inc.php';
	
	if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
		header("location: ../register.php?error=emptyinput");
		exit();
	}
	if (invaliduid($username) !== false){
		header("location: ../register.php?error=invaliduid");
		exit();
	}
	if (invalidemail($email) !== false){
		header("location: ../register.php?error=invalidemail");
		exit();
	}
	if (passwdmatch($pwd, $pwdRepeat) !== false){
		header("location: ../register.php?error=passwordsdontmatch");
		exit();
	}
	if (uidexists($conn, $username, $email) !== false){
		header("location: ../register.php?error=usernamealreadyexists");
		exit();
	}
	
	createUser($conn, $name, $email, $username, $pwd);
	
	
}
else {
	header("location: ../register.php");
	exit();	
}
?>
