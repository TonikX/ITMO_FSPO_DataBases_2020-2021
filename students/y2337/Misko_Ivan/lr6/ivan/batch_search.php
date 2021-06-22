<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM batch where id_batch = '$_POST[id_batch]'");
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
if (isset($_POST['submit']))
{
  echo "<ul>
  <form name='update' action='batch_search.php' method='POST' >
  <li>Batch ID:</li><li><input type='text'     name='id_batch' value='$row[id_batch]'  /></li>
<li>Delivery conditions:</li><li><input type='text' name='delivery_conditions_updated' value='$row[delivery_conditions]' /></li>
  <li><input type='submit' name='new' /></li>
  <li><input type='submit' name='delete' value='Удалить' /></li>  </form>
          </ul>";
}
if (isset($_POST['new']))
{
  $result1 = pg_query($db, "UPDATE batch SET delivery_conditions = '$_POST[delivery_conditions_updated]'  WHERE id_batch = '$_POST[id_batch]'");
if (!$result1)
{
echo "Update failed!!";
} else
{
echo "Update successfull;";
}
}

if (isset($_POST['delete']))
{
  $result1 = pg_query($db, "DELETE FROM batch WHERE id_batch = '$_POST[id_batch]'");
if (!$result1)
{
echo "Delete failed!!";
} else
{
echo "Delete successfull;";
}
}
?>