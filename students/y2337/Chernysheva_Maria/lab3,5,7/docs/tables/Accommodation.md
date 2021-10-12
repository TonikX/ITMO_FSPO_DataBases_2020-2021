## Accommodation

 |Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
 |:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
 |id_accommodation|integer|+| | + | |not null|
 |check_out_date|date| | | | | not null|
 |check_in_date|date| | | | | not null|
 |id_room|integer| |+| | | not null|
 |id_residing|integer| |+| | | not null|
 |id_clerk|integer| |+| | | not null|
 |id_order|integer| |+| | | not null|
 |id_admin|integer| |+| | | not null|