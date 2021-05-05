<h1>Table product<h1>
<a href='index.php'>Main Page</a> <br/>
<h2>product</h2>
<?php
	$host = "localhost";
	$dbname = "market";
	$dbuser = "postgres";
	$dbpass = "1234";
	$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$result = $db->query("SELECT * FROM product");
?>

<body>
	<table>
		<tr>
			<th>idproduct</th>
			<th>name_product</th>
			<th>shelf_life</th>
			<th>unit</th>
			<th>price</th>
			<th>date_of_production</th>
			<th>date_of_shipment</th>
		</tr>
    <?php
	while ($row = $result->fetch()) {
    echo '<tr>';
		echo '<td>' . $row['ifproduct'] . '</td>';
		echo '<td>' . $row['name_product'] . " " . '</td>';
		echo '<td>' . $row['shelf_life'] . " " . '</td>';
		echo '<td>' . $row['unit'] . "<br>" . '</td>';
		echo '<td>' . $row['price'] . "<br>" . '</td>';
		echo '<td>' . $row['date_of_production'] . "<br>" . '</td>';
		echo '<td>' . $row['date_of_shipment'] . "<br>" . '</td>';
    echo '</tr>';
	}
    ?>
</table></body></html>


<head>
	<title>table product</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
	li {
		listt-style: none;
	}
	input[type=submit] {
		background-color: #8B0000;
		border: none;
		color: white;
		padding: 8px 16px;
		cursor: pointer;
	}
	</style>
</head>

<h2>Insert row into product table</h2>
	<ul>
		<form name="insert" action="product.php" method="POST">
			<li>idproduct:</li>
			<input type="text" name="ifproduct" />
			<li>name_product:</li>
			<input type="text" name="name_product" />
			<li>shelf_life:</li>
			<input type="text" name="shelf_life" />
			<li>unit:</li>
			<input type="text" name="unit" />
            <li>
			<li>price:</li>
			<input type="text" name="price" />
            <li>
			<li>date_of_production:</li>
			<input type="text" name="date_of_production" />
            <li>
			<li>date_of_shipment:</li>
			<input type="text" name="date_of_shipment" />
            <li>
			<input type="submit" name="submit_insert" /> 
            </li>
        </form>
	</ul>
<?php
if (isset($_POST['submit_insert']))
{
  $db->beginTransaction();
  $insert_query = "INSERT INTO product VALUES
                   ('$_POST[ifproduct]',
                    '$_POST[name_product]',
                    '$_POST[shelf_life]',
                    '$_POST[unit]',
                    '$_POST[price]',
                    '$_POST[date_of_production]',
                    '$_POST[date_of_shipment]')";

  $insert_result = $db->exec($insert_query);
  $db->commit();
  header("Location: product.php");
}
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
	li {
		list-style: none;
	}
	</style>
</head>
<body>
	<h2>Update row. Enter a id product</h2>
	<ul>
		<form name="display" action="product.php" method="POST">
			<li>idproduct:</li>
			<li>
				<input type="text" name="upt_ifproduct" />
			</li>
			<li>
				<input type="submit" name="submit_update" />
			</li>
		</form>
	</ul>
</body>
    
    <?php
	if (isset($_POST['submit_update']))
	{
    $redact_query = "SELECT * FROM product WHERE ifproduct = '$_POST[upt_ifproduct]'";
    $redact_result = $db->query($redact_query);
    $row = $redact_result->fetch();
    echo "<ul>
    <form name='update' action='product.php' method='POST'>
    <li>ifproduct:</li>
    <li><input type='text' name='upt_ifproduct' value='$row[ifproduct]'/></li>
    <li>name_product:</li>
    <li><input type='text' name='upt_name_product' value='$row[name_product]'/></li>
    <li>shelf_life:</li>
    <li><input type='text' name='upt_shelf_life' value='$row[shelf_life]'/></li>
    <li>unit:</li>
    <li><input type='text' name='upt_unit' value='$row[unit]'/></li>
    <li>price:</li>
    <li><input type='text' name='upt_price' value='$row[price]'/></li>
	<li>date_of_production:</li>
    <li><input type='text' name='upt_date_of_production' value='$row[date_of_production]'/></li>
	<li>date_of_shipment:</li>
    <li><input type='text' name='upt_date_of_shipment' value='$row[date_of_shipment]'/></li>
    <li><input type='submit' name='new'/></li>
    </form>
    </ul>";
	}
    ?>

    <?php
	if (isset($_POST['new']))

	{
    $db->beginTransaction();
    $new_query = "UPDATE product
                SET name_product = '$_POST[upt_name_product]',
                    shelf_life = '$_POST[upt_shelf_life]',
                    unit = '$_POST[upt_unit]',
                    price = '$_POST[upt_price]',
                    date_of_production = '$_POST[upt_date_of_production]',
                    date_of_shipment = '$_POST[upt_date_of_shipment]'
                WHERE ifproduct = '$_POST[upt_ifproduct]'";
	$new_result = $db->exec($new_query);
    $db->commit();
	if (!$new_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: product.php");
	}
	}
    ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        li {
        list-style: none;
        }
    </style>
</head>
<body>
    <h2>Delete row. Enter a id product</h2>
    <ul>
        <form name="display" action="product.php" method="POST" >
            <li>idproduct:</li>
            <li><input type="text" name="del_ifproduct"/></li>
            <li><input type="submit" name="submit_delete" /></li>
        </form>
    </ul>
</body>

    <?php
	if (isset($_POST['submit_delete']))
	{
  $db->beginTransaction();
  $delete_query = "DELETE FROM product
                   WHERE ifproduct = '$_POST[del_ifproduct]'";
	$detete_result = $db->exec($delete_query);
  $db->commit();
	if (!$detete_result)
	{
	echo "Error. Think about this. _P";
	} else
	{
	header("Location: product.php");
	}
	}
	echo '</html>';
    ?>

<html>
    <body><table><tr>
    <head>
        <style>
    table {
    font-family: times, sans-serif;
    border-collapse: collapse;
    table-layout: fixed;
    }
    td, th {
    border: 1px solid #8B0000;
    text-align: center;
    padding: 12px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
    tr:hover {background-color: #ddd;}
    </style>
    </head>