#### Perfom

| Name            | Type    | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| --------------- | ------- | ----------- | ----------- | ------ | --------------------- | ------------- |
| id_perfom       | int     | +           |             | +      |                       | not null      |
| mark            | int     |             |             |        |                       | not null      |
| inermed_results | varchar |             |             |        | 30                    | not null      |
| final_results   | varchar |             |             |        | 30                    | not null      |
| id_exhibit      | int     |             | +           |        |                       | not null      |
| id_dog          | int     |             | +           |        |                       | not null      |
| id_registration | int     |             | +           |        |                       | not null      |