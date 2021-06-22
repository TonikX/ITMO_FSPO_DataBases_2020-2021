<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM manufactory where id_manufactory = '$_POST[id_manufactory]'");
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
if (isset($_POST['submit']))
{
  echo "<ul>
  <form name='update' action='manufactory_search.php' method='POST' >
  <li>Manufactory ID:</li><li><input type='text'     name='id_manufactory' value='$row[id_manufactory]'  /></li>
<li>Name manufactory:</li><li><input type='text' name='name_manufactory_updated' value='$row[name_manufactory]' /></li>
<li>Specialization:</li><li><input type='text' name='specialization_updated' value='$row[specialization]' /></li>
<li>Broker's contacts:</li><li><input type='text' name='contacts_updated' value='$row[contacts]' /></li>
  <li><input type='submit' name='new' /></li>
  <li><input type='submit' name='delete' value='Удалить' /></li>  </form>
          </ul>";
}
if (isset($_POST['new']))
{
  $result1 = pg_query($db, "UPDATE broker SET name_manufactory = '$_POST[name_manufactory_updated]', specialization = '$_POST[specialization_updated]', contacts = '$_POST[contacts_updated]' WHERE id_broker = '$_POST[id_broker]'");
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
  $result1 = pg_query($db, "DELETE FROM manufactory WHERE id_manufactory = '$_POST[id_manufactory]'");
if (!$result1)
{
echo "Delete failed!!";
} else
{
echo "Delete successfull;";
}
}
?>