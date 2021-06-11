# PostgreSQL 13.1

Код создания БД:
```SQL
CREATE DATABASE studing;
CREATE SCHEMA IF NOT EXISTS LaborExchange;
```

## Таблица *Квалификация*

### Описание

Наименование поля | Тип данных | Указатель на первичный ключ | Указатель на внешний ключ | Указатель уникальности | Ограничения целостности
:---: | :---: | :---: | :---: | :---: | :---:
 id          | SERIAL      | + | - | + | -
 profession  | VARCHAR(45) | - | - | - | -
 rank        | INT         | - | - | - | -
 course_name | VARCHAR(45) | - | - | - | -
 duration    | INT         | - | - | - | -

### Код создания

```SQL
CREATE TABLE IF NOT EXISTS LaborExchange.Qualification (
  id SERIAL,
  profession VARCHAR(45) NOT NULL,
  rank INT NOT NULL,
  course_name VARCHAR(45) NULL,
  duration INT NULL,
  PRIMARY KEY (id));
```

### Код заполнения данных

```SQL
INSERT INTO LaborExchange.Qualification VALUES
    (1,'Сантехник',5,'Сантехник 5-го разряда: как и зачем',170),
    (2,'Python программист',0,'Python for dummies',40);
```

## Таблица *Соискатель*

### Описание

Наименование поля | Тип данных | Указатель на первичный ключ | Указатель на внешний ключ | Указатель уникальности | Ограничения целостности
:---: | :---: | :---: | :---: | :---: | :---:
 id                  | SERIAL       | + | -                | + | -
 qualification_id    | VARCHAR(45)  | - | Qualification.id | - | -
 expirience          | INT          | - | -                | - | -
 benefit             | INT          | - | -                | - | -
 contact_details     | VARCHAR(100) | - | -                | - | -
 education           | VARCHAR(45)  | - | -                | - | -
 resume_posting_date | DATE         | - | -                | - | -
 benefit_start_date  | DATE         | - | -                | - | -
 benefit_end_date    | DATE         | - | -                | - | -

### Код создания

```SQL
CREATE TABLE IF NOT EXISTS LaborExchange.Applicant (
  id SERIAL,
  qualification_id INT NOT NULL,
  expirience INT DEFAULT 0 NOT NULL,
  benefit INT DEFAULT 0 NOT NULL,
  contact_details VARCHAR(100) NOT NULL,
  education VARCHAR(45) NOT NULL,
  resume_posting_date DATE NOT NULL,
  benefit_start_date DATE NULL,
  benefit_end_date DATE NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_Applicant_Qualification
    FOREIGN KEY (qualification_id)
    REFERENCES LaborExchange.Qualification (id));
```

### Код заполнения данных

```SQL
INSERT INTO LaborExchange.Applicant VALUES 
    (1,1,0000000024,0000000000,'Contacts','Высшее сантехническое','2020-02-20',NULL,NULL),
    (2,2,0000000006,0000000000,'Contacts2','Высшее техническое','2020-02-21',NULL,NULL);
```

## Таблица *Работодатель*

### Описание

Наименование поля | Тип данных | Указатель на первичный ключ | Указатель на внешний ключ | Указатель уникальности | Ограничения целостности
:---: | :---: | :---: | :---: | :---: | :---:
 id                  | SERIAL       | + | -                | + | -
 name                | VARCHAR(45)  | - | -                | - | -
 address             | VARCHAR(100) | - | -                | - | -
 Email               | VARCHAR(100) | - | -                | - | -
 contact_person      | VARCHAR(45)  | - | -                | - | -
 phone_number        | BIGINT       | - | -                | - | -

### Код создания

```SQL
CREATE TABLE IF NOT EXISTS LaborExchange.Employer (
  id SERIAL,
  name VARCHAR(45) NOT NULL,
  address VARCHAR(100) NOT NULL,
  Email VARCHAR(100) NOT NULL,
  contact_person VARCHAR(45) NOT NULL,
  phone_number BIGINT NOT NULL,
  PRIMARY KEY (id));
```

### Код заполнения данных

