SELECT id_newspaper, name, price, full_name_editor, publication_index, id_production, 
        quantity FROM newspaper, production  WHERE full_name_editor = 'Danilin Artem' order by price;

SELECT * FROM postoffice WHERE address = 'SPb' AND id_postoffice > 1;

SELECT id_storage, newspaper_id, circulation_id, typography_id, production_id, quantity, address, number FROM 
        storage INNER JOIN postoffice ON address IN (SELECT address from postoffice WHERE address = 'Moskva');

SELECT id_newspaper, LOWER(full_name_editor) AS FIO, publication_index, price FROM newspaper;

SELECT id_postoffice, number, LPAD(address, 30, '-')  AS address FROM postoffice;

SELECT id_production, newspaper_id, circulation_id, typography_id, quantity FROM production WHERE
        circulation_id IN (SELECT id_circulation FROM circulation);

SELECT id_circulation, circulation.newspaper_id, circulation.quantity, typography_id FROM circulation RIGHT JOIN
        production ON id_circulation = circulation_id WHERE circulation.quantity = '145' 
               AND typography_id = SOME(SELECT id_typography FROM typography);

SELECT AVG(price) FROM newspaper;

SELECT MAX(price) AS Max_price FROM newspaper GROUP BY id_newspaper HAVING full_name_editor in ('Danilin Artem');

SELECT * FROM newspaper GROUP BY id_newspaper HAVING SUM (price)> 10000;

SELECT id_production, newspaper_id, quantity FROM production
 	WHERE newspaper_id = SOME(SELECT id_newspaper FROM newspaper);

SELECT id_typography, name, address, id_storage, id_production, production.quantity 
        FROM typography, production, storage WHERE id_storage = id_production;

SELECT full_name_editor AS name, name, price, id_circulation, quantity
        FROM newspaper INNER JOIN circulation ON newspaper_id = id_newspaper;

SELECT full_name_editor AS name, name, price, id_storage, quantity
        FROM newspaper INNER JOIN storage ON newspaper_id = id_newspaper;