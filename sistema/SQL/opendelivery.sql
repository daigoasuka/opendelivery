-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 02, 2013 as 03:54 AM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `integrador2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) NOT NULL,
  `checkout` datetime NOT NULL,
  `metodo_pag` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `checkout`, `metodo_pag`, `valor`) VALUES
(23, 'Sem registro', '2013-07-01 00:15:00', '0', '38.00'),
(24, 'Vinicius henrique', '2013-07-01 03:07:53', '1', '75.00'),
(25, 'Sem registro', '2013-06-24 03:11:21', '0', '38.00'),
(26, 'oaksokasoka', '2013-06-05 04:48:27', '0', '20.00'),
(27, 'ASKAKSO ', '2013-07-01 04:50:23', '0', '200.00'),
(28, 'Administrador', '2013-06-28 04:51:02', '0', '30.00'),
(29, 'HAHAHA HAHA', '2012-07-01 04:53:12', '0', '500.00'),
(30, 'Vinicius henrique', '2013-07-01 16:56:53', '3', '40.50'),
(31, 'Sem registro', '2013-07-01 20:09:29', '0', '38.00'),
(32, 'Vinicius Henrique', '2013-07-01 20:10:43', '1', '38.00'),
(33, 'akoskaos aoskoaks', '2013-07-01 20:12:57', '2', '38.00'),
(34, 'asaksoaka aksoaks', '2013-07-01 20:13:21', '3', '76.00'),
(35, 'Sem registro', '2013-07-02 01:47:03', '0', '40.50'),
(36, 'Bruna Fuchs', '2013-07-02 01:48:29', '3', '75.00'),
(37, 'Sem registro', '2013-07-02 01:53:46', '0', '38.00'),
(38, 'Bruna Fuchs', '2013-07-02 01:54:23', '3', '38.00'),
(39, 'Bruna Fuchs', '2013-07-02 01:56:18', '3', '2.50'),
(40, 'Sem registro', '2013-07-02 03:41:14', '0', '40.50'),
(41, 'Sem registro', '2013-07-02 03:41:31', '0', '40.50'),
(42, 'Bruna Fuchs', '2013-07-02 03:42:09', '3', '38.00'),
(43, 'Sem registro', '2013-07-02 03:45:57', '0', '40.50'),
(44, 'Sem registro', '2013-07-02 03:49:12', '0', '52.00'),
(45, 'Sem registro', '2013-07-02 03:53:07', '0', '38.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE IF NOT EXISTS `itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `nome`, `preco`, `categoria`, `img`) VALUES
(1, 'Vinho Touriga Franca 750 ml', '89.00', 'drinks', ''),
(2, 'Vinho Tinto Frances ChatÃªu 750ml', '265.05', 'drinks', ''),
(3, 'Vinho Tinto FrancÃªs Barton 750ml', '64.00', 'drinks', ''),
(4, 'Vinho Tinto FrancÃªs ChÃ¢teau Corton 750ml', '493.91', 'drinks', ''),
(5, 'Marselan 4Âº GeraÃ§Ã£o Dom CÃ¢ndido ', '54.00', 'drinks', ''),
(6, 'Refrig. Coca-Cola e Sabores 600ml', '4.00', 'drinks', ''),
(7, 'Ãgua com gÃ¡s 600ml', '2.50', 'drinks', ''),
(8, 'Ãgua sem gÃ¡s 600ml', '2.50', 'drinks', ''),
(9, 'Blanquette de veau', '38.00', 'pratos', '1'),
(10, 'Coq au Vin', '48.00', 'pratos', '2'),
(11, 'Cassoulet', '37.00', 'pratos', '3'),
(12, 'Queijos Variados', '18.00', 'pratos', '4'),
(13, 'Cuisses de grenouilles', '52.00', 'pratos', '5'),
(14, 'Escargot', '39.00', 'pratos', '6'),
(15, 'Caviar', '69.00', 'pratos', '7'),
(16, 'Kik ar fars', '49.00', 'pratos', '8'),
(17, 'Kouign amann', '37.00', 'pratos', '9'),
(18, 'Tartare de boeuf', '28.00', 'pratos', '10'),
(19, 'Creme Brulee', '19.00', 'sobremesas', ''),
(20, 'Crepes Especialidade BretÃ£', '24.00', 'sobremesas', ''),
(21, 'Mousse de Chocolate', '17.00', 'sobremesas', ''),
(22, 'PÃ¢tisserie Confeitaria', '16.00', 'sobremesas', ''),
(23, 'Mille-feuilles', '18.00', 'sobremesas', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `numero` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`numero`, `status`) VALUES
(1, 1),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `num_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(60) NOT NULL,
  `quant` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `atendente` int(11) NOT NULL,
  `cliente` int(3) NOT NULL,
  `data` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `pagamento` int(11) NOT NULL,
  PRIMARY KEY (`num_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`num_pedido`, `id`, `quant`, `mesa`, `atendente`, `cliente`, `data`, `status`, `pagamento`) VALUES
(91, 9, 3, 1, 1, 23, '2013-07-01 00:14:56', 1, 1),
(92, 9, 1, 1, 1, 24, '2013-07-01 03:04:35', 1, 1),
(93, 11, 1, 1, 1, 24, '2013-07-01 03:07:12', 1, 1),
(94, 9, 2, 1, 1, 25, '2013-07-01 03:11:14', 1, 1),
(97, 9, 1, 1, 1, 31, '2013-07-01 20:09:20', 1, 1),
(98, 9, 1, 1, 1, 32, '2013-07-01 20:10:15', 1, 1),
(99, 9, 2, 1, 1, 33, '2013-07-01 20:11:00', 1, 1),
(100, 9, 3, 1, 1, 34, '2013-07-01 20:13:05', 1, 1),
(101, 9, 2, 1, 1, 35, '2013-07-01 22:32:58', 1, 1),
(103, 9, 1, 1, 1, 35, '2013-07-02 01:46:48', 1, 1),
(105, 9, 2, 2, 1, 36, '2013-07-02 01:47:43', 1, 1),
(107, 9, 1, 3, 1, 37, '2013-07-02 01:53:36', 1, 1),
(108, 9, 3, 4, 1, 38, '2013-07-02 01:54:08', 1, 1),
(109, 7, 4, 5, 1, 39, '2013-07-02 01:56:05', 1, 1),
(110, 9, 2, 2, 1, 40, '2013-07-02 02:25:23', 1, 1),
(114, 9, 3, 1, 1, 45, '2013-07-02 03:53:00', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sis_user` varchar(16) NOT NULL,
  `sis_pass` varchar(16) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `nome` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`id`, `sis_user`, `sis_pass`, `funcao`, `nome`) VALUES
(1, 'admin', 'admin', 'Atendente', 'Administrador'),
(2, 'maria', 'maria', 'Atendente', 'Maria');
