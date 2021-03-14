--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-03-14 12:30:56

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
-- TOC entry 200 (class 1259 OID 16645)
-- Name: aircarrier; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aircarrier (
    idaircarrier integer NOT NULL,
    name text NOT NULL,
    workers integer NOT NULL
);


ALTER TABLE public.aircarrier OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16673)
-- Name: crew; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.crew (
    idcrew integer NOT NULL,
    staff integer NOT NULL,
    member_idmember integer NOT NULL
);


ALTER TABLE public.crew OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16688)
-- Name: fly; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fly (
    plane_idplane integer NOT NULL,
    trip_idtrip integer NOT NULL,
    route character varying(45) NOT NULL,
    transit_landings_idtransit_landings integer NOT NULL,
    crew_idcrew integer NOT NULL
);


ALTER TABLE public.fly OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16668)
-- Name: member; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.member (
    idmember integer NOT NULL,
    name character varying(45) NOT NULL,
    age integer NOT NULL,
    role character varying(45) NOT NULL,
    age_experience integer NOT NULL
);


ALTER TABLE public.member OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16653)
-- Name: plane; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.plane (
    idplane integer NOT NULL,
    stamp character varying(10) NOT NULL,
    places integer NOT NULL,
    type character varying(45) NOT NULL,
    speed double precision NOT NULL,
    aircarrier_idaircarrier integer NOT NULL
);


ALTER TABLE public.plane OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16683)
-- Name: transit_landings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transit_landings (
    idtransit_landings integer NOT NULL,
    point_landings character varying(45) NOT NULL,
    date_landings date NOT NULL
);


ALTER TABLE public.transit_landings OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16663)
-- Name: trip; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.trip (
    idtrip integer NOT NULL,
    pointdeparture character varying(45) NOT NULL,
    destination character varying(45) NOT NULL,
    date_departure date NOT NULL,
    date_destination date NOT NULL,
    distance double precision NOT NULL,
    tickets_sold integer NOT NULL
);


ALTER TABLE public.trip OWNER TO postgres;

--
-- TOC entry 3023 (class 0 OID 16645)
-- Dependencies: 200
-- Data for Name: aircarrier; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aircarrier (idaircarrier, name, workers) FROM stdin;
1	Aeroflot	250
2	EmiratesAer	500
3	JangoAer	200
\.


--
-- TOC entry 3027 (class 0 OID 16673)
-- Dependencies: 204
-- Data for Name: crew; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.crew (idcrew, staff, member_idmember) FROM stdin;
1	3	1
2	3	2
3	3	3
\.


--
-- TOC entry 3029 (class 0 OID 16688)
-- Dependencies: 206
-- Data for Name: fly; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fly (plane_idplane, trip_idtrip, route, transit_landings_idtransit_landings, crew_idcrew) FROM stdin;
1	1	1	1	1
2	2	2	2	2
3	3	3	3	3
\.


--
-- TOC entry 3026 (class 0 OID 16668)
-- Dependencies: 203
-- Data for Name: member; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.member (idmember, name, age, role, age_experience) FROM stdin;
1	Roman	20	Pilot	1
2	Eithne	20	Pilot	2
3	Aglais	30	Stuard	3
\.


--
-- TOC entry 3024 (class 0 OID 16653)
-- Dependencies: 201
-- Data for Name: plane; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.plane (idplane, stamp, places, type, speed, aircarrier_idaircarrier) FROM stdin;
1	Mark1	250	Big	235	1
2	Mark3	350	Big	335	2
3	Mark3	150	Medium	235	3
\.


--
-- TOC entry 3028 (class 0 OID 16683)
-- Dependencies: 205
-- Data for Name: transit_landings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transit_landings (idtransit_landings, point_landings, date_landings) FROM stdin;
1	Gibraltar	2021-02-10
2	Stambul	2021-03-10
3	Horizon	2021-05-10
\.


--
-- TOC entry 3025 (class 0 OID 16663)
-- Dependencies: 202
-- Data for Name: trip; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.trip (idtrip, pointdeparture, destination, date_departure, date_destination, distance, tickets_sold) FROM stdin;
1	Moscow	Saint-Petersburg	2021-02-10	2021-02-11	700	300
2	Moscow	Saint-Petersburg	2021-02-10	2021-02-11	700	300
3	Moscow	Saint-Petersburg	2021-02-10	2021-02-11	700	300
\.


--
-- TOC entry 2874 (class 2606 OID 16652)
-- Name: aircarrier aircarrier_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aircarrier
    ADD CONSTRAINT aircarrier_pkey PRIMARY KEY (idaircarrier);


--
-- TOC entry 2882 (class 2606 OID 16677)
-- Name: crew crew_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.crew
    ADD CONSTRAINT crew_pkey PRIMARY KEY (idcrew);


--
-- TOC entry 2886 (class 2606 OID 16692)
-- Name: fly fly_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fly
    ADD CONSTRAINT fly_pkey PRIMARY KEY (plane_idplane, trip_idtrip);


--
-- TOC entry 2880 (class 2606 OID 16672)
-- Name: member member_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.member
    ADD CONSTRAINT member_pkey PRIMARY KEY (idmember);


--
-- TOC entry 2876 (class 2606 OID 16657)
-- Name: plane plane_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plane
    ADD CONSTRAINT plane_pkey PRIMARY KEY (idplane);


--
-- TOC entry 2884 (class 2606 OID 16687)
-- Name: transit_landings transit_landings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transit_landings
    ADD CONSTRAINT transit_landings_pkey PRIMARY KEY (idtransit_landings);


--
-- TOC entry 2878 (class 2606 OID 16667)
-- Name: trip trip_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trip
    ADD CONSTRAINT trip_pkey PRIMARY KEY (idtrip);


--
-- TOC entry 2888 (class 2606 OID 16678)
-- Name: crew fk_crew_member1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.crew
    ADD CONSTRAINT fk_crew_member1 FOREIGN KEY (member_idmember) REFERENCES public.member(idmember);


--
-- TOC entry 2892 (class 2606 OID 16708)
-- Name: fly fk_fly_crew1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fly
    ADD CONSTRAINT fk_fly_crew1 FOREIGN KEY (crew_idcrew) REFERENCES public.crew(idcrew);


--
-- TOC entry 2891 (class 2606 OID 16703)
-- Name: fly fk_fly_transit_landings1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fly
    ADD CONSTRAINT fk_fly_transit_landings1 FOREIGN KEY (transit_landings_idtransit_landings) REFERENCES public.transit_landings(idtransit_landings);


--
-- TOC entry 2887 (class 2606 OID 16658)
-- Name: plane fk_plane_aircarrier1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plane
    ADD CONSTRAINT fk_plane_aircarrier1 FOREIGN KEY (aircarrier_idaircarrier) REFERENCES public.aircarrier(idaircarrier);


--
-- TOC entry 2889 (class 2606 OID 16693)
-- Name: fly fk_plane_has_trip_plane1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fly
    ADD CONSTRAINT fk_plane_has_trip_plane1 FOREIGN KEY (plane_idplane) REFERENCES public.plane(idplane);


--
-- TOC entry 2890 (class 2606 OID 16698)
-- Name: fly fk_plane_has_trip_trip1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fly
    ADD CONSTRAINT fk_plane_has_trip_trip1 FOREIGN KEY (trip_idtrip) REFERENCES public.trip(idtrip);


-- Completed on 2021-03-14 12:30:56

--
-- PostgreSQL database dump complete
--

