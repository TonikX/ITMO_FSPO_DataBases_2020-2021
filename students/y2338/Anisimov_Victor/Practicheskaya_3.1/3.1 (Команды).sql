INSERT INTO "main"."Rating"
("rID", "mID", "stars", "ratingDate")
VALUES (208, 104, 3, 2011-01-02);

INSERT INTO "main"."Rating"
("rID", "mID", "stars", "ratingDate")
VALUES (208, 104, 3, NULL);

DELETE FROM "main"."Rating"
WHERE (stars = 3) and (ratingDate = '2011-01-02');