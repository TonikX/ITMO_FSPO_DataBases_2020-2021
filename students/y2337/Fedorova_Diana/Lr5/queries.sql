/* 1.1
Вывести информацию о всех обслуживаниях, сортированную по именам животных.*/
SELECT service.id_service, animals.name,worker.fio from service, animals,worker where (service.id_worker = worker.id_worker) and (service.id_animal=animals.id_animal) ORDER by animals.name;
/* 1.2
Вывести информацию о типе и времени питания каждого животного, сортированную по названию рациона питания. */
SELECT animals.id_animal, feeding_ration.type,feeding_ration.description,nutrition.feeding_time from (animals join  nutrition on nutrition.id_animal = animals.id_animal) join feeding_ration on feeding_ration.id_feeding_ration=nutrition.id_feeding_ration  ORDER by feeding_ration.type;

/*2.1 
Вывести информацию о рационах питания под названием "concentrate", у котрых номер рациона больше 2.*/
SELECT *from feeding_ration where(type = 'concentrate') and (id_feeding_ration>2);
/*2.2
Вывести информацию о сотрудниках, которые занимают должность "zootechnik" или "veterinarian" или у которых номер телефона "+79679834988" или "+78955984323".*/
SELECT id_worker, fio, post,phone_number from worker where ((post = 'zootechnik')or (post ='veterinarian')) or ((phone_number='+79679834988') or (phone_number = '+78955984323'));

/*3.1
Вывести информацию о сотрудниках, которые родились позже 1979 года.*/
SELECT * from worker where(EXTRACT(year FROM birthday))>1979;
/*3.2
Вывести день, месяц и год рождения животных, которые родились в июне или до 13 числа любого месяца.*/
SELECT id_animal,name, EXTRACT(day from birthday) as day_birthday, EXTRACT(MONTH from birthday) as month_birthday,EXTRACT(YEAR from birthday) as year_birthday from animals where EXTRACT(MONTH from birthday)=6 or EXTRACT(day from birthday) < 13;

/*4.1
Вывести всех сотрудников с использованием функции смены регистра.*/
SELECT id_worker, UPPER(fio),post, phone_number FROM worker;
/*4.2
Вывести всех сотрудников, заменив  все пробелы в ФИО на "_".*/
SELECT id_worker, REPLACE(fio,' ','_'),post, phone_number FROM worker where fio = UPPER(fio) or fio =INITCAP(fio);

/*5.1
Вывести информацию о сотрудниках, которые обслуживают животных, у которых уникальный номер больше 3, и дни обслуживнаия "Понедельник в 10:00" или "Каждый день в 9:00 и 17:00".*/
SELECT id_worker,fio,post from worker where id_worker in (SELECT id_worker from service where (id_animal > 3) and (service = 'Monday at 10:00' Or service = 'feeding every day at 9:00 and 17:00'));
/*5.2
Вывести уникальные номера и имена животных, у которых типом рациона питания не является тип 'voluminous'.*/
SELECT id_animal, name FROM animals WHERE id_animal in (SELECT id_animal FROM nutrition where id_feeding_ration not in (SELECT id_feeding_ration from feeding_ration where type = 'voluminous'));

/*6.1
Вывести количество животных, у которых время питания между 10:34:00 и 12:35:00.*/
SELECT COUNT(id_animal) as kol_animals from  nutrition where feeding_time BETWEEN '10:34:00' and '12:35:00';
/*6.2
Вывести год рождения самого страшего сотрудника среди сотрудников, у которых id больше 2. */
SELECT min(EXTRACT(year FROM birthday)) as YEAR from worker where id_worker>2;
/*6.3
Вывести количество сотрудников, которые родились позже 1979, и которые обслуживают животных каждый день в 11:00 и 20:00.*/
SELECT  COUNT(worker.id_worker) as kol_worker from  worker where (EXTRACT(year FROM birthday))>1979 or id_worker in (SELECT id_worker from service where service = 'feeding every day at 11:00 and 20:00');

/*7
Вывести количество зон обитания, на территории которых обитает более 2 животных зоопарка.*/
SELECT habitation.id_habitat_area from  habitation  GROUP BY id_habitat_area HAVING COUNT(id_animal)>2;

/*8.1
Вывести основную информацию (id,ФИО,должность) только о тех сотрудниках, которые обслуживают животных.*/
SELECT id_worker, fio, post from worker where EXISTS(Select * from service where worker.id_worker = service.id_worker);
/*8.2
Вывести уникальные номера и имена животных, которые являются игуанами.*/
SELECT id_animal, name from animals where id_animal = any (SELECT id_animal from type where name = 'iguana');

/*9.1
Вывести информацию о проживании животных на территории зоопарка, где период проживания с 15.08.2015 по 16.02.2025, в число которых не входит hawk_Jim.*/
SELECT *from zoo_territory where habitat_period = '15.08.2015-16.02.2025' INTERSECT SELECT *from zoo_territory where id_animal  not in (SELECT id_animal from animals where name ='hawk_Jim');
/*9.2
Вывести информацию о сотрудниках, которые не обслуживают животных.*/
SELECT * from worker EXCEPT SELECT *from worker where worker.id_worker in (SELECT id_worker from service);

/*10.1
Вывести подробную информацию о всех животных и их типе.*/
SELECT animals.id_animal, animals.name, animals.birthday, type.name as type,type.information_about_wintering, type.normal_temperature from animals inner join type on animals.id_animal=type.id_animal ORDER by id_animal;
/*10.2
Вывести информацию о питании в зоопарке, которая содержит время питания, имя животного, тип питания и его описание.*/
SELECT nutrition.id_nutrition, nutrition.feeding_time, animals.name, feeding_ration.type, feeding_ration.description from (nutrition LEFT JOIN animals on nutrition.id_animal=animals.id_animal) LEFT JOIN feeding_ration on nutrition.id_feeding_ration = feeding_ration.id_feeding_ration;

