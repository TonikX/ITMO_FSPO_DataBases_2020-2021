# MongoDB

## Создание БД и заполнение таблиц

```javascript
> use laborexchange
switched to db laborexchange
```

### Таблица applicant


```javascript
> db.applicant.insert([
    {qualification: {profession: 'Сантехник', rank: 5, course_name: 'Сантехник 5-го разряда: как и зачем', duration: 170}, expirience: 24, benefit: 0, contact_details: 'Контакты сантехника', education: 'Высшее сантехническое', resume_posting_date: new Date(2020, 2, 20)},
    {qualification: {profession: 'Python программист', rank: 0, course_name: 'Python for dummies', duration: 40}, expirience: 6, benefit: 0, contact_details: 'Contacts2', education: 'Высшее техническое', resume_posting_date: new Date(2020, 2, 21)},
    {qualification: {profession: 'Сантехник', rank: 5, course_name: 'Сантехник 5-го разряда: как и зачем', duration: 170}, expirience: 0, benefit: 0, contact_details: 'Контакты сантехника', education: 'Высшее сантехническое', resume_posting_date: new Date(2021, 6, 11)}
])
BulkWriteResult({
        "writeErrors" : [ ],
        "writeConcernErrors" : [ ],
        "nInserted" : 3,
        "nUpserted" : 0,
        "nMatched" : 0,
        "nModified" : 0,
        "nRemoved" : 0,
        "upserted" : [ ]
})
```

### Таблица course_passing

```javascript
> db.course_passing.insert([
    {date: new Date(2019, 10, 29), qualification: {profession: 'Сантехник', rank: 5, course_name: 'Сантехник 5-го разряда: как и зачем', duration: 170}, applicant: {$ref: 'applicant', $id: ObjectId("60c4a4ac19126b7292c9cab8"), $db: 'laborexchange'}},
    {date: new Date(2020, 1, 5), qualification: {profession: 'Python программист', rank: 0, course_name: 'Python for dummies', duration: 40}, applicant: {$ref: 'applicant', $id: ObjectId("60c4a4ac19126b7292c9cab9"), $db: 'laborexchange'}},
    {date: new Date(2020, 2, 29), qualification: {profession: 'Сантехник', rank: 5, course_name: 'Сантехник 5-го разряда: как и зачем', duration: 170}, applicant: {$ref: 'applicant', $id: ObjectId("60c4a4ac19126b7292c9caba"), $db: 'laborexchange'}}
])
BulkWriteResult({
        "writeErrors" : [ ],
        "writeConcernErrors" : [ ],
        "nInserted" : 3,
        "nUpserted" : 0,
        "nMatched" : 0,
        "nModified" : 0,
        "nRemoved" : 0,
        "upserted" : [ ]
})
```

### Таблица vacancy

```javascript
db.vacancy.insert([
    {employer: {name: 'ЖКХ Петроградского района', address: 'Каменноостровский пр., 19/13', email: 'jkh@spb.ru', contact_person: 'Директор Иванов Иван Иванович', phone_number: 88124994911}, qualification: {profession: 'Сантехник', rank: 5, course_name: 'Сантехник 5-го разряда: как и зачем?', duration: 170}, experience: 18, education: 'Среднее сантехническое', date: new Date(2021, 01, 20)},
    {employer: {name: 'Microsoft', address: 'Аптекарская наб., 20, Санкт-Петербург, 197022', email: 'admin@microsoft.com', contact_person: 'Генеральный директор Сатья Наделла', phone_number: 88002008001}, qualification: {profession: 'Python программист', rank: 0, course_name: 'Python for dummies', duration: 40}, experience: 6, education: 'Высшее техническое', date: new Date(2021, 02, 01)}
])
BulkWriteResult({
        "writeErrors" : [ ],
        "writeConcernErrors" : [ ],
        "nInserted" : 2,
        "nUpserted" : 0,
        "nMatched" : 0,
        "nModified" : 0,
        "nRemoved" : 0,
        "upserted" : [ ]
})
```

### Таблица hiring

