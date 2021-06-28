# Лабораторная работа №7. Часть №2

## Практическое задание 1
1.  Создайте базу данных learn.

    ```javascript
    > use learn
    switched to db learn
    ```

2.  Заполните коллекцию единорогов unicorns.
    ```javascript
    > db.unicorns.insert({name: 'Horny', dob: new Date(1992,2,13,7,47), loves: ['carrot','papaya'], weight: 600, gender: 'm', vampires: 63});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Aurora', dob: new Date(1991, 0, 24, 13, 0), loves: ['carrot', 'grape'], weight: 450, gender: 'f', vampires: 43});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Unicrom', dob: new Date(1973, 1, 9, 22, 10), loves: ['energon', 'redbull'], weight: 984, gender: 'm', vampires: 182});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Roooooodles', dob: new Date(1979, 7, 18, 18, 44), loves: ['apple'], weight: 575, gender: 'm', vampires: 99});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Solnara', dob: new Date(1985, 6, 4, 2, 1), loves:['apple', 'carrot', 'chocolate'], weight:550, gender:'f', vampires:80});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name:'Ayna', dob: new Date(1998, 2, 7, 8, 30), loves: ['strawberry', 'lemon'], weight: 733, gender: 'f', vampires: 40});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name:'Kenny', dob: new Date(1997, 6, 1, 10, 42), loves: ['grape', 'lemon'], weight: 690,  gender: 'm', vampires: 39});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Raleigh', dob: new Date(2005, 4, 3, 0, 57), loves: ['apple', 'sugar'], weight: 421, gender: 'm', vampires: 2});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Leia', dob: new Date(2001, 9, 8, 14, 53), loves: ['apple', 'watermelon'], weight: 601, gender: 'f', vampires: 33});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Pilot', dob: new Date(1997, 2, 1, 5, 3), loves: ['apple', 'watermelon'], weight: 650, gender: 'm', vampires: 54});
    WriteResult({ "nInserted" : 1 })
    > db.unicorns.insert({name: 'Nimue', dob: new Date(1999, 11, 20, 16, 15), loves: ['grape', 'carrot'], weight: 540, gender: 'f'});
    WriteResult({ "nInserted" : 1 })
    ```

3.  Используя второй способ, вставьте в коллекцию единорогов документ.
    ```javascript
    > d = {name: 'Dunx', dob: new Date(1976, 6, 18, 18, 18), loves: ['grape', 'watermelon'], weight: 704, gender: 'm', vampires: 165}
    {
            "name" : "Dunx",
            "dob" : ISODate("1976-07-18T15:18:00Z"),
            "loves" : [
                    "grape",
                    "watermelon"
            ],
            "weight" : 704,
            "gender" : "m",
            "vampires" : 165
    }
    > db.unicorns.insert(d)
    WriteResult({ "nInserted" : 1 })
    ```

4.  Проверьте содержимое коллекции с помощью метода find.
    ```javascript
    > db.unicorns.find({weight: {$gt: 500}})
    { "_id" : ObjectId("60c493a600eabb22e9dc6232"), "name" : "Horny", "dob" : ISODate("1992-03-13T04:47:00Z"), "loves" : [ "carrot", "papaya" ], "weight" : 600, "gender" : "m", "vampires" : 63 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6234"), "name" : "Unicrom", "dob" : ISODate("1973-02-09T19:10:00Z"), "loves" : [ "energon", "redbull" ], "weight" : 984, "gender" : "m", "vampires" : 182 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6235"), "name" : "Roooooodles", "dob" : ISODate("1979-08-18T15:44:00Z"), "loves" : [ "apple" ], "weight" : 575, "gender" : "m", "vampires" : 99 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6236"), "name" : "Solnara", "dob" : ISODate("1985-07-03T23:01:00Z"), "loves" : [ "apple", "carrot", "chocolate" ], "weight" : 550, "gender" : "f", "vampires" : 80 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6237"), "name" : "Ayna", "dob" : ISODate("1998-03-07T05:30:00Z"), "loves" : [ "strawberry", "lemon" ], "weight" : 733, "gender" : "f", "vampires" : 40 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6238"), "name" : "Kenny", "dob" : ISODate("1997-07-01T07:42:00Z"), "loves" : [ "grape", "lemon" ], "weight" : 690, "gender" : "m", "vampires" : 39 }
    { "_id" : ObjectId("60c493a600eabb22e9dc623a"), "name" : "Leia", "dob" : ISODate("2001-10-08T11:53:00Z"), "loves" : [ "apple", "watermelon" ], "weight" : 601, "gender" : "f", "vampires" : 33 }
    { "_id" : ObjectId("60c493a600eabb22e9dc623b"), "name" : "Pilot", "dob" : ISODate("1997-03-01T02:03:00Z"), "loves" : [ "apple", "watermelon" ], "weight" : 650, "gender" : "m", "vampires" : 54 }
    { "_id" : ObjectId("60c493a600eabb22e9dc623c"), "name" : "Nimue", "dob" : ISODate("1999-12-20T13:15:00Z"), "loves" : [ "grape", "carrot" ], "weight" : 540, "gender" : "f" }
    { "_id" : ObjectId("60c4946300eabb22e9dc623d"), "name" : "Dunx", "dob" : ISODate("1976-07-18T15:18:00Z"), "loves" : [ "grape", "watermelon" ], "weight" : 704, "gender" : "m", "vampires" : 165 }
    > db.unicorns.find({weight: {$lte: 500}})
    { "_id" : ObjectId("60c493a600eabb22e9dc6233"), "name" : "Aurora", "dob" : ISODate("1991-01-24T10:00:00Z"), "loves" : [ "carrot", "grape" ], "weight" : 450, "gender" : "f", "vampires" : 43 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6239"), "name" : "Raleigh", "dob" : ISODate("2005-05-02T21:57:00Z"), "loves" : [ "apple", "sugar" ], "weight" : 421, "gender" : "m", "vampires" : 2 }
    ```

