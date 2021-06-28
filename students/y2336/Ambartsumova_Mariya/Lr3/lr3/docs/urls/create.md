## Creating

#### Создание таблицы "Клиент":
```
CREATE TABLE "klient" (
  "id" SERIAL PRIMARY KEY,
    "passport" int,
	"name" varchar,
	  "arrival_city" varchar
	  );
```
#### Создание таблицы "Заселение":
```
CREATE TABLE "check_in" (
  "id" SERIAL PRIMARY KEY,
    date date,
	"hotel_number_id" int,
		"klient_id" int,
			"administrator_id" int,
				time time
		);
```
#### Создание таблицы "Номер отеля":
```
CREATE TABLE "hotel_number" (
  "id" SERIAL PRIMARY KEY,
    "type" int,
	  "cost" int,
	    "floor" int,
		  "status" int
			);
```
#### Создание таблицы "Администратор":
```
CREATE TABLE "administrator" (
  "id" SERIAL PRIMARY KEY,
    "name" varchar
		);
```
#### Создание таблицы "Уборка":
```
CREATE TABLE "clean" (
  "id" SERIAL PRIMARY KEY,
    date date,
	"hotel_number_id" int,
		"cleaner_id" int,
			"administrator_id" int,
				time time
	  );
```
#### Создание таблицы "Уборщик":
```
CREATE TABLE "cleaner" (
  "id" SERIAL PRIMARY KEY,
 	"name" varchar,
		"administrator_id" int
		);

```


#### Добавление внешних ключей в таблицу "Заселение":
```
ALTER TABLE "check_in" 
ADD FOREIGN KEY ("klient_id") REFERENCES "klient" ("id");

ALTER TABLE "check_in" 
ADD FOREIGN KEY ("hotel_number_id") REFERENCES "hotel_number" ("id");

ALTER TABLE "check_in" 
ADD FOREIGN KEY ("administrator_id") REFERENCES "administrator" ("id");
```
#### Добавление внешних ключей в таблицу "Уборка":
```
ALTER TABLE "clean" 
ADD FOREIGN KEY ("hotel_number_id") REFERENCES "hotel_number" ("id");

ALTER TABLE "clean" 
ADD FOREIGN KEY ("cleaner_id") REFERENCES "cleaner" ("id");

ALTER TABLE "clean" 
ADD FOREIGN KEY ("administrator_id") REFERENCES "administrator" ("id");
```
#### Добавление внешних ключей в таблицу "Уборщик":
```
ALTER TABLE "cleaner" 
ADD FOREIGN KEY ("administrator_id") REFERENCES "administrator" ("id");
```