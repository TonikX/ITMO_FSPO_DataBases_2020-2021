# Создание и заполнение БД

#### 1) Создание БД
```
use birzha
```
#### 2) Заполнение таблицы product
```
db.product.insert({productID: 1, productName: "milk", md: new Date(2021, 3, 5), unit: "ml", sheifLife: new Date(2021, 3, 12), type: "dairy"});
db.product.insert({productID: 2, productName: "juice", md: new Date(2021, 1, 12), unit: "ml", sheifLife: new Date(2021, 10, 12), type: "drinks"});
db.product.insert({productID: 3, productName: "potato", md: new Date(2021, 2, 21), unit: "kg", sheifLife: new Date(2021, 3, 19), type: "vegetables"});
db.product.insert({productID: 4, productName: "banana", md: new Date(2021, 3, 7), unit: "kg", sheifLife: new Date(2021, 3, 22), type: "fruits"});
db.product.insert({productID: 5, productName: "cup", md: new Date(2019, 8, 4), unit: "piece", sheifLife: new Date(2029, 8, 4), type: "dishes"});
```
#### 3) Заполнение таблицы firm
```
db.firm.insert({firmID: 1, firmName: "Chayka", specialization: "dairy products", contacts: "555-23-34"});
db.firm.insert({firmID: 2, firmName: "Ceramica", specialization: "dishes", contacts: "123-23-23"});
db.firm.insert({firmID: 3, firmName: "South", specialization: "fruits/vegetables", contacts: "567-00-98"});
```
#### 4) Заполнение таблицы buyer
```
db.buyer.insert({buyerID: 1, buyerName: "Birzha", contacts: "535-75-44"});
db.buyer.insert({buyerID: 2, buyerName: "OOO Ogonki", contacts: "345-75-34"});
```
#### 5) Заполнение таблицы broker
```
db.broker.insert({brokerID: 1, FIO: "Smirnov Alexey Igorevich", contacts: "8-981-123-45-67"});
db.broker.insert({brokerID: 2, FIO: "Ivanov Petr Mihaylovich", contacts: "8-981-987-87-22"});
db.broker.insert({brokerID: 3, FIO: "Sidorova Mariya Petrovna", contacts: "8-963-678-34-09"});
```
#### 6) Заполнение таблицы productInDeal
```
db.productInDeal.insert({productInDeaID: 1, firmID: 2, productID: 5, price: 345, quantity: 1000});
db.productInDeal.insert({productInDeaID: 2, firmID: 3, productID: 3, price: 47, quantity: 5000});
db.productInDeal.insert({productInDeaID: 3, firmID: 2, productID: 4, price: 64, quantity: 5000});
db.productInDeal.insert({productInDeaID: 4, firmID: 1, productID: 1, price: 55, quantity: 4000});
```
#### 7) Заполнение таблицы deal
```
db.deal.insert({dealID: 1, dealDate: new Date(2021, 3, 5), buyerID: 1, productInDeaID: 4});
db.deal.insert({dealID: 2, dealDate: new Date(2019, 9, 5), buyerID: 2, productInDeaID: 1});
db.deal.insert({dealID: 3, dealDate: new Date(2021, 2, 22), buyerID: 1, productInDeaID: 2});
db.deal.insert({dealID: 4, dealDate: new Date(2021, 3, 7), buyerID: 1, productInDeaID: 3});
```
#### 8) Заполнение таблицы paymentToFirm
```
db.paymentToFirm.insert({paymentID: 1, status: "made", payType: "prepayment", payDate: new Date(2021, 3, 6), firmID: 1, dealID: 1});
db.paymentToFirm.insert({paymentID: 2, status: "made", payType: "afterpayment", payDate: new Date(2019, 9, 6), firmID: 2, dealID: 2});
db.paymentToFirm.insert({paymentID: 3, status: "not made", payType: "prepayment", firmID: 3, dealID: 3});
db.paymentToFirm.insert({paymentID: 4, status: "not made", payType: "prepayment", firmID: 3, dealID: 4});
```
#### 9) Заполнение таблицы paymentToBroker
```
db.paymentToBroker.insert({paymentID: 1, status: "made", payDate: new Date(2021, 3, 6), brokerID: 1, dealID: 1});
db.paymentToBroker.insert({paymentID: 2, status: "made", payDate: new Date(2019, 9, 6), brokerID: 2, dealID: 2});
db.paymentToBroker.insert({paymentID: 3, status: "not made", brokerID: 3, dealID: 3});
db.paymentToBroker.insert({paymentID: 4, status: "not made", brokerID: 1, dealID: 4});
```