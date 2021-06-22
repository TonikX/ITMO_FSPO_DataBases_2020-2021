# Запросы

## Запрос 1
Выводит список всех состоявшихся сделок, с типо оплаты "cash"
```javascript
db.deal.find({'payment_type': 'cash'}).pretty()
```
![](1.png)


## Запрос 2
Выводит список сделок, совершившённых брокером Cary Smith за последний год
```javascript
var id_broker = db.broker.findOne({'name': 'Cary Smith'})._id
db.deal.find({'date': {$gte: new Date('2021-01-01')}, 'broker.$id': id_broker})
```
![](2.png)

## Запрос 3
Выводит список продуктов с истёкшим сроком годности
```javascript
db.products.find({shelf_life: {$lte: new Date()}})
```
![](3.png)

## Запрос 4
Выводит id сделки и покупателя Mary Smith, в случае если сумма сделки выше средней и сделка состоялась
```javascript
var average_sum =  db.deal.aggregate(
  [
    {

      $group: { _id: null, avg: { $avg: "$sum" } }
    }
  ]
).avg
db.deal.find({customer_name: "Mary Smith", payment_status: true, sum: {$gte: average_sum}}, {_id: true, customer_name: true})
```
![](4.png)

## Запрос 5
Выводит список производств, чья специализация существует и начинается на "b"
```javascript
db.products.find({goods_type: {$regex: /^b/}}, {organization: true, contacts: true})
```
![](5.png)


