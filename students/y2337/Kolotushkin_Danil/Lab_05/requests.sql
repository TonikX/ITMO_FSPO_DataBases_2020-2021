select "Service".name, "Material".name 
from "materialsInOrder" 
inner join "Material" on material_id = "Material".id 
inner join "Service" on service_id = "Service".id 
order by "Service".name asc;

select "Service".name, count(material_id)
from "materialsInOrder"
inner join "Service" on "Service".id = service_id
group by "Service".name
order by "Service".name asc;

select "Service".name, sum("Material".cost) + "Service".cost as total
from "materialsInOrder"
inner join "Service" on "Service".id = service_id
inner join "Material" on "Material".id = material_id
where "Service".name like 'p%' or
"Service".cost < 20
group by "Service".name, "Service".cost;

select name, phone
from "Client"
where id in (select client_id
			from "Order"
			where payment_id in (select id
								from "PaymentOrder"
								where status = false));

select "Client".name, "Order".id, (completion - admission) as term
from "TimeLimit"
inner join "Order" on time_id = "TimeLimit".id
inner join "Client" on "Client".id = client_id;

select "Client".name, count("Order".id)
from "Client" inner join "Order" on "Client".id = client_id
group by "Client".name
having count("Order".id) > 10
order by count("Order".id) asc
limit 1;

select "Order".id as order, "Client".name, "Client".phone
from "Order"
inner join "Client"
on "Client".id = client_id
where "Order".id = any (select order_id from "Implementation" where status = true);

select "Client".name, "Client".last_name, sum((select sum("Material".cost) + "Service".cost as total
												from "materialsInOrder"
												inner join "Service" on "Service".id = service_id
												inner join "Material" on "Material".id = material_id
												where service_id = outter.service_id
												group by "Service".name, "Service".cost))
from "ServicesInOrder" outter
inner join "Order" on "Order".id = outter.order_id
inner join "Client" on "Order".client_id = "Client".id
group by "Client".name, "Client".last_name
order by "Client".name asc,
		 "Client".last_name asc;

select order_id, count(implementer_id)
from "Implementation"
group by order_id
having count(implementer_id) > 2
order by order_id asc;

select "Client".name, "Client".phone, "Order".id
from "Order"
inner join "Client" on "Client".id = client_id
where time_id = any(select id from "TimeLimit" where admission between '200-05-10' and '2005-04-03');
