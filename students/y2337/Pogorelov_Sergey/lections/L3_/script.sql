DROP TABLE IF EXISTS "author";

CREATE TABLE "author" (
  id_author SERIAL PRIMARY KEY,
  birth_date varchar(255),
  name varchar(255) default NULL,
  country varchar(100) default NULL
);

INSERT INTO "author" (birth_date,name,country) VALUES 
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

-- ################################################################

DROP TABLE IF EXISTS "fond";

CREATE TABLE "fond" (
  id_fond SERIAL PRIMARY KEY,
  fond_name varchar(255),
  name varchar(255) default NULL
);

INSERT INTO "fond" (fond_name,name) VALUES 
  ('Liberchies','Clark'),
  ('Banff','Dale'),
  ('Sanghar','Timothy'),
  ('Eluru','Ahmed'),
  ('Meetkerke','Phillip'),
  ('Likino-Dulyovo','Len'),
  ('Tredegar','Chase'),
  ('Khushab','Griffith');

-- ################################################################

DROP TABLE IF EXISTS "org";

CREATE TABLE "org" (
  id_org SERIAL PRIMARY KEY,
  org_name varchar(255),
  name varchar(255) default NULL
);

INSERT INTO "org" (org_name,name) VALUES 
  ('Green Bay','Aristotle'),
  ('Ried im Innkreis','Dustin'),
  ('Trowbridge','Justin'),
  ('Giurdignano','Alden'),
  ('Hofors','Asher'),
  ('Tual','Kibo'),
  ('Fayetteville','Malachi'),
  ('Cassano Spinola','Herrod'),
  ('Holman','Quentin');

-- ################################################################

DROP TABLE IF EXISTS "exh";

CREATE TABLE "exh" (
  id_exh SERIAL PRIMARY KEY,
  exh_name varchar(50) default NULL
);

INSERT INTO "exh" (exh_name) VALUES 
  ('SVE'),('Vladimir Oblast'),('PSK'),
  ('MAG'),('Novgorod Oblast'),
  ('Smolensk Oblast'),('Oryol Oblast'),
  ('Ivanovo Oblast'),('VGG'),('BEL');

-- ################################################################

DROP TABLE IF EXISTS "piece";

CREATE TABLE "piece" (
  id_piece SERIAL PRIMARY KEY,
  piece_name varchar(255) default NULL,
  creation_date date,
  status varchar(10) default NULL,
  id_author integer REFERENCES author(id_author)
);

INSERT INTO "piece" (piece_name,creation_date,status,id_author) VALUES 
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

-- ################################################################

DROP TABLE IF EXISTS "store_list";

CREATE TABLE "store_list" (
  id SERIAL PRIMARY KEY,
  id_fond integer REFERENCES fond(id_fond),
  id_piece integer REFERENCES piece(id_piece),
  get_date date,
  drop_date date
);

INSERT INTO "store_list" (id_fond,id_piece,get_date,drop_date) VALUES 
  (2,8,'2020-10-30','2018-05-11'),
  (8,3,'2013-11-15','2015-10-05'),
  (4,6,'2020-01-16','2014-09-29'),
  (5,3,'2014-12-15','2015-07-19'),
  (6,7,'2016-09-12','2018-06-08'),
  (1,1,'2020-06-17','2019-12-22'),
  (3,9,'2016-07-05','2015-05-20'),
  (6,1,'2015-07-01','2020-10-21'),
  (5,6,'2012-06-29','2014-12-10'),
  (8,6,'2021-09-02','2015-12-15');

-- ################################################################

DROP TABLE IF EXISTS "contract";

CREATE TABLE "contract" (
  id_contract SERIAL PRIMARY KEY,
  id_fond integer REFERENCES fond(id_fond),
  id_org integer REFERENCES org(id_org),
  id_exh integer REFERENCES exh(id_exh),
  start_date date,
  fin_date date
);

INSERT INTO "contract" (id_fond,id_org,id_exh,start_date,fin_date) VALUES 
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

-- ################################################################

DROP TABLE IF EXISTS "set";

CREATE TABLE "set" (
  id_set SERIAL PRIMARY KEY,
  id_piece integer REFERENCES piece(id_piece),
  id_contract integer REFERENCES contract(id_contract)
);

INSERT INTO "set" (id_piece,id_contract) VALUES 
  (2,10),(2,10),(8,1),(5,8),(9,2),
  (6,10),(10,6),(9,2),(1,1),(1,8);
