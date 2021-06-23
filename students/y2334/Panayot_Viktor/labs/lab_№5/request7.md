# Request 7
```sql
select name_broker, EXTRACT(YEAR FROM date_of_duration)
from contract_BO
natural join broker;
```

## Score - 4

## Description
```
Вывод года истечения контракта между брокером и конторой
```

## Result
|          name_broker           | date_part
|:------------------------------:|:---------:
| Jordan Belfort                 |      2025
| Don Juan                       |      2035
| Uncle Pihto                    |      2022
