## Worker

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id|integer|+| |+ | |not null|
|salary|double precision| | | | =>0 | not null|
|pass|integer| | | | | not null|
|fio|character varying| | | | | not null|
|contract|character varying| | | | | not null|