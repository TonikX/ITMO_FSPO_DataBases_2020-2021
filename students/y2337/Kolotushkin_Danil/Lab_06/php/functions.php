<?php
	function printTable($table)
	{
			echo "<table border = \"1\">\n";

		echo "\t<tr>\n";

		$numberOfRows = pg_num_fields($table);

		for ($i = 0 ; $i < $numberOfRows ; $i++)
		{
			$field = pg_field_name($table, $i);
			echo "\t\t<td>$field</td>\n";
		}
		echo "\t</tr>\n";

		while ($line = pg_fetch_array($table, null, PGSQL_ASSOC))
		{
			echo "\t<tr>\n";
			foreach ($line as $col)
			{
				echo "\t\t<td>$col</td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "\t</table>\n";
	}
?>
