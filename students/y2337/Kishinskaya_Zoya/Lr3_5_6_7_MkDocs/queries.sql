select id as id_chicken, weight from workplace.chicken where weight > all (select weight from workplace.breed);

select * from workplace.breed where id in (select breed_id from workplace.chicken where id in
										   (select chicken_id from workplace.stay where cell_id = 2));

select * from workplace.stay where (select extract(day from date_start)<15
									and extract(month from date_start) =4);

select * from workplace.worker where salary>=all (select salary from workplace.worker);

select distinct fio, workshop_id, num, num_row
    from
        workplace.worker,
        workplace.cell,
        workplace.serving
    where worker.fio = 'sergey'
and worker.id = serving.worker_id
and cell.id = serving.cell_id;

select fio from workplace.worker
    where id in (select workplace.serving.worker_id from workplace.serving);

select id,
	case
		when age > 1
			then 'old'
			else 'young'
		end as category_chicken
	from workplace.chicken;

UPDATE workplace.breed
SET name = 'yellstore'
WHERE name = 'yellowstore';

DELETE FROM workplace.serving
  WHERE worker_id
  	IN (
		SELECT id FROM workplace.worker
		WHERE fio ='vladimir');

select fio, salary from workplace.worker order by fio desc;

select distinct diet.name, diet.content, breed.name, breed.diet_id from workplace.diet
    left join workplace.breed
        on breed.diet_id = diet.id;

delete from workplace.worker
where id
not in (select worker_id
		from workplace.serving);

select * from workplace.worker;