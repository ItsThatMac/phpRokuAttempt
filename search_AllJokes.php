<?php

// if there are any values in the table, display them one at a time
if($mysqli->connect_errno) {
	echo "Failed to connect to MySql: (" . $mysqli->connecterrno . ") ". $mysqli->connect_error;
}

echo $mysqli->host_info . "<br>";


$mysqli = new mysqli("127.0.0.1", $username, $user_pass, $database_in_use, 3306);
if($mysqli->connect_errno) {
	echo "Failed to connect to MySql: (" . $mysqli->connecterrno . ") ". $mysqli->connect_error;
}

echo $mysqli->host_info . "<br>";

$sql = "SELECT JokeID, Joke_Question, Joke_Answer, users_idusers FROM jokes_table";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br>id: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_Question"]. " " . $row["Joke_Answer"]. "<br> submitted by user: " . $row["users_idusers"]. "<br>";
  }
} else {
  echo "0 results";
}

?>