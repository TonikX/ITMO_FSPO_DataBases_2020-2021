--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

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
-- Name: alpinist; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alpinist (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    surname character varying(40) NOT NULL,
    age integer NOT NULL,
    experience integer NOT NULL,
    address character varying(150) NOT NULL,
    club_id integer
);


ALTER TABLE public.alpinist OWNER TO postgres;

--
-- Name: alpinist_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.alpinist ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.alpinist_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: alpinist_in_group; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alpinist_in_group (
    id integer NOT NULL,
    alpinist_id integer,
    grouping_id integer
);


ALTER TABLE public.alpinist_in_group OWNER TO postgres;

--
-- Name: alpinist_in_group_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.alpinist_in_group ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.alpinist_in_group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: ascending; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ascending (
    id integer NOT NULL,
    start timestamp without time zone NOT NULL,
    ending timestamp without time zone NOT NULL,
    grouping_id integer
);


ALTER TABLE public.ascending OWNER TO postgres;

--
-- Name: ascending_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.ascending ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.ascending_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: ascending_route; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ascending_route (
    id integer NOT NULL,
    waypoint_id integer,
    ascending_id integer
);


ALTER TABLE public.ascending_route OWNER TO postgres;

--
-- Name: ascending_route_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.ascending_route ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.ascending_route_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: club; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.club (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    city character varying(40) NOT NULL,
    email character varying(100) NOT NULL,
    phone character varying(12) NOT NULL,
    holder_contacts character varying(150) NOT NULL,
    country_id integer
);


ALTER TABLE public.club OWNER TO postgres;

--
-- Name: club_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.club ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.club_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: country; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.country (
    id integer NOT NULL,
    name character varying(40) NOT NULL
);


ALTER TABLE public.country OWNER TO postgres;

--
-- Name: country_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.country ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.country_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: district; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.district (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    country_id integer
);


ALTER TABLE public.district OWNER TO postgres;

--
-- Name: district_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.district ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.district_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: emergency; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.emergency (
    id integer NOT NULL,
    ascending_id integer,
    alpinist_id integer,
    explanaition character varying(255) NOT NULL
);


ALTER TABLE public.emergency OWNER TO postgres;

--
-- Name: emergency_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.emergency ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.emergency_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: finished_ascending; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.finished_ascending (
    id integer NOT NULL,
    ascending_id integer,
    status character varying(255) NOT NULL
);


ALTER TABLE public.finished_ascending OWNER TO postgres;

--
-- Name: finished_ascending_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.finished_ascending ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.finished_ascending_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: grouping; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."grouping" (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    created_at date NOT NULL
);


ALTER TABLE public."grouping" OWNER TO postgres;

--
-- Name: grouping_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public."grouping" ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.grouping_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: mountain; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mountain (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    height integer NOT NULL,
    district_id integer
);


ALTER TABLE public.mountain OWNER TO postgres;

--
-- Name: mountain_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.mountain ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.mountain_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: waypoint; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.waypoint (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    description character varying(255) NOT NULL,
    mountain_id integer
);


ALTER TABLE public.waypoint OWNER TO postgres;

--
-- Name: waypoint_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.waypoint ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.waypoint_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Data for Name: alpinist; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alpinist (id, name, surname, age, experience, address, club_id) FROM stdin;
1	German	Ishakov	10	1	Nikolskoe	1
2	Alina	Antipova	20	5	Petroga	2
3	Kirill	Vyaznikov	15	2	Odessa	3
\.


--
-- Data for Name: alpinist_in_group; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alpinist_in_group (id, alpinist_id, grouping_id) FROM stdin;
1	1	1
2	2	2
3	3	3
\.


--
-- Data for Name: ascending; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ascending (id, start, ending, grouping_id) FROM stdin;
1	2021-05-27 23:36:42.489515	2021-05-27 23:36:42.489515	1
2	2021-05-27 23:36:45.177962	2021-05-27 23:36:45.177962	2
3	2021-05-27 23:36:47.523538	2021-05-27 23:36:47.523538	3
\.


--
-- Data for Name: ascending_route; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ascending_route (id, waypoint_id, ascending_id) FROM stdin;
4	1	1
5	2	2
6	3	3
\.


--
-- Data for Name: club; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.club (id, name, city, email, phone, holder_contacts, country_id) FROM stdin;
1	Yalta	Moscow	loghorrean74@gmail.com	89213043881	Fedorov Ilya Igorevich	1
2	Pendos	New-York	azaza@mail.ru	89213817417	Sinitskaya Maria Valeryevna	2
3	Ponaduser	Kiiv	simp@gmail.com	89000000000	Alabushed Dmitriy Bezotchestva	3
\.


--
-- Data for Name: country; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.country (id, name) FROM stdin;
1	Russia
2	USA
3	Ukraine
\.


--
-- Data for Name: district; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.district (id, name, country_id) FROM stdin;
1	Frunzenskiy	1
2	LA	2
3	Vinnitsa	3
\.


--
-- Data for Name: emergency; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.emergency (id, ascending_id, alpinist_id, explanaition) FROM stdin;
1	1	1	Ok
2	2	2	Ok
3	3	3	Injure
\.


--
-- Data for Name: finished_ascending; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.finished_ascending (id, ascending_id, status) FROM stdin;
1	1	Finished
2	2	Finished
3	3	Finished
\.


