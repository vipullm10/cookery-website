<?php
$host = 'localhost';
$dbase = 'my_apron';
$user = 'chandan';
$pd = 'chandan';

try{
    $db = new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'Unable to Connect';
    echo $e->getMessage();
    exit;
    
}

?>