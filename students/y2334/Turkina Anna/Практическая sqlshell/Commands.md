# Commands - команды

##SQL-shell

post=# create table book

post-# (id_book INTEGER NOT NULL, name_book text, authors text, zakazchik text);

CREATE TABLE

post=# create table zakaz

post-# drop table book;

ОШИБКА:  ошибка синтаксиса (примерное положение: "drop")

СТРОКА 2: drop table book;
          ^

post=# DROP table book;

DROP TABLE

post=# create table book

post-# (id_book INTEGER NOT NULL, name_book text, authors text, zakazchik text, primary key(id_book));

CREATE TABLE

post=# create table zakaz

post-# (id_zakaz INTENGER NOT NULL PRIMARY KEY, zakazchik text, book text, name_book);

ОШИБКА:  ошибка синтаксиса (примерное положение: ")")

СТРОКА 2: ...NOT NULL PRIMARY KEY, zakazchik text, book text, name_book);



^
post=# create table zakaz

post-# (id_zakaz INTENGER NOT NULL PRIMARY KEY, zakazchik text, book text, name_book);

ОШИБКА:  ошибка синтаксиса (примерное положение: ")")

СТРОКА 2: ...NOT NULL PRIMARY KEY, zakazchik text, book text, name_book);



^
post=# create table zakaz

post-# (id_zakaz INTENGER NOT NULL, zakazchik text, book text, name_book, primary key(id_zakaz));

ОШИБКА:  ошибка синтаксиса (примерное положение: ",")

СТРОКА 2: ...GER NOT NULL, zakazchik text, book text, name_book, primary ...

^
post=# create table zakaz

post-# (id_zakaz INTENGER NOT NULL, zakazchik text, book text, name_book text, primary key(id_zakaz));

ОШИБКА:  тип "intenger" не существует

СТРОКА 2: (id_zakaz INTENGER NOT NULL, zakazchik text, book text, name...
                    ^
post=# create table zakaz

post-# (id_zakaz INT NOT NULL, zakazchik text, book text, name_book text, primary key(id_zakaz));

CREATE TABLE

post=# create table zakazchik


post-# (id_zakazchik int not null, name_zakazchik text, zakazi text, primary key(id_zakazchik));

CREATE TABLE

post=# create table avtor

post-# (id_avtor int not null, name_avtor text, books text, primary key(id_avtor));

CREATE TABLE

post=# create table contract

post-# (id_contract int not null, id_meneger int, id_zakaz int, id_book int, id_avtor int, date datetime, cost int, primary key(id_contract));

ОШИБКА:  тип "datetime" не существует

СТРОКА 2: ...nt, id_zakaz int, id_book int, id_avtor int, date datetime, ...


^
post=# create table contract

post-# (id_contract int not null, id_meneger int, id_zakaz int, id_book int, id_avtor int, date date, cost int, primary key(id_contract));

CREATE TABLE

post=# create table meneger

post-# (id_meneger int not null, name_manager text, primary key(id_meneger));

CREATE TABLE

post=# create table redactor

post-# (id_redactor int not null, name_radactor text, primary key(id_redactor));

CREATE TABLE

post=# create table pravka

post-# (id_pravka int not null, id_redactor int, id_zakaz int, id_book int, text_pravki text, primary key(id_pravka));

CREATE TABLE

post=# insert into avtor values(1, "Popov Ivan", "miss, look book, mb i know you");

ОШИБКА:  столбец "Popov Ivan" не существует

СТРОКА 1: insert into avtor values(1, "Popov Ivan", "miss, look book, ...

^

post=# insert into avtor values(1, Popov Ivan, "miss, look book, mb i know you");

ОШИБКА:  ошибка синтаксиса (примерное положение: "Ivan")

СТРОКА 1: insert into avtor values(1, Popov Ivan, "miss, look book, mb...
                                            ^
post=# insert into avtor values(1, Popov Ivan, miss, look book, mb i know you);
ОШИБКА:  ошибка синтаксиса (примерное положение: "Ivan")

СТРОКА 1: insert into avtor values(1, Popov Ivan, miss, look book, mb ...
                                            ^
post=# insert into avtor values(1, 'Popov Ivan', 'miss, look book, mb i know you');

INSERT 0 1

post=# insert into avtor values(1, 'Mr Dog', 'my book');

ОШИБКА:  повторяющееся значение ключа нарушает ограничение уникальности "avtor_pkey"
ПОДРОБНОСТИ:  Ключ "(id_avtor)=(1)" уже существует.

post=# insert into avtor values(2, 'Mr Dog', 'my book');

INSERT 0 1

post=# insert into avtor values(3, 'Mr Black', 'Black or pink');

INSERT 0 1

post=# insert into book values(1, 'miss', 'Popov Ivan', 'Maria Violetin');

INSERT 0 1

post=# insert into book values(2, 'miss mamamia', 'Mr Black and Mr Dog', 'Alex Frintih');

INSERT 0 1

post=# insert into book values(3, 'miss mamamia 2', 'Mr Black and Mr Dog', 'Alex Frintih');

INSERT 0 1

post=# insert into contract values(1, 1, 1, 1, 2, 2020-12-12, 4650);

ОШИБКА:  столбец "date" имеет тип date, а выражение - integer

СТРОКА 1: insert into contract values(1, 1, 1, 1, 2, 2020-12-12, 4650)...

^

ПОДСКАЗКА:  Перепишите выражение или преобразуйте его тип.

post=# insert into contract values(1, 1, 1, 1, 2, '2020-12-12', 4650);

INSERT 0 1

post=# insert into contract values(2, 2, 2, 2, 1, '2020-12-02', 7850);

INSERT 0 1

post=# insert into contract values(3, 3, 3, 3, 3, '2021-03-29', 7420);

INSERT 0 1

post=# insert into meneger values(1, 'kamila linina');

INSERT 0 1

post=# insert into meneger values(2, 'Nikita Andreev');

INSERT 0 1

post=# insert into meneger values(3, 'Samil Jandercher');

INSERT 0 1

post=# insert into pravka values(1, 1, 1, 1, 'uhdaufhfud uaufua');

INSERT 0 1

post=# insert into pravka values(2, 2, 2, 2, 'uhdaufhfud uaufua');

INSERT 0 1

post=# insert into pravka values(3, 3, 3, 3, 'uhdaufhfud uaufua');

INSERT 0 1

post=# insert into redactor values(1, 'Mary Smith');

INSERT 0 1

post=# insert into redactor values(2, 'David Friy');

INSERT 0 1

post=# insert into redactor values(3, 'Fraud Graund');

INSERT 0 1

post=# insert into zakaz values(1, 'Mr Draut','book for hjshf usduudh dughu', 'streets London');

INSERT 0 1

post=# insert into zakaz values(2, 'Mr Kinin','book for hjshf usduudh dughu', 'My Love');

INSERT 0 1

post=# insert into zakaz values(3, 'Mr Pouk','book for hjshf usduudh dughu', 'friday');

INSERT 0 1

post=# insert into zakazchik values(1, 'David Marysteen', '1-fridom book');

INSERT 0 1

post=# insert into zakazchik values(2, 'Alex Chesters', 'not find');

INSERT 0 1

post=# insert into zakazchik values(3, 'Mariya Scoth', 'not find');

INSERT 0 1

post=#

