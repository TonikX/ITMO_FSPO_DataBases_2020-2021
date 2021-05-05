<a href='index.php'><h1>Main Page</h1></a>
<h2>Request 1 Вывод номеров партий, начинающихся на 1 и стоящих более 1000</h2>

  <table>
      <tr>
          <th>name_batch</th>
      </tr>
<?php
    
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $dbname='market';

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        $q1 = $pdo->query('SELECT name_batch from batch
        where ASCII(name_batch) = 49 and price_batch > 1000;');

        while ($row = $q1->fetch())
            {
              echo '<tr>';
              echo '<td>' . $row['name_batch'] . '</td>';
              echo '</tr>';
            }
?>
</table></body></html>

<body>
<h2>Request 2 Вывод партий, проданных в 2021 году</h2>
<table>
    <tr>
        <th>idbatch</th>
    </tr>
    <?php
    $stmt = $pdo->query("SELECT idbatch from contract_bcb
    where (select EXTRACT(YEAR FROM date_of_conclusion)) = '2021';");
    while ($row = $stmt->fetch())
    {
      echo '<tr>';
      echo '<td>' . $row['idbatch'] . '</td>';
      echo '</tr>';
    }
    ?>
</table></body></html>

<body>
<h2>Request 3 Вывод партий с товаром под номером 1, принятым в партию ранее 2021-04-18</h2>
<table>
    <tr>
        <th>idbatch</th>
    </tr>
    <?php
$stmt = $pdo->query("SELECT idbatch from batch_content
where idproduct = 1 and date_of_receipt < '2021-04-18';");
while ($row = $stmt->fetch())
{
    echo '<tr>';
    echo '<td>' . $row['idbatch'] . '</td>';
    echo '</tr>';
}
?>
</table></body></html>

<body>
<h2>Request 4 Вывод длины имён товаров</h2>
<table>
    <tr>
        <th>name_product</th>
        <th>length</th>
    </tr>
    <?php
$stmt = $pdo->query('SELECT name_product, LENGTH(name_product) from product;');
while ($row = $stmt->fetch())
{
    echo '<tr>';
    echo '<td>' . $row['name_product'] . '</td>' . '<td>' . $row['length'] . '</td>';
    echo '</tr>';
}
?>
</table></body></html>

<body>
<h2>Request 5 Вывод товаров, произведённых в 2021 году</h2>
<table>
    <tr>
        <th>idproduct</th>
        <th>name_product</th>
    </tr>
    <?php
    $stmt = $pdo->query("SELECT ifproduct, name_product from product 
    where (select EXTRACT(YEAR FROM date_of_production) = 2021);");
    while ($row = $stmt->fetch())
        {
        echo '<tr>';
        echo '<td>' . $row['ifproduct'] . '</td>' . '<td>' . $row['name_product'] . '</td>';
        echo '</tr>';
        }
    ?>
</table></body></html>

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