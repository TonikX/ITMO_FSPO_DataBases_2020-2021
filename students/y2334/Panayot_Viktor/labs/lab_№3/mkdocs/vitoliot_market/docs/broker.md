## Broker
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
|idbroker             | integer       |True |False|True|                  
|name_broker          | character(30) |False|False|False|
|succsess_percent     | integer       |False|False|False|
|work_experience      | integer       |False|False|False|

### __Indexes__:
```postgresql
'broker_pkey' PRIMARY KEY, btree (idbroker)
```

### __References__:
```postgresql
TABLE 'contract_bcb' CONSTRAINT 'contract_bcb_idbroker_fkey' FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
TABLE 'contract_bo' CONSTRAINT 'contract_bo_idbroker_fkey' FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.broker (
    idbroker integer PRIMARY KEY,
    name_broker character(30),
    succsess_percent integer,
    work_experience integer
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.broker VALUES
(1, 'Jordan Belfort',                	80,	20),
(2, 'Don Juan',                      	100, 5),
(3, 'Uncle Pihto',                   	40,	60);
```