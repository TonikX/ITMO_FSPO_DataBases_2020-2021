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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: breed; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.breed (
    breed_id integer NOT NULL,
    average_kpd integer,
    average_weight integer
);


ALTER TABLE public.breed OWNER TO postgres;

--
-- Name: cell; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cell (
    cell_id integer NOT NULL,
    "row" integer,
    cell integer,
    department integer
);


ALTER TABLE public.cell OWNER TO postgres;

--
-- Name: chicken; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.chicken (
    chicken_id integer NOT NULL,
    weight integer,
    age integer,
    kpd integer,
    place character varying(40),
    breed integer
);


ALTER TABLE public.chicken OWNER TO postgres;

--
-- Name: cleaning; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cleaning (
    cleaning_id integer NOT NULL,
    cell integer,
    worker integer
);


ALTER TABLE public.cleaning OWNER TO postgres;

--
-- Name: department; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.department (
    department_id integer NOT NULL,
    capacity integer,
    address character varying(40)
);


ALTER TABLE public.department OWNER TO postgres;

--
-- Name: diet; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.diet (
    diet_id integer NOT NULL,
    content character varying(40),
    season character varying(40),
    breed integer
);


ALTER TABLE public.diet OWNER TO postgres;

--
-- Name: maintenance; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.maintenance (
    maintenance_id integer NOT NULL,
    in_d date,
    out_d date,
    cell integer,
    chicken integer
);


ALTER TABLE public.maintenance OWNER TO postgres;

--
-- Name: worker; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.worker (
    worker_id integer NOT NULL,
    passport character varying(40),
    passport_timing character varying(40),
    fio character varying(80),
    work_place character varying(40),
    salary integer,
    doc integer,
    fire boolean,
    hire date
);


ALTER TABLE public.worker OWNER TO postgres;

--
-- Data for Name: breed; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.breed (breed_id, average_kpd, average_weight) FROM stdin;
1	2	3
2	2	3
3	3	2
\.


--
-- Data for Name: cell; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cell (cell_id, "row", cell, department) FROM stdin;
1	2	3	1
2	2	3	2
3	2	3	3
\.


--
-- Data for Name: chicken; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.chicken (chicken_id, weight, age, kpd, place, breed) FROM stdin;
1	100	10	30	Here	1
2	10	100	60	Here	2
3	200	50	50	Here	3
\.


--
-- Data for Name: cleaning; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cleaning (cleaning_id, cell, worker) FROM stdin;
1	1	1
2	2	2
3	3	3
\.


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.department (department_id, capacity, address) FROM stdin;
1	100	Pushkin st.
2	100	Alehin st.
3	100	Pushkin st.
\.


--
-- Data for Name: diet; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.diet (diet_id, content, season, breed) FROM stdin;
1	Cool	Spring	3
2	Cooler	Spring	2
3	Best	Summer	3
\.


--
-- Data for Name: maintenance; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.maintenance (maintenance_id, in_d, out_d, cell, chicken) FROM stdin;
1	2018-03-20	2018-04-23	1	1
2	2018-03-20	2018-04-23	2	2
3	2018-03-20	2018-04-23	3	3
\.


--
-- Data for Name: worker; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.worker (worker_id, passport, passport_timing, fio, work_place, salary, doc, fire, hire) FROM stdin;
1	133333	12.02.2020	Antonov Anton Antonovich	Here	15000	123	f	2019-03-12
2	133333	12.02.2020	Spasibo za labu	Here	15000	123	f	2019-03-12
3	133333	12.02.2020	Govorov Anton Igorevich	Here	15000	123	f	2019-03-12
\.


--
-- Name: breed breed_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.breed
    ADD CONSTRAINT breed_pkey PRIMARY KEY (breed_id);


--
-- Name: cell cell_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cell
    ADD CONSTRAINT cell_pkey PRIMARY KEY (cell_id);


--
-- Name: chicken chicken_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chicken
    ADD CONSTRAINT chicken_pkey PRIMARY KEY (chicken_id);


--
-- Name: cleaning cleaning_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cleaning
    ADD CONSTRAINT cleaning_pkey PRIMARY KEY (cleaning_id);


--
-- Name: department department_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.department
    ADD CONSTRAINT department_pkey PRIMARY KEY (department_id);


--
-- Name: diet diet_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diet
    ADD CONSTRAINT diet_pkey PRIMARY KEY (diet_id);


--
-- Name: maintenance maintenance_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maintenance
    ADD CONSTRAINT maintenance_pkey PRIMARY KEY (maintenance_id);


--
-- Name: worker worker_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.worker
    ADD CONSTRAINT worker_pkey PRIMARY KEY (worker_id);


--
-- Name: cell cell_department_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cell
    ADD CONSTRAINT cell_department_fkey FOREIGN KEY (department) REFERENCES public.department(department_id);


--
-- Name: chicken chicken_breed_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chicken
    ADD CONSTRAINT chicken_breed_fkey FOREIGN KEY (breed) REFERENCES public.breed(breed_id);


--
-- Name: cleaning cleaning_cell_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cleaning
    ADD CONSTRAINT cleaning_cell_fkey FOREIGN KEY (cell) REFERENCES public.cell(cell_id);


--
-- Name: cleaning cleaning_worker_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cleaning
    ADD CONSTRAINT cleaning_worker_fkey FOREIGN KEY (worker) REFERENCES public.worker(worker_id);


--
-- Name: diet diet_breed_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diet
    ADD CONSTRAINT diet_breed_fkey FOREIGN KEY (breed) REFERENCES public.breed(breed_id);


--
-- Name: maintenance maintenance_cell_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maintenance
    ADD CONSTRAINT maintenance_cell_fkey FOREIGN KEY (cell) REFERENCES public.cell(cell_id);


--
-- Name: maintenance maintenance_chicken_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maintenance
    ADD CONSTRAINT maintenance_chicken_fkey FOREIGN KEY (chicken) REFERENCES public.chicken(chicken_id);


--
-- PostgreSQL database dump complete
--

