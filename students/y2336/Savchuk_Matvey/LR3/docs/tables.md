# Таблицы

## __cотрудник__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_сотрудника       | integer       |True |False|False|
| фио_сотрудника      | text          |False|False|False|

## __редактор__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_сотрудника       | integer       |False |True|True|
| обязанности_сотрудника | text          |False|False|False|

## __книга__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_книги       | integer       |True |False|False|
| название_книги | text          |False|False|False|

## __правки__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_сотрудника       | integer       |False |True|False|
| id_книги | integer          |False|True|False|
| состав_правок | text          |False|False|False|

## __редакторы__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_сотрудника       | integer       |False |True|False|
| id_книги | integer          |False|True|False|
| статус_редактора | boolean          |False|False|False|
| зарплата | integer          |False|False|False|

## __менеджер__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_сотрудника       | integer       |False |True|True|
| обязанности_сотрудника | text          |False|False|False|

## __автор__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_автора       | integer       |True |False|False|
| фио_автора      | text          |False|False|False|

## __заказчик__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_заказчика       | integer       |True |False|False|
| фио_заказчика      | text          |False|False|False|

## __контракт__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_контракта       | integer       |True |False|False|
| id_сотрудника       | integer       |False |True|False|
| id_автора       | integer       |False |True|False|
| id_заказчика       | integer       |False |True|False|
| id_книги      | integer          |False|False|False|
| стоимость | integer          |False|False|False|
| дата_заключения | timestamp          |False|False|False|
| дата_выполнения | timestamp          |False|False|False|


## __заказы__

|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| id_заказчика       | integer       |False |True|False|
| id_книги      | integer          |False|True|False|
| дата_заказа | timestamp          |False|False|False|

## **Код создания таблиц**
```postgresql
create table сотрудник (
  id_сотрудника INTEGER primary key, 
  фио_сотрудника TEXT
);

create table редактор (
  id_сотрудника INTEGER, 
  обязанности_сотрудника TEXT,
  FOREIGN KEY (id_сотрудника) REFERENCES сотрудник (id_сотрудника) ON DELETE CASCADE,
  UNIQUE(id_сотрудника)
);

create table книга (
  id_книги INTEGER primary key, 
  название_книги TEXT
);

create table правки (
  id_сотрудника INTEGER, 
  id_книги INTEGER,
  состав_правок TEXT,
  FOREIGN KEY (id_сотрудника) REFERENCES редактор (id_сотрудника) ON DELETE CASCADE,
  FOREIGN KEY (id_книги) REFERENCES книга (id_книги) ON DELETE CASCADE
);

create table редакторы (
  id_сотрудника INTEGER, 
  id_книги INTEGER,
  статус_редактора boolean,
  зарплата integer,
  FOREIGN KEY (id_сотрудника) REFERENCES редактор (id_сотрудника) ON DELETE CASCADE,
  FOREIGN KEY (id_книги) REFERENCES книга (id_книги) ON DELETE CASCADE
);

create table менеджер (
  id_сотрудника INTEGER, 
  обязанности_сотрудника TEXT,
  FOREIGN KEY (id_сотрудника) REFERENCES сотрудник (id_сотрудника) ON DELETE CASCADE,
  UNIQUE(id_сотрудника)
);

create table автор (
  id_автора INTEGER primary key, 
  фио_автора TEXT
);

create table заказчик (
  id_заказчика INTEGER primary key, 
  фио_заказчика TEXT
);

create table контракт (
  id_контракта INTEGER PRIMARY KEY, 
  id_сотрудника INTEGER,
  id_автора INTEGER,
  id_заказчика INTEGER,
  id_книги INTEGER,
  стоимость integer,
  дата_заключения timestamp,
  дата_выполнения timestamp,
  FOREIGN KEY (id_сотрудника) REFERENCES менеджер (id_сотрудника) ON DELETE CASCADE ,
  FOREIGN KEY (id_автора) REFERENCES автор (id_автора) ON DELETE CASCADE,
  FOREIGN KEY (id_заказчика) REFERENCES заказчик (id_заказчика) ON DELETE CASCADE,
  FOREIGN KEY (id_книги) REFERENCES книга (id_книги) ON DELETE CASCADE
);

create table заказы (
  id_заказчика INTEGER, 
  id_книги INTEGER,
  дата_заказа timestamp,
  FOREIGN KEY (id_заказчика) REFERENCES заказчик (id_заказчика) ON DELETE CASCADE,
  FOREIGN KEY (id_книги) REFERENCES книга (id_книги) ON DELETE CASCADE
);

```

## **Код заполнения данных**
```postgresql
INSERT INTO "сотрудник" VALUES 
(0, 'Иван Васильев'),
(1, 'Дмитрий Иванов'),
(2, 'Кирилл Дмитриенко');

INSERT INTO "редактор" VALUES 
(0, 'Редактирование описаний для книг'),
(1, 'Проверка достоверности обложек книг');

INSERT INTO "книга" VALUES 
(0, 'Доктор Гарин'),
(1, 'Темные пути'),
(2, 'Тревожные люди');

INSERT INTO "правки" VALUES 
(0, 1, 'Неверное описание'),
(1, 2, 'Перепутана обложка с книгой под номером 0');

INSERT INTO "редакторы" VALUES 
(0, 1, true, 15000),
(1, 2, true, 14000);

INSERT INTO "менеджер" VALUES 
(2, 'Проверка заказов и контрактов');

INSERT INTO "автор" VALUES 
(0, 'Владимир Сорокин'),
(1, 'Андрей Васильев'),
(2, 'Фредрик Бакман');

INSERT INTO "заказчик" VALUES 
(0, 'Максим Фед');

INSERT INTO "контракт" VALUES 
(0, 2, 1, 0, 1, 1500, '2021-05-07 08:18', '2021-05-07 10:00');

INSERT INTO "заказы" VALUES 
(0, 1, '2021-05-07 07:10');
```