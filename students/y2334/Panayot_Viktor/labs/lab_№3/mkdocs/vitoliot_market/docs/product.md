## __Product__
|Column              |Type           |PK   |FK   |Unique|
|--------------------|---------------|:---:|:---:|:----:|
| idproduct          | integeTr      |True |False|True  |
| name_product       | character(25) |False|False|False |
| shelf_life         | date          |False|False|False |
| unit               | character(10) |False|False|False |
| price              | integer       |False|False|False |
| date_of_production | date          |False|False|False |
| date_of_shipment   | date          |False|False|False |

### __Indexes__:
```postgresql
'product_pkey' PRIMARY KEY, btree (ifproduct)
```
### __References__:
```postgresql
TABLE 'batch_content' CONSTRAINT 'batch_content_idproduct_fkey' FOREIGN KEY (idproduct) REFERENCES product(ifproduct) ON DELETE CASCADE
TABLE 'contract_fp' CONSTRAINT 'contract_fp_idproduct_fkey' FOREIGN KEY (idproduct) REFERENCES product(ifproduct) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.product (
    ifproduct integer PRIMARY KEY,
    name_product character(25),
    shelf_life date,
    unit character(10),
    price integer,
    date_of_production date,
    date_of_shipment date
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.product VALUES 
(1,	'Acer Aspire 515-50', '2030-03-14', 'th.', 40000, '2021-01-10', '2021-02-10'),
(2,	'AK-47', '9999-12-31', 'th.', 10000, '2000-01-10',	'2020-02-10'),
(3,	'NIN chokos', '2021-06-29',	'kg.', 1000 '2021-01-10',	'2021-02-15'),
(4,	'Shipe-1', '2030-07-14', 'th.', 2000, '2021-01-21',	'2021-03-01');
```