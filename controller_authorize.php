<?php
session_start();
$login='check';
$password='Ch$ck0';
include '../includes/dbconnectauto.php';
if (!isset ($_SESSION['log']))
{
	$_SESSION['log']=array();
    $_SESSION['pass']=array();
    $_SESSION['flag']=0;
}

if (isset ($_POST['try']))
 {
     unset($_POST['try']);
     $log=$_POST['ulogin'];
     $pass=$_POST['pass'];
     $sql="Select P_group, G_password FROM company.users
                Where Login='$log' and Password='$pass'";
     include '../includes/select.php';
	 $users=$result->fetchALL();
	       foreach ($users as $user):
	           $group = $user['P_group'];
	           $pass = $user['G_password'];
           endforeach;	
	
     if  ($flag==1){
           $_SESSION['log']=$group;
           $_SESSION['pass']=$pass;
		   $_SESSION['flag']=1;
header('Location: ../menu/controller_menu.php');  
		   exit();
      }
	  else{
	       $_SESSION['flag']=-1;
header('Location: ../authorize/controller_authorize.php');
		  exit();
	  }
}
include 'autorize.php';
exit();
?>
 