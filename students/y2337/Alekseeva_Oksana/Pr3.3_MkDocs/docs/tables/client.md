## Client

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_client|int|+| | + | |not null|
|full_name|varchar| | | | 60| not null|
|passport_id|int| | | + | | not null|
|city|varchar| | | | 45| not null|