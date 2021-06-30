## Emergency Situation
 
 |Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
 |:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
 |id_emergencySituation|int|+| | + | |not null|
 |reason|text| | | | | not null|
 |id_admin|int| |+| | | not null|
 |id_group|intr| |+| | | not null|
 |id_climber|int| |+| | | not null|
 |id_climbingClub|int| |+| | | not null|
 |id_route|int| |+| | | not null|
 |id_top|int| |+| | | not null|