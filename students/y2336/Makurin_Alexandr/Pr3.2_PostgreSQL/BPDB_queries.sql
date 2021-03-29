INSERT INTO "OnlineMarket"."Carriers" (id, "Full name", "Phone number") VALUES
	(0, 'Test Carrier 01', '+7(999)999-99-99'),
	(1, 'Test Carrier 02', '+7(999)999-99-99');
INSERT INTO "OnlineMarket"."Warehouses" VALUES
	(2, 'Test Warehouse 03'),
	(3, 'Test Warehouse 04');
INSERT INTO "OnlineMarket"."ProductsInOrders"(
	order_id, product_id)
	VALUES (0, 0), (0, 1);

SELECT * FROM "OnlineMarket"."Carriers";
SELECT * FROM "OnlineMarket"."Clients";
SELECT * FROM "OnlineMarket"."Products";

UPDATE "OnlineMarket"."OrderDeliveries" SET order_id=1 WHERE carrier_id=0;
UPDATE "OnlineMarket"."Warehouses"
    SET "Address"='Updated Address of warehouse with id 1' 
    WHERE id=1;
UPDATE "OnlineMarket"."OrderDeliveries" SET order_id=3 WHERE carrier_id=0;

DELETE FROM "OnlineMarket"."Warehouses" WHERE id = 2;
DELETE FROM "OnlineMarket"."Warehouses" WHERE id = 1;
DELETE FROM "OnlineMarket"."Warehouses" WHERE id = 0;
