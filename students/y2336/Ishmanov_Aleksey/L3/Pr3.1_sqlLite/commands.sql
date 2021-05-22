INSERT INTO Reviewer
	VALUES ('5', 'John White');

INSERT INTO Movie (title, director)
	VALUES ('Title', 'Director');

UPDATE Rating
	SET ratingDate = '2020-10-10';
	
UPDATE Movie
	SET year = '2000'
	WHERE year IS NULL;

DELETE FROM Rating;

DELETE FROM Movie
	WHERE director IS NULL;

SELECT * from Movie;
