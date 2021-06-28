<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM broker where id_broker = '$_POST[id_broker]'");
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
if (isset($_POST['submit']))
{
  echo "<ul>
  <form name='update' action='broker_search.php' method='POST' >
  <li>Broker ID:</li><li><input type='text'     name='id_broker' value='$row[id_broker]'  /></li>
<li>Company payments:</li><li><input type='text' name='company_payments_updated' value='$row[company_payments]' /></li>
<li>Broker's name:</li><li><input type='text' name='name_broker_updated' value='$row[name_broker]' /></li>
<li>Broker's income:</li><li><input type='text' name='income_updated' value='$row[income]' /></li>
  <li><input type='submit' name='new' /></li>
  <li><input type='submit' name='delete' value='Удалить' /></li>  </form>
          </ul>";
}
if (isset($_POST['new']))
{
  $result1 = pg_query($db, "UPDATE broker SET company_payments = '$_POST[company_payments_updated]', name_broker = '$_POST[name_broker_updated]', income = '$_POST[income_updated]' WHERE id_broker = '$_POST[id_broker]'");
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
  $result1 = pg_query($db, "DELETE FROM broker WHERE id_broker = '$_POST[id_broker]'");
if (!$result1)
{
echo "Delete failed!!";
} else
{
echo "Delete successfull;";
}
}
?>