## Insert
#### Добавление записей в таблицу "Контора":
```
insert into office values(1,'Контора1','АдресКонторы1');
insert into office values(2,'Контора2','АдресКонторы2');
insert into office values(3,'Контора3','АдресКонторы3');
```
#### Добавление записей в таблицу "Брокер":
```
insert into broker values (1,1,'Алексеев И. П.','555-55-55');
insert into broker values (2,3,'Смирнов А. Е.','777-88-99');
insert into broker values (3,3,'Петров К. Г.','123-45-67');
```
#### Добавление записей в таблицу "Партия":
```
insert into batch values(1, 'Предоплата');
insert into batch values(2, 'Предоплата');
insert into batch values(3, 'Оплата после поставки');
```
#### Добавление записей в таблицу "Покупатель":
```
insert into buyer values (1,'Биржа','АдресБиржи');
insert into buyer values (2,'ООО Комета','АдресКометы');
```
#### Добавление записей в таблицу "Договор":
```
insert into contract values (1, '2020-12-12');
insert into contract values (2, '2021-01-08');
insert into contract values (3, '2000-05-11');
```
#### Добавление записей в таблицу "Сделка":
```
insert into deal values (1,1,1,1,1,'2021-04-04');
insert into deal values (2,2,3,2,1,'2021-04-04');
insert into deal values (3,3,2,3,2,'2021-04-04');
```
#### Добавление записей в таблицу "Фирма":
```
insert into firm values (1,'Производитель1','кисло-молочные продукты','АдресФирмы1');
insert into firm values (2,'Производитель2','мебель','АдресФирмы2');
insert into firm values (3,'Производитель3','автомобильные запчасти','АдресФирмы3');
insert into firm values (4,'Производитель4','канцелярия','АдресФирмы4');
```
#### Добавление записей в таблицу "Товар":
```
insert into product values (1,'Молоко','2021-04-07','литр','2021-04-12');
insert into product values (2,'Сыр','2021-03-12','кг','2021-04-10');
insert into product values (3,'Помидоры','2021-04-01','кг','2021-04-13');
insert into product values (4,'Тушёнка','2021-04-07','кг','2023-04-07');
```
#### Добавление записей в таблицу "Товары в партии":
```
insert into product_batch values(1,1,56,5000);
insert into product_batch values(2,1,200,5000);
insert into product_batch values(3,2,87,2000);
```
#### Создание таблицы "Товары фирмы":
```
insert into product_firm values(1,1,'кисло-молочные продукты');
insert into product_firm values(2,1,'кисло-молочные продукты');
```
#### Создание таблицы "Оплата":
```
insert into payment values(1,3,3,'Оплачено','2020-01-18','Оплачено','Предоплата','2020-01-18');
insert into payment values(2,2,1,'Оплачено','2021-11-20','Оплачено','Предоплата','2021-11-20');
insert into payment values(3,1,2,'Оплачено','2018-05-12','Оплачено','Оплата после поставки','2018-05-13');
```