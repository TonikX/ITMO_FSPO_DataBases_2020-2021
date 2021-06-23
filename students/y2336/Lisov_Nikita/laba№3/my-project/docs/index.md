# Документация Лисова Никиты по ОПБД

##Лабораторная №3
Создать программную систему, предназначенную для администратора лечебной
клиники.<br>
Прием пациентов ведут несколько врачей различных специализаций. На каждого
пациента клиники заводится медицинская карта, в которой отражается вся
информация по личным данным больного и истории его заболеваний (диагнозы). При
очередном посещении врача в карте отражается дата и время приема, диагноз, текущее
состояние больного, рекомендации по лечению. Так как прием ведется только на
коммерческой основе, после очередного посещения пациент должен оплатить
медицинские услуги (каждый прием оплачивается отдельно). Расчет стоимости
посещения определяется врачом согласно прейскуранту по клинике.<br>
Для ведения внутренней отчетности необходима следующая информация о врач:
фамилия, имя, отчество, специальность, образование, пол, дата рождения и дата начала
и окончания работы в клинике, данные по трудовому договору. Для каждого врача
составляется график работы с указанием рабочих и выходных дней.<br>
Прием пациентов врачи могут вести в разных кабинетах. Каждый кабинет имеет
определенный режим работы, ответственного и внутренний телефон.

<img src="./db.jpg" />

####Описание СУБД
Название СУБД: PostgreSQL <br>
Версия СУБД: 13.1 <br>
код создания БД: `CREATE DATABASE laba3`<br>

####Описание таблиц
####Таблица врач <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id врача |INT|+|-|+|является уникальным
|ФИО |STRING|-|-|+|в поле должно быть 3 слова, которые разделены пробелами
|Специальность |STRING|-|-|+|Поле должно быть заполнено
|Образование |STRING|-|-|+|Поле должно быть заполнено
|Пол |STRING|-|-|+|Поле должно быть заполнено
|Дата рождения |DATETIME|-|-|+|В поле должны быть день, месяц, год
|Начало работы |DATETIME|-|-|+|В поле должны быть день, месяц, год
|Трудовой договор |STRING|-|-|+|Поле должно быть заполнено

Код создания таблицы
```
CREATE TABLE laba3.doctors
(
    doctor_id integer NOT NULL,
    doctor_fio character varying(1000) COLLATE pg_catalog."default" NOT NULL,
    doctor_specializacion character varying(100) COLLATE pg_catalog."default" NOT NULL,
    doctor_learn character varying(100) COLLATE pg_catalog."default" NOT NULL,
    doctor_gender character varying(10) COLLATE pg_catalog."default" NOT NULL,
    doctor_birthday date NOT NULL,
    doctor_work date NOT NULL,
    doctor_contract character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT doctors_pkey PRIMARY KEY (doctor_id)
)

```
Код заполнения данных
```
insert into laba3.doctors (doctor_id, doctor_fio, doctor_specializacion, doctor_learn, doctor_gender, doctor_birthday, doctor_work, doctor_contract) values (1, 'Leonid', 'Surgeon', 'Surgeon', 'Man', '1987-04-23', '20010-07-21', 'safw43')
insert into laba3.doctors (doctor_id, doctor_fio, doctor_specializacion, doctor_learn, doctor_gender, doctor_birthday, doctor_work, doctor_contract) values (2, 'Anna', 'Surgeon', 'Surgeon', 'Woman', '1987-04-23', '20010-07-21', '234fs')
insert into laba3.doctors (doctor_id, doctor_fio, doctor_specializacion, doctor_learn, doctor_gender, doctor_birthday, doctor_work, doctor_contract) values (3, 'Sergey', 'Therapist', 'Surgeon', 'Man', '1987-04-23', '20010-07-21', 'sdfsdg123')
```

####Таблица кабинеты <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id кабинет |INT|+|-|+|является уникальным
|Номер кабинета |STRING|-|-|+|размер - не более 32 символов
|Режим работы |STRING|-|-|+|Соответствовать режиму работы клиники
|Ответственный |STRING|-|-|+|Лицо, работающее в клинике
|Телефон |STRING|-|-|+|-

