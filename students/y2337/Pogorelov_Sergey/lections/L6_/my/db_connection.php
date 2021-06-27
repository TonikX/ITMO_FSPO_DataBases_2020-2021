<?php
  $dbuser = 'postgres';
  $dbpass = 'laba6';
  $host = '127.0.0.1';
  $dbname = 'laba6';

  $bd = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

  // $query = "select 'Hello' as field_1, 123 as field_2";
  // $result = pg_query($bd, $query);
  // $NumRows = pg_num_rows($result);
  // $NumFields = pg_num_fields($result);
  // $field_1 = pg_fetch_result($result, 0, 0);
  // $result_array = pg_fetch_row($result);
  // echo "Rows amount: " . $NumRows . "</br>";
  // echo "Fields amount: " . $NumFields . "</br>";
  // echo "First field: " . $field_1 . "</br>";
  // echo "Array: " . $result_array[0] . ' | ' . $result_array[1];
  // pg_close($db);
?>