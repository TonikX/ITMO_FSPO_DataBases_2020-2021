--
-- PostgreSQL database dump
--

-- Dumped from database version 10.15
-- Dumped by pg_dump version 10.15

-- Started on 2021-02-10 15:32:28

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
-- TOC entry 2881 (class 1262 OID 16393)
-- Name: test; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE test WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';


ALTER DATABASE test OWNER TO postgres;

\connect test

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
-- TOC entry 2882 (class 0 OID 0)
-- Dependencies: 2881
-- Name: DATABASE test; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE test IS 'comment';


--
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2884 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 197 (class 1259 OID 16411)
-- Name: clients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clients (
    fio text NOT NULL,
    address text NOT NULL,
    contacts json NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.clients OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16430)
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clients_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.clients_id_seq OWNER TO postgres;

--
-- TOC entry 2885 (class 0 OID 0)
-- Dependencies: 199
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clients_id_seq OWNED BY public.clients.id;


--
-- TOC entry 196 (class 1259 OID 16403)
-- Name: manufacturers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.manufacturers (
    name text NOT NULL,
    contacts json NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.manufacturers OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16441)
-- Name: manufacturers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.manufacturers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.manufacturers_id_seq OWNER TO postgres;

--
-- TOC entry 2886 (class 0 OID 0)
-- Dependencies: 200
-- Name: manufacturers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.manufacturers_id_seq OWNED BY public.manufacturers.id;


--
-- TOC entry 202 (class 1259 OID 16454)
-- Name: mateials; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mateials (
    id integer NOT NULL,
    name text NOT NULL,
    type text NOT NULL
);


ALTER TABLE public.mateials OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16452)
-- Name: mateials_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.mateials_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mateials_id_seq OWNER TO postgres;

--
-- TOC entry 2887 (class 0 OID 0)
-- Dependencies: 201
-- Name: mateials_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.mateials_id_seq OWNED BY public.mateials.id;


--
-- TOC entry 205 (class 1259 OID 16482)
-- Name: materials_compilations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materials_compilations (
    id integer NOT NULL,
    material_id bigint NOT NULL,
    order_id bigint NOT NULL,
    amount bigint NOT NULL,
    price bigint NOT NULL
);


ALTER TABLE public.materials_compilations OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16480)
-- Name: materials_compilations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.materials_compilations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materials_compilations_id_seq OWNER TO postgres;

--
-- TOC entry 2888 (class 0 OID 0)
-- Dependencies: 204
-- Name: materials_compilations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.materials_compilations_id_seq OWNED BY public.materials_compilations.id;


--
-- TOC entry 198 (class 1259 OID 16421)
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    client_id bigint NOT NULL,
    created_at date NOT NULL,
    delivered_at date NOT NULL,
    comments text,
    status smallint NOT NULL,
    id integer NOT NULL,
    price bigint NOT NULL
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16463)
-- Name: order_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_id_seq OWNER TO postgres;

--
-- TOC entry 2889 (class 0 OID 0)
-- Dependencies: 203
-- Name: order_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_id_seq OWNED BY public.orders.id;


--
-- TOC entry 206 (class 1259 OID 16498)
-- Name: shuby_deliveries; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.shuby_deliveries (
    order_id bigint NOT NULL,
    date date NOT NULL,
    address text NOT NULL,
    price bigint NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.shuby_deliveries OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16543)
-- Name: shuby_deliveries_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.shuby_deliveries_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shuby_deliveries_id_seq OWNER TO postgres;

--
-- TOC entry 2890 (class 0 OID 0)
-- Dependencies: 208
-- Name: shuby_deliveries_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.shuby_deliveries_id_seq OWNED BY public.shuby_deliveries.id;


--
-- TOC entry 207 (class 1259 OID 16511)
-- Name: shuby_productions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.shuby_productions (
    order_id bigint NOT NULL,
    material_id bigint NOT NULL,
    manufactury_id bigint NOT NULL,
    conditions text NOT NULL
);


ALTER TABLE public.shuby_productions OWNER TO postgres;

--
-- TOC entry 2711 (class 2604 OID 16432)
-- Name: clients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients ALTER COLUMN id SET DEFAULT nextval('public.clients_id_seq'::regclass);


--
-- TOC entry 2710 (class 2604 OID 16443)
-- Name: manufacturers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.manufacturers ALTER COLUMN id SET DEFAULT nextval('public.manufacturers_id_seq'::regclass);


--
-- TOC entry 2715 (class 2604 OID 16457)
-- Name: mateials id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mateials ALTER COLUMN id SET DEFAULT nextval('public.mateials_id_seq'::regclass);


--
-- TOC entry 2716 (class 2604 OID 16485)
-- Name: materials_compilations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materials_compilations ALTER COLUMN id SET DEFAULT nextval('public.materials_compilations_id_seq'::regclass);


--
-- TOC entry 2712 (class 2604 OID 16465)
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.order_id_seq'::regclass);


