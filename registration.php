<?php

session_start();
header('location:login.php');
$con = mysqli_connect('localhost','vipul','vipul');

if($con){
	echo "connection successful";
}else{
	echo"no connection";
}

mysqli_select_db($con,'recipe_db');

$name = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];

$q = "select * from signin where name = '$name' && password ='pass' && email = 'email' ";
$result = mysqli_query($con , $q);

$num = mysqli_num_rows($result);
if($num == 1){
	echo "duplicate data";
}else{
	$qy = "insert into signin(name,password,email)values ('$name','$pass','$email')";
	mysqli_query($con,$qy);
}
?>