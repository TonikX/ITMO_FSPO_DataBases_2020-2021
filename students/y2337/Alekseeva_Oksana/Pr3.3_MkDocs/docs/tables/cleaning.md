## Cleaning

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_cleaning|int|+| | + | |not null|
|cleaning_floor|int| | | | | not null|
|cleaning_day|date| | | | | not null|
|admin_id|int| | + (id_admin)| | | not null|
|employee_id|int| | + (id_employee)| | | not null|