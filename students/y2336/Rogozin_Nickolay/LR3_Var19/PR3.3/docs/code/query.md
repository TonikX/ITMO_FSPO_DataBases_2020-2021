## Запросы

#### 1 - Выбор животного и его лечений по номеру
```
SELECT animals.id, sex, type, healing.id, date  FROM lr3.animals, lr3.healing WHERE animals.id = '1' GROUP BY animals.id, healing.id;
``` 
