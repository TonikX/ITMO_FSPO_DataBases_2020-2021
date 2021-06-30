<table border="1">
  <tr>
    <th>id_контракта</th>
    <th>стоимость</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("SELECT id_контракта,стоимость from контракт where id_заказчика =
(select id_заказчика from заказчик where фио_заказчика = 'Алексеев Пётр Олегович')") as $row) {
    echo '
  <tr>
    <td>'.$row['id_контракта'].'</td>
    <td>'.$row['стоимость'].'</td>
  </tr>
  ';
  }
  ?>
</table>
<a href="/">Назад</a>
