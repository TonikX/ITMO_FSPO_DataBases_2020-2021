SELECT * from hotel_number
WHERE hotel_number.cost < 1500
AND hotel_number.floor < 2;

SELECT hotel_number.id, hotel_number.type, hotel_number.cost,
hotel_number.floor, hotel_number.status, clean.date AS clean_date, 
clean.time AS clean_time
FROM clean
JOIN hotel_number 
ON clean.hotel_number_id = hotel_number.id
WHERE clean.time > '10:00'
AND clean.date > '2021-02-21';

SELECT clean.time AS clean_time, clean.date AS clean_date, 
check_in.date AS check_in_date, klient.name
FROM public.clean
JOIN public.check_in
ON clean.hotel_number_id = check_in.hotel_number_id
JOIN public.klient
ON check_in.klient_id = klient.id; 

SELECT hotel_number.id AS hotel_room, hotel_number.cost , check_in.date AS check_in_date
FROM hotel_number
JOIN check_in
ON hotel_number.id = check_in.hotel_number_id
ORDER BY check_in_date;

SELECT hotel_number.id, check_in.date
FROM hotel_number
JOIN check_in
ON hotel_number.id = check_in.hotel_number_id
WHERE hotel_number.id = 2;

SELECT EXTRACT(MONTH FROM now()) - EXTRACT(MONTH FROM check_in.date) AS months
FROM hotel_number
JOIN check_in
ON hotel_number.id = check_in.hotel_number_id
WHERE hotel_number.status = 1;

SELECT count(*) AS value_of_klient 
FROM check_in
WHERE EXTRACT(YEAR from date) = EXTRACT(YEAR FROM NOW()); 

SELECT id, lower(name) 
FROM klient;

SELECT cleaner.id, cleaner.name 
FROM cleaner 
JOIN clean
ON cleaner.id = clean.cleaner_id
WHERE clean.hotel_number_id = 1;

SELECT name, id 
FROM cleaner 
WHERE id IN (
	SELECT cleaner_id 
	FROM  clean 
	WHERE administrator_id = 1 
		AND hotel_number_id = 2
	);