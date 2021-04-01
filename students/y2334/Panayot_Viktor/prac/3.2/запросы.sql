insert into int_shop_scheme.warehouse (id_warehouse, warehouse_adress) values (2, 'Saint-Petersburg, 15A Moskovskoe Shosse');
insert into int_shop_scheme."Client" (client_id, client_nickname, client_adress) values (2, 'RamanPan', 'Saint Petersburg, Pesochnaya nab. 14');
insert into int_shop_scheme.int_shop (id_int_shop, name_int_shop) values (1, 'Novichok');


select * from int_shop_scheme.product where product_id = 3;
select * from int_shop_scheme."Client" where client_id = 1;
select * from int_shop_scheme.delivery where delivery_id = 4;


update int_shop_scheme.basket set full_price = 500 where id_basket = 2;
update int_shop_scheme.delivery set delivery_date = '10/02/2021' where delivery_id = 2;
update int_shop_scheme.product set product_price = 500 where product_id = 1;


delete from int_shop_scheme.product where product_id = 3;
delete from int_shop_scheme.delivery where delivery_id = 4;
delete from int_shop_scheme.int_shop where order_id = 4;
