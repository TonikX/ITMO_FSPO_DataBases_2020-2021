<html lang="ru">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>Удаление</title>
  <link rel="stylesheet" type="text/css" href="styles.css" media="screen">
</head>
<?php
include ("db.php");
include ("show.php");
$conn = new Db();
$db = $conn->dbconnect();
$show = new Show();
?>
<body class="back" link="gray" alink="gray" vlink="gray">
<div class="topnav">
  <a href="/">
    <b>Операции</b>
  </a>
  <?php
    echo '
      <a href="add.php">Добавить</a>
      <a class="active" href="delete.php">Удалить</a>
      <a href="edit.php">Редактировать</a>';
  ?>
</div>
<br>
<div class="block">
  <table>
<?php
$z = $_GET['chkbx'] ?? 0;
echo '
  <form action="delete.php" method="get">
  <tr>
    <th width="50%"></th>
    <th>
      <input type="submit" name="del" value="Удалить" />';
	  $dtype = $_GET['del'] ?? null;
  if ($dtype == 'Удалить')
  {
    $N = count($z);

    for($i=0; $i < $N; $i++)
    {
      $sql = "DELETE FROM reader WHERE id_library_card = $z[$i]";
      $db->prepare($sql)->execute();
    }
  }
  echo '
      </th>
      <th width="20%"></th>
    </tr>';
  foreach($db->query("SELECT * FROM reader") as $row) {
    $show->show11($row);
  }
?>
  </table>
</div>
</body>
</html>