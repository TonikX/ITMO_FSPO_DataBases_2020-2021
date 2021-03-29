--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

-- Started on 2021-03-16 21:54:06

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
-- TOC entry 206 (class 1259 OID 16710)
-- Name: article; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.article (
    id_article integer NOT NULL,
    id_release_fk integer
);


ALTER TABLE public.article OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16720)
-- Name: correction; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.correction (
    id_correction integer NOT NULL,
    content text NOT NULL,
    id_editorial_office_fk integer,
    id_article_fk integer
);


ALTER TABLE public.correction OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16638)
-- Name: editorial_office; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.editorial_office (
    id_editorial_office integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE public.editorial_office OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16654)
-- Name: newspaper; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.newspaper (
    id_newspaper integer NOT NULL,
    title_newspaper text NOT NULL,
    cost_newspaper double precision NOT NULL,
    publication_index integer,
    number_office integer,
    date_of_issue date,
    id_post_office_fk integer
);


ALTER TABLE public.newspaper OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16680)
-- Name: newspaper_distribution; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.newspaper_distribution (
    id_newspaper_distribution integer NOT NULL,
    number_of_copies integer,
    cost_release double precision,
    id_printing_office_fk integer,
    id_post_office_fk integer
);


ALTER TABLE public.newspaper_distribution OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16646)
-- Name: post_office; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.post_office (
    id_post_office integer NOT NULL,
    number_office integer NOT NULL,
    address_office text NOT NULL
);


ALTER TABLE public.post_office OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16667)
-- Name: printing_office; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.printing_office (
    id_printing_office integer NOT NULL,
    name_printing_office text NOT NULL,
    address_printing_office text,
    count integer,
    schedule_printing_office text,
    id_newspaper_fk integer
);


ALTER TABLE public.printing_office OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16695)
-- Name: release; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.release (
    id_release integer NOT NULL,
    date_of_issue_release date,
    publication_index_release integer,
    cost_copy double precision,
    id_printing_office_fk integer,
    id_newspaper_fk integer
);


ALTER TABLE public.release OWNER TO postgres;

--
-- TOC entry 3042 (class 0 OID 16710)
-- Dependencies: 206
-- Data for Name: article; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.article (id_article, id_release_fk) FROM stdin;
1	2
2	2
3	1
\.


--
-- TOC entry 3043 (class 0 OID 16720)
-- Dependencies: 207
-- Data for Name: correction; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.correction (id_correction, content, id_editorial_office_fk, id_article_fk) FROM stdin;
1	rgfhjthtbf	1	\N
2	thtburghrn	1	\N
3	gbgnyjy	2	\N
\.


--
-- TOC entry 3036 (class 0 OID 16638)
-- Dependencies: 200
-- Data for Name: editorial_office; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.editorial_office (id_editorial_office, name) FROM stdin;
1	Ivanov S.S.
2	Petrova A.M.
3	Medvedeva Z.A.
\.


--
-- TOC entry 3038 (class 0 OID 16654)
-- Dependencies: 202
-- Data for Name: newspaper; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.newspaper (id_newspaper, title_newspaper, cost_newspaper, publication_index, number_office, date_of_issue, id_post_office_fk) FROM stdin;
2	ITMO	12	54785	345	2021-03-16	1
1	neITMO	45	5675	125	2021-02-11	2
\.


--
-- TOC entry 3040 (class 0 OID 16680)
-- Dependencies: 204
-- Data for Name: newspaper_distribution; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.newspaper_distribution (id_newspaper_distribution, number_of_copies, cost_release, id_printing_office_fk, id_post_office_fk) FROM stdin;
1	100000	150	1	2
2	400000	100	2	2
\.


--
-- TOC entry 3037 (class 0 OID 16646)
-- Dependencies: 201
-- Data for Name: post_office; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.post_office (id_post_office, number_office, address_office) FROM stdin;
1	3489	Nevskij
2	357857	Petroga
\.


--
-- TOC entry 3039 (class 0 OID 16667)
-- Dependencies: 203
-- Data for Name: printing_office; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.printing_office (id_printing_office, name_printing_office, address_printing_office, count, schedule_printing_office, id_newspaper_fk) FROM stdin;
1	qwerty	Gorkovskaya, 15	12000	8-00 22-00	2
2	wasd	Gorkovskaya, 244a	2400	10-00 20-00	1
\.


--
-- TOC entry 3041 (class 0 OID 16695)
-- Dependencies: 205
-- Data for Name: release; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.release (id_release, date_of_issue_release, publication_index_release, cost_copy, id_printing_office_fk, id_newspaper_fk) FROM stdin;
1	2020-01-01	2435	100	2	2
2	2020-05-01	24635	120	1	1
\.


