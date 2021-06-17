
--
-- Requst №1
-- Вывести информацию о названии газеты и её стоимости
--

select concat (title_newspaper, ', ',  cost_newspaper, '₽') 
from newspaper;



--
-- Requst №2
-- Вывести длину названий типографий
--

select name_printing_office, length(name_printing_office) 
from printing_office;



--
-- Requst №3
-- Вывести информацию о газетах, которые не печатались в почтовых отделениях с id = 2
--

select * from newspaper 
except select * from newspaper 
where id_post_office_fk = 2
order by id_newspaper;



--
-- Requst №4
-- Вывести id и индексы выпусков, которые печатались в типографии qwerty, но не газеты “Forbes”
--

select id_release, publication_index_release
from release
where id_printing_office_fk 
in (select id_printing_office 
    from printing_office 
    where name_printing_office = 'qwerty')
and id_newspaper_fk 
not in (select id_newspaper 
        from newspaper 
        where title_newspaper = 'Forbes');



--
-- Requst №5
-- Вывести разницу между самой дорогой и дешевой газетой
--

select (max(cost_newspaper) - min(cost_newspaper)) as difference
from newspaper;



--
-- Requst №6
-- Посчитать наценку дистрибьютера газеты “SpeedInfo”
--

select newspaper.cost_newspaper as old, cost_copy as new, cost_copy - newspaper.cost_newspaper 
as result from release
inner join newspaper on
release.id_newspaper_fk = id_newspaper and title_newspaper = 'SpeedInfo';



--
-- Requst №7
-- Вывести индексы выпусков, которые были реализованы в 2021 году
--

select id_release, date_of_issue_release, publication_index_release 
from release 
where (select extract(year from date_of_issue_release)) = '2021';



--
-- Requst №8
-- Вывести дату релизов и стоимость экземпляра газеты “Forbes”
--

select date_of_issue_release, cost_copy
from release 
where id_newspaper_fk = any (select id_newspaper 
                     from newspaper 
                 where title_newspaper = 'Forbes');



--
-- Requst №9
-- Вывести идентификатор распределения газет, которые выпустили тираж газет > 120 000
--

select id_newspaper_distribution, number_of_copies 
from newspaper_distribution 
group by id_newspaper_distribution 
having number_of_copies > 120000
order by id_newspaper_distribution;



--
-- Requst №10
-- Вывести индекс распределения газет с самой высокой стоимостью экземпляра
--

select publication_index_release, cost_copy 
from release c1
where not exists (select * from release c2 
          where c2.cost_copy > c1.cost_copy);



--
-- Requst №11
-- Вывести информацию о типографиях и распределении газет
--

select * from newspaper_distribution 
left join printing_office 
on id_printing_office = newspaper_distribution.id_printing_office_fk;



--
-- Requst №12
-- Вывести основную информацию о напечатанных и реализованных газетах
--

select newspaper.title_newspaper, release.date_of_issue_release, release.cost_copy, printing_office.name_printing_office
from newspaper 
join printing_office 
on newspaper.id_newspaper = printing_office.id_newspaper_fk
join release 
on printing_office.id_printing_office = release.id_printing_office_fk
order by newspaper;



--
-- Requst №13
-- Вывести информацию о газете со стоимостью 12 и датой выпуска 2021-03-16
--

select * from newspaper 
where cost_newspaper = 12 and date_of_issue = '2021-03-16';



--
-- Requst №14
-- Вывести информацию о редакции, в которой фамилия редактора начинается на букву P
--

select * from editorial_office where name LIKE 'P%';