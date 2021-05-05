### plants

|Name|Type|Primary key|Foreign key|Unique|Intergrity constraints|
|----|----|-----------|-----------|------|----------------------|
|id|int|+||+||
|plant_type|int||plant_type.id|||
|zone_id|int||||not null|
|planting_date|date|||||
|age|int|||||
|watering_regime|int||watering_regime.id|||
|watering_time|time||||not null|
|water_amount|int||||not null|
