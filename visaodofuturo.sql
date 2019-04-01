-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2019 at 02:29 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `visaodofuturo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Anuncio`
--

CREATE TABLE `Anuncio` (
  `id` int(11) NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `requisitos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(11) DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Anuncio`
--

INSERT INTO `Anuncio` (`id`, `descricao`, `requisitos`, `data`, `status`) VALUES
(3, 'A firma Visão de futuro pretende recrutar 20 Agentes de terreno, sendo 15 efetivo e 5 reserva,\r\nPara integrar a sua equipa na ilha de fogo, em regime de Estagiara.\r\n\r\nApós o Estagio, os 20 necessários serão escolhido pelo desempenho durante o estagio. \r\n\r\nAnuncio valido até dia 1 de Abril ate 1 de Maio', 'Disponibilidade Imediata\r\n12 ano de Escolaridade minimo ou equivalente\r\nSer residente da Ilha \r\nDisponível para residir fora da sua Localidade \r\nIdade Compreendida entre 18 - 35 anos \r\nAdicionais \r\nCarta de Condução\r\nConhecimento Informatico\r\nExperiencia Secretariado  ', '2019-03-22', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Area_Especialisacao`
--

CREATE TABLE `Area_Especialisacao` (
  `id` int(11) NOT NULL,
  `icone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Area_Especialisacao`
--

INSERT INTO `Area_Especialisacao` (`id`, `icone`, `titulo`, `descricao`, `status`) VALUES
(1, 'fa fa-check', 'Organização', 'Ajudar os agricultores a ter mais controlo das suas produções, \r\na conservar os seus produtos, produzidos pelos mesmo.', 10),
(2, 'fa fa-thumbs-up', 'Gestão', 'Auxiliar os agricultores na gestão dos lucros, despesas e produção.', 10),
(3, 'fa fa-leaf', 'Comercialização', 'É da responsabilidade da nossa empresa, \r\ncomercializar todos os produtos.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Area_Intervencao`
--

CREATE TABLE `Area_Intervencao` (
  `id` int(11) NOT NULL,
  `icone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Area_Intervencao`
--

INSERT INTO `Area_Intervencao` (`id`, `icone`, `titulo`, `descricao`, `status`) VALUES
(1, 'fa fa-envira', 'Produto', 'Criação de um sistema de articulação de produtos produzidos\r\n na ilha para a sua valorização e termos de preço e qualidade \r\npara maior competitividade no mercado', 10),
(2, 'fa fa-pagelines', 'Emprego & Anúncios ', 'Promoção de auto emprego de forma sustentável e duradouro', 10),
(3, 'fa fa-globe', 'Independência', 'Promover auto independência e enquadramento no sistema \r\nde providência social do país de forma a diminuir a \r\npobreza no seio dos idosos ao longo prazo', 10),
(4, 'fa fa-pagelines', 'Investimentos', 'Execuções de ações práticas para uma melhor educação \r\ndo mundo rural, e para uma melhor eficácia em\r\n relação a retorno nos Investimentos', 10),
(5, 'fa fa-globe', 'Mercado', 'criação de um mercado de escoamento sustentável \r\npara servir a ilha nas suas produções e consumo', 10),
(6, 'fa fa-pagelines', 'Sistema & FFAP', 'Criar um sistema prático e simples para que todos possam envolver \r\nde uma forma directa ou indirecta no desenvolvimento da ilha do \r\nFogo e criação do FFAP (Fundo Financiamento Agricola e Pecuária)', 10);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Gestor', '61', 1549143607);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrador', 1, NULL, NULL, NULL, 1544756794, 1544756794),
('createPost', 2, 'Create a post', NULL, NULL, 1544756794, 1544756794),
('deletePost', 2, 'Delete post', NULL, NULL, 1544756794, 1544756794),
('Fiel_Armazen', 1, NULL, NULL, NULL, 1544756794, 1544756794),
('Gestor', 1, NULL, NULL, NULL, 1544756794, 1544756794),
('Operador', 1, NULL, NULL, NULL, 1544756794, 1544756794),
('updatePost', 2, 'Update post', NULL, NULL, 1544756794, 1544756794),
('viewPost', 2, 'View post', NULL, NULL, 1544756794, 1544756794);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Operador', 'createPost'),
('administrador', 'deletePost'),
('Gestor', 'Fiel_Armazen'),
('administrador', 'Gestor'),
('Fiel_Armazen', 'Operador'),
('Fiel_Armazen', 'updatePost'),
('Operador', 'viewPost');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `message` text,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_regiao` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bi` int(11) NOT NULL,
  `nif` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`id`, `id_utilizador`, `id_regiao`, `nome`, `sobrenome`, `estado_civil`, `sexo`, `data_nascimento`, `contacto`, `email`, `bi`, `nif`, `status`) VALUES
(1, 62, 1, 'Anilton', 'Miranda', 'Solteiro', 'Masculino', '2019-3-4', 9706153, 'anilton@gmail.com', 232323, 32323232, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Codigo_Producao`
--

CREATE TABLE `Codigo_Producao` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Codigo_Producao`
--

INSERT INTO `Codigo_Producao` (`id`, `codigo`) VALUES
(3, '#Abobura'),
(12, '#Batata'),
(9, '#Cove'),
(6, '#Feijao'),
(14, '#Leite'),
(7, '#Melancia'),
(5, '#Milho'),
(15, '#Ovo'),
(2, '#Pimentao'),
(13, '#Pipino'),
(10, '#Repolho'),
(8, '#Sebola'),
(11, '#Senora'),
(1, '#Tomate'),
(4, '#Uva');

-- --------------------------------------------------------

--
-- Table structure for table `Compra`
--

CREATE TABLE `Compra` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_producao` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_total` int(11) NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_gado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Compra`
--

INSERT INTO `Compra` (`id`, `id_utilizador`, `id_producao`, `quantidade`, `preco_total`, `data`, `estado`, `id_gado`) VALUES
(28, 28, 7, 900, 200000, '2018-12-28', 'Em Analise', NULL),
(29, 28, 8, 1100, 240000, '2018-12-28', 'Em Analise', NULL),
(30, 28, 9, 1900, 1000000, '2018-12-28', 'Em Analise', NULL),
(31, 30, 10, 2400, 1200000, '2018-12-29', 'Em Analise', NULL),
(32, 28, 11, 967, 483500, '2018-12-29', 'Em Analise', NULL),
(33, 28, 12, 900, 180000, '2018-12-29', 'Em Analise', NULL),
(34, 28, 13, 900, 180000, '2018-12-29', 'Em Analise', NULL),
(35, 28, 14, 50, 5000, '2019-01-12', 'Em Analise', NULL),
(36, 28, 17, 900, 180000, '2019-01-12', 'Em Analise', NULL),
(37, 28, 18, 1900, 380000, '2019-01-12', 'Em Analise', NULL),
(38, 28, 19, 1900, 950000, '2019-01-12', 'Em Analise', NULL),
(40, 28, NULL, 1, 110, '2019-01-13', 'Em Analise', 1),
(41, 28, NULL, 4, 600000, '2019-01-13', 'Em Analise', 1),
(42, 28, NULL, 5, 600000, '2019-01-13', 'Em Analise', 2),
(43, 28, NULL, 1, 110, '2019-01-13', 'Em Analise', 2),
(44, 28, NULL, 2, 200000, '2019-01-13', 'Em Analise', 3),
(45, 28, 20, 460, 9200, '2019-01-13', 'Em Analise', NULL),
(46, 28, 21, 467, 9340, '2019-01-13', 'Em Analise', NULL),
(47, 28, 23, 900, 180000, '2019-01-13', 'Em Analise', NULL),
(48, 28, 22, 900, 18000, '2019-01-13', 'Em Analise', NULL),
(49, 28, 23, 900, 180000, '2019-01-13', 'Em Analise', NULL),
(50, 28, 24, 900, 180000, '2019-01-22', 'Em Analise', NULL),
(51, 28, 25, 900, 180000, '2019-03-03', 'Em Analise', NULL),
(52, 28, 28, 900, 180000, '2019-03-19', 'Em Analise', NULL),
(53, 30, 26, 900, 180000, '2019-03-22', 'Em Analise', NULL),
(54, 30, 29, 900, 180000, '2019-03-22', 'Em Analise', NULL),
(55, 28, NULL, 10, 1000000, '2019-03-23', 'Em Analise', 5),
(56, 28, 27, 1000, 100000, '2019-03-24', 'Em Analise', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `menssage` varchar(255) NOT NULL,
  `contexto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Cultivo`
--

CREATE TABLE `Cultivo` (
  `id` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_regiao` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tamanho_do_solu` int(11) NOT NULL,
  `nome_do_planteio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_do_planteio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tempo_do_cultivo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_registro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cultivo`
--

INSERT INTO `Cultivo` (`id`, `id_fornecedor`, `id_regiao`, `descricao`, `tamanho_do_solu`, `nome_do_planteio`, `data_do_planteio`, `tempo_do_cultivo`, `data_registro`, `photo`, `status`, `estra`) VALUES
(13, 14, 2, 'savana', 200, 'tomate', '01/01/2019', 'Inverno', '2018-12-21', '../../img/cultivo/cjba9SAPhI4k4E_KTP8Rt8LStWcA0R9D.jpg', 10, '../../img/cultivo/cjba9SAPhI4k4E_KTP8Rt8LStWcA0R9D.jpg'),
(14, 14, 2, 'canarias', 200, 'pimento', '12/03/2018', 'Inverno', '2018-12-21', '../../img/cultivo/1i_F32Pe3cw1ZfZAf5PteZ1k2POs9P0P.jpg', 10, '../../img/cultivo/1i_F32Pe3cw1ZfZAf5PteZ1k2POs9P0P.jpg'),
(15, 15, 2, 'piqueno', 200, 'Abobura', '12/30/2018', 'Inverno', '2018-12-21', '../../img/cultivo/fUXu-JRenY4uCGk1RJlFqBg5xQmHvANp.jpg', 10, '../../img/cultivo/fUXu-JRenY4uCGk1RJlFqBg5xQmHvANp.jpg'),
(16, 16, 2, 'flor', 200, 'couve', '11/25/2018', 'Inverno', '2018-12-30', '../../img/cultivo/6cieHrLxGjUo6PcLQa3l2yQ53yr4m772.jpg', 10, '../../img/cultivo/6cieHrLxGjUo6PcLQa3l2yQ53yr4m772.jpg'),
(17, 14, 1, '-------', 878, 'cebola', '12/30/2018', 'Inverno', '2019-01-04', '../../img/cultivo/r80g00KKp_XWetoZEZZhgGEJAMY_-Vh1.jpg', 10, '../../img/cultivo/r80g00KKp_XWetoZEZZhgGEJAMY_-Vh1.jpg'),
(18, 14, 1, 'couve', 878, 'couve', '02/06/1', 'Inverno', '2019-01-05', '../../img/cultivo/PhdKdpqHuAcTeRBguw6iTW5M5hU5_0Ak.jpg', 10, '../../img/cultivo/PhdKdpqHuAcTeRBguw6iTW5M5hU5_0Ak.jpg'),
(19, 14, 2, 'piqueno', 878, 'Abobura', '02/06/1', 'Primavera', '2019-01-05', '../../img/cultivo/M5ysTJMKuq3UL-UWL-ZMOJ3J9Fhzwums.jpg', 10, '../../img/cultivo/M5ysTJMKuq3UL-UWL-ZMOJ3J9Fhzwums.jpg'),
(20, 14, 1, 'savana', 878, 'tomate', '01/01/2019', 'Inverno', '2019-01-08', '../../img/cultivo/qLlvA030tlmtXfomoMm2Kuz9Q1xGPGn0.jpg', 10, '../../img/cultivo/qLlvA030tlmtXfomoMm2Kuz9Q1xGPGn0.jpg'),
(21, 14, 3, 'savana', 200, 'tomate', '03/11/2019', 'Inverno', '2019-03-21', '../../img/cultivo/pJ_Kt4gzKQRvJsaAQww8_l0lsjCxg1x5.jpg', 10, '../../img/cultivo/pJ_Kt4gzKQRvJsaAQww8_l0lsjCxg1x5.jpg'),
(22, 14, 5, 'savana', 200, 'tomate', '02/06/1', 'Inverno', '2019-03-31', '../../img/cultivo/8UNXKoFi_RUgOLXet5dXsxjz0NvHSrUn.jpg', 10, '../../img/cultivo/8UNXKoFi_RUgOLXet5dXsxjz0NvHSrUn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Emprestimo`
--

CREATE TABLE `Emprestimo` (
  `id` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `tipo` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade` int(11) NOT NULL DEFAULT '1',
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_devolucao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade_monetario` int(11) NOT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Debito',
  `status` smallint(6) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Emprestimo`
--

INSERT INTO `Emprestimo` (`id`, `id_fornecedor`, `id_utilizador`, `tipo`, `nome`, `quantidade`, `data`, `data_devolucao`, `quantidade_monetario`, `estado`, `status`) VALUES
(4, 14, 28, 'Produto', 'Adobo', 2, '2018-12-22', '2019-01-01', 20000, 'Pago', 10),
(5, 14, 28, 'Produto', 'Ramede', 2, '2018-12-22', '2019-01-01', 2000, 'Debito', 10),
(8, 14, 28, 'Equipamento', 'Enxada', 1, '2018-12-22', '2019-01-01', 2000, 'Debito', 10),
(9, 14, 28, 'Equipamento', NULL, 2, '2018-12-22', '12/30/2018', 20000, 'Debito', 10),
(10, 14, 28, 'Equipamento', NULL, 2, '2018-12-22', '12/30/2018', 20000, 'Debito', 10),
(11, 14, 28, 'Equipamento', 'Adobo', 2, '2018-12-22', '01/06/2019', 2000, 'Debito', 10),
(12, 14, 28, 'Equipamento', NULL, 2, '2018-12-24', '01/01/2019', 20000, 'Pago', 10),
(13, 14, 28, 'Equipamento', 'Enxada', 2, '2018-12-25', '01/01/2019', 2000, 'Debito', 10),
(14, 14, 28, 'Medicamentos', 'Dexix', 2, '2019-01-31', '2019-1-31', 2000, 'Debito', 10),
(15, 15, 28, 'Equipamentos', 'Enxada', 2, '2019-03-24', '2019-3-10', 2000, 'Debito', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Equipa`
--

CREATE TABLE `Equipa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tweter` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Equipa`
--

INSERT INTO `Equipa` (`id`, `nome`, `sobrenome`, `tipo`, `photo`, `estra`, `facebook`, `tweter`, `google`, `status`) VALUES
(1, 'Antonio', 'Fernandes', 'Presidente Concelho Administração ', '../../img/equipa/Xn6sf6vIoNXrJhHCx1gqRbYwI7TO9S1Q.jpg', '../../img/equipa/Xn6sf6vIoNXrJhHCx1gqRbYwI7TO9S1Q.jpg', 'https://web.facebook.com/profile.php?id=100002373275902', '', '', 10),
(2, 'Niva ', 'Miranda', 'Vice Presidente Concelho Administração ', '../../img/equipa/NmgURLbqmI6DJZvi4UG6NkUu8Ic5JcMB.jpg', '../../img/equipa/NmgURLbqmI6DJZvi4UG6NkUu8Ic5JcMB.jpg', '', '', '', 10),
(3, 'Anilton', 'Miranda', 'Presidente Concelho Directivo', '../../img/equipa/x1wvDQHqIZXSYECeWjmaNvEd-shFR_pL.png', '../../img/equipa/x1wvDQHqIZXSYECeWjmaNvEd-shFR_pL.png', 'https://web.facebook.com/aniltonva', '', '', 10),
(4, 'Eliseu ', 'Barbosa Brito', 'Concelho Fiscalização ', '../../img/equipa/sIRfekyOdrD9V_AnFSNb-kafZmzsj6pl.jpg', '../../img/equipa/sIRfekyOdrD9V_AnFSNb-kafZmzsj6pl.jpg', '', '', '', 10),
(5, 'Hélida', 'Pires', 'Vice Presidente Concelho Directivo ', '../../img/equipa/MUUPYMBMVg2IMmHhQT0wJWa4sKJ-IbzZ.jpg', '../../img/equipa/MUUPYMBMVg2IMmHhQT0wJWa4sKJ-IbzZ.jpg', 'https://web.facebook.com/helida.pires.92', '', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Estado`
--

CREATE TABLE `Estado` (
  `id` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `data_hr_inicio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_hr_fim` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `despositivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Estado`
--

INSERT INTO `Estado` (`id`, `user_iduser`, `data_hr_inicio`, `data_hr_fim`, `data`, `despositivo`) VALUES
(12, 28, '2018-11-29 02:32:09', '2018-11-29 02:32:50', '2018-11-29', NULL),
(13, 28, '2018-11-29 02:55:31', '2018-11-29 03:03:38', '2018-11-29', NULL),
(14, 28, '2018-11-29 17:32:40', NULL, '2018-11-29', NULL),
(15, 27, '2018-11-29 23:45:22', '2018-11-30 06:48:53', '2018-11-29', NULL),
(16, 27, '2018-11-30 06:49:02', '2018-11-30 13:09:45', '2018-11-30', NULL),
(17, 28, '2018-11-30 13:09:56', '2018-11-30 23:57:21', '2018-11-30', NULL),
(18, 28, '2018-11-30 23:57:44', '2018-12-02 00:43:25', '2018-11-30', NULL),
(19, 28, '2018-12-02 00:43:36', '2018-12-02 01:04:57', '2018-12-02', NULL),
(20, 28, '2018-12-02 01:05:13', NULL, '2018-12-02', NULL),
(21, 28, '2018-12-03 15:46:48', '2018-12-03 15:47:19', '2018-12-03', NULL),
(22, 28, '2018-12-03 15:47:35', NULL, '2018-12-03', NULL),
(23, 28, '2018-12-03 16:06:50', '2018-12-03 16:07:09', '2018-12-03', NULL),
(24, 28, '2018-12-03 16:07:20', '2018-12-03 16:12:40', '2018-12-03', NULL),
(25, 28, '2018-12-03 16:16:25', NULL, '2018-12-03', NULL),
(26, 28, '2018-12-03 20:47:48', NULL, '2018-12-03', NULL),
(27, 28, '2018-12-03 21:51:08', '2018-12-04 16:32:19', '2018-12-03', NULL),
(28, 28, '2018-12-04 16:32:39', NULL, '2018-12-04', NULL),
(29, 28, '2018-12-04 17:23:50', '2018-12-04 22:18:59', '2018-12-04', NULL),
(30, 28, '2018-12-04 22:45:43', '2018-12-04 22:48:02', '2018-12-04', NULL),
(31, 28, '2018-12-04 22:54:34', '2018-12-04 23:01:33', '2018-12-04', NULL),
(32, 28, '2018-12-04 23:19:56', NULL, '2018-12-04', NULL),
(33, 28, '2018-12-04 23:27:40', '2018-12-04 23:32:24', '2018-12-04', NULL),
(34, 30, '2018-12-04 23:32:35', '2018-12-04 23:35:14', '2018-12-04', NULL),
(35, 32, '2018-12-04 23:35:27', '2018-12-04 23:38:46', '2018-12-04', NULL),
(36, 32, '2018-12-04 23:38:58', '2018-12-04 23:39:06', '2018-12-04', NULL),
(37, 28, '2018-12-04 23:39:16', '2018-12-04 23:39:43', '2018-12-04', NULL),
(38, 30, '2018-12-04 23:39:52', '2018-12-04 23:43:56', '2018-12-04', NULL),
(39, 28, '2018-12-04 23:44:05', NULL, '2018-12-04', NULL),
(40, 28, '2018-12-05 00:51:46', '2018-12-05 02:53:44', '2018-12-05', NULL),
(41, 28, '2018-12-05 02:53:53', '2018-12-05 05:02:26', '2018-12-05', NULL),
(42, 30, '2018-12-05 05:02:43', '2018-12-05 15:30:08', '2018-12-05', NULL),
(43, 28, '2018-12-05 15:30:19', '2018-12-05 15:34:50', '2018-12-05', NULL),
(44, 30, '2018-12-05 15:35:00', '2018-12-05 15:51:41', '2018-12-05', NULL),
(45, 28, '2018-12-05 15:51:58', '2018-12-05 16:08:39', '2018-12-05', NULL),
(46, 28, '2018-12-05 16:32:03', '2018-12-05 16:32:08', '2018-12-05', NULL),
(47, 28, '2018-12-05 16:37:21', '2018-12-05 16:37:29', '2018-12-05', NULL),
(48, 28, '2018-12-05 16:39:46', '2018-12-05 16:39:57', '2018-12-05', NULL),
(49, 28, '2018-12-05 17:07:04', '2018-12-06 03:15:11', '2018-12-05', NULL),
(50, 28, '2018-12-06 03:24:11', NULL, '2018-12-06', NULL),
(51, 28, '2018-12-06 03:26:48', '2018-12-09 01:29:18', '2018-12-06', NULL),
(52, 30, '2018-12-09 01:36:53', '2018-12-09 01:39:52', '2018-12-09', NULL),
(53, 30, '2018-12-09 01:42:10', '2018-12-09 02:23:26', '2018-12-09', NULL),
(54, 28, '2018-12-09 19:54:03', '2018-12-09 19:55:14', '2018-12-09', NULL),
(55, 28, '2018-12-09 19:58:15', '2018-12-10 12:43:48', '2018-12-09', NULL),
(56, 28, '2018-12-10 12:44:38', '2018-12-10 14:22:00', '2018-12-10', NULL),
(57, 28, '2018-12-10 14:22:10', '2018-12-11 01:19:25', '2018-12-10', NULL),
(58, 30, '2018-12-11 01:23:48', '2019-03-28 23:12:11', '2018-12-11', NULL),
(59, 28, '2018-12-11 01:26:34', '2018-12-12 22:28:20', '2018-12-11', NULL),
(60, 28, '2018-12-12 22:30:38', '2018-12-14 21:25:33', '2018-12-12', NULL),
(61, 28, '2018-12-15 00:32:32', '2018-12-15 01:44:29', '2018-12-15', NULL),
(62, 28, '2018-12-15 01:44:48', '2018-12-15 22:47:56', '2018-12-15', NULL),
(63, 32, '2018-12-15 22:48:10', '2018-12-16 01:06:57', '2018-12-15', NULL),
(64, 28, '2018-12-16 01:07:08', '2018-12-18 14:10:45', '2018-12-16', NULL),
(65, 28, '2018-12-18 14:16:49', NULL, '2018-12-18', NULL),
(66, 28, '2018-12-18 14:16:52', NULL, '2018-12-18', NULL),
(67, 28, '2018-12-18 14:16:54', '2018-12-19 16:42:51', '2018-12-18', NULL),
(68, 31, '2018-12-19 16:43:04', '2019-03-21 21:26:34', '2018-12-19', NULL),
(69, 28, '2018-12-19 20:46:31', '2018-12-20 02:43:09', '2018-12-19', NULL),
(70, 28, '2018-12-20 03:22:05', '2018-12-20 03:22:11', '2018-12-20', NULL),
(71, 28, '2018-12-20 03:39:41', '2018-12-20 04:12:25', '2018-12-20', NULL),
(72, 28, '2018-12-20 04:52:50', '2018-12-20 15:03:47', '2018-12-20', NULL),
(73, 28, '2018-12-20 15:03:58', '2018-12-20 17:29:26', '2018-12-20', NULL),
(74, 28, '2018-12-21 18:21:06', '2019-04-01 14:13:04', '2018-12-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Fatura`
--

CREATE TABLE `Fatura` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `numero_fatura` int(11) NOT NULL,
  `total_venda` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `data_registo` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Fatura`
--

INSERT INTO `Fatura` (`id`, `id_cliente`, `id_utilizador`, `numero_fatura`, `total_venda`, `status`, `data_registo`) VALUES
(1, 1, 62, 1, 10000, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `Fornecedor`
--

CREATE TABLE `Fornecedor` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_regiao` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto` int(11) NOT NULL,
  `numero_agregado` int(11) NOT NULL,
  `grau_parentesco` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NIF` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BI` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_registo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Fornecedor`
--

INSERT INTO `Fornecedor` (`id`, `id_utilizador`, `id_regiao`, `nome`, `sobrenome`, `estado_civil`, `sexo`, `data_nascimento`, `endereco`, `contacto`, `numero_agregado`, `grau_parentesco`, `tipo`, `status`, `photo`, `NIF`, `BI`, `data_registo`, `estra`, `user_iduser`) VALUES
(14, 28, 1, 'Fernando', 'Pereira', 'Solteiro', 'Masculino', '01/01/2019', 'Moia Moia', 9928341, 7, 'pai', 'Agricultor-Pastor', 10, '../../img/user/eiF4-rUlr5hO6p9kqPqXqDErVw-UhB3H.jpg', '1234567890', '123456', '2018-12-21', '../../img/user/eiF4-rUlr5hO6p9kqPqXqDErVw-UhB3H.jpg', 56),
(15, 28, 2, 'Simon', 'Barros', 'Casado', 'Masculino', '12/31/2018', 'Achada Lama', 9928341, 3, 'pai', 'Agricultor-Pastor', 10, '../../img/fornecedor/TZ4gqVci6HTRswtqdq2Ebz_sawaV7xfY.jpg', '0987654321', '12354', '2018-12-21', '../../img/fornecedor/TZ4gqVci6HTRswtqdq2Ebz_sawaV7xfY.jpg', 57),
(16, 28, 1, 'Calu', 'Miranda', 'Solteiro', 'Masculino', '1988-12-4', 'Achada Lama', 9928341, 3, 'pai', 'Agricultor-Pastor', 10, '../../img/user/74kw0_wIFq9HUIAles-ejb2FcyBZaFt9.jpg', '212212121', '123432', '2018-12-25', '../../img/user/74kw0_wIFq9HUIAles-ejb2FcyBZaFt9.jpg', 58),
(17, 28, 1, 'Luiz', 'Barros', 'Solteiro', 'Masculino', '1980-4-1', 'Achada Lama', 9928341, 7, 'pai', 'Pastor', 10, '../../img/user/sdpFKoj-IzRGjp_V9HihSerboCgbDuVH.jpg', '12345678909', '1212210', '2019-01-05', '../../img/user/sdpFKoj-IzRGjp_V9HihSerboCgbDuVH.jpg', 60);

-- --------------------------------------------------------

--
-- Table structure for table `Gado`
--

CREATE TABLE `Gado` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_registo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_regiao` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Gado`
--

INSERT INTO `Gado` (`id`, `nome`, `descricao`, `quantidade`, `data_registo`, `id_fornecedor`, `id_regiao`, `photo`, `status`, `estra`, `estado`) VALUES
(1, 'Vacas', 'terra', 20, '2018-12-29', 15, 1, '../../img/gado/UCRTwQBFocWLwwNdhv0jK3wq2sDv9Dqb.jpg', 0, NULL, 'Comprado'),
(2, 'Vacas', 'Posto', 0, '2018-12-30', 16, 2, '../../img/gado/M1mxugbRj7KH3u2ajDkzklhMsvzKrg1y.jpg', 0, NULL, 'Comprado'),
(3, 'Vacas', 'Posto', 9, '2019-01-02', 14, 1, '../../img/gado/yG7stqTCwjPgv4_NLKhytOx3q38ZmfkW.jpg', 10, '../../img/gado/yG7stqTCwjPgv4_NLKhytOx3q38ZmfkW.jpg', 'Comprado'),
(4, 'Galinha', 'Navi', 498, '2019-01-13', 15, 1, '../../img/gado/gado.jpg', 10, NULL, NULL),
(5, 'Cabras', 'terra', 20, '2019-01-13', 15, 1, '../../img/gado/gado.jpg', 10, NULL, 'Comprado'),
(6, 'Galinha', 'Navi', 1000, '2019-01-13', 14, 1, '../../img/gado/gado.jpg', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Galeria`
--

CREATE TABLE `Galeria` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Galeria`
--

INSERT INTO `Galeria` (`id`, `photo`, `estra`, `descricao`, `status`) VALUES
(1, '../../img/galeria/hNLLJoTK-MDj4N6j-dYrFJfwnawKgpuK.jpg', '../../img/galeria/hNLLJoTK-MDj4N6j-dYrFJfwnawKgpuK.jpg', 'Esta e a familia da (o) Fernando que e constituido por 7 agregado familiar, onde Fernando e o (a) pai da familia.', 10),
(2, '../../img/galeria/j_T7MDWadN7ImqEvFs-A-H-MuW9hxdJr.jpg', '../../img/galeria/j_T7MDWadN7ImqEvFs-A-H-MuW9hxdJr.jpg', '', 0),
(3, '../../img/galeria/uKg-F9uEpV2NqXJq9pdJewfERkw3N_I-.jpg', '../../img/galeria/uKg-F9uEpV2NqXJq9pdJewfERkw3N_I-.jpg', '', 10),
(4, '../../img/galeria/oB-dH04lyfPAsm4BzPzAPx8XJyJKFNuH.jpg', '../../img/galeria/oB-dH04lyfPAsm4BzPzAPx8XJyJKFNuH.jpg', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `historial_gado`
--

CREATE TABLE `historial_gado` (
  `id` int(11) NOT NULL,
  `id_gado` int(11) NOT NULL,
  `obs` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(100) NOT NULL,
  `data` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `historial_gado`
--

INSERT INTO `historial_gado` (`id`, `id_gado`, `obs`, `quantidade`, `data`) VALUES
(1, 5, 'reproduziu ', 2, '23/03/19 19:48:12'),
(2, 5, 'reproduziu', 3, '23/03/19 19:55:28'),
(3, 5, 'reproduziu', 3, '23/03/19 19:55:45'),
(4, 5, 'produziu', 3, '23/03/19 19:56:04'),
(5, 4, 'moreu', 2, '23/03/19 19:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `Informacao_Contacto`
--

CREATE TABLE `Informacao_Contacto` (
  `id` int(11) NOT NULL,
  `telefone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localisacao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_funcionamento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Informacao_Contacto`
--

INSERT INTO `Informacao_Contacto` (`id`, `telefone`, `email`, `localisacao`, `hora_funcionamento`, `status`) VALUES
(1, '9993876', 'visaodofuturocv@gmail.com', 'Rua do Mercado, São Filipe, Cabo Verde', 'Segunda - Sábado : 8:00 am para 12:00 pm 13:00 pm para 16:00 pm', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Inscricao`
--

CREATE TABLE `Inscricao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `morada` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `escolaridade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BI` int(11) NOT NULL,
  `NIF` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(11) DEFAULT '10',
  `id_anuncio` int(11) NOT NULL,
  `data_inscrito` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Inscricao`
--

INSERT INTO `Inscricao` (`id`, `nome`, `morada`, `sexo`, `data_nascimento`, `escolaridade`, `BI`, `NIF`, `telefone`, `email`, `status`, `id_anuncio`, `data_inscrito`) VALUES
(6, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:35:28'),
(7, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:36:53'),
(8, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:36:56'),
(9, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:37:51'),
(10, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:37:55'),
(11, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:38:20'),
(12, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:38:37'),
(13, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:38:39'),
(14, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:39:11'),
(15, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:39:37'),
(16, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:40:09'),
(17, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:40:30'),
(18, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:41:22'),
(19, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:41:44'),
(20, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:42:04'),
(21, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:42:09'),
(22, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:42:39'),
(23, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:44:27'),
(24, 'Anilton Miranda', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:45:12'),
(25, 'Anilton Miranda Moniz', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:45:27'),
(26, 'Anilton Miranda Moniz', 'Palmarejo', 'Masculino', '1995-6-1', '12', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 17:48:03'),
(27, 'Yasmine Freira', 'Palmarejo', 'Feminino', '1995-4-19', 'Superior', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '23/03/19 21:29:06'),
(28, 'Yasmine Freira', 'Palmarejo', 'Feminino', '1995-4-19', 'Superior', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '24/03/19 22:30:38'),
(29, 'Yasmine Freira', 'Palmarejo', 'Feminino', '1995-4-19', 'Superior', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '24/03/19 23:56:29'),
(30, 'Anilton Mira', 'Palmarejo', 'Masculino', '1995-6-1', 'Superior', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '24/03/19 23:57:16'),
(31, 'Anilton Mira', 'Palmarejo', 'Masculino', '1995-6-1', 'Superior', 545676, 987987988, 9706153, 'va@gmail.com', 10, 3, '24/03/19 23:57:44'),
(32, 'Antonio Fernendes', 'Fogo', 'Masculino', '2019-3-12', 'Superior', 545676, 987987988, 9706153, 'antonio@gmail.com', 10, 3, '25/03/19 13:20:27'),
(33, 'Helida Pires', 'Santiago', 'Feminino', '2019-4-3', 'Superior', 6998988, 897987, 76877887, 'helida@gmail.com', 10, 3, '25/03/19 15:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `Intervensao_Social`
--

CREATE TABLE `Intervensao_Social` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Intervensao_Social`
--

INSERT INTO `Intervensao_Social` (`id`, `photo`, `nome`, `descricao`, `status`, `estra`) VALUES
(2, '../../img/intervencao/3zXVddYQS_4dixy492_slZqR0EZviL_n.jpg', 'Simao Lopes De Barros', 'Esta e a familia da (o) Fernando que e constituido por 7 \r\nagregado familiar, onde Fernando e o (a) pai da familia.', 10, '../../img/intervencao/3zXVddYQS_4dixy492_slZqR0EZviL_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_parceiro` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iva` int(11) DEFAULT NULL,
  `unidade_caixa` int(11) DEFAULT NULL,
  `unidade_caixa_iva` int(11) DEFAULT NULL,
  `preco_caixa_iva` int(11) DEFAULT NULL,
  `preco_item` int(11) NOT NULL,
  `data_registrado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`id`, `id_utilizador`, `id_parceiro`, `codigo`, `nome`, `iva`, `unidade_caixa`, `unidade_caixa_iva`, `preco_caixa_iva`, `preco_item`, `data_registrado`, `status`) VALUES
(1, 62, 1, '111111', 'Arroz', NULL, 2000, NULL, NULL, 2000, '2019-03-29', 10),
(2, 62, 1, '111112', 'Milho', NULL, 2000, NULL, NULL, 2000, '2019-03-29', 10),
(3, 62, 2, '111113', 'Arroz', NULL, 2000, NULL, NULL, 2000, '2019-03-31', 10);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1541722677),
('m130524_201442_init', 1541722684),
('m140506_102106_rbac_init', 1544754385),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1544754385);

-- --------------------------------------------------------

--
-- Table structure for table `Parceiro`
--

CREATE TABLE `Parceiro` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nif` int(11) NOT NULL,
  `data_registro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(11) NOT NULL DEFAULT '10',
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Parceiro`
--

INSERT INTO `Parceiro` (`id`, `id_utilizador`, `nome`, `endereco`, `nif`, `data_registro`, `status`, `photo`, `estra`, `email`, `contacto`) VALUES
(1, 62, 'Mimosa', 'Praia', 121212212, '2019-03-29', 10, '../../img/parceiro_loja_online/xWBoN4KK1wfgzpd9o4xkWQ7CtL8yUBS6.png', '../../img/parceiro_loja_online/xWBoN4KK1wfgzpd9o4xkWQ7CtL8yUBS6.png', NULL, NULL),
(2, 62, 'Montanhês', 'Sao Domingos', 121221212, '2019-03-29', 10, '../../img/parceiro_loja_online/17mo1SFXi8j4QTIcvFfoZTCk-TQo_41i.png', '../../img/parceiro_loja_online/17mo1SFXi8j4QTIcvFfoZTCk-TQo_41i.png', NULL, NULL),
(3, 62, 'Upranimal', 'Sao Domingos', 2147483647, '2019-04-01', 10, '../../img/parceiro_loja_online/S5s7SqEatQyjcKsJgO9TsAqsD9NvteW3.jpeg', '../../img/parceiro_loja_online/S5s7SqEatQyjcKsJgO9TsAqsD9NvteW3.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Producao`
--

CREATE TABLE `Producao` (
  `id` int(11) NOT NULL,
  `id_cultivo` int(11) DEFAULT NULL,
  `id_gado` int(11) DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade_producao` int(11) NOT NULL,
  `quantidade_perda` int(11) NOT NULL,
  `data_colheita` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `preco_kilo` int(11) NOT NULL,
  `data_registo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `codigo_producao_id` int(11) DEFAULT NULL,
  `designacao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Producao`
--

INSERT INTO `Producao` (`id`, `id_cultivo`, `id_gado`, `tipo`, `quantidade_producao`, `quantidade_perda`, `data_colheita`, `preco_kilo`, `data_registo`, `photo`, `estado`, `estra`, `status`, `codigo_producao_id`, `designacao`) VALUES
(7, 13, NULL, 'Agricula', 1000, 100, '12/01/2018', 200, '2018-12-28', '../../img/producao/xdU6H5MDlkY-mF0olK8oowkNY3abQCyF.jpg', 'Comprado', '../../img/producao/xdU6H5MDlkY-mF0olK8oowkNY3abQCyF.jpg', 10, 1, NULL),
(8, 13, NULL, 'Agricula', 1200, 100, '12/04/2018', 200, '2018-12-28', '../../img/producao/9NfUQDIqj5HDmlvmCFvZJBIVOygRrmuk.jpg', 'Comprado', '../../img/producao/9NfUQDIqj5HDmlvmCFvZJBIVOygRrmuk.jpg', 10, 1, NULL),
(9, 14, NULL, 'Agricula', 2000, 100, '12/01/2018', 500, '2018-12-28', '../../img/producao/OEh0q8XdhsYUSAFdml5njIGgiwi7Rvdi.jpg', 'Comprado', '../../img/producao/OEh0q8XdhsYUSAFdml5njIGgiwi7Rvdi.jpg', 10, 2, NULL),
(10, 14, NULL, 'Agricula', 2500, 100, '12/07/2018', 500, '2018-12-28', '../../img/producao/JxlKUROdUR9K0hoXsb9mbBWJc_LX6H6p.jpg', 'Comprado', '../../img/producao/JxlKUROdUR9K0hoXsb9mbBWJc_LX6H6p.jpg', 10, 2, NULL),
(11, 14, NULL, 'Agricula', 1000, 33, '12/13/2018', 500, '2018-12-29', '../../img/producao/UajbYBPMHT8m-guO2ksk8PZWeAbIg-iM.jpg', 'Comprado', '../../img/producao/UajbYBPMHT8m-guO2ksk8PZWeAbIg-iM.jpg', 10, 2, NULL),
(12, 14, NULL, 'Agricula', 1000, 100, '12/17/2018', 200, '2018-12-29', '../../img/producao/i70y2qtGwmppyHFQkcPcN1gLc2Wfao1u.jpg', 'Comprado', '../../img/producao/i70y2qtGwmppyHFQkcPcN1gLc2Wfao1u.jpg', 10, 2, NULL),
(13, 13, NULL, 'Agricula', 1000, 100, '12/27/2018', 200, '2018-12-29', '../../img/producao/yuwnxcgtLMFmvT5_ykWJ3Xs7wlAWzWB2.jpg', 'Comprado', '../../img/producao/yuwnxcgtLMFmvT5_ykWJ3Xs7wlAWzWB2.jpg', 10, 1, NULL),
(14, NULL, 1, 'Picuaria', 50, 0, '11/28/2018', 100, '2018-12-29', '../../img/producao/1OKXI2re44uc7u11-715c0YqCU0bkRqu.jpg', 'Comprado', '../../img/producao/1OKXI2re44uc7u11-715c0YqCU0bkRqu.jpg', 10, 14, 'leite'),
(17, 13, NULL, 'Agricula', 1000, 100, '12/31/2018', 200, '2019-01-12', '../../img/producao/ygT_rrERN5zDqOnwFnJsJgHeXMdy34HD.jpg', 'Comprado', '../../img/producao/ygT_rrERN5zDqOnwFnJsJgHeXMdy34HD.jpg', 10, 1, 'tomate'),
(18, 15, NULL, 'Agricula', 2000, 100, '12/31/2018', 200, '2019-01-12', '../../img/producao/k0-cQYee3N-NIXXg-bJ_zL7a0ysQ8gGk.jpg', 'Comprado', '../../img/producao/k0-cQYee3N-NIXXg-bJ_zL7a0ysQ8gGk.jpg', 10, 3, 'abobura'),
(19, 15, NULL, 'Agricula', 2000, 100, '01/05/2019', 500, '2019-01-12', '../../img/producao/2aPK7m4ibHtvrdjnHSP48pGezZEIsk3n.jpg', 'Comprado', '../../img/producao/2aPK7m4ibHtvrdjnHSP48pGezZEIsk3n.jpg', 10, 3, 'abobura'),
(20, NULL, 4, 'Picuaria', 480, 20, '01/13/2019', 20, '2019-01-13', '../../img/producao/producao.jpg', 'Comprado', NULL, 10, 15, 'Ovo'),
(21, NULL, 4, 'Picuaria', 500, 33, '01/13/2019', 20, '2019-01-13', '../../img/producao/producao.jpg', 'Comprado', NULL, 10, 15, 'Ovo'),
(22, NULL, 6, 'Picuaria', 1000, 100, '01/14/2019', 20, '2019-01-13', '../../img/producao/producao.jpg', 'Comprado', NULL, 10, 15, 'Ovo'),
(23, 14, NULL, 'Agricula', 1000, 100, '01/14/2019', 200, '2019-01-13', '../../img/producao/8s5XKHFcSLIZ16RgRIXIhX-nedNOI0Of.jpg', 'Comprado', '../../img/producao/8s5XKHFcSLIZ16RgRIXIhX-nedNOI0Of.jpg', 10, 2, 'pimento'),
(24, 13, NULL, 'Agricula', 1000, 100, '01/15/2019', 200, '2019-01-22', '../../img/producao/wjAhmZM7gCQ54UMnEUWkiCMm2sx2cBwf.jpg', 'Comprado', '../../img/producao/wjAhmZM7gCQ54UMnEUWkiCMm2sx2cBwf.jpg', 10, 1, 'tomate'),
(25, 13, NULL, 'Agricula', 1000, 100, '01/22/2019', 200, '2019-01-29', '../../img/producao/mXSHcPs9ytby1x0b02gFl_IhAjDBlnv0.jpg', 'Comprado', '../../img/producao/mXSHcPs9ytby1x0b02gFl_IhAjDBlnv0.jpg', 10, 1, 'tomate'),
(26, 13, NULL, 'Agricula', 1000, 100, '01/22/2019', 200, '2019-02-08', '../../img/producao/Ym7J1rvWbJsfY-kGYy2hW5XHhK90878x.jpg', 'Comprado', '../../img/producao/Ym7J1rvWbJsfY-kGYy2hW5XHhK90878x.jpg', 10, 1, 'tomate'),
(27, NULL, 5, 'Picuaria', 1000, 0, '03/19/2018', 100, '2019-03-19', NULL, 'Comprado', NULL, 10, 14, 'leite'),
(28, 15, NULL, 'Agricula', 1000, 100, '04/04/2019', 200, '2019-03-19', '../../img/producao/vi6Ylcdz-CSB0Vyyo4z6cIiAcz2TyCYs.jpg', 'Comprado', '../../img/producao/vi6Ylcdz-CSB0Vyyo4z6cIiAcz2TyCYs.jpg', 10, 3, 'abobura'),
(29, 13, NULL, 'Agricula', 1000, 100, '03/22/2019', 200, '2019-03-22', '../../img/producao/producao.jpg', 'Comprado', NULL, 10, 1, 'tomate');

-- --------------------------------------------------------

--
-- Table structure for table `Produto`
--

CREATE TABLE `Produto` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preco` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_registo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `codigo_producao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Produto`
--

INSERT INTO `Produto` (`id`, `id_compra`, `nome`, `descricao`, `preco`, `photo`, `data_registo`, `estra`, `status`, `codigo_producao_id`) VALUES
(7, 34, 'tomate', 'savana', 200, '../../img/producao/producao.jpg', '2019-03-22', NULL, 10, 1),
(8, 37, 'Abobura', 'piqueno', 200, '../../img/producao/vi6Ylcdz-CSB0Vyyo4z6cIiAcz2TyCYs.jpg', '2019-03-19', NULL, 10, 3),
(9, 45, 'Ovo', 'Ovo', 20, '../../img/producao/producao.jpg', '2019-01-13', NULL, 10, 15),
(10, 49, 'pimento', 'pimento', 200, '../../img/producao/8s5XKHFcSLIZ16RgRIXIhX-nedNOI0Of.jpg', '2019-01-13', NULL, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_iduser` int(11) NOT NULL,
  `id_regiao` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` int(11) NOT NULL,
  `data_nascimento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_registo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_iduser`, `id_regiao`, `nome`, `sobrenome`, `tipo`, `sexo`, `telefone`, `data_nascimento`, `endereco`, `photo`, `data_registo`, `estado`, `estra`) VALUES
(27, 1, 'Vanilton', 'Pereira', 'Adiministrador', 'Masculino', 9706153, '03-Dec-1906', 'Palmarejo', 'img/user/5d7TYpemkQaOWwiEp4FTYn4oV1icDJ3e.jpg', '2018-11-28', 'offline', 'img/user/5d7TYpemkQaOWwiEp4FTYn4oV1icDJ3e.jpg'),
(28, 2, 'Anilton', 'Miranda', 'Adiministrador', 'Masculino', 9706153, '06/01/1995', 'Fazenda', '../../img/user/BkMsb1zkWahPQznrnj6IvWhPIHRa83P7.jpg', '2018-11-28', 'offline', '../../img/user/BkMsb1zkWahPQznrnj6IvWhPIHRa83P7.jpg'),
(30, 1, 'Flavio', 'Maio', 'Gestor', 'Masculino', 9706153, '1995-06-01', 'Palmarejo', '../../img/user/E1OXXt8hnOmxkJmobqR3s-U-9FW0ZRZU.jpg', '2018-12-03', 'offline', '../../img/user/E1OXXt8hnOmxkJmobqR3s-U-9FW0ZRZU.jpg'),
(61, 6, 'Yasmine', 'Freire', 'Operador', 'Feminino', 9264063, '1995-6-1', 'Orgoes', '../../img/user/c5WcBTYysQaEpyybWzGj1WMUAGjLlxax.jpg', '2019-03-26', 'offline', '../../img/user/c5WcBTYysQaEpyybWzGj1WMUAGjLlxax.jpg'),
(62, 1, 'Vanilton', 'Miranda', 'Agente-Venda', 'Masculino', 9706153, '1995-6-1', 'Palmarejo', '../../img/user/Z49oXqpltXvUYzE9-De3UdXbJ5-OzHMJ.jpg', '2019-03-29', 'oline', '../../img/user/Z49oXqpltXvUYzE9-De3UdXbJ5-OzHMJ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Regiao`
--

CREATE TABLE `Regiao` (
  `id` int(11) NOT NULL,
  `localidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ilha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `municipio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rua` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Regiao`
--

INSERT INTO `Regiao` (`id`, `localidade`, `pais`, `ilha`, `cidade`, `municipio`, `rua`, `latitude`, `longitude`, `status`) VALUES
(1, 'S. Filipe', 'Cabo Verde', 'Fogo', '', '0', '', '14.896682', '-24.497623', 10),
(2, 'Mosteiros', 'Cabo Verde', 'Fogo', '', '0', '', '15.034659', '-24.32519', 10),
(3, 'Achada Furna', 'Cabo Verde', 'Fogo', '', '0', '', '14.87329', '-24.358578', 10),
(4, 'Afonso Gil', 'Cabo Verde', 'Fogo', '', '', '', '14.982265', '-24.459987', NULL),
(5, 'Atalaia', 'Cabo Verde', 'Fogo', '', '', '', '15.028484', '-24.389391', NULL),
(6, 'Campanas de Baixo', 'Cabo Verde', 'Fogo', '', '', '', '15.017914', '-24.408703', NULL),
(7, 'Cerrado', 'Cabo Verde', 'Fogo', '', '', '', '14.930853', '-24.460373', NULL),
(8, 'Corvo', 'Cabo Verde', 'Fogo', '', '', '', '14.99951', '-24.304934', NULL),
(9, 'Cova Figueira', 'Cabo Verde', 'Fogo', '', '', '', '14.890751', '-24.294033', NULL),
(10, 'Dacabalaio', 'Cabo Verde', 'Fogo', '', '', '', '14.857859', '-24.32785', NULL),
(11, 'Estância Roque', 'Cabo Verde', 'Fogo', '', '', '', '14.897138', '-24.319654', NULL),
(12, 'Fajãzinha', 'Cabo Verde', 'Fogo', '', '', '', '15.048357', '-24.352731', NULL),
(13, 'Figueira Pavão', 'Cabo Verde', 'Fogo', '', '', '', '14.871236', '-24.31283', NULL),
(14, 'Fonsaco', 'Cabo Verde', 'Fogo', '', '', '', '15.02036', '-24.314375', NULL),
(15, 'Fonte Aleixo', 'Cabo Verde', 'Fogo', '', '', '', '14.848775', '-24.355316', NULL),
(16, 'Forno', 'Cabo Verde', 'Fogo', '', '', '', '14.8927', '-24.450073', NULL),
(17, 'Galinheiros', 'Cabo Verde', 'Fogo', '', '', '', '15.007137', '-24.443893', NULL),
(18, 'Italiano', 'Cabo Verde', 'Fogo', '', '', '', '14.966138', '-24.455009', NULL),
(19, 'Lagariça', 'Cabo Verde', 'Fogo', '', '', '', '14.922891', '-24.452133', NULL),
(20, 'Monte Grande', 'Cabo Verde', 'Fogo', '', '', '', '14.891954', '-24.406128', NULL),
(21, 'Monte Largo', 'Cabo Verde', 'Fogo', '', '', '', '14.870013', '-24.38364', NULL),
(22, 'Patim', 'Cabo Verde', 'Fogo', '', '', '', '14.87611', '-24.425011', NULL),
(23, 'Ponta Verde', 'Cabo Verde', 'Fogo', '', '', '', '14.984255', '-24.455009', NULL),
(24, 'Portela', 'Cabo Verde', 'Fogo', '', '', '', '14.962987', '-24.369092', NULL),
(25, 'Relva', 'Cabo Verde', 'Fogo', '', '', '', '14.973973', '-24.293518', NULL),
(26, 'Ribeira do Ilhéu', 'Cabo Verde', 'Fogo', '', '', '', '15.036483', '-24.376023', NULL),
(27, 'S. Lourenço', 'Cabo Verde', 'Fogo', '', '', '', '14.942629', '-24.469171', NULL),
(28, 'Salto', 'Cabo Verde', 'Fogo', '', '', '', '14.864164', '-24.419518', NULL),
(29, 'São Jorge', 'Cabo Verde', 'Fogo', '', '', '', '15.015013', '-24.426899', NULL),
(30, 'Tongon', 'Cabo Verde', 'Fogo', '', '', '', '14.927618', '-24.476681', NULL),
(31, 'Zambujeiro', 'Cabo Verde', 'Fogo', '', '', '', '14.947978', '-24.458742', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Stock`
--

CREATE TABLE `Stock` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_registo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Stock`
--

INSERT INTO `Stock` (`id`, `id_produto`, `id_utilizador`, `quantidade`, `data_registo`, `status`) VALUES
(5, 7, 28, 3604, '2018-12-29', 10),
(6, 8, 28, 4700, '2019-01-12', 10),
(7, 9, 28, 1827, '2019-01-13', 10),
(8, 10, 28, 900, '2019-01-13', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(27, 'vanilton', 'SlIqi8lT0zcE_7rzisvws7nSWWL556W7', '$2y$13$a/Qz/H9.gYMIDvGVdxx8QenHnYjXGz5recOMTVy/2ZM9z4sc/z3QO', NULL, 'vaanilton@gmail.com', 10, 1543428265, 1553600940),
(28, 'anilton', '9GlfcJGSNBOeeGv55KngvUSaCusV8kd9', '$2y$13$POkCl6jMUkbBqBS4p5GK3uOG4mDHwFjdQeOSQxA.bzr93HNo4VXpW', 'TV33nIg_ngPyOaBYj_1e5zzAwTIlhKG3_1544319158', 'anilton@gmail.com', 10, 1543432694, 1544319158),
(30, 'gestor', '6JN0Fgu0vlrq2bNtX6VsnBeF9pYp2ZLr', '$2y$13$eu7V3HX9sqLggnX9x7d.YOgoIEEM1lYfZAV7v83vvkYlsRnZjdati', NULL, 'flavio@gmail.com', 10, 1543875876, 1553727441),
(31, 'operador', '7BS43tz7MZQBOm-W6Xe1yQdQXcgWMrLt', '$2y$13$Oaf0cqeSyZILXBuMrKVKV.YA1yBMAXwsMWZWcapr6KzWtSjymBKYG', NULL, 'antonio@gmail.com', 0, 1543876004, 1543876004),
(32, 'cleisa', 'BI7zN37CLOubbw51j0VZY5PKXPT4lHoO', '$2y$13$pZha5GP8uo/CGOM3cVLxgOueTcjwiEz0/EgCVLUP6.fIFDvEE1itm', NULL, 'cleisa@gmail.com', 10, 1543876286, 1543876286),
(56, 'fernando', 'GRLBZRs1Ou1bCVYAbniieVRT1lPewJ6z', '$2y$13$gq.ZQYOrhlt1p3FyI7CUw.euW0lRu2LugNd2eMzCtiQuP2YZRSzA.', NULL, 'fernando@gmail.com', 10, 1545422444, 1545422444),
(57, 'simon', 'w4a57QFoEjvRZ0ZZVYsg63GScO63fPxh', '$2y$13$2s8GXR7kE0i1/jF5bun8uuUNJUhuCcVg6pNtZHkYbSSQlMFIMNbXC', NULL, 'simon@gmail.com', 10, 1545423351, 1545423351),
(58, 'calu', '6CNGwLVnazN8SLpF-yFS5Zc4DX01TQ7K', '$2y$13$Irn9y1sZb9vxez5NZYmtju.fH1SFTke0ivyGNEuEj.sW91z4raWuC', NULL, 'calu@gmail.com', 10, 1545708005, 1545708005),
(60, 'gaby', '4wyED_65_kmqvOC8bJwlkw0gX52La0l6', '$2y$13$kD0KkU7sLR/cyIcLtILbtOWMJ1XcOnCkPUCsrZzdEU9utByBgbdia', NULL, 'gaby@gmail.com', 10, 1546646543, 1553696767),
(61, 'operadora', 'QzqmDx21gn8W3pcOnvVLMUC8JpaWcgWg', '$2y$13$jcZLlicrBllG102Np.nNOOhmwDxzlURIRAwG0guJL2xr1ILDI8MKW', NULL, 'yasmine@gmail.com', 10, 1553608984, 1553608984),
(62, 'agente', 'YZc-JGuxABVXXu3sDceKvZtLsniYCfuO', '$2y$13$PN9T1UYF3My0zOENuhEAc.yqMzv1kMAGWTPvWSL.1JSdAGcYoYuja', NULL, 'agente@gmail.com', 10, 1553884706, 1553884706);

-- --------------------------------------------------------

--
-- Table structure for table `visao_presedente`
--

CREATE TABLE `visao_presedente` (
  `id` int(11) NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visao_presedente`
--

INSERT INTO `visao_presedente` (`id`, `descricao`, `status`, `nome`, `sobrenome`, `photo`, `estra`) VALUES
(1, 'Os sectores agrícola e pecuária de Cabo Verde, são sectores que, \r\npelo peso que tem na sustentabilidade social do país, \r\nexige que o governo e os seus parceiros invistam uma parte considerável \r\ndo recurso económico nesses sectores. \r\nNo entanto, estes dois sectores continuam a suscitar, ano apos ano,\r\n mais e mais investimento e, \r\nmuitas das vezes em repetidas intervenções. \r\nDado a escassez de recursos, eu, como presidente deste projeto, \r\nentendo que devemos apostar na eficácia, \r\neficiência e transparência no uso dos recursos, \r\nde modo a capitalizar ao máximo nos investimentos já feito pelo \r\nestado e pelos seus parceiros. \r\nEntendo que, a gestão dos recursos do estado e dos seus \r\nparceiros nestes sectores, \r\nque são sectores estratégicos para a sustentabilidade social \r\ne económica do país, \r\ndeve ser feito de forma integrado, transparente e descentralizado.\r\n Isto é, os projetos devem ser estudados, \r\nanalisados e executados em concordância com o governo municipal, \r\no parceiro, o promotor e a sociedade comunitária, \r\nficando todos com o conhecimento do mesmo e dos impactos esperado, \r\ne assim, a fiscalização do mesmo, pode ser feito por todos já que \r\ntodos conhecem os parâmetros do projeto. \r\nAplaudimos algumas das medidas tomadas pelo atual governo e \r\nanunciadas pelo concelho de Ministros, \r\nmas, ainda nos preocupa o setor intermedio, \r\nque é a máquina que faz funcionar as medidas tomadas pelo governo. \r\nO tempo é dinheiro como dizem os americanos, \r\npor isso, se o setor intermedio, referimos as instituições publicas, \r\nnão reconhece este ditado como sendo verdade, então,\r\n teremos os mesmos problemas por algum tempo independentemente \r\nda qualidade das medidas tomadas pelo governo. \r\nSem querer dizer que, as propostas apresentadas pela “VISÃO DO FUTURO”, \r\nseja a solução definitiva para os problemas destes dois setores, \r\nainda assim, acredito que as propostas apresentadas pelo projeto, \r\npode ter um rol importante na resolução dos problemas que apresenta \r\nos referenciados setores. \r\nSe a união faz a força, a falta dela deve refletir fracassos. \r\nO povo Cabo-verdiano é conhecido por trabalhador,\r\n batalhador, mas também muito individualistas (teimosos *marca foguense*) \r\nno seu modo de pensar. \r\nPortanto, ter um sistema de enquadramento ou de integração de forma individual,\r\n mas que produz resultado coletivo, \r\nseria imprescindível para o tão desejado desenvolvimento da economia local, \r\ncom impacto direto e indireto na economia nacional. \r\nO sistema simplificado, criado pela “VISÃO DO FUTURO”, \r\noferece precisamente isto,\r\n oferecendo a oportunidade a todos de fazer parte do desenvolvimento da\r\n ilha do Fogo, \r\nfazendo exatamente aquilo que sabe e que gosta de fazer. \r\nAcreditamos que rendemos sempre mais quando fazemos o que gostamos.\r\nÉ nesta ótica, que a “VISÃO DO FUTURO” pretende trabalhar para implementar, \r\nno Fogo, um sistema simples, compreensível para todos que vai facilitar a \r\nvida aos seus integrantes,\r\n diminuindo o custo de produção,\r\n oferecer um mercado de escoamento, manter o controlo dos gastos, \r\nestáticas da produção e venda do seus produtos, \r\ntudo com o intuito de manter os intervenientes consciente do que realmente \r\nprecisa fazer para ter o sucesso desejado.\r\n Um sistema que supervisione constantemente as intervenções tendo \r\nsempre como foco o integrante e as suas atividades. \r\nUm sistema que articule entre o mercado (a procura e a demanda, \r\nferramentas para produção), \r\na produção (quantidade, qualidade, tempo, tipo, certificação, etc), e os \r\nintervenientes (os associados). \r\nUm sistema onde esperamos conseguir, como resultado, \r\na formalização do agronegócio na ilha, \r\ncolocando cada interveniente económico no seu respetivo lugar, \r\ncontribuindo conforme a sua capacidade para a melhoria a sustentabilidade  \r\neconómica com impacto direto na economia nacional. \r\nPorque para se tornar estes setores atrativos,\r\n temos de o tornar rentável, \r\ne para o tornar rentável temos de ter dados demonstrativos onde os \r\ninvestidores podem avaliar a atratividade ou o seu potencial para puder \r\ndecidir se vale a pena investir no mesmo. \r\nResumindo e concluindo, \r\ndado o historial do país no que diz respeito a seriedade das pessoas \r\nem assumir os seus compromissos, \r\ndeixa tudo mais difícil hoje em dia para se conseguir adquirir sócios, \r\nfiadores para créditos ou mesmo uma descoberta no banco para complementar, \r\npor exemplo, o fundo de maneio, \r\ndeixando todos reticentes para abrir ou aderir a abertura de uma empresa. \r\nPor isso consideramos fundamental a implementação do \r\nsistema sugerido pela “VISÃO DO FUTURO”, \r\nde modo a ter dados completos dos impactos tidos em cada intervenção, \r\nobtendo uma estatística real das ações para a avaliação de possíveis investidores. \r\nPensamos que isso traria algum conforto e confiança a um investidor', 10, 'Antonio', 'Fernandes', '../../img/visao/hb2QxkPqssFRnM9MVLsXn1TmZ2cNEs1u.jpg', '../../img/visao/hb2QxkPqssFRnM9MVLsXn1TmZ2cNEs1u.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Anuncio`
--
ALTER TABLE `Anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Area_Especialisacao`
--
ALTER TABLE `Area_Especialisacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Area_Intervencao`
--
ALTER TABLE `Area_Intervencao`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_regiao` (`id_regiao`);

--
-- Indexes for table `Codigo_Producao`
--
ALTER TABLE `Codigo_Producao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Compra`
--
ALTER TABLE `Compra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_producao` (`id_producao`),
  ADD KEY `id_gado` (`id_gado`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cultivo`
--
ALTER TABLE `Cultivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_fornecedor` (`id_fornecedor`),
  ADD KEY `id_regiao` (`id_regiao`);

--
-- Indexes for table `Emprestimo`
--
ALTER TABLE `Emprestimo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_fornecedor` (`id_fornecedor`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Indexes for table `Equipa`
--
ALTER TABLE `Equipa`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_iduser` (`user_iduser`);

--
-- Indexes for table `Fatura`
--
ALTER TABLE `Fatura`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `Fornecedor`
--
ALTER TABLE `Fornecedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIF` (`NIF`,`BI`),
  ADD UNIQUE KEY `user_iduser_2` (`user_iduser`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_regiao` (`id_regiao`),
  ADD KEY `user_iduser` (`user_iduser`);

--
-- Indexes for table `Gado`
--
ALTER TABLE `Gado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_fornecedor` (`id_fornecedor`),
  ADD KEY `id_regiao` (`id_regiao`);

--
-- Indexes for table `Galeria`
--
ALTER TABLE `Galeria`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `historial_gado`
--
ALTER TABLE `historial_gado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_gado` (`id_gado`);

--
-- Indexes for table `Informacao_Contacto`
--
ALTER TABLE `Informacao_Contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Inscricao`
--
ALTER TABLE `Inscricao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_anuncio` (`id_anuncio`);

--
-- Indexes for table `Intervensao_Social`
--
ALTER TABLE `Intervensao_Social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_parceiro` (`id_parceiro`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `Parceiro`
--
ALTER TABLE `Parceiro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Indexes for table `Producao`
--
ALTER TABLE `Producao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_cultivo` (`id_cultivo`),
  ADD KEY `id_gado` (`id_gado`),
  ADD KEY `codigo_producao_id` (`codigo_producao_id`);

--
-- Indexes for table `Produto`
--
ALTER TABLE `Produto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_compra` (`id_compra`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_iduser`),
  ADD UNIQUE KEY `user_iduser` (`user_iduser`),
  ADD KEY `id_regiao` (`id_regiao`);

--
-- Indexes for table `Regiao`
--
ALTER TABLE `Regiao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `visao_presedente`
--
ALTER TABLE `visao_presedente`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Anuncio`
--
ALTER TABLE `Anuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Area_Especialisacao`
--
ALTER TABLE `Area_Especialisacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Area_Intervencao`
--
ALTER TABLE `Area_Intervencao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Codigo_Producao`
--
ALTER TABLE `Codigo_Producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Compra`
--
ALTER TABLE `Compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cultivo`
--
ALTER TABLE `Cultivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Emprestimo`
--
ALTER TABLE `Emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Equipa`
--
ALTER TABLE `Equipa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Estado`
--
ALTER TABLE `Estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `Fatura`
--
ALTER TABLE `Fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Fornecedor`
--
ALTER TABLE `Fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Gado`
--
ALTER TABLE `Gado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Galeria`
--
ALTER TABLE `Galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `historial_gado`
--
ALTER TABLE `historial_gado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Informacao_Contacto`
--
ALTER TABLE `Informacao_Contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Inscricao`
--
ALTER TABLE `Inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `Intervensao_Social`
--
ALTER TABLE `Intervensao_Social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Parceiro`
--
ALTER TABLE `Parceiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Producao`
--
ALTER TABLE `Producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Produto`
--
ALTER TABLE `Produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Regiao`
--
ALTER TABLE `Regiao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Stock`
--
ALTER TABLE `Stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `visao_presedente`
--
ALTER TABLE `visao_presedente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `profile` (`user_iduser`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`id_regiao`) REFERENCES `Regiao` (`id`);

--
-- Constraints for table `Compra`
--
ALTER TABLE `Compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `profile` (`user_iduser`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_producao`) REFERENCES `Producao` (`id`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`id_gado`) REFERENCES `Gado` (`id`);

--
-- Constraints for table `Cultivo`
--
ALTER TABLE `Cultivo`
  ADD CONSTRAINT `cultivo_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `Fornecedor` (`id`),
  ADD CONSTRAINT `cultivo_ibfk_2` FOREIGN KEY (`id_regiao`) REFERENCES `Regiao` (`id`);

--
-- Constraints for table `Emprestimo`
--
ALTER TABLE `Emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `Fornecedor` (`id`),
  ADD CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`id_utilizador`) REFERENCES `Profile` (`user_iduser`);

--
-- Constraints for table `Estado`
--
ALTER TABLE `Estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `Fatura`
--
ALTER TABLE `Fatura`
  ADD CONSTRAINT `fatura_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `profile` (`user_iduser`),
  ADD CONSTRAINT `fatura_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `Cliente` (`id`);

--
-- Constraints for table `Fornecedor`
--
ALTER TABLE `Fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `profile` (`user_iduser`),
  ADD CONSTRAINT `fornecedor_ibfk_2` FOREIGN KEY (`id_regiao`) REFERENCES `Regiao` (`id`);

--
-- Constraints for table `Gado`
--
ALTER TABLE `Gado`
  ADD CONSTRAINT `gado_ibfk_1` FOREIGN KEY (`id_regiao`) REFERENCES `Regiao` (`id`),
  ADD CONSTRAINT `gado_ibfk_2` FOREIGN KEY (`id_fornecedor`) REFERENCES `Fornecedor` (`id`),
  ADD CONSTRAINT `gado_ibfk_3` FOREIGN KEY (`id_regiao`) REFERENCES `Regiao` (`id`);

--
-- Constraints for table `historial_gado`
--
ALTER TABLE `historial_gado`
  ADD CONSTRAINT `historial_gado_ibfk_1` FOREIGN KEY (`id_gado`) REFERENCES `Gado` (`id`);

--
-- Constraints for table `Inscricao`
--
ALTER TABLE `Inscricao`
  ADD CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`id_anuncio`) REFERENCES `Anuncio` (`id`);

--
-- Constraints for table `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `profile` (`user_iduser`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`id_parceiro`) REFERENCES `Parceiro` (`id`);

--
-- Constraints for table `Parceiro`
--
ALTER TABLE `Parceiro`
  ADD CONSTRAINT `parceiro_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `profile` (`user_iduser`);

--
-- Constraints for table `Producao`
--
ALTER TABLE `Producao`
  ADD CONSTRAINT `producao_ibfk_1` FOREIGN KEY (`id_cultivo`) REFERENCES `Cultivo` (`id`),
  ADD CONSTRAINT `producao_ibfk_2` FOREIGN KEY (`id_gado`) REFERENCES `Gado` (`id`),
  ADD CONSTRAINT `producao_ibfk_3` FOREIGN KEY (`codigo_producao_id`) REFERENCES `Codigo_Producao` (`id`);

--
-- Constraints for table `Produto`
--
ALTER TABLE `Produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `Compra` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`id_regiao`) REFERENCES `Regiao` (`id`),
  ADD CONSTRAINT `profile_ibfk_3` FOREIGN KEY (`id_regiao`) REFERENCES `Regiao` (`id`);

--
-- Constraints for table `Stock`
--
ALTER TABLE `Stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `Produto` (`id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`id_utilizador`) REFERENCES `profile` (`user_iduser`);
