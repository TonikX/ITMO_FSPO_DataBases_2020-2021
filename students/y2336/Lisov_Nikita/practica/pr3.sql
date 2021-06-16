insert into pr3.pattern ( pattern_cost,  date_development) values ( '123', '2002-05-08');
select * from pr3.pattern;
delete from pr3.pattern where pattern_cost='123';

insert into pr3.order_material ( order_material_cost) values ( '123');
select * from pr3.order_material ;
update pr3.order_material set order_material_cost='321' where order_material_cost='123';
select * from pr3.order_material ;

insert into pr3.delivery ( delivery_discription, delivery_cost ) values ( 'discription', '123');
select * from pr3.delivery;
delete from pr3.delivery ;
select * from pr3.delivery;