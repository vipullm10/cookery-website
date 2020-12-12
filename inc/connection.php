<?php
$host = 'localhost';
$dbase = 'recipe_db';
$user = 'vipul';
$pd = 'vipul';

try{
    $db = new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pd);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'Unable to Connect';
    echo $e->getMessage();
    exit;
    
}

?>