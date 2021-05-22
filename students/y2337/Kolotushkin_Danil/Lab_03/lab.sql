CREATE TABLE "Client" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar(25) not null,
  "last_name" varchar(25),
  "phone" varchar(25) not null,
  "email" varchar(25) not null
);

CREATE TABLE "Service" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar(25) not null,
  "desc" varchar(45) not null,
  "cost" integer not null
);

CREATE TABLE "Implementer" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar(25) not null,
  "last_name" varchar(25),
  "phone" varchar(25) not null,
  "email" varchar(25) not null
);

CREATE TABLE "PaymentOrder" (
  "id" SERIAL PRIMARY KEY,
  "requisites" integer not null,
  "status" boolean not null,
  "paydate" date not null
);

CREATE TABLE "TimeLimit" (
  "id" SERIAL PRIMARY KEY,
  "admission" date not null,
  "completion" date not null,
  "payment" date not null
);

CREATE TABLE "Material" (
  "id" SERIAL PRIMARY KEY,
  "name" varchar(25) not null,
  "desc" varchar(45) not null,
  "cost" integer
);

CREATE TABLE "Order" (
  "id" SERIAL PRIMARY KEY,
  "client_id" int references "Client"("id"),
  "payment_id" int references "PaymentOrder"("id"),
  "time_id" int references "TimeLimit"("id")
);

CREATE TABLE "Implementation" (
  "id" SERIAL PRIMARY KEY,
  "order_id" int references "Order"("id"),
  "implementer_id" int references "Implementer"("id"),
  "status" boolean
);

CREATE TABLE "ServicesInOrder" (
  "id" SERIAL PRIMARY KEY,
  "service_id" int references "Service"("id"),
  "order_id" int references "Order"("id")
);

CREATE TABLE "materialsInOrder" (
  "id" SERIAL PRIMARY KEY,
  "material_id" int references "Material"("id"),
  "service_id" int references "Service"("id")
);
