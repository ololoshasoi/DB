<?php
try {
$pdo=new PDO('mysql:host=Localhost; dbname=company',$login,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}
catch (PDOException $e)
{
$output='Невозможно подключиться к серверу БД'.$e->getMessage();
exit();}

?>