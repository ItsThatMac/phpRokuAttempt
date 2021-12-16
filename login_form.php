<html>
<header>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</header>

<body>
<h1> Login for Jokes </h1>
<a href="logout.php">Click here to log out<a>
<a href="loginForm.php">Click here to log in<a>
<a href="registerNewUser.php">Click here to register<a><br>


<?php

include "db_connect.php";


//include "search_AllJokes.php";
?>



<form class="form-horizontal" action="process_login.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Please login</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-5">
    <input id="username" name="username" type="text" placeholder="Your username" class="form-control input-md" required="">
    <p class="help-block">Enter a word to search for in the joke table</p>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">
    <p class="help-block">Enter your password</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>


<?php

//include "searchKeyword.php";







$mysqli->close();


?>


</body>


</html>