--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-02-05 17:07:03

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
-- Name: testSchema; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "testSchema";


ALTER SCHEMA "testSchema" OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 203 (class 1259 OID 16403)
-- Name: Material; Type: TABLE; Schema: testSchema; Owner: postgres
--

CREATE TABLE "testSchema"."Material" (
    id_material integer NOT NULL,
    "Name" character varying(50) NOT NULL,
    "Character" character varying(150) NOT NULL,
    "Cost" integer NOT NULL
);


ALTER TABLE "testSchema"."Material" OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16419)
-- Name: Order; Type: TABLE; Schema: testSchema; Owner: postgres
--

CREATE TABLE "testSchema"."Order" (
    id_order integer NOT NULL,
    "Amount" integer NOT NULL,
    "Terms" character varying(250) NOT NULL,
    "Project" integer NOT NULL,
    "Tailor" integer NOT NULL
);


ALTER TABLE "testSchema"."Order" OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16449)
-- Name: Order_id_order_seq; Type: SEQUENCE; Schema: testSchema; Owner: postgres
--

ALTER TABLE "testSchema"."Order" ALTER COLUMN id_order ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "testSchema"."Order_id_order_seq"
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 201 (class 1259 OID 16396)
-- Name: Project; Type: TABLE; Schema: testSchema; Owner: postgres
--

CREATE TABLE "testSchema"."Project" (
    id_proj integer NOT NULL,
    "Designer_name" character varying(50) NOT NULL,
    "Approval_date" date NOT NULL,
    "Cost" integer NOT NULL
);


ALTER TABLE "testSchema"."Project" OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16417)
-- Name: Project_id_proj_seq; Type: SEQUENCE; Schema: testSchema; Owner: postgres
--

ALTER TABLE "testSchema"."Project" ALTER COLUMN id_proj ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "testSchema"."Project_id_proj_seq"
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 208 (class 1259 OID 16434)
-- Name: Provision; Type: TABLE; Schema: testSchema; Owner: postgres
--

CREATE TABLE "testSchema"."Provision" (
    id_prov integer NOT NULL,
    "Size" integer NOT NULL,
    "Cost" integer NOT NULL,
    "Project" integer NOT NULL,
    "Material" integer NOT NULL
);


ALTER TABLE "testSchema"."Provision" OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 16451)
-- Name: Provision_id_prov_seq; Type: SEQUENCE; Schema: testSchema; Owner: postgres
--

ALTER TABLE "testSchema"."Provision" ALTER COLUMN id_prov ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "testSchema"."Provision_id_prov_seq"
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 205 (class 1259 OID 16410)
-- Name: Tailor; Type: TABLE; Schema: testSchema; Owner: postgres
--

CREATE TABLE "testSchema"."Tailor" (
    id_tailor integer NOT NULL,
    "Name" character varying(50) NOT NULL,
    "Exp" integer
);


ALTER TABLE "testSchema"."Tailor" OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16408)
-- Name: Tailor_id_tailor_seq; Type: SEQUENCE; Schema: testSchema; Owner: postgres
--

ALTER TABLE "testSchema"."Tailor" ALTER COLUMN id_tailor ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "testSchema"."Tailor_id_tailor_seq"
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 202 (class 1259 OID 16401)
-- Name: material_id_material_seq; Type: SEQUENCE; Schema: testSchema; Owner: postgres
--

ALTER TABLE "testSchema"."Material" ALTER COLUMN id_material ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME "testSchema".material_id_material_seq
    START WITH 0
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 1000000
    CACHE 1
);


--
-- TOC entry 3021 (class 0 OID 16403)
-- Dependencies: 203
-- Data for Name: Material; Type: TABLE DATA; Schema: testSchema; Owner: postgres
--

COPY "testSchema"."Material" (id_material, "Name", "Character", "Cost") FROM stdin;
1	Silk	Some desc 1	500
2	Wool	Some desc 2	400
3	Cloth	Some desc	300
\.


--
-- TOC entry 3025 (class 0 OID 16419)
-- Dependencies: 207
-- Data for Name: Order; Type: TABLE DATA; Schema: testSchema; Owner: postgres
--

COPY "testSchema"."Order" (id_order, "Amount", "Terms", "Project", "Tailor") FROM stdin;
0	25	Some terms	3	2
1	40	Some terms 1	1	1
\.


--
-- TOC entry 3019 (class 0 OID 16396)
-- Dependencies: 201
-- Data for Name: Project; Type: TABLE DATA; Schema: testSchema; Owner: postgres
--

COPY "testSchema"."Project" (id_proj, "Designer_name", "Approval_date", "Cost") FROM stdin;
0	Tommy	2000-01-01	5000
1	Tommy	2000-01-01	5000
2	John	2010-07-10	7000
3	Andy	2020-10-13	17500
4	Kim	2007-05-04	1234
\.