```SQL
INSERT INTO LaborExchange.Employer VALUES
    (1,'ЖКХ Петроградского района','Каменноостровский пр., 19/13','jkh@spb.ru','Директор Иванов Иван Иванович',88124994911),
    (2,'Microsoft','Аптекарская наб., 20, Санкт-Петербург, 197022','admin@microsoft.com','Генеральный директор Сатья Наделла',88002008001);
```

## Таблица *Вакансия*

### Описание

Наименование поля | Тип данных | Указатель на первичный ключ | Указатель на внешний ключ | Указатель уникальности | Ограничения целостности
:---: | :---: | :---: | :---: | :---: | :---:
 id                         | SERIAL       | + | -                | + | -
 employer_id                | INT          | - | Employer.id      | - | -
 necessary_qualification_id | INT          | - | Qualification.id | - | -
 necessary_experience       | INT          | - | -                | - | -
 necessary_education        | VARCHAR(45)  | - | -                | - | -
 posting_date               | DATE         | - | -                | - | -

### Код создания

```SQL
CREATE TABLE IF NOT EXISTS LaborExchange.Vacancy (
  id SERIAL,
  employer_id INT NOT NULL,
  necessary_qualification_id INT NOT NULL,
  necessary_experience INT NOT NULL,
  necessary_education VARCHAR(45) NOT NULL,
  posting_date DATE NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_Vacancy_Employer1
    FOREIGN KEY (employer_id)
    REFERENCES LaborExchange.Employer (id),
  CONSTRAINT fk_Vacancy_Qualification1
    FOREIGN KEY (necessary_qualification_id)
    REFERENCES LaborExchange.Qualification (id));
```

### Код заполнения данных

```SQL
INSERT INTO LaborExchange.Vacancy VALUES
    (1,1,1,18,'Среднее сантехническое','2021-01-20'),
    (2,2,2,6,'Высшее техническое','2021-02-01');
```

## Таблица *Найм*

### Описание

Наименование поля | Тип данных | Указатель на первичный ключ | Указатель на внешний ключ | Указатель уникальности | Ограничения целостности
:---: | :---: | :---: | :---: | :---: | :---:
 id                  | SERIAL       | + | -                | + | -
 applicant_id        | INT          | - | Applicant.id     | - | -
 vacancy_id          | INT          | - | Vacancy.id       | - | -
 salary              | INT          | - | -                | - | -


### Код создания

```SQL
CREATE TABLE IF NOT EXISTS LaborExchange.Hiring (
  id SERIAL,
  applicant_id INT NOT NULL,
  vacancy_id INT NOT NULL,
  salary INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_Hiring_Applicant1
    FOREIGN KEY (applicant_id)
    REFERENCES LaborExchange.Applicant (id),
  CONSTRAINT fk_Hiring_Vacancy1
    FOREIGN KEY (vacancy_id)
    REFERENCES LaborExchange.Vacancy (id));
```

### Код заполнения данных

```SQL
INSERT INTO LaborExchange.Hiring VALUES
    (1,1,1,120000),
    (2,2,2,50000);
```

## Таблица *Прохождение курса*

### Описание

Наименование поля | Тип данных | Указатель на первичный ключ | Указатель на внешний ключ | Указатель уникальности | Ограничения целостности
:---: | :---: | :---: | :---: | :---: | :---:
 id                  | SERIAL       | + | -                | + | -
 passing_date        | VARCHAR(45)  | - | -                | - | -
 qualification_id    | INT          | - | Qualification.id | - | -
 applicant_id        | INT          | - | Applicant.id     | - | -

### Код создания

```SQL
CREATE TABLE IF NOT EXISTS LaborExchange.Course_Passing (
  id SERIAL,
  passing_date VARCHAR(45) NOT NULL,
  qualification_id INT NOT NULL,
  applicant_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_Course_Passing_Qualification1
    FOREIGN KEY (qualification_id)
    REFERENCES LaborExchange.Qualification (id),
  CONSTRAINT fk_Course_Passing_Applicant1
    FOREIGN KEY (applicant_id)
    REFERENCES LaborExchange.Applicant (id));
```

### Код заполнения данных

```SQL
INSERT INTO LaborExchange.Course_Passing VALUES
    (1,'2019-10-29',1,1),
    (2,'2020-01-05',2,2);
```
