BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "Movie" (
	"mId"	INTEGER,
	"title"	TEXT NOT NULL,
	"year"	INTEGER NOT NULL,
	"director"	TEXT,
	PRIMARY KEY("mId")
);
CREATE TABLE IF NOT EXISTS "Reviewer" (
	"rId"	INTEGER,
	"name"	TEXT NOT NULL,
	PRIMARY KEY("rId")
);
CREATE TABLE IF NOT EXISTS "Rating" (
	"rId"	INTEGER,
	"mId"	INTEGER,
	"stars"	INTEGER NOT NULL,
	"ratingDate"	TEXT,
	FOREIGN KEY("rId") REFERENCES "Reviewer"("rId"),
	FOREIGN KEY("mId") REFERENCES "Movie"("mId")
);
INSERT INTO "Movie" VALUES (101,'Gone with the Wind',1939,'Victor Fleming');
INSERT INTO "Movie" VALUES (102,'Star Wars',1977,'George Lucas');
INSERT INTO "Movie" VALUES (103,'The Sound of Music',1965,'Robert Wise');
INSERT INTO "Reviewer" VALUES (201,'');
INSERT INTO "Reviewer" VALUES (202,'');
INSERT INTO "Reviewer" VALUES (203,'');
INSERT INTO "Rating" VALUES (201,101,2,'2011-01-22');
INSERT INTO "Rating" VALUES (201,101,4,'2011-01-27');
INSERT INTO "Rating" VALUES (203,103,2,'2011-01-20');
COMMIT;
