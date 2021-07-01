SELECT *
FROM cleaning AS c
INNER JOIN servant AS s
ON c.serv_id = s.id
WHERE floor = 3

SELECT client_id, fio
FROM living AS l
INNER JOIN client AS c
ON l.client_id = c.id
WHERE date_in IN ('2003-04-25', '2003-04-30')

SELECT city_id, ci.name
FROM client AS c
INNER JOIN city as ci
on c.city_id = ci.id
GROUP BY city_id, ci.name
HAVING COUNT(city_id) > 1


INSERT INTO client (id, fio, passport_data, city_id)
VALUES ('11', 'Vince Vega', '789829', '4')

INSERT INTO cleaning
VALUES (9, 1, '2003-04-28', 1, 1, 1)

INSERT INTO admin
VALUES (2, 'Jamie Newell')


DELETE FROM admin
WHERE id = 2

DELETE FROM city
WHERE name LIKE '%eru%'

DELETE FROM client
WHERE passport_data > 300000 AND passport_data < 500000