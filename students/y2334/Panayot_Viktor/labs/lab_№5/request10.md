# Request 10
```sql
select name_batch from batch
where ASCII(name_batch) = 49 and price_batch > 1000;
```

## Score - 3

## Description
```
Вывод номеров партий, начинающихся на 1 и стоящих более 1000
```

## Result
| name_batch
|:----------:
| 100100221
| 100100222
