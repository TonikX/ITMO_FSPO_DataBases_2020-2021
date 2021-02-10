--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2020-12-23 11:44:36

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
-- Name: prac3.1_schema; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "prac3.1_schema";


ALTER SCHEMA "prac3.1_schema" OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 201 (class 1259 OID 16401)
-- Name: courier; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema".courier (
    courier_id integer NOT NULL,
    courier_fio "char"[] NOT NULL,
    courier_schedule "char"[] NOT NULL,
    courier_contacts "char"[]
);


ALTER TABLE "prac3.1_schema".courier OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16430)
-- Name: customer; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema".customer (
    customer_id integer NOT NULL,
    customer_fio "char"[] NOT NULL,
    customer_adress "char"[],
    customer_contacts "char"[],
    customer_wishes integer[] NOT NULL
);


ALTER TABLE "prac3.1_schema".customer OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16422)
-- Name: good; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema".good (
    good_id integer NOT NULL,
    good_count integer NOT NULL,
    good_price integer NOT NULL,
    good_name "char"[] NOT NULL
);


ALTER TABLE "prac3.1_schema".good OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16438)
-- Name: manager; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema".manager (
    manager_id integer NOT NULL,
    manager_fio "char"[] NOT NULL,
    manager_contacts "char"[] NOT NULL
);


ALTER TABLE "prac3.1_schema".manager OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16446)
-- Name: order; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema"."order" (
    order_id integer NOT NULL,
    customer_id integer NOT NULL,
    manager_id integer NOT NULL,
    content integer[] NOT NULL,
    price integer NOT NULL,
    adress "char"[] NOT NULL,
    timing date
);


ALTER TABLE "prac3.1_schema"."order" OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16464)
-- Name: order_content; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema".order_content (
    order_content_id integer NOT NULL,
    good_id integer NOT NULL,
    order_id integer NOT NULL,
    good_count integer NOT NULL
);


ALTER TABLE "prac3.1_schema".order_content OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16409)
-- Name: order_delivery; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema".order_delivery (
    courier_id integer NOT NULL,
    delivery_adress "char"[] NOT NULL,
    delivery_time date NOT NULL,
    recipient "char"[] NOT NULL,
    recipient_contacts "char"[] NOT NULL,
    delivery_id integer NOT NULL
);


ALTER TABLE "prac3.1_schema".order_delivery OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16479)
-- Name: order_fulfillment; Type: TABLE; Schema: prac3.1_schema; Owner: postgres
--

CREATE TABLE "prac3.1_schema".order_fulfillment (
    order_fulfillment_id integer NOT NULL,
    courier_id integer NOT NULL,
    order_content_id integer NOT NULL,
    good_id integer NOT NULL,
    order_id integer NOT NULL,
    status integer NOT NULL,
    address "char"[] NOT NULL,
    timing date NOT NULL,
    contacts "char"[],
    warehouse_adresses "char"[] NOT NULL
);


ALTER TABLE "prac3.1_schema".order_fulfillment OWNER TO postgres;

--
-- TOC entry 3039 (class 0 OID 16401)
-- Dependencies: 201
-- Data for Name: courier; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema".courier (courier_id, courier_fio, courier_schedule, courier_contacts) FROM stdin;
1	{G,K,U}	{1,1,1,1,1,0,0}	{8,8,0,0,5,5,5,3,5,3,5}
3	{L,K,M}	{1,0,1,1,1,1,0}	{8,8,0,0,5,5,5,3,5,3,6}
2	{R,K,M}	{1,0,1,1,1,1,0}	{8,8,0,0,5,5,5,3,5,3,6}
\.


--
-- TOC entry 3042 (class 0 OID 16430)
-- Dependencies: 204
-- Data for Name: customer; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema".customer (customer_id, customer_fio, customer_adress, customer_contacts, customer_wishes) FROM stdin;
0	{Q,W,E}	{R,c,:,S,P,B,s,D,E,C,h,1}	{8,6,7,8,9,1,2,3,4,5,6}	{890}
\.


--
-- TOC entry 3041 (class 0 OID 16422)
-- Dependencies: 203
-- Data for Name: good; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema".good (good_id, good_count, good_price, good_name) FROM stdin;
890	123	99900	{p,c,g,m,r,s}
\.


--
-- TOC entry 3043 (class 0 OID 16438)
-- Dependencies: 205
-- Data for Name: manager; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema".manager (manager_id, manager_fio, manager_contacts) FROM stdin;
12	{S,O,L}	{5,5,6,7,1}
\.


--
-- TOC entry 3044 (class 0 OID 16446)
-- Dependencies: 206
-- Data for Name: order; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema"."order" (order_id, customer_id, manager_id, content, price, adress, timing) FROM stdin;
0	0	12	{12312,123,890}	1129300	{R,c,S,P,B,s,D,E,C,h,1}	2020-01-12
\.


--
-- TOC entry 3045 (class 0 OID 16464)
-- Dependencies: 207
-- Data for Name: order_content; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema".order_content (order_content_id, good_id, order_id, good_count) FROM stdin;
0	890	0	2
\.


