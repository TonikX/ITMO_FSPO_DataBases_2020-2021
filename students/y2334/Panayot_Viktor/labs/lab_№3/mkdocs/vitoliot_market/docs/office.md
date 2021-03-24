## Office
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
|idoffice             |integer        |True |False|True  |                
|name_office          |character(25)  |Fakse|False|False |

### __Indexes__:
```postgresql
'office_pkey' PRIMARY KEY, btree (idoffice)
```

### __References__:
```postgresql
TABLE 'contract_bo' CONSTRAINT 'contract_bo_idoffice_fkey' FOREIGN KEY (idoffice) REFERENCES office(idoffice) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.office (
    idoffice integer PRIMARY KEY,
    name_office character(25)
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.customer VALUES 
(1, 'off1ce'),                   
(2,	'brothers Brazzers'),        
(3,	'Nothings office');
```