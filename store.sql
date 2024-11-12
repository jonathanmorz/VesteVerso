-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/11/2024 às 17:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `store`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `user_id`, `produto_id`, `quantidade`, `criado_em`, `atualizado_em`) VALUES
(28, 4, 1, 1, '2024-08-11 01:08:10', '2024-08-11 01:08:10'),
(29, 4, 2, 3, '2024-08-11 01:08:10', '2024-08-11 01:08:10'),
(32, 1, 3, 1, '2024-09-03 00:33:56', '2024-09-03 00:33:56'),
(33, 1, 4, 1, '2024-09-03 00:33:56', '2024-09-03 00:33:56'),
(34, 26, 3, 1, '2024-09-21 00:21:12', '2024-09-21 00:21:12'),
(35, 26, 4, 1, '2024-09-21 00:21:12', '2024-09-21 00:21:12'),
(36, 27, 3, 1, '2024-09-21 00:27:09', '2024-09-21 00:27:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `cargo` varchar(20) NOT NULL DEFAULT 'cliente',
  `reset_token` varchar(32) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sobrenome`, `email`, `senha`, `sexo`, `cpf`, `cep`, `cargo`, `reset_token`, `token_expires`) VALUES
(32, 'Jonathan', 'Morozenviski Toledo', 'jonathanmorozenviski@gmail.com', '12345678', 'Masculino', '12345678912', NULL, 'cliente', NULL, NULL),
(37, 'Titoco', 'Da silva', 'Tecotico@gmail.com', '12345678', 'Masculino', '12345678911', NULL, 'cliente', NULL, NULL),
(47, 'Yuri', 'Lopes', 'tpnvlnd@gmail.com', 'luiz1227', 'Masculino', '14096138797', NULL, 'admin', NULL, NULL),
(49, 'admin', '', 'admin@admin.com', 'admin', '', '', NULL, 'cliente', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cep` int(8) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `id_user`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `complemento`) VALUES
(9, 32, 15075090, 'SP', 'S&atilde;o Jos&eacute; do Rio Preto', 'Jardim Soraia', 'Rua Jo&atilde;o Gabriel', ''),
(21, 32, 20010040, 'RJ', 'Rio de Janeiro', 'Centro', 'Travessa Tocantins', 'qweqwe'),
(23, 32, 20010050, 'RJ', 'Rio de Janeiro', 'Centro', 'Travessa Trajano de Carvalho', ''),
(24, 37, 20010040, 'RJ', 'Rio de Janeiro', 'Centro', 'Travessa Tocantins', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `favoritos`
--

INSERT INTO `favoritos` (`id`, `user_id`, `produto_id`, `criado_em`, `atualizado_em`) VALUES
(7, 32, 1, '2024-10-13 16:54:29', '2024-10-13 16:54:29'),
(9, 32, 18, '2024-10-13 16:58:52', '2024-10-13 16:58:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `preco` double(5,2) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `descricao` varchar(120) NOT NULL,
  `em_alta` tinyint(1) NOT NULL,
  `promocao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `preco`, `imagem`, `categoria`, `descricao`, `em_alta`, `promocao`) VALUES
(1, 'Camisa Gola Fem', 100, 56.90, 'arquivos/66fb0265e7407.jpg', 'roupa_fem', 'Camisa de Gola Feminina', 1, 0),
(2, 'Camisa Manga Longa', 100, 42.30, 'arquivos/66fb029b24748.jpeg', 'roupa_masc', 'Camisa Manga Longa Feminina', 1, 0),
(3, 'Camisa Lilás ', 100, 72.50, 'arquivos/66fb02dd452f4.jpeg', 'roupa_fem', 'Camisa Lilás Feminina', 1, 0),
(4, 'Camisa Manga Curta', 100, 35.60, 'arquivos/66fb03a3e3ef9.jpeg', 'roupa_fem', 'Camisa de Manga Curta Feminina', 1, 0),
(5, 'Camisa Preta Fem', 100, 79.99, 'arquivos/66fc3dbeae22b.jpeg', 'roupa_fem', 'Camisa Preta Manga Longa', 1, 0),
(6, 'Camisa Polo ', 100, 72.50, 'arquivos/66fb04c6ba536.jpeg', 'roupa_masc', 'Camisa Polo Verde', 1, 0),
(7, 'Camisa Oversized ', 100, 35.90, 'arquivos/66fb05069cf5f.jpeg', 'roupa_masc', 'Camisa Oversized Grafite', 1, 0),
(8, 'Camisa Social', 100, 78.20, 'arquivos/66fb05381e785.jpeg', 'roupa_masc', 'Camisa Social Preta', 1, 0),
(9, 'Camisa Gola Alta', 100, 62.50, 'arquivos/66fb059e6a2b5.jpeg', 'roupa_masc', 'Camisa de Gola Alta', 1, 0),
(11, 'Camisa Gráfica Verde', 100, 84.90, 'arquivos/66fb05ca2bdd0.jpeg', 'roupa_masc', 'Camisa Gráfica Verde', 1, 0),
(12, 'Camisa Oversized', 100, 98.20, 'arquivos/66fb03ff72bdf.jpeg', 'roupa_fem', 'Camisa Oversized Branca Feminina', 1, 0),
(17, 'Camiseta de Manga', 1, 63.80, 'arquivos/66fc30f396d67.jpeg', 'roupa_masc', 'Camiseta de Manga curta', 0, 0),
(18, ' Camisa Lisa Básica', 47, 110.90, 'arquivos/66fc3192cafa8.jpg', 'roupa_masc', ' Camisa Lisa Básica', 1, 0),
(19, 'Calça Cargo ', 5, 42.30, 'arquivos/66fc31f57ff7c.jpeg', 'roupa_masc', 'Calça Cargo Masculina', 1, 0),
(20, 'Short de Praia', 13, 72.50, 'arquivos/66fc325304b49.jpg', 'roupa_masc', 'Short Masculino Moda Praia', 1, 0),
(21, 'Camiseta Listrada', 18, 35.60, 'arquivos/66fc32b07c8c0.jpeg', 'roupa_masc', 'Camiseta Polo Listrada', 1, 0),
(22, 'Macacão Gráfica', 8, 98.20, 'arquivos/66fc3318eb442.jpg', 'roupa_inf', 'Macacão Feminina Gráfica', 1, 0),
(23, 'T-Shirt com Bainha', 15, 125.40, 'arquivos/66fc3355e8f91.jpeg', 'roupa_inf', 'T-Shirt com Bainha', 1, 0),
(24, 'Suéter Tweed', 10, 84.70, 'arquivos/66fc33d0be9fe.jpg', 'roupa_inf', 'Suéter Tweed Estampado', 1, 0),
(25, 'Vestido Estampado', 24, 63.80, 'arquivos/66fc38daede83.jpeg', 'roupa_inf', 'Vestido Cami Estampado', 1, 0),
(26, 'Saia e Top Plissada ', 1, 110.90, 'arquivos/66fc395ebed67.jpeg', 'roupa_inf', 'Saia Plissada e Top Cami', 1, 0),
(27, 'Camiseta + Short', 11, 42.30, 'arquivos/66fc3a5ff267d.jpeg', 'roupa_inf', 'Camiseta + Short', 0, 0),
(28, 'Body Algodão', 12, 72.50, 'arquivos/66fc3a94f32ad.jpeg', 'roupa_inf', 'Body Algodão', 0, 0),
(29, 'Camisa Rosa Fem', 100, 56.20, 'arquivos/66fc3d36934b0.jpeg', 'roupa_fem', 'Camisa Cropped Rosa', 0, 1),
(30, 'Camisa Gráfica Fem', 100, 84.70, 'arquivos/66fc3d4f15eab.jpeg', 'roupa_fem', 'Camisa Fráfica Oversized Feminina', 0, 0),
(32, 'Camisa Social', 100, 83.00, 'arquivos/66fc3e1db56aa.jpeg', 'roupa_fem', 'Camisa Social Fem Preta', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_sessions`
--

CREATE TABLE `user_sessions` (
  `token_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_produto_unique` (`user_id`,`produto_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
