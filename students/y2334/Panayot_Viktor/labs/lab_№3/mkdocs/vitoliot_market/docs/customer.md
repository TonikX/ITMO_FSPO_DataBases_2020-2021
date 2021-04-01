## Customer
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| idcustomer          | integer       |True |False|True  |                
| name_customer       | character(30) |False|False|False |

### __Indexes__:
```postgresql
'customer_pkey' PRIMARY KEY, btree (idcustomer)
```

### __References__:
```postgresql
TABLE 'contract_bcb' CONSTRAINT 'contract_bcb_idcustomer_fkey' FOREIGN KEY (idcustomer) REFERENCES customer(idcustomer) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.customer (
    idcustomer integer PRIMARY KEY,
    name_customer character(30)
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.customer VALUES 
(1, 'Panayot Viktor'),
(2,	'IGIL(banned in Russia'),        
(3,	'Nothing Nothing Nothing');
```