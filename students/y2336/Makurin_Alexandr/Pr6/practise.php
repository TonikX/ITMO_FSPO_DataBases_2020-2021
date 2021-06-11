<?php
session_start();
$_SESSION['test'] = 0;
$_SESSION['test2'] = 'a';
$a = 0;
$b = 'a';
$c = [];
$d = [$a => $b];
var_dump($a);
echo '<br>';
var_dump($b);
echo '<br>';
var_dump($c);
echo '<br>';
var_dump($d);
echo '<br>';

if ($a > 0) {
    echo 10;
} elseif ($a < 0) {
    echo -10;
} else {
    echo 0;
}
echo '<br>';

switch($b) {
    case 'a':
        echo $a;
        break;
    case 'b':
        echo 'b';
        break;
    case 'c':
        var_dump($c);
        break;
}
echo '<br>';

for($i = 0; $i < 10; $i++) {
    echo $i;
}
echo '<br>';

foreach(range(0, 9) as $j) {
    echo $j;
}
echo '<br>';

$k = 9;
while(--$k >= 0) {
    echo $k;
}
echo '<br>';

$k = 9;
do {
    echo $k;
} while(--$k >= 0);
echo '<br>';

function test($a, $b) {
    assert($a === $b);
}

test(0, 0);

var_dump($_SESSION);
echo '<br>';

session_unset();
session_destroy();
echo 'Session destroyed<br>';
