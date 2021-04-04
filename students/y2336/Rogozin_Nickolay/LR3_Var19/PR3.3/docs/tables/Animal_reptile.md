## Animal_reptile

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Reptile_id|SMALLSERIAL|+| | | ||
|Animal_id|integer||+ |+ | |not null|
|Reptile_normal_temp|real| | | | | not null|
|Reptile_hyber_start|date| | | | | not null|
|Reptile_hyber_end|date| | | | | not null|
