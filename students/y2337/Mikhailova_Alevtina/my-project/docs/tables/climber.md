## Climber
 |Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
 |:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
 |id_climber|int|+| | + | |not null|
 |climber`s_name|varchar| | | | 30| not null|
 |club`s_name|varchar| | | |30| not null|
 |address|varchar| | | |30| not null|
 |ascent_chronicle|text| | | | | not null|
 |id_climbingClub|int| |+| | | not null|
           