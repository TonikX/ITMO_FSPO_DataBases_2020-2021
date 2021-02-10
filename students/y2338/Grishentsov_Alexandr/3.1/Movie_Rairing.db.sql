BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "Movie" (
	"mID"	INTEGER,
	"title"	TEXT,
	"year"	INTEGER,
	"director"	TEXT,
	PRIMARY KEY("mID" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Reviewer" (
	"rID"	INTEGER,
	"name"	TEXT,
	PRIMARY KEY("rID" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Raiting" (
	"rID"	INTEGER,
	"mID"	INTEGER,
	"Stars"	INTEGER,
	"raitingDate"	INTEGER,
	FOREIGN KEY("mID") REFERENCES "Movie"("mID"),
	FOREIGN KEY("rID") REFERENCES "Reviewer"("rID")
);
INSERT INTO "Movie" VALUES (101,'Gone with the Wind',1939,'Victor Fleming');
INSERT INTO "Movie" VALUES (102,'Star Wars',1977,'George Lucas');
INSERT INTO "Movie" VALUES (103,'The Sound of Music',1965,'Robert Wise');
INSERT INTO "Movie" VALUES (104,'E.T.',0,'Steven Spielberg');
INSERT INTO "Movie" VALUES (105,'Titanic',0,'James Cameron');
INSERT INTO "Movie" VALUES (106,'Snow White',1937,NULL);
INSERT INTO "Movie" VALUES (107,'Avatar',0,'James Cameron');
INSERT INTO "Movie" VALUES (108,'Raiders of the Lost Ark',0,'Steven Spielberg');
INSERT INTO "Movie" VALUES (109,'The Lobster',0,'Yorgos Lanthimos');
INSERT INTO "Reviewer" VALUES (201,'Sarah Martinez');
INSERT INTO "Reviewer" VALUES (202,'Daniel Lewis');
INSERT INTO "Reviewer" VALUES (203,'Brittany Harris');
INSERT INTO "Reviewer" VALUES (204,'Mike Anderson');
INSERT INTO "Reviewer" VALUES (205,'Chris Jackson');
INSERT INTO "Reviewer" VALUES (206,'Elizabeth Thomas');
INSERT INTO "Reviewer" VALUES (207,'James Cameron');
INSERT INTO "Reviewer" VALUES (208,'Ashley White');
INSERT INTO "Reviewer" VALUES (209,NULL);
INSERT INTO "Raiting" VALUES (202,106,5,NULL);
INSERT INTO "Raiting" VALUES (203,103,5,'2011-01-20');
INSERT INTO "Raiting" VALUES (203,108,5,'2011-01-12');
INSERT INTO "Raiting" VALUES (203,108,5,'2011-01-30');
INSERT INTO "Raiting" VALUES (205,103,5,'2011-01-27');
INSERT INTO "Raiting" VALUES (205,104,5,'2011-01-22');
INSERT INTO "Raiting" VALUES (205,108,5,NULL);
INSERT INTO "Raiting" VALUES (206,107,5,'2011-01-15');
INSERT INTO "Raiting" VALUES (206,106,5,'2011-01-19');
INSERT INTO "Raiting" VALUES (207,107,5,'2011-01-20');
INSERT INTO "Raiting" VALUES (208,104,5,'2011-01-02');
COMMIT;
