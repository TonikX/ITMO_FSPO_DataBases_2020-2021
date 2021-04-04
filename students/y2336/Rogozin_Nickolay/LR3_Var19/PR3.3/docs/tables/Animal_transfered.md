## Animal_transfered

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Animal_transfered_id|SMALLSERIAL|+| | | ||
|Animal_transfered_type|character| | | | 30| not null|
|Animal_transfered_dob|date| | | | | not null|
|Animal_transfered_sex|character| | | | 1| not null|
|Animal_transfered_cost|real| | | | | not null|
|Animal_transfered_owner|character| | | | 100| not null|
