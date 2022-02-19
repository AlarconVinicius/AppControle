-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Fev-2022 às 01:34
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_clinica`
--

-- --------------------------------------------------------

-- ZERAR O ID DA TABELA

-- ALTER TABLE `bd_clinica`.`tb_produto` DROP `id_prod`;

-- ALTER TABLE `bd_clinica`.`tb_produto` ADD `id_prod` INT(255) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id_prod`);
--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_prod` int(255) NOT NULL,
  `nome_prod` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_prod` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `data_cadastro_prod` date NOT NULL DEFAULT current_timestamp(),
  `estoque_prod` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status_prod`
--

CREATE TABLE `tb_status_prod` (
  `id_status` int(11) NOT NULL,
  `status` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_status_prod`
--

INSERT INTO `tb_status_prod` (`id_status`, `status`) VALUES
(1, 'Ativo'),
(2, 'Não Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status_tarefa`
--

CREATE TABLE `tb_status_tarefa` (
  `id_status` int(11) NOT NULL,
  `status` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_status_tarefa`
--

INSERT INTO `tb_status_tarefa` (`id_status`, `status`) VALUES
(1, 'pendente'),
(2, 'realizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefa`
--

CREATE TABLE `tb_tarefa` (
  `id_tarefa` int(11) NOT NULL,
  `tarefa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `data_tarefa` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `tb_status_prod`
--
ALTER TABLE `tb_status_prod`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `tb_status_tarefa`
--
ALTER TABLE `tb_status_tarefa`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `tb_tarefa`
--
ALTER TABLE `tb_tarefa`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_prod` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_status_prod`
--
ALTER TABLE `tb_status_prod`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_status_tarefa`
--
ALTER TABLE `tb_status_tarefa`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tarefa`
--
ALTER TABLE `tb_tarefa`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `tb_produto_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_status_prod` (`id_status`);

--
-- Limitadores para a tabela `tb_tarefa`
--
ALTER TABLE `tb_tarefa`
  ADD CONSTRAINT `tb_tarefa_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_status_tarefa` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
