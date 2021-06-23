# Request 8
```sql
select idbatch from batch_content
where idproduct = 1 and date_of_receipt < '2021-04-18';
```
## Score - 2

## Description
```
Вывод партий с товаром под номером 1, принятым в партию ранее 2021-04-18
```

## Result
| idbatch
|:-------:
|       1
