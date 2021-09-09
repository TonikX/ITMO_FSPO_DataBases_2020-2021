BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "Reviewer" (
	"rID"	INTEGER,
	"name"	TEXT,
	PRIMARY KEY("rID")
);
CREATE TABLE IF NOT EXISTS "Movie" (
	"mID"	INTEGER,
	"title"	TEXT,
	"year"	INTEGER,
	"director"	TEXT,
	PRIMARY KEY("mID")
);
CREATE TABLE IF NOT EXISTS "Rating" (
	"rID"	INTEGER,
	"mID"	INTEGER,
	"stars"	INTEGER,
	"ratingDate"	TEXT,
	FOREIGN KEY("mID") REFERENCES "Movie"("mID"),
	FOREIGN KEY("rID") REFERENCES "Reviewer"("rID")
);
INSERT INTO "Reviewer" VALUES (201,'Mark Nilsin');
INSERT INTO "Reviewer" VALUES (202,'Yulya Kar');
INSERT INTO "Reviewer" VALUES (203,'Roler Mar');
INSERT INTO "Reviewer" VALUES (204,'Parnik kag');
INSERT INTO "Reviewer" VALUES (205,'Mark Lake');
INSERT INTO "Reviewer" VALUES (206,'Lore Mcc');
INSERT INTO "Reviewer" VALUES (207,'Kir Kirson');
INSERT INTO "Reviewer" VALUES (208,'Marie Lar');
INSERT INTO "Reviewer" VALUES (209,'Mark Lasde');
INSERT INTO "Movie" VALUES (101,'Gone with the Wind',1939,'Victor Fleming');
INSERT INTO "Movie" VALUES (102,'Star Wars',1977,'George Lucas');
INSERT INTO "Movie" VALUES (103,'The Sound of Music',1965,'Robert Wise');
INSERT INTO "Movie" VALUES (104,'E.T.',1982,'Steven Spielberg');
INSERT INTO "Movie" VALUES (105,'Titanic',1997,'James Cameron');
INSERT INTO "Movie" VALUES (106,'Snow White',1937,'<null>');
INSERT INTO "Movie" VALUES (107,'Avatar',2009,'James Cameron');
INSERT INTO "Movie" VALUES (108,'Raiders of the Lost Ark',1981,'Steven Spielberg');
INSERT INTO "Movie" VALUES (109,'Harry Potter',2001,'Mark');
INSERT INTO "Rating" VALUES (201,101,2,'2011-01-22');
INSERT INTO "Rating" VALUES (201,101,4,'2011-01-27');
INSERT INTO "Rating" VALUES (202,106,4,'<null>');
INSERT INTO "Rating" VALUES (203,103,2,'2011-01-20');
INSERT INTO "Rating" VALUES (203,108,4,'2011-01-12');
INSERT INTO "Rating" VALUES (203,108,2,'2011-01-30');
INSERT INTO "Rating" VALUES (204,101,3,'2011-01-09');
INSERT INTO "Rating" VALUES (205,103,3,'2011-01-27');
INSERT INTO "Rating" VALUES (205,104,2,'2011-01-22');
INSERT INTO "Rating" VALUES (205,108,4,'<null>');
INSERT INTO "Rating" VALUES (206,107,3,'2011-01-15');
INSERT INTO "Rating" VALUES (206,106,5,'2011-01-19');
INSERT INTO "Rating" VALUES (207,107,5,'2011-01-20');
INSERT INTO "Rating" VALUES (208,104,3,'2011-01-02');
COMMIT;
