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
foreach($db->query("select * from reader where id_library_card = $prod_id") as $row){
  $data = $row;
}
if (isset($_GET['fio'])){
  $sql = "update reader set fio=? where id_library_card = $prod_id";
  $db->prepare($sql)->execute([$_GET['fio']]);
  echo '<meta http-equiv="refresh" content="0; url=edit.php"/>';
}
if (isset($_GET['passport_number'])){
  $sql = "update reader set passport_number=? where id_library_card = $prod_id";
  $db->prepare($sql)->execute([$_GET['passport_number']]);
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
          <p class="text">ФИО</p>
          <label>
            <?php echo '
            <input type="text" name="fio" value="'.$data['fio'].'">
			<p class="text">Паспорт</p>
            <input type="text" name="passport_number" value="'.$data['passport_number'].'">
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