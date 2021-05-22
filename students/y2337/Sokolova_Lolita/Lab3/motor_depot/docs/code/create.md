### Create
```
CREATE TABLE "motor_depot" (
  "id" SERIAL PRIMARY KEY,
    "name" varchar,
	  "address" varchar
	  );

CREATE TABLE "garage" (
  "id" SERIAL PRIMARY KEY,
    "address" varchar,
	  "refueller_id" int,
	    "motor_deport_id" int
		);

CREATE TABLE "waybill" (
  "id" SERIAL PRIMARY KEY,
    "point_of_loading" varchar,
	  "point_of_unloading" varchar,
	    "mileage_total" int,
		  "mileage_cargo" int,
		    "consignor" varchar,
			  "consignee" varchar,
			    "order_time_h" int,
				  "trip_id" int
				  );

CREATE TABLE "car" (
  "id" SERIAL PRIMARY KEY,
    "car_model" varchar,
	  "reg_number" varchar,
	    "garage_id" int
		);

CREATE TABLE "driver" (
  "id" SERIAL PRIMARY KEY,
    "name" varchar,
	  "exp" int
	  );

CREATE TABLE "fuel" (
  "id" SERIAL PRIMARY KEY,
    "fuel_name" varchar,
	  "liter" int,
	    "kilogram" int
		);

CREATE TABLE "trip" (
  "id" SERIAL PRIMARY KEY,
    "car_id" int,
	  "driver_id" int,
	    "fuel_id" int,
		  "waybill_id" int,
		    "trip_date" date
			);

CREATE TABLE "refueller" (
  "id" SERIAL PRIMARY KEY,
    "name" varchar,
	  "exp" int
	  );

ALTER TABLE "garage" ADD FOREIGN KEY ("motor_deport_id") REFERENCES "motor_depot" ("id");

ALTER TABLE "refueller" ADD FOREIGN KEY ("id") REFERENCES "garage" ("refueller_id");

ALTER TABLE "trip" ADD FOREIGN KEY ("id") REFERENCES "waybill" ("trip_id");

ALTER TABLE "garage" ADD FOREIGN KEY ("id") REFERENCES "car" ("garage_id");

ALTER TABLE "car" ADD FOREIGN KEY ("id") REFERENCES "trip" ("car_id");

ALTER TABLE "driver" ADD FOREIGN KEY ("id") REFERENCES "trip" ("driver_
```
