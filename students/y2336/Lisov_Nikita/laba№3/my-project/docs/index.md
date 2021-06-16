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
