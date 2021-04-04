## Settling

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Settling_id|SMALLSERIAL|+| | | ||
|Settling_date|date| | | | | not null|
|Cage_id|integer| |+ |+ | | not null|
|Animal_id|integer  | |+ |+ | | not null|
