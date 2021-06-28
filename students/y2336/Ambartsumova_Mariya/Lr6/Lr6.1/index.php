<?php
session_start();

$_SESSION['s']= 10;

echo $_SESSION['s']."<br><br>";

function func($t){
	echo "b равно $t<br>";
	$t++;
	echo "b увеличено на единицу - $t<br>";
}

$b = 0.0008; 
$text = "Элементы не равны";
$text2 ="итерация";
$array = array(1,3,3,5,2);

if($array[1] == $array[2] ) func($b);
else if($array[2] == $array[2]) echo $text;
else echo "Здесь есть какой-то текст";

echo "<br>Значение элементов массива:";
foreach ($array as $value){ 
	echo" $value";
}

echo "<br>";

$i = -5; 
$a=$i;

while($i!=3){ 
	$i++;
}

do { 
	$a++;
} while($a!=3);
	
for($a=0;$a<5;$a++){ 
	$b=$a+1;
	echo "<br> $b $text2";
	
}
?>