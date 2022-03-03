<?php
include "header.php";




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="container">
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
$stmt="SELECT * from students";
$result=mysqli_query($conn,$stmt);

if ($result) {
	while ($row=mysqli_fetch_assoc($result)) {
		$id=$row['id'];
		$username=$row['username'];
    $password=$row['password'];
		echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$username.'</td>
      <td>'.$password.'</td>
      <td><a class="btn btn-success" href="process.php?page=update&id='.$id.'" >UPDATE</a>
			<a class="btn btn-danger" href="process.php?page=delete&id='.$id.'" >DELETE</a></td>

    </tr>' ;

    

	}
}








    ?>
  </tbody>
</table>

 <a href="process.php?page=add" class="btn btn-primary">add student</a>

</div>
</body>
</html>