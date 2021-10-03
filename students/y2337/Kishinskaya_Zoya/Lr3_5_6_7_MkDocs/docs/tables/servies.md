## Serving

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|id|integer|+| |+ | |not null|
|date_serving|date| | | | | not null|
|cell_id|integer| | cell.id| | | not null|
|worker_id|integer| |worker.id | | | not null|