SELECT * FROM practice.client;
SELECT * FROM practice.invoice;
SELECT * FROM practice.product;

INSERT INTO practice.product (product_id, product_name, cost, weight_kg, dimensions) 
VALUES (4, 'ruby', 99999, 1, '10x10');
INSERT INTO practice."order"(order_id, status, order_date, order_client_id) 
VALUES (4, 'cancelled', '02.2.2021', 3);
INSERT INTO practice.client(client_id, client_full_name, adress, telphone_number) 
VALUES (4, 'Random Dodik', 'Poselok gorodskogo tipa', 54321);

DELETE FROM practice.client WHERE client_full_name='Jason Stethem';
DELETE FROM practice.product WHERE product_id=4;
DELETE FROM practice."order" WHERE order_id=4;