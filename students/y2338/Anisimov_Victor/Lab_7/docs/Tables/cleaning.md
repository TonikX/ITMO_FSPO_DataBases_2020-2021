## Table «cleaning»

| Name      | Type | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| --------- | ---- | :---------: | :---------: | :----: | :-------------------: | ------------- |
| id        | int  |      +      |      -      |   +    |           -           | not null      |
| floor     | int  |      -      |      -      |   -    |           -           | not null      |
| date      | date |      -      |      -      |   -    |           -           | not null      |
| admin_id  | int  |      -      |      +      |   -    |           -           | not null      |
| serv_id   | int  |      -      |      +      |   -    |           -           | not null      |
| csuite_id | int  |      -      |      +      |   -    |           -           | not null      |

