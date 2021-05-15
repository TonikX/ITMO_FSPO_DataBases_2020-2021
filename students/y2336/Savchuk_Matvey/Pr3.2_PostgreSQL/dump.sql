--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-05-15 22:05:29

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
-- Name: 22; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "22";


ALTER SCHEMA "22" OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 206 (class 1259 OID 16426)
-- Name: адреса; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."адреса" (
    "id_заказчика" integer NOT NULL,
    "адрес" character(1) NOT NULL,
    "удобное_время" date NOT NULL
);


ALTER TABLE "22"."адреса" OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16396)
-- Name: заказчик; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."заказчик" (
    "id_заказчика" integer NOT NULL,
    "имя_заказчика" character(32) NOT NULL,
    "контакты" character(32) NOT NULL
);


ALTER TABLE "22"."заказчик" OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16401)
-- Name: заказы; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."заказы" (
    "дата_заказа" date NOT NULL,
    "дата_выдачи" date,
    "id_заказчика" integer NOT NULL,
    "id_заказа" integer NOT NULL,
    "статус_заказа" character(1) NOT NULL
);


ALTER TABLE "22"."заказы" OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16416)
-- Name: курьер; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."курьер" (
    "табельный_номер" integer NOT NULL,
    "фио" character(1) NOT NULL,
    "контакты" character(1) NOT NULL
);


ALTER TABLE "22"."курьер" OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16441)
-- Name: логистика; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."логистика" (
    "id_заказчика" integer NOT NULL,
    "id_заказа" integer NOT NULL,
    "табельный_номер" integer NOT NULL,
    "адрес" integer NOT NULL,
    "статус_доставки" character(1) NOT NULL
);


ALTER TABLE "22"."логистика" OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16436)
-- Name: материалы; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."материалы" (
    "id_материала" integer NOT NULL,
    "id_заказчика" integer NOT NULL,
    "id_заказа" integer NOT NULL,
    "количество" integer NOT NULL
);


ALTER TABLE "22"."материалы" OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16431)
-- Name: производство; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."производство" (
    "статус_производства" character(16) NOT NULL,
    "id_цеха" integer NOT NULL,
    "id_заказчика" integer NOT NULL,
    "id_заказа" integer NOT NULL
);


ALTER TABLE "22"."производство" OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16421)
-- Name: список_материалов; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."список_материалов" (
    "id_материала" integer NOT NULL,
    "стоимость_материала" integer NOT NULL,
    "имя_материала" character(1) NOT NULL,
    "вид_материала" character(1) NOT NULL,
    "характеристики" character(1) NOT NULL
);


ALTER TABLE "22"."список_материалов" OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16411)
-- Name: цех; Type: TABLE; Schema: 22; Owner: postgres
--

CREATE TABLE "22"."цех" (
    "id_цеха" integer NOT NULL,
    "название_цеха" character(1) NOT NULL,
    "адрес_цеха" character(1) NOT NULL
);


ALTER TABLE "22"."цех" OWNER TO postgres;

--
-- TOC entry 3035 (class 0 OID 16426)
-- Dependencies: 206
-- Data for Name: адреса; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."адреса" ("id_заказчика", "адрес", "удобное_время") FROM stdin;
\.


--
-- TOC entry 3030 (class 0 OID 16396)
-- Dependencies: 201
-- Data for Name: заказчик; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."заказчик" ("id_заказчика", "имя_заказчика", "контакты") FROM stdin;
\.


--
-- TOC entry 3031 (class 0 OID 16401)
-- Dependencies: 202
-- Data for Name: заказы; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."заказы" ("дата_заказа", "дата_выдачи", "id_заказчика", "id_заказа", "статус_заказа") FROM stdin;
\.


--
-- TOC entry 3033 (class 0 OID 16416)
-- Dependencies: 204
-- Data for Name: курьер; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."курьер" ("табельный_номер", "фио", "контакты") FROM stdin;
\.


