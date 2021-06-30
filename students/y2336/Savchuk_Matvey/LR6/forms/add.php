<html lang="ru">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>Добавление</title>
  <link rel="stylesheet" type="text/css" href="styles.css" media="screen">
</head>
<?php
include ("db.php");
include ("show.php");
$conn = new Db();
$db = $conn->dbconnect();
$book_name = $_GET['book_name'];
$dublicate = false;
foreach($db->query("select * from книга") as $row) {
  if ($row['название_книги'] == $book_name){
    $dublicate = true;
  }
}
if (!$dublicate){
  if ($book_name != ''){

    $sql = "insert into книга (название_книги) values (?)";
    $db->prepare($sql)->execute([$book_name]);
  }
}
?>
<body class="back" link="gray" alink="gray" vlink="gray">
<div class="topnav">
  <a href="/">
    <b>Операции</b>
  </a>
  <?php
    echo '
      <a class="active" href="add.php">Добавить</a>
      <a href="delete.php">Удалить</a>
      <a href="edit.php">Редактировать</a>';
  ?>
</div>
<br>
<div class="block">
  <table>
    <tr>
      <td>
        <form action="add.php" method="get">
          <p class="text">Название</p>
          <label>
            <input type="text" name="book_name">
          </label>
          <p></p>
            <input type="submit" value="Добавить">
        </form>
      </td>
    </tr>
  </table>
</div>
</body>
</html>


