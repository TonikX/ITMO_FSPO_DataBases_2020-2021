## Project documentation

Модель базы данных для страховой организации

<br>
<img src="./images/111.png">

## Model description
### <p>Таблица organization</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id | INT  | + | - | + | - |
| contract | INT  | - | - | + | - |
| code | INT  | - | - | - | - |
| full_name | VARCHAR  | - | -  | - | - |
| short_name | VARCHAR  | - | -  | - | - |
| address | VARCHAR  | - | - | - | - |
| bank_sum | INT  | - | - | - | - |
| specialization | VARCHAR  | - | - | - | -  |
| contracts_id | INT  | - | + | - | - |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`organization` (
  `id` INT NOT NULL,
  `contract` INT NOT NULL,
  `code` INT NOT NULL,
  `full_name` VARCHAR(45) NOT NULL,
  `short_name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `bank_sum` INT NULL,
  `specialization` VARCHAR(45) NOT NULL,
  `contracts_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `code_UNIQUE` (`code` ASC) VISIBLE,
  INDEX `fk_organization_contracts1_idx` (`contracts_id` ASC) VISIBLE,
  CONSTRAINT `fk_organization_contracts1`
    FOREIGN KEY (`contracts_id`)
    REFERENCES `mydb`.`contracts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
```
#### Код заполнения данных
```
INSERT INTO LaborExchange.Qualification VALUES
    (1,'31241153',5,'Александр Вдадимирович Петров','Александр В.П.','Московский проспект','1000','банк',6),
    (2,'31241153',5,'Александр Вдадимирович Петров','Александр В.П.','Московский проспект','1000','банк',6),
	(3,'31241153',5,'Александр Вдадимирович Петров','Александр В.П.','Московский проспект','1000','банк',6);
```


### <p>Таблица contracts</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id | INT  | + | -  | + | -  |
| contracts | INT  | - | -  | -  | -  |
| created_at | INT  | - | -  | -  | -  |
| start_date | DATETIME  | - | -  | -  | -  |
| finish_date | DATETIME  | - | -  | -  | -  |
| contract_id | DATETIME  | - | -  | +  | -  |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`contracts` (
  `id` INT NOT NULL,
  `contracts` INT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `start_date` DATETIME NOT NULL,
  `finish_date` DATETIME NOT NULL,
  `contract_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_contracts_contract_idx` (`contract_id` ASC) VISIBLE,
  CONSTRAINT `fk_contracts_contract`
    FOREIGN KEY (`contract_id`)
    REFERENCES `mydb`.`contract` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
```
#### Код заполнения данных
```
INSERT INTO LaborExchange.Qualification VALUES
    (1,'312411',19-05-2002,20-05-2002,21-05-2002,6),
    (2,'312411',19-05-2002,20-05-2002,21-05-2002,6),
	(3,'312411',19-05-2002,20-05-2002,21-05-2002,6);
```


### <p>Таблица contract</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id | INT  | + | - | + | - |
| payment | INT  | - | -  | -  | - |
| cooperator | INT  | - | -  | - | - |
| agent | VARCHAR  | - | -  | - | - |
| created_at | DATETIME  | - | - | - | - |
| start_date | DATETIME  | - | - | - | - |
| finish_date | DATETIME  | - | - | - | - |
| cooperator_id | INT  | - | + | - | - |
| agent_id | INT  | - | + | -  | - |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`contract` (
  `id` INT NOT NULL,
  `payment` INT NOT NULL,
  `cooperator` INT NOT NULL,
  `agent` INT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `start_date` DATETIME NULL,
  `finish_date` DATETIME NULL,
  `cooperator_id` INT NOT NULL,
  `agent_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contract_cooperator1_idx` (`cooperator_id` ASC) VISIBLE,
  INDEX `fk_contract_agent1_idx` (`agent_id` ASC) VISIBLE,
  CONSTRAINT `fk_contract_cooperator1`
    FOREIGN KEY (`cooperator_id`)
    REFERENCES `mydb`.`cooperator` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contract_agent1`
    FOREIGN KEY (`agent_id`)
    REFERENCES `mydb`.`agent` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
```
#### Код заполнения данных
```
INSERT INTO LaborExchange.Qualification VALUES
    (1,'312411','345','789789089',19-05-2002,20-05-2002,21-05-2002,4,1),
    (2,'312411','345','789789089',19-05-2002,20-05-2002,21-05-2002,4,1),
	(3,'312411','345','789789089',19-05-2002,20-05-2002,21-05-2002,4,1);
```


### <p>Таблица cooperator</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id | INT  | + | - | + | -  |
| first_name | VARCHAR | - | - | +  | - |
| second_name | VARCHAR | - | -  | - | - |
| third_name | VARCHAR | - | -  | - | - |
| age | INT  | - | - | -  | - |
| risk | VARCHAR  | - | -  | - | - |
| payments_id | INT  | - | +  | - | - |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`cooperator` (
  `id` INT NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `second_name` VARCHAR(45) NOT NULL,
  `third_name` VARCHAR(45) NULL,
  `age` INT NULL,
  `risk` VARCHAR(45) NOT NULL,
  `payments_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_cooperator_payments1_idx` (`payments_id` ASC) VISIBLE,
  CONSTRAINT `fk_cooperator_payments1`
    FOREIGN KEY (`payments_id`)
    REFERENCES `mydb`.`payments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
```
#### Код заполнения данных
```
INSERT INTO LaborExchange.Qualification VALUES
    (1,'Александр','Владимирович','Петров',45,1243,1),
    (2,'Александр','Владимирович','Петров',45,1243,1),
	(3,'Александр','Владимирович','Петров',45,1243,1);
```


### <p>Таблица payments</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id | INT  | + | - | + | - |
| insurnance_case | INT  | - | - | - | - |
| value | INT  | - | - | - | - |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`payments` (
  `id` INT NOT NULL,
  `insurnance_case` INT NOT NULL,
  `value` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
```
#### Код заполнения данных
```
INSERT INTO LaborExchange.Qualification VALUES
    (1,134124,346457),
    (2,134124,346457),
	(3,134124,346457);
```


### <p>Таблица agent</p>
| Наименование поля | Тип данных | первичный ключ | внешний ключ | уникальность | Ограничения целостности |
| ------------ | ------------- | ------------ | ------------- | ------------- | ------------- |
| id | INT  | + | - | + | - |
| first_name | VARCHAR  | - | - | + | - |
| second_name | VARCHAR  | - | - | - | - |
| third_name | VARCHAR  | - | -  | - | - |
| passport_data | VARCHAR  | - | -  | + | - |
| contract_data | VARCHAR  | - | - | + | - |

#### Код создания
```
CREATE TABLE IF NOT EXISTS `mydb`.`agent` (
  `id` INT NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `second_name` VARCHAR(45) NOT NULL,
  `third_name` VARCHAR(45) NULL,
  `passport_data` VARCHAR(45) NOT NULL,
  `contract_data` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
```
#### Код заполнения данных
```
INSERT INTO LaborExchange.Qualification VALUES
    (1,'Александр','Владимирович','Петров',7845555439,99382),
    (2,'Александр','Владимирович','Петров',7845555439,99382),
	(3,'Александр','Владимирович','Петров',7845555439,99382));
```

## Код запросов 

```
- SELECT * FROM agent WHERE first_name = "Сергей" AND passport_data = 8765777463;
- SELECT ID, first_name, second_name FROM agent WHERE third_name IS NULL;
- SELECT ID, contract, full_name FROM organization WHERE contract IN (75764, 351312);
- SELECT contract.id,contract.created_at from contract JOIN contracts where contracts.created_at < CURRENT_DATE();
- SELECT * FROM agent JOIN contract join contracts JOIN cooperator JOIN organization JOIN payments;
- SELECT id,first_name, second_name FROM agent ORDER BY id DESC;
- SELECT id, MIN(value) AS Minimum FROM payments GROUP BY value HAVING MIN(value)<1100;
- SELECT id,first_name FROM cooperator WHERE first_name LIKE 'С%';
- SELECT * FROM organization WHERE contracts_id IN (SELECT contracts_id FROM contracts WHERE contracts=97668);
- SELECT * from contract where start_date between '2021-06-03 03:37:00' and '2021-06-03 03:37:56';
```