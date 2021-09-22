<table border="5">
  <tr>
    <th>ФИО</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("select fio from reader where id_library_card = any(select max(id_library_card) from reader);") as $row) {
    echo '
  <tr>
    <td>'.$row['fio'].'</td>
  </tr>
  ';
  }
  ?>
</table>

