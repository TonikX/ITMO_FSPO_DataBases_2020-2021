<table border="1">
  <tr>
    <th>id_книги</th>
    <th>название_книги</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("SELECT * from книга where id_книги % 2 = 0 and название_книги like 'П%'") as $row) {
    echo '
  <tr>
    <td>'.$row['id_книги'].'</td>
    <td>'.$row['название_книги'].'</td>
  </tr>
  ';
  }
  ?>
</table>
<a href="/">Назад</a>
