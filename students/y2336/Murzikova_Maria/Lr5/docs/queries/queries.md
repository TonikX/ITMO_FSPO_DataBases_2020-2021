##Queries

#### 1) Выдать количество пакетов молока в партии для каждой партии с условием предоплаты
```
select product.product_name, product_batch.product_quantity, batch.delivery_conditions
from product inner join (product_batch inner join batch on
product_batch.batch_id=batch.id_batch) on
product.id_product = product_batch.product_id
where product.product_name='Молоко' and
batch.delivery_conditions='Предоплата';
```
####2) Выдать стоимость всех продуктов для сделок по датам
```
SELECT deal.deal_date, sum(product_batch.product_price*product_batch.product_quantity) as AllProductCost
FROM deal natural join product_batch group by deal.deal_date;
```
####3) Выдать все продукты с их типами
```
select product.product_name, product_firm.product_type from
product left join product_firm on product.id_product=product_firm.product_id;
```
####4) Выдать всех брокеров из Конторы3, которые участвовали в сделках 04/04/2021
```
select broker.fio, office.office_name from deal inner join
(broker inner join office on broker.office_id=office.id_office) ON
deal.broker_id=broker.id_broker where deal.deal_date='2021-04-04' and
office.office_name='Контора3';
```
####5) Выдать покупателей для каждой сделки
```
SELECT buyer.buyer_name, contract.contract_date from contract inner join
(deal inner join buyer ON buyer.id_buyer=deal.buyer_id) ON
deal.contract_id=contract.id_contract;
```
####6) Выдать названия всех покупателей и производителей
```
select firm_name as res from firm UNION
SELECT buyer_name as res FROM buyer
order by res;
```
####7) Выдать название фирмы, производящей сыр
```
SELECT firm_name FROM firm where id_firm IN
(select firm_id from product_firm where product_id IN
(select id_product from product where product_name='Сыр'));
```
####8) Выдать номера партий, где в условии есть подстрока "Пред"
```
SELECT id_batch FROM batch where (substring(delivery_conditions,1,4)='Пред');
```
####9) Выдать, в каком месяца был заключён каждый из договоров
```
SELECT id_contract, date_part('month',contract_date) as month_number FROM contract;
```
####10) Выдать среднюю стоимость товаров для каждой партии
```
SELECT batch_id, avg(product_price) FROM product_batch group by batch_id order by batch_id asc;
```
####11) Вывести дату сделки, заключенной с участием покупателя "Биржа" и без участия брокера "Петров К. Г."
```
SELECT buyer_id, broker_id, deal_date FROM deal where buyer_id in
(select DISTINCT id_buyer from buyer where buyer_name='Биржа')
except select buyer_id, broker_id, deal_date FROM deal where broker_id NOT IN
(select id_broker from broker where fio='Петров К. Г.');
```
####12) Выдать продукты, цена которых в партиях больше минимальной цены, которая когда-либо была
```
SELECT product_name, product_price FROM product inner join product_batch on id_product=product_id
where product_price > any(select product_price from product_batch);
```
####13) Выдать названия продуктов, тип которых совпадает со специализацией организации
```
SELECT product_name FROM product inner join (product_firm inner join firm on id_firm=firm_id)
product_firm on id_product=product_id
where product_type In (select speciallization from firm);
```
####14) Выдать количество товаров и номер партии для товаров, количество которых >= максимальному
```
SELECT batch_id, product_quantity FROM product_batch where
product_quantity >= all(select product_quantity from product_batch);
```