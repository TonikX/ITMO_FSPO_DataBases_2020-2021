## Create

#### Создание таблицы "Dog"

CREATE TABLE dog (
	id_dog integer PRIMARY KEY NOT NULL,
	dog_name text NOT NULL,
	passport integer NOT NULL,
	contract boolean NOT NULL,
	id_dog_club integer NOT NULL
);

#### Создание таблицы "Owner"

CREATE TABLE owner (
	id_owner integer PRIMARY KEY NOT NULL,
	owner_name text NOT NULL
);	

#### Создание таблицы "Registration"

CREATE TABLE registration (
	id_registration integer PRIMARY KEY NOT NULL,
	receipt integer NOT NULL,
	status boolean NOT NULL,
	id_owner integer NOT NULL,
	FOREIGN KEY (id_owner) REFERENCES owner (id_owner)
);

#### Создание таблицы "Expert"

CREATE TABLE expert (
	id_expert integer PRIMARY KEY NOT NULL,
	contract boolean NOT NULL,
	full_name text NOT NULL,
	expert_club text NOT NULL
);

#### Создание таблицы "Ring"

CREATE TABLE ring (
	id_ring integer PRIMARY KEY NOT NULL,
	ring_number integer NOT NULL
);

#### Создание таблицы "Perform"

CREATE TABLE perfom (
	id_perfom integer PRIMARY KEY NOT NULL,
	mark integer NOT NULL,
	inermed_results text NOT NULL,
	final_results text NOT NULL,
	id_exhibit integer NOT NULL,
	id_dog integer NOT NULL,
	id_registration integer NOT NULL,
	FOREIGN KEY (id_exhibit) REFERENCES exhibit (id_exhibit),
	FOREIGN KEY (id_dog) REFERENCES dog (id_dog),
	FOREIGN KEY (id_registration) REFERENCES registration (id_registration)
);

#### Создание таблицы "Exhibit"

 CREATE TABLE exhibit (
	id_exhibit integer PRIMARY KEY NOT NULL,
	type_exhibit text NOT NULL
);

#### Создание таблицы "Judging"

CREATE TABLE judging (
	id_judging  integer PRIMARY KEY NOT NULL,
	results integer NOT NULL,
	id_expert integer NOT NULL,
	id_perfom integer NOT NULL,
	id_ring integer NOT NULL,
	FOREIGN KEY (id_expert) REFERENCES expert (id_expert),
	FOREIGN KEY (id_perfom) REFERENCES perfom (id_perfom),
	FOREIGN KEY (id_ring) REFERENCES ring (id_ring)
);