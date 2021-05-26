Create table newspaper(id_newspaper int primary key, name varchar(20) not null, 
        price float not null, full_name_editor varchar(40) not null, publication_index int not null);


Сreate table circulation(id_circulation int primary key, newspaper_id int not null, quantity int not null, 
       foreign key(newspaper_id) references newspaper(id_newspaper));


Сreate table production(id_production int primary key, newspaper_id int not null,
        circulation_id int not null, quantity int not null, typography_id int not null, 
        foreign key(newspaper_id) references newspaper(id_newspaper), foreign key(circulation_id) references
        circulation(id_circulation), foreign key(typography_id) references typography(id_typography));


Сreate table storage(id_storage int primary key, newspaper_id int not null,
        circulation_id int not null, typography_id int not null, production_id int not null,
        postoffice_id int not null, quantity int not null,
        foreign key(newspaper_id) references newspaper(id_newspaper), foreign key(circulation_id) references
        circulation(id_circulation), foreign key(typography_id) references typography(id_typography),
        foreign key(production_id) references production(id_production), foreign key(postoffice_id) references
        postoffice(id_postoffice));


Create table typography(id_typography int primary key, name varchar(20) not null, address varchar(40) not null,
        work_status varchar(20) not null);


Сreate table postoffice(id_postoffice int primary key, address varchar(40) not null, number int not null);
