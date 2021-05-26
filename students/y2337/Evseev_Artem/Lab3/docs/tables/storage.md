## Storage(Хранение)

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_storage|int|+| | + | |not null|
|newspaper_id|int| |+(id_newspaper) | | | not null|
|circulation_id|int| | +(id_circulation)| | | not null|
|typography_id|int| | + (id_typography)| | | not null|
|production_id|int| | + (id_production)| | | not null|
|postoffice_id|int| | + (id_postoffice)| | | not null|
|quantity|int| | | | | not null|