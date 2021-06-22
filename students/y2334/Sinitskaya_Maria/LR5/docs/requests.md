#Запросы к базе данных

##Запрос 1
`Вывести названия и высоту гор, в названия района которых есть буква 'i'`

```
SELECT m.name, m.height FROM mountain m INNER JOIN district d ON m.district_id = d.id WHERE d.name LIKE '%i%';
```

|  name  | height|
|:--------|:--------|
| Ural   |    100|
| Holmik |  10000|

##Запрос 2
`Вывести информацию по альпинистам, телефон клуба которых начинается с 8921 и название клуба начинается с буквы 'P'`

```
SELECT a.* FROM alpinist a INNER JOIN club c ON a.club_id = c.id WHERE c.phone LIKE '8921%' AND c.name LIKE 'P%';
```

|id | name  | surname  | age | experience | address | club_id|
|:---|:-------|:----------|:-----|:------------|:---------|:---------|
|2  | Alina | Antipova |  20 |          5 | Petroga |       2|

##Запрос 3
`Вывести информацию по альпинистам группы №1`

```
SELECT a.* FROM alpinist a INNER JOIN alpinist_in_group ag ON a.id = ag.alpinist_id INNER JOIN grouping g ON ag.grouping_id = g.id WHERE g.id = 1;
```

| id |  name  | surname | age | experience |  address  | club_id|
|:----|:--------|:---------|:-----|:------------|:-----------|:--------|
| 1  | German | Ishakov |  10 |          1 | Nikolskoe |       1|

##Запрос 4
`Вывести информацию по восхождениям, произошедших ранее 2020 года`

```
SELECT * FROM ascending WHERE (select extract (year from start)) > 2020;
```

| id |           start            |           ending           | grouping_id|
|:----|:----------------------------|:----------------------------|:-------------|
 | 1 | 2021-05-27 23:36:42.489515 | 2021-05-27 23:36:42.489515 |           1|
 | 2 | 2021-05-27 23:36:45.177962 | 2021-05-27 23:36:45.177962 |           2|
  |3 | 2021-05-27 23:36:47.523538 | 2021-05-27 23:36:47.523538 |           3|

##Запрос 5
`Вывести информацию по восхождениям, в которых участвовали группы с составом более 3 человек`

```
SELECT a.*, COUNT(alp.id) FROM ascending a INNER JOIN grouping g ON a.grouping_id = g.id INNER JOIN alpinist_in_group ag ON g.id = ag.grouping_id INNER JOIN alpinist alp ON alp.id = ag.alpinist_id GROUP BY a.id HAVING COUNT(alp.id) >= 1;
```

 |id |           start            |           ending           | grouping_id | count|
|:----|:----------------------------|:----------------------------|:-------------|:-------|
 | 2 | 2021-05-27 23:36:45.177962 | 2021-05-27 23:36:45.177962 |           2 |     1|
  |3 | 2021-05-27 23:36:47.523538 | 2021-05-27 23:36:47.523538 |           3 |     1|
 | 1 | 2021-05-27 23:36:42.489515 | 2021-05-27 23:36:42.489515 |           1 |     1|

##Запрос 6
`Вывести информацию по внештатным сиутациям, произошедшим во время восхождения с айди 3`

```
SELECT e.* FROM emergency e INNER JOIN ascending a ON a.id = e.ascending_id WHERE a.id = 3;
```

 |id | ascending_id | alpinist_id | explanaition|
|:---|:--------------|:-------------|:--------------|
 | 3 |            3 |           3 | Injure|

##Запрос 7
`Вывести название, высоту и название района гор, высотой более 100 метров`

```
SELECT m.name as "Mountain name", m.height, d.name as "District name" FROM mountain m INNER JOIN district d ON m.district_id = d.id WHERE height > 100;
```

 |Mountain name | height | District name|
|:---------------|:--------|:---------------|
 |Rashmor       |    200 | LA|
 |Holmik        |  10000 | Vinnitsa|

##Запрос 8
`Вывести информацию по клубам и кол-ве альпинистов в них`

```
SELECT cl.name as "Club name", COUNT(alp.id) as "Number of alpinists" FROM club cl INNER JOIN alpinist alp ON cl.id = alp.club_id GROUP BY cl.id;
```

 |Club name | Number of alpinists|
|:-----------|:---------------------|
 |Pendos    |                   1 |
 |Ponaduser |                   1|
 |Yalta     |                   1|

##Запрос 9
`Вывести информацию по московским клубам, email которых кончается на 'gmail.com'`

```
SELECT * FROM club WHERE email LIKE '%gmail.com' and city = 'Moscow';
```

| id | name  |  city  |         email          |    phone    |    holder_contacts     | country_id|
|:----|:-------|:--------|:------------------------|:-------------|:------------------------|:------------|
|  1 | Yalta | Moscow | loghorrean74@gmail.com | 89213043881 | Fedorov Ilya Igorevich |          1|

##Запрос 10
`Вывести фио и возраст альпинистов старше 10 лет`

```
SELECT al.name, al.surname, al.age FROM alpinist al INNER JOIN club cl ON al.club_id = cl.id WHERE age > 10;
```

 | name  |  surname  | age|
|:--------|:-----------|:-----|
 |Alina  | Antipova  |  20|
 |Kirill | Vyaznikov |  15|
