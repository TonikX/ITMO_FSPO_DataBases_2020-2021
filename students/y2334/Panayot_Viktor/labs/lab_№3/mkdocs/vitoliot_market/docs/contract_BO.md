## Contract_BO
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
|idcontract_bo        | integer       |False|True |False |       
|idoffice             | integer       |False|True |False |
|idbroker             | integer       |False|True |False |
|office_percent       | integer       |False|False|False |
|salary               | integer       |False|False|False |
|date_of_duration     | date          |False|False|False |

### __Indexes__:
```postgresql
'contract_bo_pkey' PRIMARY KEY, btree (idcontract_bo)
```

### __Constraints__:
```postgresql
'contract_bo_idbroker_fkey' FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
'contract_bo_idoffice_fkey' FOREIGN KEY (idoffice) REFERENCES office(idoffice) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.contract_bo (
    idcontract_bo integer PRIMARY KEY,
    idoffice integer REFERENCES office(idoffice) ON DELETE CASCADE,
    idbroker integer REFERENCES broker(idbroker) ON DELETE CASCADE,
    office_percent integer,
    salary integer,
    date_of_duration date
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.contract_bo VALUES 
(1,	1,	1,	40,	10000,	2025-10-10)
(2,	2,	2,	1,  10000000,	2035-10-10)
(3,	3,	3,	50,	20000,	2022-10-10);
```