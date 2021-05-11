insert into "testSchema"."Customer" VALUES (1, 'Titova Maryana', 'Pesochnaya nab.', '95895860', 'all');
insert into "testSchema"."Delivery" VALUES (1, 'Pesochnaya nab., 14', '2021-03-01', 'Titova M.', '98549584', 1);
insert into "testSchema"."Goods" VALUES (1, 15, 56895, 'moloko'), (2, 456, 454695, 'water'), (3, 5, 4565, 'bread');
insert into "testSchema"."Manager" VALUES (1, 'Petrov A.', '9586958695');
insert into "testSchema"."Order" VALUES (1, 'fvfjvfjn', 234354, 'Nevskij pr.', '2020-08-12', 1, 1);
insert into "testSchema"."Order_list" VALUES (1, 1234, 1, 1);
insert into "testSchema"."Fulfillment_order" VALUES (1, 'Ready', 'Ligovskij pr.', '2020-04-20', '985477884', 'njnjf', 1, 1, 1, 1);

SELECT * from "testSchema"."Courier";
SELECT * from "testSchema"."Delivery";
SELECT * from "testSchema"."Goods";

update "testSchema"."Delivery" set "Recipient" = 'Titova Maryana' where "id_Delivery" = 1;
update "testSchema"."Manager" set "Name_manager" = 'Petrov Alexey' where "id_Manager" = 1;

DELETE FROM "testSchema"."Goods" WHERE "Name_goods" = 'bread';
DELETE FROM "testSchema"."Goods" WHERE "id_Goods" = 2;
