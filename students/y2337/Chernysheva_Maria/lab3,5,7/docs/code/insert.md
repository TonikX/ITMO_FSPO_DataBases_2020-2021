## Insert

#### Заполнение таблицы "Служащий":
```
    insert into public."Clerk" (id_clerk, full_name, position) values (1, 'Иванов Иван Иванович', 'Уборщик');
    insert into public."Clerk" (id_clerk, full_name, position) values (2, 'Петров Иван Иванович', 'Уборщик');
    insert into public."Clerk" (id_clerk, full_name, position) values (3, 'Морской Виталий Андреевич', 'Уборщик');
    insert into public."Clerk" (id_clerk, full_name, position) values (4, 'Морской Виталий Андреевич', 'Уборщик');
    insert into public."Clerk" (id_clerk, full_name, position) values (5, 'Есипов Андрей Валерьевич', 'Консьерж');
    insert into public."Clerk" (id_clerk, full_name, position) values (6, 'Лиманский Виталий Афанасьевич', 'Гардеробщик');
    insert into public."Clerk" (id_clerk, full_name, position) values (7, 'Обычный Олег Анатольевич', 'Консьерж');
    insert into public."Clerk" (id_clerk, full_name, position) values (8, 'Милова Мило Витальевна', 'Горничная');
    insert into public."Clerk" (id_clerk, full_name, position) values (9, 'Морская Виктория Андреевна', 'Горничная');
    insert into public."Clerk" (id_clerk, full_name, position) values (10, 'Кондрашов Михаил Альбертович', 'Уборщик');
```

#### Заполнение таблицы "Администратор":
```
    insert into public."Admin" (id_admin, full_name, contact_details) values (1, 'Иванов Иван Иванович', '88081412146');
    insert into public."Admin" (id_admin, full_name, contact_details) values (2, 'Агаркова Алевтина Юрьевна', '88091312145');
    insert into public."Admin" (id_admin, full_name, contact_details) values (3, 'Милый Глеб Аркадьевич', '88817123456');
    insert into public."Admin" (id_admin, full_name, contact_details) values (4, 'Самойлова Полина Андреевна', '88126457365');
    insert into public."Admin" (id_admin, full_name, contact_details) values (5, 'Григорьев Андрей Викторович', '88845673433');
```

#### Заполнение таблицы "Проживающий":
```
    insert into public."Residing" (id_residing, full_name, identity_data) values (1, 'Свидченко Артем Артемович', '2018 011306');
    insert into public."Residing" (id_residing, full_name, identity_data) values (2, 'Савченко Полина Викторовна', '1997 023675');
    insert into public."Residing" (id_residing, full_name, identity_data) values (3, 'Кузнецов Игорь Сергеевич', '2002 056345');
    insert into public."Residing" (id_residing, full_name, identity_data) values (4, 'Скоробогатько Антонина Васильевна', '2045 456894');
    insert into public."Residing" (id_residing, full_name, identity_data) values (5, 'Антольев Анатолий Анатольевич', '2021 002304');
    insert into public."Residing" (id_residing, full_name, identity_data) values (6, 'Кашин Даниил Игоревич', '1998 205674');
    insert into public."Residing" (id_residing, full_name, identity_data) values (7, 'Белых Дмитрий Игоревич', '1997 777654');
    insert into public."Residing" (id_residing, full_name, identity_data) values (8, 'Ларин Алексей Александрович', '1998 345033');
    insert into public."Residing" (id_residing, full_name, identity_data) values (9, 'Купранов Олег Антольевич', '2004 675884');
    insert into public."Residing" (id_residing, full_name, identity_data) values (10, 'Юлин Михаил Альбертович', '2018 008445');
```

#### Заполнение таблицы "Номер в гостинице":
```
    insert into public."Room" (id_room, type, floor) values (1, 'Складское помещение', 1);
    insert into public."Room" (id_room, type, floor) values (2, 'Комната уборщиков', 2);
    insert into public."Room" (id_room, type, floor) values (3, 'Эконом номер', 2);
    insert into public."Room" (id_room, type, floor) values (4, 'Эконом номер', 2);
    insert into public."Room" (id_room, type, floor) values (5, 'Бизнес класс номер', 2);
    insert into public."Room" (id_room, type, floor) values (6, 'Эконом номер', 2);
    insert into public."Room" (id_room, type, floor) values (7, 'Эконом номер', 3);
    insert into public."Room" (id_room, type, floor) values (8, 'Бизнес класс номер', 3);
    insert into public."Room" (id_room, type, floor) values (9, 'Комната уборщиков', 3);
    insert into public."Room" (id_room, type, floor) values (10, 'Эконом номер', 3); 
```

