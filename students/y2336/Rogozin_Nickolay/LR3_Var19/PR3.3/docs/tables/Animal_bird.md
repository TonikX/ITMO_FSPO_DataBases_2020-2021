## Animal_bird

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Bird_id|SMALLSERIAL|+| | | ||
|Animal_id|integer||+|| | not null|
|Bird_flyover|boolean| | | | | not null|
|Bird_flyover_id|integer| | | | | |
|Bird_flyover_out|date| | | | | |
|Bird_flyover_back|date| | | |  | |
|Bird_flyover_place|character| | | | 50 | |