Код создания таблицы
```
CREATE TABLE laba3.cabinets
(
    cabinet_id integer NOT NULL,
    cabinet_number character varying(32) COLLATE pg_catalog."default" NOT NULL,
    cabinet_work character varying(32) COLLATE pg_catalog."default" NOT NULL,
    cabinet_responsible character varying(32) COLLATE pg_catalog."default" NOT NULL,
    cabinet_phone character varying(32) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT cabinets_pkey PRIMARY KEY (cabinet_id)
)
```
Код заполнения данных
```
insert into laba3.cabinets (cabinet_id, cabinet_number, cabinet_work, cabinet_responsible, cabinet_phone) values (1, '111','10:00-19:00', 'Leonid', '88005553');
insert into laba3.cabinets (cabinet_id, cabinet_number, cabinet_work, cabinet_responsible, cabinet_phone) values (2, '121', '10:30-17:00', 'Anna', '88005553');
insert into laba3.cabinets (cabinet_id, cabinet_number, cabinet_work, cabinet_responsible, cabinet_phone) values (3, '132', '11:00-16:30', 'Sergey', '88005553');
```

####Таблица расписание <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id записи |INT|+|-|+|является уникальным
|Статус |Boolean|-|-|+|-
|Время и дата |STRING|-|-|+|-

Код создания таблицы
```
CREATE TABLE laba3.schedule
(
    schedule_id integer NOT NULL,
    schedule_status boolean NOT NULL,
    schedule_date character varying COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT schedule_pkey PRIMARY KEY (schedule_id)
)
```
Код заполнения данных
```
insert into laba3.schedule (schedule_id, schedule_status, schedule_date) values (1, '1','2021-06-23 11:40');
insert into laba3.schedule (schedule_id, schedule_status, schedule_date) values (2, '1', '2021-06-23 12:40');
insert into laba3.schedule (schedule_id, schedule_status, schedule_date) values (3, '1', '2021-06-23 13:40');
```
####Таблица прейскурант <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id услуги |INT|+|-|+|является уникальным
|цена |STRING|-|-|+|-

Код создания таблицы
```
CREATE TABLE laba3.preiscurant
(
    preiscurant_id integer NOT NULL,
    preiscurant_cost character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT preiscurant_pkey PRIMARY KEY (preiscurant_id)
)
```
Код заполнения данных
```
insert into laba3.preiscurant (preiscurant_id, preiscurant_cost) values (1, '2500');
insert into laba3.preiscurant (preiscurant_id, preiscurant_cost) values (2, '1123');
insert into laba3.preiscurant (preiscurant_id, preiscurant_cost) values (3, '13143');
```
####Таблица пациент <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id пациента |INT|+|-|+|является уникальным
|ФИО|STRING|-|-|+|в поле должно быть 3 слова, которые разделены пробелами
|Пол|STRING|-|-|+|-
|Дата рождения|DATE|-|-|+|В поле должны быть день, месяц, год


Код создания таблицы
```
CREATE TABLE laba3.clients
(
    client_id integer NOT NULL,
    client_fio character varying(100) COLLATE pg_catalog."default" NOT NULL,
    client_gender character varying(100) COLLATE pg_catalog."default" NOT NULL,
    client_birthday date NOT NULL,
    CONSTRAINT clients_pkey PRIMARY KEY (client_id)
)
```
Код заполнения данных
```
insert into laba3.clients (client_id, client_fio, client_gender, client_birthday) values (1, 'Nikita', 'man', '1990-04-13');
insert into laba3.clients (client_id, client_fio, client_gender, client_birthday) values (2, 'Igory', 'man', '1991-07-23');
insert into laba3.clients (client_id, client_fio, client_gender, client_birthday) values (3, 'Elena', 'woman', '1990-01-02');
```

####Таблица подсчет стоимости <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id стоимости |INT|+|-|+|является уникальным
|Прейскурант_id_прескурант|STRING|-|+|+|адресует к прескуранту
|Прием к врачу|STRING|-|-|+|-


