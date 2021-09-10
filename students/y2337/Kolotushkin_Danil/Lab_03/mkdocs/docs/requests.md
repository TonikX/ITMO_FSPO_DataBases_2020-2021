##1. Вывод материалов в составе товара

```sql
select "Service".name, "Material".name 
from "materialsInOrder" 
inner join "Material" on material_id = "Material".id 
inner join "Service" on service_id = "Service".id 
order by "Service".name asc;
```

|Товар|Материал|
|-----|--------|
|буклет|бумага|
|буклет|краска|
|постер|бумага|
|постер|краска|

##2. Количество материалов на продукт

```sql
select "Service".name, count(material_id)
from "materialsInOrder"
inner join "Service" on "Service".id = service_id
group by "Service".name
order by "Service".name asc;
```

|Товар|Количество материала|
|-----|--------------------|
|буклет|2|
|постер|2|

##3. Полная стоимость товаров, начинающихся на p и стоимость создания которых меньше 20

```sql
select "Service".name, sum("Material".cost) + "Service".cost as total
from "materialsInOrder"
inner join "Service" on "Service".id = service_id
inner join "Material" on "Material".id = material_id
where "Service".name like 'p%' or
"Service".cost < 20
group by "Service".name, "Service".cost;
```

|Товар|Общая стоимость|
|-----|---------------|
|буклет|80|
|постер|90|

##4. Вывод имени и номера телефона клиента, если его заказ не оплачен

```sql
select name, phone
from "Client"
where id in (select client_id
			from "Order"
			where payment_id in (select id
								from "PaymentOrder"
								where status = false));
```

|Имя|Телефон|
|---|-------|
|Alex|+72344532345|

##5. Вывод имени клиента, номера заказа, и длительности его выполнения

```sql
select "Client".name, "Order".id, (completion - admission) as term
from "TimeLimit"
inner join "Order" on time_id = "TimeLimit".id
inner join "Client" on "Client".id = client_id;
```

|Имя|Номер|Длительность|
|---|-----|------------|
|Vasya|1|10|
|Vasya|2|20|
|Alex|3|8|
|Alex|4|15|

##6. Вывод имени клиента с самым большим количетсвом заказов, если кол-во заказов больше 10

```sql
select "Client".name, count("Order".id)
from "Client" inner join "Order" on "Client".id = client_id
group by "Client".name
having count("Order".id) > 10
order by count("Order".id) asc
limit 1;
```

|Имя|Количество|
|-|-|
|Alex|14|

##7. Вывод номера заказа, имени и телефона клиента, если его заказ выполнен

```sql
select "Order".id as order, "Client".name, "Client".phone
from "Order"
inner join "Client"
on "Client".id = client_id
where "Order".id = any (select order_id from "Implementation" where status = true);
```

|Номер заказа|Имя|Телефон|
|------------|---|-------|
|1|Vasya|+756544532345|

##8. Вывод имени клиента и сумму стоимостей всех его заказов

```sql
select "Client".name, "Client".last_name, 
sum((select sum("Material".cost) + "Service".cost as total
	from "materialsInOrder"
	inner join "Service" on "Service".id = service_id
	inner join "Material" on "Material".id = material_id
	where service_id = outter.service_id
	group by "Service".name, "Service".cost))
from "ServicesInOrder" outter
inner join "Order" on "Order".id = outter.order_id
inner join "Client" on "Order".client_id = "Client".id
group by "Client".name, "Client".last_name
order by "Client".name asc,
		 "Client".last_name asc;
```

|Имя|Фамилия|Сумма|
|---|-------|-----|
|Alex|Romanov|260|
|Vasya|Pupkin|250|

##9. Вывод числа исполнителей одного заказа если их больше двух

```sql
select order_id, count(implementer_id)
from "Implementation"
group by order_id
having count(implementer_id) > 2
order by order_id asc;
```

|Номер заказа|Количество исполнителей|
|------------|-----------------------|
|1|4|

##10. Вывод имени, телефона клиента и номера заказа за определённый период

```sql
select "Client".name, "Client".phone, "Order".id
from "Order"
inner join "Client" on "Client".id = client_id
where time_id = any(select id from "TimeLimit" where admission between '200-05-10' and '2005-04-03');
```

|Имя|Телефон|Номер заказа|
|-|-|-|
|Alex|+75654532345|1|
|Alex|+75654532345|2|
