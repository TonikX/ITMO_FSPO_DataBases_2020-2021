/*Запрос 1:  Вывести номера, в которые заселялись клиенты из Йоркшира и Копенгагена, отсортировав их по id номеров*/

SELECT fio, name, suite_id
FROM client AS cl
INNER JOIN city AS c
ON city_id = c.id
INNER JOIN living AS l
ON client_id = cl.id
WHERE name IN ("Yorkshire", "Copenhagen")
ORDER BY suite_id DESC


/*Запрос 2: Вывести имена нанимаемых работников, администраторов, которые их наняли и дату заключения договора.*/

SELECT s.fio, date_of_agreement, a.fio
FROM servant AS s
INNER JOIN contract AS c
ON s.id = c.serv_id
INNER JOIN admin AS a
ON a.id = c.admin_id
ORDER BY s.id DESC


/*Запрос 3: Вывести клиентов, у которых в имени буквосочетаний «er» и «ng», проживавших когда-либо в номерах стоимостью более 2000/день.*/

SELECT fio, id
FROM client
WHERE fio NOT LIKE "%er%"
AND fio NOT LIKE "%ng%"
AND id <> ALL(SELECT cl.id
FROM client AS cl
INNER JOIN living AS l
ON cl.id = l.client_id
INNER JOIN suite AS s
ON s.id = l.suite_id
WHERE s.cost <= 2000)


/*Запрос 4: Вывести людей, которые в марте жили дольше среднего.*/

SELECT fio
FROM client AS cl
INNER JOIN living AS l
ON client_id = cl.id
WHERE MONTH(date_in) = 4 
AND MONTH(date_out) = 4
AND date_out - date_in >=
(SELECT AVG(date_out - date_in)
FROM test.living
WHERE MONTH(date_in) = 4 
AND MONTH(date_out) = 4)


/*Запрос 5: Вывести комбинации имён работников в нижнем регистре и администраторов в верхнем, длину их имён по отдельности и вместе.*/

SELECT DISTINCT CONCAT(LCASE(s.fio), UCASE(a.fio)),
CHAR_LENGTH(s.fio) AS SERV_LENGTH,
CHAR_LENGTH(a.fio) AS ADMIN_LENGTH,
CHAR_LENGTH(CONCAT(LCASE(s.fio), UCASE(a.fio))) AS SUM_LENGTH
FROM servant AS s, admin AS a, contract


/*Запрос 6:  Вывести последние четыре символа текста договора, отсортировав их по дате подписания.*/

SELECT RIGHT(text, 4)
FROM contract
ORDER BY date_of_agreement DESC


/*Запрос 7: Вывести количество человек, заселившихся между 25 апреля и 5 мая 2003, а также их распределение по этажам.*/

SELECT count(l.id),
SUM(floor = 1) AS first_floor,
SUM(floor = 2) AS second_floor,
SUM(floor = 3) AS third_floor
FROM living AS l
INNER JOIN suite AS s
ON s.id = suite_id
WHERE date_in BETWEEN '2003-04-25' AND '2003-05-05'


/*Запрос 8: Вывести номера, где проживали более одного раза.*/

SELECT suite_id
FROM living
GROUP BY suite_id
HAVING COUNT(suite_id) >= 2


/*Запрос 9: Вывести клиентов, у которых количество букв в имени и номер паспорта являются чётными*/

SELECT fio, CHAR_LENGTH(fio)-1 AS name_length, passport_data
FROM client
WHERE (CHAR_LENGTH(fio)-1)%2 = 0
AND passport_data%2 = 0


/*Запрос 10: Вывести города, из которых никто не приезжал в отель*/

SELECT name
FROM city AS c
WHERE c.id <> ALL(SELECT c.id
FROM city AS c
INNER JOIN client AS cl
ON city_id = c.id
INNER JOIN living AS l
ON l.client_id = cl.id)


/*Запрос 11: Вывести суммарное количество записей (контракты, проживания, уборки), которые утверждены первым и вторым администратором*/

SELECT SUM(admin_1), SUM(admin_2)
FROM(SELECT SUM(admin_id = 0) AS admin_1, SUM(admin_id = 1) AS admin_2
FROM living
UNION
SELECT SUM(admin_id = 0) AS admin_1, SUM(admin_id = 1) AS admin_2
FROM contract
UNION
SELECT SUM(admin_id = 0) AS admin_1, SUM(admin_id = 1) AS admin_2
FROM cleaning) AS s

