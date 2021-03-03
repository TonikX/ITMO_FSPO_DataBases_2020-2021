-- вставку полной и неполной записи в таблицу
INSERT INTO movies (id, title, year, director) VALUES(6, "Movie", 2002, "Me");
INSERT INTO movies (title, year) VALUES("Movie 2", 2005);

-- редактирование нескольких полей записи с условием и без
UPDATE reviewers SET name = "noname1";
UPDATE reviewers SET name = "noname2" WHERE id > 4;

-- удаление записей с условием и без
DELETE FROM ratings WHERE stars = 4;
DELETE FROM ratings;