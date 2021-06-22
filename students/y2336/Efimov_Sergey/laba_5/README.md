## Запросы

#### 1  
```
select * from diet, breed, chicken;
``` 
![image](https://user-images.githubusercontent.com/64501412/122996995-36174200-d3b4-11eb-84f7-50d28c08fd69.png)

1 балл 

#### 2  
```
SELECT salary FROM worker; 
``` 
![image](https://user-images.githubusercontent.com/64501412/122997125-5941f180-d3b4-11eb-8ada-b8c46cf032f1.png)

1 балл

#### 3 
```
select * from stay where id_cell = 1 intersect select * from stay where quantity = 100;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997258-7a0a4700-d3b4-11eb-8865-fc90dc72c2a7.png)

2 балла

#### 4 
```
select * from chicken, breed order by chicken;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997523-c48bc380-d3b4-11eb-97f6-da555c77a88b.png)

2 балла

#### 5 
```
select * from chicken, breed order by chicken;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997612-dc634780-d3b4-11eb-9a5b-e805547743fa.png)

1 балл

#### 6 
```
select id, sum(weight) as current from chicken group by id having sum(weight) < 150 order by id;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997711-f13fdb00-d3b4-11eb-864a-746e186c2566.png)

2 балла

#### 7  
```
select * from chicken left join contract on id_worker = 1;
``` 
![image](https://user-images.githubusercontent.com/64501412/122997815-0b79b900-d3b5-11eb-9d72-909d3c879c53.png)

2 балла

#### 8 
```
select * from diet where name_diet = 'first' intersect select * from diet where content_diet = '1,2,3';
``` 
![image](https://user-images.githubusercontent.com/64501412/122997877-1b919880-d3b5-11eb-8708-d15db32ac401.png)

2 балла

#### 9 
```
select * from diet where name_diet = 'first';
``` 
![image](https://user-images.githubusercontent.com/64501412/122997947-2a784b00-d3b5-11eb-893f-eac5c538a39d.png)

2 балла

#### 10 
```
select * from list left join recomended_diet on id_diet = 1;
``` 
![image](https://user-images.githubusercontent.com/64501412/122998028-39f79400-d3b5-11eb-8594-6abcf7305cfb.png)

2 балла

#### 11 
```
select * from list where id_workshop = 1 intersect select * from list where date_install = '2021-01-01';
``` 
![image](https://user-images.githubusercontent.com/64501412/122998178-690e0580-d3b5-11eb-99e5-2647c089b04b.png)

2 балла

#### 12 
```
select * from breed left join diet on name_diet = 'first';
``` 
![image](https://user-images.githubusercontent.com/64501412/122998230-77f4b800-d3b5-11eb-9499-aab151e58545.png)

2 балла

#### 13 
```
select id from worker union all select id from servies;
``` 
![image](https://user-images.githubusercontent.com/64501412/122998296-8a6ef180-d3b5-11eb-8ccf-a8c7aae92989.png)

2 балла

#### 14 
```
select * from servies where id_worker = 1 intersect select * from servies where id_workshop = 1;
``` 
![image](https://user-images.githubusercontent.com/64501412/122998362-9b1f6780-d3b5-11eb-95ed-15d67b83456b.png)

балла 2

#### 15 
```
select id, sum(weight) as current from chicken group by id having sum(weight) > 150 order by id;
```
![image](https://user-images.githubusercontent.com/64501412/122998406-ac687400-d3b5-11eb-9e65-aa56c5887698.png)

2 балла

### Итого баллов: 27 баллов.
