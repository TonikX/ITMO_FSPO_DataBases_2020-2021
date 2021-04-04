## Doctor

|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|Null/not null|
|:----|:----:|:-----------:|:-----------:|:------:|:----------------------:|:------:|
|Doctor_id|SMALLSERIAL|+| | | ||
|Doctor_dob|date||||| not null|
|Doctor_name|character| | | | 100 | not null|
|Doctor_contacts|character| | | | 100 | not null|
