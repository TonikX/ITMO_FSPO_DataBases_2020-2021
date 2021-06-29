select * from laba3.cabinets, laba3.clients

select * from laba3.preiscurant inner join laba3.calculation_cost on laba3.calculation_cost.calculation_cost_preiscurant=laba3.preiscurant.preiscurant_id


select * from laba3.preiscurant where preiscurant_cost>'1200' and preiscurant_id>1

SELECT NOW ()

SELECT current_date

select * from laba3.doctors where (select current_date)>laba3.doctors.doctor_birthday

select distinct on (doctor_specializacion) doctor_specializacion, doctor_gender from laba3.doctors order by doctor_specializacion, doctor_gender

select count(preiscurant_cost) from laba3.preiscurant

select count(doctor_fio) from laba3.schedule_doctor
inner join laba3.doctors on schedule_doctor_doctor=laba3.doctors.doctor_id
inner join laba3.schedule on laba3.schedule.schedule_id=schedule_doctor_schedule
where schedule_status = 'true'

select preiscurant_id from laba3.preiscurant union all select cabinet_id from laba3.cabinets

select * from laba3.schedule where schedule_id = any (select schedule_doctor_schedule from laba3.schedule_doctor)

select * from laba3.schedule where schedule_id in (select schedule_doctor_schedule from laba3.schedule_doctor)

select * from laba3.schedule where exists (select schedule_doctor_schedule from laba3.schedule_doctor)

select max(preiscurant_cost) from laba3.preiscurant
group by preiscurant_id having max(preiscurant_cost)<'11500'

select * from laba3.schedule where schedule_id = some (select schedule_doctor_schedule from laba3.schedule_doctor)