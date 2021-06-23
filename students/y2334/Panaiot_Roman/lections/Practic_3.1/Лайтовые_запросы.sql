INSERT INTO movie (mID,  title, year, director) VALUES (109, 'The Drone', 2019, 'Jordan Rubin');
Insert into rating(rID, mID, stars) values (209, 109, 5);
update rating set stars = 1 where mid != 109;
update rewiewer set name = 'Panayot Roman';
delete from movie WHERE director = 'Steven Spielberg';
DELETE from rating;