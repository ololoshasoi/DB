<?php

$answerstring=$result->fetchALL();

?>
<html>
<head>
    <link rel=stylesheet href = "../styles.css">
	<title> Отчет </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
		<div class=zagolovok align=center>Введите данные для отчета</div><br><br>

 <?php
	if ($flag==0)
	{
		?> <div class=text> Нет данных за этот период! </div><?
	}
	else 
	{ ?>

	<div class=text>Такой отчет существует!</div>
		 
    <div align=center>
	<table class=answ>
		<tr class=answ>
			<td class=answ align=center> Номер отчета  </td>
			<td class=answ align=center> Код сотрудника </td>
			<td class=answ align=center> Количество собеседований </td>
			<td class=answ align=center>Месяц </td>
			<td class=answ align=center>Год </td>
		</tr>

	
<?php	foreach ($answerstring as $one):?>
		<tr class=answ>
			<td class=answ align=center> <?php echo $one['Id_ot']; ?> </td>
			<td class=answ align=center> <?php echo $one['Emp_code']; ?> </td>
			<td class=answ align=center> <?php echo $one['Num_sobes']; ?> </td>
			<td class=answ align=center> <?php echo $one['O_month']; ?> </td>
			<td class=answ align=center> <?php echo $one['O_year']; ?> </td>
		</tr>
		<?php endforeach; }?>
		
	</table>
	
 	</div><br><br>
	

<form action="../otchet/controller_otchet.php " method="GET">
<button class=away name=out>Новый отчет</button>
</form>	

</body>
</html>

