-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jul-2023 às 16:23
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `data`, `categoria`) VALUES
(1, '2023-06-08 04:10:07', 'Material de construção'),
(2, '2023-06-08 04:10:07', 'Material elétrico ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estantes`
--

CREATE TABLE `estantes` (
  `id_estante` int(11) NOT NULL,
  `estante` varchar(255) NOT NULL,
  `prateleira` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estantes`
--

INSERT INTO `estantes` (`id_estante`, `estante`, `prateleira`) VALUES
(1, 'Estante A001', 'Prateleira 001'),
(2, 'Estante A001', 'Prateleira 002'),
(3, 'Estante A001', 'Prateleira 003'),
(4, 'Estante A001', 'Prateleira 004'),
(5, 'Estante A001', 'Prateleira 005');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoques`
--

CREATE TABLE `estoques` (
  `id_material` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `quantidade` decimal(6,2) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `responsavel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cnpj` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `responsavel`, `email`, `telefone`, `cnpj`) VALUES
(12, 'daniel', 'daniel', 'hotmail', '1234', 123456789),
(13, 'maraca', 'tiago', 'tiago@maraca', '98745645645', 98111);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `id_material` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `quantidade` decimal(6,2) NOT NULL,
  `unidade_de_medida` varchar(100) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `preco` decimal(6,2) NOT NULL,
  `estoque_minimo` decimal(6,2) DEFAULT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_estante` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`id_material`, `nome`, `descricao`, `marca`, `modelo`, `quantidade`, `unidade_de_medida`, `data`, `preco`, `estoque_minimo`, `id_fornecedor`, `id_estante`, `id_categoria`) VALUES
(4, 'CImento 50kg', NULL, NULL, NULL, '500.00', '1', '0000-00-00 00:00:00', '0.00', NULL, 13, 5, 1),
(5, 'CImento 50kg', NULL, NULL, NULL, '500.00', '1', '0000-00-00 00:00:00', '0.00', NULL, 13, 5, 1),
(6, 'CImento 50kg', NULL, NULL, NULL, '500.00', '1', '0000-00-00 00:00:00', '0.00', NULL, 13, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mat_categorias`
--

CREATE TABLE `mat_categorias` (
  `id_material` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_medida`
--

CREATE TABLE `unidade_medida` (
  `id_unidade_medida` int(11) NOT NULL,
  `unidade_medida` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidade_medida`
--

INSERT INTO `unidade_medida` (`id_unidade_medida`, `unidade_medida`) VALUES
(1, 'Unidade'),
(2, 'Metro'),
(3, 'Quilo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `data_criacao`) VALUES
(1, 'Tiago Fernandes', 'tiago@email.com', '12IbR.gJ8wcpc', '2023-06-08 04:08:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `estantes`
--
ALTER TABLE `estantes`
  ADD PRIMARY KEY (`id_estante`);

--
-- Índices para tabela `estoques`
--
ALTER TABLE `estoques`
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `a1` (`id_fornecedor`),
  ADD KEY `a2` (`id_estante`),
  ADD KEY `a3` (`id_categoria`);

--
-- Índices para tabela `mat_categorias`
--
ALTER TABLE `mat_categorias`
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_material` (`id_material`);

--
-- Índices para tabela `unidade_medida`
--
ALTER TABLE `unidade_medida`
  ADD PRIMARY KEY (`id_unidade_medida`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estantes`
--
ALTER TABLE `estantes`
  MODIFY `id_estante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `materiais`
--
ALTER TABLE `materiais`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `unidade_medida`
--
ALTER TABLE `unidade_medida`
  MODIFY `id_unidade_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estoques`
--
ALTER TABLE `estoques`
  ADD CONSTRAINT `estoques_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `materiais` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estoques_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `materiais`
--
ALTER TABLE `materiais`
  ADD CONSTRAINT `a1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`),
  ADD CONSTRAINT `a2` FOREIGN KEY (`id_estante`) REFERENCES `estantes` (`id_estante`),
  ADD CONSTRAINT `a3` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
