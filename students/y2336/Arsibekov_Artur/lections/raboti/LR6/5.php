<table border="5">
  <tr>
    <th>Издательство</th>
    <th>Кол-во копий</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("select publishing_house, sum(number_of_copies) as total_books from books group by publishing_house order by total_books desc;") as $row) {
    echo '
  <tr>
    <td>'.$row['publishing_house'].'</td>
    <td>'.$row['total_books'].'</td>
  </tr>
  ';
  }
  ?>
</table>

