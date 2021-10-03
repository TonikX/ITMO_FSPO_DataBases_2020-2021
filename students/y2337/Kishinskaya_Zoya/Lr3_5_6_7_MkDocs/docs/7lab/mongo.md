## Mongodb: процесс реализации модели

# Создание коллекции работников
```
db.worker.insertMany([
	{"fio": "vlad", "pass": 111111, "salary": 30000, "contract": "contr1"}, 
	{"fio": "sergey", "pass": 222222, "salary": 30000, "contract": "contr2"}, 
	{"fio": "anna", "pass": 864695, "salary": 45000, "contract": "contr3"}, 
	{"fio": "elena", "pass": 460427, "salary": 25000, "contract": "contr4"}
	])
```
# Создание коллекции пород
```
db.breed.insertMany([
	{"name": "greenstore", "performance": 2, "weight": 1, "diet_name": "elite", "diet_content": "diet1"}, 
	{"name": "yellowstore", "performance": 3, "weight": 2, "diet_name": "common", "diet_content": "diet2"}, 
	{"name": "redstore", "performance": 3, "weight": 1, "diet_name": "common", "diet_content": "diet2"}, 
	])

```

# Создание коллекции куриц
```
var breed_id = db.breed.findOne({"name": "greenstore"})._id
db.chicken.insertOne({"weight": 1, "age": 1,"performance": 5, "breed": new DBRef("breed", breed_id)})
db.chicken.insertOne({"weight": 2, "age": 1,"performance": 4, "breed": new DBRef("breed", breed_id)})

var breed_id = db.breed.findOne({"name": "redstore"})._id
db.chicken.insertOne({"weight": 2, "age": 2,"performance": 3, "breed": new DBRef("breed", breed_id)})
db.chicken.insertOne({"weight": 1, "age": 2,"performance": 3, "breed": new DBRef("breed", breed_id)})

var breed_id = db.breed.findOne({"name": "yellowstore"})._id
db.chicken.insertOne({"weight": 2, "age": 1,"performance": 2, "breed": new DBRef("breed", breed_id)})
db.chicken.insertOne({"weight": 3, "age": 2,"performance": 2, "breed": new DBRef("breed", breed_id)})

```

# Создание коллекции пребывания
```
db.stay.insertOne({"start_date": new Date("2021-03-21"), "delete_date": new Date("2021-03-30"), "chicken": ObjectId("6157f6733445b9f467449f89"), 
	"cell": {"num": 1, "num_row": 4, "workshop": 1}})
db.stay.insertOne({"start_date": new Date("2021-03-21"), "chicken": ObjectId("6157f6ba3445b9f467449f8a"), 
	"cell": {"num": 1, "num_row": 4, "workshop": 1}})
db.stay.insertOne({"start_date": new Date("2021-04-10"), "chicken": ObjectId("6157f6eb3445b9f467449f8b"), 
	"cell": {"num": 2, "num_row": 5, "workshop": 1}})
db.stay.insertOne({"start_date": new Date("2021-05-15"), "delete_date": new Date("2021-06-30"), "chicken": ObjectId("6157f6fd3445b9f467449f8c"), 
	"cell": {"num": 20, "num_row": 3, "workshop": 5}})
db.stay.insertOne({"start_date": new Date("2021-04-07"), "delete_date": new Date("2021-06-30"), "chicken": ObjectId("6157f71e3445b9f467449f8d"), 
	"cell": {"num": 2, "num_row": 4, "workshop": 3}})
db.stay.insertOne({"start_date": new Date("2021-02-17"), "chicken": ObjectId("6157f7343445b9f467449f8e"), 
	"cell": {"num": 2, "num_row": 4, "workshop": 1}})
```

# Создание таблицы обслуживания
```
var worker_id = db.worker.findOne({"pass": 111111})._id
db.serving.insertOne({"date": new Date("2021-03-21"), "worker": new DBRef("worker", worker_id),
	"cell": {"num": 1, "num_row": 4, "workshop": 1}})

var worker_id = db.worker.findOne({"pass": 222222})._id
db.serving.insertOne({"date": new Date("2021-03-21"), "worker": new DBRef("worker", worker_id), 
	"cell": {"num": 1, "num_row": 4, "workshop": 1}})
db.serving.insertOne({"date": new Date("2021-04-10"), "worker": new DBRef("worker", worker_id),
	"cell": {"num": 2, "num_row": 5, "workshop": 1}})

var worker_id = db.worker.findOne({"pass": 864695})._id
db.serving.insertOne({"date": new Date("2021-05-15"), "worker": new DBRef("worker", worker_id),
	"cell": {"num": 20, "num_row": 3, "workshop": 5}})
db.serving.insertOne({"date": new Date("2021-04-07"), "worker": new DBRef("worker", worker_id),
	"cell": {"num": 2, "num_row": 4, "workshop": 3}})

var worker_id = db.worker.findOne({"pass": 460427})._id
db.serving.insertOne({"date": new Date("2021-02-17"), "worker": new DBRef("worker", worker_id),
	"cell": {"num": 2, "num_row": 4, "workshop": 1}})
```

































