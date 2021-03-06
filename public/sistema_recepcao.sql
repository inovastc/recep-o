-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Set-2017 às 03:21
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
(1, 'Casa do Empresário'),
(2, 'Prefeitura e Junta Comercial'),
(3, 'Parceiros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(100) NOT NULL,
  `dataCliente` date NOT NULL,
  `nome` text NOT NULL,
  `cpf` text NOT NULL,
  `cnpj` text NOT NULL,
  `email` text NOT NULL,
  `telefone` text NOT NULL,
  `finalidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `dataCliente`, `nome`, `cpf`, `cnpj`, `email`, `telefone`, `finalidade`) VALUES
(40, '2017-09-26', 'NomeTeste', 'CPFTeste', 'CNPJTeste', 'e-mailteste', '(12) 31231-2321', 14),
(41, '2017-09-26', 'Max Victor', '129.051.316-32', '21.356.487/9322-65', 'maxvictorhc@gmail.com', '(38) 99921-2989', 16),
(42, '2017-09-26', 'Abner Matheus', '156.489.873-65', '15.984.654/0001-56', 'theabnermatheus@hotmail.com', '(38) 96541-2587', 15),
(43, '2017-09-26', '1', '123.213.123-21', '21.321.312/3213-12', '312321312312', '(31) 23123-1231', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(800) NOT NULL,
  `descricaoDetalhada` text,
  `categoria` int(11) NOT NULL,
  `setor` int(11) NOT NULL,
  `responsavel` varchar(800) NOT NULL,
  `setor_dois` int(11) NOT NULL,
  `responsavel_dois` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`codigo`, `descricao`, `descricaoDetalhada`, `categoria`, `setor`, `responsavel`, `setor_dois`, `responsavel_dois`) VALUES
(1, 'Alvará ME/EPP', 'Emissão do Alvará de localização e funcionamento demais empresas e atividades', 2, 2, 'LILLIAN / POLIANE', 14, 'a definir'),
(2, 'Alvará MEI', 'Emissão do Alvará de localização e funcionamento do MEI', 2, 2, 'LILLIAN / POLIANE', 14, 'a definir'),
(3, 'Assuntos Gerencia / Presidência', 'Assuntos Específicos para gerentes e/ou presidentes', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(4, 'Certidões Municipais', 'Emissão de Certidões Municipais referente a regularidade fiscal de empresas', 2, 2, 'LILLIAN / POLIANE', 14, 'a definir'),
(5, 'Consulta Viabilidade', 'Consulta de viabilidade de empresas', 2, 2, 'LILLIAN / POLIANE', 14, 'MARCOS'),
(6, 'Info - Acertos Financeiros', 'Informações - Acertos financeiros ACE, CDL e Sindcomercio', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(7, 'Info - Acesso a Informações', 'Informações - Acesso a Informações (sites, facebooks, whatssap)', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(8, 'Info - ADESP', 'Informações Sobre ADESP', 3, 2, 'LILLIAN / POLIANE', 14, 'Patricia'),
(9, 'Info - Assessoria Jurídica', 'Informações -  Esclarecimentos Jurídicas (CLT, convencoes coletivas, tributarias e outros) ', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(10, 'Info - Atuação junto aos órgãos públicos', 'Informações  - Atuação junto aos órgãos públicos', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(11, 'Info - Auxilio Funeral', 'Informações - Auxilio Funeral', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(12, 'Info - Ações Sociais', 'Informações - Ações sociais', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(13, 'Info - Banco de Emprego', 'Informações - Banco de Emprego', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(14, 'Info - Calendário Comercial', 'Informações - Informações sobre Calendário Comercial', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(15, 'Info - Campanhas de Incentivo', 'Informações - Campanhas de Incentivo (Cartaz, divulgação, promoção)', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(16, 'Info - CBH', 'Informações Sobre CBH', 3, 2, 'LILLIAN / POLIANE', 14, 'Amanda'),
(17, 'Info - Certificado de Origem', 'Informações - Auxilio Certificado de Origem', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(18, 'Info - Conciliação e Cobrança Extra Judicial', 'Informações -  Posto Avançado de Conciliação Extrajudicial - PACE', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(19, 'Info - Conselho de Segurança', 'Informações Sobre Conselho de Segurança', 3, 2, 'LILLIAN / POLIANE', 14, 'Watson'),
(20, 'Info - Convenção Coletiva de Trabalho', 'Informações - Convenção Coletiva de Trabalho', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(21, 'Info - Credito ME e EPP', 'Informações - Linhas de credito para pequenas, medias e grandes empresas', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(22, 'Info - Credito MEI e PF', 'Informações - Linhas de crédito especiais para MEI e Pessoa fisica', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(23, 'Info - Criação de Logotipos e Materiais de Divulgação ', 'Informações  - Criação de Logotipos e Materiais de Divulgação ', 1, 2, 'LILLIAN / POLIANE', 14, 'LORRANE'),
(24, 'Info - Cursos e treinamentos', 'Informações - Cursos, treinamentos, oficinas, encontros, seminários e missões empresariais', 1, 2, 'LILLIAN / POLIANE', 5, 'GABRIELLA SANTOS'),
(25, 'Info - Dia do Comerciante', 'Informações - Dia do Comerciante', 1, 2, 'LILLIAN / POLIANE', 14, 'LORRANE'),
(26, 'Info - Filiação', 'Informações - Filiação  ACE / CDL / SINDCOMERCIO', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(27, 'Info - Fiscalização municipal', 'Informações - Fiscalização municipal de vigilância sanitária, meio ambiente, tributos, posturas e obras;', 2, 2, 'LILLIAN / POLIANE', 14, 'a definir'),
(28, 'Info - Formalização empresas', 'Informações - Formalização, alteração e baixa de empresas em geral', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(29, 'Info - Guia Informativo', 'Informações - Guia Informativo ( catalogo físico e Online)', 1, 2, 'LILLIAN / POLIANE', 14, 'LORRANE'),
(30, 'Info - Licitacoes governamentais', 'Informacoes sobre licitacoes de compras e carta convite', 2, 2, 'LILLIAN / POLIANE', 14, 'a definir'),
(31, 'Info - Locação de Salas e Salão', 'Informações - Alugueis de espaço de salão e salas', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(32, 'Info - Material informativo', 'Informações e distribuição de material informativo (cartilhas, folders, manuais e etc.)', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(33, 'Info - MEI', 'Informações - Micro Empreendedor Individual (Formalização, alteração, baixa, Emissão de CCMEI e DASMEI', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(34, 'Info - Mérito Empresarial', 'Informações - Mérito Empresarial', 1, 2, 'LILLIAN / POLIANE', 14, 'LORRANE'),
(35, 'Info - Observatório Social', 'Informações Sobre Observatório Social', 3, 2, 'LILLIAN / POLIANE', 14, 'Marcao'),
(36, 'Info - Paracatu Card', 'Informações - Paracatu Card', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(37, 'Info - Pesquisa de Opinião', 'Informações - Pesquisa de Opinião', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(38, 'Info - Planos de Saúde ', 'Informações - Planos de Saúde - Unimed, bradesco e outros', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(39, 'Info - Programa Empreender', 'Informações - Programa Empreender', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(40, 'Info - Programa Segurança e Medicina', 'Informações - Programa de Segurança e Medicina (PPRA. PCMSO, ASOS, Exames Laboratoriais', 1, 2, 'LILLIAN / POLIANE', 3, 'REJANE'),
(41, 'Info - SPC e SERASA', 'Informações - SPC e SERASA', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(42, 'Info -Certificação Digital', 'Informações - Certificação Digital', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA'),
(43, 'Marcação Consultoria Empresarial', 'Marcação Consultoria Empresarial (Financeira, mercado, plano de negocio e outros)', 3, 2, 'LILLIAN / POLIANE', 14, 'Administrador'),
(44, 'Marcação Consultoria Juridica', 'Marcação Consultoria Juridica', 3, 2, 'LILLIAN / POLIANE', 14, 'Advogado'),
(45, 'Marcação Consultoria SEBRAE', 'Marcação Consultoria SEBRAE', 3, 2, 'LILLIAN / POLIANE', 14, 'Sebrae'),
(46, 'Marcação da Consultoria contábil', 'Marcação Consultoria contabil e  tributaçâo', 3, 2, 'LILLIAN / POLIANE', 14, 'CONTABILIDADE'),
(47, 'Renegociação tributária', 'Renegociação de débitos tributários municipais inscritos em dívida ativa', 2, 2, 'LILLIAN / POLIANE', 14, 'a definir'),
(48, 'Reuniões em Geral', 'Reuniões Gerais', 1, 2, 'LILLIAN / POLIANE', 14, 'TAINARA / WELLIDA');

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
(1, 'Gerência'),
(2, 'Recepção'),
(3, 'Financeiro'),
(4, 'Jurídico '),
(5, 'SPC/Paracatu Card '),
(6, 'Junta Comercial'),
(7, 'Certificado Digital'),
(8, 'Comercial'),
(9, 'Prefeitura Municipal '),
(10, 'Segurança do Trabalho '),
(11, 'Comunicação  '),
(14, 'Sala Empreendedor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finalidade` (`finalidade`);

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
-- AUTO_INCREMENT for table `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD CONSTRAINT `relatorio_ibfk_1` FOREIGN KEY (`finalidade`) REFERENCES `servico` (`codigo`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `servico_ibfk_2` FOREIGN KEY (`setor`) REFERENCES `setor` (`codigo`),
  ADD CONSTRAINT `servico_ibfk_3` FOREIGN KEY (`setor_dois`) REFERENCES `setor` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
