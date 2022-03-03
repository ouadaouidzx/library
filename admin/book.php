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
$stmt="SELECT * from books";
$result=mysqli_query($conn,$stmt);

if ($result) {
	while ($row=mysqli_fetch_assoc($result)) {
		$id=$row['id'];
		$title=$row['title'];
    $author=$row['author'];
		echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$title.'</td>
      <td>'.$author.'</td>
      <td><a class="btn btn-success" href="bookprocess.php?page=update&id='.$id.'" >UPDATE</a>
			<a class="btn btn-danger" href="bookprocess.php?page=delete&id='.$id.'" >DELETE</a></td>

    </tr>' ;

    

	}
}




/*

if (isset($_POST['login'])) {
  $title=$_POST['title'];
  $author=$_POST['author'];
    //$if=$_SESSION['id'];
    $stmt = "UPDATE `books` SET `title`='$title' ,`author`='$author'  WHERE `id`='$id'";
  $result=mysqli_query($conn,$stmt);
  if ($result) {
  echo "sucess";

  }}

*/



    ?>
  </tbody>
</table>

 <a href="bookprocess.php?page=add" class="btn btn-primary">add book</a>

</div>
</body>
</html>