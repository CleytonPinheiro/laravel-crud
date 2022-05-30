-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 30-Maio-2022 às 17:53
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `produtos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `cpf` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pedidos_compras_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `surname`, `birth_date`, `cpf`, `created_at`, `updated_at`, `pedidos_compras_id`) VALUES
(2, 'Cleyton', 'Gabriel', '2024-08-28', 123456, '2022-05-29 22:40:27', '2022-05-29 22:40:27', 1),
(4, 'Cleyton', 'Gabriel', '2024-08-28', 123456, '2022-05-29 22:47:00', '2022-05-29 22:47:00', 1),
(5, 'Cleyton', 'Gabriel', '2024-08-28', 123456, '2022-05-29 22:47:01', '2022-05-29 22:47:01', 1),
(6, 'Neide', 'Gabriel', '2024-08-28', 123456, '2022-05-30 15:29:44', '2022-05-30 15:29:44', 1),
(7, 'Val', 'Gabriel', '2024-08-28', 123456, '2022-05-30 15:30:47', '2022-05-30 15:30:47', 1),
(8, 'Val', 'Gabriel', '2024-08-28', 123456, '2022-05-30 15:31:13', '2022-05-30 15:31:13', 1),
(9, 'Val', 'Gabriel', '2024-08-28', 123456, '2022-05-30 15:31:41', '2022-05-30 15:31:41', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_16_135624_create_clientes_table', 1),
(6, '2022_05_16_135649_create_produtos_table', 1),
(7, '2022_05_16_135717_create_pedidos_compras_table', 1),
(8, '2022_05_29_175401_add_column_pedido_id', 1),
(9, '2022_05_29_203129_add_column_pedidos_id_table_produtos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_compras`
--

CREATE TABLE `pedidos_compras` (
  `id` bigint UNSIGNED NOT NULL,
  `status` enum('aberto','pago','cancelado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aberto',
  `total_geral` double(6,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos_compras`
--

INSERT INTO `pedidos_compras` (`id`, `status`, `total_geral`, `created_at`, `updated_at`) VALUES
(1, 'aberto', 88.66, '2022-05-29 22:38:15', '2022-05-29 22:38:15'),
(2, 'pago', 254.66, '2022-05-29 22:40:48', '2022-05-30 13:54:52'),
(3, 'cancelado', 254.66, '2022-05-29 22:47:09', '2022-05-30 14:40:10'),
(4, 'aberto', 88.66, '2022-05-29 22:47:11', '2022-05-29 22:47:11'),
(5, 'aberto', 88.66, '2022-05-30 13:50:31', '2022-05-30 13:50:31'),
(6, 'aberto', 88.66, '2022-05-30 14:16:30', '2022-05-30 14:16:30'),
(7, 'cancelado', 88.66, '2022-05-30 14:16:58', '2022-05-30 14:16:58'),
(8, 'cancelado', 88.66, '2022-05-30 14:18:28', '2022-05-30 14:18:28'),
(9, 'cancelado', 90.00, '2022-05-30 14:18:39', '2022-05-30 14:18:39'),
(10, 'cancelado', 90.00, '2022-05-30 14:18:46', '2022-05-30 14:18:46'),
(12, 'cancelado', 90.07, '2022-05-30 14:19:01', '2022-05-30 14:19:01'),
(15, 'cancelado', 100.00, '2022-05-30 14:39:54', '2022-05-30 14:39:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_unit` decimal(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pedidos_compras_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `product`, `amount`, `category`, `value_unit`, `created_at`, `updated_at`, `pedidos_compras_id`) VALUES
(1, 'celular', 3, 'Moveis', '60.56', '2022-05-29 22:45:16', '2022-05-30 15:06:14', 1),
(4, 'armario', 13, 'Moveis', '60.55', '2022-05-30 14:57:10', '2022-05-30 14:57:10', 1),
(5, 'armario', 13, 'Moveis', '60.55', '2022-05-30 14:57:14', '2022-05-30 14:57:14', 1),
(6, 'armario', 13, 'Moveis', '60.55', '2022-05-30 14:57:27', '2022-05-30 14:57:27', 1),
(7, 'jbl', 13, 'Moveis', '60.55', '2022-05-30 15:03:25', '2022-05-30 15:03:25', 1),
(8, 'note', 13, 'Moveis', '60.55', '2022-05-30 15:06:49', '2022-05-30 15:06:49', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_pedidos_compras_id_foreign` (`pedidos_compras_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `pedidos_compras`
--
ALTER TABLE `pedidos_compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_pedidos_compras_id_foreign` (`pedidos_compras_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pedidos_compras`
--
ALTER TABLE `pedidos_compras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_pedidos_compras_id_foreign` FOREIGN KEY (`pedidos_compras_id`) REFERENCES `pedidos_compras` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_pedidos_compras_id_foreign` FOREIGN KEY (`pedidos_compras_id`) REFERENCES `pedidos_compras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
