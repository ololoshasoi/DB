<?php
try
{
$result=$pdo->query($sql);
$numb=$result->rowcount();
}
catch (PDOException $e)
{
   $output='Ошибка при извлечении данных'.$e->getMessage();
   exit();
}

 if ($numb> 0)
 {
 $flag = 1;
}
 else
 {
$flag = 0;
 }

?>