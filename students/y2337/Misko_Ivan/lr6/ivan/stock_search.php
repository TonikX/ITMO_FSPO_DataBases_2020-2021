<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM stock where id_stock = '$_POST[id_stock]'");
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
if (isset($_POST['submit']))
{
  echo "<ul>
  <form name='update' action='stock_search.php' method='POST' >
  <li>Stock ID:</li><li><input type='text' name='id_stock' value='$row[id_stock]'  /></li>
<li>Name stock:</li><li><input type='text' name='name_stock_updated' value='$row[name_stock]' /></li>
<li>Stock's contacts:</li><li><input type='text' name='contacts_updated' value='$row[contacts]' /></li>
  <li><input type='submit' name='new' /></li>
  <li><input type='submit' name='delete' value='Удалить' /></li>  </form>
          </ul>";
}
if (isset($_POST['new']))
{
  $result1 = pg_query($db, "UPDATE broker SET name_manufactory = '$_POST[name_stock_updated]', contacts = '$_POST[contacts_updated]' WHERE id_broker = '$_POST[id_stock]'");
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
  $result1 = pg_query($db, "DELETE FROM stock WHERE id_stock = '$_POST[id_stock]'");
if (!$result1)
{
echo "Delete failed!!";
} else
{
echo "Delete successfull;";
}
}
?>