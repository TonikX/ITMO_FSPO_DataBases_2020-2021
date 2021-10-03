### Заполнение таблицы "Диета"
```
INSERT INTO workplace.diet(
	id, name, content)
	VALUES (1, '1_dieta', 'content1');
	VALUES (2, '2_dieta', 'content2');
	VALUES (3, '3_dieta', 'content3');
	VALUES (4, '4_dieta', 'content4');
```
### Заполнение таблицы "Курица"
```
INSERT INTO workplace.chicken(
	id, weight, age, performance, breed_id)
	VALUES (1, 1, 1, 5, 1);
	VALUES (2, 1, 1, 5, 2);
	VALUES (3, 2, 1, 4, 3);
	VALUES (4, 2, 1, 4, 4);
	VALUES (5, 3, 1, 3, 5);
	VALUES (6, 3, 1, 3, 6);
	VALUES (7, 2, 2, 2, 1);
	VALUES (8, 3, 2, 4, 2);
	VALUES (9, 1, 2, 3, 3);
	VALUES (10, 1, 2, 5, 4);
	VALUES (11, 2, 2, 5, 5);
	VALUES (12, 3, 1, 2, 6);
```
### Заполнение таблицы "Клетка"
```
INSERT INTO workplace.cell(
	id, num_row, num, workshop_id)
	VALUES (1, 1, 1, 1);
	VALUES (2, 1, 2, 1);
	VALUES (3, 2, 1, 1);
	VALUES (4, 1, 1, 2);
	VALUES (5, 1, 2, 2);
	VALUES (6, 2, 1, 2);
	VALUES (7, 1, 1, 3);
	VALUES (8, 1, 2, 3);
	VALUES (9, 1, 1, 4);
	VALUES (10, 1, 2, 4);
```

### Заполнение таблицы "Работник"
```
INSERT INTO workplace.worker(
	id, fio, pass, salary, contract)
	VALUES (1, 'vlad', 11111111, 30000, '{contr1}');
	VALUES (2, 'sergey', 22222222, 30000, '{contr2}');
	VALUES (3, 'mihail', 33333333, 25000, '{contr3}');
	VALUES (4, 'anna', 44444444, 45000, '{contr4}');
	VALUES (5, 'maria', 55555555, 35000, '{contr5}');
	VALUES (6, 'vladimir', 66666666, 35000, '{contr6}');
	VALUES (7, 'nikolai', 77777777, 40000, '{contr7}');
	VALUES (8, 'olga', 88888888, 40000, '{contr8}');
	VALUES (9, 'artem', 99999999, 55000, '{contr9}');
	VALUES (10, 'elena', 10101010, 50000, '{contr10}');
```
### Заполнение таблицы "Порода"
```
INSERT INTO workplace.breed(
	id, name, weight, performance, diet_id)
	VALUES (1, 'greenstore', 1, 2, 1);
	VALUES (2, 'redstore', 1, 2, 1);
	VALUES (3, 'yellowstore', 2, 4, 2);
	VALUES (4, 'purplestore', 1, 4, 3);
	VALUES (5, 'orangestore', 2, 3, 4);
	VALUES (6, 'bluestore', 2, 3, 4);
```

### Заполнение таблицы "Обслуживание"
```
INSERT INTO workplace.serving(
	id, worker_id, cell_id, date_serving)
	VALUES (1, 1, 1, '2021-01-01');
	VALUES (2, 1, 2, '2021-01-01');
	VALUES (3, 2, 3, '2021-01-01');
	VALUES (4, 2, 4, '2021-01-01');
	VALUES (5, 2, 5, '2021-01-02');
	VALUES (6, 3, 6, '2021-02-03');
	VALUES (7, 4, 7, '2021-04-05');
	VALUES (8, 5, 8, '2021-04-04');
	VALUES (9, 6, 9, '2021-02-01');
	VALUES (10, 7, 10, '2021-03-03');
	VALUES (11, 7, 10, '2021-03-03');
```
### Заполнение таблицы "Пребывание"
```
INSERT INTO workplace.stay(
	id, chicken_id, cell_id, date_start, date_delete)
	VALUES (1, 1, 1, '2021-01-01', '2021-10-01');
	VALUES (2, 2, 2, '2021-01-01', '2021-10-01');
	VALUES (3, 3, 3, '2021-01-01', '2021-10-01');
	VALUES (4, 4, 4, '2021-01-01', '2021-10-01');
	VALUES (5, 5, 5, '2021-01-01', '2021-10-01');
	VALUES (6, 6, 6, '2021-03-03', '2021-10-03');
	VALUES (7, 7, 7, '2021-04-04', '2021-10-04');
	VALUES (8, 8, 8, '2021-01-02', '2021-10-02');
	VALUES (9, 9, 9, '2021-02-01', '2021-10-01');
	VALUES (10, 10, 10, '2021-04-05', '2021-10-05');
	VALUES (11, 11, 1, '2021-01-01', '2021-10-01');
	VALUES (12, 12, 2, '2021-01-01', '2021-10-01');
```
### Заполнение таблицы "Цех"
```
INSERT INTO workplace.workshop(
	id, number_workshop, quantity)
	VALUES (1, 1, 3);
	VALUES (2, 2, 3);
	VALUES (3, 3, 2);
	VALUES (4, 4, 2);
```









