Create table client(id_client serial primary key, full_name varchar(60) not null,
passport_id int not null, city varchar(45) not null);
Create table room(id_room serial primary key, floor int not null, coat_of_living int not null,
room_type varchar(20) not null);
Create table administration(id_admin serial primary key, full_name varchar(60) not null,
contact_details varchar(30) not null, experience varchar(15) not null);
Create table employee(id_employee serial primary key, full_name varchar(60) not null, post varchar(20) not null);
Create table cleaning(id_cleaning int primary key, cleaning_floor int not null, cleaning_day date not null,
admin_id int not null, employee_id int not null, foreign key(admin_id) references administration(id_admin) on delete cascade,
foreign key(employee_id) references employee(id_employee) on delete cascade);
Create table employment_contract(id_contract int primary key, terms_of_an_agreement varchar(70) not null,
hiring_date date not null, admin_id int not null, employee_id int not null,
foreign key(admin_id) references administration(id_admin) on delete cascade,
foreign key(employee_id) references employee(id_employee) on delete cascade);
Create table inhabitation(id_inhabitation int primary key, accomodations varchar(20) not null,
check_in_date date not null, check_out_date date not null, client_id int not null,
room_id int not null, admin_id int not null, foreign key(client_id) references client(id_client) on delete cascade,
foreign key(room_id) references room(id_room) on delete cascade,
foreign key(admin_id) references administration(id_admin) on delete cascade);

insert into client values
(1, 'Alekseeva Oksana', 463745, 'Saint-Petersburg'),
(2, 'Mikhailova Alevtina', 37468764, 'Spb'),
(3, 'Fedorova Diana', 9827386, 'SPb');
insert into room values
(1, 3, 15000, 'lux'),
(2, 1, 3000, 'usual'),
(3, 3, 5000, 'usual');
insert into administration values
(1, 'anya', '89815735562', '2 years'),
(2, 'Gosha', '988323846', '8 years'),
(3, 'Diana', '78362347', '0,5 years');
insert into employee values
(1, 'evgeniy', 'cleaner'),
(2, 'vanya', 'plumber'),
(3, 'sergey', 'cleaner');
insert into cleaning values
(1, 2, '05.06.2009', 2, 2),
(2, 1, '05.08.2001', 3, 1),
(3, 3, '09.01.2008', 1, 3);
insert into employment_contract values
(1, 'krjfhsklfhlisdhflsdhflskh', '19.08.2001', 2, 1),
(2, 'gfukysgdfusfsdjkiudfb', '17.07.2008', 3, 2),
(3, 'djhgcfkjsgfckusdgfshcdg', '07.09.2000', 1, 3);
insert into inhabitation values
(1, 'spadjisadhihdisdyjk', '20.01.2000', '25.01.2000', 1, 3, 2),
(2, 'kdjgsdgfusydfhbdf', '19.07.2002', '28.07.2002', 3, 1, 2),
(3, 'dskfpokdsfjksdojfof', '1.09.2008', '9.04.2008', 2, 2, 1); 
insert into client values
(1, 'Alekseeva Oksana', 463745, 'Saint-Petersburg'),
(2, 'Mikhailova Alevtina', 37468764, 'Spb'),
(3, 'Fedorova Diana', 9827386, 'SPb');
insert into room values
(1, 3, 15000, 'lux'),
(2, 1, 3000, 'usual'),
(3, 3, 5000, 'usual');
insert into administration values
(1, 'anya', '89815735562', '2 years'),
(2, 'Gosha', '988323846', '8 years'),
(3, 'Diana', '78362347', '0,5 years');
insert into employee values
(1, 'evgeniy', 'cleaner'),
(2, 'vanya', 'plumber'),
(3, 'sergey', 'cleaner');
insert into cleaning values
(1, 2, '05.06.2009', 2, 2),
(2, 1, '05.08.2001', 3, 1),
(3, 3, '09.01.2008', 1, 3);
insert into employment_contract values
(1, 'krjfhsklfhlisdhflsdhflskh', '19.08.2001', 2, 1),
(2, 'gfukysgdfusfsdjkiudfb', '17.07.2008', 3, 2),
(3, 'djhgcfkjsgfckusdgfshcdg', '07.09.2000', 1, 3);
insert into inhabitation values
(1, 'spadjisadhihdisdyjk', '20.01.2000', '25.01.2000', 1, 3, 2),
(2, 'kdjgsdgfusydfhbdf', '19.07.2002', '28.07.2002', 3, 1, 2),
(3, 'dskfpokdsfjksdojfof', '1.09.2008', '9.04.2008', 2, 2, 1);

