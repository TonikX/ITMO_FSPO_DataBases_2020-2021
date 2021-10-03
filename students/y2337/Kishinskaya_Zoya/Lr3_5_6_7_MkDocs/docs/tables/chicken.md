## Chicken

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id|integer|+| | +| |not null|
|age|double precision| | | | | not null|
|weight|double precision| | | | | not null|
|performance|integer| | | |=>0 | not null|
|breed_id|int| |breed.id| | | not null|