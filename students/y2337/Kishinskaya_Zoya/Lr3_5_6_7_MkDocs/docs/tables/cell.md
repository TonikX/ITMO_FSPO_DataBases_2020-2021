## Cell

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id|integer|+| | +| | not null|
|num_row|integer| | | | >0| not null|
|num|integer| | | | >0| not null|
|workshop_id|integer| | workshop.id| | | not null|