--
-- TOC entry 2719 (class 2604 OID 16545)
-- Name: shuby_deliveries id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shuby_deliveries ALTER COLUMN id SET DEFAULT nextval('public.shuby_deliveries_id_seq'::regclass);


--
-- TOC entry 2864 (class 0 OID 16411)
-- Dependencies: 197
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.clients VALUES ('FIO1', 'address1', '{"email": "123@gmail.com"}', 1);
INSERT INTO public.clients VALUES ('FIO2', 'address2', '{"email": "124@gmail.com"}', 2);
INSERT INTO public.clients VALUES ('FIO3', 'address3', '{"email": "125@gmail.com"}', 3);
INSERT INTO public.clients VALUES ('FIO4', 'address4', '{"email": "126@gmail.com"}', 4);
INSERT INTO public.clients VALUES ('FIO5', 'address5', '{"email": "127@gmail.com"}', 5);
INSERT INTO public.clients VALUES ('FIO6', 'address6', '{"email": "128@gmail.com"}', 6);


--
-- TOC entry 2863 (class 0 OID 16403)
-- Dependencies: 196
-- Data for Name: manufacturers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.manufacturers VALUES ('name1', '{"email": "123@gmail.com"}', 1);
INSERT INTO public.manufacturers VALUES ('name2', '{"email": "223@gmail.com"}', 2);
INSERT INTO public.manufacturers VALUES ('name3', '{"email": "423@gmail.com"}', 3);
INSERT INTO public.manufacturers VALUES ('name4', '{"email": "523@gmail.com"}', 4);
INSERT INTO public.manufacturers VALUES ('name5', '{"email": "623@gmail.com"}', 5);


--
-- TOC entry 2869 (class 0 OID 16454)
-- Dependencies: 202
-- Data for Name: mateials; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.mateials VALUES (1, 'name1', 'fur');
INSERT INTO public.mateials VALUES (2, 'name2', 'siver');
INSERT INTO public.mateials VALUES (3, 'name3', 'gold');


--
-- TOC entry 2872 (class 0 OID 16482)
-- Dependencies: 205
-- Data for Name: materials_compilations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.materials_compilations VALUES (1, 1, 1, 10, 100);
INSERT INTO public.materials_compilations VALUES (8, 2, 1, 15, 160);
INSERT INTO public.materials_compilations VALUES (9, 3, 2, 31, 200);
INSERT INTO public.materials_compilations VALUES (10, 2, 4, 54, 600);
INSERT INTO public.materials_compilations VALUES (11, 1, 3, 45, 400);
INSERT INTO public.materials_compilations VALUES (12, 3, 5, 6, 150);
INSERT INTO public.materials_compilations VALUES (13, 1, 4, 90, 70);


--
-- TOC entry 2865 (class 0 OID 16421)
-- Dependencies: 198
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.orders VALUES (1, '2020-01-02', '2020-01-05', 'cooments la la la', 1, 1, 4000);
INSERT INTO public.orders VALUES (3, '2020-07-02', '2020-07-05', 'cooments la la la', 1, 2, 4000);
INSERT INTO public.orders VALUES (2, '2020-02-02', '2020-02-05', 'cooments la la la', 1, 3, 3000);
INSERT INTO public.orders VALUES (4, '2020-03-02', '2020-03-05', 'cooments la la la', 1, 4, 7000);
INSERT INTO public.orders VALUES (1, '2020-04-02', '2020-04-05', 'cooments la la la', 1, 5, 1000);
INSERT INTO public.orders VALUES (2, '2020-05-02', '2020-05-05', 'cooments la la la', 1, 6, 9000);


--
-- TOC entry 2873 (class 0 OID 16498)
-- Dependencies: 206
-- Data for Name: shuby_deliveries; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.shuby_deliveries VALUES (1, '2020-03-05', 'address1', 4000, 1);
INSERT INTO public.shuby_deliveries VALUES (2, '2020-04-05', 'address2', 3000, 2);
INSERT INTO public.shuby_deliveries VALUES (1, '2020-05-05', 'address3', 1000, 3);
INSERT INTO public.shuby_deliveries VALUES (3, '2020-06-05', 'address4', 6000, 4);
INSERT INTO public.shuby_deliveries VALUES (5, '2020-07-05', 'address5', 7000, 5);


--
-- TOC entry 2874 (class 0 OID 16511)
-- Dependencies: 207
-- Data for Name: shuby_productions; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.shuby_productions VALUES (1, 1, 1, 'la la la la la');
INSERT INTO public.shuby_productions VALUES (1, 8, 4, 'la la la la la');
INSERT INTO public.shuby_productions VALUES (2, 9, 3, 'la la la la la');
INSERT INTO public.shuby_productions VALUES (3, 10, 2, 'la la la la la');
INSERT INTO public.shuby_productions VALUES (2, 11, 1, 'la la la la la');


--
-- TOC entry 2891 (class 0 OID 0)
-- Dependencies: 199
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clients_id_seq', 6, true);


