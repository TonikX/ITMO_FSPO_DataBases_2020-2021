<?php
include ("db.php");
$conn = new Db();
$db = $conn->dbconnect();
?>
<a href="edit.php">Открыть редактор книг</a>
<br>
1. <a href="1.php">SELECT книга.название_книги from редакторы, книга where книга.id_книги = редакторы.id_книги order by книга.название_книги DESC</a>
<br>
2. <a href="2.php">SELECT * from книга where id_книги % 2 = 0 and название_книги like 'П%'</a>
<br>
3. <a href="3.php">SELECT * from заказы where дата_заказа BETWEEN '2021-04-04'  and '2021-05-09'</a>
<br>
4. <a href="4.php">SELECT UPPER (фио_автора) from автор</a>
<br>
5. <a href="5.php">SELECT id_контракта,стоимость from контракт where id_заказчика =
  (select id_заказчика from заказчик where фио_заказчика = 'Алексеев Пётр Олегович')</a>