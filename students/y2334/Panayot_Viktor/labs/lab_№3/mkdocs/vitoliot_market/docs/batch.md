## Batch
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| idbatch             | integer       |True |False|True  |  
| name_batch          | character(10) |False|False|False |
| amount_of_product   | text          |False|False|False |
| price_batch         | integer       |False|False|False |

### __Indexes:__
```postgresql
'batch_pkey' PRIMARY KEY, btree (idbatch)
```

### __References:__
```postgresql
TABLE 'batch_content' CONSTRAINT 'batch_content_idbatch_fkey' FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
TABLE 'contract_bcb' CONSTRAINT 'contract_bcb_idbatch_fkey' FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.batch (
    idbatch integer PRIMARY KEY,
    name_batch character(10),
    amount_of_product text,
    price_batch integer
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.batch VALUES 
(1,	'100100221', 	'Acer Aspire: 1' 'Shipe_1: 1',	42000), 
(2,	'100100222',	'AK-47: 1',		10000), 
(3,	'100100223', 	'NIN chokos: 1',	 1000);
```