INSERT INTO lr3."Animals" ("Animals_id", "Animals_sex", "Animals_dob", "Animals_type") VALUES 
(1, 'M', to_date('2020-01-20', 'YYYY-MM-DD'), 'Mamal'),
(2, 'F', to_date('2020-01-20', 'YYYY-MM-DD'), 'Bird'),
(3, 'M', to_date('2020-01-20', 'YYYY-MM-DD'), 'Reptile');

INSERT INTO lr3."Birds" ("Birds_id", "Animals_id", "Birds_flyover") VALUES (1,2,'false');

INSERT INTO lr3."Reptiles" ("Reptiles_id", "Animals_id", "Reptiles_normal_temp", "Reptiles_hyber_start", "Reptiles_hyber_end") VALUES (1,3,36.6,to_date('2002-01-21', 'YYYY-MM-DD'), to_date('2002-05-21', 'YYYY-MM-DD'));

SELECT * FROM lr3."Animals";
SELECT "Animals_id", "Animals_type" FROM lr3."Animals" WHERE "Animals_type" = 'Bird';
SELECT * FROM lr3."Animals" WHERE "Animals_sex" = 'M';

UPDATE lr3."Animals" SET "Animals_sex" = 'F' WHERE "Animals_type" = 'Mamal';
UPDATE lr3."Birds" SET "Birds_flyover" = true, "Birds_flyover_id" = 1, "Birds_flyover_out" =  to_date('2020-12-22', 'YYYY-MM-DD'), "Birds_flyover_back" = to_date('2020-12-23', 'YYYY-MM-DD') WHERE "Birds_id" = 1;
UPDATE lr3."Reptiles" SET "Reptiles_normal_temp" = 40 WHERE "Reptiles_normal_temp" = 36.6;

DELETE FROM lr3."Animals" WHERE "Animals_type" = 'Mamal';
