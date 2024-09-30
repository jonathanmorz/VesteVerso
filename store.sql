-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/09/2024 às 22:20
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
  `cep` varchar(8) NOT NULL,
  `cargo` varchar(20) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sobrenome`, `email`, `senha`, `sexo`, `cpf`, `cep`, `cargo`) VALUES
(1, 'Yuri Lopes', 'yuzzy', 'tpnvlnd@gmail.com', 'luiz1227', '21982893856', '140.961.387', '21230070', 'admin'),
(2, 'dwads', '', '', '', '', '', '', 'cliente'),
(3, 'Tico Teco', 'Tetoticoteco', 'Tecotico@gmail.com', '12345678', '21982893856', '29712474647', '21230070', 'cliente'),
(4, 'Daniel Dias', 'danielnoites07', 'robloxlandia456123@gmail.com', 'Ba456123', '21 982324256', '02374802753', '25032904', 'cliente'),
(21, 'Admin', 'Admin', 'admin@admin.com', '', '', '12345667890', '', 'cliente'),
(22, 'Admin', 'Admin', 'admin@admin.com', '', '', '12345667890', '', 'cliente'),
(23, 'Admin', 'Admin', 'admin@admin.com', '', '', '12345667890', '', 'cliente'),
(24, 'Admin', 'Admin', 'admin@admin.com', '', '', '12345667890', '', 'cliente'),
(25, 'wkajkldj', 'aaabbb', 'aaabbb@gmail.com', 'aaabbb', '321331', '1232131', '31313', 'cliente'),
(26, 'Teste', 'teste', 'teste@gmail.com', 'teste123', '11111111111', '11111111111', '11111111', 'cliente'),
(27, 'Teste', 'teste', 'teste@gmail.com', 'teste', 'teste', 'teste', 'teste', 'cliente'),
(28, 'Teste', 'teste', 'teste@gmail.com', 'teste', 'teste', 'teste', 'teste', 'cliente'),
(29, 'teste', 'teste', 'teste@gmail.com', 'teste', 'teste', 'teste', 'teste', 'cliente'),
(30, 'Raio', 'Irrita Ler', 'neguinhodamata@gmail.com', 'ritogomes', 'Outro', '19232084222', '', 'cliente');

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
(6, 1, 4, '2024-09-30 19:43:32', '2024-09-30 19:43:32');

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
(5, 'Camisa Oversized Branca', 100, 98.20, 'arquivos/66fb03ff72bdf.jpeg', 'roupa_fem', 'Camisa Oversized Branca Feminina', 1, 0),
(6, 'Camisa Polo ', 100, 72.50, 'arquivos/66fb04c6ba536.jpeg', 'roupa_masc', 'Camisa Polo Verde', 1, 0),
(7, 'Camisa Oversized ', 100, 35.90, 'arquivos/66fb05069cf5f.jpeg', 'roupa_masc', 'Camisa Oversized Grafite', 1, 0),
(8, 'Camisa Social', 100, 78.20, 'arquivos/66fb05381e785.jpeg', 'roupa_masc', 'Camisa Social Preta', 1, 0),
(9, 'Camisa Gola Alta', 100, 62.50, 'arquivos/66fb059e6a2b5.jpeg', 'roupa_masc', 'Camisa de Gola Alta', 1, 0),
(10, 'Camisa Gráfica Verde', 100, 84.90, 'arquivos/66fb05ca2bdd0.jpeg', 'roupa_masc', 'Camisa Gráfica Verde', 1, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
