##Create

#### Создание таблицы "Admin":
```
CREATE TABLE admin(
    id_admin int PRIMARY KEY NOT NULL,
    admin_name varchar(27) NOT NULL
);
```
#### Создание таблицы "Climbing Club":
```
CREATE TABLE climbingClub(
    id_climbingclub int PRIMARY KEY NOT NULL, 
    contact_person int NOT NULL, 
    city varchar(27) NOT NULL, 
    country varchar(27) NOT NULL, 
    email varchar(27) NOT NULL, 
    club_name varchar(27) NOT NULL, 
    telephone int NOT NULL
);
```
#### Создание таблицы "Group":
```
CREATE TABLE climberGroup(
    id_group int PRIMARY KEY NOT NULL, 
    group_name varchar(27) NOT NULL
);
```
#### Создание таблицы "Top":
```
CREATE TABLE top(
    id_top int PRIMARY KEY NOT NULL, 
    top_name varchar(27) NOT NULL, 
    location varchar(27) NOT NULL, 
    country_name varchar(27) NOT NULL, 
    top_height int NOT NULL, 
    area_name varchar(27) NOT NULL, 
    ascent_num int NOT NULL
);
```
#### Создание таблицы "Route":
```
CREATE TABLE route(
    id_route int PRIMARY KEY NOT NULL,
    route_description varchar(27) NOT NULL, 
    id_top int NOT NULL, 
    foreign key(id_top) references top(id_top)
);
```
#### Создание таблицы "Climber":
```
CREATE TABLE climber(
    id_climber int PRIMARY KEY NOT NULL, 
    climbers_name varchar(27) NOT NULL, 
    clubs_name varchar(27) NOT NULL, 
    adrees varchar(27) NOT NULL, 
    ascent_chronicle varchar(27) NOT NULL,
    id_climbingClub int NOT NULL, 
    foreign key(id_climbingClub) references climbingClub(id_climbingClub)
);
```
#### Создание таблицы "Ascent":
```
CREATE TABLE ascent(
    ascent_date date NOT NULL, 
    ascent_time time with time zone NOT NULL, 
    ascent_success varchar(27) NOT NULL, 
    ascent_duration time with time zone NOT NULL, 
    id_admin int NOT NULL, id_group int NOT NULL, 
    id_route int NOT NULL, id_top int NOT NULL, 
    foreign key(id_admin) references admin(id_admin),
    foreign key(id_group) references climberGroup(id_group),
    foreign key(id_route) references route(id_route),
    foreign key(id_top) references top(id_top)
);
```
#### Создание таблицы "Emergency Situation":
```
CREATE TABLE emergencySituation(
    id_emergencySituation int NOT NULL, 
    reason varchar(27) NOT NULL, 
    id_admin int NOT NULL, 
    id_group int NOT NULL, 
    id_route int NOT NULL, 
    id_top int NOT NULL, 
    id_climber int NOT NULL, 
    id_climbingClub int NOT NULL, 
    foreign key(id_admin) references admin(id_admin),
    foreign key(id_group) references climberGroup(id_group),
    foreign key(id_route) references route(id_route),
    foreign key(id_top) references top(id_top), 
    foreign key(id_climber) references climber(id_climber), 
    foreign key(id_climbingClub) references climbingClub(id_climbingClub));
```
#### Создание таблицы "Group Composition":
```
CREATE TABLE groupComposition(
    num_of_climbers int NOT NULL, 
    climbers_information varchar(27) NOT NULL, 
    id_admin int NOT NULL, 
    id_group int NOT NULL, 
    id_climber int NOT NULL, 
    id_climbingClub int NOT NULL, 
    foreign key(id_admin) references admin(id_admin),
    foreign key(id_group) references climberGroup(id_group), 
    foreign key(id_climber) references climber(id_climber), 
    foreign key(id_climbingClub) references climbingClub(id_climbingClub)
);
```
