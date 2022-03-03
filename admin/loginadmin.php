<?php
include "db.php";
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login admin</title>
</head>
<body>
<form class="login" method="post" action="loginadmin.php">
<input type="text" name="username" class="form-control" placeholder="username">
<input type="password" name="password" class="form-control" placeholder="password">
<input class="form-control btn-primary" type="submit" name="login">

</form>





<?php
if (isset($_SESSION['username'])) {
	header('location:dashbord.php');
}


if (isset($_POST['login'])) {

	$username=$_POST['username'];
	$password=$_POST['password'];


	if (empty($username) || empty($password)) {
						header("Location: loginadmin.php?failed=emptey");

		
	}else{
		if ($stmt=$conn->prepare('SELECT id,password from admin where username = ?')) {
			$stmt->bind_param('s',$_POST['username']);
			$stmt->execute();
			$stmt->store_result();

			if ($stmt->num_rows>0) {
			$stmt->bind_result($id,$password);
			$stmt->fetch();


			if ($_POST['password']===$password) { 
				
				
				//$_SESSION['id']=$id;

				$_SESSION['username']=$username;
				$_SESSION['id']=$id;
				//$_SESSION['email']=$email;
				header("Location:dashbord.php");



				
				exit();

				
			}
			else{
				header("Location: loginadmin.php?failed=wrongpass");
				
			}
		}	else{
							header("Location: loginadmin.php?failed=nouser");

			
		}
		

		}

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