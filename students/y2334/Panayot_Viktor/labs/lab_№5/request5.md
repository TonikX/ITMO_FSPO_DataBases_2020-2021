# Request 5
```sql
select ifproduct, name_product from product 
where (select EXTRACT(YEAR FROM date_of_production) = 2021);
```

## Score - 4

## Description
```
Вывод товаров, произведённых в 2021 году
```

## Result
| ifproduct |       name_product
|:---------:|:--------------------:
|         1 | Acer Aspire 515-50
|         3 | NIN chokos
|         4 | Shipe-1