## Практическое задание 2

1.  Модифицируйте запрос для вывода списков самцов единорогов, исключив из
результата информацию о дате рождения и поле.

    ```javascript
    > db.unicorns.find({gender: 'm'}).sort({name: 1})
    { "_id" : ObjectId("60c4946300eabb22e9dc623d"), "name" : "Dunx", "dob" : ISODate("1976-07-18T15:18:00Z"), "loves" : [ "grape", "watermelon" ], "weight" : 704, "gender" : "m", "vampires" : 165 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6232"), "name" : "Horny", "dob" : ISODate("1992-03-13T04:47:00Z"), "loves" : [ "carrot", "papaya" ], "weight" : 600, "gender" : "m", "vampires" : 63 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6238"), "name" : "Kenny", "dob" : ISODate("1997-07-01T07:42:00Z"), "loves" : [ "grape", "lemon" ], "weight" : 690, "gender" : "m", "vampires" : 39 }
    { "_id" : ObjectId("60c493a600eabb22e9dc623b"), "name" : "Pilot", "dob" : ISODate("1997-03-01T02:03:00Z"), "loves" : [ "apple", "watermelon" ], "weight" : 650, "gender" : "m", "vampires" : 54 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6239"), "name" : "Raleigh", "dob" : ISODate("2005-05-02T21:57:00Z"), "loves" : [ "apple", "sugar" ], "weight" : 421, "gender" : "m", "vampires" : 2 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6235"), "name" : "Roooooodles", "dob" : ISODate("1979-08-18T15:44:00Z"), "loves" : [ "apple" ], "weight" : 575, "gender" : "m", "vampires" : 99 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6234"), "name" : "Unicrom", "dob" : ISODate("1973-02-09T19:10:00Z"), "loves" : [ "energon", "redbull" ], "weight" : 984, "gender" : "m", "vampires" : 182 }
    > db.unicorns.find({gender: 'f'}).sort({name: 1}).limit(3)
    { "_id" : ObjectId("60c493a600eabb22e9dc6233"), "name" : "Aurora", "dob" : ISODate("1991-01-24T10:00:00Z"), "loves" : [ "carrot", "grape" ], "weight" : 450, "gender" : "f", "vampires" : 43 }
    { "_id" : ObjectId("60c493a600eabb22e9dc6237"), "name" : "Ayna", "dob" : ISODate("1998-03-07T05:30:00Z"), "loves" : [ "strawberry", "lemon" ], "weight" : 733, "gender" : "f", "vampires" : 40 }
    { "_id" : ObjectId("60c493a600eabb22e9dc623a"), "name" : "Leia", "dob" : ISODate("2001-10-08T11:53:00Z"), "loves" : [ "apple", "watermelon" ], "weight" : 601, "gender" : "f", "vampires" : 33 }
    ```

