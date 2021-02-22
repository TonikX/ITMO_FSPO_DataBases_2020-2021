INSERT INTO Movie VALUES(109, "History", 1988, "James Cameron");
INSERT INTO Movie VALUES(110, NULL, NULL, "George Lucas");
UPDATE Movie set year=2000;
UPDATE Movie set year=1999 where year=2000;
DELETE FROM Rating where mID = 106;
DELETE FROM Rating;