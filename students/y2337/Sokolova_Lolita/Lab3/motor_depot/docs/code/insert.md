### Insert
```
INSERT into motor_depot (name, address) values('Honey', 'Honey street, 25');
INSERT into motor_depot (name, address) values('Star', 'Star street, 54');
INSERT into refueller (name, exp) values('Jhon Jhonovich', 3);
INSERT into refueller (name, exp) values('Carl Mikovich', 2);
INSERT into garage (address, motor_depot_id, refueller_id) values('Stardust street', 2, 1);
INSERT into garage (address, motor_depot_id, refueller_id) values('Stardust street', 2, 1);
INSERT into driver ("name", exp) values('Mike Vazovsky', 2);
INSERT into driver ("name", exp) values('Kile Fire', 1);
INSERT into fuel (fuel_name, kilogram, liter) values('gazoline', 10, 9);
INSERT into fuel (fuel_name, kilogram, liter) values('gazoline', 10, 9);
INSERT into fuel (fuel_name, kilogram, liter) values('gazoline', 20, 18);
INSERT into trip (car_id, driver_id, fuel_id, trip_date) values(1, 2, 1, '2020-09-09');
INSERT into waybill (point_of_loading, point_of_unloading, mileage_total, mileage_cargo, consognor, consignee, order_time_h, trip_id) values('Garbage st. 27', 'Clean square', 70, 35, 'Mr. Hopkins',
'Mr. Ulala', 4, 1);
insert into fuel (fuel_name, kilogram, liter) values('diesel', 16, 13);
insert into fuel (fuel_name, kilogram, liter) values('diesel', 23, 20);

```
