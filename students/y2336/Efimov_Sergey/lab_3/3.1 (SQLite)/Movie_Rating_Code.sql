INSERT INTO Movie (mID, title, year) VALUES (227, "Middle-earth", 2000);
INSERT INTO Reviewer (rID, name) VALUES (300, "Hernado Martinez");
UPDATE Movie SET year = 2077;
UPDATE Movie SET director = "PogChamp" WHERE director = "Steven Spielberg";
DELETE FROM Rating;
DELETE FROM Movie WHERE director = "James Cameron";