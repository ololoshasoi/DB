<?php

 $sql="Select Surname FROM company.employee 
 WHERE Code IN ( Select Code FROM company.empl_schedule 
 WHERE Vacancy_id=
 (Select Vacancy_id  FROM company.vacancy JOIN company.sschedule USING (Position_id) 
	WHERE Position='$vacancy' and Close_date is NULL  )) ";
include '../includes/select.php';

$surnames=$result->fetchALL();
  
?>

<html>
<head>
     <link rel=stylesheet href = "../styles.css">
	<title>Введите данные</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<div class=zagolovok align=center> Выберите интервьюера </div><br><br>

<form action="?" method=get>
<br><br>
<select name=family>
				<?php foreach ($surnames as $surname):?>
				<option><?php echo $surname['Surname']; ?></option>
				<?php endforeach; ?>
			</select>

<br><br><br><br>
<div align=center>
<table border=0 width=80%>
<tbody>
<tr>
<td align=center><input type=reset style="font-size: 14pt; color: black" value=Очистить></td>
<td align=center><input type=submit name=sendit style="font-size: 14pt; color: black" value=Отправить></td>
</tr></tbody></table>
</div>
</form>

<form action="../bussiness/controller_buisness.php " method="GET">
<button class=away>В начало</button>
</form>	
	
</body>
</html>


