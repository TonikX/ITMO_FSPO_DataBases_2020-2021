<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

    if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["phone"])){ // если был пост

        $json = file_get_contents('../goods.json');
        $json = json_decode($json, true);

        $name = trim(htmlspecialchars(strip_tags(base64_encode(urlencode($_POST["name"])))));
        $email = trim(htmlspecialchars(strip_tags(base64_encode(urlencode($_POST["email"])))));
        $phone = trim(htmlspecialchars(strip_tags(base64_encode(urlencode($_POST["phone"])))));

        $mrh_login = "FoodieBox";
        $mrh_pass1 = "VfapiT7bl5nvELm6R94q";

        $inv_id = file_get_contents("order_number.txt");

        $inv_desc = "Тестовая оплата";
        $inv_desc = utf8_encode( $inv_desc );
        $out_summ = $_POST["endCost"];

        $shp_item = 1;

        $in_curr = "";

        $culture = "ru";

        $encoding = "utf-8";

        $stroc = "$mrh_login:$out_summ:$inv_id:$mrh_pass1";

        $stroc = utf8_encode( $stroc );

        $crc  = md5("$stroc");
        
        $file = file_get_contents("order_number.txt");



        //letter
        $order = 'Заказ № '.$file;
        $phone = 'Телефон: '.$_POST['phone'];
        $email = 'Почта: '.$_POST['email'];
        $name = 'Имя: '.$_POST['name'];
        $surname = 'Фамилия: '.$_POST['surname'];
        $deliver = 'Способ доставки: '.$_POST['deliver'];
        $street = 'Улица: '.$_POST['street'];
        $home = 'Дом: '.$_POST['home'];
        $floor = 'Квартира: '.$_POST['floor'];
        $time = 'Время доставки: '.$_POST['date'];
        $indent = 'Заказ:';

        $cart = $_POST['cart'];

        $fd = fopen("cart.txt", w);
        fwrite($fd, $order."\r\n");
        fwrite($fd, $phone."\r\n");
        fwrite($fd, $email."\r\n");
        fwrite($fd, $name."\r\n");
        fwrite($fd, $surname."\r\n");
        fwrite($fd, $deliver."\r\n");
        fwrite($fd, $street."\r\n");
        fwrite($fd, $home."\r\n");
        fwrite($fd, $floor."\r\n");
        fwrite($fd, $time."\r\n");
        fwrite($fd, $indent."\r\n");

        foreach ($cart as $id=>$count) {
            $message = '';
            $message .=$json[$id]['name'].' --- ';
            $message .=$count.' --- ';
            $message .=$count*$json[$id]['cost'];
            fwrite($fd, $message."\r\n");
        }

        $cost ='Стоимость: '.$_POST['cost'];
        $sale ='Скидка: '.$_POST['sale'];
        $endCost ='Всего: '.$_POST['endCost'];
        $humus ='Бесплатный хумус: '.$_POST['humus'];
        $cash ='Способ оплаты: '.$_POST['cash'];

        fwrite($fd, $cost."\r\n");
        fwrite($fd, $sale."\r\n");
        fwrite($fd, $endCost."\r\n");
        fwrite($fd, $humus."\r\n");
        fwrite($fd, $cash."\r\n");

        fclose($fd);

        echo("https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$mrh_login&InvId=$inv_id&Culture=$culture&Encoding=$encoding&OutSum=$out_summ&SignatureValue=$crc&IsTest=1");

    }

