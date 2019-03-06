<html><head>
<title> Введите данные для авторизации </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<link rel=stylesheet href = "../styles.css">
<body  >
<div class=zagolovok align=center> Введите данные для авторизации</div><br>
<?php
			if ($_SESSION['flag'] == -1) {
				echo "<div class=text> Неверные данные. Попробуйте снова. </div>";
			}
?>
<form action="?send" method=post>
<div>
<label for=login style="font-size: 14pt; color: black">Введите логин </label>
<input type=text id=ulogin name=ulogin style="font-size: 14pt; color: black">
<br> <br>
<label for=passw style="font-size: 14pt; color: black">Введите пароль </label>
<input type=password id=pass name=pass style="font-size: 14pt; color: black">
<br><br><br></div>
<div align=center>
<table border=0 width=80%>
<tbody>
<tr>
<td align=center><input type=reset  value=Очистить></td>
<td align=center><input type=submit name=try  value=Отправить></td>
</tr></tbody></table></div>

</form>
</body>
</html>