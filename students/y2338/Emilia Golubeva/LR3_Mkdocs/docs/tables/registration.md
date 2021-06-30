#### Registration

| Name            | Type    | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| --------------- | ------- | ----------- | ----------- | ------ | --------------------- | ------------- |
| id_registration | int     | +           |             | +      |                       | not null      |
| receipt         | int     |             |             |        |                       | not null      |
| status          | boolean |             |             |        | 30                    | not null      |
| id_owner        | int     |             | +           |        |                       | not null      |