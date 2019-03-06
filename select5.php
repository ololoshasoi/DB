<?php

$sql="SELECT Code, Surname
FROM Employee LEFT JOIN (SELECT *
                                                   FROM Interviewing 
                                                  WHERE YEAR(Date_i)=2017 AND MONTH(Date_i)=3)i2017
USING(Code)
WHERE Inter_id IS NULL";
include '../includes/select.php';

$answerstring=$result->fetchALL();

?>
<html>
<head>
    <link rel=stylesheet href = "../styles.css">
	<title>  Запрос №5</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class=zagolovok align=center>Запрос №5</div><br><br>
	<div align=center>
	<table class=answ>
		<tr class=answ>
		   <td class=answ align=center> Код сотрудника </td>
			<td class=answ align=center> Фамилия  </td>
		</tr>

	<?php foreach ($answerstring as $one):?>
		<tr class=answ>
		    <td class=answ align=center> <?php echo $one['Code']; ?> </td>
			<td class=answ align=center> <?php echo $one['Surname']; ?> </td>
		</tr>
		<?php endforeach; ?>
		
	</table>

 	</div><br><br>
	
<form action="../request/controller_zaprosov.php " method="GET">
<button class=away>В меню запросов</button>
</form>
	

</body>
</html>
