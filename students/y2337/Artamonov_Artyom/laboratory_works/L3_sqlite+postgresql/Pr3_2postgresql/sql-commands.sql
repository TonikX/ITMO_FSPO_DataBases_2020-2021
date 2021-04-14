insert into project(id_project, designer_name, approving_date, price) values(default, 'Sergey Ivanov', '2013-06-01', 20000);
update project set designer_name = 'Pokras Lampas' where designer_name = 'Sergey Ivanov';
select * from project;


insert into coat values(default, (select id_project from project where designer_name = 'Pokras Lampas'));
insert into coat values(default, (select id_project from project where designer_name = 'Pokras Lampas'));
select * from coat;

insert into material values(default, 'silk', 'gold', 'Chineese silk from Beigin', 15000);
insert into material values(default, 'mink', 'dark', 'Mink from Europe', 20000);
select * from material;

insert into taylor values(default, 'Ivan', 5);
insert into taylor values(default, 'Sergey', 15);
select * from taylor;

insert into r6 values(0, (select id from material where name = 'silk'), 100, 1500000);
select * from r6;

insert into coats_order values(0, (select id_taylor from taylor where name = 'Sergey'), 3, 'Bez maski bez perchatki ne vixodit');
insert into coats_order values(1, (select id_taylor from taylor where name = 'Ivan'), 10, 'Bez maski bez perchatki ne vixodit');
select * from coats_order;

