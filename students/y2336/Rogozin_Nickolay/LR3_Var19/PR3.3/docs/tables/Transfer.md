## Transfer

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Transfer_id|SMALLSERIAL|+| | | ||
|Animal_transfered_id|integer |+|+ | | ||
|Animal_id|integer||+|+ | ||
|Transfer_date|date||||| not null|
|Transfer_date_end|date||||| not null|

