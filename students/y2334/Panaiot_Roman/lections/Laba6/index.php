<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All tables</title>
</head>
<body>
<h1>5 Запросов из лабораторной работы 5</h1>
<a href="queries.php", target="_blank", title="Перейти к просмотру запросов" style="font-family:Monotype Corsiva;font-size:32px">Запросы</a>
	<h1>Таблицы</h1>
	<ul>
	<?php
		require_once "config.php";
		foreach ($tables as $table => $value)
		{
			echo "<li><a href='table.php?table_name=$table' target='_blank' title='Перейти к взаймодействию с $table' style='font-family:Monotype Corsiva;font-size:32px'>$table</a></li>";
		}

	?>
	</ul>

</body>
</html>