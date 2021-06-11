##Insert
#### Заполнение таблицы "Животные":
```
insert into animals values 
    (1, 'hawk_Jim', '2005-04-25'),
    (2, 'swift_Tom', '2005-05-02'),
    (4,	'iguana_Sue', '2005-05-30'),
    (5, 'snake_Josh', '2005-06-03'),
    (3, 'iguana_Joe', '2005-05-12');
```
#### Заполнение таблицы "Вид":
```
insert into type values
    (1, 1, 'birds', 'wintering birds fly to warm countries', '42.5 ° C - 45.5 ° C'),
    (2, 2, 'birds', 'wintering birds fly to warm countries', '42.5 ° C - 45.5 ° C');
```
```
insert into type (id_type,id_animal,name) values
    (3, 3, 'iguana'),
    (4, 4, 'iguana'),
    (5, 5, 'snake');
```
#### Заполнение таблицы "Рацион кормления":
```
insert into feeding_ration values
    (1, 'low-concentration', 'feed accounts for 90%, and concentrates - up to 10% in the structure of the diet'),
    (2,	'voluminous', 'concentrates are less than 60% in terms of nutritional value'),
    (3, 'moderately-concentrated', 'concentrates contain 60-70% nutritional value'),
    (4,	'concentrate', 'concentrates contain more than 75% nutritional value'),
    (5,	'voluminous', '90-70% voluminous and 10-30% concentrates'),
    (6, 'concentrate', 'concentrates more than 40% the rest - bulky');
```
#### Заполнение таблицы "Питание":
```
insert into nutrition values
    (1, 1, 2, '14:30:00'),
    (2, 2, 1, '10:34:00'),
    (3, 3, 5, '11:00:00'),
    (4, 4, 6, '12:35:00'),
    (5, 5, 4, '15:00:00');
```
#### Заполнение таблицы "Зона обитания":
```
insert into habitat_area values
    (1, 'Water environment', 'seas, lakes, oceans, lagoons, swamps', 'Aquatic habitats are home to a wide variety of wildlife species. Almost any group of animals can be found here, from amphibians, reptiles, invertebrates to mammals and birds.'),
    (2, 'Desert habitats', 'deserts, shrubs', 'Deserts are quite diverse habitats.Some are sun-baked lands that experience high daytime temperatures. Others are cool and experience cold winters.'),
    (3, 'Forest habitats', 'temperate forests, rainforests, fog forests, coniferous forests',	'There are different types of forests: temperate, tropical, foggy, coniferous and boreal. Each of them has different climatic conditions as well as a variety of fauna and flora.'),
    (4, 'Meadow habitats', 'tropical meadows, steppe meadows, temperate meadows', 'Meadows are habitats dominated by grasses and very few trees and shrubs. Many animals that live there are herbivores and take their place in the food chain, act as food for predators.'),
    (5, 'Tundra habitats', 'alpine tundra, arctic tundra', 'The tundra is a cold habitat. It is characterized by low temperatures, short vegetation, long winters and short growing seasons.');
```
#### Заполнение таблицы "Обитание":
```
insert into habitation values 
    (1, 4, 3),
    (2, 3, 3),
    (3, 1, 3),
    (4, 2, 4),
    (5, 5, 1);
```
#### Заполнение таблицы "Здание":
```
insert into building values
    (1, 'Александровский_парк_1АЖ'),
    (2, 'Александровский парк_1АЗ'),
    (3, 'Александровский_парк_1Я');
```
#### Заполнение таблицы "Территория зоопарка":
```
insert into zoo_territory values
    (1, 1, 2, '15.08.2015-16.02.2025'),
    (2, 2, 2, '12.01.2012-23.09.2023'),
    (3, 3, 1, '15.08.2015-16.02.2025'),
    (4, 4, 1, '12.01.2012-23.09.2023'),
    (5, 5, 1, '15.08.2015-16.02.2025');
```
#### Заполнение таблицы "Сотрудник":
```
insert into worker values
    (1, 'Yana Bogdanov Danilovna', '1978-07-01', 'zootechnik', 'YanaBogdanov@yandex.com', '+79679834988'),
    (2, 'Darya Nikulina Semyonovna', '1980-07-11', 'animal_feeding_workers', 'DaryaNikulina@yandex.com', '+78934984323'),
    (3, 'Evgeny Rogov Kirillovich', '1977-08-01', 'veterinarian', 'EvgenyRogov@yandex.com', '+78934984552'),
    (4, 'Mir Sergeyeva Vladislavovna', '1997-04-21', 'ornithologists', 'MirSergeyeva@yandex.com', '+78934984355'),
    (5, 'Elena Timofeeva Danilovna', '1987-05-23', 'administrator', 'Timofeeva@yandex.com', '+78955984323');
```
#### Заполнение таблицы "Обслуживание":
```
insert into service values
    (1, 2, 1, 'feeding every day at 10:00 and 19:00'),
    (2, 2, 2, 'feeding every day at 10:00 and 19:00'),
    (3, 2, 3, 'feeding every day at 11:00 and 20:00'),
    (4, 2, 4, 'feeding every day at 11:00 and 20:00'),
    (5, 2, 5, 'feeding every day at 9:00 and 17:00'),
    (8, 3, 1, 'Monday at 9:00'),
    (9, 3, 2, 'Wednesday at 11:00'),
    (6, 3, 3, 'Tuesday at 12:00'),
    (7, 3, 4, 'Wednesday at 11:00'),
    (10, 3, 5, 'Monday at 10:00');
```






