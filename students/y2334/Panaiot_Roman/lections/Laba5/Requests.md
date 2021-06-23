# Requests


## Requst 1

Определить количество работников компании-авиаперевозчика.
```
SELECT workers FROM AirCareer;
```
## Result

| workers        |
|:-------------- |
| 250            | 
| 500            | 
| 300            | 

## Requst 2

Определить количество сотрудников во втором экипаже.
```
SELECT Staff FROM Crew WHERE idCrew = 2;
```
## Result

| Staff          |
|:-------------- |
| 3              | 

## Requst 3

Вывести номера рейсов, пункты отправления и маршруты полёта, соответствующий данному рейсу
```
SELECT Trip.idTrip, Trip.pointdeparture, Fly.Route FROM Trip INNER JOIN Fly ON  idTrip = idFly;
```

## Result

| idtrip         | pointdeparute  | route          |
|:-------------- |:-----------    |:-------------- |
| 1              | `Moscow`       | `goof`         |
| 2              | `New-York`     | `bad`          |
| 3              | `Tiraspol`     | `asewome`      |

## Requst 4

Вернуть список рейсов, совершенных в 2021 году
```
SELECT * FROM Trip WHERE (SELECT EXTRACT(YEAR FROM Date_departure) = 2021);
```
## Result

| idtrip         | pointdeparute  | destination   |date_departure|date_destination|distance|tickets |
|:-------------- |:-----------    |:--------------|:-------------|:---------------|:-------|:-------|
| 1              | `Moscow`       | `SPB`         | `2021-02-10` | `2021-03-10`   |700     |525     |
| 2              | `New-York`     | `Vashington`  | `2021-02-10` | `2021-04-10`   |800     |350     |
| 3              | `Tiraspol`     | `SPB`         | `2021-02-10` | `2021-05-10`   |1200    |500     |


## Requst 5

Вывести список разниц между датой вылета и датой прибытия в рейсе.
```
SELECT EXTRACT(epoch FROM (Date_destination - Date_departure) )  FROM Trip; 
```

## Result

| Different|
|:---------|
| 1        |
| 2        |
| 3        |   

## Requst 6

Вывести имя Авиаперевозчика и соответствующий ему самолёт
```
SELECT AirCarrier.name, Plane.Stamp FROM AirCarrier INNER JOIN Plane ON  idAirCarrier = idPlane;
```

## Result

| name           | stamp       | 
|:-------------- |:----------- |
| `Aeroflot`     | `Mark1`     |
| `EmiratesAir`  | `Mark2`     |
| `DjangoAir`    | `Mark3`     | 

## Requst 7

Вывести имя и роль сотрудника аэропорта.
```
SELECT CONCAT (name, role) FROM Member;
```

## Result

| Concat        |
|:--------------|
| `RomanPilot`  |
| `EithnePilot` |
| `AglaisStuard`|

## Requst 8

Узнать кол-во символов названия авиаперевозчиков.
```
SELECT LENGTH(name) FROM AirCareer;
```

## Result

| Length   |
|:---------|
| 8        |
| 11       |
| 10       |

## Requst 9

Вывести марку самолёта и соответствующую ей транзитную посадку.
```
SELECT Plane.Stamp, Transit_landings.Point_landings FROM Plane INNER JOIN Transit_landings ON  idPlane = idTransit_landings;
``` 
## Result

| stamp   | point_langing| 
|:--------|:-------------|
| `Mark1` | `Gibraltar`  |
| `Mark2` | `Stambul`    |
| `Mark3` | `Horizon`    | 

Выбрать авиаперевозчиков, предоставляющих самолёт аэропорту:

## Requst 10

Вывести марку самолёта и соответствующую ей транзитную посадку.
```
SELECT * FROM AirCarrier WHERE id= ANY (SELECT AirCarrier FROM Plane);
``` 
## Result

|idaircarrier| name           | workers        |
|:-----------|:-------------- |:-------------- |
|1           | `Aeroflot`     | 250            | 
|2           | `EmiratesAir`  | 500            | 
 
## Requst 11

Выбрать пилота с именем Роман из сотрудников аэропорта:
```
SELECT * FROM Member WHERE name = “Roman” AND role = “Pilot”;
``` 

## Result

|idmember| name    | age | role    |age_exp |
|:-------|:--------|:----|:--------|:-------|
|1       | `Roman` | 20  |`Pilot`  |1       |

## Requst 12

Вывести номера экипажов, имя и роль сотрудника, соответствующий данному экипажу
```
SELECT Crew.idCrew, Member.Name, Member.Role FROM Crew INNER JOIN Member ON  idMember = Member_idMember;
``` 

## Result

|idcrew | name          | role    |
|:------|:--------------|:--------|
| 1     | `Roman`       |`Pilot`  |
| 2     | `Eithne`      |`Pilot`  |
| 3     | `Aglais`      |`Stuard` |

## Requst 13

Вернуть список транзитных посадок, совершённые в марте.
```
SELECT * FROM Transit_landings WHERE (SELECT EXTRACT(MONTH FROM Date_landings) = 3);
``` 

## Result

| idlanding| point_langing|date_landing| 
|:-------- |:-------------|:-----------|
| 2        | `Stambul`    |`2021-03-10`|

## Requst 14

Вывести макс. кол-во мест  в  самолёте
```
SELECT MAX(places) FROM Plane ;
``` 

## Result

| MAX   |
|:------|
| 600   |

## Requst 15

Узнать кол-во символов имён сотрудников.
```
SELECT LENGTH(name) FROM Member;
```

## Result

| Length   |
|:---------|
| 5        |
| 6        |
| 6        |

## Requst 16

Выбрать сотрудника с возрастом 30 лет и опытом работы 3 года.
```
SELECT * FROM Member WHERE Age = 30 AND Age_experience = 3;
``` 

## Result

|idmember| name    | age | role    |age_exp |
|:-------|:--------|:----|:--------|:-------|
|3       | `Aglais`| 30  |`Stuard` |3       |


## Requst 17

Вывести место вылета и место прибытия рейса.
```
SELECT CONCAT (pointdeparture, Destination) FROM Member;
```

## Result

| Concat               |
|:---------------------|
| `MoscowSPB`          |
| `New-YorkVashington` |
| `TiraspolSPB`        |