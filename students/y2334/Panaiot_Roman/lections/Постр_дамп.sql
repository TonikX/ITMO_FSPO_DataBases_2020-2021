--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-02-10 12:09:31

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 200 (class 1259 OID 16515)
-- Name: client; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.client (
    id_client integer NOT NULL,
    name text NOT NULL,
    adress text NOT NULL,
    number text
);


ALTER TABLE public.client OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16523)
-- Name: fabricator; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fabricator (
    id_fabricator integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE public.fabricator OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16570)
-- Name: fur_delivery; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fur_delivery (
    id_order integer NOT NULL,
    delivery_price integer NOT NULL
);


ALTER TABLE public.fur_delivery OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16531)
-- Name: material; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.material (
    id_material integer NOT NULL,
    name text NOT NULL,
    color text NOT NULL
);


ALTER TABLE public.material OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16539)
-- Name: order; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."order" (
    id_order integer NOT NULL,
    id_client integer NOT NULL,
    order_date date NOT NULL,
    date_of_receipt date,
    price integer NOT NULL,
    wish_material text,
    status text NOT NULL
);


ALTER TABLE public."order" OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16624)
-- Name: production_fur_coats; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.production_fur_coats (
    id_order integer NOT NULL,
    id_choose_material integer NOT NULL,
    id_fabricator integer NOT NULL
);


ALTER TABLE public.production_fur_coats OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16552)
-- Name: selection_of_materials; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.selection_of_materials (
    id_order integer NOT NULL,
    id_choose_material integer NOT NULL,
    id_material integer NOT NULL,
    quantity integer NOT NULL,
    price integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE public.selection_of_materials OWNER TO postgres;

--
-- TOC entry 3032 (class 0 OID 16515)
-- Dependencies: 200
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.client (id_client, name, adress, number) FROM stdin;
1	Ilon Mask	Mars	8800553535
\.


--
-- TOC entry 3033 (class 0 OID 16523)
-- Dependencies: 201
-- Data for Name: fabricator; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fabricator (id_fabricator, name) FROM stdin;
1	Roskosmos
\.


--
-- TOC entry 3037 (class 0 OID 16570)
-- Dependencies: 205
-- Data for Name: fur_delivery; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fur_delivery (id_order, delivery_price) FROM stdin;
1	1500
\.


--
-- TOC entry 3034 (class 0 OID 16531)
-- Dependencies: 202
-- Data for Name: material; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.material (id_material, name, color) FROM stdin;
1	titan	Silver-grey
\.


--
-- TOC entry 3035 (class 0 OID 16539)
-- Dependencies: 203
-- Data for Name: order; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."order" (id_order, id_client, order_date, date_of_receipt, price, wish_material, status) FROM stdin;
1	1	2026-05-03	2026-07-03	15000000	titan	done
\.


--
-- TOC entry 3038 (class 0 OID 16624)
-- Dependencies: 206
-- Data for Name: production_fur_coats; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.production_fur_coats (id_order, id_choose_material, id_fabricator) FROM stdin;
1	1	1
\.


--
-- TOC entry 3036 (class 0 OID 16552)
-- Dependencies: 204
-- Data for Name: selection_of_materials; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.selection_of_materials (id_order, id_choose_material, id_material, quantity, price, name) FROM stdin;
1	1	1	15	15000	titan
\.


--
-- TOC entry 2888 (class 2606 OID 16591)
-- Name: selection_of_materials 1; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.selection_of_materials
    ADD CONSTRAINT "1" UNIQUE (id_choose_material);


--
-- TOC entry 2880 (class 2606 OID 16608)
-- Name: fabricator 2; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fabricator
    ADD CONSTRAINT "2" UNIQUE (id_fabricator);


--
-- TOC entry 2878 (class 2606 OID 16522)
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id_client);


--
-- TOC entry 2882 (class 2606 OID 16530)
-- Name: fabricator fabricator_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fabricator
    ADD CONSTRAINT fabricator_pkey PRIMARY KEY (id_fabricator);


--
-- TOC entry 2892 (class 2606 OID 16574)
-- Name: fur_delivery fur_delivery_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fur_delivery
    ADD CONSTRAINT fur_delivery_pkey PRIMARY KEY (id_order);


--
-- TOC entry 2884 (class 2606 OID 16538)
-- Name: material material_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.material
    ADD CONSTRAINT material_pkey PRIMARY KEY (id_material);


--
-- TOC entry 2886 (class 2606 OID 16546)
-- Name: order order_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."order"
    ADD CONSTRAINT order_pkey PRIMARY KEY (id_order);


--
-- TOC entry 2894 (class 2606 OID 16628)
-- Name: production_fur_coats production_fur_coats_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.production_fur_coats
    ADD CONSTRAINT production_fur_coats_pkey PRIMARY KEY (id_order, id_choose_material);


--
-- TOC entry 2890 (class 2606 OID 16559)
-- Name: selection_of_materials selection_of_materials_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.selection_of_materials
    ADD CONSTRAINT selection_of_materials_pkey PRIMARY KEY (id_order, id_choose_material);


--
-- TOC entry 2900 (class 2606 OID 16634)
-- Name: production_fur_coats id_choose_material; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.production_fur_coats
    ADD CONSTRAINT id_choose_material FOREIGN KEY (id_choose_material) REFERENCES public.selection_of_materials(id_choose_material);


--
-- TOC entry 2895 (class 2606 OID 16547)
-- Name: order id_client; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."order"
    ADD CONSTRAINT id_client FOREIGN KEY (id_client) REFERENCES public.client(id_client);


--
-- TOC entry 2901 (class 2606 OID 16639)
-- Name: production_fur_coats id_fabricator; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.production_fur_coats
    ADD CONSTRAINT id_fabricator FOREIGN KEY (id_fabricator) REFERENCES public.fabricator(id_fabricator);


--
-- TOC entry 2897 (class 2606 OID 16565)
-- Name: selection_of_materials id_material; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.selection_of_materials
    ADD CONSTRAINT id_material FOREIGN KEY (id_material) REFERENCES public.material(id_material);


--
-- TOC entry 2896 (class 2606 OID 16560)
-- Name: selection_of_materials id_order; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.selection_of_materials
    ADD CONSTRAINT id_order FOREIGN KEY (id_order) REFERENCES public."order"(id_order);


--
-- TOC entry 2898 (class 2606 OID 16575)
-- Name: fur_delivery id_order; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fur_delivery
    ADD CONSTRAINT id_order FOREIGN KEY (id_order) REFERENCES public."order"(id_order);


--
-- TOC entry 2899 (class 2606 OID 16629)
-- Name: production_fur_coats id_order; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.production_fur_coats
    ADD CONSTRAINT id_order FOREIGN KEY (id_order) REFERENCES public."order"(id_order);


-- Completed on 2021-02-10 12:09:31

--
-- PostgreSQL database dump complete
--

