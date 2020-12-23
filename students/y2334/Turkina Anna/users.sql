--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

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
-- Name: ╨б╤Е╨╡╨╝╨░1; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "╨б╤Е╨╡╨╝╨░1";


ALTER SCHEMA "╨б╤Е╨╡╨╝╨░1" OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: ╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М; Type: TABLE; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

CREATE TABLE "╨б╤Е╨╡╨╝╨░1"."╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М" (
    "ID" bigint NOT NULL,
    "╨Ь╨░╤А╨║╨░" "char" NOT NULL,
    "╨Э╨╛╨╝╨╡╤А" bigint NOT NULL
);


ALTER TABLE "╨б╤Е╨╡╨╝╨░1"."╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М" OWNER TO postgres;

--
-- Name: ╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕; Type: TABLE; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

CREATE TABLE "╨б╤Е╨╡╨╝╨░1"."╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕" (
    "ID" bigint NOT NULL,
    "╨Э╨░╨╖╨▓╨░╨╜╨╕╨╡" "char",
    "╨в╨╕╨┐" "char"
);


ALTER TABLE "╨б╤Е╨╡╨╝╨░1"."╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕" OWNER TO postgres;

--
-- Name: ╨Ъ╨╗╨╕╨╡╨╜╤В; Type: TABLE; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

CREATE TABLE "╨б╤Е╨╡╨╝╨░1"."╨Ъ╨╗╨╕╨╡╨╜╤В" (
    "ID" bigint NOT NULL,
    "╨Ш╨╝╤П" "char" NOT NULL
);


ALTER TABLE "╨б╤Е╨╡╨╝╨░1"."╨Ъ╨╗╨╕╨╡╨╜╤В" OWNER TO postgres;

--
-- Name: ╨Ь╨╛╨╣╤Й╨╕╨║; Type: TABLE; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

CREATE TABLE "╨б╤Е╨╡╨╝╨░1"."╨Ь╨╛╨╣╤Й╨╕╨║" (
    "ID" bigint NOT NULL,
    "╨Ш╨╝╤П" "char" NOT NULL
);


ALTER TABLE "╨б╤Е╨╡╨╝╨░1"."╨Ь╨╛╨╣╤Й╨╕╨║" OWNER TO postgres;

--
-- Name: ╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕; Type: TABLE; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

CREATE TABLE "╨б╤Е╨╡╨╝╨░1"."╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕" (
    "ID" bigint NOT NULL,
    "ID_╨░╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М" bigint NOT NULL,
    "ID_╨║╨╗╨╕╨╡╨╜╤В" bigint NOT NULL,
    "ID_╨╝╨╛╨╣╤Й╨╕╨║" bigint NOT NULL,
    "ID_╨┤╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕" bigint NOT NULL,
    "ID_╤В╨╕╨┐_╨╝╨╛╨╣╨║╨╕" bigint NOT NULL,
    "ID_╤Г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕" bigint NOT NULL,
    "╨б╤В╨╛╨╕╨╝╨╛╤Б╤В╤М" bigint[],
    "╨Ф╨░╤В╨░" date
);


ALTER TABLE "╨б╤Е╨╡╨╝╨░1"."╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕" OWNER TO postgres;

--
-- Name: ╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕; Type: TABLE; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

CREATE TABLE "╨б╤Е╨╡╨╝╨░1"."╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕" (
    "ID" bigint NOT NULL,
    "╨Э╨░╨╖╨▓╨░╨╜╨╕╨╡" "char" NOT NULL,
    "╨Т╨╕╨┤" "char" NOT NULL
);


ALTER TABLE "╨б╤Е╨╡╨╝╨░1"."╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕" OWNER TO postgres;

--
-- Name: ╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕; Type: TABLE; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

CREATE TABLE "╨б╤Е╨╡╨╝╨░1"."╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕" (
    "ID" bigint NOT NULL,
    "ID_╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕" bigint NOT NULL
);


ALTER TABLE "╨б╤Е╨╡╨╝╨░1"."╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕" OWNER TO postgres;

--
-- Data for Name: ╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М; Type: TABLE DATA; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

COPY "╨б╤Е╨╡╨╝╨░1"."╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М" ("ID", "╨Ь╨░╤А╨║╨░", "╨Э╨╛╨╝╨╡╤А") FROM stdin;
1	a	2345
2	b	1136
3	r	2222
\.


--
-- Data for Name: ╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕; Type: TABLE DATA; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

COPY "╨б╤Е╨╡╨╝╨░1"."╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕" ("ID", "╨Э╨░╨╖╨▓╨░╨╜╨╕╨╡", "╨в╨╕╨┐") FROM stdin;
\.


--
-- Data for Name: ╨Ъ╨╗╨╕╨╡╨╜╤В; Type: TABLE DATA; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

COPY "╨б╤Е╨╡╨╝╨░1"."╨Ъ╨╗╨╕╨╡╨╜╤В" ("ID", "╨Ш╨╝╤П") FROM stdin;
\.


