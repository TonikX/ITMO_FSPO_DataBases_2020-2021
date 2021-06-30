<html lang="ru">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>Редактирование</title>
  <link rel="stylesheet" type="text/css" href="styles.css" media="screen">
</head>
<?php
include("db.php");
include("show.php");
$conn = new Db();
$db = $conn->dbconnect();
$prod_id = $_GET['prod_id'];
$data=array();
foreach($db->query("select * from книга where id_книги = $prod_id") as $row){
  $data = $row;
}
$book_name = $_GET['book_name'];
if ($book_name != ''){
  $sql = "update книга set название_книги=? where id_книги = $prod_id";
  $db->prepare($sql)->execute([$book_name]);
  echo '<meta http-equiv="refresh" content="0; url=edit.php"/>';
}
?>

<body class="back" link="gray" alink="gray" vlink="gray">
<div class="topnav">
  <a href="/">
    <b>Операции</b>
  </a>
  <?php
  echo '
      <a href="add.php">Добавить</a>
      <a href="delete.php">Удалить</a>
      <a class="active" href="edit.php">Редактировать</a>';
  ?>
</div>
<br>
<div class="block">
  <table>
    <tr>
      <td>
        <form action="edit_prod.php" method="get">
          <p class="text">Название</p>
          <label>
            <?php echo '
            <input type="text" name="book_name" value="'.$data['book_name'].'">
            <input type="hidden" name="prod_id" value="'.$prod_id.'">
            ';?>
          </label>
          <p></p>
          <input type="submit" value="Сохранить">
        </form>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
