<?php

$sql="SELECT Date_i, Vacancy_id, Can_surname, Elevation
FROM Employee JOIN Interviewing USING(Code) JOIN Candidate USING(Instance_id)
WHERE (YEAR(Date_i)=2017) AND (MONTH(Date_i)=3) ";
include '../includes/select.php';

$answerstring=$result->fetchALL();

?>
<html>
<head>
     <link rel=stylesheet href = "../styles.css">
	<title>  Запрос №1</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class=zagolovok align=center> Запрос №1</div><br><br>
	
<div align=center>

	<table  class=answ>
		<tr class=answ>
			<td class=answ align=center> Дата собеседования </td>
			<td class=answ align=center> ID вакансии </td>
			<td class=answ align=center>Фамилия кандидата </td>
			<td class=answ align=center>Отметка yes/no </td>
		</tr>

	<?php foreach ($answerstring as $one):?>
		<tr class=answ>
			<td class=answ align=center> <?php echo $one['Date_i']; ?> </td>
			<td class=answ align=center> <?php echo $one['Vacancy_id']; ?> </td>
			<td class=answ align=center> <?php echo $one['Can_surname']; ?> </td>
			<td class=answ align=center> <?php echo $one['Elevation']; ?> </td>
		</tr>
		<?php endforeach; ?>
		
	</table>
</div>	<br><br>

<form action="../request/controller_zaprosov.php " method="GET">
<button class=away>В меню запросов</button>
</form>
	

</body>
</html>

