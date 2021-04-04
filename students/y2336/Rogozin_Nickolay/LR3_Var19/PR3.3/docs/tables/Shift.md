## Shift

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Shift_id|SMALLSERIAL|+| | | ||
|Shift_date|date| | | | | not null|
|Overseer_id|integer| |+ |+ | | not null|
|Animal_id|integer  | |+ |+ | | not null|
