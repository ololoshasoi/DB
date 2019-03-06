<?php
session_start();
$login=$_SESSION['log'];
$password=$_SESSION['pass'];
include '../includes/dbconnectauto.php';

if (isset ($_POST['try']))
 {
     $mon=$_POST['month'];
	 $year=$_POST['year'];
     unset($_POST['try']);
     $sql="Select * FROM company.otchet 
	 WHERE O_month='$mon' and O_year='$year' ";
     include '../includes/select.php';
     include 'takeit.php';
	 exit();
}

if (isset ($_GET['out']))
{ 
   unset($_GET['out']);
header('Location: ../menu/controller_menu.php');
   exit();
 }  
 
include 'parametr_otchet.html';
exit();
?>