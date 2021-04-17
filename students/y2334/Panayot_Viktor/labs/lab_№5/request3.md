# Request 3
```sql
select idbroker, name_broker from broker
natural join contract_bo
natural join office
where name_office = 'brothers Brazzers' and work_experience <= 5
order by idbroker;
```

## Score - 4

## Description
```
Вывод брокеров из заданной компании с опытом работы <= 5-ти год., 
сортированный по id брокера
```

## Result
|idbroker |          name_broker
|:-------:|:----------------------:
|       2 | Don Juan
