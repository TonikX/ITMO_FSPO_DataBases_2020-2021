#### Dog

| Name        | Type    | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| ----------- | ------- | ----------- | ----------- | ------ | --------------------- | ------------- |
| id_dog      | int     | +           |             | +      |                       | not null      |
| dog_name    | varchar |             |             |        | 30                    | not null      |
| passport    | int     |             |             |        |                       | not null      |
| id_dog_club | int     |             |             |        |                       | not null      |
| contract    | boolean |             |             |        |                       | not null      |