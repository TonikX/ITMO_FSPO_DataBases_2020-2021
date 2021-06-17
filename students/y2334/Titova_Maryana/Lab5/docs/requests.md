# Requst №1

`Вывести информацию о названии газеты и её стоимости`


## Create requst

```
select concat (title_newspaper, ', ',  cost_newspaper, '₽') 
from newspaper;
```

## Result

| concat                       | 
|:---------------------------- |
| SpeedInfo, 53₽             | 
| The New York Times, 12₽    |
| Forbes, 45₽                |


## Score - 2





# Requst №2

`Вывести длину названий типографий`


## Create requst

```
select name_printing_office, length(name_printing_office) 
from printing_office;
```

## Result

| name_printing_office         | length         |  
|:---------------------------- |:---------------|
| qwerty                       | 6              |
| wasd                         | 4              |


## Score - 2





# Requst №3

`Вывести информацию о газетах, которые не печатались в почтовых отделениях с id = 2`


## Create requst

```
select * from newspaper 
except select * from newspaper 
where id_post_office_fk = 2
order by id_newspaper;
```

## Result

| id_newspaper         | title_newspaper   | cost_newspaper   | publication_index| number_office| date_of_issue| id_post_office_fk|
|:-------------------- |:------------------|:-----------------|:-----------------|:-------------|:-------------|:-----------------|
| 2                    | The New York Times| 12               | 54785            | 345          | 2021-03-16   | 1                |
| 3                    | SpeedInfo         | 53               | 83892            | 145          | 2021-09-28   | 1                |


## Score - 2






# Requst №4

`Вывести id и индексы выпусков, которые печатались в типографии qwerty, но не газеты “Forbes”`


## Create requst

```
select id_release, publication_index_release
from release
where id_printing_office_fk 
in (select id_printing_office 
	from printing_office 
	where name_printing_office = 'qwerty')
and id_newspaper_fk 
not in (select id_newspaper 
		from newspaper 
		where title_newspaper = 'Forbes');
```

## Result

| id_release           | publication_index_release |
|:-------------------- |:--------------------------|
| 3                    | 3524                      |
| 5                    | 2234                      |


## Score - 4







# Requst №5

`Вывести разницу между самой дорогой и дешевой газетой`


## Create requst

```
select (max(cost_newspaper) - min(cost_newspaper)) as difference
from newspaper;
```

## Result

| difference           |
|:-------------------- |
| 41                   |


## Score - 1







# Requst №6

`Посчитать наценку дистрибьютера газеты “SpeedInfo”`


## Create requst

```
select newspaper.cost_newspaper as old, cost_copy as new, cost_copy - newspaper.cost_newspaper 
as result from release
inner join newspaper on
release.id_newspaper_fk = id_newspaper and title_newspaper = 'SpeedInfo';
```

## Result

| old                  | new                  | result               |
|:-------------------- |:-------------------- |:-------------------- |
| 53                   | 150                  | 97                   |


## Score - 4







# Requst №7

`Вывести индексы выпусков, которые были реализованы в 2021 году`


## Create requst

```
select id_release, date_of_issue_release, publication_index_release 
from release 
where (select extract(year from date_of_issue_release)) = '2021';
```

## Result

| id_release          | date_of_issue_release| publication_index_release|
|:--------------------|:-------------------- |:------------------------ |
| 3                   | 2021-09-06           | 3524                     |
| 4                   | 2021-09-28           | 12234                    |
| 5                   | 2021-07-28           | 2234                     |


## Score - 2







# Requst №8

`Вывести дату релизов и стоимость экземпляра газеты “Forbes”`


## Create requst

```
select date_of_issue_release, cost_copy
from release 
where id_newspaper_fk = any (select id_newspaper 
		             from newspaper 
			     where title_newspaper = 'Forbes');
```

## Result

| date_of_issue_release| cost_copy |
|:---------------------|:--------- |
| 2020-05-01           | 120       |
| 2021-09-28           | 180       |


## Score - 2







# Requst №9

`Вывести идентификатор распределения газет, которые выпустили тираж газет > 120 000`


## Create requst

