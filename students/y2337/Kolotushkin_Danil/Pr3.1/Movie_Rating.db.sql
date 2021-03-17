BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "Reviewer" (
	"rID"	INTEGER NOT NULL UNIQUE,
	"name"	TEXT NOT NULL,
	PRIMARY KEY("rID" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Movie" (
	"mID"	INTEGER NOT NULL UNIQUE,
	"title"	TEXT NOT NULL,
	"year"	DATE,
	"director"	TEXT NOT NULL,
	PRIMARY KEY("mID" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Ratings" (
	"rID"	INTEGER NOT NULL,
	"mID"	INTEGER NOT NULL,
	"stars"	INTEGER NOT NULL,
	"ratingDate"	DATE NOT NULL,
	FOREIGN KEY("mID") REFERENCES "Movie"("mID"),
	FOREIGN KEY("rID") REFERENCES "Reviewer"("rID"),
	PRIMARY KEY("rID","mID")
);
INSERT INTO "Reviewer" VALUES (1,'Sarah Martinez');
INSERT INTO "Reviewer" VALUES (2,'Daniel Lewis');
INSERT INTO "Reviewer" VALUES (3,'Jhon North');
INSERT INTO "Movie" VALUES (1,'Gone with The Wind',1939,'Victor Fleming');
INSERT INTO "Movie" VALUES (2,'Star Wars',1977,'George Lucas');
INSERT INTO "Movie" VALUES (3,'The Sound of Music',1965,'Robert Wise');
INSERT INTO "Movie" VALUES (4,'E.T.',1982,'Steven Spielberg');
INSERT INTO "Movie" VALUES (5,'Interstellar',2014,'Christopher Nolan');
INSERT INTO "Movie" VALUES (6,'Some title',NULL,'Director?');
COMMIT;