Код создания таблицы
```

CREATE TABLE laba3.calculation_cost
(
    calculation_cost_id integer NOT NULL,
    calculation_cost_preiscurant integer NOT NULL,
    calculation_cost_doctor character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT calculation_cost_pkey PRIMARY KEY (calculation_cost_id),
    CONSTRAINT fk_preiscurant FOREIGN KEY (calculation_cost_preiscurant)
        REFERENCES laba3.preiscurant (preiscurant_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
```
Код заполнения данных
```
insert into laba3.calculation_cost (calculation_cost_id, calculation_cost_preiscurant, calculation_cost_doctor) values (1, 2, 'Sergey');
insert into laba3.calculation_cost (calculation_cost_id, calculation_cost_preiscurant, calculation_cost_doctor) values (2, 1, 'Anna');
insert into laba3.calculation_cost (calculation_cost_id, calculation_cost_preiscurant, calculation_cost_doctor) values (3, 3, 'Leonid');
```
####Таблица расписание врача <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id расписания |INT|+|-|+|является уникальным
|id врача |INT|-|+|+|адресует к врачу
|Id записи|INT|-|+|+|адресует к записи
|Расписание врач-дата|STRING|-|-|+|-


Код создания таблицы
```
CREATE TABLE laba3.schedule_doctor
(
    schedule_doctor_id integer NOT NULL,
    schedule_doctor_doctor integer NOT NULL,
    schedule_doctor_schedule integer NOT NULL,
    CONSTRAINT schedule_doctor_pkey PRIMARY KEY (schedule_doctor_id),
    CONSTRAINT fk_doctor FOREIGN KEY (schedule_doctor_doctor)
        REFERENCES laba3.doctors (doctor_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_schedule FOREIGN KEY (schedule_doctor_schedule)
        REFERENCES laba3.schedule (schedule_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
```
Код заполнения данных
```
insert into laba3.schedule_doctor (schedule_doctor_id, schedule_doctor_doctor, schedule_doctor_schedule) values (1, 2, 1);
insert into laba3.schedule_doctor (schedule_doctor_id, schedule_doctor_doctor, schedule_doctor_schedule) values (2, 1, 2);
insert into laba3.schedule_doctor (schedule_doctor_id, schedule_doctor_doctor, schedule_doctor_schedule) values (3, 3, 3);
```
####Таблица записи к врачу <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id записи к врачу |INT|+|-|+|является уникальным
|диагноз |STRING|-|+|+|-
|id врача |INT|-|+|+|адресует к врачу
|id пациента|INT|-|+|+|адресует к пациенту
|id кабинета|INT|-|+|+|адресует к кабинету
|id записи|INT|-|+|+|адресует к расписанию


Код создания таблицы
```
CREATE TABLE laba3.doctor_appointments
(
    doctor_appointments_id integer NOT NULL,
    doctor_appointments_diagnosis character varying(100) COLLATE pg_catalog."default" NOT NULL,
    doctor_appointments_doctor integer NOT NULL,
    doctor_appointments_client integer NOT NULL,
    doctor_appointments_cabinet integer NOT NULL,
    doctor_appointments_schenula integer NOT NULL,
    CONSTRAINT pk PRIMARY KEY (doctor_appointments_id),
    CONSTRAINT fk_cabinet FOREIGN KEY (doctor_appointments_cabinet)
        REFERENCES laba3.cabinets (cabinet_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT fk_client FOREIGN KEY (doctor_appointments_client)
        REFERENCES laba3.clients (client_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT fk_doctor FOREIGN KEY (doctor_appointments_doctor)
        REFERENCES laba3.doctors (doctor_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT fk_schedule FOREIGN KEY (doctor_appointments_schenula)
        REFERENCES laba3.schedule (schedule_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
)
```
Код заполнения данных
```
insert into laba3.doctor_appointments (doctor_appointments_id, doctor_appointments_diagnosis, doctor_appointments_doctor, doctor_appointments_client, doctor_appointments_cabinet, doctor_appointments_schenula) values (1, 'diagnosis', 1, 1, 1, 1);
insert into laba3.doctor_appointments (doctor_appointments_id, doctor_appointments_diagnosis, doctor_appointments_doctor, doctor_appointments_client, doctor_appointments_cabinet, doctor_appointments_schenula) values (2, 'diagnosis', 2, 2, 2, 2);
insert into laba3.doctor_appointments (doctor_appointments_id, doctor_appointments_diagnosis, doctor_appointments_doctor, doctor_appointments_client, doctor_appointments_cabinet, doctor_appointments_schenula) values (3, 'diagnosis', 3, 3, 3, 3);
```
####Таблица прием к врачу <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id приема |INT|+|-|+|является уникальным
|id записи |INT|-|+|+|-
|id подсчета |INT|-|+|+|-
|диагноз|STRING|-|-|+|-
|cтоимость|INT|-|-|+|-
|доктор|STRING|-|-|+|-


