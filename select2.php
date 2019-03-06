<?php

$sql="SELECT Vacancy_id, Position, (TO_DAYS(Close_date)-TO_DAYS(Open_date)) as Day, Count(*) as Num
FROM Vacancy  JOIN Interviewing USING(Vacancy_id) JOIN Sschedule USING(Position_id)
WHERE  (YEAR(Open_date)=2017) AND (MONTH(Open_date)=3)
GROUP BY Vacancy_id ";
include '../includes/select.php';

$answerstring=$result->fetchALL();

?>
<html>
<head>
<meta 'Content-type: text/html; charset=utf8'>
     <link rel=stylesheet href = "../styles.css">
	<title>  Запрос №2</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<div class=zagolovok align=center> Запрос №2</div><br><br>

	<div align=center>

	<table  class=answ>
		<tr class=answ>
			<td class=answ align=center> Номер вакансии  </td>
			<td class=answ align=center> Название вакансии </td>
			<td class=answ align=center> Была свободна </td>
			<td class=answ align=center>Количество кандидатов </td>
		</tr>

	<?php foreach ($answerstring as $one):?>
		<tr class=answ>
			<td class=answ align=center> <?php echo $one['Vacancy_id']; ?> </td>
			<td class=answ align=center> <?php echo $one['Position']; ?> </td>
			<td class=answ align=center> <?php echo $one['Day']; ?> </td>
			<td class=answ align=center> <?php echo $one['Num']; ?> </td>
		</tr>
		<?php endforeach; ?>
		
	</table>
</div><br><br>

<form action="../request/controller_zaprosov.php " method="GET">
<button class=away>В меню запросов</button>
</form>
	

</body>
</html>

