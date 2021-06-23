BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "movie" (
	"mID"	INTEGER,
	"title"	TEXT,
	"year"	INTEGER,
	"director"	TEXT
);
CREATE TABLE IF NOT EXISTS "rewiewer" (
	"rID"	INTEGER,
	"name"	TEXT
);
CREATE TABLE IF NOT EXISTS "rating" (
	"rID"	INTEGER,
	"mID"	INTEGER,
	"stars"	INTEGER,
	"ratingDate"	TEXT
);
INSERT INTO "movie" VALUES (101,'Gone with the Wind',1939,'Victor Fleming');
INSERT INTO "movie" VALUES (102,'Star Wars',1977,'George Lucas');
INSERT INTO "movie" VALUES (103,'The Sound of Music',1965,'Robert Wise');
INSERT INTO "movie" VALUES (105,'Titanic',1997,'James Cameron');
INSERT INTO "movie" VALUES (106,'Snow White',1937,'<null>');
INSERT INTO "movie" VALUES (107,'Avatar',2009,'James Cameron');
INSERT INTO "movie" VALUES (109,'The Drone',2019,'Jordan Rubin');
INSERT INTO "movie" VALUES (109,'The Drone',2019,'Jordan Rubin');
INSERT INTO "rewiewer" VALUES (201,'Panayot Roman');
INSERT INTO "rewiewer" VALUES (202,'Panayot Roman');
INSERT INTO "rewiewer" VALUES (203,'Panayot Roman');
INSERT INTO "rewiewer" VALUES (204,'Panayot Roman');
INSERT INTO "rewiewer" VALUES (205,'Panayot Roman');
INSERT INTO "rewiewer" VALUES (206,'Panayot Roman');
INSERT INTO "rewiewer" VALUES (207,'Panayot Roman');
INSERT INTO "rewiewer" VALUES (208,'Panayot Roman');
COMMIT;
