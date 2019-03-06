<?php
mb_internal_encoding('UTF-8');
$sql= "Select Position FROM company.vacancy JOIN company.sschedule USING (Position_id)
                Where Close_date is NULL ";
include '../includes/select.php';
$vacancies=$result->fetchALL(); 

?>
<html>
<head>
    <link rel=stylesheet href = "../styles.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Введите данные</title>

<body>
<div class=zagolovok align=center>Введите данные</div><br><br>
<form action="?" method=GET>

<label for=surn style="font-size: 14pt; color: black">Введите фамилию </label>
<input type=text id=surname name=surname style="font-size: 14pt; color: black">
<br> <br>
<label for=agek style="font-size: 14pt; color: black">Введите возраст </label>
<input type=text id=age name=age style="font-size: 14pt; color: black">
<br><br>
<label for=pol style="font-size: 14pt; color: black">Введите пол </label>
<input type=text id=ppol name=ppol style="font-size: 14pt; color: black">
<br> <br>
<label for=addr style="font-size: 14pt; color: black">Введите адрес </label>
<input type=text id=address name=address style="font-size: 14pt; color: black">
<br><br>
<select name=vybor>
				<?php foreach ($vacancies as $vacancy):?>
				<option><?php echo $vacancy['Position']; ?></option>
				<?php endforeach; ?>
			</select>

<br><br><br><br>
<div align=center>
<table border=0 width=80%>
<tbody>
<tr>
<td align=center><input type=reset style="font-size: 14pt; color: black" value=Очистить></td>
<td align=center><input type=submit name=send style="font-size: 14pt; color: black" value=Отправить></td>
</tr></tbody></table>
</div>
</form>

<form action="?out " method="GET">
<button class=away name=out>Главное меню</button>
</form>


	
</body>
</html>
