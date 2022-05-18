<?php
define('MYSQL_HOST','localhost');
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_DB_NAME','motoweb');
try{
    $conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB_NAME,MYSQL_USER,MYSQL_PASSWORD);
}
catch (PDOException $e){
    echo 'erro ao conectar com o MYSQL:'.$e->getMessage();
}
$conn->exec("set names utf8");
?>