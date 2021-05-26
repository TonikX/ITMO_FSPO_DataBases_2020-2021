## Production(Производство)

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_production|int|+| | + | |not null|
|circulation_id|int| | +(id_circulation)| | | not null|
|newspaper_id|int| | +(id_newspaper)| | | not null|
|typography_id|int| |+(id_typography) | | | not null|
|quantity|int| | | | | not null|