Код создания таблицы
```
CREATE TABLE laba3.reception_doctor
(
    reception_doctor_id integer NOT NULL,
    reception_doctor_schenula integer NOT NULL,
    reception_doctor_colculate integer NOT NULL,
    reception_doctor_diagnos character varying(100) COLLATE pg_catalog."default" NOT NULL,
    reception_doctor_cost integer NOT NULL,
    reception_doctor_doctor character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT reception_doctor_pkey PRIMARY KEY (reception_doctor_id),
    CONSTRAINT fk_calculate FOREIGN KEY (reception_doctor_colculate)
        REFERENCES laba3.calculation_cost (calculation_cost_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_schenula FOREIGN KEY (reception_doctor_schenula)
        REFERENCES laba3.doctor_appointments (doctor_appointments_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
```
Код заполнения данных
```
insert into laba3.reception_doctor (reception_doctor_id, reception_doctor_schenula, reception_doctor_colculate, reception_doctor_diagnos, reception_doctor_cost, reception_doctor_doctor) values (1, 1, 1, 'diagnoz', 1121, 'Sergey');
insert into laba3.reception_doctor (reception_doctor_id, reception_doctor_schenula, reception_doctor_colculate, reception_doctor_diagnos, reception_doctor_cost, reception_doctor_doctor) values (2, 2, 2, 'diagnoz', 2123, 'Anna');
insert into laba3.reception_doctor (reception_doctor_id, reception_doctor_schenula, reception_doctor_colculate, reception_doctor_diagnos, reception_doctor_cost, reception_doctor_doctor) values (3, 3, 3, 'diagnoz', 33423, 'Anna');
```
####Таблица оплаты <br>

|Наименование поля|Тип данных|Указатель на первичный ключ|Указатель на внешний ключ|Указатель униекальности|Ограничения целостности списком
|-----|------|-------|-------|-------|-------|
|id оплаты |INT|+|-|+|является уникальным
|данные об оплате |Boolean|-|+|+|-
|id приема |INT|-|+|+|-



