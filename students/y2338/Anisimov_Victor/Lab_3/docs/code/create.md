### Creation queries

#### Table «admin»

```
`CREATE TABLE admin (`
	`id integer PRIMARY KEY,`
	`FIO text`
`);`
```



#### Table «client»

```
`CREATE TABLE client (`
	`id integer PRIMARY KEY,`
	`FIO text,`
	`passport_data text,`
	`city_id integer,`
	`FOREIGN KEY (city_id) REFERENCES city (id)`
`);`
```



#### Table «servant»

```
`CREATE TABLE servant (`
	`id integer PRIMARY KEY,`
	`FIO text`
`);`
```



#### Table «city»

```
`CREATE TABLE city (`
	`id integer PRIMARY KEY,`
	`name text`
`);`
```



#### Table «suite»

```
`CREATE TABLE suite (`
	`id integer PRIMARY KEY,`
	`number integer,`
	`status boolean,`
	`rooms_number integer,`
	`cost integer,`
	`floor integer`
`);`
```



#### Table «living»

```
`CREATE TABLE living (`
	`id integer PRIMARY KEY,`
	`date_in date,`
	`date_out date,`
	`admin_id integer,`
	`suite_id integer,`
	`client_id integer,`
	`FOREIGN KEY (admin_id) REFERENCES admin (id),`
	`FOREIGN KEY (suite_id) REFERENCES suite (id),`
	`FOREIGN KEY (client_id) REFERENCES client (id)`
`);`
```



#### Table «cleaning»

```
CREATE TABLE cleaning (`
	`id integer PRIMARY KEY,`
	`floor integer,`
	`date date,`
	`admin_id integer,`
	`serv_id integer,`
	`suite_id integer,`
	`FOREIGN KEY (suite_id) REFERENCES suite (id),`
	`FOREIGN KEY (admin_id) REFERENCES admin (id),`
	`FOREIGN KEY (serv_id) REFERENCES servant (id)`
`);`
```



#### Table «contract»

```
`CREATE TABLE contract (`
	`id integer PRIMARY KEY,`
	`status boolean,`
	`text text,`
	`date_of_agreement date,`
	`admin_id integer,`
	`serv_id integer,`
	`FOREIGN KEY (admin_id) REFERENCES admin (id),`
	`FOREIGN KEY (serv_id) REFERENCES servant (id)`
`);`
```
