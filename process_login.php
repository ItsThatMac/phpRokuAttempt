<?php

session_start();



error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";

$username = $_POST["username"];
$password = $_POST["password"];
$username = addslashes($username);
$password = addslashes($password);

echo "You attempted to login with " . $username . " and " . $password . "<br>";

$stmt = $mysqli->prepare("SELECT idusers, usersname, password FROM users WHERE usersname = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($uid, $uname, $pw);

if ($stmt->num_rows == 1) {
	echo "I found one person with that username <br>";
	$stmt->fetch();
	if (password_verify($password, $pw)) {
		echo "The password matches <br>";
		echo "Login Succesful!<br>";
		$_SESSION['username'] = $uname;
		$_SESSION['id'] = $uid;
		echo "<br><a href='index.php'>Return to Main page</a>";
		exit;
	}
	else{
		echo "0 results. Nobody with that username and/or password";
		$_SESSION = [];
		session_destroy();
		echo "<br><a href='index.php'>Return to Main page</a>";
	}
		
}
else {
	echo "0 results. Nobody with that username and/or password";
	$_SESSION = [];
	session_destroy();
	echo "<br><a href='index.php'>Return to Main page</a>";
}
echo "<br>Login Failed<br>";


echo "SESSION = <br>";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";



?>