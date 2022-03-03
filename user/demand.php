<?php
include "db.php";
session_start();

$student= $_SESSION["username"];
$book=$_GET['bookid'];

if (isset($_GET['bookid'])) {
	$stmt="INSERT into demand (book,student) values ('$book','$student')";
	$result=mysqli_query($conn,$stmt);
	if ($result) {
		echo "suces";
	}
}








else{
	echo "none";
}



 ?>