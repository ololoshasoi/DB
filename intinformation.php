<?php

$sql="Select Instance_id FROM company.candidate 
	WHERE Can_surname='$surname' and Age='$age' ";
	include '../includes/select.php';
 $people=$result->fetchALL();
	       foreach ($people as $person):
	           $perid = $person['Instance_id'];
           endforeach;	
  
   $sql="Select Id_sch FROM company.empl_schedule JOIN company.employee USING (Code) 
	WHERE Surname='$family' and Int_date='$intdate' and Vacancy_id='$vacancy' ";
	include '../includes/select.php';
 $schedid=$result->fetchALL();
	       foreach ($schedid as $oneid):
	           $oid = $oneid['Id_sch'];
           endforeach;	

	$sql="UPDATE company.empl_schedule SET Instance_id='$perid' WHERE  Id_sch='$oid' ";  

    $s=$pdo->prepare($sql);
    $s->execute();

?>
<html>
<head>
    <link rel=stylesheet href = "../styles.css">
	<title>  Информация о собеседовании</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class=zagolovok align=center> Информация о собеседовании</div><br><br>
	<div align=center>

	<table  class=answ>
		<tr class=answ>
			<td class=answ align=center> Дата </td>
			<td class=answ align=center> Кандидат </td>
			<td class=answ align=center> HR-агент </td>
		</tr>

		<tr class=answ>
			<td  class=answ align=center> <?php echo  $intdate ;?> </td>
			<td class=answ align=center> <?php echo $surname; ?> </td>
			<td class=answ align=center> <?php echo $family; ?> </td>
		</tr>
	</table><br><br>
		</div>
		
 
<form action="../bussiness/controller_buisness.php " method="GET">
<button class=away>В начало</button>
</form>	
	

</body>
</html>

