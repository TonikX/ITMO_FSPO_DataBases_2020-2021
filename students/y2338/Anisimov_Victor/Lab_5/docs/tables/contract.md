#### Table «contract»

| Name              | Type    | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| ----------------- | ------- | :---------: | :---------: | :----: | :-------------------: | ------------- |
| id                | int     |      +      |      -      |   +    |           -           | not null      |
| status            | boolean |      -      |      -      |   -    |           -           | not null      |
| text              | text    |      -      |      -      |   -    |           -           | not null      |
| date_of_agreement | date    |      -      |      -      |   -    |           -           | not null      |
| admin_id          | int     |      -      |      +      |   -    |           -           | not null      |
| serv_id           | int     |      -      |      +      |   -    |           -           | not null      |

