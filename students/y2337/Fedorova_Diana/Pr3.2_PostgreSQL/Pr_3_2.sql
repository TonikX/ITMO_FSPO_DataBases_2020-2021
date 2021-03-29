 INSERT INTO "online store"."Product" values (1,'markers',55,'for drawing',10);
 INSERT INTO "online store"."Client" values (11,'Ilya Plavnck','Pesochnaya embankment 14 house 5',89325263666);
 INSERT INTO "online store"."Employee" values (1,'Maria Dmitrienko',89340300412,'order manager, courier');


 select *from "online store"."Product" where ("online store"."Product"."Characteristics" = 'for drawing');
 select "online store"."composition_of_ordering"."order_status","online store"."composition_of_ordering"."List_of_product" from "online store"."composition_of_ordering" where ("online store"."composition_of_ordering"."order_status"='delivery');
 select "online store"."Order"."List_of_product", "online store"."delivery_of_the_order"."Date_of_reciept","online store"."delivery_of_the_order"."Time_of_reciept" from "online store"."delivery_of_the_order","online store"."Order" where "online store"."Order"."ID_order"="online store"."delivery_of_the_order"."ID_order";
 
 
 update "online store"."Product" set "Stock_balance" = 5 
 update  "online store"."composition_of_ordering" set "order_status" = 'confirmation' where "List_of_product" = 'BULLET JOURNAL';
 update "online store"."Client"  set "FIO" = 'Elena  Gilbert' where "contact" = '89340300488';


 delete from "online store"."composition_of_ordering" where  "ID_product" = '22';
 delete from "online store"."Product" where "Name_product" = 'book';
 delete from "online store"."delivery_of_the_order" where "ID_order" = '143' and "ID_emploee"= '11';