--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-02-10 12:11:00

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
-- TOC entry 6 (class 2615 OID 16395)
-- Name: int_shop_scheme; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA int_shop_scheme;


ALTER SCHEMA int_shop_scheme OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 201 (class 1259 OID 16396)
-- Name: Client; Type: TABLE; Schema: int_shop_scheme; Owner: postgres
--

CREATE TABLE int_shop_scheme."Client" (
    client_id integer NOT NULL,
    client_nickname text NOT NULL,
    client_adress text
);


ALTER TABLE int_shop_scheme."Client" OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16463)
-- Name: basket; Type: TABLE; Schema: int_shop_scheme; Owner: postgres
--

CREATE TABLE int_shop_scheme.basket (
    id_basket integer NOT NULL,
    full_price integer NOT NULL,
    client_id integer NOT NULL,
    product_id integer NOT NULL
);


ALTER TABLE int_shop_scheme.basket OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16504)
-- Name: delivery; Type: TABLE; Schema: int_shop_scheme; Owner: postgres
--

CREATE TABLE int_shop_scheme.delivery (
    delivery_id integer NOT NULL,
    order_id integer NOT NULL,
    courier_id integer NOT NULL,
    delivery_date date NOT NULL
);


ALTER TABLE int_shop_scheme.delivery OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16406)
-- Name: int_shop; Type: TABLE; Schema: int_shop_scheme; Owner: postgres
--

CREATE TABLE int_shop_scheme.int_shop (
    id_int_shop integer NOT NULL,
    name_int_shop text NOT NULL
);


ALTER TABLE int_shop_scheme.int_shop OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16480)
-- Name: order; Type: TABLE; Schema: int_shop_scheme; Owner: postgres
--

CREATE TABLE int_shop_scheme."order" (
    order_id integer NOT NULL,
    basket_id integer NOT NULL,
    order_date date
);


ALTER TABLE int_shop_scheme."order" OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16401)
-- Name: product; Type: TABLE; Schema: int_shop_scheme; Owner: postgres
--

CREATE TABLE int_shop_scheme.product (
    product_id integer NOT NULL,
    product_name text NOT NULL,
    product_price integer NOT NULL
);


ALTER TABLE int_shop_scheme.product OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16411)
-- Name: warehouse; Type: TABLE; Schema: int_shop_scheme; Owner: postgres
--

CREATE TABLE int_shop_scheme.warehouse (
    id_warehouse integer NOT NULL,
    warehouse_adress text
);


ALTER TABLE int_shop_scheme.warehouse OWNER TO postgres;

--
-- TOC entry 3029 (class 0 OID 16396)
-- Dependencies: 201
-- Data for Name: Client; Type: TABLE DATA; Schema: int_shop_scheme; Owner: postgres
--

COPY int_shop_scheme."Client" (client_id, client_nickname, client_adress) FROM stdin;
1	Vitoliot	Saint Petersburg, Pesochnaya nab. 14
2	RamanPan	Saint Petersburg, Pesochnaya nab. 14
\.


--
-- TOC entry 3033 (class 0 OID 16463)
-- Dependencies: 205
-- Data for Name: basket; Type: TABLE DATA; Schema: int_shop_scheme; Owner: postgres
--

COPY int_shop_scheme.basket (id_basket, full_price, client_id, product_id) FROM stdin;
1	300	1	1
2	500	2	2
\.


--
-- TOC entry 3035 (class 0 OID 16504)
-- Dependencies: 207
-- Data for Name: delivery; Type: TABLE DATA; Schema: int_shop_scheme; Owner: postgres
--

COPY int_shop_scheme.delivery (delivery_id, order_id, courier_id, delivery_date) FROM stdin;
1	1	1	2021-02-10
2	2	2	2021-02-10
\.


--
-- TOC entry 3031 (class 0 OID 16406)
-- Dependencies: 203
-- Data for Name: int_shop; Type: TABLE DATA; Schema: int_shop_scheme; Owner: postgres
--

COPY int_shop_scheme.int_shop (id_int_shop, name_int_shop) FROM stdin;
1	Novichok
\.


--
-- TOC entry 3034 (class 0 OID 16480)
-- Dependencies: 206
-- Data for Name: order; Type: TABLE DATA; Schema: int_shop_scheme; Owner: postgres
--