--
-- Data for Name: ╨Ь╨╛╨╣╤Й╨╕╨║; Type: TABLE DATA; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

COPY "╨б╤Е╨╡╨╝╨░1"."╨Ь╨╛╨╣╤Й╨╕╨║" ("ID", "╨Ш╨╝╤П") FROM stdin;
\.


--
-- Data for Name: ╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕; Type: TABLE DATA; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

COPY "╨б╤Е╨╡╨╝╨░1"."╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕" ("ID", "ID_╨░╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М", "ID_╨║╨╗╨╕╨╡╨╜╤В", "ID_╨╝╨╛╨╣╤Й╨╕╨║", "ID_╨┤╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕", "ID_╤В╨╕╨┐_╨╝╨╛╨╣╨║╨╕", "ID_╤Г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕", "╨б╤В╨╛╨╕╨╝╨╛╤Б╤В╤М", "╨Ф╨░╤В╨░") FROM stdin;
1	1	1	2	3	3	1	{555}	2020-12-12
2	2	2	3	1	2	2	{1000}	2020-10-22
3	3	3	1	2	1	3	{1500}	2020-10-28
\.


--
-- Data for Name: ╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕; Type: TABLE DATA; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

COPY "╨б╤Е╨╡╨╝╨░1"."╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕" ("ID", "╨Э╨░╨╖╨▓╨░╨╜╨╕╨╡", "╨Т╨╕╨┤") FROM stdin;
\.


--
-- Data for Name: ╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕; Type: TABLE DATA; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

COPY "╨б╤Е╨╡╨╝╨░1"."╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕" ("ID", "ID_╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕") FROM stdin;
1	1
2	2
3	3
\.


--
-- Name: ╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М ╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М_pkey; Type: CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М"
    ADD CONSTRAINT "╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М_pkey" PRIMARY KEY ("ID");


--
-- Name: ╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕ ╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕_pkey; Type: CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕"
    ADD CONSTRAINT "╨Ф╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕_pkey" PRIMARY KEY ("ID");


--
-- Name: ╨Ъ╨╗╨╕╨╡╨╜╤В ╨Ъ╨╗╨╕╨╡╨╜╤В_pkey; Type: CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨Ъ╨╗╨╕╨╡╨╜╤В"
    ADD CONSTRAINT "╨Ъ╨╗╨╕╨╡╨╜╤В_pkey" PRIMARY KEY ("ID");


--
-- Name: ╨Ь╨╛╨╣╤Й╨╕╨║ ╨Ь╨╛╨╣╤Й╨╕╨║_pkey; Type: CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨Ь╨╛╨╣╤Й╨╕╨║"
    ADD CONSTRAINT "╨Ь╨╛╨╣╤Й╨╕╨║_pkey" PRIMARY KEY ("ID");


--
-- Name: ╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕ ╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕_pkey; Type: CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕"
    ADD CONSTRAINT "╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕_pkey" PRIMARY KEY ("ID", "ID_╨░╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М", "ID_╨║╨╗╨╕╨╡╨╜╤В", "ID_╨╝╨╛╨╣╤Й╨╕╨║", "ID_╨┤╨╛╨┐_╤Г╤Б╨╗╤Г╨│╨╕", "ID_╤В╨╕╨┐_╨╝╨╛╨╣╨║╨╕", "ID_╤Г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕");


--
-- Name: ╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕ ╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕_pkey; Type: CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕"
    ADD CONSTRAINT "╨в╨╕╨┐_╨╝╨╛╨╣╨║╨╕_pkey" PRIMARY KEY ("ID");


--
-- Name: ╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕ ╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕_pkey; Type: CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕"
    ADD CONSTRAINT "╨г╤Б╨╗╤Г╨│╨░_╨╝╨╛╨╣╨║╨╕_pkey" PRIMARY KEY ("ID", "ID_╨Я╤А╨╛╤Ж╨╡╤Б╤Б_╨╝╨╛╨╣╨║╨╕");


--
-- Name: ╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М fk1; Type: FK CONSTRAINT; Schema: ╨б╤Е╨╡╨╝╨░1; Owner: postgres
--

ALTER TABLE ONLY "╨б╤Е╨╡╨╝╨░1"."╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М"
    ADD CONSTRAINT fk1 FOREIGN KEY ("ID") REFERENCES "╨б╤Е╨╡╨╝╨░1"."╨Р╨▓╤В╨╛╨╝╨╛╨▒╨╕╨╗╤М"("ID") ON UPDATE RESTRICT ON DELETE RESTRICT NOT VALID;


--
-- Name: SCHEMA "╨б╤Е╨╡╨╝╨░1"; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA "╨б╤Е╨╡╨╝╨░1" FROM postgres;
GRANT ALL ON SCHEMA "╨б╤Е╨╡╨╝╨░1" TO postgres WITH GRANT OPTION;


--
-- PostgreSQL database dump complete
--

