# Создание

## Комнаты
```
db.room.insertMany([{floor: 1, floor_type: "Обычный", type: "Эконом номер"}, 
					   {floor: 1, floor_type: "Обычный", type: "Бизнес класс номер"}, 
					   {floor: 2, floor_type: "Обычный", type: "Эконом номер"}, 
					   {floor: 2, floor_type: "Обычный", type: "Эконом номер"}])
{ acknowledged: true,
  insertedIds: 
   { '0': ObjectId("61584598ccd614a43a650c96"),
     '1': ObjectId("61584598ccd614a43a650c97"),
     '2': ObjectId("61584598ccd614a43a650c98"),
     '3': ObjectId("61584598ccd614a43a650c99") } }

```


## Служащие
```
> db.employee.insertMany([
			{fullname: "Иванов Иван Иванович", post: "Уборщик", conditions: "С обедом"}, 
			{fullname: "Петров Иван Иванович", post: "Уборщик", conditions: "С обедом"}, 
			{fullname: "Морской Виталий Андреевич", post: "Уборщик", conditions: "Без обеда"}, 
			{fullname: "Обычный Олег Анатольевич", post: "Консьерж", conditions: "С обедом"}, 
			{fullname: "Агаркова Алевтина Юрьевна", post: "Администратор", contact_details: "88091312145", conditions: "С обедом"}, 
			{fullname: "Григорьев Андрей Викторович", post: "Администратор", contact_details: "88094332123", conditions: "С обедом"}

])
{ acknowledged: true,
  insertedIds: 
   { '0': ObjectId("615845abccd614a43a650c9a"),
     '1': ObjectId("615845abccd614a43a650c9b"),
     '2': ObjectId("615845abccd614a43a650c9c"),
     '3': ObjectId("615845abccd614a43a650c9d"),
     '4': ObjectId("615845abccd614a43a650c9e"),
     '5': ObjectId("615845abccd614a43a650c9f") } }
```

## Уборка
```

> var em_id = db.employee.findOne({fullname: "Иванов Иван Иванович"})._id
> db.cleaning.insertOne({employee: new DBRef("employee", em_id), floor: 1, date: new Date("2021-06-10")})

{ acknowledged: true,
  insertedId: ObjectId("615845c0ccd614a43a650ca0") }

> var em_id = db.employee.findOne({fullname: "Петров Иван Иванович"})._id
> db.cleaning.insertOne({employee: new DBRef("employee", em_id), floor: 2, date: new Date("2021-07-12")})
{ acknowledged: true,
  insertedId: ObjectId("615845efccd614a43a650ca1") }
```

## Проживающие

```
> var adm_id = db.employee.findOne({fullname: "Агаркова Алевтина Юрьевна"})._id
> var room_id = db.room.findOne({floor: 1, type: "Эконом номер"})._id
> db.residing.insertOne({fullname: "Свидченко Артем Артемович", 
						identity_data: "2018 011306",
						room: new DBRef("room", room_id), 
						adm: new DBRef("employee", adm_id), 
						check_in: new Date("2021-01-08"), 
						check_out: new Date("2021-01-12")})
{ acknowledged: true,
  insertedId: ObjectId("6158464cccd614a43a650ca2") }

> db.residing.insertOne({fullname: "Савченко Полина Викторовна", 
						identity_data: "1997 023675",
						room: new DBRef("room", room_id), 
						adm: new DBRef("employee", adm_id), 
						check_in: new Date("2021-02-15"), 
						check_out: new Date("2021-02-26")})
{ acknowledged: true,
  insertedId: ObjectId("6158465accd614a43a650ca3") }
```

## Услуги

```

>var residing_id = db.residing.find({fullname: "Савченко Полина Викторовна"})._id
>db.services.insertOne({residing: new DBRef("residing", residing_id), type: "Завтрак", price: 400})
>db.services.insertOne({residing: new DBRef("residing", residing_id), type: "Обогреватель", price: 200})
```
