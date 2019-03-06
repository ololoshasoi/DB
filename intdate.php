<?php

$sql="Select Vacancy_id  FROM company.vacancy JOIN company.sschedule USING (Position_id) 
	WHERE Position='$vacancy' and Close_date is NULL ";
	include '../includes/select.php';
 $vacan=$result->fetchALL();
	       foreach ($vacan as $vac):
	           $vacancy = $vac['Vacancy_id'];
           endforeach;	
$_SESSION['vacancy']=$vacancy;
 $sql="Select Int_date  FROM company.empl_schedule JOIN  company.employee USING (Code)
	WHERE Surname='$family' and  Vacancy_id='$vacancy'";
	include '../includes/select.php';
$dates=$result->fetchALL();

?>
<html>
<head>
    <link rel=stylesheet href = "../styles.css">
	<title>Введите данные</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<div class=zagolovok align=center>Выберите дату </div><br><br>
<form action="?" method=get>

<br><br>
<select name=idate>
				<?php foreach ($dates as $dat):?>
				<option><?php echo $dat['Int_date']; ?></option>
				<?php endforeach; ?>
			</select>

<br><br><br><br>
<div align=center>
<table border=0 width=80%>
<tbody>
<tr>
<td align=center><input type=reset style="font-size: 14pt; color: black" value=Очистить></td>
<td align=center><input type=submit name=send3 style="font-size: 14pt; color: black" value=Отправить></td>
</tr></tbody></table>
</div><br><br>
</form>


<form action="../bussiness/controller_buisness.php " method="GET">
<button class=away>В начало</button>
</form>	

</body>
</html>