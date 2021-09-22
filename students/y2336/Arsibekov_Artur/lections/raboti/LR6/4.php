<table border="5">
  <tr>
    <th>ID копии</th>
    <th>Название книги</th>
  </tr>
  <?php
  include("db.php");
  $conn = new Db();
  $db = $conn->dbconnect();
  foreach($db->query("select copy_of_book.id_copy as copy_num, books.title as titles FROM copy_of_book LEFT JOIN books ON books.id_book = copy_of_book.books_id_book;") as $row) {
    echo '
  <tr>
    <td>'.$row['copy_num'].'</td>
    <td>'.$row['titles'].'</td>
  </tr>
  ';
  }
  ?>
</table>

