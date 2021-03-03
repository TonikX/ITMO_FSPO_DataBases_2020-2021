--
-- PostgreSQL database dump
--

-- Dumped from database version 11.11
-- Dumped by pg_dump version 11.11

-- Started on 2021-03-03 20:33:30

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 8 (class 2615 OID 16396)
-- Name: sfos; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA sfos;


ALTER SCHEMA sfos OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 197 (class 1259 OID 16513)
-- Name: buyers; Type: TABLE; Schema: sfos; Owner: postgres
--

CREATE TABLE sfos.buyers (
    full_name text NOT NULL,
    contact_details text NOT NULL,
    payment_method text NOT NULL
);


ALTER TABLE sfos.buyers OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16593)
-- Name: delivery; Type: TABLE; Schema: sfos; Owner: postgres
--

CREATE TABLE sfos.delivery (
    delivery_date date NOT NULL,
    delivery_time time without time zone NOT NULL,
    delivery_status text NOT NULL,
    address text NOT NULL,
    order_id integer NOT NULL
);


ALTER TABLE sfos.delivery OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16555)
-- Name: order; Type: TABLE; Schema: sfos; Owner: postgres
--

CREATE TABLE sfos."order" (
    list_id integer NOT NULL,
    order_id integer NOT NULL,
    order_status text NOT NULL,
    order_cost text NOT NULL,
    buyer_full_name text NOT NULL
);


ALTER TABLE sfos."order" OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16599)
-- Name: place_of_delivery; Type: TABLE; Schema: sfos; Owner: postgres
--

CREATE TABLE sfos.place_of_delivery (
    delivery_address text NOT NULL,
    person_who_take text NOT NULL
);


ALTER TABLE sfos.place_of_delivery OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16521)
-- Name: products; Type: TABLE; Schema: sfos; Owner: postgres
--

CREATE TABLE sfos.products (
    product_id integer NOT NULL,
    quantity_in_stock integer NOT NULL,
    unit_cost integer NOT NULL,
    pr_name text NOT NULL
);


ALTER TABLE sfos.products OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16529)
-- Name: products_list; Type: TABLE; Schema: sfos; Owner: postgres
--

CREATE TABLE sfos.products_list (
    list_id integer NOT NULL,
    product_id integer NOT NULL,
    buyer_quantity integer NOT NULL,
    total_cost integer NOT NULL
);


ALTER TABLE sfos.products_list OWNER TO postgres;

--
-- TOC entry 2845 (class 0 OID 16513)
-- Dependencies: 197
-- Data for Name: buyers; Type: TABLE DATA; Schema: sfos; Owner: postgres
--

COPY sfos.buyers (full_name, contact_details, payment_method) FROM stdin;
Korovnikov Vlad Aleksandrovich	+79117542598	card
Ogurechnikov Fedor Sergeevich	+79218087428	cash
\.


--
-- TOC entry 2849 (class 0 OID 16593)
-- Dependencies: 201
-- Data for Name: delivery; Type: TABLE DATA; Schema: sfos; Owner: postgres
--

COPY sfos.delivery (delivery_date, delivery_time, delivery_status, address, order_id) FROM stdin;
2021-12-13	18:30:00	being transported	Russia, 190121, Saint Petersburg, Drovyanoy pereulok, 22, litera A	1
\.


--
-- TOC entry 2848 (class 0 OID 16555)
-- Dependencies: 200
-- Data for Name: order; Type: TABLE DATA; Schema: sfos; Owner: postgres
--

COPY sfos."order" (list_id, order_id, order_status, order_cost, buyer_full_name) FROM stdin;
1	1	on the way	500	Korovnikov Vlad Aleksandrovich
\.


--
-- TOC entry 2850 (class 0 OID 16599)
-- Dependencies: 202
-- Data for Name: place_of_delivery; Type: TABLE DATA; Schema: sfos; Owner: postgres
--

COPY sfos.place_of_delivery (delivery_address, person_who_take) FROM stdin;
Russia, 190121, Saint Petersburg, Drovyanoy pereulok, 22, litera A	Perepelkin Petr Petrovich
\.


