## Contract

 |Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
 |:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
 |id_contract|integer|+| | + | |not null|
 |conditions|character varying| | | |100| not null|
 |id_admin|integer| |+| | | not null|
 |id_clerk|integer| |+| | | not null|
