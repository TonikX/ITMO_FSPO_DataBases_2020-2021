select *from shop.product where (shop.product.product_price = 10);
 select *from shop.courier where(shop.courier.id_courier=1);
 select *from shop.order where(shop.order.order_status='in proccessing');

INSERT INTO shop.product values (1,'markers',55,10,'in stock');
insert into shop.courier values (1, 799907, 'Mike'), (2,89340,'Ivan'), (3,89340,'Mark');
insert into shop.order values(1,  '2001-10-05', 'in processing' );

 update shop.product set product_price = 20;
 update  shop.order set order_status = 'confirmation' where order_status= 'in proccessing';
 update shop.courier  set courier_name = 'Mark' where id_courier = 2;

 delete from shop.product where  id_product = 1;
 delete from shop.product where product_name = 'markers';
 delete from shop.order where id_order = '1';