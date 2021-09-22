<table border="5">
  <tr>
    <th>ФИО</th>
    <th>Наименование зала</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("select fio, name_room FROM reader INNER JOIN (select id_attachment, date_attachment, name_room, reader_id_library_card FROM attachment_in_room LEFT JOIN reading_rooms ON id_attachment = id_room) as tab ON id_library_card = reader_id_library_card;") as $row) {
    echo '
  <tr>
    <td>'.$row['fio'].'</td>
    <td>'.$row['name_room'].'</td>
  </tr>
  ';
  }
  ?>
</table>
