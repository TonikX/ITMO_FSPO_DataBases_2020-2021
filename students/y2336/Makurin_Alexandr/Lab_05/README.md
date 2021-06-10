# Запросы к БД

## 1. Выбор значений, заданных атрибутов из более чем двух таблиц с сортировкой

Получение контактов, образования и зарплаты соискателей, отсортированных по
уменьшению.

```SQL
select contact_details, education, salary
from
 laborexchange.applicant
 join laborexchange.hiring on laborexchange.applicant.id=applicant_id
order by salary DESC;
```
![image](https://user-images.githubusercontent.com/43097289/121584703-6e289780-ca3a-11eb-8cf3-db2fab5120f8.png)

## 2. Запрос с двойным условием

Получение соискателей с опытом от одного до 9 лет.

```SQL
SELECT * FROM laborexchange.applicant WHERE expirience > 0 AND expirience < 10;
```
![image](https://user-images.githubusercontent.com/43097289/121583920-8fd54f00-ca39-11eb-9f72-0fa29d9b413a.png)

## 3. Использование функций для работы с датами

Получение дат резюме с двадцатого января 2020 до двадцатого февраля 2020 и
их время существования на текущий момент.

```SQL
SELECT to_char(NOW() - resume_posting_date, 'DD дней HH24:MI:SS') AS resume_age, resume_posting_date
FROM laborexchange.applicant WHERE resume_posting_date BETWEEN '2020-01-20' AND '2020-02-20';
```
![image](https://user-images.githubusercontent.com/43097289/121586372-433f4300-ca3c-11eb-9a91-c828316c4029.png)

## 4. Использование строковых функций

Получение строковых названий нанимателей и их адресов.

```SQL
SELECT LOWER(name) AS "Lower name", 'Россия ' || address AS address FROM laborexchange.employer;
```
![image](https://user-images.githubusercontent.com/43097289/121587030-058eea00-ca3d-11eb-814d-76c890a35045.png)

## 5. Запрос с использованием подзапросов

Найти всех нанимателей, у которых есть заключённые контракты с зарплатой не
менее 100000.

```SQL
SELECT * FROM laborexchange.employer
WHERE EXISTS (
    SELECT * FROM 
        laborexchange.hiring JOIN laborexchange.vacancy ON hiring.vacancy_id = vacancy.id
    WHERE salary >= 100000 AND vacancy.employer_id = employer.id
);
```
![image](https://user-images.githubusercontent.com/43097289/121587838-e2b10580-ca3d-11eb-935e-bde8bb13b2d4.png)

## 6. Вычисление групповой (агрегатной) функции

Получение опыта и соответствующих ему общего времени прохождения курсов и
среднего времени прохождения курсов в год.

```SQL
SELECT
	expirience,
	SUM(duration) AS "Total duration",
	(SUM(duration)::float / expirience)::numeric(10,3) AS "Average duration per year"
FROM laborexchange.applicant JOIN laborexchange.qualification on applicant.qualification_id = qualification.id
GROUP BY expirience;
```
![image](https://user-images.githubusercontent.com/43097289/121590313-daa69500-ca40-11eb-8985-b67cb7c0da61.png)

## 7. Вычисление групповой (агрегатной) функции с условием HAVING

Найти всех работников со средней зарплатой более 100000.

```SQL
SELECT * FROM laborexchange.applicant WHERE id IN (
	SELECT applicant_id
	FROM laborexchange.hiring
	GROUP BY applicant_id
	HAVING AVG(salary) > 100000
);
```
![image](https://user-images.githubusercontent.com/43097289/121589602-ef365d80-ca3f-11eb-942e-4dfe3c569d35.png)

## 8. Использование предикатов EXISTS, ALL, SOME и ANY

Получение соискателей, у которых зарплата всегда была более 100000.

```SQL
SELECT * FROM laborexchange.applicant WHERE 100000 < ALL (
    SELECT salary FROM laborexchange.hiring WHERE applicant_id = applicant.id
);
```
![image](https://user-images.githubusercontent.com/43097289/121592193-0c206000-ca43-11eb-962a-314c58a1e215.png)

## 9. Использование запросов с операциями реляционной алгебры

Найти соискателей, которые присутствуют в таблице applicant, но не присутствуют
в таблице course_passing.

```SQL
SELECT * FROM laborexchange.applicant
EXCEPT
SELECT * FROM laborexchange.applicant
    WHERE id IN (SELECT applicant_id FROM laborexchange.course_passing);
```
![image](https://user-images.githubusercontent.com/43097289/121593755-e98f4680-ca44-11eb-8d11-8b47f3c66ca0.png)

## 10. Использование объединений запросов

Получение списка нанимателей и их вакансий.

```SQL
SELECT * FROM
    laborexchange.employer JOIN laborexchange.vacancy
        ON laborexchange.employer.id = laborexchange.vacancy.employer_id;
```
![image](https://user-images.githubusercontent.com/43097289/121595287-cbc2e100-ca46-11eb-82a8-9a85d19d0a04.png)
