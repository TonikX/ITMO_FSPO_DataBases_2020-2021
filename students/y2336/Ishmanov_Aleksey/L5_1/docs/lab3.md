## Project documentation

### <p>Таблица material</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id_material | INT  | + | - | + | - |
| name | VARCHAR  | - | -  | + | - |
| short_name | VARCHAR  | - | -  | - | - |
| character | VARCHAR  | - | - | - | - |
| cost | INT  | - | - | - | - |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`material` (
  `id_material` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `character` VARCHAR(45) NOT NULL,
  `cost` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
```
#### Код заполнения данных
```
INSERT INTO mydb.material VALUES
    (1,'L1', 'lorem', 300),
    (2,'L2', 'ipsum', 500),
    (3,'L3', 'sit', 700),
```

### <p>Таблица order</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id_order | INT  | + | -  | + | -  |
| amount | INT  | - | -  | -  | -  |
| terms | VARCHAR(250)  | - | -  | -  | -  |
| project | INT  | - | +  | -  | -  |
| tailor | INT  | - | +  | -  | -  |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`order` (
  `id_order` INT NOT NULL,
  `amount` INT NOT NULL,
  `terms` VARCHAR(250) NOT NULL,
  `project` INT NULL,
  `tailor` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_order_project1`
    FOREIGN KEY (`project`)
    REFERENCES `mydb`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_tailor1`
    FOREIGN KEY (`tailor`)
    REFERENCES `mydb`.`tailor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
```
#### Код заполнения данных
```
INSERT INTO LaborExchange.Qualification VALUES
    (1,100, 'Lorem ipsum dolor sit amet, consectetur adip', 1),
    (2, 200, 'Lorem ipsum dolor sit amet, consectetur adip', 1),
	(3, 300, 'Lorem ipsum dolor sit amet, consectetur adip', 1);
```

### <p>Таблица project</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id_proj | INT  | + | - | + | - |
| designer_name | VARCHAR(50)  | - | -  | -  | - |
| approval_date | DATETIME  | - | -  | - | - |
| cost | INT  | - | -  | - | - |


#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`project` (
  `id_proj` INT NOT NULL,
  `designer_name` VARCHAR(50) NOT NULL,
  `approval_date` DATETIME NOT NULL,
  `cost` INT NOT NULL,
  PRIMARY KEY (`id_proj`),
```
#### Код заполнения данных
```
INSERT INTO 'mydb`.`contract` VALUES
    (1,'Aleks',19-05-2002, 1000),
    (2,'Varvar',19-05-2002, 1900),
    (3,'Globglob',19-05-2002, 1300),
```

### <p>Таблица provision</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id_prov | INT  | + | - | + | -  |
| size | INT | - | - | -  | - |
| cost | INT | - | -  | - | - |
| project | INT | - | -  | + | - |
| material | INT  | - | - | +  | - |


#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`provision` (
  `id_prov` INT NOT NULL,
  `size` INT NOT NULL,
  `cost` INT NOT NULL,
  `project` INT NOT NULL,
  `material` INT NOT NULL,
  PRIMARY KEY (`id_prov`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_order_project1`
    FOREIGN KEY (`project`)
    REFERENCES `mydb`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_material1`
    FOREIGN KEY (`material`)
    REFERENCES `mydb`.`material` (`material`)(`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
```
#### Код заполнения данных
```
INSERT INTO mydb.provision VALUES
    (1, 1, 100, 1, 1),
    (2, 1, 200, 1, 1),
    (3, 1, 300, 1, 1),
```

### <p>Таблица tailor</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id | INT  | + | - | + | - |
| insurnance_case | INT  | - | - | - | - |
| value | INT  | - | - | - | - |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`tailor` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `exp` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
```
#### Код заполнения данных
```
INSERT INTO mydb.tailor VALUES
    (1,'A',123),
    (2,'B',123),
    (3,'C',123),
```

## Код запросов 

```
- SELECT * FROM material WHERE name = "lorem" AND cost = 500;
- SELECT id_material, name, short_name, character, cost FROM material WHERE cost < 500;
- SELECT id_material, name, short_name, character, cost FROM material WHERE cost IN (200, 300, 500, 700)
- SELECT project.id,project.approval_date from project JOIN project where provision.cost < 1000;
- SELECT * FROM project JOIN provision JOIN order
- SELECT id_material, name, short_name, character, cost FROM material WHERE cost < 500 ORDER BY id DESC;
- SELECT id_material, name, short_name, character, cost FROM material WHERE cost < 500 GROUP BY cost HAVING MIN(cost)>100;
- SELECT * FROM material WHERE short_name LIKE "L%";
- SELECT * FROM provision WHERE provision.id IN (SELECT material_id FROM material WHERE cost>100);
- SELECT * from project WHERE approval_date between '2016-06-03 03:37:00' and '2021-06-03 03:37:56';
```
