--
-- PostgreSQL database dump
--

\restrict zLQSO39WFXt5ie6RCBHTadXWVfUVfuTWKXxldDrf85yiEehO9RcRJjuVvNJ1sR1

-- Dumped from database version 17.10 (Debian 17.10-0+deb13u1)
-- Dumped by pg_dump version 17.10 (Debian 17.10-0+deb13u1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO public.cache VALUES ('laravel-cache-rosilene@gmail.com|10.1.25.120:timer', 'i:1779379187;', 1779379187);
INSERT INTO public.cache VALUES ('laravel-cache-rosilene@gmail.com|10.1.25.120', 'i:1;', 1779379187);
INSERT INTO public.cache VALUES ('laravel-cache-rosilenesilvaifal@gmail.com|10.1.25.120:timer', 'i:1779379199;', 1779379199);
INSERT INTO public.cache VALUES ('laravel-cache-rosilenesilvaifal@gmail.com|10.1.25.120', 'i:1;', 1779379199);


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: admin
--



--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO public.categories VALUES (1, 'Salgados', '2026-05-19 11:21:19', '2026-05-21 14:21:30', 'salgados.jpeg');
INSERT INTO public.categories VALUES (2, 'Doces', '2026-05-19 11:21:19', '2026-05-21 14:21:41', 'doces.jpeg');
INSERT INTO public.categories VALUES (3, 'Massas', '2026-05-19 11:21:19', '2026-05-21 14:21:51', 'massas.jpeg');
INSERT INTO public.categories VALUES (4, 'Comida Estrangeira', '2026-05-19 11:21:19', '2026-05-21 14:21:58', 'comida-estrangeiras.jpeg');
INSERT INTO public.categories VALUES (5, 'Almoço', '2026-05-19 11:21:19', '2026-05-21 14:22:06', 'almoco.jpeg');
INSERT INTO public.categories VALUES (6, 'Dietas Restritivas', '2026-05-19 11:21:19', '2026-05-21 14:22:14', 'dietas-restritivas.jpeg');


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: admin
--



--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: admin
--



--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: admin
--



--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO public.migrations VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO public.migrations VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO public.migrations VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO public.migrations VALUES (4, '2026_04_14_122146_create_categories_table', 1);
INSERT INTO public.migrations VALUES (5, '2026_04_14_122333_create_recipes_table', 1);
INSERT INTO public.migrations VALUES (6, '2026_04_14_122425_create_recipe_user_table', 1);
INSERT INTO public.migrations VALUES (7, '2026_05_18_120936_add_aprovados_to_recipe_table', 1);
INSERT INTO public.migrations VALUES (8, '2026_05_18_130603_add_role_to_users_table', 1);
INSERT INTO public.migrations VALUES (9, '2026_05_20_130456_rename_sobremesas_to_comida_estrangeira', 2);
INSERT INTO public.migrations VALUES (10, '2026_05_21_140515_add_image_to_categories_table', 3);


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: admin
--



--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO public.users VALUES (1, 'Admin', 'admin@teste.com', NULL, '$2y$12$O0C6dgWMtZ1TPirmbVxbquD08FADEqCDaoapYKof7NtvQG2BdT4Yu', NULL, '2026-05-19 11:21:20', '2026-05-19 11:21:20', 'admin');
INSERT INTO public.users VALUES (2, 'Gerente', 'gerente@teste.com', NULL, '$2y$12$i5uv0ZfdaK01Zkmf9Hulpu/BROBbd8qEW72C6.cSLbZa93FuyOiQ6', NULL, '2026-05-19 11:21:20', '2026-05-19 11:21:20', 'manager');
INSERT INTO public.users VALUES (3, 'Usuário Comum', 'user@teste.com', NULL, '$2y$12$OjNk4YvnZX.CZ8vI.cLzbOM0Ko1.OnZAszEDCyuxLiBt92tkdi7da', NULL, '2026-05-19 11:21:20', '2026-05-19 11:21:20', 'user');
INSERT INTO public.users VALUES (4, 'ray', 'ray@teste.com', NULL, '$2y$12$8AN3vaSa7boNvT5IereFtepswNCVARmAXgyx82ionKQOsVBKKVWum', NULL, '2026-05-19 14:17:15', '2026-05-19 14:17:15', 'user');
INSERT INTO public.users VALUES (5, 'fulana', 'fulana@teste.com', NULL, '$2y$12$YQ5Tqx6iHQp6Aj11gFLV9eiTytQxTUQtX8MgDiYAKpBiboynQ/ZYe', NULL, '2026-05-20 16:49:54', '2026-05-20 16:49:54', 'user');
INSERT INTO public.users VALUES (6, 'Rosilene da Silva Santos', 'rosilenesilvaifal@gmail.com', NULL, '$2y$12$JqilA1XjPOP9uiH/udbWIur7MzxGocX5BqmNpB/SmA3Ppn0jTgxSG', NULL, '2026-05-21 15:59:40', '2026-05-21 15:59:40', 'user');


--
-- Data for Name: recipes; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO public.recipes VALUES (18, '2026-05-21 16:04:10', '2026-05-21 16:40:30', 'Pudim', 'Leite, ovos, leite condensado.', 'Junta tudo no liquidicador.', '330777a1246b85838223970165faa2ba.jpg', NULL, 6, 2, 'approved', NULL, 1, '2026-05-21 16:40:30');
INSERT INTO public.recipes VALUES (2, '2026-05-19 11:21:20', '2026-05-19 12:50:47', 'Quidem autem adipisci possimus.', 'Ingrediente 1, Ingrediente 2, Ingrediente 3', 'Passo 1: faça isso. Passo 2: faça aquilo.', NULL, NULL, 3, 1, 'rejected', 'nao quero', 1, '2026-05-19 12:50:47');
INSERT INTO public.recipes VALUES (4, '2026-05-19 11:21:20', '2026-05-19 12:50:55', 'Qui iusto rerum.', 'Ingrediente 1, Ingrediente 2, Ingrediente 3', 'Passo 1: faça isso. Passo 2: faça aquilo.', NULL, NULL, 2, 6, 'rejected', 'nao quero', 1, '2026-05-19 12:50:55');
INSERT INTO public.recipes VALUES (5, '2026-05-19 11:21:20', '2026-05-19 12:51:01', 'Ipsa eius blanditiis quos.', 'Ingrediente 1, Ingrediente 2, Ingrediente 3', 'Passo 1: faça isso. Passo 2: faça aquilo.', NULL, NULL, 2, 2, 'rejected', 'nao quero', 1, '2026-05-19 12:51:01');
INSERT INTO public.recipes VALUES (6, '2026-05-19 11:23:17', '2026-05-19 14:13:42', 'brigadeiro', 'leite condesado', 'junte tudo', 'fffedf4ec8a9b40a6bed67a349fca513.jpg', 'receitas testes', 1, 2, 'approved', NULL, 1, '2026-05-19 14:13:42');
INSERT INTO public.recipes VALUES (7, '2026-05-19 14:18:43', '2026-05-19 14:21:06', 'macarrao', 'macarrao com carne', 'cozinhe o macarrao e a carne', '2305eb1d2aa56934d0300f885cd5dd38.jpg', 'receita de massas', 4, 5, 'approved', NULL, 1, '2026-05-19 14:21:06');
INSERT INTO public.recipes VALUES (9, '2026-05-19 14:33:20', '2026-05-19 14:33:34', 'brownie', 'farinha
ovo
manteiga', 'junte', '0b6e463bb92bd98b505d2888555cd260.jpg', 'receita com glutem e ovos', 1, 4, 'approved', NULL, 1, '2026-05-19 14:33:34');
INSERT INTO public.recipes VALUES (10, '2026-05-19 15:18:47', '2026-05-19 15:19:31', 'lasanha', 'asasssssss', 'asda', '631ef93aed70439df4318b27db3f76d0.jpg', 'assssssssssss', 3, 5, 'approved', NULL, 1, '2026-05-19 15:19:31');
INSERT INTO public.recipes VALUES (8, '2026-05-19 14:28:46', '2026-05-19 14:29:32', 'empadas', 'farinha
manteiga
frango', 'junte a farinha com manteiga, forme na forminha e recheie com frango', '914aea7b3ef3bec0408a3373a01a0054.jpg', 'contem lactose e glutem', 3, 1, 'approved', NULL, 1, '2026-05-19 14:29:32');
INSERT INTO public.recipes VALUES (11, '2026-05-19 15:45:47', '2026-05-19 15:45:55', 'donuts', 'donuts', 'donuts', 'e59af83a5b457f242e933a2ae5ae1e03.jpg', 'donuts', 1, 3, 'approved', NULL, 1, '2026-05-19 15:45:55');
INSERT INTO public.recipes VALUES (12, '2026-05-20 12:44:49', '2026-05-20 12:45:00', 'macarrao', 'macarrao', 'cozinhe o macarrao', '08f9c876af5a8052034e800645b43f62.jpg', 'eba', 1, 3, 'approved', NULL, 1, '2026-05-20 12:45:00');
INSERT INTO public.recipes VALUES (13, '2026-05-20 15:00:58', '2026-05-20 15:01:20', 'yaksoba', 'macarrao, carne cenopuras', 'cozinhe', '7f6a79ed7f4a1b29b94e7be880f99bff.jpg', 'use shoyo', 4, 4, 'approved', NULL, 1, '2026-05-20 15:01:20');
INSERT INTO public.recipes VALUES (14, '2026-05-20 16:52:45', '2026-05-20 16:53:05', 'Macarrao com molho de laranja e frango', 'Macarrao
FRango 
Laranja', 'cozinhe', '6947dd7e0e08c7b4c2fc5f81a664fcd8.jpg', 'receita com glutem e lactose', 5, 3, 'approved', NULL, 1, '2026-05-20 16:53:05');
INSERT INTO public.recipes VALUES (15, '2026-05-21 12:56:34', '2026-05-21 12:57:07', 'tamaki de Salmão', 'Salmao
Arroz
CreamChease
Alga
Cebolinha', 'corte o salmao
cozinhe o arroz
enrole os dois com a alga', '4bd5b7759b387829357018479a63ec53.jpg', 'A livre criatividade pode ser frito tbm', 5, 4, 'approved', NULL, 1, '2026-05-21 12:57:07');
INSERT INTO public.recipes VALUES (16, '2026-05-21 13:07:17', '2026-05-21 13:07:17', 'carne cozinhada com batatas', 'carne
verduras
batatas', 'tempere e cozinhe tudo junto', '7104faf55a0f3ae90cc82b891029b10b.jpg', 'receita multicategorias', 5, 1, 'pending', NULL, NULL, NULL);
INSERT INTO public.recipes VALUES (17, '2026-05-21 13:19:04', '2026-05-21 13:19:37', 'almoco completo vegetariano', 'grao de bico
tomate
pepino
abrobinha
repolho
arroz', 'cozinhe', '3faf668881a30eb399c1ec068df2e755.jpg', NULL, 5, 6, 'approved', NULL, 1, '2026-05-21 13:19:37');


--
-- Data for Name: recipe_user; Type: TABLE DATA; Schema: public; Owner: admin
--



--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO public.sessions VALUES ('JS0IK87t9ZsQkKspbyG9YSvS6UcaJO9MA3AXaPP1', 4, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT21jQndnV01rOXkzc1E4OGdFajhrbFZjcG50NnVWMUgyQ2phR0kxVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1779455997);
INSERT INTO public.sessions VALUES ('Czm5XYLmt7BQOrqCaiBBOLyQu11rivejcOCCBBRs', NULL, '10.1.25.72', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidk5ybkFyMDNMaHNvQWJ4QW1sd252dGh2RU81VGZYdmtUR0dXRnZwVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMC4xLjI1LjcyOjgwMDAvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1779379036);
INSERT INTO public.sessions VALUES ('Rji47amrI2VynMFKP0WbHx4e7xV4QOFwY8ElEuWi', 6, '10.1.25.120', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicGpDM3ZRc0E3STBaRmRMR3ZDSUN3UWJFa1o2U3Q4TmFqdzlvTjZpSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMC4xLjI1LjcyOjgwMDAvaG9tZSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1779379515);
INSERT INTO public.sessions VALUES ('e186p7M7ABLdRGnbxPRHYOCH6m67JUspUCReirKS', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUQ2elJVWHNIVTVzWkJ4RjBRNFJUYnZkMUNUVzROaEhvNWNQUThZQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1779381633);
INSERT INTO public.sessions VALUES ('0TI6o0zXxIbddS3vXDsC7P90o63OliQgfja5s7ZD', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.121.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOERnREc2Z0VWZDBST1YzVWdYQ2hnM0pHakMyeDF2aUk5MjlJRGhQbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8wLjAuMC4wOjgwMDAvbG9naW4iO3M6NToicm91dGUiO3M6NToibG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1779447569);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.categories_id_seq', 1, false);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.migrations_id_seq', 10, true);


--
-- Name: recipe_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.recipe_user_id_seq', 1, false);


--
-- Name: recipes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.recipes_id_seq', 18, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.users_id_seq', 6, true);


--
-- PostgreSQL database dump complete
--

\unrestrict zLQSO39WFXt5ie6RCBHTadXWVfUVfuTWKXxldDrf85yiEehO9RcRJjuVvNJ1sR1