--
-- TOC entry 2846 (class 0 OID 16521)
-- Dependencies: 198
-- Data for Name: products; Type: TABLE DATA; Schema: sfos; Owner: postgres
--

COPY sfos.products (product_id, quantity_in_stock, unit_cost, pr_name) FROM stdin;
1	20	100	screw
2	30	150	bolt
\.


--
-- TOC entry 2847 (class 0 OID 16529)
-- Dependencies: 199
-- Data for Name: products_list; Type: TABLE DATA; Schema: sfos; Owner: postgres
--

COPY sfos.products_list (list_id, product_id, buyer_quantity, total_cost) FROM stdin;
1	2	4	600
\.


--
-- TOC entry 2710 (class 2606 OID 16520)
-- Name: buyers buyer_pkey; Type: CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos.buyers
    ADD CONSTRAINT buyer_pkey PRIMARY KEY (full_name);


--
-- TOC entry 2716 (class 2606 OID 16562)
-- Name: order Заказ_pkey; Type: CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos."order"
    ADD CONSTRAINT "Заказ_pkey" PRIMARY KEY (order_id);


--
-- TOC entry 2718 (class 2606 OID 16606)
-- Name: place_of_delivery Место доставки_pkey; Type: CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos.place_of_delivery
    ADD CONSTRAINT "Место доставки_pkey" PRIMARY KEY (delivery_address);


--
-- TOC entry 2712 (class 2606 OID 16528)
-- Name: products Товары_pkey; Type: CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos.products
    ADD CONSTRAINT "Товары_pkey" PRIMARY KEY (product_id);


--
-- TOC entry 2714 (class 2606 OID 16533)
-- Name: products_list Формирование списка товаров_pkey; Type: CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos.products_list
    ADD CONSTRAINT "Формирование списка товаров_pkey" PRIMARY KEY (list_id);


--
-- TOC entry 2723 (class 2606 OID 16612)
-- Name: delivery Доставка_ID_Заказа_fkey; Type: FK CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos.delivery
    ADD CONSTRAINT "Доставка_ID_Заказа_fkey" FOREIGN KEY (order_id) REFERENCES sfos."order"(order_id) NOT VALID;


--
-- TOC entry 2722 (class 2606 OID 16607)
-- Name: delivery Доставка_Адрес_fkey; Type: FK CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos.delivery
    ADD CONSTRAINT "Доставка_Адрес_fkey" FOREIGN KEY (address) REFERENCES sfos.place_of_delivery(delivery_address) NOT VALID;


--
-- TOC entry 2720 (class 2606 OID 16563)
-- Name: order Заказ_ID_Списка_fkey; Type: FK CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos."order"
    ADD CONSTRAINT "Заказ_ID_Списка_fkey" FOREIGN KEY (list_id) REFERENCES sfos.products_list(list_id) NOT VALID;


--
-- TOC entry 2721 (class 2606 OID 16568)
-- Name: order Заказ_Фио Покупателя_fkey; Type: FK CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos."order"
    ADD CONSTRAINT "Заказ_Фио Покупателя_fkey" FOREIGN KEY (buyer_full_name) REFERENCES sfos.buyers(full_name) NOT VALID;


--
-- TOC entry 2719 (class 2606 OID 16534)
-- Name: products_list ФСТ_fk; Type: FK CONSTRAINT; Schema: sfos; Owner: postgres
--

ALTER TABLE ONLY sfos.products_list
    ADD CONSTRAINT "ФСТ_fk" FOREIGN KEY (product_id) REFERENCES sfos.products(product_id) NOT VALID;


--
-- TOC entry 2856 (class 0 OID 0)
-- Dependencies: 8
-- Name: SCHEMA sfos; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA sfos FROM postgres;
GRANT USAGE ON SCHEMA sfos TO postgres;
GRANT CREATE ON SCHEMA sfos TO postgres WITH GRANT OPTION;


-- Completed on 2021-03-03 20:33:30

--
-- PostgreSQL database dump complete
--

