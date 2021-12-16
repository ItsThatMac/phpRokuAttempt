<?php

session_start();

if (! $_SESSION['username']) {
	echo "Only logged in users may access this page. Click <a href='login_form.php' </a> to login";
	exit;
}



include "db_connect.php";
$newJokeQ = $_GET["newJokeQ"];
$newJokeA = $_GET["newJokeA"];
$userid = $_SESSION['id'];

$newJokeQ = addslashes($newJokeQ);
$newJokeA = addslashes($newJokeA);


$stmt = $mysqli->prepare("INSERT INTO jokes_table (JokeID, Joke_Question, Joke_Answer, users_idusers) VALUES (NULL, ?, ?, ?)");

$stmt->bind_param("ssi", $newJokeQ, $newJokeA, $userid);

$stmt->execute();
$stmt->store_result();

include "search_AllJokes.php";

?>

<a href="index.php">Return to main page</a>