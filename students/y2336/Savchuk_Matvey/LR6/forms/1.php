<table border="1">
  <tr>
    <th>название_книги</th>
  </tr>
<?php
include("db.php");
$conn = new Db();
$db = $conn->dbconnect();
foreach($db->query("SELECT книга.название_книги as book from редакторы, книга where книга.id_книги = редакторы.id_книги order by книга.название_книги DESC") as $row) {
  echo '
  <tr>
    <td>'.$row['book'].'</td>
  </tr>
  ';
}
?>
</table>
<a href="/">Назад</a>
