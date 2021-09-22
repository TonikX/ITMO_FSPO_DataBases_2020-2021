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
$fio = $_GET['fio'] ?? null;
$passport_number = $_GET['passport_number'] ?? null;
$dublicate = false;
foreach($db->query("select * from reader") as $row) {
  if ($row['passport_number'] == $passport_number){
    $dublicate = true;
  }
}
if (!$dublicate){
  if ($fio != '' && $passport_number != ''){
    $sql = "insert into reader (fio) values (?)";
    $db->prepare($sql)->execute([$fio]);
	foreach($db->query("select * from reader where fio = '{$fio}' ORDER BY id_library_card DESC") as $row) {
		$id = $row["id_library_card"];
	}
	$sql = "update reader set passport_number = (?) where id_library_card = {$id}";
    $db->prepare($sql)->execute([$passport_number]);
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
          <p class="text">ФИО</p>
          <label>
            <input type="text" name="fio">
          </label>
          <p class="text">Паспорт</p>
          <label>
            <input type="text" name="passport_number">
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