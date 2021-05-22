## Contract_FP
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| idproduct           | integer       |True |True |True  |
| idfirm              | integer       |False|False|False |
| date_of_contract    | date          |False|False|False |

### __Constraints__:
```postgresql
    "contract_fp_idproduct_fkey" FOREIGN KEY (idproduct) REFERENCES product(idproduct) ON DELETE CASCADE
    "contract_fp_iffirm_fkey" FOREIGN KEY (idfirm) REFERENCES firm(idfirm) ON DELETE CASCADE
```

### __Create Code:__
```postgresql
CREATE TABLE public.contract_fp (
    idproduct integer REFERENCES product(idproduct) ON DELETE CASCADE,
    iffirm integer REFERENCES firm(idfirm) ON DELETE CASCADE,
    date_of_contract date
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.contract_fp VALUES
(1,	1,	'2021-01-01')
(2,	2,	'2000-01-01')
(3,	3,	'2021-01-01')
(4,	4,	'2020-01-01');
```