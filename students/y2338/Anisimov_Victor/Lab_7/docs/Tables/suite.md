## Table «suite»

| Name         | Type    | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| ------------ | ------- | :---------: | :---------: | :----: | :-------------------: | ------------- |
| id           | int     |      +      |      -      |   +    |           -           | not null      |
| number       | int     |      -      |      -      |   -    |           -           | not null      |
| status       | boolean |      -      |      -      |   -    |           -           | not null      |
| rooms_number | int     |      -      |      -      |   -    |           -           | not null      |
| cost         | int     |      -      |      -      |   -    |           -           | not null      |
| floor        | int     |      -      |      -      |   -    |        [0; 3]         | not null      |