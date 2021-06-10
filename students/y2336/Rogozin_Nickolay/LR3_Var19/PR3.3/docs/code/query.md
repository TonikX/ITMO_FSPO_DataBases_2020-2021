## Запросы

#### 1 - Выбор животного и его лечений по номеру
```
SELECT animals.id, sex, type, healing.id, date  
FROM lr3.animals, lr3.healing 
WHERE animals.id = '1' GROUP BY animals.id, healing.id;
``` 
![image](https://user-images.githubusercontent.com/58090572/121610998-f2414600-ca5f-11eb-9c39-cbc63b19360d.png)


#### 2 - Выбор животных номеру и типу
```
SELECT * 
FROM lr3.animals 
WHERE id > 1 and type = 'Reptile';
``` 

#### 3 - Выбор списка лечений по номеру врача и животного
```
SELECT * 
FROM lr3.healing 
WHERE doctor_id < 2 and animals_id != 2;
``` 

#### 4 - Добавление записи о лечении с текущим временем
```
INSERT INTO lr3.healing
VALUES (2, current_date, 1, 1);
``` 

#### 5 - Добавление записи доктора с именем в верхнем регистре
```
INSERT INTO lr3.doctor 
VALUES (2, '1970-01-01', UPPER('jim'), '88005553535');
``` 

#### 6 - Добавление записи смотрителя с именем в нижнем регистре
```
INSERT INTO lr3.overseer 
VALUES (2, '1970-01-01', LOWER('BOB'), '88005553535');
``` 

#### 7 - Выбор списка животных с мужским полом и без записей о лечении
```
SELECT id, type 
FROM lr3.animals 
WHERE sex = 'M' and NOT EXISTS 
(SELECT id FROM lr3.healing WHERE id = animals.id);
``` 

#### 8 - Подсчет количества животных
```
SELECT count(*) 
FROM lr3.animals;
``` 

#### 9 - Подсчет количества животных с мужским полом с группировкой по полу и типу
```
SELECT sex, type, count(*) 
FROM lr3.animals GROUP BY sex,type 
HAVING sex = 'M';
``` 

#### 10 - Вывод объединенных таблиц врачей и смотрителей
```
SELECT id, name 
FROM lr3.doctor 
UNION 
SELECT id,name FROM lr3.overseer;
``` 

#### 11 - Вывод даты лечения, пола и типа животного через JOIN таблиц
```
SELECT healing.date, sex, type 
FROM lr3.animals 
JOIN lr3.healing ON animals.id = healing.animals_id;
``` 

