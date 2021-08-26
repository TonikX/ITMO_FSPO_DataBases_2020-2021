## Cage

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Cage_id|SMALLSERIAL|+| | | ||
|Cage_building_id|integer||||| not null|
|Cage_size|integer| | | | | not null|
|Cage_isolated|boolean| | | | | not null|
|Cage_department|character| | | | 30 | not null|
|Cage_additionals|character| | | | 100 | not null|

