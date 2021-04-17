# Request 1
```sql
select idcustomer, name_customer, idbroker, name_broker, date_of_conclusion from public.customer
natural join public.contract_bcb
natural join public.broker
where exists (select * from public.contract_bcb where idcustomer = idbroker and date_of_conclusion < '2021-04-17')
order by name_customer;
```

## Score - 8

## Description
```
Cортированный по имени покупателя вывод всех покупателей и брокеров с одинаковым id, 
у которых существует между собой хотя бы одна сделка датированная ранее 17-04-2021
```

## Result
|idcustomer |         name_customer  | idbroker |          name_broker           | date_of_conclusion
|:-:|:------------------------------:|:--------:|:------------------------------:|:-------------------:
| 2 | IGIL(banned in Russia)         |        2 | Don Juan                       | 2021-03-20
| 3 | Nothing Nothing Nothing        |        3 | Uncle Pihto                    | 2021-10-10
| 1 | Panayot Viktor                 |        1 | Jordan Belfort                 | 2021-02-10
