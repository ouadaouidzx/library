<?php
include "header.php";
// include header//////////////
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login student</title>
</head>
<body>
<form class="login" method="post" action="login.php">
<input type="text" name="username" class="form-control" placeholder="username">
<input type="password" name="password" class="form-control" placeholder="password">
<input class="form-control btn-primary" type="submit" name="login">

</form>





<?php
if (isset($_SESSION['username'])) {
	header('location:status.php');
}


if (isset($_POST['login'])) {

	$username=$_POST['username'];
	$password=$_POST['password'];


	if (empty($username) || empty($password)) {
						header("Location: login.php?failed=emptey");

		
	}else{
		if ($stmt=$conn->prepare('SELECT id,password,status from students where username = ?')) {
			$stmt->bind_param('s',$_POST['username']);
			$stmt->execute();
			$stmt->store_result();

			if ($stmt->num_rows>0) {
			$stmt->bind_result($id,$password,$status);
			$stmt->fetch();


			if ($_POST['password']===$password) { 
				
				if ($status>0) {
					//$_SESSION['id']=$id;
					session_start();

				$_SESSION['username']=$username;
				$_SESSION['id']=$id;
				
				//$_SESSION['email']=$email;
				header("Location:status.php");



				
				exit();
				}else{
									header("Location: login.php?failed=notapproved");

				}
				

				
			}
			else{
				header("Location: login.php?failed=wrongpass");
				
			}
		}	else{
							header("Location: login.php?failed=nouser");

			
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