--
-- Data for Name: grouping; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."grouping" (id, name, created_at) FROM stdin;
1	Group 1	2021-05-27
2	Group 2	2021-05-27
3	Group 3	2021-05-27
\.


--
-- Data for Name: mountain; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mountain (id, name, height, district_id) FROM stdin;
1	Ural	100	1
2	Rashmor	200	2
3	Holmik	10000	3
\.


--
-- Data for Name: waypoint; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.waypoint (id, name, description, mountain_id) FROM stdin;
1	Name 1	Description 1	1
2	Name 2	Description 2	2
3	Name 3	Description 3	3
\.


--
-- Name: alpinist_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alpinist_id_seq', 3, true);


--
-- Name: alpinist_in_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alpinist_in_group_id_seq', 3, true);


--
-- Name: ascending_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ascending_id_seq', 3, true);


--
-- Name: ascending_route_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ascending_route_id_seq', 6, true);


--
-- Name: club_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.club_id_seq', 3, true);


--
-- Name: country_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.country_id_seq', 3, true);


--
-- Name: district_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.district_id_seq', 3, true);


--
-- Name: emergency_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.emergency_id_seq', 3, true);


--
-- Name: finished_ascending_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.finished_ascending_id_seq', 3, true);


--
-- Name: grouping_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.grouping_id_seq', 3, true);


--
-- Name: mountain_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mountain_id_seq', 3, true);


--
-- Name: waypoint_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.waypoint_id_seq', 3, true);


--
-- Name: alpinist_in_group alpinist_in_group_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alpinist_in_group
    ADD CONSTRAINT alpinist_in_group_pkey PRIMARY KEY (id);


--
-- Name: alpinist alpinist_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alpinist
    ADD CONSTRAINT alpinist_pkey PRIMARY KEY (id);


--
-- Name: ascending ascending_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ascending
    ADD CONSTRAINT ascending_pkey PRIMARY KEY (id);


--
-- Name: ascending_route ascending_route_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ascending_route
    ADD CONSTRAINT ascending_route_pkey PRIMARY KEY (id);


--
-- Name: club club_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.club
    ADD CONSTRAINT club_pkey PRIMARY KEY (id);


--
-- Name: country country_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.country
    ADD CONSTRAINT country_pkey PRIMARY KEY (id);


--
-- Name: district district_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.district
    ADD CONSTRAINT district_pkey PRIMARY KEY (id);


--
-- Name: emergency emergency_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.emergency
    ADD CONSTRAINT emergency_pkey PRIMARY KEY (id);


--
-- Name: finished_ascending finished_ascending_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.finished_ascending
    ADD CONSTRAINT finished_ascending_pkey PRIMARY KEY (id);


--
-- Name: grouping grouping_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."grouping"
    ADD CONSTRAINT grouping_pkey PRIMARY KEY (id);


--
-- Name: mountain mountain_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mountain
    ADD CONSTRAINT mountain_pkey PRIMARY KEY (id);


--
-- Name: waypoint waypoint_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.waypoint
    ADD CONSTRAINT waypoint_pkey PRIMARY KEY (id);


--
-- Name: alpinist_in_group fk_alpinist; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alpinist_in_group
    ADD CONSTRAINT fk_alpinist FOREIGN KEY (alpinist_id) REFERENCES public.alpinist(id);


--
-- Name: emergency fk_alpinist; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.emergency
    ADD CONSTRAINT fk_alpinist FOREIGN KEY (alpinist_id) REFERENCES public.alpinist(id);


--
-- Name: ascending_route fk_ascending; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ascending_route
    ADD CONSTRAINT fk_ascending FOREIGN KEY (ascending_id) REFERENCES public.ascending(id);


--
-- Name: finished_ascending fk_ascending; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.finished_ascending
    ADD CONSTRAINT fk_ascending FOREIGN KEY (ascending_id) REFERENCES public.ascending(id);


--
-- Name: emergency fk_ascending; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.emergency
    ADD CONSTRAINT fk_ascending FOREIGN KEY (ascending_id) REFERENCES public.ascending(id);


--
-- Name: alpinist fk_club; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alpinist
    ADD CONSTRAINT fk_club FOREIGN KEY (club_id) REFERENCES public.club(id);


--
-- Name: district fk_country; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.district
    ADD CONSTRAINT fk_country FOREIGN KEY (country_id) REFERENCES public.country(id);


--
-- Name: club fk_country; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.club
    ADD CONSTRAINT fk_country FOREIGN KEY (country_id) REFERENCES public.country(id);


--
-- Name: mountain fk_district; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mountain
    ADD CONSTRAINT fk_district FOREIGN KEY (district_id) REFERENCES public.district(id);


--
-- Name: alpinist_in_group fk_grouping; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alpinist_in_group
    ADD CONSTRAINT fk_grouping FOREIGN KEY (grouping_id) REFERENCES public."grouping"(id);


--
-- Name: ascending fk_grouping; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ascending
    ADD CONSTRAINT fk_grouping FOREIGN KEY (grouping_id) REFERENCES public."grouping"(id);


--
-- Name: waypoint fk_mountain; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.waypoint
    ADD CONSTRAINT fk_mountain FOREIGN KEY (mountain_id) REFERENCES public.mountain(id);


--
-- Name: ascending_route fk_waypoint; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ascending_route
    ADD CONSTRAINT fk_waypoint FOREIGN KEY (waypoint_id) REFERENCES public.waypoint(id);


--
-- PostgreSQL database dump complete
--

