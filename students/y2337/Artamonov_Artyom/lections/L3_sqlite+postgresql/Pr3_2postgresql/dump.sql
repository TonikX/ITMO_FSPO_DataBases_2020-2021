--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)

-- Started on 2021-02-03 15:01:44 MSK

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
-- TOC entry 203 (class 1259 OID 16479)
-- Name: coat; Type: TABLE; Schema: public; Owner: artyom
--

CREATE TABLE public.coat (
    id_coat integer NOT NULL,
    id_project integer NOT NULL
);


ALTER TABLE public.coat OWNER TO artyom;

--
-- TOC entry 209 (class 1259 OID 16534)
-- Name: coat_id_coat_seq; Type: SEQUENCE; Schema: public; Owner: artyom
--

ALTER TABLE public.coat ALTER COLUMN id_coat ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.coat_id_coat_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 206 (class 1259 OID 16509)
-- Name: coats_order; Type: TABLE; Schema: public; Owner: artyom
--

CREATE TABLE public.coats_order (
    id_coat integer NOT NULL,
    id_tailor integer NOT NULL,
    coats_number integer,
    terms text NOT NULL
);


ALTER TABLE public.coats_order OWNER TO artyom;

--
-- TOC entry 205 (class 1259 OID 16499)
-- Name: material; Type: TABLE; Schema: public; Owner: artyom
--

CREATE TABLE public.material (
    id integer NOT NULL,
    name character varying(30) NOT NULL,
    color character(30) NOT NULL,
    characteristics character varying(200),
    price integer NOT NULL
);


ALTER TABLE public.material OWNER TO artyom;

--
-- TOC entry 210 (class 1259 OID 16536)
-- Name: material_id_seq; Type: SEQUENCE; Schema: public; Owner: artyom
--

ALTER TABLE public.material ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.material_id_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 202 (class 1259 OID 16474)
-- Name: project; Type: TABLE; Schema: public; Owner: artyom
--

CREATE TABLE public.project (
    approving_date date NOT NULL,
    designer_name character varying(30) NOT NULL,
    id_project integer NOT NULL,
    price integer NOT NULL
);


ALTER TABLE public.project OWNER TO artyom;

--
-- TOC entry 208 (class 1259 OID 16532)
-- Name: project_id_project_seq; Type: SEQUENCE; Schema: public; Owner: artyom
--

ALTER TABLE public.project ALTER COLUMN id_project ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.project_id_project_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 204 (class 1259 OID 16484)
-- Name: r6; Type: TABLE; Schema: public; Owner: artyom
--

CREATE TABLE public.r6 (
    id_coat integer NOT NULL,
    id_material integer NOT NULL,
    material_volume integer NOT NULL,
    price integer NOT NULL
);


ALTER TABLE public.r6 OWNER TO artyom;

--
-- TOC entry 207 (class 1259 OID 16522)
-- Name: taylor; Type: TABLE; Schema: public; Owner: artyom
--

CREATE TABLE public.taylor (
    id_taylor integer NOT NULL,
    name character varying(30) NOT NULL,
    years_experience smallint NOT NULL
);


ALTER TABLE public.taylor OWNER TO artyom;

--
-- TOC entry 211 (class 1259 OID 16538)
-- Name: taylor_id_taylor_seq; Type: SEQUENCE; Schema: public; Owner: artyom
--

ALTER TABLE public.taylor ALTER COLUMN id_taylor ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.taylor_id_taylor_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 3003 (class 0 OID 16479)
-- Dependencies: 203
-- Data for Name: coat; Type: TABLE DATA; Schema: public; Owner: artyom
--

COPY public.coat (id_coat, id_project) FROM stdin;
0	0
1	0
\.


--
-- TOC entry 3006 (class 0 OID 16509)
-- Dependencies: 206
-- Data for Name: coats_order; Type: TABLE DATA; Schema: public; Owner: artyom
--

COPY public.coats_order (id_coat, id_tailor, coats_number, terms) FROM stdin;
0	1	3	Bez maski bez perchatki ne vixodit
1	0	10	Bez maski bez perchatki ne vixodit
\.


--
-- TOC entry 3005 (class 0 OID 16499)
-- Dependencies: 205
-- Data for Name: material; Type: TABLE DATA; Schema: public; Owner: artyom
--

COPY public.material (id, name, color, characteristics, price) FROM stdin;
0	silk	gold                          	Chineese silk from Beigin	15000
1	mink	dark                          	Mink from Europe	20000
\.


--
-- TOC entry 3002 (class 0 OID 16474)
-- Dependencies: 202
-- Data for Name: project; Type: TABLE DATA; Schema: public; Owner: artyom
--

