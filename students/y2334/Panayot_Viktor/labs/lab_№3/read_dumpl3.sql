--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

-- Started on 2021-03-14 01:16:10

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
-- TOC entry 202 (class 1259 OID 16405)
-- Name: batch; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.batch (
    idbatch integer NOT NULL,
    name_batch character(10),
    amount_of_product text,
    price_batch integer
);


ALTER TABLE public.batch OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16441)
-- Name: batch_content; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.batch_content (
    idbatch integer,
    idproduct integer,
    date_of_receipt date
);


ALTER TABLE public.batch_content OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16413)
-- Name: broker; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.broker (
    name_broker character(30),
    succsess_percent integer,
    idbroker integer NOT NULL,
    work_experience integer
);


ALTER TABLE public.broker OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16469)
-- Name: contract_bcb; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contract_bcb (
    idbroker integer,
    idcustomer integer,
    idbatch integer,
    date_of_conclusion date
);


ALTER TABLE public.contract_bcb OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16454)
-- Name: contract_bo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contract_bo (
    idcontract_bo integer NOT NULL,
    idoffice integer,
    idbroker integer,
    office_percent integer,
    salary integer,
    date_of_duration date
);


ALTER TABLE public.contract_bo OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16428)
-- Name: contract_fp; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contract_fp (
    idproduct integer,
    iffirm integer,
    date_of_contract date
);


ALTER TABLE public.contract_fp OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16423)
-- Name: customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customer (
    idcustomer integer NOT NULL,
    name_customer character(30)
);


ALTER TABLE public.customer OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16395)
-- Name: firm; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.firm (
    idfirm integer NOT NULL,
    name_firm character(25),
    specialization_firm character(25)
);


ALTER TABLE public.firm OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16418)
-- Name: office; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.office (
    idoffice integer NOT NULL,
    name_office character(25)
);


ALTER TABLE public.office OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16400)
-- Name: product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product (
    ifproduct integer NOT NULL,
    name_product character(25),
    shelf_life date,
    unit character(10),
    price integer,
    date_of_production date,
    date_of_shipment date
);


ALTER TABLE public.product OWNER TO postgres;

--
-- TOC entry 3040 (class 0 OID 16405)
-- Dependencies: 202
-- Data for Name: batch; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.batch (idbatch, name_batch, amount_of_product, price_batch) FROM stdin;
1	100100221 	Acer Aspire: 1, Shipe_1: 1	42000
2	100100222 	AK-47: 1	10000
3	100100223 	NIN chokos: 1	1000
\.


--
-- TOC entry 3045 (class 0 OID 16441)
-- Dependencies: 207
-- Data for Name: batch_content; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.batch_content (idbatch, idproduct, date_of_receipt) FROM stdin;
1	1	2021-03-15
1	4	2021-03-15
2	2	2000-03-15
3	3	2021-03-15
\.


--
-- TOC entry 3041 (class 0 OID 16413)
-- Dependencies: 203
-- Data for Name: broker; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.broker (name_broker, succsess_percent, idbroker, work_experience) FROM stdin;
Jordan Belfort                	80	1	20
Don Juan                      	100	2	5
Uncle Pihto                   	40	3	60
\.


--
-- TOC entry 3047 (class 0 OID 16469)
-- Dependencies: 209
-- Data for Name: contract_bcb; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contract_bcb (idbroker, idcustomer, idbatch, date_of_conclusion) FROM stdin;
1	1	1	2021-02-10
2	2	2	2021-03-20
3	3	3	2021-10-10
\.


--
-- TOC entry 3046 (class 0 OID 16454)
-- Dependencies: 208
-- Data for Name: contract_bo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contract_bo (idcontract_bo, idoffice, idbroker, office_percent, salary, date_of_duration) FROM stdin;
1	1	1	40	10000	2025-10-10
2	2	2	1	10000000	2035-10-10
3	3	3	50	20000	2022-10-10
\.


--
-- TOC entry 3044 (class 0 OID 16428)
-- Dependencies: 206
-- Data for Name: contract_fp; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contract_fp (idproduct, iffirm, date_of_contract) FROM stdin;
1	1	2021-01-01
2	2	2000-01-01
3	3	2021-01-01
4	4	2020-01-01
\.


--
-- TOC entry 3043 (class 0 OID 16423)
-- Dependencies: 205
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customer (idcustomer, name_customer) FROM stdin;
1	Panayot Viktor                
2	IGIL(banned in Russia)        
3	Nothing Nothing Nothing       
\.


--
-- TOC entry 3038 (class 0 OID 16395)
-- Dependencies: 200
-- Data for Name: firm; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.firm (idfirm, name_firm, specialization_firm) FROM stdin;
1	Acer                     	Notebooks                
2	Red Flag                 	weapons                  
3	NIN                      	food                     
4	Shipe                    	Micro                    
\.


