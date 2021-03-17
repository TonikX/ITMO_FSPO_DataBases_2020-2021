INSERT into Rating VALUES (201, 101, 4, "2011-01-23"), (201, 101, 4, NULL);
UPDATE table Rating set rId=202 where ratingDate="2011-01-23";
UPDATE table Rating set rId=202;
DELETE from table Rating where ratingDate="2011-01-23";
DELETE from table Rating;