## Inhabitation

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_inhabitation|int|+| | + | |not null|
|accomodations|varchar| | | | 20| not null|
|check_in_date|date| | | | | not null|
|check_out_date|date| | | | | not null|
|client_id|int| | + (id_client)| | | not null|
|room_id|int| | + (id_room)| | | not null|