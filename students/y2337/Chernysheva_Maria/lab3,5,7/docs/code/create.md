## Create

#### Создание таблицы "Проживание":
```
CREATE TABLE public."Accommodation"
(
    id_accommodation integer NOT NULL,
    check_out_date date NOT NULL,
    check_in_date date NOT NULL,
    id_room integer NOT NULL,
    id_residing integer NOT NULL,
    id_clerk integer NOT NULL,
    id_order integer NOT NULL,
    id_admin integer NOT NULL,
    CONSTRAINT "Accommodation_pkey" PRIMARY KEY (id_accommodation),
    CONSTRAINT id_admin FOREIGN KEY (id_admin)
        REFERENCES public."Admin" (id_admin) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT id_clerk FOREIGN KEY (id_clerk)
        REFERENCES public."Clerk" (id_clerk) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT id_order FOREIGN KEY (id_order)
        REFERENCES public."Order" (id_order) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT id_residing FOREIGN KEY (id_residing)
        REFERENCES public."Residing" (id_residing) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
);
```

#### Создание таблицы "Администратор":
```
    CREATE TABLE public."Admin"
(
    id_admin integer NOT NULL,
    full_name character varying(100) COLLATE pg_catalog."default" NOT NULL,
    contact_details character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Admin_pkey" PRIMARY KEY (id_admin)
);
```

#### Создание таблицы "Уборка":
```
    CREATE TABLE public."Cleaning"
(
    id_cleaning integer NOT NULL,
    day_of_week character varying(45) COLLATE pg_catalog."default" NOT NULL,
    id_clerk integer NOT NULL,
    id_floor integer NOT NULL,
    CONSTRAINT "Cleaning_pkey" PRIMARY KEY (id_cleaning),
    CONSTRAINT id_clerk FOREIGN KEY (id_clerk)
        REFERENCES public."Clerk" (id_clerk) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT id_floor FOREIGN KEY (id_floor)
        REFERENCES public."Floor" (id_floor) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
);
```

#### Создание таблицы "Служащий":
```
    CREATE TABLE public."Clerk"
(
    id_clerk integer NOT NULL,
    full_name character varying(100) COLLATE pg_catalog."default" NOT NULL,
    "position" character varying(45) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Clerk_pkey" PRIMARY KEY (id_clerk)
);
```

#### Создание таблицы "Договор":
```
    CREATE TABLE public."Contract"
(
    id_contract integer NOT NULL,
    conditions character varying(100) COLLATE pg_catalog."default" NOT NULL,
    id_clerk integer NOT NULL,
    id_admin integer NOT NULL,
    CONSTRAINT "Contract_pkey" PRIMARY KEY (id_contract),
    CONSTRAINT id_admin FOREIGN KEY (id_admin)
        REFERENCES public."Admin" (id_admin) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT id_clerk FOREIGN KEY (id_clerk)
        REFERENCES public."Clerk" (id_clerk) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
);
```

#### Создание таблицы "Этаж":
```
    CREATE TABLE public."Floor"
(
    id_floor integer NOT NULL,
    type character varying(45) COLLATE pg_catalog."default" NOT NULL,
    numbers character varying(45) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Floor_pkey" PRIMARY KEY (id_floor)
)
;
```

#### Создание таблицы "Заказ":
```
    CREATE TABLE public."Order"
(
    id_order integer NOT NULL,
    id_clerk integer NOT NULL,
    id_services_list integer NOT NULL,
    CONSTRAINT "Order_pkey" PRIMARY KEY (id_order),
    CONSTRAINT id_clerk FOREIGN KEY (id_clerk)
        REFERENCES public."Clerk" (id_clerk) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID,
    CONSTRAINT id_services_list FOREIGN KEY (id_services_list)
        REFERENCES public."Services_list" (id_services_list) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
);
```

#### Создание таблицы "Проживающий":
```
    CREATE TABLE public."Residing"
(
    id_residing integer NOT NULL,
    full_name character varying(100) COLLATE pg_catalog."default" NOT NULL,
    identity_data character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Residing_pkey" PRIMARY KEY (id_residing)
);
```

#### Создание таблицы "Номер в гостинице":
```
    CREATE TABLE public."Room"
(
    id_room integer NOT NULL,
    floor integer NOT NULL,
    type character varying(45) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Room_pkey" PRIMARY KEY (id_room)
);
```

#### Создание таблицы "Услуги":
```
    CREATE TABLE public."Services"
(
    id_services integer NOT NULL,
    type character varying(45) COLLATE pg_catalog."default" NOT NULL,
    price real NOT NULL,
    CONSTRAINT "Services_pkey" PRIMARY KEY (id_services)
);
```

#### Создание таблицы "Список услуг":
```
    CREATE TABLE public."Services_list"
(
    id_services_list integer NOT NULL,
    number_of_services integer NOT NULL,
    id_services integer NOT NULL,
    CONSTRAINT "Services_list_pkey" PRIMARY KEY (id_services_list),
    CONSTRAINT id_services FOREIGN KEY (id_services)
        REFERENCES public."Services" (id_services) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
        NOT VALID
);
```