```
select id_newspaper_distribution, number_of_copies 
from newspaper_distribution 
group by id_newspaper_distribution 
having number_of_copies > 120000
order by id_newspaper_distribution;
```

## Result

| id_newspaper_distribution | number_of_copies      |
|:--------------------------|:--------------------- |
| 2                         | 400000                |
| 3                         | 500000                |
| 5                         | 180000                |


## Score - 2







# Requst №10

`Вывести индекс распределения газет с самой высокой стоимостью экземпляра`


## Create requst

```
select publication_index_release, cost_copy 
from release c1
where not exists (select * from release c2 
		  where c2.cost_copy > c1.cost_copy);
```

## Result

| publication_index_release | cost_copy             |
|:--------------------------|:--------------------- |
| 3524                      | 200                   |


## Score - 2







# Requst №11

`Вывести информацию о типографиях и распределении газет`


## Create requst

```
select * from newspaper_distribution 
left join printing_office 
on id_printing_office = newspaper_distribution.id_printing_office_fk;
```

## Result

| id_newspaper_distribution | number_of_copies      | cost_release | id_printing_office_fk | id_post_office_fk | id_printing_office | name_printing_office | address_printing_office | count | schedule_printing_office | id_newspaper_fk |
|:--------------------------|:--------------------- |:-------------|:----------------------|:------------------|:-------------------|:---------------------|:------------------------|:------|:-------------------------|:----------------|
| 1                         | 100000                | 150          | 1                     | 2                 | 1                  | qwerty               | Gorkovskaya, 15         | 12000 | 8-00 22-00               | 2               | 
| 2                         | 400000                | 100          | 2                     | 2                 | 2                  | wasd                 | Gorkovskaya, 244a       | 2400  | 10-00 20-00              | 1               | 
| 3                         | 500000                | 120          | 2                     | 1                 | 2                  | wasd                 | Gorkovskaya, 244a       | 2400  | 10-00 20-00              | 1               | 
| 4                         | 120000                | 140          | 1                     | 1                 | 1                  | qwerty               | Gorkovskaya, 15         | 12000 | 8-00 22-00               | 2               | 
| 5                         | 180000                | 147          | 2                     | 1                 | 2                  | wasd                 | Gorkovskaya, 244a       | 2400  | 10-00 20-00              | 1               | 

## Score - 2




# Requst №12

`Вывести основную информацию о напечатанных и реализованных газетах`


## Create requst

```
select newspaper.title_newspaper, release.date_of_issue_release, release.cost_copy, printing_office.name_printing_office
from newspaper 
join printing_office 
on newspaper.id_newspaper = printing_office.id_newspaper_fk
join release 
on printing_office.id_printing_office = release.id_printing_office_fk
order by newspaper;
```

## Result

| title_newspaper    | date_of_issue_release      | cost_copy    | name_printing_office |
|:-------------------|:-------------------------- |:-------------|:---------------------|
| Forbes             | 2020-01-01                 | 100          | wasd                 | 
| The New York Times | 2020-05-01                 | 120          | qwerty               |
| The New York Times | 2021-09-06                 | 200          | qwerty               |
| The New York Times | 2021-09-28                 | 180          | qwerty               |
| The New York Times | 2021-07-28                 | 150          | qwerty               |

## Score - 2






# Requst №13

`Вывести информацию о газете со стоимостью 12 и датой выпуска 2021-03-16`


## Create requst

```
select * from newspaper 
where cost_newspaper = 12 and date_of_issue = '2021-03-16';
```

## Result

| id_newspaper       | title_newspaper      | cost_newspaper    | publication_index     | number_office | date_of_issue | id_post_office_fk |
|:-------------------|:---------------------|:------------------|:----------------------|:--------------|:--------------|:------------------|
| 2                  | The New York Times   | 12                | 54785                 | 345           | 2021-03-16    | 1                 |


## Score - 1






# Requst №14

`Вывести информацию о редакции, в которой фамилия редактора начинается на букву P`


## Create requst

```
select * from editorial_office where name LIKE 'P%';
```

## Result

| id_editorial_office| name                 | 
|:-------------------|:---------------------|
| 2                  | Petrova A.M.         |

## Score - 1


# Total - 30