--
-- TOC entry 2892 (class 0 OID 0)
-- Dependencies: 200
-- Name: manufacturers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.manufacturers_id_seq', 5, true);


--
-- TOC entry 2893 (class 0 OID 0)
-- Dependencies: 201
-- Name: mateials_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.mateials_id_seq', 3, true);


--
-- TOC entry 2894 (class 0 OID 0)
-- Dependencies: 204
-- Name: materials_compilations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.materials_compilations_id_seq', 13, true);


--
-- TOC entry 2895 (class 0 OID 0)
-- Dependencies: 203
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_id_seq', 1, false);


--
-- TOC entry 2896 (class 0 OID 0)
-- Dependencies: 208
-- Name: shuby_deliveries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.shuby_deliveries_id_seq', 5, true);


--
-- TOC entry 2717 (class 2606 OID 16537)
-- Name: materials_compilations amount; Type: CHECK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE public.materials_compilations
    ADD CONSTRAINT amount CHECK ((amount > 0)) NOT VALID;


--
-- TOC entry 2724 (class 2606 OID 16440)
-- Name: clients clients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- TOC entry 2713 (class 2606 OID 16541)
-- Name: orders date; Type: CHECK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE public.orders
    ADD CONSTRAINT date CHECK ((delivered_at > created_at)) NOT VALID;


--
-- TOC entry 2722 (class 2606 OID 16451)
-- Name: manufacturers manufacturers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.manufacturers
    ADD CONSTRAINT manufacturers_pkey PRIMARY KEY (id);


--
-- TOC entry 2728 (class 2606 OID 16462)
-- Name: mateials mateials_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mateials
    ADD CONSTRAINT mateials_pkey PRIMARY KEY (id);


--
-- TOC entry 2730 (class 2606 OID 16487)
-- Name: materials_compilations materials_compilations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materials_compilations
    ADD CONSTRAINT materials_compilations_pkey PRIMARY KEY (id);


--
-- TOC entry 2726 (class 2606 OID 16473)
-- Name: orders order_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT order_pkey PRIMARY KEY (id);


--
-- TOC entry 2718 (class 2606 OID 16538)
-- Name: materials_compilations price; Type: CHECK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE public.materials_compilations
    ADD CONSTRAINT price CHECK ((price > 0)) NOT VALID;


--
-- TOC entry 2714 (class 2606 OID 16540)
-- Name: orders price; Type: CHECK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE public.orders
    ADD CONSTRAINT price CHECK ((price > 0)) NOT VALID;


--
-- TOC entry 2720 (class 2606 OID 16542)
-- Name: shuby_deliveries price; Type: CHECK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE public.shuby_deliveries
    ADD CONSTRAINT price CHECK ((price > 0)) NOT VALID;


--
-- TOC entry 2732 (class 2606 OID 16553)
-- Name: shuby_deliveries shuby_deliveries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shuby_deliveries
    ADD CONSTRAINT shuby_deliveries_pkey PRIMARY KEY (id);


--
-- TOC entry 2734 (class 2606 OID 16518)
-- Name: shuby_productions shuby_productions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shuby_productions
    ADD CONSTRAINT shuby_productions_pkey PRIMARY KEY (order_id, material_id);


--
-- TOC entry 2735 (class 2606 OID 16475)
-- Name: orders client; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT client FOREIGN KEY (client_id) REFERENCES public.clients(id) NOT VALID;


--
-- TOC entry 2741 (class 2606 OID 16529)
-- Name: shuby_productions manufactory; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shuby_productions
    ADD CONSTRAINT manufactory FOREIGN KEY (manufactury_id) REFERENCES public.manufacturers(id);


--
-- TOC entry 2736 (class 2606 OID 16488)
-- Name: materials_compilations material; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materials_compilations
    ADD CONSTRAINT material FOREIGN KEY (material_id) REFERENCES public.mateials(id);


--
-- TOC entry 2740 (class 2606 OID 16524)
-- Name: shuby_productions material; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shuby_productions
    ADD CONSTRAINT material FOREIGN KEY (material_id) REFERENCES public.materials_compilations(id);


--
-- TOC entry 2737 (class 2606 OID 16493)
-- Name: materials_compilations order; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materials_compilations
    ADD CONSTRAINT "order" FOREIGN KEY (order_id) REFERENCES public.orders(id);


--
-- TOC entry 2738 (class 2606 OID 16506)
-- Name: shuby_deliveries order; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shuby_deliveries
    ADD CONSTRAINT "order" FOREIGN KEY (order_id) REFERENCES public.orders(id);


--
-- TOC entry 2739 (class 2606 OID 16519)
-- Name: shuby_productions order; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.shuby_productions
    ADD CONSTRAINT "order" FOREIGN KEY (order_id) REFERENCES public.orders(id);


-- Completed on 2021-02-10 15:32:28

--
-- PostgreSQL database dump complete
--

