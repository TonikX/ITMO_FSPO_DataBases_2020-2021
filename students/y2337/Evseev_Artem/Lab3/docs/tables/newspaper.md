## Newspaper(Газета)

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_newspaper|int|+| | + | |not null|
|name|varchar| | | | 20| not null|
|price|float| | | + | | not null|
|full_name_editor|varchar| | | | 40| not null|
|publication_index|int| | | | | not null|