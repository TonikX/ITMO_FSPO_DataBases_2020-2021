## Mongodb: процесс реализации модели


# Коллекция авторов
```sql
> db.author.insert([{
...   "birthdate": "1930-09-05",
...   "name": "Kimberly D. Hood",
...   "country": "Macedonia"
... },{
...   "birthdate": "1948-12-08",
...   "name": "Willa O. Jones",
...   "country": "Guernsey"
... },{
...   "birthdate": "1977-10-22",
...   "name": "Lois T. Pena",
...   "country": "Antarctica"
... },{
...   "birthdate": "1986-07-11",
...   "name": "Catherine G. Hood",
...   "country": "Oman"
... },{
...   "birthdate": "1948-08-26",
...   "name": "Oleg H. Downs",
...   "country": "Niger"
... },{
...   "birthdate": "1992-01-09",
...   "name": "Blythe U. Michael",
...   "country": "Thailand"
... }])
BulkWriteResult({
	"writeErrors" : [ ],
	"writeConcernErrors" : [ ],
	"nInserted" : 6,
	"nUpserted" : 0,
	"nMatched" : 0,
	"nModified" : 0,
	"nRemoved" : 0,
	"upserted" : [ ]
})
```

# Коллекция музеев
```sql
> db.museum.insert([{
...   "name": "Massa Associates",
...   "director": "Lunea Q. Young"
... },{
...   "name": "Imperdiet Dictum Company",
...   "director": "Lisandra M. Austin"
... },{
...   "name": "Duis Dignissim Tempor Foundation",
...   "director": "Hasad T. Ferguson"
... },{
...   "name": "Molestie Orci Company",
...   "director": "Chaim A. Ellison"
... },{
...   "name": "Placerat Velit Institute",
...   "director": "Blaze H. Yates"
... },{
...   "name": "Urna Associates",
...   "director": "Russell H. Benson"
... },{
...   "name": "Sed Molestie Corporation",
...   "director": "Cooper S. Green"
... }])
BulkWriteResult({
	"writeErrors" : [ ],
	"writeConcernErrors" : [ ],
	"nInserted" : 7,
	"nUpserted" : 0,
	"nMatched" : 0,
	"nModified" : 0,
	"nRemoved" : 0,
	"upserted" : [ ]
})
```

# Коллекция экспонатов
```sql
> var first_author_id = db.author.findOne({'name': 'Willa O. Jones'})._id
> var second_author_id = db.author.findOne({'name': 'Lois T. Pena'})._id
> var third_author_id = db.author.findOne({'name': 'Oleg H. Downs'})._id
> var last_author_id = db.author.findOne({'name': 'Catherine G. Snow'})._id
> db.piece.insert([{
...     "name": "velit",
...     "creation_date": "1914-08-05",
...     "status": "030504",
...     'author': new DBRef('author', first_author_id)
... },
... {
...     "name": "interdum",
...     "creation_date": "1900-10-17",
...     "status": "16479",
...     'author': new DBRef('author', second_author_id)
... },
... {
...     "name": "ut dolor",
...     "creation_date": "1955-04-04",
...     "status": "10961",
...     'author': new DBRef('author', third_author_id)
... },
... {
...     "name": "nulla. Integer urna.",
...     "creation_date": "1875-10-29",
...     "status": "943535",
...     'author': new DBRef('author', last_author_id)
... },
... {
...     "name": "erat. Etiam",
...     "creation_date": "1975-09-24",
...     "status": "5625",
...     'author': new DBRef('author', first_author_id)
... },
... {
...     "name": "lorem ipsum sodales",
...     "creation_date": "1845-08-07",
...     "status": "1645",
...     'author': new DBRef('author', second_author_id)
... },
... {
...     "name": "neque",
...     "creation_date": "1967-12-13",
...     "status": "345947",
...     'author': new DBRef('author', third_author_id)
... },
... {
...     "name": "vel, mauris.",
...     "creation_date": "1886-07-04",
...     "status": "41731",
...     'author': new DBRef('author', last_author_id)
... },
... {
...     "name": "Curabitur consequat,",
...     "creation_date": "1997-05-15",
...     "status": "5148",
...     'author': new DBRef('author', first_author_id)
... },
... {
...     "name": "arcu. Morbi sit",
...     "creation_date": "1877-02-23",
...     "status": "75419",
...     'author': new DBRef('author', second_author_id)
... },
... {
...     "name": "nulla.",
...     "creation_date": "1901-10-01",
...     "status": "33666",
...     'author': new DBRef('author', third_author_id)
... },
... {
...     "name": "libero. Morbi accumsan",
...     "creation_date": "2008-12-09",
...     "status": "87443391",
...     'author': new DBRef('author', last_author_id)
... }])
BulkWriteResult({
	"writeErrors" : [ ],
	"writeConcernErrors" : [ ],
	"nInserted" : 12,
	"nUpserted" : 0,
	"nMatched" : 0,
	"nModified" : 0,
	"nRemoved" : 0,
	"upserted" : [ ]
})
```

# Коллекция хранения
```sql
> var museum_id_1 = db.museum.findOne({'name': 'Massa Associates'})._id
> var museum_id_2 = db.museum.findOne({'name': 'Urna Associates'})._id
> var museum_id_3 = db.museum.findOne({'name': 'Duis Dignissim Tempor Foundation'})._id
> var piece_id_1 = db.piece.findOne({'name': 'neque'})._id
> var piece_id_2 = db.piece.findOne({'name': 'erat. Etiam'})._id
> var piece_id_3 = db.piece.findOne({'name': 'ut dolor'})._id
> db.store.insert([{
... "get_date": "1943-11-16",
... "piece": new DBRef('piece', piece_id_1),
... "museum": new DBRef('museum', museum_id_1)
... },
... {
... "get_date": "1914-09-13",
... "piece": new DBRef('piece', piece_id_1),
... "museum": new DBRef('museum', museum_id_2)
... },
... {
... "get_date": "1888-05-29",
... "piece": new DBRef('piece', piece_id_1),
... "museum": new DBRef('museum', museum_id_3)
... },
... {
... "get_date": "1849-08-04",
... "piece": new DBRef('piece', piece_id_2),
... "museum": new DBRef('museum', museum_id_1)
... },
... {
... "get_date": "2006-04-14",
... "piece": new DBRef('piece', piece_id_2),
... "museum": new DBRef('museum', museum_id_2)
... },
... {
... "get_date": "1874-12-14",
... "piece": new DBRef('piece', piece_id_2),
... "museum": new DBRef('museum', museum_id_3)
... },
... {
... "get_date": "1986-07-31",
... "piece": new DBRef('piece', piece_id_3),
... "museum": new DBRef('museum', museum_id_1)
... },
... {
... "get_date": "1896-11-24",
... "piece": new DBRef('piece', piece_id_3),
... "museum": new DBRef('museum', museum_id_2)
... },
... {
... "get_date": "1956-01-18",
... "piece": new DBRef('piece', piece_id_3),
... "museum": new DBRef('museum', museum_id_3)
... }])
BulkWriteResult({
	"writeErrors" : [ ],
	"writeConcernErrors" : [ ],
	"nInserted" : 9,
	"nUpserted" : 0,
	"nMatched" : 0,
	"nModified" : 0,
	"nRemoved" : 0,
	"upserted" : [ ]
})

```

# Модель базы данных
![](../assets/shemas/mg_shema.png)