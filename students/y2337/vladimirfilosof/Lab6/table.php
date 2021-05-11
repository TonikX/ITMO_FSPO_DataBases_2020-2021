<?
$table_name = $_GET['table_name'];
require_once "config.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?echo $table_name?> </title>
</head>
<body>
    <div class="container">
		<div class="top-bar d-flex pt-3 pb-3 justify-content-between">
			<div class="title">
				<h2 class="m-0"><?echo $table_name?></h2>
			</div>
			<div class="">
				<a href="/" class="btn btn-danger ">Go to main page</a>	
				<a href="form.php?mod=add&table_name=<?echo $table_name?>" class="btn btn-success ">Add</a>	
			</div>
		</div>
		<div class="row">
			<div class="col">
				<table class="display table">
					<thead class="thead-dark">
						<tr>
							<?
								
								for ($i = 0; $i <= 1; ++$i) {
									echo "<th>" . $tables[$table_name][$i] . "</th>";
								}
							?>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="item-form">

						<?
							try {
								$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
								$res = $db->query("SELECT ". $tables[$table_name][0] . ", ". $tables[$table_name][1] ."  FROM " . $table_name);
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
						?>

						<tr>
							<td><? echo $row[$tables[$table_name][0]] ?></td>
							<td><? echo $row[$tables[$table_name][1]] ?></td>
							<td><a href="form.php?mod=edit&table_name=<?echo $table_name?>&id=<?echo $row[$tables[$table_name][0]] ?>" class="btn btn-success">edit</a>
							
							<a href="delete.php?table_name=<?echo $table_name?>&id=<?echo $row[$tables[$table_name][0]] ?>" class="btn btn-danger">delete</a></td>
						</tr>

						<?}?>
						
					</tbody>
				</table>
			</div>
			
		</div>
		
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script>
    $(document).ready( function () {

        $('#table_id').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Russian.json"
            }
        });

    } );
</script>
</body>
</html>



