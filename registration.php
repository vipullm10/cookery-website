<?php
session_start();
header('location:login.php');
$host = 'localhost';
$dbase = 'recipe_db';
$user = 'vipul';
$pd = 'vipul';

try{
    $db = new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pd);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$name = $_POST['user'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$stmt = $db->prepare("insert into signin(user,password,email)values ('$name','$pass','$email')");
	$stmt->execute();
}catch(Exception $e){
    echo 'Unable to Connect';
    echo $e->getMessage();
    exit;
    
}

try{
	$query = 'select * from signin where user = ':name' && password =':pass' && email = ':email' ';    
	$statement = $db->prepare($query);
	$statement->bindParam(':name',$name);
	$statement->bindParam(':pass',$pass);
	$statement->bindParam(':email');
	$statement->execute();
	$comments = $statement->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
	echo "Could not retrieve comments. ".$e->getMessage();
	exit;
}



$stmt = $db->prepare("select * from signin where user = '$name' && password ='$pass' && email = '$email' ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$num = mysqli_num_rows($stmt->fetchAll(result));
if($num == 1){
	echo "duplicate data";
}else{
	$qy = "insert into signin(user,password,email)values ('$name','$pass','$email')";
	mysqli_query($db,$qy);
}
?>
