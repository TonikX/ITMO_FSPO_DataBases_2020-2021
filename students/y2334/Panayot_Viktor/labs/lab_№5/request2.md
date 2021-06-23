# Request 2
```sql
select name_broker from broker where ASCII(name_broker) between 68 and 81  
union all
select name_customer from customer where ASCII(name_customer) between 68 and 81
order by name_broker;
```

## Score - 8

## Description
```
сортированный по имени брокера вывод объединения всех имен брокеров и имён 
покупателей,  первый символ которых находится в интервале букв (B; Q)
```

## Result
|          name_broker
|:--------------------------------:
| Don Juan
| IGIL(banned in Russia)
| Jordan Belfort
| Nothing Nothing Nothing
| Panayot Viktor
