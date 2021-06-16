/* Вывести названия и высоту гор, в названия района которых есть буква 'i' */
SELECT m.name, m.height FROM mountain m INNER JOIN district d ON m.district_id = d.id WHERE d.name LIKE '%i%';

/* Вывести информацию по альпинистам, телефон клуба которых начинается с 8921 и название клуба начинается с буквы 'P' */
SELECT a.* FROM alpinist a INNER JOIN club c ON a.club_id = c.id WHERE c.phone LIKE '8921%' AND c.name LIKE 'P%';

/* Вывести информацию по альпинистам группы №1 */
SELECT a.* FROM alpinist a INNER JOIN alpinist_in_group ag ON a.id = ag.alpinist_id INNER JOIN grouping g ON ag.grouping_id = g.id WHERE g.id = 1;

/* Вывести информацию по восхождениям, произошедших ранее 2020 года */
SELECT * FROM ascending WHERE (select extract (year from start)) > 2020;

/* Вывести информацию по восхождениям, в которых участвовали группы с составом более 3 человек */
SELECT a.*, COUNT(alp.id) FROM ascending a INNER JOIN grouping g ON a.grouping_id = g.id INNER JOIN alpinist_in_group ag ON g.id = ag.grouping_id INNER JOIN alpinist alp ON alp.id = ag.alpinist_id GROUP BY a.id HAVING COUNT(alp.id) >= 1;

/* Вывести информацию по внештатным сиутациям, произошедшим во время восхождения с айди 3 */
SELECT e.* FROM emergency e INNER JOIN ascending a ON a.id = e.ascending_id WHERE a.id = 3;

/* Вывести название, высоту и название района гор, высотой более 100 метров */
SELECT m.name as "Mountain name", m.height, d.name as "District name" FROM mountain m INNER JOIN district d ON m.district_id = d.id WHERE height > 100;

/* Вывести информацию по клубам и кол-ве альпинистов в них */
SELECT cl.name as "Club name", COUNT(alp.id) as "Number of alpinists" FROM club cl INNER JOIN alpinist alp ON cl.id = alp.club_id GROUP BY cl.id;

/* Вывести информацию по московским клубам, email которых кончается на 'gmail.com' */
SELECT * FROM club WHERE email LIKE '%gmail.com' and city = 'Moscow';

/* Вывести фио и возраст альпинистов старше 10 лет */
SELECT al.name, al.surname, al.age FROM alpinist al INNER JOIN club cl ON al.club_id = cl.id WHERE age > 10;