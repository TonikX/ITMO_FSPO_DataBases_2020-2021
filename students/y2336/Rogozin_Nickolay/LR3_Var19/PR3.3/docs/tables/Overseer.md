## Overseer

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Overseer_id|SMALLSERIAL|+| | | ||
|Overseer_dob|date||||| not null|
|Overseer_name|character| | | | 100 | not null|
|Overseer_contacts|character| | | | 100 | not null|