--
-- TOC entry 3038 (class 0 OID 16441)
-- Dependencies: 209
-- Data for Name: логистика; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."логистика" ("id_заказчика", "id_заказа", "табельный_номер", "адрес", "статус_доставки") FROM stdin;
\.


--
-- TOC entry 3037 (class 0 OID 16436)
-- Dependencies: 208
-- Data for Name: материалы; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."материалы" ("id_материала", "id_заказчика", "id_заказа", "количество") FROM stdin;
\.


--
-- TOC entry 3036 (class 0 OID 16431)
-- Dependencies: 207
-- Data for Name: производство; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."производство" ("статус_производства", "id_цеха", "id_заказчика", "id_заказа") FROM stdin;
\.


--
-- TOC entry 3034 (class 0 OID 16421)
-- Dependencies: 205
-- Data for Name: список_материалов; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."список_материалов" ("id_материала", "стоимость_материала", "имя_материала", "вид_материала", "характеристики") FROM stdin;
\.


--
-- TOC entry 3032 (class 0 OID 16411)
-- Dependencies: 203
-- Data for Name: цех; Type: TABLE DATA; Schema: 22; Owner: postgres
--

COPY "22"."цех" ("id_цеха", "название_цеха", "адрес_цеха") FROM stdin;
\.


--
-- TOC entry 2892 (class 2606 OID 16430)
-- Name: адреса адреса_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."адреса"
    ADD CONSTRAINT "адреса_pkey" PRIMARY KEY ("id_заказчика");


--
-- TOC entry 2882 (class 2606 OID 16400)
-- Name: заказчик заказчик_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."заказчик"
    ADD CONSTRAINT "заказчик_pkey" PRIMARY KEY ("id_заказчика");


--
-- TOC entry 2884 (class 2606 OID 16405)
-- Name: заказы заказы_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."заказы"
    ADD CONSTRAINT "заказы_pkey" PRIMARY KEY ("id_заказа", "id_заказчика");


--
-- TOC entry 2888 (class 2606 OID 16420)
-- Name: курьер курьер_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."курьер"
    ADD CONSTRAINT "курьер_pkey" PRIMARY KEY ("табельный_номер");


--
-- TOC entry 2898 (class 2606 OID 16445)
-- Name: логистика логистика_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."логистика"
    ADD CONSTRAINT "логистика_pkey" PRIMARY KEY ("id_заказчика", "id_заказа", "табельный_номер", "адрес");


--
-- TOC entry 2896 (class 2606 OID 16440)
-- Name: материалы материалы_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."материалы"
    ADD CONSTRAINT "материалы_pkey" PRIMARY KEY ("id_материала", "id_заказчика", "id_заказа");


--
-- TOC entry 2894 (class 2606 OID 16435)
-- Name: производство производство_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."производство"
    ADD CONSTRAINT "производство_pkey" PRIMARY KEY ("id_цеха", "id_заказчика", "id_заказа");


--
-- TOC entry 2890 (class 2606 OID 16425)
-- Name: список_материалов список_материалов_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."список_материалов"
    ADD CONSTRAINT "список_материалов_pkey" PRIMARY KEY ("id_материала");


--
-- TOC entry 2886 (class 2606 OID 16415)
-- Name: цех цех_pkey; Type: CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."цех"
    ADD CONSTRAINT "цех_pkey" PRIMARY KEY ("id_цеха");


--
-- TOC entry 2899 (class 2606 OID 16406)
-- Name: заказы id_заказчика; Type: FK CONSTRAINT; Schema: 22; Owner: postgres
--

ALTER TABLE ONLY "22"."заказы"
    ADD CONSTRAINT "id_заказчика" FOREIGN KEY ("id_заказчика") REFERENCES "22"."заказчик"("id_заказчика");


-- Completed on 2021-05-15 22:05:30

--
-- PostgreSQL database dump complete
--

