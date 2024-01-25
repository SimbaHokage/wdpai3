PGDMP  /    5                 |            postgres    16.1 (Debian 16.1-1.pgdg120+1)    16.1     1           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            2           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            3           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            4           1262    5    postgres    DATABASE     s   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';
    DROP DATABASE postgres;
                docker    false            5           0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                   docker    false    3380            �            1255    16438    sprawdz_i_usun_ip()    FUNCTION       CREATE FUNCTION public.sprawdz_i_usun_ip() RETURNS trigger
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
 *   DROP FUNCTION public.sprawdz_i_usun_ip();
       public          docker    false            �            1259    16390    training_details    TABLE     �   CREATE TABLE public.training_details (
    id_training_details integer NOT NULL,
    sets integer NOT NULL,
    reps integer NOT NULL,
    rpe double precision,
    exercise_name character varying NOT NULL,
    id_training integer NOT NULL
);
 $   DROP TABLE public.training_details;
       public         heap    docker    false            �            1259    16389 (   training_details_id_training_details_seq    SEQUENCE     �   CREATE SEQUENCE public.training_details_id_training_details_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.training_details_id_training_details_seq;
       public          docker    false    216            6           0    0 (   training_details_id_training_details_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.training_details_id_training_details_seq OWNED BY public.training_details.id_training_details;
          public          docker    false    215            �            1259    16399 	   trainings    TABLE     z   CREATE TABLE public.trainings (
    id_training integer NOT NULL,
    id_user integer NOT NULL,
    date date NOT NULL
);
    DROP TABLE public.trainings;
       public         heap    docker    false            �            1259    16398    trainings_id_training_seq    SEQUENCE     �   CREATE SEQUENCE public.trainings_id_training_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.trainings_id_training_seq;
       public          docker    false    218            7           0    0    trainings_id_training_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.trainings_id_training_seq OWNED BY public.trainings.id_training;
          public          docker    false    217            �            1259    16406    users    TABLE     �   CREATE TABLE public.users (
    id_user integer NOT NULL,
    username character varying NOT NULL,
    password character varying NOT NULL,
    email character varying NOT NULL
);
    DROP TABLE public.users;
       public         heap    docker    false            �            1259    16405    users_id_user_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.users_id_user_seq;
       public          docker    false    220            8           0    0    users_id_user_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.users_id_user_seq OWNED BY public.users.id_user;
          public          docker    false    219            �           2604    16393 $   training_details id_training_details    DEFAULT     �   ALTER TABLE ONLY public.training_details ALTER COLUMN id_training_details SET DEFAULT nextval('public.training_details_id_training_details_seq'::regclass);
 S   ALTER TABLE public.training_details ALTER COLUMN id_training_details DROP DEFAULT;
       public          docker    false    215    216    216            �           2604    16402    trainings id_training    DEFAULT     ~   ALTER TABLE ONLY public.trainings ALTER COLUMN id_training SET DEFAULT nextval('public.trainings_id_training_seq'::regclass);
 D   ALTER TABLE public.trainings ALTER COLUMN id_training DROP DEFAULT;
       public          docker    false    217    218    218            �           2604    16409    users id_user    DEFAULT     n   ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_user_seq'::regclass);
 <   ALTER TABLE public.users ALTER COLUMN id_user DROP DEFAULT;
       public          docker    false    220    219    220            *          0    16390    training_details 
   TABLE DATA           l   COPY public.training_details (id_training_details, sets, reps, rpe, exercise_name, id_training) FROM stdin;
    public          docker    false    216   �#       ,          0    16399 	   trainings 
   TABLE DATA           ?   COPY public.trainings (id_training, id_user, date) FROM stdin;
    public          docker    false    218   �#       .          0    16406    users 
   TABLE DATA           C   COPY public.users (id_user, username, password, email) FROM stdin;
    public          docker    false    220   '$       9           0    0 (   training_details_id_training_details_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('public.training_details_id_training_details_seq', 75, true);
          public          docker    false    215            :           0    0    trainings_id_training_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.trainings_id_training_seq', 80, true);
          public          docker    false    217            ;           0    0    users_id_user_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.users_id_user_seq', 2, true);
          public          docker    false    219            �           2606    16397 $   training_details training_details_pk 
   CONSTRAINT     s   ALTER TABLE ONLY public.training_details
    ADD CONSTRAINT training_details_pk PRIMARY KEY (id_training_details);
 N   ALTER TABLE ONLY public.training_details DROP CONSTRAINT training_details_pk;
       public            docker    false    216            �           2606    16404    trainings trainings_pk 
   CONSTRAINT     ]   ALTER TABLE ONLY public.trainings
    ADD CONSTRAINT trainings_pk PRIMARY KEY (id_training);
 @   ALTER TABLE ONLY public.trainings DROP CONSTRAINT trainings_pk;
       public            docker    false    218            �           2606    16413    users users_pk 
   CONSTRAINT     Q   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id_user);
 8   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pk;
       public            docker    false    220            �           2620    16439 '   training_details sprawdz_i_usun_trigger    TRIGGER     �   CREATE TRIGGER sprawdz_i_usun_trigger AFTER INSERT ON public.training_details FOR EACH ROW EXECUTE FUNCTION public.sprawdz_i_usun_ip();
 @   DROP TRIGGER sprawdz_i_usun_trigger ON public.training_details;
       public          docker    false    221    216            �           2606    16419 :   training_details training_details_trainings_id_training_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.training_details
    ADD CONSTRAINT training_details_trainings_id_training_fk FOREIGN KEY (id_training) REFERENCES public.trainings(id_training) ON UPDATE CASCADE ON DELETE CASCADE;
 d   ALTER TABLE ONLY public.training_details DROP CONSTRAINT training_details_trainings_id_training_fk;
       public          docker    false    3220    218    216            �           2606    16414 $   trainings trainings_users_id_user_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.trainings
    ADD CONSTRAINT trainings_users_id_user_fk FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;
 N   ALTER TABLE ONLY public.trainings DROP CONSTRAINT trainings_users_id_user_fk;
       public          docker    false    220    218    3222            *   9   x�37�4�44��tJ�K�P((J-.�4��27	�eR8�-��M�|d�\1z\\\ /�W      ,   '   x�3��4�4202�50�54�2�D�[ �̸b���� ��      .   �   x�M�M
�@ ��x�c3�O�0AM�4�6�S:��i��ֽ� ��${֖��ZBu�һJ&jn4[�s���C^E��EM��:Y�o>�ux�K��\��@�^ώ�J`����"�]_�sw��^6?��5�ǚneo�xV����H�{�-�z����K�f���`��K�XQ�7�?�     