#### Заполнение таблицы "Этаж":
```
    insert into public."Floor" (id_floor, type, numbers) values (1, 'Служебный', '100, 101, 102, 103');
    insert into public."Floor" (id_floor, type, numbers) values (2, 'Обычный', '200, 201, 202, 203, 204, 205');
    insert into public."Floor" (id_floor, type, numbers) values (3, 'Обычный', '300, 301, 302, 303, 304, 305');
```

#### Заполнение таблицы "Услуги":
```
    insert into public."Services" (id_services, type, price) values (1, 'Завтрак', 400.0);
    insert into public."Services" (id_services, type, price) values (2, 'Обед', 550.0);
    insert into public."Services" (id_services, type, price) values (3, 'Полдник', 350.0);
    insert into public."Services" (id_services, type, price) values (4, 'Ужин', 500.0);
    insert into public."Services" (id_services, type, price) values (5, 'Обновить бар', 50.0);
    insert into public."Services" (id_services, type, price) values (6, 'Уборка комнаты', 150.0);
    insert into public."Services" (id_services, type, price) values (7, 'Дополнительная кровать', 250.0);
    insert into public."Services" (id_services, type, price) values (8, 'Вентилятор', 150.0);
    insert into public."Services" (id_services, type, price) values (9, 'Обогреватель', 200.0);
    insert into public."Services" (id_services, type, price) values (10, 'Снеки', 50.0);
```

#### Заполнение таблицы "Список услуг":
```
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (1, 1, 3);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (2, 2, 3);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (3, 3, 4);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (4, 5, 2);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (5, 6, 1);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (6, 6, 2);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (7, 7, 3);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (8, 8, 2);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (9, 9, 2);
    insert into public."Services_list" (id_services_list, id_services, number_of_services) values (10, 10, 1);
```

#### Заполнение таблицы "Заказ":
```
    insert into public."Order" (id_order, id_clerk, id_services_list) values (1, 8, 1);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (2, 8, 2);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (3, 9, 3);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (4, 8, 5);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (5, 9, 6);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (6, 9, 6);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (7, 8, 7);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (8, 8, 8);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (9, 9, 9);
    insert into public."Order" (id_order, id_clerk, id_services_list) values (10, 8, 10);
```

#### Заполнение таблицы "Уборка":
```
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (1, 1, 1, 'Понедельник');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (2, 1, 2, 'Вторник');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (3, 2, 2, 'Среда');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (4, 2, 3, 'Четверг');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (5, 3, 3, 'Пятница');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (6, 3, 3, 'Суббота');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (7, 4, 2, 'Воскресенье');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (8, 4, 2, 'Понедельник');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (9, 10, 3, 'Вторник');
    insert into public."Cleaning" (id_cleaning, id_clerk, id_floor, day_of_week) values (10, 10, 1, 'Среда');
```

#### Заполнение таблицы "Договор":
```
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (1, 1, 1, 'С обедом');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (2, 1, 2, 'Без обеда');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (3, 2, 3, 'С обедом');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (4, 2, 4, 'Без обеда');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (5, 3, 5, 'С обедом');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (6, 3, 1, 'Без обеда');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (7, 4, 2, 'С обедом');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (8, 4, 3, 'Без обеда');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (9, 10, 4, 'С обедом');
    insert into public."Contract" (id_contract, id_clerk, id_admin, conditions) values (10, 10, 5, 'Без обеда');
```

#### Заполнение таблицы "Проживание":
```
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_out_date, check_in_date) values (1, 1, 1, 2, 1, 2, '2021-01-08', '2021-01-10');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (2, 2, 1, 3, 2, 2, '2021-01-08', '2021-01-10');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (3, 3, 2, 4, 3, 3, '2021-01-09', '2021-01-12');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (4, 4, 2, 1, 4, 3, '2021-01-09', '2021-01-12');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (5, 5, 3, 6, 5, 4, '2021-01-11', '2021-01-12');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (6, 6, 3, 5, 1, 5, '2021-01-01', '2021-01-10');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (7, 7, 4, 7, 2, 5, '2021-01-01', '2021-01-10');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (8, 8, 4, 9, 3, 5, '2021-01-01', '2021-01-09');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (9, 9, 10, 8, 4, 6, '2021-01-16', '2021-01-19');
    insert into public."Accommodation" (id_accommodation, id_residing, id_clerk, id_order, id_admin, id_room, check_in_date, check_out_date) values (10, 10, 10, 10, 5, 6, '2021-01-10', '2021-01-15');  
```