--
-- TOC entry 3040 (class 0 OID 16409)
-- Dependencies: 202
-- Data for Name: order_delivery; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema".order_delivery (courier_id, delivery_adress, delivery_time, recipient, recipient_contacts, delivery_id) FROM stdin;
1	{R,c,S,P,B,a,S,O,V,h,1,2}	2021-01-12	{F,U,O}	{8}	0
\.


--
-- TOC entry 3046 (class 0 OID 16479)
-- Dependencies: 208
-- Data for Name: order_fulfillment; Type: TABLE DATA; Schema: prac3.1_schema; Owner: postgres
--

COPY "prac3.1_schema".order_fulfillment (order_fulfillment_id, courier_id, order_content_id, good_id, order_id, status, address, timing, contacts, warehouse_adresses) FROM stdin;
0	1	0	890	0	1	{R,c,S,P,B,s,D,E,C,h,1}	2020-01-12	{8}	{R,c,S,P,B,s,S,T,R,h,1,2,7}
\.


--
-- TOC entry 2885 (class 2606 OID 16408)
-- Name: courier courier_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".courier
    ADD CONSTRAINT courier_pkey PRIMARY KEY (courier_id);


--
-- TOC entry 2891 (class 2606 OID 16437)
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (customer_id);


--
-- TOC entry 2889 (class 2606 OID 16429)
-- Name: good good_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".good
    ADD CONSTRAINT good_pkey PRIMARY KEY (good_id);


--
-- TOC entry 2893 (class 2606 OID 16445)
-- Name: manager manager_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".manager
    ADD CONSTRAINT manager_pkey PRIMARY KEY (manager_id);


--
-- TOC entry 2897 (class 2606 OID 16468)
-- Name: order_content order_content_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_content
    ADD CONSTRAINT order_content_pkey PRIMARY KEY (order_content_id);


--
-- TOC entry 2887 (class 2606 OID 16416)
-- Name: order_delivery order_delivery_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_delivery
    ADD CONSTRAINT order_delivery_pkey PRIMARY KEY (delivery_id);


--
-- TOC entry 2899 (class 2606 OID 16486)
-- Name: order_fulfillment order_fulfillment_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_fulfillment
    ADD CONSTRAINT order_fulfillment_pkey PRIMARY KEY (order_fulfillment_id);


--
-- TOC entry 2895 (class 2606 OID 16453)
-- Name: order order_pkey; Type: CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema"."order"
    ADD CONSTRAINT order_pkey PRIMARY KEY (order_id);


--
-- TOC entry 2900 (class 2606 OID 16417)
-- Name: order_delivery courier_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_delivery
    ADD CONSTRAINT courier_id FOREIGN KEY (courier_id) REFERENCES "prac3.1_schema".courier(courier_id) NOT VALID;


--
-- TOC entry 2905 (class 2606 OID 16487)
-- Name: order_fulfillment courier_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_fulfillment
    ADD CONSTRAINT courier_id FOREIGN KEY (courier_id) REFERENCES "prac3.1_schema".courier(courier_id);


--
-- TOC entry 2901 (class 2606 OID 16454)
-- Name: order customer_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema"."order"
    ADD CONSTRAINT customer_id FOREIGN KEY (customer_id) REFERENCES "prac3.1_schema".customer(customer_id);


--
-- TOC entry 2903 (class 2606 OID 16469)
-- Name: order_content good_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_content
    ADD CONSTRAINT good_id FOREIGN KEY (good_id) REFERENCES "prac3.1_schema".good(good_id);


--
-- TOC entry 2907 (class 2606 OID 16497)
-- Name: order_fulfillment good_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_fulfillment
    ADD CONSTRAINT good_id FOREIGN KEY (good_id) REFERENCES "prac3.1_schema".good(good_id);


--
-- TOC entry 2902 (class 2606 OID 16459)
-- Name: order manager_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema"."order"
    ADD CONSTRAINT manager_id FOREIGN KEY (manager_id) REFERENCES "prac3.1_schema".manager(manager_id);


--
-- TOC entry 2906 (class 2606 OID 16492)
-- Name: order_fulfillment order_content_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_fulfillment
    ADD CONSTRAINT order_content_id FOREIGN KEY (order_content_id) REFERENCES "prac3.1_schema".order_content(order_content_id);


--
-- TOC entry 2904 (class 2606 OID 16474)
-- Name: order_content order_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_content
    ADD CONSTRAINT order_id FOREIGN KEY (order_content_id) REFERENCES "prac3.1_schema"."order"(order_id);


--
-- TOC entry 2908 (class 2606 OID 16502)
-- Name: order_fulfillment order_id; Type: FK CONSTRAINT; Schema: prac3.1_schema; Owner: postgres
--

ALTER TABLE ONLY "prac3.1_schema".order_fulfillment
    ADD CONSTRAINT order_id FOREIGN KEY (order_id) REFERENCES "prac3.1_schema"."order"(order_id);


-- Completed on 2020-12-23 11:44:36

--
-- PostgreSQL database dump complete
--

