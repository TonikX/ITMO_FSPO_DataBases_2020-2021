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
      <td width="10%"></td>
      <td>
        <table align="center">
          <?php
          $show = new Show();
          foreach($db->query("SELECT * FROM книга") as $row) {
            $show->edit_show($row);
          }
          ?>
        </table>
      </td>
      <td width="30%">
      </td>
    </tr>
  </table>
</div>
</body></html>
