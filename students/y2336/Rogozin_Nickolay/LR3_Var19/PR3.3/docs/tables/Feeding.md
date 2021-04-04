## Feeding

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Feeding_id|SMALLSERIAL|+| | | ||
|Feeding_date|date| | | | | not null|
|Meal_id|integer| |+ |+ | | not null|
|Animal_id|integer  | |+ |+ | | not null|
