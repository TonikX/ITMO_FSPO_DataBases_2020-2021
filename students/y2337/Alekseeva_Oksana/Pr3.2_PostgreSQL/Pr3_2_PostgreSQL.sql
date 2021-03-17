Insert into client values(1, 'Alekseeva', 743874, 'prospect Nayki'), (2, 'Mikhailova', 3425234, 'Cvetlanovcki'), (3, 'Fedorova', 87384664, 'prospect Nayki'), (4, 'Evseev', 39402394, 'prospect veteranov');
Insert into warehouse values(1,'prospect Nayki', 'meat, shoes, clothes');
Insert into warehouse values(2,'Cvetlanovki', 'clothes');
Insert into product values(1,'apple', 287387364, 150, true);
Insert into order_ values(1, '2020-10-12', 'delivery', 2);
Insert into order_list values(312227,2, 3000, 'card', 1, 1, 2);
Insert into deliveryman values(1, 'Denisov Andrey', 895332479);
Insert into order_delivery values('2020-02-03', '17:00', 2, 1, 1);

SELECT * from order_;
SELECT * from client;
SELECT * from deliveryman;
SELECT * from order_delivery;
SELECT * from product;
SELECT * from warehouse;
SELECT * from order_list;

DELETE FROM client WHERE fullname_client = 'Fedorova';
UPDATE client set phone_number = 374623 where fullname_client = 'Alekseeva';