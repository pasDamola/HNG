<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "hng");

$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Test if connection occured
if(mysqli_connect_errno()){
	die("Database connection failed: " .
		mysqli_connect_error().
		"(" . mysqli_connect_errno(). ")"
		);
}
?>


<!DOCTYPE html>
<html>
 <head>

 	<body>
     <?php
      if (isset($_POST["submit"])) {
     $username = trim($_POST["username"]);
	 $password = trim($_POST["password"]);
      $query = "INSERT INTO interns (";
	$query .= " username, password";
	$query .= ") VALUES (";
	$query .= " '{$username}', '{$password}'";
	$query .= ")";

	$result = mysqli_query($connection, $query);

	if ($result) {
		# code...
	  $_SESSION["message"] = "Welcome {$username}, you have successfully joined us.";
	   $message =  $_SESSION["message"];
	   echo $message;
	}
}
     ?>
 		<form action="index.php" method="post">
           
           <input type="text" name="username" placeholder="username"><br><br>
           <input type="password" name="password">
           <button type="submit" name="submit">Submit</button>

 		</form>

 	</body>

 </head>
</html>