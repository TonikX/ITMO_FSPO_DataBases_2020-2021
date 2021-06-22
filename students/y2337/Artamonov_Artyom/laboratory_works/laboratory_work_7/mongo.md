# Mongodb: процесс реализации модели


## Продукты компаний
```javascript
db.products.insertOne({
	'organization': 'Tinivini', 
	'contacts': '8800552525', 
	'goods_type': 'toy', 
	'name': 'kite',
	'manufacturer_date': new Date("2020-09-10"), 
	'shelf_life': new Date("2020-12-01"), 
	'price': 500
})
{ acknowledged: true,
  insertedId: ObjectId("60c941e81da236716933dc55") }

db.products.insertOne({
	'organization': 'Asura', 
	'contacts': '9982971', 
	'goods_type': 'books', 
	'name': 'Techno manga',
	'manufacturer_date': new Date("2018-08-00"), 
	'shelf_life': new Date("2025-12-01"), 
	'price': 300
})
{ acknowledged: true,
  insertedId: ObjectId("60c9423f1da236716933dc56") }

db.products.insertOne({
	'organization': 'Asura', 
	'contacts': '9982971', 
	'goods_type': 'books', 
	'name': 'Elf manga',
	'manufacturer_date': new Date("2019-08-00"), 
	'shelf_life': new Date("2026-12-01"), 
	'price': 350
})
{ acknowledged: true,
  insertedId: ObjectId("60c942681da236716933dc57") }


db.products.insertOne({
	'organization': 'Nyam', 
	'contacts': '9900071', 
	'goods_type': 'cookie', 
	'name': 'mini cookie',
	'manufacturer_date': new Date("2017-08-00"), 
	'shelf_life': new Date("2018-12-01"), 
	'price': 100
})
{ acknowledged: true,
  insertedId: ObjectId("60c94b7a1da236716933dc60") }

db.products.insertOne({
	'organization': 'Kansai', 
	'contacts': '8929937', 
	'goods_type': 'bed', 
	'name': 'wooden bed',
	'manufacturer_date': new Date("2015-10-00"), 
	'shelf_life': new Date("2022-12-01"), 
	'price': 10000
})
{ acknowledged: true,
  insertedId: ObjectId("60c942b91da236716933dc58") }
```

## Брокеры
```javascript
db.broker.insertOne({
	'company': 'Bestie', 
	'contacts': '826397223', 
	'name': 'Harly Joy', 
	'income': new Date("2015-11-14")
})
{ acknowledged: true,
  insertedId: ObjectId("60c943361da236716933dc59") }


db.broker.insertOne({
	'company': 'Bestie', 
	'contacts': '826397223', 
	'name': 'Mery Ly', 
	'income': new Date("2020-07-14")
})
{ acknowledged: true,
  insertedId: ObjectId("60c9435b1da236716933dc5a") }

db.broker.insertOne({
	'company': 'Shine', 
	'contacts': '8887266610', 
	'name': 'Jhon Shini', 
	'income': new Date("2021-01-07")
})
{ acknowledged: true,
  insertedId: ObjectId("60c943951da236716933dc5b") }

db.broker.insertOne({
	'company': 'Shine', 
	'contacts': '8887266610', 
	'name': 'Cary Smith', 
	'income': new Date("2011-04-03")
})
{ acknowledged: true,
  insertedId: ObjectId("60c943c31da236716933dc5c") }
```

## Сделки
```javascript
var id_product = db.products.findOne({'name': 'Elf manga'})._id
var id_broker = db.broker.findOne({'name': 'Cary Smith'})._id
db.deal.insertOne({
	'date': new Date("2020-12-10"), 
	'customer_name': 'Mary Smith', 
	'payment_status': true,
	'payment_type': 'cash', 
	'sum': 10000,
	'batch': {
		'conditions': 'something important', 
		'quantity': 100, 
		'product': new DBRef("products", id_product)
	}, 
	'broker': new DBRef('broker', id_broker)
})
{ acknowledged: true,
  insertedId: ObjectId("60c944d71da236716933dc5d") }

var id_product = db.products.findOne({'name': 'Techno manga'})._id
var id_broker = db.broker.findOne({'name': 'Cary Smith'})._id
db.deal.insertOne({
	'date': new Date("2021-01-08"), 
	'customer_name': 'Mary Smith', 
	'payment_status': true,
	'payment_type': 'virtual', 
	'sum': 1150000,
	'batch': {
		'conditions': 'something important', 
		'quantity': 1150, 
		'product': new DBRef("products", id_product)
	}, 
	'broker': new DBRef('broker', id_broker)
})
{ acknowledged: true,
  insertedId: ObjectId("60c9452c1da236716933dc5e") }

var id_product = db.products.findOne({'name': 'kite'})._id
var id_broker = db.broker.findOne({'name': 'Harly Joy'})._id
db.deal.insertOne({
	'date': new Date("2020-12-29"), 
	'customer_name': 'James Right', 
	'payment_status': true,
	'payment_type': 'cash', 
	'sum': 1958620,
	'batch': {
		'conditions': 'something important', 
		'quantity': 1872, 
		'product': new DBRef("products", id_product)
	}, 
	'broker': new DBRef('broker', id_broker)
})
{ acknowledged: true,
  insertedId: ObjectId("60c945971da236716933dc5f") }



```



