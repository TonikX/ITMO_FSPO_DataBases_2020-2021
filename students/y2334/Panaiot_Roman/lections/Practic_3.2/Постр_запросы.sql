insert into public.client(id_client, name, number, adress) values (1, 'Ilon Mask', 8800553535, 'Mars');
insert into public.fabricator(id_fabricator, name) values (1, 'Roskosmos');
insert into public."order"(id_order, id_client, order_date, date_of_receipt, price, wish_material, status) values (1, 1, '03/05/2026', '03/07/2026', 15000000, 'titan', 'done');


select * from public."order" order by id_order
select * from public."order" order where status = 'done'
select * from public.fur_delivery where delivery_price > 100000


update public.selection_of_materials set price = 1000 where id_material = 1 and price < 900;
update public."order" set status = 'done' where date_of_receipt is not null;
update public.fur_delivery set delivery_price = 1500;


delete from public.fabricator where fabricator_id = 2;
delete from public.material where name = 'beaver';
delete from public."order" where wish_material is null;



