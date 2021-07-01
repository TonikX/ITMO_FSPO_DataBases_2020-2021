## Table «client»

| Name          | Type | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| ------------- | ---- | :---------: | :---------: | :----: | :-------------------: | ------------- |
| id            | int  |      +      |      -      |   +    |           -           | not null      |
| fio           | text |      -      |      -      |   -    |           -           | not null      |
| passport_data | text |      -      |      -      |   +    |           -           | not null      |
| city_id       | int  |      -      |      +      |   -    |           -           | not null      |

