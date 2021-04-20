# Requests
# Result: 31


## Request 1

Вывести всю информацию из таблиц chicken и breed совместно.
```
select * from chicken, breed order by chicken;
```
## Result

 chicken_id | weight | age | kpd | place | breed | breed_id | average_kpd | average_weight
------------|--------|-----|-----|-------|-------|----------|-------------|----------------
          1 |    100 |  10 |  30 | Here  |     1 |        2 |           2 |              3
          1 |    100 |  10 |  30 | Here  |     1 |        1 |           2 |              3
          1 |    100 |  10 |  30 | Here  |     1 |        3 |           3 |              2
          2 |     10 | 100 |  60 | Here  |     2 |        2 |           2 |              3
          2 |     10 | 100 |  60 | Here  |     2 |        1 |           2 |              3
          2 |     10 | 100 |  60 | Here  |     2 |        3 |           3 |              2
          3 |    200 |  50 |  50 | Here  |     3 |        1 |           2 |              3
          3 |    200 |  50 |  50 | Here  |     3 |        3 |           3 |              2
          3 |    200 |  50 |  50 | Here  |     3 |        2 |           2 |              3


### score += 1 (1)

## Request 2

Вывести информацию о содержании курицы с id = 1 
```
select * from maintenance, chicken where chicken = 1 and chicken_id = 1;
```
## Result

 maintenance_id |    in_d    |   out_d    | cell | chicken | chicken_id | weight | age | kpd | place | breed
----------------|------------|------------|------|---------|------------|--------|-----|-----|-------|-------
              1 | 2018-03-20 | 2018-04-23 |    1 |       1 |          1 |    100 |  10 |  30 | Here  |     1
              
### score += 1 (2)

## Request 3

Вывести информацию о содержании курицы с id = 1 и датой заселения в марте
```
select * from maintenance where (select extract(month from in_d) = 3) and chicken = 1;
```
## Result

 maintenance_id |    in_d    |   out_d    | cell | chicken
----------------|------------|------------|------|---------
              1 | 2018-03-20 | 2018-04-23 |    1 |       1
              
### score += 2 (4)

## Request 4

Вывести информацию о id и местонахождении курицы
```
select concat(chicken_id, ' - ', place) as id_place from chicken;
```
## Result

 id_place
----------
 1 - Here
 2 - Here
 3 - Here
              
### score += 2 (6)

## Request 5

Вывести информацию о породе курицы с id 2
```
 select * from breed where breed_id in (select breed from chicken where chicken_id = 2);
```
## Result

 breed_id | average_kpd | average_weight
----------|-------------|----------------
        2 |           2 |              3
              
### score += 2 (8)

## Request 6

Вывести информацию о породе курицы с расположением в клетке 1
```
 select * from breed where breed_id in (select breed from chicken where chicken_id in (select chicken from maintenance where cell = 1));
```
## Result

breed_id  | average_kpd | average_weight
----------|-------------|----------------
        1 |           2 |              3
              
### score += 2 (10)

## Request 7

Вывести информацию о весе куриц с породой 1 и примерном весе куриц с породой 1
```
 select sum(weight) as current, sum(average_weight) as target from chicken, breed where breed_id = 1;
```
## Result

 current | target
---------|--------
     310 |      9
              
### score += 2 (12)

 ## Request 8

Вывести информацию о весе куриц, которые весят меньше 150
```
 select chicken_id, sum(weight) as current from chicken group by chicken_id having sum(weight) < 150 order by chicken_id;
```
## Result

 chicken_id | current
------------|---------
          1 |     100
          2 |      10
              
### score += 2 (14)

 ## Request 9

Вывести информацию курицах, размещенных в клетках
```
select distinct * from chicken where exists (select chicken from maintenance);
```
## Result

 chicken_id | weight | age | kpd | place | breed
------------|--------|-----|-----|-------|-------
          1 |    100 |  10 |  30 | Here  |     1
          3 |    200 |  50 |  50 | Here  |     3
          2 |     10 | 100 |  60 | Here  |     2
              
