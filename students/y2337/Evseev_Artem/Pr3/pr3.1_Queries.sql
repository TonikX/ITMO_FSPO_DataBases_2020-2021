INSERT INTO Movie VALUES (109, "The Dark Knight", 2008, "Christopher Nolan");
INSERT INTO Rating (rID, mID, stars) VALUES (207, 109, 10);
UPDATE Rating SET stars=9 WHERE mID=101;
UPDATE Movie SET year=2020, director="Robert Weide";
DELETE FROM Rating WHERE ratingDate="2011-01-15";