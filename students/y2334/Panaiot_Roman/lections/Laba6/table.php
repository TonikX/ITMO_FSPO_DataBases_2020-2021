<?php
$table_name = $_GET['table_name'];
require_once "config.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $table_name?> </title>
</head>
<body>
    <div class="container">
		<div class="top-bar d-flex pt-3 pb-3 justify-content-between">
			<div class="title">
				<h2 class="m-0"><?php echo $table_name?></h2>
			</div>
			<div class="">
				<a href="/">Главная</a>	
				<br>
				<a href="form.php?mod=add&table_name=<?php echo $table_name?>">Добавить запись</a>	
			</div>
		</div>
		<div>
			<div>
				<table>
					<thead>
						<tr>
							<?php
								foreach ($tables[$table_name] as $col) {
									echo "<th>" . $col . "</th>";
								}
							?>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<?php
							try {
								$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
								$res = $db->query("SELECT *  FROM " . $table_name);
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
						?>

						<tr>
							<?php
								foreach ($tables[$table_name] as $col) {
									echo "<td>" . $row[$col] . "</td>";
								}
							?>
							<td><a href="form.php?mod=edit&table_name=<?php echo $table_name?>&id=<?php echo $row[$tables[$table_name][0]] ?>">Редактировать</a>
							<br>
							<a href="delete.php?table_name=<?php echo $table_name?>&id=<?php echo $row[$tables[$table_name][0]] ?>">Удалить</a></td>
						</tr>

						<?php } ?>
						
					</tbody>
				</table>
			</div>
			
		</div>
		
    </div>

<style>
table th, td {
	padding: 10px;
	border: 1px solid #001;
    font-size: 120%; 
    font-family: Verdana, Arial, Helvetica, sans-serif;
    color: #900020;
}
</style>

</body>
</html>