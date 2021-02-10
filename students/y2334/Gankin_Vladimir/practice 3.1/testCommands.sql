INSERT INTO Movie (mID, title, year, director) VALUES (105, "Titanic", 1979, "James Cameron");
INSERT INTO Movie (title, year) VALUES ("Snow White", 1937);
UPDATE Rating SET stars=stars+1;
UPDATE Rating SET ratingDate="2021-02-10" WHERE stars=4;
DELETE FROM Movie;
DELETE FROM Movie WHERE mID>104;

