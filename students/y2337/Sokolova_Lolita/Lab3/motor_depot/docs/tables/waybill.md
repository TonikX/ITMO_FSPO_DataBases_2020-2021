### Waybill


|Name|Type|Primary key|Foreign key|Unique|Integrity constraints|
|----|----|-----------|-----------|------|---------------------|
|id|int|+||+||
|point_of_loading|varchar||||not null|
|point_of_unloading|varchar||||not null|
|mileage_total|int||||not null|
|mileage_cargo|int||||not null|
|consignor|varchar|||||
|consignee|varchar|||||
|order_time_h|int||||not null|
|trip_id|int||trip.id|||
