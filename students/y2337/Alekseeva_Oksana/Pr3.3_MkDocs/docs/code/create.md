## Create
#### Создание таблицы "Клиент":
```
Create table client(id_client int primary key, full_name varchar(60) not null, 
        passport_id int not null, city varchar(45) not null);
```
#### Создание таблицы "Номер":
```
Сreate table room(id_room int primary key, floor int not null, coat_of_living int not null, 
        room_type varchar(20) not null);
```
#### Создание таблицы "Администратор":
```
Сreate table administration(id_admin int primary key, full_name varchar(60) not null,
        contact_details varchar(30) not null, experience varchar(15) not null);
```
#### Создание таблицы "Служащий":
```
Сreate table employee(id_employee int primary key, full_name varchar(60) not null, post varchar(20) not null);
```
#### Создание таблицы "Уборка":
```
Create table cleaning(id_cleaning int primary key, cleaning_floor int not null, cleaning_day date not null, 
        admin_id int not null, employee_id int not null, foreign key(admin_id) references administration(id_admin), 
                foreign key(employee_id) references employee(id_employee));
```
#### Создание таблицы "Договор о найме":
```
Сreate table employment_contract(id_contract int primary key, terms_of_an_agreement varchar(70) not null, 
        hiring_date date not null, admin_id int not null, employee_id int not null, 
                foreign key(admin_id) references administration(id_admin), 
                        foreign key(employee_id) references employee(id_employee));
```
#### Создание таблицы "Проживание":
```
Create table inhabitation(id_inhabitation int primary key, accomodations varchar(20) not null, 
        check_in_date date not null, check_out_date date not null, client_id int not null, 
                room_id int not null, admin_id int not null, foreign key(client_id) references client(id_client), 
                        foreign key(room_id) references room(id_room), 
                                foreign key(admin_id) references administration(id_admin));
```