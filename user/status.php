<?php
include "header.php";
$user=$_SESSION['username'];

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
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php

   if ($_SESSION['username']) {
   
    
  $stmt="SELECT * from demand where student='$user'";
$result=mysqli_query($conn,$stmt);

if ($result) {
	if ($row=mysqli_fetch_assoc($result)) {
		while ($row=mysqli_fetch_assoc($result)) {

		$id=$row['id'];
    $_SESSION['id']=$row['id'];
		$username=$row['book'];
		$password=$row['student'];
		$status=$row['status'];

		if ($status>0) {
			$status='<span class="badge badge-pill badge-primary">Accepted</span>';
		}else{
			$status='<span class="badge badge-pill badge-warning">Pending</span>';
		}
		echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$username.'</td>
      <td>'.$status.'</td>

    </tr>' ;

    

	}
	}else echo "no such data";

	/**/
}




//<a class="btn btn-danger" href="delete.php?id='.$id.'" >DELETE</a>


}

    ?>
  </tbody>
</table>

</div>
<style type="text/css">
.badge{
	font-size: 100%;
}

</style>


</body>
</html>