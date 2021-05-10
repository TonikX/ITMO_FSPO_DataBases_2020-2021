insert into Movie (mID, title, year, director) values
   (101, "Gone with the Wind", 1939, "Victor Fleming"),
   (102, "Star Wars", 1977, "Gerorge Lalala"),
   (103, "The sound of music", 1965, "Robert Wiwiwi");

insert into Reviewer (rID, name) values 
   (201, "Sarah Martinez"),
   (202, "Daniel Lewis"),
   (203, "Brittany Harris");

insert into Rating (rID, mID, stars, ratingDate) values 
   (201, 101, 2, "2011-01-22"),
   (201, 102, 4, "2011-01-27"),
   (202, 201, 3, NULL);

