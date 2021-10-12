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
CREATE TABLE IF NOT EXISTS "Rating" (
	"rID"	INTEGER,
	"mID"	INTEGER,
	"stars"	INTEGER,
	"ratingDate"	TEXT,
	FOREIGN KEY("mID") REFERENCES "Movie",
	FOREIGN KEY("rID") REFERENCES "Reviewer"
);
INSERT INTO "Movie" VALUES (101,'Gone with the Wind',1999,'Victor Fleming');
INSERT INTO "Movie" VALUES (102,'Star Wars',1999,'George Lucas');
INSERT INTO "Movie" VALUES (103,'The Sound of Music',1999,'Robert Wise');
INSERT INTO "Movie" VALUES (104,'E.T.',1999,'Steven Spielberg');
INSERT INTO "Movie" VALUES (105,'Titanic',1999,'James Cameron');
INSERT INTO "Movie" VALUES (106,'Snow White',1999,NULL);
INSERT INTO "Movie" VALUES (107,'Avatar',1999,'James Cameron');
INSERT INTO "Movie" VALUES (108,'Raiders of the Lost Ark',1999,'Steven Spielberg');
INSERT INTO "Movie" VALUES (109,'History',1999,'James Cameron');
INSERT INTO "Movie" VALUES (110,NULL,1999,'George Lucas');
INSERT INTO "Reviewer" VALUES (201,'Sarah Martinez');
INSERT INTO "Reviewer" VALUES (203,'Brittany Harris');
INSERT INTO "Reviewer" VALUES (204,'Mike Anderson');
INSERT INTO "Reviewer" VALUES (205,'Chris Jackson');
INSERT INTO "Reviewer" VALUES (206,'Elizabeth Thomas');
INSERT INTO "Reviewer" VALUES (207,'James Cameron');
INSERT INTO "Reviewer" VALUES (208,'Ashley White');
COMMIT;
