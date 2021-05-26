## Circulation(Тираж)

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_circulation|int|+| | + | |not null|
|quantity|int| | | | | not null|
|newspaper_id|int| |+(id_newspaper)|  | | not null|