2.  Найдите всех самок, которые любят carrot. Ограничьте этот список первой
особью с помощью функций findOne и limit.

    ```javascript
    > db.unicorns.findOne({gender: 'f', loves: 'carrot'})
    {
            "_id" : ObjectId("60c493a600eabb22e9dc6233"),
            "name" : "Aurora",
            "dob" : ISODate("1991-01-24T10:00:00Z"),
            "loves" : [
                    "carrot",
                    "grape"
            ],
            "weight" : 450,
            "gender" : "f",
            "vampires" : 43
    }
    > db.unicorns.find({gender: 'f', loves: 'carrot'}).limit(1)
    { "_id" : ObjectId("60c493a600eabb22e9dc6233"), "name" : "Aurora", "dob" : ISODate("1991-01-24T10:00:00Z"), "loves" : [ "carrot", "grape" ], "weight" : 450, "gender" : "f", "vampires" : 43 }
    ```

## Практическое задание 3

Модифицируйте запрос для вывода списков самцов единорогов, исключив из
результата информацию о дате рождения и поле.

```javascript
> db.unicorns.find({gender: 'm'}, {dob: false, _id: false}).sort({name: 1})
{ "name" : "Dunx", "loves" : [ "grape", "watermelon" ], "weight" : 704, "gender" : "m", "vampires" : 165 }
{ "name" : "Horny", "loves" : [ "carrot", "papaya" ], "weight" : 600, "gender" : "m", "vampires" : 63 }
{ "name" : "Kenny", "loves" : [ "grape", "lemon" ], "weight" : 690, "gender" : "m", "vampires" : 39 }
{ "name" : "Pilot", "loves" : [ "apple", "watermelon" ], "weight" : 650, "gender" : "m", "vampires" : 54 }
{ "name" : "Raleigh", "loves" : [ "apple", "sugar" ], "weight" : 421, "gender" : "m", "vampires" : 2 }
{ "name" : "Roooooodles", "loves" : [ "apple" ], "weight" : 575, "gender" : "m", "vampires" : 99 }
{ "name" : "Unicrom", "loves" : [ "energon", "redbull" ], "weight" : 984, "gender" : "m", "vampires" : 182 }
```

## Практическое задание 4

Вывести список единорогов в обратном порядке добавления.

```javascript
> db.unicorns.find().sort({$natural: -1})
{ "_id" : ObjectId("60c4946300eabb22e9dc623d"), "name" : "Dunx", "dob" : ISODate("1976-07-18T15:18:00Z"), "loves" : [ "grape", "watermelon" ], "weight" : 704, "gender" : "m", "vampires" : 165 }
{ "_id" : ObjectId("60c493a600eabb22e9dc623c"), "name" : "Nimue", "dob" : ISODate("1999-12-20T13:15:00Z"), "loves" : [ "grape", "carrot" ], "weight" : 540, "gender" : "f" }
{ "_id" : ObjectId("60c493a600eabb22e9dc623b"), "name" : "Pilot", "dob" : ISODate("1997-03-01T02:03:00Z"), "loves" : [ "apple", "watermelon" ], "weight" : 650, "gender" : "m", "vampires" : 54 }
{ "_id" : ObjectId("60c493a600eabb22e9dc623a"), "name" : "Leia", "dob" : ISODate("2001-10-08T11:53:00Z"), "loves" : [ "apple", "watermelon" ], "weight" : 601, "gender" : "f", "vampires" : 33 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6239"), "name" : "Raleigh", "dob" : ISODate("2005-05-02T21:57:00Z"), "loves" : [ "apple", "sugar" ], "weight" : 421, "gender" : "m", "vampires" : 2 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6238"), "name" : "Kenny", "dob" : ISODate("1997-07-01T07:42:00Z"), "loves" : [ "grape", "lemon" ], "weight" : 690, "gender" : "m", "vampires" : 39 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6237"), "name" : "Ayna", "dob" : ISODate("1998-03-07T05:30:00Z"), "loves" : [ "strawberry", "lemon" ], "weight" : 733, "gender" : "f", "vampires" : 40 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6236"), "name" : "Solnara", "dob" : ISODate("1985-07-03T23:01:00Z"), "loves" : [ "apple", "carrot", "chocolate" ], "weight" : 550, "gender" : "f", "vampires" : 80 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6235"), "name" : "Roooooodles", "dob" : ISODate("1979-08-18T15:44:00Z"), "loves" : [ "apple" ], "weight" : 575, "gender" : "m", "vampires" : 99 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6234"), "name" : "Unicrom", "dob" : ISODate("1973-02-09T19:10:00Z"), "loves" : [ "energon", "redbull" ], "weight" : 984, "gender" : "m", "vampires" : 182 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6233"), "name" : "Aurora", "dob" : ISODate("1991-01-24T10:00:00Z"), "loves" : [ "carrot", "grape" ], "weight" : 450, "gender" : "f", "vampires" : 43 }
{ "_id" : ObjectId("60c493a600eabb22e9dc6232"), "name" : "Horny", "dob" : ISODate("1992-03-13T04:47:00Z"), "loves" : [ "carrot", "papaya" ], "weight" : 600, "gender" : "m", "vampires" : 63 }
```

