## Stay

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id|integer|+| | +| |not null|
|date_start|date| | | | | not null|
|date_delete|date| | | | | not null|
|chicken_id|integer| |chicken.id| | | not null|
|cell_id|integer| |cell.id| | | not null|