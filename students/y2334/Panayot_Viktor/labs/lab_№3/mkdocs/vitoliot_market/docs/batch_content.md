## __Batch_content__
|Column               |Type           |PK   |FK   |Unique|
|---------------------|---------------|:---:|:---:|:----:|
|idbatch              | integer       |False|True |False |
|idproduct            | integer       |False|True |False |
|date_of_receipt      | date          |False|True |False |

### __Constraints__:
```postgresql
'batch_content_idbatch_fkey' FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
'batch_content_idproduct_fkey' FOREIGN KEY (idproduct) REFERENCES product(ifproduct) ON DELETE CASCADE
```
### __Create Code:__
```postgresql
CREATE TABLE public.batch_content (
    idbatch integer REFERENCES batch(idbatch) ON DELETE CASCADE,
    idproduct integer REFERENCES product(ifproduct) ON DELETE CASCADE,
    date_of_receipt date
);
```

### __Insert Code:__
```postgresql
INSERT INTO public.batch_content VALUES (1,	1,	2021-03-15),
(1,	4,	'2021-03-15'),
(2,	2,	'2000-03-15'),
(3,	3,	'2021-03-15');
```