```javascript
> db.hiring.insert([
    {applicant: {$ref: 'applicant', $id: ObjectId("60c4a4ac19126b7292c9cab8"), $db: 'laborexchange'}, vacancy: {$ref: 'vacancy', $id: ObjectId("60c4b1ec19126b7292c9cabe"), $db: 'laborexchange'}, salary: 120000},
    {applicant: {$ref: 'applicant', $id: ObjectId("60c4a4ac19126b7292c9cab9"), $db: 'laborexchange'}, vacancy: {$ref: 'vacancy', $id: ObjectId("60c4b1ec19126b7292c9cabf"), $db: 'laborexchange'}, salary: 70000},
    {applicant: {$ref: 'applicant', $id: ObjectId("60c4a4ac19126b7292c9caba"), $db: 'laborexchange'}, vacancy: {$ref: 'vacancy', $id: ObjectId("60c4b1ec19126b7292c9cabf"), $db: 'laborexchange'}, salary: 150000}
])
BulkWriteResult({
        "writeErrors" : [ ],
        "writeConcernErrors" : [ ],
        "nInserted" : 3,
        "nUpserted" : 0,
        "nMatched" : 0,
        "nModified" : 0,
        "nRemoved" : 0,
        "upserted" : [ ]
})
```

## Запросы

```javascript
> db.applicant.find({expirience: {$gt: 0, $lt: 10}})
{ "_id" : ObjectId("60c4a4ac19126b7292c9cab9"), "qualification" : { "profession" : "Python программист", "rank" : 0, "course_name" : "Python for dummies", "duration" : 40 }, "expirience" : 6, "benefit" : 0, "contact_details" : "Contacts2", "education" : "Высшее техническое", "resume_posting_date" : ISODate("2020-03-20T21:00:00Z") }
```

```javascript
> db.hiring.aggregate([{ $group: { _id: null, sum: { $sum: "$salary" } } }])
{ "_id" : null, "sum" : 340000 }
```

```javascript
> db.hiring.find({ salary: { $gt: db.hiring.aggregate([{ $group: { _id: null, avg: { $avg: "$salary" } } }]).toArray()[0]["avg"] } })
{ "_id" : ObjectId("60c4b48519126b7292c9cac0"), "applicant" : DBRef("applicant", ObjectId("60c4a4ac19126b7292c9cab8"), "laborexchange"), "vacancy" : DBRef("vacancy", ObjectId("60c4b1ec19126b7292c9cabe"), "laborexchange"), "salary" : 120000 }
{ "_id" : ObjectId("60c4b48519126b7292c9cac2"), "applicant" : DBRef("applicant", ObjectId("60c4a4ac19126b7292c9caba"), "laborexchange"), "vacancy" : DBRef("vacancy", ObjectId("60c4b1ec19126b7292c9cabf"), "laborexchange"), "salary" : 150000 }
```

```javascript
> db.vacancy.find()
{ "_id" : ObjectId("60c4b1ec19126b7292c9cabe"), "employer" : { "name" : "ЖКХ Петроградского района", "address" : "Каменноостровский пр., 19/13", "email" : "jkh@spb.ru", "contact_person" : "Директор Иванов Иван Иванович", "phone_number" : 88124994911 }, "qualification" : { "profession" : "Сантехник", "rank" : 5, "course_name" : "Сантехник 5-го разряда: как и зачем?", "duration" : 170 }, "experience" : 18, "education" : "Среднее сантехническое", "date" : ISODate("2021-02-19T21:00:00Z") }
{ "_id" : ObjectId("60c4b1ec19126b7292c9cabf"), "employer" : { "name" : "Microsoft", "address" : "Аптекарская наб., 20, Санкт-Петербург, 197022", "email" : "admin@microsoft.com", "contact_person" : "Генеральный директор Сатья Наделла", "phone_number" : 88002008001 }, "qualification" : { "profession" : "Python программист", "rank" : 0, "course_name" : "Python for dummies", "duration" : 40 }, "experience" : 6, "education" : "Высшее техническое", "date" : ISODate("2021-02-28T21:00:00Z") }
```