COPY int_shop_scheme."order" (order_id, basket_id, order_date) FROM stdin;
1	1	2021-02-08
2	2	2021-02-07
\.


--
-- TOC entry 3030 (class 0 OID 16401)
-- Dependencies: 202
-- Data for Name: product; Type: TABLE DATA; Schema: int_shop_scheme; Owner: postgres
--

COPY int_shop_scheme.product (product_id, product_name, product_price) FROM stdin;
2	T-shirt	500
1	cup	500
\.


--
-- TOC entry 3032 (class 0 OID 16411)
-- Dependencies: 204
-- Data for Name: warehouse; Type: TABLE DATA; Schema: int_shop_scheme; Owner: postgres
--

COPY int_shop_scheme.warehouse (id_warehouse, warehouse_adress) FROM stdin;
1	Saint-Petersburg, Nevelskaya str., 3k1
2	Saint-Petersburg, 15A Moskovskoe Shosse
\.


--
-- TOC entry 2886 (class 2606 OID 16491)
-- Name: basket 1; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.basket
    ADD CONSTRAINT "1" UNIQUE (id_basket);


--
-- TOC entry 2890 (class 2606 OID 16503)
-- Name: order 2; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme."order"
    ADD CONSTRAINT "2" UNIQUE (order_id);


--
-- TOC entry 2878 (class 2606 OID 16400)
-- Name: Client Client_pkey; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme."Client"
    ADD CONSTRAINT "Client_pkey" PRIMARY KEY (client_id);


--
-- TOC entry 2888 (class 2606 OID 16474)
-- Name: basket basket_pr_ks; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.basket
    ADD CONSTRAINT basket_pr_ks PRIMARY KEY (id_basket, client_id);


--
-- TOC entry 2894 (class 2606 OID 16508)
-- Name: delivery delivery_pkey; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.delivery
    ADD CONSTRAINT delivery_pkey PRIMARY KEY (delivery_id, order_id);


--
-- TOC entry 2882 (class 2606 OID 16410)
-- Name: int_shop int_shop_pkey; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.int_shop
    ADD CONSTRAINT int_shop_pkey PRIMARY KEY (id_int_shop);


--
-- TOC entry 2892 (class 2606 OID 16484)
-- Name: order order_pkey; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme."order"
    ADD CONSTRAINT order_pkey PRIMARY KEY (order_id, basket_id);


--
-- TOC entry 2880 (class 2606 OID 16405)
-- Name: product product_pkey; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (product_id);


--
-- TOC entry 2884 (class 2606 OID 16415)
-- Name: warehouse warehouse_pkey; Type: CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.warehouse
    ADD CONSTRAINT warehouse_pkey PRIMARY KEY (id_warehouse);


--
-- TOC entry 2897 (class 2606 OID 16492)
-- Name: order basket_id(FK); Type: FK CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme."order"
    ADD CONSTRAINT "basket_id(FK)" FOREIGN KEY (order_id) REFERENCES int_shop_scheme.basket(id_basket) NOT VALID;


--
-- TOC entry 2895 (class 2606 OID 16475)
-- Name: basket client_id(FK); Type: FK CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.basket
    ADD CONSTRAINT "client_id(FK)" FOREIGN KEY (client_id) REFERENCES int_shop_scheme."Client"(client_id) NOT VALID;


--
-- TOC entry 2898 (class 2606 OID 16509)
-- Name: delivery order_id(FK); Type: FK CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.delivery
    ADD CONSTRAINT "order_id(FK)" FOREIGN KEY (order_id) REFERENCES int_shop_scheme."order"(order_id);


--
-- TOC entry 2896 (class 2606 OID 16485)
-- Name: basket product_id(FK); Type: FK CONSTRAINT; Schema: int_shop_scheme; Owner: postgres
--

ALTER TABLE ONLY int_shop_scheme.basket
    ADD CONSTRAINT "product_id(FK)" FOREIGN KEY (product_id) REFERENCES int_shop_scheme.product(product_id) NOT VALID;


-- Completed on 2021-02-10 12:11:00

--
-- PostgreSQL database dump complete
--

