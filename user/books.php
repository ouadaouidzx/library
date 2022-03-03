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
      <th scope="col">TITLE</th>
      <th scope="col">AUTHOR</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php
$stmt="SELECT * from books";
$result=mysqli_query($conn,$stmt);

if ($result) {
	while ($row=mysqli_fetch_assoc($result)) {
		$id=$row['id'];
		$username=$row['title'];
		$password=$row['author'];
		echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$username.'</td>
      <td>'.$password.'</td>
      <td><a class="btn btn-success" href="demand.php?userid='.$_SESSION['id'].'&bookid='.$username.'">DEMAND</a></td>

    </tr>' ;

    

	}
}








    ?>
  </tbody>
</table>

</div>
</body>
</html>