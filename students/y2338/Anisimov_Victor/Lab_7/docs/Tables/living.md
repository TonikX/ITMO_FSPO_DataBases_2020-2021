## Table «living»

| Name      | Type | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| --------- | ---- | :---------: | :---------: | :----: | :-------------------: | ------------- |
| id        | int  |      +      |      -      |   +    |           -           | not null      |
| date_in   | date |      -      |      -      |   -    |           -           | not null      |
| date_out  | date |      -      |      -      |   -    |           -           | not null      |
| admin_id  | int  |      -      |      +      |   -    |           -           | not null      |
| suite_id  | int  |      -      |      +      |   -    |           -           | not null      |
| client_id | int  |      -      |      +      |   -    |           -           | not null      |

