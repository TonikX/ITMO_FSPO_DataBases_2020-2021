<table border="5">
  <tr>
    <th>ФИО</th>
    <th>Название книги</th>
    <th>Дата взятия</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("select fio, titles, date_of_issue from reader INNER JOIN (select reader_id_library_card as card_number, date_of_issue, titles from issue_of_book INNER JOIN (select copy_of_book.id_copy as copies, books.title as titles FROM copy_of_book LEFT JOIN books ON books.id_book = copy_of_book.books_id_book) as tab ON issue_of_book.copy_of_book_id_copy = copies ORDER BY card_number) as tab1 ON card_number = id_library_card;") as $row) {
    echo '
  <tr>
    <td>'.$row['fio'].'</td>
    <td>'.$row['titles'].'</td>
    <td>'.$row['date_of_issue'].'</td>
  </tr>
  ';
  }
  ?>
</table>

