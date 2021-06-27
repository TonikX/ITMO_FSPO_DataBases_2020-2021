<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Example</title>
</head>
<body>
<?php
  $t = date("H");
  echo "<p>The hour (of the server) is " . $t; 
  echo ", and will give the following message:</p>";

  if ($t < "10") {
    echo "Have a good morning!";
  } elseif ($t < "20") {
    echo "Have a good day!";
  } else {
    echo "Have a good night!";
  }
?>
<hr>
<?php
  $favcolor = "red";

  switch ($favcolor) {
    case "red":
      echo "Your favorite color is red!";
      break;
    case "blue":
      echo "Your favorite color is blue!";
      break;
    case "green":
      echo "Your favorite color is green!";
      break;
    default:
      echo "Your favorite color is neither red, blue, nor green!";
}
?>
<hr>
<?php  
  $x = 1;
  
  while($x <= 5) {
    echo "The number is: $x <br>";
    $x++;
  } 
?>  
<hr>
<?php  
  for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
  }
?>
<hr>
<?php  
  $colors = array("red", "green", "blue", "yellow"); 

  foreach ($colors as $color) {
    echo "$color <br>";
  }
?>
<hr>
<?php
  $cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
  );
    
  echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
  echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
  echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
  echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";
?>
<hr>
<?php
  function sum(int $x, int $y) {
    $z = $x + $y;
    return $z;
  }

  echo "5 + 10 = " . sum(5,10) . "<br>";
  echo "7 + 13 = " . sum(7,13) . "<br>";
  echo "2 + 4 = " . sum(2,4);
?>
<hr>
<?php
  // session_start();
  
  // $_SESSION["favcolor"] = "green";
  // $_SESSION["favanimal"] = "cat";
  // echo "Session variables are set.";
?>
<hr>
<?php
  // session_start();

  // echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
  // echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";
  // echo "Modifying...<br>"
  // $_SESSION["favcolor"] = "yellow";
  // print_r($_SESSION);
?>
<hr>
<?php
  // session_unset();
  // session_destroy();

  // echo "Session destroyed !";
?>
<hr>
</body>
</html>