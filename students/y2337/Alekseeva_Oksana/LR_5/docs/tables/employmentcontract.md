## Employment contract

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id_contract|int|+| | + | |not null|
|terms_of_an_agreement|varchar| | | | 70| not null|
|hiring_date|date| | | | | not null|
|admin_id|int| | + (id_admin)| | | not null|
|employee_id|int| | + (id_employee)| | | not null|