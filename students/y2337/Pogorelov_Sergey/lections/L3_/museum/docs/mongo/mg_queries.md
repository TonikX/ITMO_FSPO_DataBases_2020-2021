## Запросы

# Запрос 1
_Поиск музея по названию и имени руководителя_
```
> db.museum.find({'name': 'Massa Associates', 'director': 'Lunea Q. Young'}).pretty()
{
	"_id" : ObjectId("60d4881c8bc97d5b7e0678a7"),
	"name" : "Massa Associates",
	"director" : "Lunea Q. Young"
}
```

# Запрос 2
_Поиск экспонатов со статусом выше указанного_
```
> db.piece.find({'status': {$gt: '5148'}}).pretty()
{
	"_id" : ObjectId("60d493a9120c35f3a2887477"),
	"name" : "nulla. Integer urna.",
	"creation_date" : "1875-10-29 21:52:14",
	"status" : "943535",
	"author" : DBRef("author", ObjectId("60d487848bc97d5b7e0678a4"))
}
{
	"_id" : ObjectId("60d493a9120c35f3a2887478"),
	"name" : "erat. Etiam",
	"creation_date" : "1975-09-24 04:55:32",
	"status" : "5625",
	"author" : DBRef("author", ObjectId("60d487848bc97d5b7e0678a2"))
}
{
	"_id" : ObjectId("60d493a9120c35f3a288747d"),
	"name" : "arcu. Morbi sit",
	"creation_date" : "1877-02-23 15:53:27",
	"status" : "75419",
	"author" : DBRef("author", ObjectId("60d487848bc97d5b7e0678a3"))
}
{
	"_id" : ObjectId("60d493a9120c35f3a288747f"),
	"name" : "libero. Morbi accumsan",
	"creation_date" : "2008-12-09 18:15:36",
	"status" : "87443391",
	"author" : DBRef("author", ObjectId("60d487848bc97d5b7e0678a4"))
}
```

# Запрос 3
_Поиск экспонатов созданных позднее указанной даты_
```
> db.piece.find({creation_date: {$gte: new Date('1970-01-01')}}).pretty()
{
	"_id" : ObjectId("60d493a9120c35f3a2887478"),
	"name" : "erat. Etiam",
	"creation_date" : "1975-09-24",
	"status" : "5625 SD",
	"author" : DBRef("author", ObjectId("60d487848bc97d5b7e0678a2"))
}
{
	"_id" : ObjectId("60d493a9120c35f3a288747b"),
	"name" : "vel, mauris.",
	"creation_date" : "1886-07-04",
	"status" : "41731",
	"author" : DBRef("author", ObjectId("60d487848bc97d5b7e0678a4"))
}
{
	"_id" : ObjectId("60d493a9120c35f3a288747c"),
	"name" : "Curabitur consequat,",
	"creation_date" : "1997-05-15",
	"status" : "5148",
	"author" : DBRef("author", ObjectId("60d487848bc97d5b7e0678a2"))
}
```

# Запрос 4
_Поиск авторов по роду_
```
> db.museum.find({'name': {$regex:"Hood$"}}).pretty()
{
	"_id" : ObjectId("60d487848bc97d5b7e0678a1"),
	"birthdate" : "1930-09-05 20:30:54",
	"name" : "Kimberly D. Hood",
	"country" : "Macedonia"
}
{
	"_id" : ObjectId("60d487848bc97d5b7e0678a4"),
	"birthdate" : "1986-07-11 17:28:37",
	"name" : "Catherine G. Hood",
	"country" : "Oman"
}
```