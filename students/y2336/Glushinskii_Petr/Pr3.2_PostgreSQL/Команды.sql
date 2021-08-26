update sfos.place_of_delivery set delivery_address = 'Russia, 190121, Saint Petersburg, Drovyanoy pereulok, 22, litera B';
update sfos.delivery set address = 'Russia, 190121, Saint Petersburg, Drovyanoy pereulok, 22, litera B';
update sfos.place_of_delivery set person_who_take = 'Pechkin Ivan Vasilevich'

insert into sfos.products (product_id, quantity_in_stock, unit_cost, pr_name) values ('3', '10', '300', 'wrench');
insert into sfos.products_list (list_id, product_id, buyer_quantity, total_cost) values ('2', '3', '1', '300');
insert into sfos.buyers (full_name, contact_details, payment_method) values ('Teterin Sergey Ivanovich', '+78882833456', 'card');

select * from sfos.buyers;
select * from sfos.order;
select * from sfos.products;