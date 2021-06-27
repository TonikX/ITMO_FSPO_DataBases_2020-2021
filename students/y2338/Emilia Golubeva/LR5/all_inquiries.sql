/*1.1 Вывести  информацию о собаке на каком ринге она выступала, отсортировонную по результатам выступления*/
SELECT dog.name as dog_name, `perfomance in the ring`.grade, `perfomance in the ring`.final_rating, ring.ring_number
FROM dog, ring, `perfomance in the ring` 
WHERE (dog.id_dog = `perfomance in the ring`.id_dog) and (ring.id_Ring = `perfomance in the ring`.id_ring)
ORDER by `perfomance in the ring`.grade DESC;

/*1.2 Вывести  информацию о статусе участия собаки и о типе выставки, отсортированную по именам собак*/
SELECT dog.name as dog_name, registration.status as participation_status, exhibition.type as type_exhibition
FROM dog, exhibition, registration 
WHERE (dog.id_dog = registration.id_dog) and (exhibition.id_exhibition = registration.id_exhibition)
ORDER by dog.name;

/*2 Вывести имя собак, у которых чек оплачен на сумму больше 5000 и статус участия 1.*/
SELECT registration.id_dog, dog.name, registration.chequel
FROM registration JOIN dog ON registration.id_dog = dog.id_dog
WHERE (chequel > 5000) AND (status = 1);

/*3 Вывести месяц и год даты последней вакцинации, которая была проведена после 2019 года.*/
SELECT id_dog, name, EXTRACT(MONTH from date_vaccination) AS month_vaccination, EXTRACT(YEAR from date_vaccination) AS year_vaccination
FROM dog WHERE EXTRACT(YEAR from date_vaccination) > 2019
ORDER BY month_vaccination DESC;

/*4.1 Вывести всех собак и их клубы с использованием функции смены регистра.*/
SELECT id_dog, UPPER(name), UPPER(members_club) FROM dog;

/*4.2 Вывести первые пять символов от наименования финального результата, отсортированных по оценке выступления в порядке возрастания*/
SELECT id_perfomance, LEFT(final_rating, 5) AS final_rating, grade 
FROM `perfomance in the ring` ORDER BY grade;  

/*6. Вывести количество собак, у которых вакцинация была пройдена в период от 1 января 2019 года до 31 декабря 2021 года.*/
SELECT COUNT(id_dog) AS kolvo_dog 
FROM dog WHERE date_vaccination 
BETWEEN '2019-01-01' and '2021-12-31';

/*7 Вывести название тех клубов экспертов, в которых количество участников больше 1.*/
SELECT expert_club FROM expert 
GROUP BY expert_club HAVING COUNT(expert_club) > 1;

/*8 Вывести уникальные номера и имена собак, статус участия которых равен 1.*/
SELECT id_dog, name FROM dog 
WHERE id_dog = ANY (SELECT id_dog FROM registration WHERE status = 1);

/*10.1 Вывести информацию о хозяине собаки, которая не прошла регистрацию */
SELECT registration.id_registration, owner.id_owner, owner.FN as name_owner
FROM registration 
INNER JOIN owner ON registration.id_owner = owner.id_owner 
WHERE (status = 0);

/* 10.2 Вывести информацию о собаке, чьи баллы за выступление больше "5" и выставка типа "полипородная"  */
SELECT `perfomance in the ring`.id_perfomance, dog.name, `perfomance in the ring`.grade, exhibition.id_exhibition
FROM `perfomance in the ring`
JOIN dog ON `perfomance in the ring`.id_dog = dog.id_dog
INNER JOIN exhibition ON `perfomance in the ring`.id_exhibition = exhibition.id_exhibition
WHERE (grade > 5 and type = 'polybreed');
