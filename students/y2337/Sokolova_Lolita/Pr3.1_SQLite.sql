BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "Reviewer" (
	"rID"	INTEGER,
	"name"	TEXT,
	PRIMARY KEY("rID" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Movie" (
	"mID"	INTEGER,
	"title"	TEXT,
	"year"	INTEGER,
	"director"	TEXT,
	PRIMARY KEY("mID" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Rating" (
	"rID"	INTEGER,
	"mID"	INTEGER,
	"stars"	INTEGER,
	"rating_date"	TEXT,
	FOREIGN KEY("mID") REFERENCES "Movie"("mID"),
	FOREIGN KEY("rID") REFERENCES "Reviewer"("rID")
);
INSERT INTO "Reviewer" ("rID","name") VALUES (1,'Sarah Martinez'),
 (2,'Daniel Lewis'),
 (3,'Brittany Harris'),
 (4,'Mike Anderson'),
 (5,'Chris Jackson'),
 (6,'Elizabeth Thomas'),
 (7,'James Cameron'),
 (8,'Ashley White');
INSERT INTO "Movie" ("mID","title","year","director") VALUES (2,'Gone with the Wind',1939,'Victor Fleming'),
 (3,'Star Wars',1977,'George Lucas'),
 (4,'The Sound of Music',1965,'Robert Wise'),
 (5,'E.T.',1982,'Steven Spielber'),
 (6,'Titanic',1997,'James Cameron'),
 (7,'Snow White',1937,NULL),
 (8,'Avatar',2009,'James Cameron'),
 (9,'Raiders of the Lost Ark',1981,'Steven Spielberg'),
 (10,'Harry Potter',2001,NULL),
 (11,'Tenet',2020,'Cristopher Nolan');
INSERT INTO "Rating" ("rID","mID","stars","rating_date") VALUES (1,2,4,'2011-01-20'),
 (1,2,5,'2011-01-20'),
 (3,4,4,'2011-01-20'),
 (3,9,5,'2011-01-20'),
 (3,9,4,'2011-01-20'),
 (4,2,5,'2011-01-20'),
 (5,4,5,'2011-01-20'),
 (5,5,4,'2011-01-20'),
 (6,8,5,'2011-01-20'),
 (6,7,5,'2011-01-20'),
 (7,8,5,'2011-01-20'),
 (8,5,5,'2011-01-20'),
 (2,7,5,'2011-01-20'),
 (5,9,5,'2011-01-20');
COMMIT;
