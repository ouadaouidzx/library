<?php 
include "header.php";
if ($_SESSION['username']) {
	









function latest($what,$table){
global $conn;


	$stmt="SELECT $what from $table";
$result=mysqli_query($conn,$stmt);

if ($result) {
  while ($row=mysqli_fetch_assoc($result)) {
    $title=$row[$what];
    
    echo '
      <p>'.$title.'</p>' ;

    

  }
}

}








 function minou($what,$table){
global $conn;

	$stmt = "SELECT $what FROM $table";
if ($result=mysqli_query($conn,$stmt)) {
    $rowcount=mysqli_num_rows($result);
    return $rowcount;
    
}
}
/*
 function test($tables) {
 $stmttest = $this->pdo->query("SELECT username FROM $tables LIMIT 4");
 $stmttest->execute();
 $this->transactions = $stmttest->fetchAll();
 }
*/
/*

 $statement = $conn->prepare('SELECT * FROM "students" WHERE "id" = ?');
$statement->bindValue(1);
$statement->bindValue(2);
$result = $statement->execute();
echo "Get the 1st row as an associative array:\n";
print_r($result->fetchArray(SQLITE3_ASSOC));
echo "\n";
echo "Get the next row as a numeric array:\n";
print_r($result->fetchArray(SQLITE3_NUM));
echo "\n";

*/




$stmtpending = "SELECT id FROM students where status=0";
if ($result=mysqli_query($conn,$stmtpending)) {
    $rowcountpending=mysqli_num_rows($result);
    
}









?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DASHBORD</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container stats text-center">
<h1>Dashbord</h1>
<div class="row">
<div class="col-md-4">
<div class="minou mem">Members
<span><?php echo minou("id","students"); ?></span></div>

</div>


<div class="col-md-4">
<div class="minou pen">pending Members
	<span><?php echo $rowcountpending; ?></span></div>

</div>

<div class="col-md-4">
<div class="minou book">Books
	<span><?php echo minou("id","books");; ?></span></div>

</div>












</div>
</div>










<!-------------------------------------------------panel ---------------------------->

<div class="container new">
	<div class="row">

		<div class="col-md-6">
			<div class="panel panel-default">  <div class="panel-heading"><i class="fa fa-user"></i> Latest users
			</div>
			<div class="panel-body"> <?php echo latest("username","students");;  ?></div>


			 </div>
		</div>



<div class="col-md-6">
			<div class="panel panel-default">  <div class="panel-heading"><i class="fa fa-book"></i> Latest book
			</div>
			<div class="panel-body"> <?php echo latest("title","books");;  ?> </div>


			 </div>
		</div>





	</div>
</div>












<style type="text/css">

.stats .minou{
	color: white;
	padding: 20px;
	font-size: 20px;
}
.stats .minou span{
	display: block;
	font-size: 50px;
}

.stats .mem{
	background-color: #575fcf;

}
.stats .pen{
	background-color: #0fbcf9;

}
.stats .book{
	background-color: #05c46b;

}
/*panel css*/

.new{
	margin-top: 20px;
}
</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>

<?php 
}
else{
	header("Location: loginadmin.php");
}

?>
</html>