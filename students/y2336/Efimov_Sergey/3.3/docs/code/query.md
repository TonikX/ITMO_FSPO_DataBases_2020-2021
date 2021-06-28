## Запросы

#### 1 Запрос

```
select * from stay where id_cell = 1 intersect select * from stay where quantity = 100;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997258-7a0a4700-d3b4-11eb-8865-fc90dc72c2a7.png)


#### 2 Запрос
```
select * from chicken, breed order by chicken;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997523-c48bc380-d3b4-11eb-97f6-da555c77a88b.png)


#### 3 Запрос
```
select * from chicken, breed order by chicken;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997612-dc634780-d3b4-11eb-9a5b-e805547743fa.png)


#### 4 Запрос
```
select id, sum(weight) as current from chicken group by id having sum(weight) < 150 order by id;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997711-f13fdb00-d3b4-11eb-864a-746e186c2566.png)


#### 5 Запрос 
```
select * from chicken left join contract on id_worker = 1;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997815-0b79b900-d3b5-11eb-9d72-909d3c879c53.png)


#### 6 Запрос
```
select * from diet where name_diet = 'first' intersect select * from diet where content_diet = '1,2,3';
``` 
![image](https://user-images.githubusercontent.com/64501412/122997877-1b919880-d3b5-11eb-8708-d15db32ac401.png)


#### 7 Запрос
```
select * from diet where name_diet = 'first';
``` 
![image](https://user-images.githubusercontent.com/64501412/122997947-2a784b00-d3b5-11eb-893f-eac5c538a39d.png)

