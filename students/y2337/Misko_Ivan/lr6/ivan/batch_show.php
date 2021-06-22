<?php
$dbuser = 'postgres';
$dbpass = 'toor';
$host = 'localhost';
$dbname='Birzha';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM batch");
$rows = pg_num_rows($result);
$arr = pg_fetch_all($result);
echo "Возвращено строк: " . $rows . ".\n";
	if (isset($_POST['submit']))
{
	echo "<h1>Batch table</h1>";
	echo "<table border='1'>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
}
?>