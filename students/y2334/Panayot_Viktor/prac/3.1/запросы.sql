INSERT INTO movie (mID,  title, year, director) VALUES (109, 'Seven', 1995, 'David Fincher');
Insert into rating(rID, mID, stars) values (109, 209, 5);
update rating set stars = 1 where mid != 109;
update rewiewer set name = 'Panayot Viktor';
delete from movie WHERE director = 'James Cameron';
DELETE from rewiewer;