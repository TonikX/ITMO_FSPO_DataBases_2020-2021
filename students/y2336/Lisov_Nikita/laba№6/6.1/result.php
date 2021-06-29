<?php
$mrh_pass2 = "H2dKWcM751EZYPLPsW1n";
// чтение параметров
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$shp_item = $_REQUEST["Shp_item"];
$crc = $_REQUEST["SignatureValue"];
$shp_mulo = $_REQUEST["shp_mulo"];
$shp_names = $_REQUEST["shp_names"];
$shp_phone = $_REQUEST["shp_phone"];
$crc = strtoupper($crc);
$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item:shp_mulo=$shp_mulo:shp_names=$shp_names:shp_phone=$shp_phone")); // формируем новый ключ
if ($my_crc != $crc)
{
    echo "bad sign\n";
    exit();
}
$count = file_get_contents("order_number.txt");
$fp = fopen('count.txt', 'w');
fwrite($fp, $count+1);
fclose($fp);

$email_k = urldecode(base64_decode($shp_mulo));
$name_k = urldecode(base64_decode($shp_names));
$phone_k = urldecode(base64_decode($shp_phone));
$result = $email_k."\r\n".$name_k."\r\n".$phone_k;

$fp = fopen('last_order.txt', 'w');
fwrite($fp, $result);
fclose($fp);

echo "OK$inv_id\n";
?>