create database sistema_recepcao;
use sistema_recepcao;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jul-2017 às 22:37
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_recepcao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `codigo` int(11) NOT NULL,
  `nome` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(1, 'Serviços da Casa do Empresário'),
(2, 'Serviços da Prefeitura e Junta Comercial'),
(3, 'Serviços Parceiros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(800) DEFAULT NULL,
  `descricaoDetalhada` text,
  `categoria` int(11) DEFAULT NULL,
  `setor` int(11) DEFAULT NULL,
  `responsavel` varchar(800) DEFAULT NULL,
  `setor_dois` int(11) DEFAULT NULL,
  `responsavel_dois` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `codigo` int(11) NOT NULL,
  `nome` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`codigo`, `nome`) VALUES
(3, 'Gerência'),
(4, 'Recepção'),
(5, 'Financeiro'),
(6, 'Jurídico '),
(7, 'SPC/Paracatu Card '),
(8, 'Junta Comercial'),
(9, 'Certificado Digital'),
(10, 'Comercial'),
(11, 'Prefeitura Municipal '),
(12, 'Segurança do Trabalho '),
(13, 'Comunicação  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `setor` (`setor`),
  ADD KEY `setor_dois` (`setor_dois`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`setor`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `servico_ibfk_3` FOREIGN KEY (`setor_dois`) REFERENCES `categoria` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
