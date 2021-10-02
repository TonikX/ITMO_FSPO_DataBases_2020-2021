## 1.1
## Вывести информацию о всех заключенных договорах, сортированную по ФИО администраторов
SELECT public."Contract".id_contract, public."Contract".conditions, public."Admin".full_name AS
admin_full_name, public."Clerk".full_name AS clerk_full_name FROM public."Contract",
public."Admin", public."Clerk" WHERE (public."Contract".id_admin = public."Admin".id_admin) AND
(public."Contract".id_clerk = public."Clerk".id_clerk) ORDER BY public."Admin".full_name;

![](1.1.jpg)

## 1.2
## Вывести информацию о всех заключенных договорах на проживание, сортированную по ФИО проживающего
SELECT public."Accommodation".id_accommodation, public."Accommodation".check_in_date,
public."Accommodation".check_out_date, public."Admin".full_name AS admin_full_name,
public."Residing".full_name AS residing_full_name FROM public."Accommodation", public."Admin",
public."Residing" WHERE (public."Accommodation".id_admin = public."Admin".id_admin) AND
(public."Accommodation".id_residing = public."Residing".id_residing) ORDER BY public."Residing".full_name;

![](1.2.jpg)

## 2.1
## Вывести всех проживающих, которые получают доп. услуги
SELECT public."Residing".id_residing, public."Residing".full_name AS residing_full_name,
public."Services".type, public."Services_list".number_of_services
FROM public."Residing", public."Accommodation", public."Order",
public."Services_list", public."Services" WHERE
(public."Residing".id_residing = public."Accommodation".id_residing) AND
(public."Accommodation".id_order = public."Order".id_order) AND
(public."Order".id_services_list = public."Services_list".id_services_list) AND
(public."Services_list".id_services = public."Services".id_services);

![](2.1.jpg)

## 2.2
## Вывести всех проживающих, которые получают услугу "Уборка комнаты"
SELECT public."Residing".id_residing, public."Residing".full_name AS residing_full_name,
public."Services".type, public."Services_list".number_of_services
FROM public."Residing", public."Accommodation", public."Order",
public."Services_list", public."Services" WHERE
(public."Residing".id_residing = public."Accommodation".id_residing) AND
(public."Accommodation".id_order = public."Order".id_order) AND
(public."Order".id_services_list = public."Services_list".id_services_list) AND
(public."Services_list".id_services = public."Services".id_services) AND
(public."Services".id_services = 6);

![](2.2.jpg)

## 3.1
## Вывести всех проживающих, которые заехали после 2021.01.10 включительно
SELECT public."Residing".full_name AS residing_full_name, public."Accommodation".check_in_date,
public."Accommodation".check_out_date FROM public."Residing", public."Accommodation" WHERE
(public."Accommodation".check_in_date >= '2021.01.10') AND
(public."Residing".id_residing = public."Accommodation".id_residing);

![](3.1.jpg)

## 3.2
## Вывести всех проживающих, которые заехали после 2021.01.02 включительно, а выехали до 2021.01.12 включительно
SELECT public."Residing".full_name AS residing_full_name, public."Accommodation".check_in_date,
public."Accommodation".check_out_date FROM public."Residing", public."Accommodation" WHERE
(public."Accommodation".check_in_date >= '2021.01.02') AND
(public."Accommodation".check_out_date <= '2021.01.12') AND
(public."Residing".id_residing = public."Accommodation".id_residing);

![](3.2.jpg)

## 4.1
## Вывести всех администраторов, заменив пробел в ФИО на нижнее подчеркивание
SELECT public."Admin".id_admin,  REPLACE(public."Admin".full_name,' ','_'),
public."Admin".contact_details FROM public."Admin";

![](4.1.jpg)

## 4.2
## Вывести всех проживающих, отобразив ФИО в нижнем регистре
SELECT public."Residing".id_residing, LOWER (public."Residing".full_name),
public."Residing".identity_data FROM public."Residing";

![](4.2.jpg)

