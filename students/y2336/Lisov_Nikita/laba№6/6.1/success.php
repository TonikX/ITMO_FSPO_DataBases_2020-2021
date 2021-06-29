<?php
$mrh_pass1 = "VfapiT7bl5nvELm6R94q";
// чтение параметров
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$mrh_login = $_REQUEST["MrchLogin"];
$crc = $_REQUEST["SignatureValue"];
$crc = strtoupper($crc);
$my_crc = strtoupper(md5("$mrh_login$out_summ:$inv_id:$mrh_pass1"));
if ($my_crc != $crc)
{
    echo "bad sign\n";
    exit();
}

 $message = '';
$file = fopen('cart.txt', 'r');
while (!feof($file)) {
    $message .= fgets($file, 4096);
    $message .= '<br>';
}
fclose($file);

$to = 'foodieboxru@gmail.com'; //не забудь поменять!
$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Заказ в магазине', $spectext.$message.'</body></html>', $headers);

header("Location:http://foodiebox.ru/?order=ok");

?>