<?php

$sql="SELECT  Surname, Address, Birthday, Education, Wage,  En_date
FROM Employee LEFT JOIN Interviewing USING(Code) 
WHERE Inter_id IS NULL";
include '../includes/select.php';

$answerstring=$result->fetchALL();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel=stylesheet href = "../styles.css">
	<title>  Запрос №4</title>
</head>
<body>
<div class=zagolovok align=center>Запрос №4</div><br><br>
	<div align=center>

	<table  class=answ>
		<tr class=answ>
			<td class=answ align=center> Фамилия  </td>
			<td class=answ align=center> Дата рождения </td>
			<td class=answ align=center> Адрес </td>
			<td class=answ align=center>Образование </td>
			<td class=answ align=center> Зарплата </td>
			<td class=answ align=center>Дата трудоустройства </td>
		</tr>

	<?php foreach ($answerstring as $one):?>
		<tr class=answ>
			<td class=answ align=center> <?php echo $one['Surname']; ?> </td>
			<td class=answ align=center> <?php echo $one['Birthday']; ?> </td>
			<td class=answ align=center> <?php echo $one['Address']; ?> </td>
			<td class=answ align=center> <?php echo $one['Education']; ?> </td>
			<td class=answ align=center> <?php echo $one['Wage']; ?> </td>
			<td class=answ align=center> <?php echo $one['En_date']; ?> </td>
		</tr>
		<?php endforeach; ?>
		
	</table>
	</div><br><br>
 
<form action="../request/controller_zaprosov.php " method="GET">
<button class=away>В меню запросов</button>
</form>

</body>
</html>
