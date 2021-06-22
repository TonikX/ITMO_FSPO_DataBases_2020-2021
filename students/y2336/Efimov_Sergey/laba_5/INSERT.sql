INSERT INTO public.director
	VALUES (1, 111111);
	VALUES (2, 222222);

INSERT INTO public.worker
	VALUES (1, 111111, 1000);
	VALUES (2, 333333, 2000);

INSERT INTO public.contract
	VALUES (1, 1, 1, 'off', '2021-01-01', '2021-03-03');
	VALUES (2, 2, 2, 'on', '2021-02-02', '2021-04-04');

INSERT INTO public.workshop
	VALUES (1, 1);
	VALUES (2, 2);

INSERT INTO public.servies
	VALUES (1, 1, 1, '21-01-01');
	VALUES (2, 2, 2, '21-02-02');

INSERT INTO public.cell
	VALUES (1, 111);
	VALUES (2, 222);

INSERT INTO public.list
	VALUES (1, 1, 1, 1010, 1, '2021-01-01', '2021-01-03');
	VALUES (2, 2, 2, 2020, 2, '2021-01-01', '2021-01-02');

INSERT INTO public.breed
	VALUES (1, 'redstore', 5, 1);
	VALUES (2, 'greenstore', 7, 2);

INSERT INTO public.chicken
	VALUES (1, 100, 10, 100, 1);
	VALUES (2, 200, 20, 200, 2);

INSERT INTO public.stay
	VALUES (1, 1, 1, 100);
	VALUES (2, 2, 2, 200);

INSERT INTO public.diet
	VALUES (1, 'first', '1,2,3');
	VALUES (2, 'second', '4,5,6');

INSERT INTO public.recomended_diet
	VALUES (1, 1, 1);
	VALUES (2, 2, 2);
	
select * from diet, breed, chicken;

SELECT salary FROM worker; 

select * from stay where id_cell = 1 intersect select * from stay where quantity = 100;

select * from chicken, breed order by chicken;

select id, sum(weight) as current from chicken group by id having sum(weight) < 150 order by id;

select * from chicken left join contract on id_worker = 1;

select * from diet where name_diet = 'first' intersect select * from diet where content_diet = '1,2,3';

select * from diet where name_diet = 'first';

select * from list left join recomended_diet on id_diet = 1;

select * from list where id_workshop = 1 intersect select * from list where date_install = '2021-01-01';

select * from breed left join diet on name_diet = 'first';

select id from worker union all select id from servies;

select * from servies where id_worker = 1 intersect select * from servies where id_workshop = 1;

select id, sum(weight) as current from chicken group by id having sum(weight) > 150 order by id;