### score += 2 (16)

  ## Request 10

Вывести информацию о курицах, обгоняющих породу по весу
```
select chicken_id, weight from chicken where weight > all (select average_weight from breed);
```
## Result

 chicken_id | weight
------------|--------
          1 |    100
          2 |     10
          3 |    200
              
### score += 2 (18)

  ## Request 11

Вывести информацию о курицах, которых не заселили
```
select distinct * from chicken where not chicken_id = some (select chicken from maintenance);
```
## Result

 chicken_id | weight | age | kpd | place | breed
------------|--------|-----|-----|-------|-------
              
### score += 2 (20)

  ## Request 12

Вывести информацию о диете для породы 3 и времени года - Весны
```
select * from diet where breed = 3 intersect select * from diet where season = 'Spring';
```
## Result

 diet_id | content | season | breed
---------|---------|--------|-------
       1 | Cool    | Spring |     3
              
### score += 2 (22)

  ## Request 13

Вывести информацию о диете для породы 3 и времени года - не Лета
```
select * from diet where breed = 3 except select * from diet where season = 'Summer';
```
## Result

 diet_id | content | season | breed
---------|---------|--------|-------
       1 | Cool    | Spring |     3
              
### score += 2 (24)

  ## Request 14

Вывести объединенную информацию о работнике и уборке
```
select worker_id from worker union all select cell from cleaning;
```
## Result

 worker_id
-----------
         1
         2
         3
         1
         2
         3
              
### score += 2 (26)

  ## Request 15

Вывести объединенную информацию о диете и породе
```
select * from breed left join diet on diet.breed = breed_id;
```
## Result

 breed_id | average_kpd | average_weight | diet_id | content | season | breed
----------|-------------|----------------|---------|---------|--------|-------
        3 |           3 |              2 |       1 | Cool    | Spring |     3
        2 |           2 |              3 |       2 | Cooler  | Spring |     2
        3 |           3 |              2 |       3 | Best    | Summer |     3
        1 |           2 |              3 |         |         |        |
              
### score += 2 (28)

  ## Request 16

Вывести объединенную информацию о диете, породе и курице
```
select * from chicken left join breed on chicken.breed = breed_id left join diet on diet.breed = breed_id order by chicken;
```
## Result

 chicken_id | weight | age | kpd | place | breed | breed_id | average_kpd | average_weight | diet_id | content | season | breed
------------|--------|-----|-----|-------|-------|----------|-------------|----------------|---------|---------|--------|-------
          1 |    100 |  10 |  30 | Here  |     1 |        1 |           2 |              3 |         |         |        |
          2 |     10 | 100 |  60 | Here  |     2 |        2 |           2 |              3 |       2 | Cooler  | Spring |     2
          3 |    200 |  50 |  50 | Here  |     3 |        3 |           3 |              2 |       1 | Cool    | Spring |     3
          3 |    200 |  50 |  50 | Here  |     3 |        3 |           3 |              2 |       3 | Best    | Summer |     3
              
### score += 2 (30)

  ## Request 17 (полировочный)

Вывести вообще все
```
select * from diet, breed, chicken, maintenance, cell, worker, cleaning, department;
```
## Result

 diet_id | content | season | breed | breed_id | average_kpd | average_weight | chicken_id | weight | age | kpd | place | breed | maintenance_id |    in_d    |   out_d    | cell | chicken | cell_id | row | cell | department | worker_id | passport | passport_timing |           fio            | work_place | salary | doc | fire |    hire    | cleaning_id | cell | worker | department_id | capacity |   address
---------|---------|--------|-------|----------|-------------|----------------|------------|--------|-----|-----|-------|-------|----------------|------------|------------|------|---------|---------|-----|------|------------|-----------|----------|-----------------|--------------------------|------------|--------|-----|------|------------|-------------|------|--------|---------------|----------|-------------
Бесконечность........
              
### score += 1 (31)