Код создания таблицы
```
CREATE TABLE laba3.payment
(
    payment_id integer NOT NULL,
    payment_reception integer NOT NULL,
    payment_status boolean NOT NULL,
    CONSTRAINT payment_pkey PRIMARY KEY (payment_id),
    CONSTRAINT fk_recipsion FOREIGN KEY (payment_reception)
        REFERENCES laba3.reception_doctor (reception_doctor_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
```
Код заполнения данных
```
insert into laba3.payment (payment_id, payment_reception, payment_status) values (1, 1, 'true');
insert into laba3.payment (payment_id, payment_reception, payment_status) values (2, 2, 'true');
insert into laba3.payment (payment_id, payment_reception, payment_status) values (3, 3, 'true');
```
##Лабораторная №5
####Запрос 1
Вывод всех колонок из таблиц cabinets и clients без join
```
select * from laba3.cabinets, laba3.clients
```
<img src="./img/5_1.jpg" />
####Запрос 2
Вывод всех колонок из таблиц cabinets и clients с join
```
select * from laba3.preiscurant inner join laba3.calculation_cost on laba3.calculation_cost.calculation_cost_preiscurant=laba3.preiscurant.preiscurant_id
```
<img src="./img/5_2.jpg" />
####Запрос 3
Использование where с более чем двумя условиями
```
select * from laba3.preiscurant where preiscurant_cost>'1200' and preiscurant_id>1
```
<img src="./img/5_3.jpg" />
####Запрос 4
Получение текущей даты и времени
```
SELECT NOW ()
```
<img src="./img/5_4.jpg" />
####Запрос 5
Получение текущей даты
```
SELECT current_date
```
<img src="./img/5_5.jpg" />
####Запрос 6
Получение врачей, у которых дата дня рождения меньше текущей даты
```
select * from laba3.doctors where (select current_date)>laba3.doctors.doctor_birthday
```
<img src="./img/5_6.jpg" />
####Запрос 7
Использование distinct on
```
select distinct on (doctor_specializacion) doctor_specializacion, doctor_gender from laba3.doctors order by doctor_specializacion, doctor_gender
```
<img src="./img/5_7.jpg" />
####Запрос 8
Использование count
```
select count(preiscurant_cost) from laba3.preiscurant
```
<img src="./img/5_8.jpg" />
####Запрос 9
Использование count
```
select count(doctor_fio) from laba3.schedule_doctor
inner join laba3.doctors on schedule_doctor_doctor=laba3.doctors.doctor_id
inner join laba3.schedule on laba3.schedule.schedule_id=schedule_doctor_schedule
where schedule_status = 'true'
```
<img src="./img/5_9.jpg" />
####Запрос 10
Использование union all
```
select preiscurant_id from laba3.preiscurant union all select cabinet_id from laba3.cabinets
```
<img src="./img/5_10.jpg" />
####Запрос 11
Использование any
```
select * from laba3.schedule where schedule_id = any (select schedule_doctor_schedule from laba3.schedule_doctor)
```
<img src="./img/5_11.jpg" />
####Запрос 12
Использование in
```
select * from laba3.schedule where schedule_id in (select schedule_doctor_schedule from laba3.schedule_doctor)
```
<img src="./img/5_12.jpg" />
####Запрос 13
Использование exists
```
select * from laba3.schedule where exists (select schedule_doctor_schedule from laba3.schedule_doctor)
```
<img src="./img/5_12.jpg" />
####Запрос 14
Использование having
```
select max(preiscurant_cost) from laba3.preiscurant
group by preiscurant_id having max(preiscurant_cost)<'11500'
```
<img src="./img/5_14.jpg" />
####Запрос 15
Использование some
```
select * from laba3.schedule where schedule_id = some (select schedule_doctor_schedule from laba3.schedule_doctor)
```
<img src="./img/5_11.jpg" />

##Лабораторная №6
####6.1
Реализовано формирование письма для электронной почты и подключение rodokassa.
```
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

```

```
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
```

```
<?php
$inv_id = $_REQUEST["InvId"];
echo "Вы отказались от оплаты. Заказ# $inv_id\n";
echo "You have refused payment. Order# $inv_id\n";
header("Location:http://foodiebox.ru/?order=ok");
?>
'''

'''
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
```

```
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
```
####6.2
В этой части работы представлено выполнение задания 6.2, где нужно было реализовать вывод таблицы из БД, возможность редактирования и удаления. Ниже представлен php код.

