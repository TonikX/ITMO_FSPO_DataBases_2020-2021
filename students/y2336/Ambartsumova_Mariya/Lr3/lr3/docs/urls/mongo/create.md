## Реализация модели


# Коллекция "Номера отеля"
```
> db.hotel_number.insertMany([{floor: 1, cost: 1300, type: 2}, 
					   {floor: 3, cost: 1000, type: 1}, 
					   {floor: 2, cost: 1000, type: 1}])
{ acknowledged: true,
  insertedIds: 
   { '0': ObjectId("60d8a41871aaa2fc3c1f1602"),
     '1': ObjectId("60d8a41871aaa2fc3c1f1603"), 
     '1': ObjectId("60d8aa2a71aaa2fc3c1f160c") } }
```


# Коллекция "Работники"
```
> db.employee.insertMany([
			{name: "Mike Golden", post: "administrator"}, 
			{name: "Mikel Rose", post: "administrator"},
			{name: "Anton Genov", post: "cleaner", administrator: "Mike Golden"}, 
			{name: "Ilya Kokotkin", post: "cleaner", administrator: "Mikel Rose"}
			
])
{ acknowledged: true,
  insertedIds: 
   { '0': ObjectId("60d8a42471aaa2fc3c1f1604"),
     '1': ObjectId("60d8a42471aaa2fc3c1f1605"),
     '2': ObjectId("60d8a42471aaa2fc3c1f1606"),
     '3': ObjectId("60d8a42471aaa2fc3c1f1607") } }
```


# Коллекция "Заселения"
```
> var adm = db.employee.findOne({name: "Mike Golden"})._id
> var number = db.hotel_number.findOne({floor: 1})._id
> db.chek_in.insertOne({name: "Matvei Golunov", 
						passport:  2316542378, 
						city:  'Moscow', 
						hotel_number: new DBRef("hotel_number", number), 
						administrator: new DBRef("employee", adm), 
						date: new Date("2021-01-12")})
{ acknowledged: true,
  insertedId: ObjectId("60d8a44f71aaa2fc3c1f1608") }

> var adm = db.employee.findOne({name: "Mikel Rose"})._id
> var number = db.hotel_number.findOne({floor: 3})._id
> db.chek_in.insertOne({name: "George Cown", 
						passport:  7741729012, 
						city:  'London', 
						hotel_number: new DBRef("hotel_number", number), 
						administrator: new DBRef("employee", adm), 
						date: new Date("2021-02-21")})
{ acknowledged: true,
  insertedId: ObjectId("60d8a4de71aaa2fc3c1f1609") }
```

# Коллекция "Уборка"
```
> var emp = db.employee.findOne({name: "Anton Genov"})._id
> var number = db.hotel_number.findOne({floor: 3})._id
> db.cleaning.insertOne({сleaner: new DBRef("employee", emp), date: new Date("2021-03-04"), hotel_number: new DBRef("hotel_number", number)})
{ acknowledged: true,
  insertedId: ObjectId("60d8a5cd71aaa2fc3c1f160a") }


> var emp = db.employee.findOne({name: "Ilya Kokotkin"})._id
> var number = db.hotel_number.findOne({floor: 1})._id
> db.cleaning.insertOne({сleaner: new DBRef("employee", emp), date: new Date("2021-01-05"), hotel_number: new DBRef("hotel_number", number)})
{ acknowledged: true,
  insertedId: ObjectId("60d8a60a71aaa2fc3c1f160b") }
```
