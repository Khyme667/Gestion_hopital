PGDMP      *                }            laravel_g_hospital    12.2    17.1 u    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            �           1262    2672456    laravel_g_hospital    DATABASE     �   CREATE DATABASE laravel_g_hospital WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';
 "   DROP DATABASE laravel_g_hospital;
                     postgres    false                        2615    2200    public    SCHEMA     2   -- *not* creating schema, since initdb creates it
 2   -- *not* dropping schema, since initdb creates it
                     postgres    false            �           0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                        postgres    false    6            �            1259    2672708    activity_logs    TABLE     D  CREATE TABLE public.activity_logs (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    action character varying(255) NOT NULL,
    model character varying(255) NOT NULL,
    model_id bigint NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public.activity_logs;
       public         heap r       odoo    false    6            �            1259    2672706    activity_logs_id_seq    SEQUENCE     }   CREATE SEQUENCE public.activity_logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.activity_logs_id_seq;
       public               odoo    false    228    6            �           0    0    activity_logs_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.activity_logs_id_seq OWNED BY public.activity_logs.id;
          public               odoo    false    227            �            1259    2672496    cache    TABLE     �   CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache;
       public         heap r       odoo    false    6            �            1259    2672504    cache_locks    TABLE     �   CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache_locks;
       public         heap r       odoo    false    6            �            1259    2672559    consultations    TABLE     a  CREATE TABLE public.consultations (
    id bigint NOT NULL,
    patient_id bigint NOT NULL,
    date date NOT NULL,
    raison character varying(255) NOT NULL,
    ordonnances text,
    prescriptions text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    employee_id bigint,
    rendez_vous_id bigint
);
 !   DROP TABLE public.consultations;
       public         heap r       odoo    false    6            �            1259    2672557    consultations_id_seq    SEQUENCE     }   CREATE SEQUENCE public.consultations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.consultations_id_seq;
       public               odoo    false    218    6            �           0    0    consultations_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.consultations_id_seq OWNED BY public.consultations.id;
          public               odoo    false    217            �            1259    2672575 	   employees    TABLE       CREATE TABLE public.employees (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    role character varying(255) NOT NULL,
    schedule json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT employees_role_check CHECK (((role)::text = ANY ((ARRAY['Médecin'::character varying, 'Infirmier'::character varying, 'Administrateur'::character varying])::text[])))
);
    DROP TABLE public.employees;
       public         heap r       odoo    false    6            �            1259    2672573    employees_id_seq    SEQUENCE     y   CREATE SEQUENCE public.employees_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.employees_id_seq;
       public               odoo    false    220    6            �           0    0    employees_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.employees_id_seq OWNED BY public.employees.id;
          public               odoo    false    219            �            1259    2672534    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap r       odoo    false    6            �            1259    2672532    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public               odoo    false    6    214            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public               odoo    false    213            �            1259    2672629    fournisseurs    TABLE       CREATE TABLE public.fournisseurs (
    id bigint NOT NULL,
    nom character varying(255) NOT NULL,
    contact character varying(255),
    adresse character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
     DROP TABLE public.fournisseurs;
       public         heap r       odoo    false    6            �            1259    2672627    fournisseurs_id_seq    SEQUENCE     |   CREATE SEQUENCE public.fournisseurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.fournisseurs_id_seq;
       public               odoo    false    6    224            �           0    0    fournisseurs_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.fournisseurs_id_seq OWNED BY public.fournisseurs.id;
          public               odoo    false    223            �            1259    2672524    job_batches    TABLE     d  CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);
    DROP TABLE public.job_batches;
       public         heap r       odoo    false    6            �            1259    2672514    jobs    TABLE     �   CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);
    DROP TABLE public.jobs;
       public         heap r       odoo    false    6            �            1259    2672512    jobs_id_seq    SEQUENCE     t   CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.jobs_id_seq;
       public               odoo    false    211    6            �           0    0    jobs_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;
          public               odoo    false    210            �            1259    2672459 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap r       odoo    false    6            �            1259    2672457    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public               odoo    false    6    203            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public               odoo    false    202            �            1259    2672478    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap r       odoo    false    6            �            1259    2672548    patients    TABLE     Q  CREATE TABLE public.patients (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    birth_date date NOT NULL,
    phone character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    medical_history text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.patients;
       public         heap r       odoo    false    6            �            1259    2672546    patients_id_seq    SEQUENCE     x   CREATE SEQUENCE public.patients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.patients_id_seq;
       public               odoo    false    216    6            �           0    0    patients_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.patients_id_seq OWNED BY public.patients.id;
          public               odoo    false    215            �            1259    2672724    rendez_vous    TABLE       CREATE TABLE public.rendez_vous (
    id bigint NOT NULL,
    patient_id bigint NOT NULL,
    date_rendez_vous date NOT NULL,
    raison character varying(255) NOT NULL,
    status character varying(255) DEFAULT 'en_attente'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT rendez_vous_status_check CHECK (((status)::text = ANY ((ARRAY['en_attente'::character varying, 'confirme'::character varying, 'annule'::character varying])::text[])))
);
    DROP TABLE public.rendez_vous;
       public         heap r       odoo    false    6            �            1259    2672722    rendez_vous_id_seq    SEQUENCE     {   CREATE SEQUENCE public.rendez_vous_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.rendez_vous_id_seq;
       public               odoo    false    6    230            �           0    0    rendez_vous_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.rendez_vous_id_seq OWNED BY public.rendez_vous.id;
          public               odoo    false    229            �            1259    2672590 	   schedules    TABLE     F  CREATE TABLE public.schedules (
    id bigint NOT NULL,
    employee_id bigint NOT NULL,
    day character varying(255) NOT NULL,
    start_time time(0) without time zone NOT NULL,
    end_time time(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.schedules;
       public         heap r       odoo    false    6            �            1259    2672588    schedules_id_seq    SEQUENCE     y   CREATE SEQUENCE public.schedules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.schedules_id_seq;
       public               odoo    false    6    222            �           0    0    schedules_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.schedules_id_seq OWNED BY public.schedules.id;
          public               odoo    false    221            �            1259    2672486    sessions    TABLE     �   CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);
    DROP TABLE public.sessions;
       public         heap r       odoo    false    6            �            1259    2672640    stocks    TABLE     W  CREATE TABLE public.stocks (
    id bigint NOT NULL,
    nom character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    quantite integer DEFAULT 0 NOT NULL,
    seuil_min integer DEFAULT 10 NOT NULL,
    fournisseur_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.stocks;
       public         heap r       odoo    false    6            �            1259    2672638    stocks_id_seq    SEQUENCE     v   CREATE SEQUENCE public.stocks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.stocks_id_seq;
       public               odoo    false    226    6            �           0    0    stocks_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.stocks_id_seq OWNED BY public.stocks.id;
          public               odoo    false    225            �            1259    2672467    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    role character varying(255) DEFAULT 'Utilisateur'::character varying NOT NULL
);
    DROP TABLE public.users;
       public         heap r       odoo    false    6            �            1259    2672465    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public               odoo    false    205    6            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public               odoo    false    204            �
           2604    2672711    activity_logs id    DEFAULT     t   ALTER TABLE ONLY public.activity_logs ALTER COLUMN id SET DEFAULT nextval('public.activity_logs_id_seq'::regclass);
 ?   ALTER TABLE public.activity_logs ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    228    227    228            �
           2604    2672562    consultations id    DEFAULT     t   ALTER TABLE ONLY public.consultations ALTER COLUMN id SET DEFAULT nextval('public.consultations_id_seq'::regclass);
 ?   ALTER TABLE public.consultations ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    218    217    218            �
           2604    2672578    employees id    DEFAULT     l   ALTER TABLE ONLY public.employees ALTER COLUMN id SET DEFAULT nextval('public.employees_id_seq'::regclass);
 ;   ALTER TABLE public.employees ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    220    219    220            �
           2604    2672537    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    214    213    214            �
           2604    2672632    fournisseurs id    DEFAULT     r   ALTER TABLE ONLY public.fournisseurs ALTER COLUMN id SET DEFAULT nextval('public.fournisseurs_id_seq'::regclass);
 >   ALTER TABLE public.fournisseurs ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    223    224    224            �
           2604    2672517    jobs id    DEFAULT     b   ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);
 6   ALTER TABLE public.jobs ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    210    211    211            �
           2604    2672462    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    203    202    203            �
           2604    2672551    patients id    DEFAULT     j   ALTER TABLE ONLY public.patients ALTER COLUMN id SET DEFAULT nextval('public.patients_id_seq'::regclass);
 :   ALTER TABLE public.patients ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    215    216    216            �
           2604    2672727    rendez_vous id    DEFAULT     p   ALTER TABLE ONLY public.rendez_vous ALTER COLUMN id SET DEFAULT nextval('public.rendez_vous_id_seq'::regclass);
 =   ALTER TABLE public.rendez_vous ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    230    229    230            �
           2604    2672593    schedules id    DEFAULT     l   ALTER TABLE ONLY public.schedules ALTER COLUMN id SET DEFAULT nextval('public.schedules_id_seq'::regclass);
 ;   ALTER TABLE public.schedules ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    222    221    222            �
           2604    2672643 	   stocks id    DEFAULT     f   ALTER TABLE ONLY public.stocks ALTER COLUMN id SET DEFAULT nextval('public.stocks_id_seq'::regclass);
 8   ALTER TABLE public.stocks ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    225    226    226            �
           2604    2672470    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public               odoo    false    205    204    205            �          0    2672708    activity_logs 
   TABLE DATA           r   COPY public.activity_logs (id, user_id, action, model, model_id, description, created_at, updated_at) FROM stdin;
    public               odoo    false    228   Ԏ       �          0    2672496    cache 
   TABLE DATA           7   COPY public.cache (key, value, expiration) FROM stdin;
    public               odoo    false    208   �       �          0    2672504    cache_locks 
   TABLE DATA           =   COPY public.cache_locks (key, owner, expiration) FROM stdin;
    public               odoo    false    209   Z�       �          0    2672559    consultations 
   TABLE DATA           �   COPY public.consultations (id, patient_id, date, raison, ordonnances, prescriptions, created_at, updated_at, employee_id, rendez_vous_id) FROM stdin;
    public               odoo    false    218   w�       �          0    2672575 	   employees 
   TABLE DATA           c   COPY public.employees (id, name, email, phone, role, schedule, created_at, updated_at) FROM stdin;
    public               odoo    false    220   D�       �          0    2672534    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public               odoo    false    214   ��       �          0    2672629    fournisseurs 
   TABLE DATA           Y   COPY public.fournisseurs (id, nom, contact, adresse, created_at, updated_at) FROM stdin;
    public               odoo    false    224   �       �          0    2672524    job_batches 
   TABLE DATA           �   COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
    public               odoo    false    212   [�       �          0    2672514    jobs 
   TABLE DATA           c   COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
    public               odoo    false    211   x�       �          0    2672459 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public               odoo    false    203   ��       �          0    2672478    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public               odoo    false    206   ��       �          0    2672548    patients 
   TABLE DATA           q   COPY public.patients (id, name, birth_date, phone, address, medical_history, created_at, updated_at) FROM stdin;
    public               odoo    false    216   9�       �          0    2672724    rendez_vous 
   TABLE DATA           o   COPY public.rendez_vous (id, patient_id, date_rendez_vous, raison, status, created_at, updated_at) FROM stdin;
    public               odoo    false    230   ��       �          0    2672590 	   schedules 
   TABLE DATA           g   COPY public.schedules (id, employee_id, day, start_time, end_time, created_at, updated_at) FROM stdin;
    public               odoo    false    222   U�       �          0    2672486    sessions 
   TABLE DATA           _   COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
    public               odoo    false    207   ��       �          0    2672640    stocks 
   TABLE DATA           l   COPY public.stocks (id, nom, type, quantite, seuil_min, fournisseur_id, created_at, updated_at) FROM stdin;
    public               odoo    false    226   ך       �          0    2672467    users 
   TABLE DATA           {   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, role) FROM stdin;
    public               odoo    false    205   -�       �           0    0    activity_logs_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.activity_logs_id_seq', 39, true);
          public               odoo    false    227            �           0    0    consultations_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.consultations_id_seq', 6, true);
          public               odoo    false    217            �           0    0    employees_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.employees_id_seq', 4, true);
          public               odoo    false    219            �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public               odoo    false    213            �           0    0    fournisseurs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.fournisseurs_id_seq', 2, true);
          public               odoo    false    223            �           0    0    jobs_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);
          public               odoo    false    210            �           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 15, true);
          public               odoo    false    202            �           0    0    patients_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.patients_id_seq', 6, true);
          public               odoo    false    215            �           0    0    rendez_vous_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.rendez_vous_id_seq', 4, true);
          public               odoo    false    229            �           0    0    schedules_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.schedules_id_seq', 3, true);
          public               odoo    false    221            �           0    0    stocks_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.stocks_id_seq', 3, true);
          public               odoo    false    225            �           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 3, true);
          public               odoo    false    204                       2606    2672716     activity_logs activity_logs_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.activity_logs
    ADD CONSTRAINT activity_logs_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.activity_logs DROP CONSTRAINT activity_logs_pkey;
       public                 odoo    false    228                       2606    2672511    cache_locks cache_locks_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);
 F   ALTER TABLE ONLY public.cache_locks DROP CONSTRAINT cache_locks_pkey;
       public                 odoo    false    209                       2606    2672503    cache cache_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);
 :   ALTER TABLE ONLY public.cache DROP CONSTRAINT cache_pkey;
       public                 odoo    false    208                       2606    2672567     consultations consultations_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.consultations
    ADD CONSTRAINT consultations_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.consultations DROP CONSTRAINT consultations_pkey;
       public                 odoo    false    218                       2606    2672586     employees employees_email_unique 
   CONSTRAINT     \   ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_email_unique UNIQUE (email);
 J   ALTER TABLE ONLY public.employees DROP CONSTRAINT employees_email_unique;
       public                 odoo    false    220                       2606    2672584    employees employees_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.employees DROP CONSTRAINT employees_pkey;
       public                 odoo    false    220                       2606    2672543    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public                 odoo    false    214                       2606    2672545 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public                 odoo    false    214                       2606    2672637    fournisseurs fournisseurs_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.fournisseurs
    ADD CONSTRAINT fournisseurs_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.fournisseurs DROP CONSTRAINT fournisseurs_pkey;
       public                 odoo    false    224                       2606    2672531    job_batches job_batches_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.job_batches DROP CONSTRAINT job_batches_pkey;
       public                 odoo    false    212                       2606    2672522    jobs jobs_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_pkey;
       public                 odoo    false    211            �
           2606    2672464    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public                 odoo    false    203            �
           2606    2672485 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public                 odoo    false    206                       2606    2672556    patients patients_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.patients
    ADD CONSTRAINT patients_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.patients DROP CONSTRAINT patients_pkey;
       public                 odoo    false    216            !           2606    2672734    rendez_vous rendez_vous_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.rendez_vous
    ADD CONSTRAINT rendez_vous_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.rendez_vous DROP CONSTRAINT rendez_vous_pkey;
       public                 odoo    false    230                       2606    2672595    schedules schedules_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.schedules DROP CONSTRAINT schedules_pkey;
       public                 odoo    false    222                       2606    2672493    sessions sessions_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.sessions DROP CONSTRAINT sessions_pkey;
       public                 odoo    false    207                       2606    2672650    stocks stocks_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.stocks
    ADD CONSTRAINT stocks_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.stocks DROP CONSTRAINT stocks_pkey;
       public                 odoo    false    226            �
           2606    2672477    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public                 odoo    false    205            �
           2606    2672475    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public                 odoo    false    205            	           1259    2672523    jobs_queue_index    INDEX     B   CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);
 $   DROP INDEX public.jobs_queue_index;
       public                 odoo    false    211            �
           1259    2672495    sessions_last_activity_index    INDEX     Z   CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);
 0   DROP INDEX public.sessions_last_activity_index;
       public                 odoo    false    207                       1259    2672494    sessions_user_id_index    INDEX     N   CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);
 *   DROP INDEX public.sessions_user_id_index;
       public                 odoo    false    207            &           2606    2672717 +   activity_logs activity_logs_user_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.activity_logs
    ADD CONSTRAINT activity_logs_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;
 U   ALTER TABLE ONLY public.activity_logs DROP CONSTRAINT activity_logs_user_id_foreign;
       public               odoo    false    2812    228    205            "           2606    2672568 .   consultations consultations_patient_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.consultations
    ADD CONSTRAINT consultations_patient_id_foreign FOREIGN KEY (patient_id) REFERENCES public.patients(id) ON DELETE CASCADE;
 X   ALTER TABLE ONLY public.consultations DROP CONSTRAINT consultations_patient_id_foreign;
       public               odoo    false    2833    218    216            #           2606    2672740 2   consultations consultations_rendez_vous_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.consultations
    ADD CONSTRAINT consultations_rendez_vous_id_foreign FOREIGN KEY (rendez_vous_id) REFERENCES public.rendez_vous(id) ON DELETE SET NULL;
 \   ALTER TABLE ONLY public.consultations DROP CONSTRAINT consultations_rendez_vous_id_foreign;
       public               odoo    false    230    218    2849            '           2606    2672735 *   rendez_vous rendez_vous_patient_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.rendez_vous
    ADD CONSTRAINT rendez_vous_patient_id_foreign FOREIGN KEY (patient_id) REFERENCES public.patients(id) ON DELETE CASCADE;
 T   ALTER TABLE ONLY public.rendez_vous DROP CONSTRAINT rendez_vous_patient_id_foreign;
       public               odoo    false    2833    230    216            $           2606    2672596 '   schedules schedules_employee_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_employee_id_foreign FOREIGN KEY (employee_id) REFERENCES public.employees(id) ON DELETE CASCADE;
 Q   ALTER TABLE ONLY public.schedules DROP CONSTRAINT schedules_employee_id_foreign;
       public               odoo    false    220    222    2839            %           2606    2672651 $   stocks stocks_fournisseur_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.stocks
    ADD CONSTRAINT stocks_fournisseur_id_foreign FOREIGN KEY (fournisseur_id) REFERENCES public.fournisseurs(id) ON DELETE SET NULL;
 N   ALTER TABLE ONLY public.stocks DROP CONSTRAINT stocks_fournisseur_id_foreign;
       public               odoo    false    226    2843    224            �   #  x��Vˎ�0]�~�wl�W��;�@,#�b%��I�i������O���ә�*�Q{�﹯�_�ۦ�t��RM�xx#�Ʌ$�v$��g?NyvC��͔�Jf18�׃>!Ϗ�'R��~��[RŖ126z��0��v;��)g1�s�}7��		��p����l��Ƨ��O�}v�X�h0���)6s(b2��@vg0�㞭x�T�ܒ�0X:�~�l����i_�;��T�&j�DàplK��I� ��q'I�,,�(b0��	/Ե�ͽ�Y�w�p#c�Lm�x�=m�I��T�ї'R�.ߟL8���?t3�5V��~��A?8b�v�aR���m��>y&���eAǤ'D7z��7�/S*HX�x�>��ba$�`�r�䩯��{�,i4Q���^kF�9Ow[���6��o���Ӡ;��\1�"���ߏN[�Mߴ+$6��ja.c����
;R��*��wÀ��� /��[����<���y͓��Y։��쥿-�+������|ͮٻ�T�e����k��o�<b����?x�z�a�y��b�e\�_"�����ԯ�73��U;l�x���c\��9��0���Ru5�Ι ����ωٽo@��i��hq�`8�E=ڌ�̗:` �kK	�|��]�c@Z*�b�*~a��o��7qI���cQ(Nc��9ήd���HRaF0�"{m!o}ZD�J������<��ej��y�5�5�u0;apn�)�Y�D��@�{��a ���[��,���ax      �   C   x�KL���sH�M���K�ϭ142�3 BC�����"�L+Cscs3SkN�+�F��1z\\\ )l>      �      x������ � �      �   �   x�m�M
�0F��)�@t2����tQO ���i�ǯZZ�Y}�{�1���)d\�`| �dG��d���9�Z��K��,�U�a�MĢ{}�jťZy<u��f��y��0�~y�q����_��A�ϝ��4��¢B<�8ij��� `P2(�͛z�#"���4�5٪ٗ|} n�K���'�61��f�P�      �   �   x�u�1�0D�Sx���$���BO@��� I��H�Ë�68�[����"���q"B����+קu��e��L����]�� ��p��l�hqk1�eB�E*a���
��<y��|�c`Z7xG÷^Y5��cb�|�H�ڗ���;˵�p��2e�=RVI�      �      x������ � �      �   :   x�3�L�/-��,.N--2�415���/�4202�50�52Q04�22�25�&����� c�U      �      x������ � �      �      x������ � �      �     x�u��n� E�동0`H�eJo��BH���v�uC< q��xB�{��r��]b�D��K���A>�����?���	����A}�B�[o�v �R�ԥ���Y	T�VZaJ�0�ŧ�XA��(Hc��>�paΰ[�(5Q����a�&h*X�P�놡<�����g,(j�ZU���yc�t��&�M�Ԗl)�_;TV�����ds�|���g�6�8AhD�uק�<����=-���Q�)�<|u簔@���o����� ~ c�Ш      �   u   x�+)�,I�K�Ψ�MuH�M���K���T1�T14R)uO
͵�M��(qw5�H7Kq�--�ώ
�t7-
�w�ɍLw�t6���H�2u�,�4202�50�52U0��20�22����� ��!(      �   q   x�m�A
�@����)z�J&�t:9�� �(�J��߅P]t��gx]Zܖ��b=K��D�󮒻48��##��}�{��������ٶ�5Wv��Y��=�'"� �#8      �   �   x�m�M
1��ur��@%M����2HA+غ��Ώ.Y���σ ��ر@�Ra��y�9˚;�U����s�§�jyus����q���27��a�"��@V�FRʴm�E�_����.�|k�\��A}j5<���<~      �   W   x�3�4��M,J��42�2 !��02�50�52Q04�20�21D��21��r��� �!f"C�7`e`�fP�Д+F��� ˹5      �     x��TɎ�@=�_�1�����`����04�r1����=�f��4�L�K�H�"HU]�^�{��sJ璸��9h]p!�U�5����ɛg������c�r��;A��W��q� �w^~L������G��#�	�{fq:U��F��y�A�
̻��A�L��)��qY�g��KM�G�W�����K��d8�`��,A�$qM�5@�:G�bY���r���ɗ!(=$vi���9�q���c:&�7a�Z?3s���*!�-�Qnr���Әh��I��	h��d Y/�m?�P_ђo��,��E����~���Ī2�0��Ģ��o��~�������wJ��kiL��{���eu>+MX���s��teQ.X��t�*��~�o�;S�����J7���h��D�y�� ��<��ހ�������*O����	J�E��u��w�~�}@H0�:��S��)�xЊ&3�8�xu�����ơw��N�vk��r4�-���Y<�h����P�~|��5�(�h��tY�=�q��&�E���/"�9,(v����T��f��ù?���ȃA�2TQ:1�E��#5��0��5U��;�UɛވUR���s	̧�(���JVG��*r�Cꭽ9rd�6,�|��ߦ�~g
�5��1��<����9*��~�Y��ym����r��%��T6�Ug��&���2��: R�7�~����׳��Ǣ�6Q��A���x��C�IאT}����@�z�����CIy�Oo/�闇�t��o�      �   F   x�3�L,*�L�I5��=�2%39175��ӈ�ЀӐ����T��H��D��������M����Ќ+F��� 
z      �   #  x�m��n�@E��Wt�V:3�R��"�Jh�P��� "�����5�1��K�Inrr��������"�����|� ܩ������O���A{e���1�͵�~ߛ���������O�^���>�X�B�Ž'���=��-㬊DZ$v���@TLDyt{Z��/H�#^�M�؅����'��dj������*b����xh?X��	Ui�̺�*q��)���i5���Z�+7��S��5xj�9��j���O��>�|l}Fs+�=�t�M�he�ߟ$�Y.�eI�� ~C~�     