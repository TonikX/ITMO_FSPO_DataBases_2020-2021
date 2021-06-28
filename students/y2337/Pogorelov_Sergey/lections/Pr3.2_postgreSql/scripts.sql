--INSERT
INSERT INTO "testSchema"."Material"(
	"Name", "Character", "Cost")
	VALUES ('Cloth', 'Some desc', '300');

INSERT INTO "testSchema"."Tailor"(
	"Name", "Exp")
	VALUES ('Genry', '8');

INSERT INTO "testSchema"."Project"(
	"Designer_name", "Approval_date", "Cost")
	VALUES ('Misha', '1970-01-02', '3500');


--DELETE
DELETE FROM "testSchema"."Material"
	WHERE "Name" = 'Mel';

DELETE FROM "testSchema"."Tailor"
	WHERE "Name" = 'Genry';

DELETE FROM "testSchema"."Project"
	WHERE "Cost" = '3500';


--SELECT
SELECT id_material, "Name"
	FROM "testSchema"."Material"
	WHERE "Cost" > '300';

SELECT "Size", "Cost", "Project", "Material"
	FROM "testSchema"."Provision";

SELECT "Amount", "Project", "Tailor"
	FROM "testSchema"."Order"
	WHERE "Amount" > '20';


--UPDATE
UPDATE "testSchema"."Tailor"
	SET "Name" = 'BAN'
	WHERE "Exp" < '5';

UPDATE "testSchema"."Order"
	SET "Tailor" = '1'
	WHERE "Project" in ('1', '2');

UPDATE "testSchema"."Provision"
	SET "Cost" = "Cost" - '50'
	WHERE "Size" > '10';