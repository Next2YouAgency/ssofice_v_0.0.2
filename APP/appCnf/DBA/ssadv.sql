-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Abr-2016 às 01:08
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssadv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `cpf_cliente` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `rg_cliente` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email_cliente` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `tipo_cliente` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'Não Definido' COMMENT 'Tipo do cliente',
  `numero_processo` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filtros_sistema`
--

CREATE TABLE `filtros_sistema` (
  `id` int(11) NOT NULL,
  `nome_filtro` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `caminho_filtro` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `filtros_sistema`
--

INSERT INTO `filtros_sistema` (`id`, `nome_filtro`, `caminho_filtro`) VALUES
(1, 'Ativos', 'appCnf/showAll'),
(2, 'Inativos', 'appCnf/showAll'),
(3, 'Atento', ''),
(4, 'Intenso', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas_cadastradas`
--

CREATE TABLE `pessoas_cadastradas` (
  `id` int(11) NOT NULL,
  `tipo_pessoa` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Física ou Jurídica',
  `tratamento_pessoa` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Tratamento: Caso CPF / Caso CNPJ = Nome Fantasia',
  `nome_pessoa` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'CPF: Nome Completo / CNPJ: Razão Social',
  `genero_pessoa` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'Não Informado' COMMENT 'Somente para PF',
  `email_principal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Email principal para contato',
  `cod_reg_cliente` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Código: CNPJ ou CPF com Validação MD5',
  `reg_pessoa_cadastrada` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `pessoas_cadastradas`
--

INSERT INTO `pessoas_cadastradas` (`id`, `tipo_pessoa`, `tratamento_pessoa`, `nome_pessoa`, `genero_pessoa`, `email_principal`, `cod_reg_cliente`, `reg_pessoa_cadastrada`) VALUES
(1, 'cpf', 'Sr', 'Hugo Christian Pereira Gomes', 'masculino', 'hugo.allnet@gmail.com', '93bfa59902e9110ae8ced8d494b5ef62', '34109989850'),
(2, 'cnpj', 'N2Sis AgÃªncia Digital', 'AgÃªncia Next Nerds SoluÃ§Ãµes para Web S.A', 'N/A', 'hugo.allnet@gmail.com', '08d314b4ddb780407d902aa994848ee0', '11111111000100');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_processo`
--

CREATE TABLE `status_processo` (
  `id` int(11) NOT NULL,
  `nome_status` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'Não definido',
  `caminho_status` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `status_processo`
--

INSERT INTO `status_processo` (`id`, `nome_status`, `caminho_status`) VALUES
(1, 'Em Andamento', 'appCnf/status'),
(2, 'Encerrado', 'appCnf/status'),
(3, 'Não definido', 'appCnf/status');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_ativados`
--

CREATE TABLE `usuarios_ativados` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(10) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'cpf ou cnpj',
  `tratamento_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Caso Pessoa Jurídica: Nome Fantasia',
  `nome_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Caso Pessoa Jurídica: Razão Social',
  `genero_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Caso Pessoa Física deverá ser definido o gênero',
  `reg_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'PF: cpf / PJ: cnpj',
  `rg_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Caso PF: ISS',
  `cod_reg_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Código: CNPJ ou CPF com Validação MD5',
  `senha_acesso` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Senha sem validação em MD5',
  `senha_acesso_cliente` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Senha de Acesso do usuário com validação em MD5',
  `oab_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Obrigatório',
  `email_principal_usuario` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Email principal Validado',
  `email_pessoal1` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email_pessoal2` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email_pessoal3` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `telefone_principal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `telefone_pessoal1` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `telefone_pessoal2` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `cep_endereco_principall` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `estado_endereco_principal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `cidade_endereco_principal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `localidade_endereco_principal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `numero_endereco_principal` varchar(10) COLLATE utf8_general_mysql500_ci NOT NULL,
  `bairro_endereco_principal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `complemento_endereco_principal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `cep_endereco_pessoal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `estado_endereco_pessoal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `cidade_endereco_pessoal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `localidade_endereco_pessoal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `numero_endereco_pessoal` varchar(10) COLLATE utf8_general_mysql500_ci NOT NULL,
  `bairro_endereco_pessoal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `complemento_endereco_pessoal` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `usuarios_ativados`
--

INSERT INTO `usuarios_ativados` (`id`, `tipo_usuario`, `tratamento_usuario`, `nome_usuario`, `genero_usuario`, `reg_usuario`, `rg_usuario`, `cod_reg_usuario`, `senha_acesso`, `senha_acesso_cliente`, `oab_usuario`, `email_principal_usuario`, `email_pessoal1`, `email_pessoal2`, `email_pessoal3`, `telefone_principal`, `telefone_pessoal1`, `telefone_pessoal2`, `cep_endereco_principall`, `estado_endereco_principal`, `cidade_endereco_principal`, `localidade_endereco_principal`, `numero_endereco_principal`, `bairro_endereco_principal`, `complemento_endereco_principal`, `cep_endereco_pessoal`, `estado_endereco_pessoal`, `cidade_endereco_pessoal`, `localidade_endereco_pessoal`, `numero_endereco_pessoal`, `bairro_endereco_pessoal`, `complemento_endereco_pessoal`) VALUES
(1, 'cpf', 'Sr', 'Hugo Christian Pereira Gomes', 'masculino', '34109989850', '201602680787', '93bfa59902e9110ae8ced8d494b5ef62', '123456', 'e10adc3949ba59abbe56e057f20f883e', '201602680787', 'hugo.allnet@gmail.com', '', '', '', '11946792419', '', '', '03977380', 'SP', 'SÃ£o Paulo', 'Rua Sargento EdÃ©sio Afonso de Carvalho', '128', 'Mascarenhas de Moraes', 'Casa 02', '', '', '', '', '', '', ''),
(2, 'cnpj', 'N2Sis AgÃªncia Digital', 'AgÃªncia Next Nerds SoluÃ§Ãµes para Web S.A', 'cnpj', '11111111000100', '201602680787', '08d314b4ddb780407d902aa994848ee0', '12345678', '25d55ad283aa400af464c76d713c07ad', '201602680787', 'hugo.allnet@gmail.com', '', '', '', '11946792419', '', '', '03977380', 'SP', 'SÃ£o Paulo', 'Rua Sargento EdÃ©sio Afonso de Carvalho', '128', 'Mascarenhas de Moraes', 'Casa 02', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filtros_sistema`
--
ALTER TABLE `filtros_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoas_cadastradas`
--
ALTER TABLE `pessoas_cadastradas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_processo`
--
ALTER TABLE `status_processo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_ativados`
--
ALTER TABLE `usuarios_ativados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pessoas_cadastradas`
--
ALTER TABLE `pessoas_cadastradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios_ativados`
--
ALTER TABLE `usuarios_ativados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
