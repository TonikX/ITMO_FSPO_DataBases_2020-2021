## __Firm__
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| idfirm              | integer       |True |False|True|
| name_firm           | character(25) |False|False|False|
| specialization_firm | character(25) |False|False|False|

### __Indexes__:
```postgresql
'firm_pkey' PRIMARY KEY, btree (idfirm)
```

### __References__:
```postgresql
TABLE 'contract_fp' CONSTRAINT 'contract_fp_iffirm_fkey' FOREIGN KEY (idfirm) REFERENCES firm(idfirm) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.firm (
    idfirm integer PRIMARY KEY,
    name_firm character(25),
    specialization_firm character(25)
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.customer VALUES 
(1,	'Acer', 'Notebooks'),             
(2,	'Red Flag', 'weapons'),                  
(3,	'NIN', 'food'),
(4,	'Shipe', 'Micro'); 
```