--
-- TOC entry 2894 (class 2606 OID 16714)
-- Name: article article_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT article_pkey PRIMARY KEY (id_article);


--
-- TOC entry 2896 (class 2606 OID 16727)
-- Name: correction correction_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.correction
    ADD CONSTRAINT correction_pkey PRIMARY KEY (id_correction);


--
-- TOC entry 2882 (class 2606 OID 16645)
-- Name: editorial_office editorial_office_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.editorial_office
    ADD CONSTRAINT editorial_office_pkey PRIMARY KEY (id_editorial_office);


--
-- TOC entry 2890 (class 2606 OID 16684)
-- Name: newspaper_distribution newspaper_distribution_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newspaper_distribution
    ADD CONSTRAINT newspaper_distribution_pkey PRIMARY KEY (id_newspaper_distribution);


--
-- TOC entry 2886 (class 2606 OID 16661)
-- Name: newspaper newspaper_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newspaper
    ADD CONSTRAINT newspaper_pkey PRIMARY KEY (id_newspaper);


--
-- TOC entry 2884 (class 2606 OID 16653)
-- Name: post_office post_office_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_office
    ADD CONSTRAINT post_office_pkey PRIMARY KEY (id_post_office);


--
-- TOC entry 2888 (class 2606 OID 16674)
-- Name: printing_office printing_office_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.printing_office
    ADD CONSTRAINT printing_office_pkey PRIMARY KEY (id_printing_office);


--
-- TOC entry 2892 (class 2606 OID 16699)
-- Name: release release_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.release
    ADD CONSTRAINT release_pkey PRIMARY KEY (id_release);


--
-- TOC entry 2903 (class 2606 OID 16715)
-- Name: article article_id_release_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.article
    ADD CONSTRAINT article_id_release_fk_fkey FOREIGN KEY (id_release_fk) REFERENCES public.release(id_release);


--
-- TOC entry 2905 (class 2606 OID 16733)
-- Name: correction correction_id_article_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.correction
    ADD CONSTRAINT correction_id_article_fk_fkey FOREIGN KEY (id_article_fk) REFERENCES public.article(id_article);


--
-- TOC entry 2904 (class 2606 OID 16728)
-- Name: correction correction_id_editorial_office_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.correction
    ADD CONSTRAINT correction_id_editorial_office_fk_fkey FOREIGN KEY (id_editorial_office_fk) REFERENCES public.editorial_office(id_editorial_office);


--
-- TOC entry 2900 (class 2606 OID 16690)
-- Name: newspaper_distribution newspaper_distribution_id_post_office_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newspaper_distribution
    ADD CONSTRAINT newspaper_distribution_id_post_office_fk_fkey FOREIGN KEY (id_post_office_fk) REFERENCES public.post_office(id_post_office);


--
-- TOC entry 2899 (class 2606 OID 16685)
-- Name: newspaper_distribution newspaper_distribution_id_printing_office_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newspaper_distribution
    ADD CONSTRAINT newspaper_distribution_id_printing_office_fk_fkey FOREIGN KEY (id_printing_office_fk) REFERENCES public.printing_office(id_printing_office);


--
-- TOC entry 2897 (class 2606 OID 16662)
-- Name: newspaper newspaper_id_post_office_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newspaper
    ADD CONSTRAINT newspaper_id_post_office_fk_fkey FOREIGN KEY (id_post_office_fk) REFERENCES public.post_office(id_post_office);


--
-- TOC entry 2898 (class 2606 OID 16675)
-- Name: printing_office printing_office_id_newspaper_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.printing_office
    ADD CONSTRAINT printing_office_id_newspaper_fk_fkey FOREIGN KEY (id_newspaper_fk) REFERENCES public.newspaper(id_newspaper);


--
-- TOC entry 2902 (class 2606 OID 16705)
-- Name: release release_id_newspaper_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.release
    ADD CONSTRAINT release_id_newspaper_fk_fkey FOREIGN KEY (id_newspaper_fk) REFERENCES public.newspaper(id_newspaper);


--
-- TOC entry 2901 (class 2606 OID 16700)
-- Name: release release_id_printing_office_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.release
    ADD CONSTRAINT release_id_printing_office_fk_fkey FOREIGN KEY (id_printing_office_fk) REFERENCES public.printing_office(id_printing_office);


-- Completed on 2021-03-16 21:54:06

--
-- PostgreSQL database dump complete
--

