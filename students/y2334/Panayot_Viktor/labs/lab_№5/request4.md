# Request 4
```sql
select work_experience, SUM(salary) from contract_bo
natural join broker
group by work_experience having work_experience > 2
order by work_experience;
```

## Score - 6

## Description
```
Вывод суммы зарплат работников по их  опыту работы (если он больше двух) и 
сортировка по id брокера
```

## Result
| work_experience |   sum
|:---------------:|:--------:
|               5 | 10000000
|              20 |    10000
|              60 |    20000
