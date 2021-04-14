select * from class inner join teacher on teacher.id = class.id_teacher;
select * from pupil where pupil.gender = 'male' and id_class = 1;
select year, lower(letter) as letter from class;
select distinct name from subject where id = (select id_subject from timetable where id_teacher = 0); 
select count(*) from teacher;
select id_pupil, avg(mark) from marks group by id_pupil having avg(mark) < 4.5;
select * from teacher where exists(select 1 from class where id_teacher = id);
select * from pupil except select * from pupil where gender = 'female';
select * from teacher right join class on class.id_teacher = teacher.id;
