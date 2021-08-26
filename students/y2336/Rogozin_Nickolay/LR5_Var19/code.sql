--выбор значений, заданных атрибутов из более, чем двух таблиц, с сортировкой – от 1 балла;
SELECT animals.id, sex, type, healing.id, date  FROM lr3.animals, lr3.healing WHERE animals.id = '1' GROUP BY animals.id, healing.id;

--использование условий WHERE, состоящих из более, чем одного условия – от 1 балла;
SELECT * FROM lr3.animals WHERE id > 1 and type = 'Reptile';
SELECT * FROM lr3.healing WHERE doctor_id < 2 and animals_id != 2;

--использование функций для работы с датами – от 2 баллов;
INSERT INTO lr3.healing VALUES (2, current_date, 1, 1);

--использование строковых функций – от 2 баллов;
INSERT INTO lr3.doctor VALUES (2, '1970-01-01', UPPER('jim'), '88005553535');
INSERT INTO lr3.overseer VALUES (2, '1970-01-01', LOWER('BOB'), '88005553535');

--запрос с использованием подзапросов – от 2 баллов (многострочный подзапрос - от 2 баллов);
SELECT id, type FROM lr3.animals WHERE sex = 'M' and NOT EXISTS (SELECT id FROM lr3.healing WHERE id = animals.id);

--вычисление групповой (агрегатной) функции – от 1 балла (с несколькими таблицами – от 2 баллов);
SELECT count(*) FROM lr3.animals;

--вычисление групповой (агрегатной) функции с условием HAVING – от 2 баллов;
SELECT sex, type, count(*) FROM lr3.animals GROUP BY sex,type HAVING sex = 'M';

--использование предикатов EXISTS, ALL, SOME и ANY - от 2 баллов;
SELECT id, type FROM lr3.animals WHERE sex = 'M' and NOT EXISTS (SELECT id FROM lr3.healing WHERE id = animals.id);

--использование запросов с операциями реляционной алгебры (объединение, пересечение и т.д.) - от 2 баллов;
SELECT id, name FROM lr3.doctor UNION SELECT id,name FROM lr3.overseer;

--использование объединений запросов (inner join и т.д.) - от 2 баллов.
SELECT healing.date, sex, type FROM lr3.animals JOIN lr3.healing ON animals.id = healing.animals_id;


