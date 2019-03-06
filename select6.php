<?php

$sql="SELECT Vacancy_id, MAX(Count_inter) as Num
FROM MAXVAC";
include '../includes/select.php';

$answerstring=$result->fetchALL();

?>
<html>
<head>
    <link rel=stylesheet href = "../styles.css">
	<title>  Запрос №6</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class=zagolovok align=center>Запрос №6</div><br><br>


<div class=text align=center> Максимальное число собеседований </div><br><br>
<div align=center>
	<table  class=answ>
		<tr class=answ>
		   <td class=answ align=center> Номер вакансии </td>
			<td class=answ align=center>Количество собеседований  </td>
		</tr>

	<?php foreach ($answerstring as $one):?>
		<tr class=answ>
		    <td class=answ align=center> <?php echo $one['Vacancy_id']; ?> </td>
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
