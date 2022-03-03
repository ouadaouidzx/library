<?php
	include "header.php";


	if (isset($_POST["update"])) {
		$id=$_SESSION['id'];

		$username=$_POST['username'];
		
		//$email=$_POST['email'];
		$pass=$_POST['password'];


		//$sql="UPDATE 'students' set username='$username',password='$pass' where id=3 ";





		/*$query = "UPDATE admin set  username='" . $username . "', password='" . $pass . "', email='" . $email . "' WHERE id='" . $id . "'"; 
*/
		$query="UPDATE students set username='.$username.',password='.$pass.' WHERE id=$id ";





		$result=mysqli_query($conn,$query);
		if ($result) {
		echo "updated";	
			}
		else{
			echo "something went wrong";
		}
}








	?>

	<h1>Edit profile</h1>

	<div class="container">
<form class="form-horizontal" action="manage.php" method="post">
<div class="form-group">
<label class="col-sm-2 control-label" >username</label>
<div class="col-sm-10">
<input type="text" name="username" class="form-control" value=" <?php echo $_SESSION['username'] ?> "></div>

</div>
<!--
<div class="form-group">
<label class="col-sm-2 control-label">email</label>
<div class="col-sm-10">
<input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email'] ?>"></div>

</div>
-->



<div class="form-group">
<label class="col-sm-2 control-label">password</label>
<div class="col-sm-10">
<input type="password" name="password" class="form-control"></div>

</div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" value="update" class="btn btn-primary" name="update"></div>

</div>

</form>

</div>















