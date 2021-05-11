## __Contract_BCB__
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
| idbroker            | integer       |False|True |False |
| idcustomer          | integer       |False|True |False |
| idbatch             | integer       |False|True |False |
| date_of_conclusion  | date          |False|False|False |

### __Constraints__:
```postgresql
'contract_bcb_idbatch_fkey' FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
'contract_bcb_idbroker_fkey' FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
'contract_bcb_idcustomer_fkey' FOREIGN KEY (idcustomer) REFERENCES customer(idcustomer) ON DELETE CASCADE
```
### __Create Code:__
```postgresql
CREATE TABLE public.contract_bcb (
    idbroker integer REFERENCES broker(idbroker) ON DELETE CASCADE,
    idcustomer integer REFERENCES customer(idcustomer) ON DELETE CASCADE,
    idbatch integer REFERENCES batch(idbatch) ON DELETE CASCADE,
    date_of_conclusion date
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.contract_BCB VALUES 
(1,	1,	1,	'2021-02-10'),
(2,	2,	2,	'2021-03-20'),
(3,	3,	3,	'2021-10-10');
```