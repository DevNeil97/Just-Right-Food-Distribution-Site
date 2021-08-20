<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invaliduid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function invalidemail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function passwdmatch($pwd, $pwdRepeat) {
	$result;
	if ($pwd !== $pwdRepeat){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function uidexists($conn, $username, $email) {
 	$sql = "SELECT * FROM customer WHERE cstr_Uid = ? OR cstr_email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultdata = mysqli_stmt_get_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultdata)) {
  		return $row;
	}
	else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
	 
}
function createUser($conn, $name, $email, $username, $pwd) {
 	$sql = "INSERT INTO customer (cstr_Name, cstr_email, cstr_Uid, password_hash) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=stmtfailed");
		exit();
	}
	
	$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedpwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../register.php?error=none");
	exit();
	
}
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)){
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $pwd) {
	$uidexists = uidexists($conn, $username, $username);
	
	if ($uidexists === false) {
		header("location: ../account.php?error=wronglogin");
		exit();
	}
	
	$pwdhashed = $uidexists["password_hash"];
	$checkPwd = password_verify($pwd, $pwdhashed);
	
	if ($checkPwd === false){
		header("location: ../account.php?error=wronglogin");
		exit();	
	}
	else if ($checkPwd === true) {
		session_start();
		$_SESSION["cstr_id"] = $uidexists["cstr_Id"];
		$_SESSION["cstr_uid"] =	$uidexists["cstr_Uid"];
		header("location: ../index.php");
		exit();
	}
	
}

?>