<?php

session_start();

$con = mysqli_connect('localhost','vipul','vipul');

if($con){
	echo "connection successful";
}else{
	echo"no connection";
}

mysqli_select_db($con,'recipe_db');

$name = $_POST['user'];
$pass = $_POST['password'];

$q = "select * from signin where name = '$name' && password ='$pass' ";
$result = mysqli_query($con , $q);

$num = mysqli_num_rows($result);

if($num == 1){
	$_SESSION['username'] = $name;
	header('location:home.php');
}else{
	header('location:login.php');
	alert("New User:-Sign Up First");
}
?>