--
-- TOC entry 3042 (class 0 OID 16418)
-- Dependencies: 204
-- Data for Name: office; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.office (idoffice, name_office) FROM stdin;
1	off1ce                   
2	brothers Brazzers        
3	Nothings office          
\.


--
-- TOC entry 3039 (class 0 OID 16400)
-- Dependencies: 201
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product (ifproduct, name_product, shelf_life, unit, price, date_of_production, date_of_shipment) FROM stdin;
1	Acer Aspire 515-50       	2030-03-14	th.       	40000	2021-01-10	2021-02-10
2	AK-47                    	9999-12-31	th.       	10000	2000-01-10	2020-02-10
3	NIN chokos               	2021-06-29	kg        	1000	2021-01-10	2021-02-15
4	Shipe-1                  	2030-07-14	th.       	2000	2021-01-21	2021-03-01
\.


--
-- TOC entry 2890 (class 2606 OID 16412)
-- Name: batch batch_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.batch
    ADD CONSTRAINT batch_pkey PRIMARY KEY (idbatch);


--
-- TOC entry 2892 (class 2606 OID 16417)
-- Name: broker broker_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.broker
    ADD CONSTRAINT broker_pkey PRIMARY KEY (idbroker);


--
-- TOC entry 2898 (class 2606 OID 16458)
-- Name: contract_bo contract_bo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_bo
    ADD CONSTRAINT contract_bo_pkey PRIMARY KEY (idcontract_bo);


--
-- TOC entry 2896 (class 2606 OID 16427)
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (idcustomer);


--
-- TOC entry 2886 (class 2606 OID 16399)
-- Name: firm firm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.firm
    ADD CONSTRAINT firm_pkey PRIMARY KEY (idfirm);


--
-- TOC entry 2894 (class 2606 OID 16422)
-- Name: office office_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.office
    ADD CONSTRAINT office_pkey PRIMARY KEY (idoffice);


--
-- TOC entry 2888 (class 2606 OID 16404)
-- Name: product product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (ifproduct);


--
-- TOC entry 2901 (class 2606 OID 16444)
-- Name: batch_content batch_content_idbatch_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.batch_content
    ADD CONSTRAINT batch_content_idbatch_fkey FOREIGN KEY (idbatch) REFERENCES public.batch(idbatch) ON DELETE CASCADE;


--
-- TOC entry 2902 (class 2606 OID 16449)
-- Name: batch_content batch_content_idproduct_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.batch_content
    ADD CONSTRAINT batch_content_idproduct_fkey FOREIGN KEY (idproduct) REFERENCES public.product(ifproduct) ON DELETE CASCADE;


--
-- TOC entry 2907 (class 2606 OID 16482)
-- Name: contract_bcb contract_bcb_idbatch_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_bcb
    ADD CONSTRAINT contract_bcb_idbatch_fkey FOREIGN KEY (idbatch) REFERENCES public.batch(idbatch) ON DELETE CASCADE;


--
-- TOC entry 2905 (class 2606 OID 16472)
-- Name: contract_bcb contract_bcb_idbroker_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_bcb
    ADD CONSTRAINT contract_bcb_idbroker_fkey FOREIGN KEY (idbroker) REFERENCES public.broker(idbroker) ON DELETE CASCADE;


--
-- TOC entry 2906 (class 2606 OID 16477)
-- Name: contract_bcb contract_bcb_idcustomer_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_bcb
    ADD CONSTRAINT contract_bcb_idcustomer_fkey FOREIGN KEY (idcustomer) REFERENCES public.customer(idcustomer) ON DELETE CASCADE;


--
-- TOC entry 2904 (class 2606 OID 16464)
-- Name: contract_bo contract_bo_idbroker_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_bo
    ADD CONSTRAINT contract_bo_idbroker_fkey FOREIGN KEY (idbroker) REFERENCES public.broker(idbroker) ON DELETE CASCADE;


--
-- TOC entry 2903 (class 2606 OID 16459)
-- Name: contract_bo contract_bo_idoffice_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_bo
    ADD CONSTRAINT contract_bo_idoffice_fkey FOREIGN KEY (idoffice) REFERENCES public.office(idoffice) ON DELETE CASCADE;


--
-- TOC entry 2899 (class 2606 OID 16431)
-- Name: contract_fp contract_fp_idproduct_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_fp
    ADD CONSTRAINT contract_fp_idproduct_fkey FOREIGN KEY (idproduct) REFERENCES public.product(ifproduct) ON DELETE CASCADE;


--
-- TOC entry 2900 (class 2606 OID 16436)
-- Name: contract_fp contract_fp_iffirm_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contract_fp
    ADD CONSTRAINT contract_fp_iffirm_fkey FOREIGN KEY (iffirm) REFERENCES public.firm(idfirm) ON DELETE CASCADE;


-- Completed on 2021-03-14 01:16:10

--
-- PostgreSQL database dump complete
--

