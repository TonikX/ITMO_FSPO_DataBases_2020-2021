INSERT INTO Movie VALUES(109, "The Lobster", 2015, "Yorgos Lanthimos");
INSERT INTO Reviewer VALUES(209, NULL);
UPDATE Raiting set stars = 5;
UPDATE Movie set year = 0 where year > 1980;
DELETE FROM Raiting where mID = 101;