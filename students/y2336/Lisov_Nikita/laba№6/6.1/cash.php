<?php

// read json
$json = file_get_contents('../goods.json');
$json = json_decode($json, true);

//order number
$file = file_get_contents("order_number.txt");



//letter
$message = '';
$message .= '<h1>Заказ № '.$file.'</h1>';
$message .= '<p>Телефон: '.$_POST['phone'].'</p>';
$message .= '<p>Почта: '.$_POST['email'].'</p>';
$message .= '<p>Имя: '.$_POST['name'].'</p>';
$message .= '<p>Фамилия: '.$_POST['surname'].'</p>';
$message .= '<p>Способ доставки: '.$_POST['deliver'].'</p>';
$message .= '<p>Улица: '.$_POST['street'].'</p>';
$message .= '<p>Дом: '.$_POST['home'].'</p>';
$message .= '<p>Квартира: '.$_POST['floor'].'</p>';
$message .= '<p>Время доставки: '.$_POST['date'].'</p>';
$message .= '<p>Заказ:</p>';

$fp = fopen('order_number.txt', 'w'); //перезаписываем номер покупки в файл count.txt
fwrite($fp, $file+1);
fclose($fp);

$cart = $_POST['cart'];
$sum = 0;

foreach ($cart as $id=>$count) {
    $message .=$json[$id]['name'].' --- ';
    $message .=$count.' --- ';
    $message .=$count*$json[$id]['cost'];
    $message .='<br>';
}
$message .='<p>Стоимость: '.$_POST['cost'].'</p>';
$message .='<p>Скидка: '.$_POST['sale'].'</p>';
$message .='<p>Всего: '.$_POST['endCost'].'</p>';
$message .='<p>Бесплатный хумус: '.$_POST['humus'].'</p>';
$message .= '<p>Способ оплаты: '.$_POST['cash'].'</p>';
$message .= '<p>Сдача с: '.$_POST['change'].'</p>';


$to = 'foodieboxru@gmail.com'; //не забудь поменять!
$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Заказ в магазине', $spectext.$message.'</body></html>', $headers);

if ($m) {echo 1;} else {echo 0;}
?>