--
-- TOC entry 3026 (class 0 OID 16434)
-- Dependencies: 208
-- Data for Name: Provision; Type: TABLE DATA; Schema: testSchema; Owner: postgres
--

COPY "testSchema"."Provision" (id_prov, "Size", "Cost", "Project", "Material") FROM stdin;
0	10	500	2	1
\.


--
-- TOC entry 3023 (class 0 OID 16410)
-- Dependencies: 205
-- Data for Name: Tailor; Type: TABLE DATA; Schema: testSchema; Owner: postgres
--

COPY "testSchema"."Tailor" (id_tailor, "Name", "Exp") FROM stdin;
0	Bill	7
2	Drew	15
1	BAN	3
\.


--
-- TOC entry 3034 (class 0 OID 0)
-- Dependencies: 209
-- Name: Order_id_order_seq; Type: SEQUENCE SET; Schema: testSchema; Owner: postgres
--

SELECT pg_catalog.setval('"testSchema"."Order_id_order_seq"', 1, true);


--
-- TOC entry 3035 (class 0 OID 0)
-- Dependencies: 206
-- Name: Project_id_proj_seq; Type: SEQUENCE SET; Schema: testSchema; Owner: postgres
--

SELECT pg_catalog.setval('"testSchema"."Project_id_proj_seq"', 4, true);


--
-- TOC entry 3036 (class 0 OID 0)
-- Dependencies: 210
-- Name: Provision_id_prov_seq; Type: SEQUENCE SET; Schema: testSchema; Owner: postgres
--

SELECT pg_catalog.setval('"testSchema"."Provision_id_prov_seq"', 0, true);


--
-- TOC entry 3037 (class 0 OID 0)
-- Dependencies: 204
-- Name: Tailor_id_tailor_seq; Type: SEQUENCE SET; Schema: testSchema; Owner: postgres
--

SELECT pg_catalog.setval('"testSchema"."Tailor_id_tailor_seq"', 2, true);


--
-- TOC entry 3038 (class 0 OID 0)
-- Dependencies: 202
-- Name: material_id_material_seq; Type: SEQUENCE SET; Schema: testSchema; Owner: postgres
--

SELECT pg_catalog.setval('"testSchema".material_id_material_seq', 3, true);


--
-- TOC entry 2882 (class 2606 OID 16423)
-- Name: Order Order_pkey; Type: CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Order"
    ADD CONSTRAINT "Order_pkey" PRIMARY KEY (id_order);


--
-- TOC entry 2876 (class 2606 OID 16416)
-- Name: Project Project_pkey; Type: CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Project"
    ADD CONSTRAINT "Project_pkey" PRIMARY KEY (id_proj);


--
-- TOC entry 2884 (class 2606 OID 16438)
-- Name: Provision Provision_pkey; Type: CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Provision"
    ADD CONSTRAINT "Provision_pkey" PRIMARY KEY (id_prov);


--
-- TOC entry 2880 (class 2606 OID 16414)
-- Name: Tailor Tailor_pkey; Type: CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Tailor"
    ADD CONSTRAINT "Tailor_pkey" PRIMARY KEY (id_tailor);


--
-- TOC entry 2878 (class 2606 OID 16407)
-- Name: Material material_pkey; Type: CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Material"
    ADD CONSTRAINT material_pkey PRIMARY KEY (id_material);


--
-- TOC entry 2886 (class 2606 OID 16429)
-- Name: Order Order_id_proj_fkey; Type: FK CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Order"
    ADD CONSTRAINT "Order_id_proj_fkey" FOREIGN KEY ("Project") REFERENCES "testSchema"."Project"(id_proj);


--
-- TOC entry 2885 (class 2606 OID 16424)
-- Name: Order Order_id_tailor_fkey; Type: FK CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Order"
    ADD CONSTRAINT "Order_id_tailor_fkey" FOREIGN KEY ("Tailor") REFERENCES "testSchema"."Tailor"(id_tailor);


--
-- TOC entry 2888 (class 2606 OID 16444)
-- Name: Provision Provision_Material_fkey; Type: FK CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Provision"
    ADD CONSTRAINT "Provision_Material_fkey" FOREIGN KEY ("Material") REFERENCES "testSchema"."Material"(id_material);


--
-- TOC entry 2887 (class 2606 OID 16439)
-- Name: Provision Provision_Project_fkey; Type: FK CONSTRAINT; Schema: testSchema; Owner: postgres
--

ALTER TABLE ONLY "testSchema"."Provision"
    ADD CONSTRAINT "Provision_Project_fkey" FOREIGN KEY ("Project") REFERENCES "testSchema"."Project"(id_proj);


-- Completed on 2021-02-05 17:07:04

--
-- PostgreSQL database dump complete
--

