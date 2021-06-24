# Creation code

`Код заполнения таблиц базы данных`

## Автор
```sql
INSERT INTO "author" (birth_date, name, country) VALUES 
  ('1977-11-06','Buckminster','Cook Islands'),
  ('1981-09-24','Lyle','Bonaire, Sint Eustatius and Saba'),
  ('1987-03-08','Leroy','Mauritius'),
  ('2005-08-20','Dane','Montenegro'),
  ('1981-06-15','Jerry','Kyrgyzstan'),
  ('2005-10-15','Colin','Central African Republic'),
  ('1985-03-01','Aaron','Tunisia'),
  ('1988-07-06','Felix','Guinea'),
  ('2019-02-17','Bernard','Liberia'),
  ('1987-02-09','Porter','Argentina');
```

---

## Экспонаты
```sql
INSERT INTO "piece" (piece_name, creation_date, status, id_author) VALUES 
  ('Elliott','1946-05-19','397033',1),
  ('Leon','1885-08-26','253832',3),
  ('Morales','1901-11-13','586729',2),
  ('Jensen','1900-05-22','739036',2),
  ('Rush','1997-08-12','696166',10),
  ('Merrill','1998-03-25','172902',5),
  ('Chang','1889-08-13','644471',8),
  ('Battle','1907-10-30','708404',7),
  ('Craft','1970-03-23','367319',2),
  ('Melendez','1972-10-27','873316',3);
```

---

## Фонд
```sql
INSERT INTO "fond" (fond_name, name) VALUES 
  ('Liberchies','Clark'),
  ('Banff','Dale'),
  ('Sanghar','Timothy'),
  ('Eluru','Ahmed'),
  ('Meetkerke','Phillip'),
  ('Likino-Dulyovo','Len'),
  ('Tredegar','Chase'),
  ('Khushab','Griffith');
```

---

## Организация
```sql
INSERT INTO "org" (org_name, name) VALUES 
  ('Green Bay','Aristotle'),
  ('Ried im Innkreis','Dustin'),
  ('Trowbridge','Justin'),
  ('Giurdignano','Alden'),
  ('Hofors','Asher'),
  ('Tual','Kibo'),
  ('Fayetteville','Malachi'),
  ('Cassano Spinola','Herrod'),
  ('Holman','Quentin');
```

---

## Выставка
```sql
INSERT INTO "exh" (exh_name) VALUES 
  ('SVE'),('Vladimir Oblast'),('PSK'),
  ('MAG'),('Novgorod Oblast'),
  ('Smolensk Oblast'),('Oryol Oblast'),
  ('Ivanovo Oblast'),('VGG'),('BEL');
```

---

## Договор передачи
```sql
INSERT INTO "contract" (id_fond, id_org, id_exh, start_date, fin_date) VALUES 
  (4,7,2,'2022-02-02','2019-04-09'),
  (6,1,6,'2021-05-26','2016-03-29'),
  (4,3,7,'2019-06-24','2020-04-30'),
  (2,3,10,'2015-07-27','2020-09-16'),
  (8,8,6,'2016-03-19','2016-10-16'),
  (7,9,4,'2020-10-13','2021-06-19'),
  (2,4,10,'2019-11-17','2020-11-24'),
  (3,8,5,'2016-05-10','2017-09-16'),
  (1,8,7,'2015-08-09','2016-04-14'),
  (8,8,1,'2021-02-20','2016-10-10');
```

---

## Передаваемый комплект
```sql
INSERT INTO "set" (id_piece, id_contract) VALUES
  (10,2),(3,3),
  (4,4),(1,2),
  (8,9),(10,3),
  (10,1),(8,2),
  (6,7),(5,8),
  (10,4),(5,9),
  (10,1),(9,2),
  (2,1),(3,3),
  (7,9),(6,6),
  (2,8),(1,8);
```

---

## Список хранения
```sql
INSERT INTO "store" (id_fond, id_piece, get_data, drop_data) VALUES
  (6,8,"2017-03-15","2020-10-14"),
  (7,3,"2013-11-18","2017-10-22"),
  (2,6,"2018-03-15","2006-06-26"),
  (7,3,"2015-05-18","2007-09-20"),
  (1,9,"2016-10-21","2005-06-27"),
  (2,6,"2008-03-04","2003-06-17"),
  (4,3,"2012-07-10","2007-07-05"),
  (2,6,"2008-08-31","2004-12-18"),
  (2,7,"2011-07-07","2016-05-01"),
  (7,2,"2011-06-22","2005-09-05");
```

---
