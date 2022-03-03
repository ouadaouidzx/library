<?php
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup student</title>
</head>
<body>
<form class="login" method="post" action="signup.php">
<input type="text" name="username" class="form-control" placeholder="username">
<input type="password" name="password" class="form-control" placeholder="password">
<input class="form-control btn-primary" type="submit" name="signup">

</form>





<?php

if (isset($_POST['signup'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$stmt="INSERT into students (username,password,status) values('$user','$pass',0)";
	$result=mysqli_query($conn,$stmt);
	if ($result) {
		echo "sucess";
	}
}




?>





<style type="text/css">

.login{
	width: 300px;
	margin: 100px auto;
}
.login input{
	margin-bottom: 10px;
}
</style>
</body>
</html>