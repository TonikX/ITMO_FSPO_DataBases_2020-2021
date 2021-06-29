### Создание базы данных

```

CREATE TABLE "object" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "served" boolean,
  "contract_number" varchar,
  "contract_date" date
);

CREATE TABLE "decorator" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar,
  "phone" varchar,
  "address" varchar,
  "education" text,
  "educational_institution" varchar,
  "education_type" varchar
);

CREATE TABLE "zone" (
  "id" SERIAL PRIMARY KEY,
  "object_id" int
);

CREATE TABLE "plants" (
  "id" SERIAL PRIMARY KEY,
  "plant_type" int,
  "zone_id" int,
  "planting_date" date,
  "age" int,
  "watering_regime" int,
  "watering_time" time,
  "water_amount" int
);

CREATE TABLE "plants_type" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar
);

CREATE TABLE "plant_zone" (
  "id" SERIAL PRIMARY KEY,
  "zone_id" int,
  "plant_id" int
);

CREATE TABLE "watering_regime" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar
);

CREATE TABLE "timetable" (
  "id" SERIAL PRIMARY KEY,
  "decorator_id" int,
  "plant_id" int,
  "date" date
);

CREATE TABLE "decorator_objects" (
  "decorator_id" int,
  "object_id" int
);

ALTER TABLE "zone" ADD FOREIGN KEY ("object_id") REFERENCES "object" ("id");

ALTER TABLE "plants" ADD FOREIGN KEY ("plant_type") REFERENCES "plants_type" ("id");

ALTER TABLE "plant_zone" ADD FOREIGN KEY ("zone_id") REFERENCES "zone" ("id");

ALTER TABLE "plant_zone" ADD FOREIGN KEY ("plant_id") REFERENCES "plants" ("id");

ALTER TABLE "plants" ADD FOREIGN KEY ("watering_regime") REFERENCES "watering_regime" ("id");

ALTER TABLE "timetable" ADD FOREIGN KEY ("decorator_id") REFERENCES "decorator" ("id");

ALTER TABLE "timetable" ADD FOREIGN KEY ("plant_id") REFERENCES "plants" ("id");

ALTER TABLE "decorator_objects" ADD FOREIGN KEY ("decorator_id") REFERENCES "decorator" ("id");

ALTER TABLE "decorator_objects" ADD FOREIGN KEY ("object_id") REFERENCES "object" ("id");
```