Код из файла index.php
'''
<?php

<?php

	$dbuser = 'postgres';
	$dbpass = '1234';
	$host = 'localhost';
	$port = '5433';
	$dbname = 'laba3';

	$db = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass");

	$query = "select * from laba3.doctors;";
	$result = pg_query($db, $query);
	$rows = pg_num_rows($result);
	$row = pg_fetch_assoc($result);
	$organizations=[];

	while ($myrow = pg_fetch_array($result)) {
		$organizations[]=$myrow;

	}

	$query2 = "select * from laba3.preiscurant inner join laba3.calculation_cost on laba3.calculation_cost.calculation_cost_preiscurant=laba3.preiscurant.preiscurant_id";
	$result2 = pg_query($db, $query2);
	$rows2 = pg_num_rows($result2);
	$row2 = pg_fetch_assoc($result2);
	$organizations2=[];

	while ($myrow2 = pg_fetch_array($result2)) {
		$organizations2[]=$myrow2;

	}

	$query3 = "select * from laba3.preiscurant where preiscurant_cost>'1200' and preiscurant_id>1";
	$result3 = pg_query($db, $query3);
	$rows3 = pg_num_rows($result3);
	$row3 = pg_fetch_assoc($result3);
	$organizations3=[];

	while ($myrow3 = pg_fetch_array($result3)) {
		$organizations3[]=$myrow3;

	}

	$query4 = "select distinct on (doctor_specializacion) doctor_specializacion, doctor_gender from laba3.doctors order by doctor_specializacion, doctor_gender";
	$result4 = pg_query($db, $query4);
	$rows4 = pg_num_rows($result4);
	$row4 = pg_fetch_assoc($result4);
	$organizations4=[];

	while ($myrow4 = pg_fetch_array($result4)) {
		$organizations4[]=$myrow4;

	}

	$query5 = "SELECT * FROM laba3.calculation_cost";
	$result5 = pg_query($db, $query5);
	$rows5 = pg_num_rows($result5);
	$row5 = pg_fetch_assoc($result5);
	$organizations5=[];

	while ($myrow5 = pg_fetch_array($result5)) {
		$organizations5[]=$myrow5;

	}



	if (isset($_GET['doctor_id'])) {

		$sql_delete = "delete  from laba3.doctors where doctor_id = '" .$_GET['doctor_id']."'";
		$query_delete = pg_query($db,$sql_delete);

		if($query_delete){
			echo "Deleted";
		}
		else{
			echo pg_error($db);
		}
	}

	if (isset($_GET['calculation_cost_id'])) {

		$sql_delete = "delete  from laba3.calculation_cost where calculation_cost_id = '" .$_GET['calculation_cost_id']."'";
		$query_delete = pg_query($db,$sql_delete);

		if($query_delete){
			echo "Deleted";
		}
		else{
			echo pg_error($db);
		}
	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "style.css"/>
	</head>
	<body>
		<!-- <h1>Таблица организаций</h1> -->
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Специализация</th>
				<th>Образование</th>
				<th>Пол</th>
				<th>День рождения</th>
				<th>Дата трудоустройства</th>
				<th>Контракт</th>
				<th>Удалить</th>
				<th>Редактировать</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($organizations as $organization):
			?>
				  <tr>
				  	<td><?php echo $organization['doctor_id'] ?></td>
				  	<td><?php echo $organization['doctor_fio'] ?></td>
				  	<td><?php echo $organization['doctor_specializacion'] ?></td>
				  	<td><?php echo $organization['doctor_learn'] ?></td>
				  	<td><?php echo $organization['doctor_gender'] ?></td>
				  	<td><?php echo $organization['doctor_birthday'] ?></td>
				  	<td><?php echo $organization['doctor_work'] ?></td>
						<td><?php echo $organization['doctor_contract'] ?></td>
				  	<td><button class="delete"><a href="?doctor_id=<?php echo $organization['doctor_id'] ?>">Удалить</a></button></td>
					<td><button class="edit"><a href="edit.php?edit=<?php echo $organization['doctor_id'] ?>">Редактировать</a></button></td>
				  </tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>calculation_cost_id</th>
				<th>calculation_cost_preiscurant</th>
				<th>calculation_cost_doctor</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($organizations5 as $organization5):
			?>
				  <tr>
				  	<td><?php echo $organization5['calculation_cost_id'] ?></td>
				  	<td><?php echo $organization5['calculation_cost_preiscurant'] ?></td>
				  	<td><?php echo $organization5['calculation_cost_doctor'] ?></td>
				  	<td><button class="delete"><a href="?calculation_cost_id=<?php echo $organization5['calculation_cost_id'] ?>">Удалить</a></button></td>
					<td><button class="edit"><a href="edit.php?edit2=<?php echo $organization5['calculation_cost_id'] ?>">Редактировать</a></button></td>
				  </tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>
	<h5>select * from laba3.preiscurant inner join laba3.calculation_cost on laba3.calculation_cost.calculation_cost_preiscurant=laba3.preiscurant.preiscurant_id</h5>
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>preiscurant_id</th>
				<th>preiscurant_cost</th>
				<th>calculation_cost_id</th>
				<th>calculation_cost_preiscurant</th>
				<th>calculation_cost_doctor</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($organizations2 as $organization):
			?>
					<tr>
						<td><?php echo $organization['preiscurant_id'] ?></td>
						<td><?php echo $organization['preiscurant_cost'] ?></td>
						<td><?php echo $organization['calculation_cost_id'] ?></td>
						<td><?php echo $organization['calculation_cost_preiscurant'] ?></td>
						<td><?php echo $organization['calculation_cost_doctor'] ?></td>
					</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>
	<h5>select * from laba3.preiscurant where preiscurant_cost>'1200' and preiscurant_id>1</h5>
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>preiscurant_id</th>
				<th>preiscurant_cost</th>
			</tr>
		</thead>
		<tbody>

					<tr>
						<td><?php echo $organization['preiscurant_id'] ?></td>
						<td><?php echo $organization['preiscurant_cost'] ?></td>
					</tr>
		</tbody>
	</table>
	<br><br>
	<h5>select distinct on (doctor_specializacion) doctor_specializacion, doctor_gender from laba3.doctors order by doctor_specializacion, doctor_gender</h5>
	<br><br>
	<table id="tb">
		<thead>
			<tr>
				<th>doctor_specializacion</th>
				<th>doctor_gender</th>
			</tr>
			<tr>
				<td><?php echo $organizations4[0]['doctor_specializacion'] ?></td>
				<td><?php echo $organizations4[0]['doctor_gender'] ?></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($organizations4 as $organization):
			?>
					<tr>
						<td><?php echo $organization['doctor_specializacion'] ?></td>
						<td><?php echo $organization['doctor_gender'] ?></td>
					</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</body>
</html>

'''
Страница index.php на сервере
<img src="./img/6_2_1.jpg" />

