<?php
session_start();
$login=$_SESSION['log'];
$password=$_SESSION['pass'];
include '../includes/dbconnectauto.php';

if (isset($_GET['send']))
{
    unset($_GET['send']);
    $surname=$_GET['surname'];
	$_SESSION['surname']=$surname;
	$age=$_GET['age'];
	$_SESSION['age']=$age;
	$pol=$_GET['ppol'];
	$address=$_GET['address'];
	$vacancy=$_GET['vybor'];
    $_SESSION['vacancy']=$vacancy;
    $sql="Select * FROM company.candidate 
	WHERE Can_surname='$surname' and Age='$age' ";
	include '../includes/select.php';
	if ($flag==0)
	{
 	$sql="INSERT INTO company.candidate VALUES  (NULL, '$pol', '$surname', '$address','$age')";
    $s=$pdo->prepare($sql);
    $s->execute();
	}
	include 'interview.php';
	exit();
}

if (isset($_GET['sendit']))
{
    
    unset($_GET['sendit']);
	$vacancy=$_SESSION['vacancy'];
	$family=$_GET['family'];
	$_SESSION['family']=$family;
	include 'intdate.php';
	exit();
 }
 
 if (isset($_GET['send3']))
{
    
    unset($_GET['send3']);
	$vacancy=$_SESSION['vacancy'];
	$family=$_SESSION['family'];
	$surname=$_SESSION['surname'];
	$age=$_SESSION['age'];
   $intdate=$_GET['idate'];
	include 'intinformation.php';
	exit();
 }
 
 if (isset ($_GET['out']))
{ 
   unset($_GET['out']);
   header('Location: ../menu/controller_menu.php');
   exit();
 }  
 
include 'candidate.php';
exit();
?>