<?php
session_start();
$login=$_SESSION['log'];
$password=$_SESSION['pass'];
include '../includes/dbconnectauto.php';

if (isset ($_GET['sobes']))
{
  unset($_GET['sobes']);
  if ($_SESSION['log']=="manager")
   {
   header('Location: ../bussiness/controller_buisness.php');
   exit();
   }
  else
   { 
   header('Location: ../menu/controller_menu.php');
   exit();
  }  
}

if (isset ($_GET['newotchet']))
{
  unset($_GET['newotchet']);
  if ($_SESSION['log']=="manager")
   {
   header('Location: ../otchet/controller_otchet.php');
   exit();
   }
  else
   { 
   header('Location: ../menu/controller_menu.php');
   exit();
  }  
}

if (isset ($_GET['otchet']))
{
  unset($_GET['otchet']);
  if ($_SESSION['log']=="director")
   {
   header('Location: ../otchet/oldotchet.php');
   exit();
   }
  else
   { 
   header('Location: ../menu/controller_menu.php');
   exit();
  }  
}

if (isset ($_GET['zapros']))
{
  unset($_GET['zapros']);
  if ($_SESSION['log']=="manager")
   {
   header('Location: ../request/controller_zaprosov.php');
   exit();
   }
  else
   { 
   header('Location: ../menu/controller_menu.php');
   exit();
  }  
}

if (isset ($_GET['out']))
{ 
   unset($_GET['out']);
   unset( $_SESSION['log']);
   unset( $_SESSION['pass']);
   unset( $_SESSION['flag']);
   session_destroy();
   header('Location: ../authorize/controller_authorize.php');
   exit();
  }  

include 'menu.html';
exit();
?>