Код из файла edit.php
'''
<?php
    $dbuser = 'postgres';
    $dbpass = '1234';
    $host = 'localhost';
    $port = '5433';
    $dbname = 'laba3';

    $db = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass");

    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        $query = pg_query($db,"Select doctor_id,doctor_fio,doctor_specializacion,doctor_learn,doctor_gender,doctor_birthday,doctor_work,doctor_contract from laba3.doctors where doctor_id = $id ");
		    $row = pg_fetch_array($query);


		if($row){
			$_SESSION['doctor_id']= $row['doctor_id'];
			$_SESSION['doctor_fio'] = $row['doctor_fio'];
			$_SESSION['doctor_specializacion'] = $row['doctor_specializacion'];
			$_SESSION['doctor_learn'] = $row['doctor_learn'];
			$_SESSION['doctor_gender'] = $row['doctor_gender'];
			$_SESSION['doctor_birthday'] = $row['doctor_birthday'];
			$_SESSION['doctor_work'] = $row['doctor_work'];
      $_SESSION['doctor_contract'] = $row['doctor_contract'];
		}
		else{

			echo "Error";
		}

    }

    if (isset($_GET['edit2'])) {

        $id = $_GET['edit2'];
        $query = pg_query($db,"Select calculation_cost_id, calculation_cost_preiscurant,calculation_cost_doctor from laba3.calculation_cost where calculation_cost_id = $id ");
		    $row = pg_fetch_array($query);


		if($row){
			$_SESSION['calculation_cost_id']= $row['calculation_cost_id'];
			$_SESSION['calculation_cost_preiscurant'] = $row['calculation_cost_preiscurant'];
			$_SESSION['calculation_cost_doctor'] = $row['calculation_cost_doctor'];
    }
		else{

			echo "Error";
		}

    }

    if (isset($_POST['update'])) {
		$doctor_id = $_POST['doctor_id'];
		$doctor_fio = $_POST['doctor_fio'];
		$doctor_specializacion = $_POST['doctor_specializacion'];
		$doctor_learn = $_POST['doctor_learn'];
		$doctor_gender = $_POST['doctor_gender'];
		$doctor_birthday = $_POST['doctor_birthday'];
		$doctor_work = $_POST['doctor_work'];
    $doctor_contract = $_POST['doctor_contract'];

		$sql = "update laba3.doctors set  doctor_fio = '".$doctor_fio."', doctor_specializacion = '".$doctor_specializacion."', doctor_learn = '".$doctor_learn."', doctor_gender = '".$doctor_gender."',doctor_birthday = '".$doctor_birthday."',doctor_work = '".$doctor_work."',doctor_contract = '".$doctor_contract."' where doctor_id = $doctor_id ";

		$query=pg_query($db,$sql);
		if($query){
		  header("location: index.php");
		  echo "Success";
		}else{

			echo pg_error($db);
		}


	}
  if (isset($_POST['update2'])) {
  $calculation_cost_id = $_POST['calculation_cost_id'];
  $calculation_cost_preiscurant = $_POST['calculation_cost_preiscurant'];
  $calculation_cost_doctor = $_POST['calculation_cost_doctor'];


  $sql = "update laba3.calculation_cost set  calculation_cost_preiscurant = '".$calculation_cost_preiscurant."', calculation_cost_doctor = '".$calculation_cost_doctor."' where calculation_cost_id = $calculation_cost_id ";

  $query=pg_query($db,$sql);
  if($query){
    header("location: index.php");
    echo "Success";
  }else{

    echo pg_error($db);
  }


}

?>

<!DOCTYPE html>
	<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" href = "style.css"/>
	</head>
	<body>
    <h1>Редактирование</h1>
        <div id="container">
          <?php if (isset($_GET['edit'])) {  ?>
            <form method="post" enctype="multipart/form-data" id="form-box">
                    <input type="hidden" name="doctor_id" class="input" required value="<?php echo $_SESSION['doctor_id']; ?>"/>
                    Фио : <input type="text" name="doctor_fio" id="name" class="input" required value="<?php echo $_SESSION['doctor_fio']; ?>"/> <br/><br/>
                    Специальность : <input type="text" name="doctor_specializacion"  class="input" required value="<?php echo $_SESSION['doctor_specializacion']; ?>"/> <br/><br/>
                    Образование : <input type="text" name="doctor_learn"  class="input" required value="<?php echo $_SESSION['doctor_learn']; ?>"/> <br/><br/>
                    Пол : <input type="text" name="doctor_gender"  class="input" required value="<?php echo $_SESSION['doctor_gender']; ?>"/> <br/><br/>
                    Дата рождения : <input type="text" name="doctor_birthday"  class="input"required value="<?php echo $_SESSION['doctor_birthday']; ?>"/> <br/><br/>
                    Дата устройства на работу : <input type="text" name="doctor_work"  class="input" required value="<?php echo $_SESSION['doctor_work']; ?>"/> <br/><br/>
                    Контракт : <input type="text" name="doctor_contract"  class="input" required value="<?php echo $_SESSION['doctor_contract']; ?>"/> <br/><br/>
                    <input class="register" type="submit" name="update" value="UPDATE">
                    <button class="back"><a href="index.php">BACK</a></button>
            </form>
          <?php }?>
          <?php if (isset($_GET['edit2'])) {  ?>
            <form method="post" enctype="multipart/form-data" id="form-box">
                    <input type="hidden" name="calculation_cost_id" class="input" required value="<?php echo $_SESSION['calculation_cost_id']; ?>"/>
                    calculation_cost_preiscurant : <input type="text" name="calculation_cost_preiscurant" id="name" class="input" required value="<?php echo $_SESSION['calculation_cost_preiscurant']; ?>"/> <br/><br/>
                    calculation_cost_doctor : <input type="text" name="calculation_cost_doctor"  class="input" required value="<?php echo $_SESSION['calculation_cost_doctor']; ?>"/> <br/><br/>
                    <input class="register" type="submit" name="update2" value="UPDATE">
                    <button class="back"><a href="index.php">BACK</a></button>
            </form>
          <?php }?>
        </div>
    </body>
</html>

'''

Страница edit.php на сервере
<img src="./img/6_2_2.jpg" />
##Лабораторная №7
Работа с MongoDB
<img src="./mongo.jpg" />
