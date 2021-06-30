<table border="1">
  <tr>
    <th>id_заказчика</th>
    <th>id_книги</th>
    <th>дата_заказа</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("SELECT * from заказы where дата_заказа BETWEEN '2021-04-04'  and '2021-05-09'") as $row) {
    echo '
  <tr>
    <td>'.$row['id_заказчика'].'</td>
    <td>'.$row['id_книги'].'</td>
    <td>'.$row['дата_заказа'].'</td>
  </tr>
  ';
  }
  ?>
</table>
<a href="/">Назад</a>
