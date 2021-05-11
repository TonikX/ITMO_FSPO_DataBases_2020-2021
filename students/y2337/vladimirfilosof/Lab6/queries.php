<?
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Запросики </title>
</head>
<body>
    <div class="container">
		<div class="top-bar d-flex pt-3 pb-3 justify-content-between">
			<div class="title">
				<h2 class="m-0">Запросики</h2>
			</div>
			<div class="">
				<a href="/" class="btn btn-danger ">Go to main page</a>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h3>1 Запрос</h3>
				<code>select * from decorator where education = 'gardener' and educational_institution = 'KOU';</code>
				<table class="display table">
					<thead class="thead-dark">
						<tr>
							<?
								
								foreach ($tables['decorator'] as $col) {
									echo "<th>" . $col . "</th>";
								}
							?>
						</tr>
					</thead>
					<tbody class="item-form">

						<?
							try {
								$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
								$res = $db->query("select * from decorator where education = 'gardener' and educational_institution = 'KOU';");
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
								echo "<tr>";
								foreach ($tables['decorator'] as $col)
								{ 	
						?>

						
							<td><? echo $row[$col] ?></td>

						<?
								}
								echo "</tr>";
							}
						?>
						
					</tbody>
				</table>
			</div>
			
		</div>

		<hr>

		<div class="row">
			<div class="col">
				<h3>2 Запрос</h3>
				<code>select count(*) from decorator where educational_institution = 'KOU' or educational_institution = 'KIT';</code>
				<table class="display table">
					<thead class="thead-dark">
						<tr>
							<th>count</th>
						</tr>
					</thead>
					<tbody class="item-form">

						<?
							try {
								$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
								$res = $db->query("select count(*) from decorator where educational_institution = 'KOU' or educational_institution = 'KIT';");
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
								echo "<tr>";
								echo "<td>" . $row['count'] . "</td>";
								echo "</tr>";
							}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
			
		<hr>

		<div class="row">
			<div class="col">
				<h3>3 Запрос</h3>
				<code>select id, name, education from decorator where id in (select id from decorator_objects where object_id = 1 or object_id = 2);</code>
				<table class="display table">
					<thead class="thead-dark">
						<tr>
							<th>id</th>
							<th>name</th>
							<th>education</th>
						</tr>
					</thead>
					<tbody class="item-form">

						<?
							try {
								$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
								$res = $db->query("select id, name, education from decorator where id in (select id from decorator_objects where object_id = 1 or object_id = 2);");
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
								echo "<tr>";
								echo "<td>" . $row['id'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['education'] . "</td>";
								echo "</tr>";
							}
						?>
						
					</tbody>
				</table>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col">
				<h3>4 Запрос</h3>
				<code>select id, name, replace(address, 'street', '') from decorator; </code>
				<table class="display table">
					<thead class="thead-dark">
						<tr>
							<th>id</th>
							<th>name</th>
							<th>replace</th>
						</tr>
					</thead>
					<tbody class="item-form">
						<?
							try {
								$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
								$res = $db->query("select id, name, replace(address, 'street', '') from decorator; ");
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
								echo "<tr>";
								echo "<td>" . $row['id'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['replace'] . "</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col">
				<h3>5 Запрос</h3>
				<code>select * from object inner join zone on object.id = zone.object_id order by contract_date desc;</code>
				<table class="display table">
					<thead class="thead-dark">
						<tr>
							<th>id</th>
							<th>name</th>
							<th>served</th>
							<th>contract_number</th>
							<th>contract_date</th>
							<th>object_id</th>
						</tr>
					</thead>
					<tbody class="item-form">
						<?
							try {
								$db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
								$res = $db->query("	select * from object inner join zone on object.id = zone.object_id order by contract_date desc;");
							} catch (\Throwable $th) {
								echo "<pre>" . $th . "</pre>";
							}
							
							while ($row = $res->fetch())
							{
								echo "<tr>";
								echo "<td>" . $row['id'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['served'] . "</td>";
								echo "<td>" . $row['contract_number'] . "</td>";
								echo "<td>" . $row['contract_date'] . "</td>";
								echo "<td>" . $row['object_id'] . "</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		
		
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</body>
</html>



