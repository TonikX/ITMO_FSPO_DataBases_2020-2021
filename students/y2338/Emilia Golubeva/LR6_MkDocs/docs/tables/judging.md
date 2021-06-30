#### Judging

| Name       | Type | Primary key | Foreign key | Unique | Integrity constraints | Null/not null |
| ---------- | ---- | ----------- | ----------- | ------ | --------------------- | ------------- |
| id_judging | int  | +           |             | +      |                       | not null      |
| results    | int  |             |             |        |                       | not null      |
| id_expert  | int  |             | +           |        |                       | not null      |
| id_perfom  | int  |             | +           |        |                       | not null      |
| id_ring    | int  |             | +           |        |                       | not null      |