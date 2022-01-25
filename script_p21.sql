-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para teste_p21
CREATE DATABASE IF NOT EXISTS `teste_p21` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `teste_p21`;

-- Copiando estrutura para tabela teste_p21.torcedores
CREATE TABLE IF NOT EXISTS `torcedores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `mes_cadastro` int(11) DEFAULT NULL,
  `ano_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=919 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela para gravar as informações dos torcedores do time de Rugby All Blacks\r\n\r\n ["nome"]=>\r\n  string(28) "Emlio Christian Valdez Filho"\r\n  ["documento"]=>\r\n  string(14) "657.830.332-43"\r\n  ["cep"]=>\r\n  string(9) "51102-511"\r\n  ["endereco"]=>\r\n  string(37) "Travessa Emanuel Soares, 885. Bloco C"\r\n  ["bairro"]=>\r\n  string(20) "So Emiliano do Leste"\r\n  ["cidade"]=>\r\n  string(13) "Noel do Norte"\r\n  ["uf"]=>\r\n  string(2) "PB"\r\n  ["telefone"]=>\r\n  string(14) "(27) 4055-3538"\r\n  ["email"]=>\r\n  string(17) "epaes@faro.net.br"\r\n  ["ativo"]=>\r\n  string(1) "1"';

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
