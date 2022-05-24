-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 24-Maio-2022 às 16:39
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
-- Estrutura da tabela `pedidos_compras`
--

CREATE TABLE `pedidos_compras` (
  `id` bigint UNSIGNED NOT NULL,
  `cliente_id` bigint UNSIGNED NOT NULL,
  `produto_id` bigint UNSIGNED NOT NULL,
  `status` enum('aberto','pago','cancelado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aberto',
  `total_geral` double(6,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos_compras`
--

INSERT INTO `pedidos_compras` (`id`, `cliente_id`, `produto_id`, `status`, `total_geral`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 'aberto', 10.55, '2022-05-24 14:47:00', '2022-05-24 14:47:00'),
(9, 1, 1, 'aberto', 10.55, '2022-05-24 14:47:41', '2022-05-24 14:47:41'),
(10, 1, 1, 'aberto', 10.55, '2022-05-24 14:47:45', '2022-05-24 14:47:45'),
(11, 1, 1, 'aberto', 10.55, '2022-05-24 14:47:48', '2022-05-24 14:47:48'),
(12, 2, 1, 'aberto', 10.55, '2022-05-24 16:34:38', '2022-05-24 16:34:38'),
(13, 2, 4, 'aberto', 10.55, '2022-05-24 16:34:49', '2022-05-24 16:34:49'),
(14, 2, 3, 'aberto', 10.55, '2022-05-24 16:34:58', '2022-05-24 16:34:58'),
(15, 3, 3, 'aberto', 10.55, '2022-05-24 16:35:05', '2022-05-24 16:35:05'),
(16, 4, 3, 'aberto', 10.55, '2022-05-24 16:35:09', '2022-05-24 16:35:09'),
(17, 4, 1, 'aberto', 10.55, '2022-05-24 16:35:13', '2022-05-24 16:35:13');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedidos_compras`
--
ALTER TABLE `pedidos_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_compras_cliente_id_foreign` (`cliente_id`),
  ADD KEY `pedidos_compras_produto_id_foreign` (`produto_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos_compras`
--
ALTER TABLE `pedidos_compras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos_compras`
--
ALTER TABLE `pedidos_compras`
  ADD CONSTRAINT `pedidos_compras_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidos_compras_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