## 5.1
## Вывести все услуги, которые заказывали более двух раз
SELECT public."Services".id_services, public."Services".type FROM public."Services"
WHERE id_services IN (SELECT public."Services_list".id_services FROM public."Services_list"
WHERE public."Services_list".number_of_services > 2);

![](5.1.jpg)

## 5.2
## Вывести всех служащих, которые заключали договор с администратором Агаркова Алевтина Юрьевна
SELECT public."Clerk".id_clerk, public."Clerk".full_name AS clerk_full_name FROM public."Clerk"
WHERE id_clerk IN (SELECT public."Contract".id_clerk FROM public."Contract"
WHERE id_admin IN (SELECT public."Admin".id_admin FROM public."Admin"
WHERE public."Admin".full_name = 'Агаркова Алевтина Юрьевна'));

![](5.2.jpg)

## 6.1
## Вывести среднюю цену за услугу гостиницы
SELECT AVG(public."Services".price) AS average_price FROM public."Services";

![](6.1.jpg)

## 6.2
## Вывести минимальную и максимальную цену за услугу гостиницы для тех услуг, цена которых не ниже 151
SELECT MAX(public."Services".price) AS max_price, MIN(public."Services".price)
AS min_price FROM public."Services" WHERE public."Services".price > 151;

![](6.2.jpg)

## 7.1
## Вывести максимальную цену за услугу гостиницы, цена которой больше 1000, если такая есть
SELECT public."Services".type, MAX(public."Services".price) AS max_price
FROM public."Services" GROUP BY public."Services".type HAVING MAX(public."Services".price) > 1000;

![](7.1.jpg)

## 7.2
## Вывести максимальную цену за услугу гостиницы, цена которой больше 500, если такая есть
SELECT public."Services".type, MAX(public."Services".price) AS max_price
FROM public."Services" GROUP BY public."Services".type HAVING MAX(public."Services".price) > 500;

![](7.2.jpg)

## 8.1
## Вывести информацию о служащих, если они убирают в понедельник
SELECT public."Clerk".id_clerk, public."Clerk".full_name AS clerk_full_name, public."Clerk".position
FROM public."Clerk" WHERE EXISTS (SELECT * FROM public."Cleaning" WHERE
(public."Clerk".id_clerk = public."Cleaning".id_clerk) AND
(public."Cleaning".day_of_week = 'Понедельник'));

![](8.1.jpg)

## 8.2
## Вывести информацию о проживающих, если они живут на 2 этаже
SELECT public."Residing".id_residing, public."Residing".full_name AS residing_full_name
FROM public."Residing", public."Accommodation", public."Room"
WHERE (public."Residing".id_residing = public."Accommodation".id_residing) AND
(public."Accommodation".id_room = public."Room".id_room) AND public."Room".id_room = ANY
(SELECT public."Room".id_room FROM public."Room" WHERE public."Room".floor = 2);

![](8.2.jpg)

## 9.1
## Вывести информацию об служащих и их графике уборки (операция декартова произведения)
SELECT * FROM public."Clerk", public."Cleaning" WHERE
(public."Clerk".id_clerk = public."Cleaning".id_clerk);

![](9.1.jpg)

## 9.2
## Вывести id только тех служащих, которые учавствуют в уборке (операция пересечения)
SELECT public."Clerk".id_clerk FROM public."Clerk" INTERSECT
SELECT public."Cleaning".id_clerk FROM public."Cleaning";

![](9.2.jpg)

## 10.1
## Вывести только тех служащих, которые учавствуют в уборке
SELECT distinct public."Clerk".id_clerk, public."Clerk".full_name, public."Clerk".position
AS clerk_full_name FROM public."Clerk" INNER JOIN public."Cleaning" ON
public."Clerk".id_clerk = public."Cleaning".id_clerk;

![](10.1.jpg)

## 10.2
## Вывести только тех администраторов, которые назначают служащих
SELECT distinct public."Admin".id_admin, public."Admin".full_name
AS admin_full_name FROM public."Admin" RIGHT OUTER JOIN public."Contract" ON
public."Contract".id_admin = public."Admin".id_admin;

![](10.2.jpg)








