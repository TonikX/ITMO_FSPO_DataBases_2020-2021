INSERT INTO dog VALUES (3,'Bertold',98898,FALSE,12);
INSERT INTO owner VALUES (13,'Sorokina Irina Vladimirovna');
INSERT INTO registration VALUES (70,9299,TRUE,11);

SELECT id_dog, dog_name FROM dog WHERE (contract ='TRUE' and id_dog_club = '10');
SELECT registration.id_registration, owner.id_owner, owner.owner_name FROM registration INNER JOIN owner ON registration.id_owner = owner.id_owner WHERE ( status ='TRUE');
SELECT id_registration, receipt FROM registration WHERE (receipt > 5000 and status ='TRUE');

UPDATE owner SET owner_name = 'Dobrolubov Filipp Stepanovich' WHERE owner_name = 'Dobrolubov';
UPDATE dog SET contract = 'TRUE' WHERE contract = 'FALSE';
UPDATE registration SET receipt = '3299' WHERE id_owner = '12' and status = 'TRUE';

DELETE FROM dog WHERE id_dog = '1';
DELETE FROM registration WHERE id_registration = '63' and status = 'FALSE';