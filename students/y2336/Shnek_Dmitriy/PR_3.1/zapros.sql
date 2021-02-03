SELECT * FROM Rating WHERE stars > 3;
INSERT INTO movie (title, year, direction) VALUES ("NEW MOVIE", 2021, "Anonimus");
SELECT MIN(stars) AS SmallestStars FROM Rating;
DELETE FROM Reviewer WHERE rID = (SELECT rID FROM Reviewer ORDER BY rID DESC LIMIT 1); 