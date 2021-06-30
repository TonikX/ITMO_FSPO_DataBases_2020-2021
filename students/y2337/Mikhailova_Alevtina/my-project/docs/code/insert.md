##Insert
#### Заполнение таблицы "Admin":
```
insert into admin values 
    (1, 'Anna'),
    (2, 'Nick'),
    (4,	'Mike'),
    (5, 'Kate'),
    (3, 'Alex');
```
#### Заполнение таблицы "Climbing Club":
```
insert into "climbingClub" values
    (1, 8921435, 'Moscow','Russia', 'climbing@ya.ru','Moscow climbing club', 6754837),
    (2, 8926755, 'Saint-petersburg','Russia', 'climbingspb@ya.ru','Saint-Petersburg climbing club',654748),
    (3, 89245775, 'Ekaterinburg','Russia', 'climbingekb@ya.ru','Ekaterinburg climbing club',859463),
    (4, 89245775, 'Kaliningrad','Russia', 'climbingclubKaliningrad@ya.ru','Kaliningrad climbing club',859375);
```
#### Заполнение таблицы "Group":
```
insert into "group" values
    (1, 'New group');
```
#### Заполнение таблицы "Top":
```
insert into top values
   (1, 'Everest','mountain system of the Himalayas ', 'China', 8848, 'Central and South Asia region', 30),
   (2, 'Elbrus','border of the republics of Kabardino-Balkaria and Karachay-Cherkessia', 'Russia', 5642, 'North Caucasus', 20),
   (3, 'Kilimanjaro', 'Africa','Tanzania', 5891, ' Northeastern Tanzania', 10);
```
#### Заполнение таблицы "Route":
```
insert into route values 
    (1, 'Marangu - from the south side', 3),
    (2, 'South slope', 1),
    (3, 'Trekking to Treskol waterfall', 1);

```
#### Заполнение таблицы "Climber":
```
insert into climber values
    (1,'Kate','Saint-Petersburg climbingclub', 'spb','Elbrus-1, Kilimanjaro=2', 2),
    (2,'Nick','Moscow climbingclub', 'msc','Elbrus-2, Kilimanjaro-1', 1),
    (3,'Mike','Ekaterinburg climbingclub', 'ekb','Everest-1, Kilimanjaro-1', 3),
    (4,'John','kaliningrad climbingclub', 'kaliningrad','Everest-1, Kilimanjaro-2', 4);
```
#### Заполнение таблицы "Ascent":
```
insert into "ascent" values
    ('2020-09-19', 'successfully', '23:59:59', 1,1,1,1, '13:50:00'),
    ('2021-08-25', ' ', '23:59:59', 3,1,3,3, '10:20:00'),
    ('2021-06-18', ' ', '23:59:59', 2,1,2,2, '11:20:00');
```
#### Заполнение таблицы "Emergency Situation":
```
insert into "emergencySituation" values
    (1,'snow avalanche', 1,1,1,1,1,1),
    (2,'snow avalanche', 1,1,2,2,1,1),
    (3,'snow avalanche', 1,1,3,3,1,1),
    (4,'snow avalanche', 1,1,4,4,1,1);
```
#### Заполнение таблицы "Group Composition":
```
insert into "groupComposition" values(
(4,'Kate, Nick, Mike, John', 1, 1,1,1),
(4,'Kate, Nick, Mike, John', 2,2,2,2),
(4,'Kate, Nick, Mike, John', 3,1,3,3),
(4,'Kate, Nick, Mike, John', 4,1,4,4);
```