COPY public.project (approving_date, designer_name, id_project, price) FROM stdin;
2013-06-01	Pokras Lampas	0	20000
\.


--
-- TOC entry 3004 (class 0 OID 16484)
-- Dependencies: 204
-- Data for Name: r6; Type: TABLE DATA; Schema: public; Owner: artyom
--

COPY public.r6 (id_coat, id_material, material_volume, price) FROM stdin;
0	0	100	1500000
\.


--
-- TOC entry 3007 (class 0 OID 16522)
-- Dependencies: 207
-- Data for Name: taylor; Type: TABLE DATA; Schema: public; Owner: artyom
--

COPY public.taylor (id_taylor, name, years_experience) FROM stdin;
0	Ivan	5
1	Sergey	15
\.


--
-- TOC entry 3017 (class 0 OID 0)
-- Dependencies: 209
-- Name: coat_id_coat_seq; Type: SEQUENCE SET; Schema: public; Owner: artyom
--

SELECT pg_catalog.setval('public.coat_id_coat_seq', 1, true);


--
-- TOC entry 3018 (class 0 OID 0)
-- Dependencies: 210
-- Name: material_id_seq; Type: SEQUENCE SET; Schema: public; Owner: artyom
--

SELECT pg_catalog.setval('public.material_id_seq', 1, true);


--
-- TOC entry 3019 (class 0 OID 0)
-- Dependencies: 208
-- Name: project_id_project_seq; Type: SEQUENCE SET; Schema: public; Owner: artyom
--

SELECT pg_catalog.setval('public.project_id_project_seq', 0, true);


--
-- TOC entry 3020 (class 0 OID 0)
-- Dependencies: 211
-- Name: taylor_id_taylor_seq; Type: SEQUENCE SET; Schema: public; Owner: artyom
--

SELECT pg_catalog.setval('public.taylor_id_taylor_seq', 1, true);


--
-- TOC entry 2862 (class 2606 OID 16483)
-- Name: coat coat_pkey; Type: CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.coat
    ADD CONSTRAINT coat_pkey PRIMARY KEY (id_coat);


--
-- TOC entry 2866 (class 2606 OID 16503)
-- Name: material material_pkey; Type: CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.material
    ADD CONSTRAINT material_pkey PRIMARY KEY (id);


--
-- TOC entry 2868 (class 2606 OID 16516)
-- Name: coats_order order_pkey; Type: CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.coats_order
    ADD CONSTRAINT order_pkey PRIMARY KEY (id_coat, id_tailor);


--
-- TOC entry 2860 (class 2606 OID 16478)
-- Name: project project_pkey; Type: CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.project
    ADD CONSTRAINT project_pkey PRIMARY KEY (id_project);


--
-- TOC entry 2864 (class 2606 OID 16488)
-- Name: r6 r6_pkey; Type: CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.r6
    ADD CONSTRAINT r6_pkey PRIMARY KEY (id_coat, id_material);


--
-- TOC entry 2870 (class 2606 OID 16526)
-- Name: taylor taylor_pkey; Type: CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.taylor
    ADD CONSTRAINT taylor_pkey PRIMARY KEY (id_taylor);


--
-- TOC entry 2872 (class 2606 OID 16489)
-- Name: r6 id_coat; Type: FK CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.r6
    ADD CONSTRAINT id_coat FOREIGN KEY (id_coat) REFERENCES public.coat(id_coat);


--
-- TOC entry 2874 (class 2606 OID 16517)
-- Name: coats_order id_coat; Type: FK CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.coats_order
    ADD CONSTRAINT id_coat FOREIGN KEY (id_coat) REFERENCES public.coat(id_coat);


--
-- TOC entry 2873 (class 2606 OID 16504)
-- Name: r6 id_material; Type: FK CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.r6
    ADD CONSTRAINT id_material FOREIGN KEY (id_material) REFERENCES public.material(id) NOT VALID;


--
-- TOC entry 2871 (class 2606 OID 16494)
-- Name: coat id_project; Type: FK CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.coat
    ADD CONSTRAINT id_project FOREIGN KEY (id_project) REFERENCES public.project(id_project) NOT VALID;


--
-- TOC entry 2875 (class 2606 OID 16527)
-- Name: coats_order id_taylor; Type: FK CONSTRAINT; Schema: public; Owner: artyom
--

ALTER TABLE ONLY public.coats_order
    ADD CONSTRAINT id_taylor FOREIGN KEY (id_tailor) REFERENCES public.taylor(id_taylor) NOT VALID;


-- Completed on 2021-02-03 15:01:44 MSK

--
-- PostgreSQL database dump complete
--

