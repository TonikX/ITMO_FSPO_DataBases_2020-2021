INSERT INTO Reviewer
	VALUES ('5', 'John White');

INSERT INTO Movie (title, director)
	VALUES ('Title', 'Director');

UPDATE Rating
	SET ratingDate = '2020-10-10';

DELETE FROM Rating
	WHERE mID in (
	SELECT mID from Movie
		WHERE director IS NULL);

UPDATE Movie
	SET year = '2000'
	WHERE year IS NULL;

DELETE FROM Rating;
