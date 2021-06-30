# MongoDB

### База данных

```javascript
show collections;

cabinets
calculation_cost
clients
doctor_appointments
doctors
payment
preiscurant
reception_doctor
schedule
schedule_doctor
```


## Запросы

```javascript
> var mapfunction1=function(){emit(this.fio, this.gender)}
> var reducefunction1=function(key,values){return Array.sum(values)}
> db.doctors.mapReduce(mapfunction1,reducefunction1,{'out':'Result_mapreduce'})

{ "result" : "Result_mapreduce", "ok" : 1 }
```

```javascript
> db.doctors.find({"fio":"Leonid"})

{ "_id" : ObjectId("60d1ca753144c1b5fe49656d"), "birthday" : "1987-04-23", "contarct" : "iyghj3", "fio" : "Leonid", "gender" : "man", "learn" : "Surgeon", "specialization" : "Surgeon", "work" : "20010-07-21"
```

```javascript
> db.doctors.find({"fio":"Leonid"}).count()

1
```

```javascript
> db.doctors.aggregate([{$match:{fio: "Leonid"}}])

{ "_id" : ObjectId("60d1ca753144c1b5fe49656d"), "birthday" : "1987-04-23", "contarct" : "iyghj3", "fio" : "Leonid", "gender" : "man", "learn" : "Surgeon", "specialization" : "Surgeon", "work" : "20010-07-21" }
```
