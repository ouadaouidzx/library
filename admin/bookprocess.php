<?php
$page=$_GET['page'];
////////////////////UPDATE PAGE//////////////

if ($page=='update') {

	include "header.php";





if (isset($_GET['id'])) {
	$id=$_GET['id'];
	echo $id;
	$stmt="SELECT * from books where id=$id";
    $result=mysqli_query($conn,$stmt);

if ($result) {
	$row=mysqli_fetch_assoc($result);
		$id=$row['id'];
		$title=$row['title'];
        $author=$row['author'];


	
	}}

	if (isset($_POST['login'])) {
		$idd=$_POST['id'];

		$title1=$_POST['title1'];
		$author1=$_POST['author1'];
		$stmt = "UPDATE `books` SET `title`='$title1' ,`author`='$author1'  WHERE `id`='$idd'";
	$result=mysqli_query($conn,$stmt);
	if ($result) {
	echo "sucess";

	
	
	}}

	?>
	<h1>update book</h1>

	<div class="container">
<form class="form-horizontal" action="bookprocess.php?page=update" method="post">
<div class="form-group">
<label class="col-sm-2 control-label" >title</label>
<div class="col-sm-10">
<input type="text" name="title1" class="form-control" value="<?php echo $title; ?>" ></div>

</div>

<div class="form-group">
<label class="col-sm-2 control-label">author</label>
<div class="col-sm-10">
<input type="text" name="author1" class="form-control" value="<?php echo $author; ?>"></div>
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

	$stmt="DELETE from books where id=$id";
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
	$title=$_POST['title'];
	$author=$_POST['author'];


	$stmt=("INSERT into books (title,author) values ('$title','$author')");
	$result=mysqli_query($conn,$stmt);
	if ($result) {
		echo ("sucess");
	}else{
		echo"failed";
	}
}


?>

<h1>Add book</h1>

	<div class="container">
<form class="form-horizontal" action="bookprocess.php?page=add" method="post">
<div class="form-group">
<label class="col-sm-2 control-label" >title</label>
<div class="col-sm-10">
<input type="text" name="title" class="form-control" ></div>

</div>

<div class="form-group">
<label class="col-sm-2 control-label">author</label>
<div class="col-sm-10">
<input type="text" name="author" class="form-control" ></div>

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