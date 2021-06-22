## Запросы

#### 1 - Выбор животного и его лечений по номеру
```
select * from diet, breed, chicken;
``` 



#### 2 - Выбор животных номеру и типу
```
SELECT * 
FROM lr3.animals 
WHERE id > 1 and type = 'Reptile';
``` 

![image](https://user-images.githubusercontent.com/58090572/121611109-32082d80-ca60-11eb-8f3a-4241b20eb6d4.png)

#### 3 - Выбор списка лечений по номеру врача и животного
```
SELECT * 
FROM lr3.healing 
WHERE doctor_id < 2 and animals_id != 2;
``` 

![image](https://user-images.githubusercontent.com/58090572/121611048-0edd7e00-ca60-11eb-8980-1d55bbe891e8.png)


#### 4 - Добавление записи о лечении с текущим временем
```
INSERT INTO lr3.healing
VALUES (2, current_date, 1, 1);
``` 

![image](https://user-images.githubusercontent.com/58090572/121611140-44826700-ca60-11eb-8f3b-3c2db1e14a88.png)

#### 5 - Добавление записи доктора с именем в верхнем регистре
```
INSERT INTO lr3.doctor 
VALUES (2, '1970-01-01', UPPER('jim'), '88005553535');
``` 

![image](https://user-images.githubusercontent.com/58090572/121611160-5106bf80-ca60-11eb-9e7c-f22b4f7d2bb3.png)

#### 6 - Добавление записи смотрителя с именем в нижнем регистре
```
INSERT INTO lr3.overseer 
VALUES (2, '1970-01-01', LOWER('BOB'), '88005553535');
``` 

![image](https://user-images.githubusercontent.com/58090572/121611197-62e86280-ca60-11eb-89c7-b23b75d27caa.png)

#### 7 - Выбор списка животных с мужским полом и без записей о лечении
```
SELECT id, type 
FROM lr3.animals 
WHERE sex = 'M' and NOT EXISTS 
(SELECT id FROM lr3.healing WHERE id = animals.id);
``` 

![image](https://user-images.githubusercontent.com/58090572/121611215-71cf1500-ca60-11eb-85a8-93bb7e8607f2.png)

#### 8 - Подсчет количества животных
```
SELECT count(*) 
FROM lr3.animals;
``` 

![image](https://user-images.githubusercontent.com/58090572/121611315-a17e1d00-ca60-11eb-9408-450c500c2bfe.png)

#### 9 - Подсчет количества животных с мужским полом с группировкой по полу и типу
```
SELECT sex, type, count(*) 
FROM lr3.animals GROUP BY sex,type 
HAVING sex = 'M';
``` 

![image](https://user-images.githubusercontent.com/58090572/121611230-7abfe680-ca60-11eb-895c-dac275ecf69f.png)

#### 10 - Вывод объединенных таблиц врачей и смотрителей
```
SELECT id, name 
FROM lr3.doctor 
UNION 
SELECT id,name FROM lr3.overseer;
``` 

![image](https://user-images.githubusercontent.com/58090572/121611356-bc509180-ca60-11eb-9d77-32082db55232.png)

#### 11 - Вывод даты лечения, пола и типа животного через JOIN таблиц
```
SELECT healing.date, sex, type 
FROM lr3.animals 
JOIN lr3.healing ON animals.id = healing.animals_id;
``` 
![image](https://user-images.githubusercontent.com/58090572/121610998-f2414600-ca5f-11eb-9c39-cbc63b19360d.png)
