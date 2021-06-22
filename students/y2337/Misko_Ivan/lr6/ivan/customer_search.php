<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM customer where id_customer = '$_POST[id_customer]'");
$rows = pg_num_rows($result);
echo "Возвращено строк: " . $rows . ".\n";
$row = pg_fetch_assoc($result);
if (isset($_POST['submit']))
{
  echo "<ul>
  <form name='update' action='customer_search.php' method='POST' >
  <li>Customer ID:</li><li><input type='text'     name='id_customer' value='$row[id_customer]'  /></li>
<li>Customer's name:</li><li><input type='text' name='name_customer_updated' value='$row[name_customer]' /></li>
  <li><input type='submit' name='new' /></li>
  <li><input type='submit' name='delete' value='Удалить' /></li>  </form>
          </ul>";
}
if (isset($_POST['new']))
{
  $result1 = pg_query($db, "UPDATE customer SET name_customer = '$_POST[name_customer_updated]'  WHERE id_customer = '$_POST[id_customer]'");
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
  $result1 = pg_query($db, "DELETE FROM customer WHERE id_customer = '$_POST[id_customer]'");
if (!$result1)
{
echo "Delete failed!!";
} else
{
echo "Delete successfull;";
}
}
?>