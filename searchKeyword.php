<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";
$keywordFromForm = $_GET["keyword"];
$keywordFromForm = addslashes($keywordFromForm);

$keywordFromForm = "%". $keywordFromForm . "%";




echo "<h2> Show all jokes with the word $keywordFromForm </h2>";

$stmt = $mysqli->prepare("SELECT JokeID, Joke_Question, Joke_Answer, users_idusers, usersname
FROM jokes_table 
JOIN users ON users.idusers = jokes_table.users_idusers 
WHERE Joke_Question LIKE ?");

$stmt->bind_param("s", $keywordFromForm);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($jid, $jq, $ja, $uid, $uname);


if ($stmt->num_rows > 0) {
  // output data of each row

  while($row = $stmt->fetch()) {
		$safe_jokeQ = htmlspecialchars($jq);
		$safe_JokeA = htmlspecialchars($ja);
        echo "<br> id: " . $jid. " - Joke Question: " . $safe_jokeQ. " " . $safe_JokeA. "<br> submitted by user: " . $uname. "<br>";
  }
} 
else {
  echo "0 results";
}



?>