<?php
$page=$_GET['page'];
////////////////////UPDATE PAGE//////////////

if ($page=='update') {

	include "header.php";





if (isset($_GET['id'])) {
	$id=$_GET['id'];
	echo $id;
	$stmt="SELECT * from students where id=$id";
    $result=mysqli_query($conn,$stmt);

if ($result) {
	$row=mysqli_fetch_assoc($result);
		$id=$row['id'];
		$username=$row['username'];
        $password=$row['password'];


	
	}}

	if (isset($_POST['login'])) {
		$idd=$_POST['id'];

		$username1=$_POST['username1'];
		echo $username1;
		$password1=$_POST['password1'];
		$stmt = "UPDATE `students` SET `username`='$username1' ,`password`='$password1'  WHERE `id`='$idd'";
	$result=mysqli_query($conn,$stmt);
	if ($result) {
	echo "sucess";
	header("Location:students.php");

	
	
	}}

	?>
	<h1>updatebook</h1>

	<div class="container">
<form class="form-horizontal" action="process.php?page=update" method="post">
<div class="form-group">
<label class="col-sm-2 control-label" >Username</label>
<div class="col-sm-10">
<input type="text" name="username1" class="form-control" value="<?php echo $username; ?>" ></div>

</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password</label>
<div class="col-sm-10">
<input type="text" name="password1" class="form-control" value="<?php echo $password; ?>"></div>
</div>




<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input class="form-control btn-primary" type="submit" name="login">


</div>
<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"></div>
</form>

</div>


	<?php
	
}

////////////////////END UPDATE PAGE//////////////







/*******DELETE PAGE******/

elseif ($page=='delete') {

include "db.php";

if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$stmt="DELETE from students where id=$id";
	$result=mysqli_query($conn,$stmt);
	if ($result) {
		echo "sucess";
	}
}	
}
/***********END DELETE PAGE********/

/*********ADD PAGE *****************/
elseif ($page=='add') {
	include "header.php";

if (isset($_POST['ADD'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];


	$stmt=("INSERT into students (username,password,status) values ('$username','$password',1)");
	$result=mysqli_query($conn,$stmt);
	if ($result) {
		echo ("sucess");
	}else{
		echo"failed";
	}
}


?>

<h1>Add Student</h1>

	<div class="container">
<form class="form-horizontal" action="process.php?page=add" method="post">
<div class="form-group">
<label class="col-sm-2 control-label" >username</label>
<div class="col-sm-10">
<input type="text" name="username" class="form-control" ></div>

</div>

<div class="form-group">
<label class="col-sm-2 control-label">password</label>
<div class="col-sm-10">
<input type="password" name="password" class="form-control" ></div>

</div>




<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" value="add" class="btn btn-primary" name="ADD"></div>

</div>

</form>

</div>


<?php 
}
/************END ADD PAGE********/


else{
	echo "there is no such page";
}
?>