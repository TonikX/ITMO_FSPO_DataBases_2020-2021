## Ascent 
 
 |Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
 |:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
 |ascent_date|date| | | | |not null|
 |ascent_success|text| | | | | not null|
 |ascent_duration|time with time zone| | | | | not null|
 |id_admin|int| |+| | | not null|
 |id_group|int| |+| | | not null|
 |id_top|int| |+| | | not null|
 |id_route|int| |+| | | not null|
 |ascent_time|time without time zone| | | | | not null|
 