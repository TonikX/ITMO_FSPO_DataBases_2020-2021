# PATIENTS
Поле |Тип | Первичный ключ | Внешний ключ | Уникальность
--- | --- | --- | --- | --- 
id | integer | + | - | + |
name | chararcter(45) | - | - | - |
phone_number | chararcter(45) | - | - | - |
date_of_birth | date | - | - | - |

**Код создания:**
```sql
create table patients (
    id serial primary key,
    name varchar(45),
    phone_number varchar(45),
    date_of_birth date
);
```

**Код заполнения:**
```
insert into patients (name, phone_number, date_of_birth) values('sereja', '+79119991271', '2002-05-05');
insert into patients (name, phone_number, date_of_birth) values('dima', '+79119391271', '2002-05-01');
insert into patients (name, phone_number, date_of_birth) values('oleg', '+79113791271', '2002-05-12');
```

<br/>

# OFFICES
Поле |Тип | Первичный ключ | Внешний ключ | Уникальность 
--- | --- | --- | --- | --- 
id | integer | + | - | + |
begin_working | time | - | - | - |
end_working | time | - | - | - |
phone_number | chararcter(45) | - | - | - |

**Код создания:**
```
create table offices (
    id serial primary key
    begin_working time,
    end_working time,
    phone_number varchar(45)
);
```

**Код заполнения:**
```sql
insert into offices (begin_working, end_working, phone_number) values('12:00:00', '16:00:00', '+70001113344');
insert into offices (begin_working, end_working, phone_number) values('12:00:00', '18:00:00', '+70001213344');
insert into offices (begin_working, end_working, phone_number) values('15:00:00', '21:30:00', '+70001213390');
```

<br/>

# PRICE LISTS
Поле |Тип | Первичный ключ | Внешний ключ | Уникальность
--- | --- | --- | --- | --- 
id | integer | + | - | + |
service | chararcter(45) | - | - | - |
price | money | - | - | - |

**Код создания:**
```sql
create table price_list (
    id serial,
    service varchar(45),
    price money
);
```

**Код заполнения:**
```sql
insert into price_lists (service, price) values('service 1', 1900.00);
insert into price_lists (service, price) values('service 2', 2400.00);
insert into price_lists (service, price) values('service 3', 5500.00);
```

<br/>

# SCHEDULE
Поле |Тип | Первичный ключ | Внешний ключ | Уникальность
--- | --- | --- | --- | ---
id | integer | + | - | + |
working_days | text[] | - | - | - |

**Код создания:**
```sql
create table schedule(
    id serial primary key,
    working_days text[]
);
```

**Код заполнения:**
```sql
lr3=# insert into schedule (working_days) values('{mon, tue}');
lr3=# insert into schedule (working_days) values('{mon, wed}');
lr3=# insert into schedule (working_days) values('{wed, fri}');
```

<br/>

# DOCTORS
Поле |Тип | Первичный ключ | Внешний ключ | Уникальность
--- | --- | --- | --- | ---
id | integer | + | - | + |
name | chararcter(45) | - | - | - |
speciality | chararcter(45) | - | - | - |
date_of_birth | date | - | - | - |
price_list_id | integer | - | + | - |
schedule_id | integer | - | + | - |

**Код создания:**
```sql
create table doctors(
    id serial primary key,
    name varchar(45),
    speciality varchar(45),
    date_of_birth date,
    price_list_id integer,
    schedule_id integer,
    foreign key (price_list_id) references price_list (id),
    foreign key (schedule_id) references schedule (id)
);
```

**Код заполнения:**
```sql
insert into doctors (name, speciality, date_of_birth, price_list_id, schedule_id) values('doctor 1', 'spec 1', '1999-04-23', 1, 1);
insert into doctors (name, speciality, date_of_birth, price_list_id, schedule_id) values('doctor 2', 'spec 2', '1999-04-23', 2, 2);
insert into doctors (name, speciality, date_of_birth, price_list_id, schedule_id) values('doctor 3', 'spec 3', '1999-02-23', 2, 3);
```

<br/>

# APPOINTMENTS
Поле |Тип | Первичный ключ | Внешний ключ | Уникальность
--- | --- | --- | --- | ---
id | integer | + | - | + |
date | date | - | - | - |
time | time | - | - | - |
price | money | - | - | - |
doctor_id | integer | - | + | - |
office_id | integer | - | + | - |
patient_id | integer | - | + | - |

**Код создания:**
```sql
create table appointments (
    id serial primary key,
    date date,
    time time,
    price money,
    doctor_id integer,
    office_id integer,
    patient_id integer,
    foreign key (doctor_id) references doctors (id),
    foreign key (office_id) references offices (id),
    foreign key (patient_id) references patients (id)
);
```

**Код заполнения:**
```sql
insert into appointments (date, time, doctor_id, office_id, patient_id) values('2020-01-01', '12:00:00', 1, 1, 1);
insert into appointments (date, time, doctor_id, office_id, patient_id) values('2020-01-02', '13:00:00', 2, 1, 2);
insert into appointments (date, time, doctor_id, office_id, patient_id) values('2020-01-03', '17:00:00', 3, 2, 3);
```

<br/>

# MEDICAL RECORDS
Поле |Тип | Первичный ключ | Внешний ключ | Уникальность
--- | --- | --- | --- | ---
id | integer | + | - | + |
diagnosis | chararcter(45) | - | - | - |
condition | text | - | - | - |
recommendation | text | - | - | - |
appointment_id | integer | - | + | - |

**Код создания:**
```sql
create table medical_records (
    id serial primary key,
    diagnosis varchar(45),
    condition text,
    recommendation text,
    appointment_id integer,
    foreign key (appointment_id) references appointments (id)
);
```

**Код заполнения:**
```sql
insert into medical_records (diagnosis, condition, recommendation, appointment_id) values ('vse ochen ploho', 'pochty umer', 'ne prihodite bolshe', 1);
insert into medical_records (diagnosis, condition, recommendation, appointment_id) values ('vse ochen ploho', 'umer', 'ne prihodite bolshe', 2);
insert into medical_records (diagnosis, condition, recommendation, appointment_id) values ('cool', 'alive', 'ne boleyte', 3);
```