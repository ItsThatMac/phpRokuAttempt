<?php

include "db_connect.php";

$newUsername = $_POST['username'];
$newPassword1 = $_POST['password1'];
$newPassword2 = $_POST['password2'];
$newUsername = addslashes($newUsername);
$newPassword1 = addslashes($newPassword1);
$newPassword2 = addslashes($newPassword2);

$hashed_password = password_hash($newPassword1, PASSWORD_DEFAULT);

echo "<h2>Trying to add a new user " . $newUsername . " pw= " . $newPassword1 . " and " . $newPassword2 . "</h2>";

if ($newPassword1 != $newPassword2) {
	echo "The passwords do not match. Please try again";
	echo "<a href = 'index.php'>Return to main</a>";
	exit;
}

preg_match('/[0-9]+/',$newPassword1, $matches);
if (sizeof($matches ) == 0) {
	echo "The password must have at least one number <br>";
	exit;
}

preg_match('/[!@#$%^&*()]+/', $newPassword1, $matches);
if (sizeof($matches ) == 0) {
	echo "The password must have at least one special character like !@#$%^&*()<br>";
	exit;
}

if (strlen($newPassword1) <= 8) {
	echo "The password must be at least 8 characters long <br>";
	exit;
}



// Check to see if user already exists
$sql = "SELECT * FROM users WHERE usersname = '$newUsername'";

$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

if($result->num_rows > 0) {
	// username has already been taken
	echo "The username " . $new_username . " has been taken.";
	echo "<a href = 'index.php'>Return to main</a>";
	exit;
}
// Insert a new user
$sql = "INSERT INTO users (idusers, usersname, password) Values (null, '$newUsername', '$hashed_password')";

$stmt = $mysqli->prepare("INSERT INTO users (idusers, usersname, password) Values (null, ?, ?)");

$stmt->bind_param("ss", $newUsername, $hashed_password);

$result = $stmt->execute();


if ($result) {
	echo "Registration success";
}
else {
	echo "Something went wrong. Not registered";
}

echo "<a href = 'index.php'>Return to main</a>";

?>