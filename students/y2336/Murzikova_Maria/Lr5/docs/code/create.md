## Create

#### Создание таблицы "Контора":
```
create table office(id_office integer PRIMARY KEY, office_name text NOT NULL, 
	office_contacts text NOT NULL);
```
#### Создание таблицы "Брокер":
```
create table broker(id_broker integer PRIMARY KEY, office_id integer REFERENCES office, 
	FIO text NOT NULL, broker_contacts text NOT NULL);
```
#### Создание таблицы "Партия":
```
create table batch(id_batch integer primary key, delivery_conditions text NOT NULL);
```
#### Создание таблицы "Покупатель":
```
create table buyer(id_buyer integer primary key, buyer_name text not null, 
	buyer_contacts text not null);
```
#### Создание таблицы "Договор":
```
create table contract(id_contract integer primary key, contract_date date not null);
```
#### Создание таблицы "Сделка":
```
create table deal(id_deal integer primary key, batch_id integer references batch on delete cascade, 
	broker_id integer references broker on delete cascade, contract_id integer references 
		contract on delete cascade, buyer_id integer references buyer on delete cascade, 
			deal_date date not null);
```
#### Создание таблицы "Фирма":
```
create table firm(id_firm integer primary key, firm_name text not null, 
	speciallization text not null, contacts text not null);
```
#### Создание таблицы "Товар":
```
create table product(id_product integer primary key, product_name text not null, 
	manufacture_date date not null, unit text not null, shelf_life date not null);
```
#### Создание таблицы "Товары в партии":
```
create table product_batch(product_id integer references product, 
	batch_id integer references batch, product_price float not null, 
		product_quantity integer not null, primary key(batch_id,product_id));
```
#### Создание таблицы "Товары фирмы":
```
create table product_firm(product_id integer references product, 
	firm_id integer references firm, product_type text not null, 
		primary key(product_id, firm_id));
```
#### Создание таблицы "Оплата":
```
create table payment(id_payment integer primary key, brokerID integer REFERENCES broker,
	firmID integer REFERENCES firm, broker_paymant_state text not null,
		broker_payment_date date, firm_payment_state text not null,
		firm_payment_type text not null, firm_payment_date date);
```