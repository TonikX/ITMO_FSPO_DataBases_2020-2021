## Код создания БД
```
CREATE DATABASE newspaper;

USE newspaper;

CREATE TABLE typography (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  status VARCHAR(45) NOT NULL,
  address VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE pochta (
  id INT NOT NULL AUTO_INCREMENT,
  number INT NOT NULL,
  address VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE newspaper (
  id INT NOT NULL AUTO_INCREMENT,
  price FLOAT NOT NULL,
  title VARCHAR(45) NOT NULL,
  t_index INT NOT NULL,
  editor VARCHAR(45) NOT NULL,
  author_name VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE tirazh (
  id INT NOT NULL AUTO_INCREMENT,
  count INT NOT NULL,
  id_newspaper INT NOT NULL,
  PRIMARY KEY (id),
    FOREIGN KEY (id_newspaper)
    REFERENCES newspaper(id)
);

CREATE TABLE proizvodstvo (
  id INT NOT NULL AUTO_INCREMENT,
  pechat DATE NOT NULL,
  count INT NOT NULL,
  id_tirazha INT NOT NULL,
  id_typography INT NOT NULL,
  PRIMARY KEY (id),
    FOREIGN KEY (id_tirazha)
    REFERENCES tirazh (id),
    FOREIGN KEY (id_typography)
    REFERENCES typography (id)
);

CREATE TABLE storage (
  id INT NOT NULL AUTO_INCREMENT,
  count INT NOT NULL,
  pochta_id INT NOT NULL,
  proizvodstvo_id INT NOT NULL,
  PRIMARY KEY (id),
    FOREIGN KEY (pochta_id)
    REFERENCES pochta (id),
    FOREIGN KEY (proizvodstvo_id)
    REFERENCES proizvodstvo (id)
);

```
