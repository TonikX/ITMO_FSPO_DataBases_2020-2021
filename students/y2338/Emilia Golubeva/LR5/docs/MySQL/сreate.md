## Create

#### Создание таблицы "Dog"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Dog` (
  `id_dog` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `passport` VARCHAR(45) NOT NULL,
  `date_vaccination` DATETIME NOT NULL,
  `members_club` VARCHAR(30) NOT NULL,
  `id_owner` INT NOT NULL,
  PRIMARY KEY (`id_dog`),
  INDEX `fk_Dog_Owner1_idx` (`id_owner` ASC) VISIBLE,
  CONSTRAINT `fk_Dog_Owner1`
    FOREIGN KEY (`id_owner`)
    REFERENCES `sos`.`Owner` (`id_owner`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  ENGINE = InnoDB;
```


#### Создание таблицы "Owner"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Owner` (
  `id_owner` INT NOT NULL,
  `FN` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_owner`))
ENGINE = InnoDB;
```


#### Создание таблицы "Registration"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Registration` (
  `id_registration` INT NOT NULL,
  `chequel` INT NOT NULL,
  `status` INT NOT NULL,
  `id_exhibition` INT NOT NULL,
  `id_dog` INT NOT NULL,
  `id_owner` INT NOT NULL,
  PRIMARY KEY (`id_registration`),
  INDEX `fk_Registration_Exhibition1_idx` (`id_exhibition` ASC) VISIBLE,
  INDEX `fk_Registration_Dog1_idx` (`id_dog` ASC) VISIBLE,
  INDEX `fk_Registration_Owner1_idx` (`id_owner` ASC) VISIBLE,
  CONSTRAINT `fk_Registration_Exhibition1`
    FOREIGN KEY (`id_exhibition`)
    REFERENCES `sos`.`Exhibition` (`id_exhibition`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registration_Dog1`
    FOREIGN KEY (`id_dog`)
    REFERENCES `sos`.`Dog` (`id_dog`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registration_Owner1`
    FOREIGN KEY (`id_owner`)
    REFERENCES `sos`.`Owner` (`id_owner`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
 ENGINE = InnoDB;
```


#### Создание таблицы "Expert"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Expert` (
  `id_expert` INT NOT NULL AUTO_INCREMENT,
  `contract` INT NOT NULL,
  `Fn` VARCHAR(45) NOT NULL,
  `expert_club` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_expert`))
 ENGINE = InnoDB;
```


#### Создание таблицы "Ring"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Ring` (
  `id_Ring` INT NOT NULL,
  `ring_number` INT NOT NULL,
  PRIMARY KEY (`id_Ring`))
 ENGINE = InnoDB;
```


#### Создание таблицы "Performance in the ring"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Perfomance in the ring` (
  `id_perfomance` INT NOT NULL,
  `grade` INT NOT NULL,
  `interm_results` VARCHAR(45) NULL,
  `final_rating` VARCHAR(30) NOT NULL,
  `id_ring` INT NOT NULL,
  `id_dog` INT NOT NULL,
  `id_exhibition` INT NOT NULL,
  PRIMARY KEY (`id_perfomance`),
  INDEX `fk_Perfomance in the ring_Ring1_idx` (`id_ring` ASC) VISIBLE,
  INDEX `fk_Perfomance in the ring_Dog1_idx` (`id_dog` ASC) VISIBLE,
  INDEX `fk_Perfomance in the ring_Exhibition1_idx` (`id_exhibition` ASC) VISIBLE,
  CONSTRAINT `fk_Perfomance in the ring_Ring1`
    FOREIGN KEY (`id_ring`)
    REFERENCES `sos`.`Ring` (`id_Ring`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Perfomance in the ring_Dog1`
    FOREIGN KEY (`id_dog`)
    REFERENCES `sos`.`Dog` (`id_dog`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Perfomance in the ring_Exhibition1`
    FOREIGN KEY (`id_exhibition`)
    REFERENCES `sos`.`Exhibition` (`id_exhibition`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
```



#### Создание таблицы "Exhibition"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Exhibition` (
  `id_exhibition` INT NOT NULL,
  `type` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_exhibition`))
ENGINE = InnoDB;
```



#### Создание таблицы "Judging"

```sql
CREATE TABLE IF NOT EXISTS `sos`.`Judging` (
  `id_judging` INT NOT NULL AUTO_INCREMENT,
  `results` VARCHAR(45) NOT NULL,
  `id_ring` INT NOT NULL,
  `id_expert` INT NOT NULL,
  PRIMARY KEY (`id_judging`),
  INDEX `fk_Judging_Ring1_idx` (`id_ring` ASC) VISIBLE,
  INDEX `fk_Judging_Expert1_idx` (`id_expert` ASC) VISIBLE,
  CONSTRAINT `fk_Judging_Ring1`
    FOREIGN KEY (`id_ring`)
    REFERENCES `sos`.`Ring` (`id_Ring`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Judging_Expert1`
    FOREIGN KEY (`id_expert`)
    REFERENCES `sos`.`Expert` (`id_expert`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
```

