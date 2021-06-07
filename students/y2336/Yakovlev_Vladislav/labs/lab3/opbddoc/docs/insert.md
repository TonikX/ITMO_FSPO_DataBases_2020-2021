# Код добавления данных в БД
## Газеты
```
INSERT INTO newspaper VALUES
(1,1,"nazvanie1",123,"editor1","author1"),
(2,2,"nazvanie2",234,"editor2","author2"),
(3,3,"nazvanie3",345,"editor3","author3"),
(4,41,"nazvanie4",456,"editor2","author1"),
(5,3545,"nazvanie5",567,"editor2","author2"),
(6,234,"nazvanie6",678,"editor1","author3"),
(7,234,"nazvanie7",789,"editor3","author1");
```
## Почтовое отделение
```
INSERT INTO pochta VALUES
(1,195197,"ulitsa1"),
(2,195198,"ulitsa2"),
(3,195199,"ulitsa3"),
(4,195123,"ulitsa4"),
(5,195233,"ulitsa5"),
(6,195232,"ulitsa6"),
(7,195231,"ulitsa7");
```
## Типография
```
INSERT INTO typography VALUES
(1,"Typography1","rabotaet","ulitsa1"),
(2,"Typography2","ne rabotaet","ulitsa2"),
(3,"Typography3","rabotaet","ulitsa3"),
(4,"Typography4","ne rabotaet","ulitsa4"),
(5,"Typography5","rabotaet","ulitsa5"),
(6,"Typography6","rabotaet","ulitsa6"),
(7,"Typography7","rabotaet","ulitsa7");
```
## Тираж
```
INSERT INTO tirazh VALUES
(1,100,1),
(2,200,2),
(3,300,3),
(4,400,4),
(5,500,5),
(6,100,1),
(7,50,3);
```
## Производство
```
INSERT INTO proizvodstvo VALUES
(1,'2002-01-22',100,1,1),
(2,'2002-02-22',200,2,2),
(3,'2002-03-22',300,3,3),
(4,'2002-04-22',50,4,4),
(5,'2002-05-22',400,5,5),
(6,'2002-06-22',500,6,6),
(7,'2002-06-23',550,7,7);
```
## Хранение
```
INSERT INTO storage VALUES
(1,2000,1,1),
(2,1000,2,2),
(3,500,3,3),
(4,3000,4,4),
(5,1200,5,5),
(6,550,6,6),
(7,12,7,7);
```