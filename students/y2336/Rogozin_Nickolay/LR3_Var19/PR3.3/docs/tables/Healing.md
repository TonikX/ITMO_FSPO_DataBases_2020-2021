## Healing

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Healing_id|SMALLSERIAL|+| | | ||
|Healing_date|date| | | | | not null|
|Overseer_id|integer| |+ |+ | | not null|
|Animal_id|integer  | |+ |+ | | not null|
