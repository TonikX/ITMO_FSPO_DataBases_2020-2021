<table border="1">
  <tr>
    <th>ФИО автора капсом</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("SELECT UPPER (фио_автора) as author from автор") as $row) {
    echo '
  <tr>
    <td>'.$row['author'].'</td>
  </tr>
  ';
  }
  ?>
</table>
<a href="/">Назад</a>
