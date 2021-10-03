## Breed

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id|integer|+| |+ | |not null|
|name|character varying| | | |20 | not null|
|breed_weight|double precision| | | |>0 |not null|
|breed_performance|integer| | | | =>0|not null|
|diet_id|integer| |diet.id | | |not null|