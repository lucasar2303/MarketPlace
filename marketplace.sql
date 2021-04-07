-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Mar-2021 às 21:21
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marketplace`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `nomeFantasia` varchar(40) NOT NULL,
  `cnpj` int(15) NOT NULL,
  `razaoSocial` varchar(40) NOT NULL,
  `enderecoCidade` varchar(40) NOT NULL,
  `enderecoBairro` varchar(40) NOT NULL,
  `enderecoEndereco` varchar(40) NOT NULL,
  `enderecoNumero` varchar(7) NOT NULL,
  `telefone` int(15) NOT NULL,
  `nomeContato` varchar(40) DEFAULT NULL,
  `avaliacao` int(11) NOT NULL,
  `avaliacaoPessoas` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `lojaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`nomeFantasia`, `cnpj`, `razaoSocial`, `enderecoCidade`, `enderecoBairro`, `enderecoEndereco`, `enderecoNumero`, `telefone`, `nomeContato`, `avaliacao`, `avaliacaoPessoas`, `userId`, `lojaId`) VALUES
('123', 123, '123', '123', '123', '123', '123', 123, '123', 3, 1, 9, 22),
('Loja 1', 1, 'Razão Social 1', 'Cidade 1', 'Bairro 1', 'Endereço 1', '001', 11, 'Nome 1', 15, 4, 11, 23),
('Loja 2', 2, 'Razão Social 2', 'Cidade 2', 'Bairro 2', 'Endereço 2', '002', 2147483647, 'Nome 2', 18, 4, 12, 24),
('Loja 3', 3, 'Razão Social 3', 'Cidade 3', 'Bairro 3', 'Endereço 3', '003', 1290000003, 'Nome 3', 3, 2, 13, 25),
('Nome Fantasia 4', 4, 'Razão Social 4', 'Cidade 4', 'Bairro 4', 'Endereço 4', '004', 2147483647, 'Nome 4', 4, 1, 14, 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `lojaId` int(11) NOT NULL,
  `produtoId` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`lojaId`, `produtoId`, `nome`, `foto`, `categoria`, `estoque`) VALUES
(23, 15, 'Monitor LG LED 27', 'monitor.jpg', 'Monitor', 20),
(23, 16, 'Relógio Smartwatch Amazfit', 'relogio.jpg', 'Relógios', 8),
(24, 17, 'Mesa Digitalizadora', 'mesa.jpg', 'Periféricos', 30),
(24, 18, 'Celular Samsung', 'celular.jpg', 'Celular', 50),
(25, 19, 'Home Theater 5.1', 'home.png', 'Som', 25),
(25, 20, 'Tablet Tab S4 SM-T830', 'tablet.jpg', 'Tablet', 40),
(26, 21, 'Tablet Tab C8 T200', 'tablet2.jpg', 'Tablet', 20),
(26, 22, 'Celular Xiaomi', 'celular2.jpg', 'Celular', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`, `userId`) VALUES
('lucas', '12345', 9),
('admin', '123456', 10),
('lucas2', '12345', 11),
('loja2', '123456', 12),
('loja3', '123456', 13),
('loja4', '123456', 14);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`lojaId`),
  ADD KEY `userId` (`userId`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`produtoId`),
  ADD KEY `lojaId` (`lojaId`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `loja`
--
ALTER TABLE `loja`
  MODIFY `lojaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `produtoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `loja`
--
ALTER TABLE `loja`
  ADD CONSTRAINT `loja_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usuario` (`userId`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`lojaId`) REFERENCES `loja` (`lojaId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
