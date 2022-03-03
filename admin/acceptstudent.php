<?php
include "db.php";
session_start();
$idd=$_GET['id'];


if (isset($_GET['id'])) {
	$stmt = "UPDATE `students` SET `status`='1' WHERE `id`='$idd'";
	$result=mysqli_query($conn,$stmt);
	if ($result) {
	echo "sucess";

	}
}





?>

