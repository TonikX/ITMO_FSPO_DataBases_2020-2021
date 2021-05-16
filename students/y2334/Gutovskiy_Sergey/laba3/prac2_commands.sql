-- delete from clients where id > 100
-- delete from manufacturers where name = 'name100'
-- delete from orders where status = 4

-- update orders set status = 1 where status = 0
-- update mateials set type = 'gold' where type = 'bronze'
-- update clients set fio = 'new fio' where id < 1 

-- select * from clients
-- select * from manufacturers
-- select * from mateials

-- insert into materials_compilations (material_id, order_id, amount, price) values (1, 1, 10, 100)
-- insert into manufacturers (name, contacts) values ('name1', '{"email": "123@gmail.com"}'::json);
-- insert into clients (fio, address, contacts) values ('FIO1', 'address1', '{"email": "123@gmail.com"}'::json);
