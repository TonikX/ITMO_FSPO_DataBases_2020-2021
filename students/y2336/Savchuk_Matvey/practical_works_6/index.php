<?php

header('Content-type: text/plain');
$a = 1; $b = 0.1; $c = -0.0000001; $d = "ddd";
$ff = true;

$f = [1,2,3,45,55,3333];
$g = [$f,$f[0]];

if($a && $ff) echo $a;
echo "\n";
if($b > $c) echo "+"; else echo "-";
echo "\n";
if($f[0] == $g[1]) echo "=="; elseif($f[0] == $g[0][1]) echo "elseif"; else echo "die";
echo "\n";

session_start();
if (!isset($_SESSION['time'])) {
$_SESSION['time'] = date("H:i:s");
}
$_SESSION['time'][0] = 1;
$_SESSION['time'][1] = 2;
echo $_SESSION['time'];
echo "\n";

for($i=1;$i<5;$i++){
	echo "{$i}..";
}
echo "\n";

$i=50;
while(++$i<52) echo $i;
echo "\n";

do{ echo $i." "; }while ($i++<55);
echo "\n";

foreach($f as $ss){
	if($ss == 45) break;
	echo "{$ss} ";
}