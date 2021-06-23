# Request 9
```sql
select idbatch from contract_bcb
where (select EXTRACT(YEAR FROM date_of_conclusion)) = '2021';
```

## Score - 4

## Description
```
Вывод партий, проданных в 2021 году
```

## Result
| idbatch|
|:------:|
|       1|
|       2|
|       3|