## Практическое задание 5

Вывести список единорогов с названия первого любимого фрукта, исключив
идентификатор.

```javascript
> db.unicorns.find({}, {_id: false, loves: {$slice: 1}})
{ "name" : "Horny", "dob" : ISODate("1992-03-13T04:47:00Z"), "loves" : [ "carrot" ], "weight" : 600, "gender" : "m", "vampires" : 63 }
{ "name" : "Aurora", "dob" : ISODate("1991-01-24T10:00:00Z"), "loves" : [ "carrot" ], "weight" : 450, "gender" : "f", "vampires" : 43 }
{ "name" : "Unicrom", "dob" : ISODate("1973-02-09T19:10:00Z"), "loves" : [ "energon" ], "weight" : 984, "gender" : "m", "vampires" : 182 }
{ "name" : "Roooooodles", "dob" : ISODate("1979-08-18T15:44:00Z"), "loves" : [ "apple" ], "weight" : 575, "gender" : "m", "vampires" : 99 }
{ "name" : "Solnara", "dob" : ISODate("1985-07-03T23:01:00Z"), "loves" : [ "apple" ], "weight" : 550, "gender" : "f", "vampires" : 80 }
{ "name" : "Ayna", "dob" : ISODate("1998-03-07T05:30:00Z"), "loves" : [ "strawberry" ], "weight" : 733, "gender" : "f", "vampires" : 40 }
{ "name" : "Kenny", "dob" : ISODate("1997-07-01T07:42:00Z"), "loves" : [ "grape" ], "weight" : 690, "gender" : "m", "vampires" : 39 }
{ "name" : "Raleigh", "dob" : ISODate("2005-05-02T21:57:00Z"), "loves" : [ "apple" ], "weight" : 421, "gender" : "m", "vampires" : 2 }
{ "name" : "Leia", "dob" : ISODate("2001-10-08T11:53:00Z"), "loves" : [ "apple" ], "weight" : 601, "gender" : "f", "vampires" : 33 }
{ "name" : "Pilot", "dob" : ISODate("1997-03-01T02:03:00Z"), "loves" : [ "apple" ], "weight" : 650, "gender" : "m", "vampires" : 54 }
{ "name" : "Nimue", "dob" : ISODate("1999-12-20T13:15:00Z"), "loves" : [ "grape" ], "weight" : 540, "gender" : "f" }
{ "name" : "Dunx", "dob" : ISODate("1976-07-18T15:18:00Z"), "loves" : [ "grape" ], "weight" : 704, "gender" : "m", "vampires" : 165 }
```

## Практическое задание 6

Вывести список самок единорогов весом от полутонны до 700 кг, исключив вывод
идентификатора.

```javascript
> db.unicorns.find({gender: 'f', weight: {$gte: 500, $lte: 700}}, {_id: false})
{ "name" : "Solnara", "dob" : ISODate("1985-07-03T23:01:00Z"), "loves" : [ "apple", "carrot", "chocolate" ], "weight" : 550, "gender" : "f", "vampires" : 80 }
{ "name" : "Leia", "dob" : ISODate("2001-10-08T11:53:00Z"), "loves" : [ "apple", "watermelon" ], "weight" : 601, "gender" : "f", "vampires" : 33 }
{ "name" : "Nimue", "dob" : ISODate("1999-12-20T13:15:00Z"), "loves" : [ "grape", "carrot" ], "weight" : 540, "gender" : "f" }
```

## Практическое задание 7

Вывести список самцов единорогов весом от полутонны и предпочитающих grape и
lemon, исключив вывод идентификатора.

```javascript
> db.unicorns.find({gender: 'm', loves: {$all: ['lemon', 'grape']}}, {_id: false})
{ "name" : "Kenny", "dob" : ISODate("1997-07-01T07:42:00Z"), "loves" : [ "grape", "lemon" ], "weight" : 690, "gender" : "m", "vampires" : 39 }
```

## Практическое задание 8

Найти всех единорогов, не имеющих ключ vampires.

```javascript
> db.unicorns.find({vampires: {$exists: false}})
{ "_id" : ObjectId("60c493a600eabb22e9dc623c"), "name" : "Nimue", "dob" : ISODate("1999-12-20T13:15:00Z"), "loves" : [ "grape", "carrot" ], "weight" : 540, "gender" : "f" }
```
