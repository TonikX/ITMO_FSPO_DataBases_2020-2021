--
-- PostgreSQL database dump
--

-- Dumped from database version 11.10
-- Dumped by pg_dump version 11.10

-- Started on 2021-02-16 23:13:18

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
-- TOC entry 6 (class 2615 OID 16394)
-- Name: practice; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA practice;


ALTER SCHEMA practice OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 198 (class 1259 OID 24591)
-- Name: client; Type: TABLE; Schema: practice; Owner: postgres
--

CREATE TABLE practice.client (
    client_id integer NOT NULL,
    client_full_name character(30) NOT NULL,
    adress character(40) NOT NULL,
    telphone_number integer
);


ALTER TABLE practice.client OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 24726)
-- Name: delivery; Type: TABLE; Schema: practice; Owner: postgres
--

CREATE TABLE practice.delivery (
    delivery_id integer NOT NULL,
    delivery_client_id integer,
    delivery_date date NOT NULL
);


ALTER TABLE practice.delivery OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 24711)
-- Name: invoice; Type: TABLE; Schema: practice; Owner: postgres
--

CREATE TABLE practice.invoice (
    invoice_id integer NOT NULL,
    invoce_product_id integer NOT NULL,
    invoice_order_id integer NOT NULL,
    invoice_list character(100) NOT NULL,
    total_cost integer
);


ALTER TABLE practice.invoice OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 24691)
-- Name: order; Type: TABLE; Schema: practice; Owner: postgres
--

CREATE TABLE practice."order" (
    order_id integer NOT NULL,
    status character(10) NOT NULL,
    order_date date NOT NULL,
    order_client_id integer NOT NULL
);


ALTER TABLE practice."order" OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 24586)
-- Name: product; Type: TABLE; Schema: practice; Owner: postgres
--

CREATE TABLE practice.product (
    product_id integer NOT NULL,
    product_name character(20),
    cost integer,
    weight_kg integer,
    dimensions character(10)
);


ALTER TABLE practice.product OWNER TO postgres;

--
-- TOC entry 2836 (class 0 OID 24591)
-- Dependencies: 198
-- Data for Name: client; Type: TABLE DATA; Schema: practice; Owner: postgres
--

COPY practice.client (client_id, client_full_name, adress, telphone_number) FROM stdin;
1	Jason Stethem                 	Zapreshaushaya ulitsa, dom 1            	11111
2	Ryan Gosling                  	Driveovaya ulitsa, dom 2049             	\N
3	Stiv Jops\n                    	 Ukraine, Donbass                       	222222
\.


--
-- TOC entry 2839 (class 0 OID 24726)
-- Dependencies: 201
-- Data for Name: delivery; Type: TABLE DATA; Schema: practice; Owner: postgres
--

COPY practice.delivery (delivery_id, delivery_client_id, delivery_date) FROM stdin;
1	1	2021-01-05
2	2	2021-01-06
3	3	2021-01-15
\.


--
-- TOC entry 2838 (class 0 OID 24711)
-- Dependencies: 200
-- Data for Name: invoice; Type: TABLE DATA; Schema: practice; Owner: postgres
--

COPY practice.invoice (invoice_id, invoce_product_id, invoice_order_id, invoice_list, total_cost) FROM stdin;
1	2	1	apple                                                                                               	30
2	3	2	orange                                                                                              	60
3	1	3	orange, rtx3080                                                                                     	120060
\.


--
-- TOC entry 2837 (class 0 OID 24691)
-- Dependencies: 199
-- Data for Name: order; Type: TABLE DATA; Schema: practice; Owner: postgres
--

COPY practice."order" (order_id, status, order_date, order_client_id) FROM stdin;
1	delivering	2021-01-01	2
2	declined\n 	2021-01-01	1
3	waiting\n  	2021-01-02	3
\.


--
-- TOC entry 2835 (class 0 OID 24586)
-- Dependencies: 197
-- Data for Name: product; Type: TABLE DATA; Schema: practice; Owner: postgres
--

COPY practice.product (product_id, product_name, cost, weight_kg, dimensions) FROM stdin;
1	apple               	30	1	100x100\n  
2	orange              	60	1	100x100\n  
3	rtx3080             	120000	2	70x40     
\.


--
-- TOC entry 2703 (class 2606 OID 24595)
-- Name: client client_pkey; Type: CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (client_id);


--
-- TOC entry 2709 (class 2606 OID 24730)
-- Name: delivery delivery_pkey; Type: CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice.delivery
    ADD CONSTRAINT delivery_pkey PRIMARY KEY (delivery_id);


--
-- TOC entry 2707 (class 2606 OID 24715)
-- Name: invoice invoice_pkey; Type: CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice.invoice
    ADD CONSTRAINT invoice_pkey PRIMARY KEY (invoice_id);


--
-- TOC entry 2705 (class 2606 OID 24695)
-- Name: order order_pkey; Type: CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice."order"
    ADD CONSTRAINT order_pkey PRIMARY KEY (order_id);


--
-- TOC entry 2701 (class 2606 OID 24590)
-- Name: product product_pkey; Type: CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (product_id);


--
-- TOC entry 2713 (class 2606 OID 24731)
-- Name: delivery delivery_client_id; Type: FK CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice.delivery
    ADD CONSTRAINT delivery_client_id FOREIGN KEY (delivery_client_id) REFERENCES practice.client(client_id);


--
-- TOC entry 2711 (class 2606 OID 24716)
-- Name: invoice invoce_product_id; Type: FK CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice.invoice
    ADD CONSTRAINT invoce_product_id FOREIGN KEY (invoce_product_id) REFERENCES practice.product(product_id);


--
-- TOC entry 2712 (class 2606 OID 24721)
-- Name: invoice invoice_order_id; Type: FK CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice.invoice
    ADD CONSTRAINT invoice_order_id FOREIGN KEY (invoice_order_id) REFERENCES practice."order"(order_id);


--
-- TOC entry 2710 (class 2606 OID 24696)
-- Name: order order_client_id; Type: FK CONSTRAINT; Schema: practice; Owner: postgres
--

ALTER TABLE ONLY practice."order"
    ADD CONSTRAINT order_client_id FOREIGN KEY (order_client_id) REFERENCES practice.client(client_id);


-- Completed on 2021-02-16 23:13:19

--
-- PostgreSQL database dump complete
--

