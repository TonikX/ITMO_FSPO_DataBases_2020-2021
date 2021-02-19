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
INSERT INTO "movie" VALUES (104,'E.T.',1982,'Steven Spielberg');
INSERT INTO "movie" VALUES (105,'Titanic',1997,'James Cameron');
INSERT INTO "movie" VALUES (106,'Snow White',1937,'<null>');
INSERT INTO "movie" VALUES (107,'Avatar',2009,'James Cameron');
INSERT INTO "movie" VALUES (108,'Raiders of the Lost Ark',1981,'Steven Spielberg');
INSERT INTO "movie" VALUES (109,'The Drone',2019,'Jordan Rubin');
INSERT INTO "rewiewer" VALUES (201,'Sarah Martinez');
INSERT INTO "rewiewer" VALUES (202,'Daniel Lewis');
INSERT INTO "rewiewer" VALUES (203,'Brittany Harris');
INSERT INTO "rewiewer" VALUES (204,'Mike Anderson');
INSERT INTO "rewiewer" VALUES (205,'Chris Jackson');
INSERT INTO "rewiewer" VALUES (206,'Elizabeth Thomas');
INSERT INTO "rewiewer" VALUES (207,'James Cameron');
INSERT INTO "rewiewer" VALUES (208,'Ashley White');
INSERT INTO "rating" VALUES (201,101,1,'22.01.2011');
INSERT INTO "rating" VALUES (201,101,1,'27.01.2011');
INSERT INTO "rating" VALUES (202,106,1,'<null>');
INSERT INTO "rating" VALUES (203,103,1,'20.01.2011');
INSERT INTO "rating" VALUES (203,108,1,'12.01.2011');
INSERT INTO "rating" VALUES (203,108,1,'30.01.2011');
INSERT INTO "rating" VALUES (204,101,1,'09.01.2011');
INSERT INTO "rating" VALUES (205,103,1,'27.01.2011');
INSERT INTO "rating" VALUES (205,104,1,'22.01.2011');
INSERT INTO "rating" VALUES (205,108,1,'<null>');
INSERT INTO "rating" VALUES (206,107,1,'15.01.2011');
INSERT INTO "rating" VALUES (206,106,1,'19.01.2011');
INSERT INTO "rating" VALUES (207,107,1,'20.01.2011');
INSERT INTO "rating" VALUES (208,104,1,'02.01.2011');
INSERT INTO "rating" VALUES (209,109,5,NULL);
COMMIT;
