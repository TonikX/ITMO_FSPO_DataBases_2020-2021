SELECT full_name, contact_details, experience, id_inhabitation, check_in_date, check_out_date, client_id, room_id FROM administration, inhabitation WHERE experience > 2 ORDER BY experience;
SELECT * from client where city = 'SPb' and id_client > 2;
SELECT * FROM cleaning Where DAYOFMONTH(SELECT cleaning_day from cleaning where cleaning_day = '05.06.2009') = DAYOFMONTH(SELECT cleaning_day from cleaning where cleaning_day = '05.08.2001');
SELECT id_admin, LOWER(full_name) as FIO, contact_details, experience from administration;
SELECT id_client, UPPER(full_name) as FIO, LPAD (city, 20, '-'), passport_id from client;
SELECT id_employee, full_name, post from employee where id_employee IN (SELECT employee_id from employment_contract);
SELECT id_admin, full_name, experience, client_id, check_in_date, check_out_date FROM administration RIGHT JOIN inhabitation ON admin_id = id_admin
WHERE experience = '8 years' AND full_name = SOME(SELECT full_name FROM inhabitation);
SELECT AVG(coat_of_living) FROM room where floor=1;
SELECT MAX(coat_of_living) as Max_cost_of_living FROM room GROUP BY id_room HAVING room_type in ('lux');
SELECT * from room GROUP by floor HAVING SUM(coat_of_living) > 10000;
SELECT DISTINCT id_client, full_name, passport_id FROM client
WHERE city = 'SPb' AND full_name = ALL(SELECT full_name FROM inhabitation);
SELECT id_client, client.full_name, city, id_inhabitation, check_in_date, check_out_date, id_admin, administration.full_name, experience from client, inhabitation, administration where admin_id = id_admin;
SELECT full_name AS name, id_inhabitation, check_in_date, check_out_date, room_id, admin_id from inhabitation INNER JOIN client ON id_client = client_id;
SELECT full_name AS name, id_inhabitation, check_in_date, check_out_date, room_id, admin_id from inhabitation LEFT JOIN client ON id_client = client_id;