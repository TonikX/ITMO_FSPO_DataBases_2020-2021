## Заполнение

#### Заполнение Животных
```
INSERT INTO Animal (Animal_type, Animal_dob, Animal_sex) VALUES 
('Mamal', '01.01.2001', 'M'),
  ('Bird', '02.02.2002', 'F'),
    ('Reptile', '03.03.2003', 'M'),
        ('Bird', '04.04.2004', 'M'),
          ('Mamal', '22.22.2000', 'M');
```
#### Заполнение Птиц
```
INSERT INTO Animal_bird (Animal_id, Bird_flyover, Bird_flyover_id, Bird_flyover_out, Bird_flyover_back, Bird_flyover_place) VALUES 
(2, TRUE, 1, '22.22.2000', '23.22.2000', 'New Zeland'),
  (2, FALSE);
```
#### Заполнение Рептилий
```
INSERT INTO Animal_reptile (Animal_id, Reptile_normal_temp, Reptile_hyber_start, Reptile_hyber_end) VALUES 
(3, 36.6, '22.22.2000', '23.22.2000');
```

#### Заполнение Животных по обмену
```
INSERT INTO Animal_transfered (Animal_transfered_dob, Animal_transfered_sex, Animal_transfered_cost, Animal_transfered_owner, Animal_transfered_type) VALUES 
('22.22.2000', 'M', 2000, 'Owner', 'Mamal');
```

#### Заполнение Клетки
```
INSERT INTO Cage (Cage_building_id, Cage_size, Cage_isolated, Cage_department, Cage_additions) VALUES 
('22.22.2000', 'M', 2000, 'Owner', 'Mamal');
```
#### Заполнение Доктора
```
INSERT INTO Doctor (Doctor_dob, Doctor_name, Doctor_contacts) VALUES 
('22.22.2000', 'Firstname Lastname', 'contact@me.com');
```
#### Заполнение Надзирателя
```
INSERT INTO Overseer (Overseer_dob, Overseer_name, Overseer_contacts) VALUES 
('20.20.2001', 'Firstname Lastname', 'contact@me.com');
```
#### Заполнение Плана питания
```
INSERT INTO Cage (Meal_date_of_change, Meal_subtype, Meal_title, Meal_content) VALUES 
('22.22.2000', 1, 'mealOne', 'food');
```
#### Заполнение Обмена
```
INSERT INTO Cage (Animal_id, Animal_transfered_id, Transfer_date, Transfer_date_end) VALUES 
(5, 1, '22.22.2000','22.22.2020');
```
#### Заполнение Смена
```
INSERT INTO Cage (Shift_date, Animal_id, Overseer_id) VALUES 
('22.22.2020', 5, 1);
```
#### Заполнение Заселение
```
INSERT INTO Cage (Settling_date, Animal_id, Cage_id) VALUES 
('22.22.2020', 5, 1);
```
#### Заполнение Лечение
```
INSERT INTO Cage (Healing_date, Animal_id, Doctor_id) VALUES 
('22.22.2020', 5, 1);
```
#### Заполнение Кормление
```
INSERT INTO Cage (Feeding_date, Animal_id, Meal_id) VALUES 
('22.22.2020', 5, 1);
```
