select * from "prac3.1_schema".courier;
insert into "prac3.1_schema".courier values (2, '{L,K,M}', '{1,0,1,1,1,1,0}', '{8,8,0,0,5,5,5,3,5,3,6}');
select * from "prac3.1_schema".courier;
update "prac3.1_schema".courier set courier_fio = '{R,K,M}' where courier_id = 2;
select * from "prac3.1_schema".courier;
delete from "prac3.1_schema".courier where courier_id = 2;
select * from "prac3.1_schema".courier;