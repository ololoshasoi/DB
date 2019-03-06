<?php
session_start();
$login=$_SESSION['log'];
$password=$_SESSION['pass'];
include '../includes/dbconnectauto.php';

if (isset ($_GET['select1']))
{
   unset($_GET['select1']);
   include 'select1.php';
   exit();
}

if (isset ($_GET['select2']))
{
   unset($_GET['select2']);
  include 'select2.php';
   exit();
}

if (isset ($_GET['select3']))
{
   unset($_GET['select3']);
  include 'select3.php';
   exit();
}

if (isset ($_GET['select4']))
{
   unset($_GET['select4']);
  include 'select4.php';
   exit();
}

if (isset ($_GET['select5']))
{
   unset($_GET['select5']);
  include 'select5.php';
   exit();
}

if (isset ($_GET['select6']))
{
   unset($_GET['select6']);
  include 'select6.php';
   exit();
}

if (isset ($_GET['out']))
{ 
   unset($_GET['out']);
header('Location: ../menu/controller_menu.php');
   exit();
 }  

include 'menu_zaprosov.html';
exit();

?>