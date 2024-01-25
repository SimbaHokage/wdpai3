--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1 (Debian 16.1-1.pgdg120+1)
-- Dumped by pg_dump version 16.1

-- Started on 2024-01-25 20:11:47 UTC

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
-- TOC entry 4 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: pg_database_owner
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO pg_database_owner;

--
-- TOC entry 3374 (class 0 OID 0)
-- Dependencies: 4
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: pg_database_owner
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 221 (class 1255 OID 16438)
-- Name: sprawdz_i_usun_ip(); Type: FUNCTION; Schema: public; Owner: docker
--

CREATE FUNCTION public.sprawdz_i_usun_ip() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
    BEGIN
DELETE
FROM trainings
WHERE NOT EXISTS (
    SELECT 1
    FROM training_details
    WHERE trainings.id_training = training_details.id_training
);
RETURN NEW;
    END;
$$;


ALTER FUNCTION public.sprawdz_i_usun_ip() OWNER TO docker;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 216 (class 1259 OID 16390)
-- Name: training_details; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.training_details (
    id_training_details integer NOT NULL,
    sets integer NOT NULL,
    reps integer NOT NULL,
    rpe double precision,
    exercise_name character varying NOT NULL,
    id_training integer NOT NULL
);


ALTER TABLE public.training_details OWNER TO docker;

--
-- TOC entry 215 (class 1259 OID 16389)
-- Name: training_details_id_training_details_seq; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.training_details_id_training_details_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.training_details_id_training_details_seq OWNER TO docker;

--
-- TOC entry 3375 (class 0 OID 0)
-- Dependencies: 215
-- Name: training_details_id_training_details_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: docker
--

ALTER SEQUENCE public.training_details_id_training_details_seq OWNED BY public.training_details.id_training_details;


--
-- TOC entry 218 (class 1259 OID 16399)
-- Name: trainings; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.trainings (
    id_training integer NOT NULL,
    id_user integer NOT NULL,
    date date NOT NULL
);


ALTER TABLE public.trainings OWNER TO docker;

--
-- TOC entry 217 (class 1259 OID 16398)
-- Name: trainings_id_training_seq; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.trainings_id_training_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.trainings_id_training_seq OWNER TO docker;

--
-- TOC entry 3376 (class 0 OID 0)
-- Dependencies: 217
-- Name: trainings_id_training_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: docker
--

ALTER SEQUENCE public.trainings_id_training_seq OWNED BY public.trainings.id_training;


--
-- TOC entry 220 (class 1259 OID 16406)
-- Name: users; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    username character varying NOT NULL,
    password character varying NOT NULL,
    email character varying NOT NULL
);


ALTER TABLE public.users OWNER TO docker;

--
-- TOC entry 219 (class 1259 OID 16405)
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.users_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_user_seq OWNER TO docker;

--
-- TOC entry 3377 (class 0 OID 0)
-- Dependencies: 219
-- Name: users_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: docker
--

ALTER SEQUENCE public.users_id_user_seq OWNED BY public.users.id_user;


--
-- TOC entry 3214 (class 2604 OID 16393)
-- Name: training_details id_training_details; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.training_details ALTER COLUMN id_training_details SET DEFAULT nextval('public.training_details_id_training_details_seq'::regclass);


--
-- TOC entry 3215 (class 2604 OID 16402)
-- Name: trainings id_training; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.trainings ALTER COLUMN id_training SET DEFAULT nextval('public.trainings_id_training_seq'::regclass);


--
-- TOC entry 3216 (class 2604 OID 16409)
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_user_seq'::regclass);


--
-- TOC entry 3218 (class 2606 OID 16397)
-- Name: training_details training_details_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.training_details
    ADD CONSTRAINT training_details_pk PRIMARY KEY (id_training_details);


--
-- TOC entry 3220 (class 2606 OID 16404)
-- Name: trainings trainings_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.trainings
    ADD CONSTRAINT trainings_pk PRIMARY KEY (id_training);


--
-- TOC entry 3222 (class 2606 OID 16413)
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id_user);


--
-- TOC entry 3225 (class 2620 OID 16439)
-- Name: training_details sprawdz_i_usun_trigger; Type: TRIGGER; Schema: public; Owner: docker
--

CREATE TRIGGER sprawdz_i_usun_trigger AFTER INSERT ON public.training_details FOR EACH ROW EXECUTE FUNCTION public.sprawdz_i_usun_ip();


--
-- TOC entry 3223 (class 2606 OID 16419)
-- Name: training_details training_details_trainings_id_training_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.training_details
    ADD CONSTRAINT training_details_trainings_id_training_fk FOREIGN KEY (id_training) REFERENCES public.trainings(id_training) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3224 (class 2606 OID 16414)
-- Name: trainings trainings_users_id_user_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.trainings
    ADD CONSTRAINT trainings_users_id_user_fk FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2024-01-25 20:11:47 UTC

--
-- PostgreSQL database dump complete
--

