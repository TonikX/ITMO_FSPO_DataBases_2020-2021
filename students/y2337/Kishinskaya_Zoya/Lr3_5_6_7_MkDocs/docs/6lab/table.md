
### table.php
```
<?php
$table_name = $_GET['table_name'];
require_once "config.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title> <?php echo $tables[$table_name]['name']?> </title>
</head>
<body>

    <header>
        <div class="container">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <?php
                require_once "config.php";
                foreach ($tables as $table => $value)
                {
                    echo "<li class='nav-item'><a class='nav-link' href='table.php?table_name=$table'>" . $tables[$table]["name"] . "</a></li>";
                }
                ?>
            </ul>
        </div>
    </header>

    <div class="container">
		<div class="d-flex pt-3 pb-3 justify-content-between">
			<div class="title">
				<h2 class="m-0"><?php echo $tables[$table_name]['name']?></h2>
			</div>
			<div class="">
				<a class="btn btn-success" href="form.php?mod=add&table_name=<?php echo $table_name?>">Добавить запись</a>
			</div>
		</div>
		<div>
			<div>
				<table class="table">
					<thead>
						<tr>
                            <?php
								foreach ($tables[$table_name]['fields'] as $col) {
									echo "<th>" . $col . "</th>";
								}
							?>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

                    <?php
							try {
								$db = new PDO("pgsql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
								$res = $db->query("SELECT *  FROM public.\"" . $table_name . "\"");
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
						?>

						<tr>
                            <?php
								foreach ($tables[$table_name]['fields'] as $col => $value) {
									echo "<td>" . $row[$col] . "</td>";
								}
							?>
							<td><a href="form.php?mod=edit&table_name=<?php echo $table_name?>&id=<?php echo $row[array_key_first($tables[$table_name]['fields'])] ?>">Редактировать</a>
							<br>
							<a href="delete.php?table_name=<?php echo $table_name?>&id=<?php echo $row[array_key_first($tables[$table_name]['fields'])] ?>">Удалить</a></td>
						</tr>

                            <?php }?>
						
					</tbody>
				</table>
			</div>
			
		</div>
		
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>

```

