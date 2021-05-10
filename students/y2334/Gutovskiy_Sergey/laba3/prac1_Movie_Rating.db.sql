BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "reviewers" (
	"id"	INTEGER NOT NULL,
	"name"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "movies" (
	"id"	INTEGER NOT NULL,
	"title"	TEXT NOT NULL,
	"year"	INTEGER NOT NULL CHECK("year" > 1930),
	"director"	TEXT DEFAULT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "ratings" (
	"id"	INTEGER NOT NULL,
	"reviewer_id"	INTEGER NOT NULL,
	"movie_id"	INTEGER NOT NULL,
	"stars"	INTEGER NOT NULL CHECK("stars" > 0 AND "stars" <= 5),
	"date"	TEXT DEFAULT NULL,
	FOREIGN KEY("reviewer_id") REFERENCES "reviewers"("id") ON DELETE CASCADE,
	FOREIGN KEY("movie_id") REFERENCES "movies"("id") ON DELETE CASCADE,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "reviewers" VALUES (1,'noname1');
INSERT INTO "reviewers" VALUES (2,'noname1');
INSERT INTO "reviewers" VALUES (3,'noname1');
INSERT INTO "reviewers" VALUES (4,'noname1');
INSERT INTO "reviewers" VALUES (5,'noname2');
INSERT INTO "reviewers" VALUES (6,'noname2');
INSERT INTO "reviewers" VALUES (7,'noname2');
INSERT INTO "reviewers" VALUES (8,'noname2');
INSERT INTO "movies" VALUES (1,'Gone with the Wind',1939,'Victor Fleming');
INSERT INTO "movies" VALUES (2,'Star Wars',1977,'George Lucas');
INSERT INTO "movies" VALUES (3,'The Sound of Music',1965,'Robert Wise');
INSERT INTO "movies" VALUES (4,'E.T.',1982,NULL);
INSERT INTO "movies" VALUES (5,'Titanic',1997,'James Cameron');
INSERT INTO "movies" VALUES (6,'Movie',2002,'Me');
INSERT INTO "movies" VALUES (7,'Movie 2',2005,NULL);
INSERT INTO "ratings" VALUES (1,1,1,5,NULL);
INSERT INTO "ratings" VALUES (4,2,2,3,'2021-01-22');
INSERT INTO "ratings" VALUES (5,1,5,2,'2011-06-22');
COMMIT;
