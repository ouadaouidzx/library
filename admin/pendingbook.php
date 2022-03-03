<?php
include "header.php";?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="container">
<style type="text/css">
.table{
	margin-top: 20px;
}
</style>


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Book</th>
      <th scope="col">Student</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php
$stmt="SELECT * from demand where status=0";
$result=mysqli_query($conn,$stmt);

if ($result) {
	while ($row=mysqli_fetch_assoc($result)) {
		$id=$row['id'];
		$book=$row['book'];
		$student=$row['student'];
		echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$book.'</td>
      <td>'.$student.'</td>
      <td><a class="btn btn-success" href="acceptbook.php?id='.$id.'">accept</a></td>

    </tr>' ;

    

	}
}








    ?>
  </tbody>
</table>

</div>




</body>
</html>