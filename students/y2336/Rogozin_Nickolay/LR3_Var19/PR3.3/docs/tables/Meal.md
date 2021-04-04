## Mela

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Meal_id|SMALLSERIAL|+| | | ||
|Meal_date_of_change|date||||| not null|
|Meal_subtype|integer||||| not null|
|Meal_title|character| | | | 500 | not null|
|Meal_content|character| | | | 100 | not null|
