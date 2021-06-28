## Worker

 |Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
 |:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
 |id_worker|int|+| | + | |not null|
 |fio|varchar| | | | 30| not null|
 |birthday|date| | | | | not null|
 |post|varchar| | | | 30| not null|
 |email|varchar| | | | 30| not null|
 |phone_number|varchar| | | | 12| not null|