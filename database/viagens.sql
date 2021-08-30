-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2020 às 01:22
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `viagens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_passageiro` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `cpf` varchar(16) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  `data_partida` varchar(10) DEFAULT NULL,
  `data_chegada` varchar(10) DEFAULT NULL,
  `quantidade_passagens` int(11) DEFAULT NULL,
  `valor_total` varchar(12) DEFAULT NULL,
  `pagamento` varchar(10) DEFAULT NULL,
  `idorigem` int(11) DEFAULT NULL,
  `iddestino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_passageiro`, `nome`, `cpf`, `email`, `tel`, `cep`, `endereco`, `data_partida`, `data_chegada`, `quantidade_passagens`, `valor_total`, `pagamento`, `idorigem`, `iddestino`) VALUES
(28, 'Pedro Henrique Nobrega', '356.678.794-54', 'pedroaahre@gmail.com', '(61) 97545-4531', '23222-269', 'Rua 45 vista 32 Condominio Bela Vista', '30/11/2020', '30/12/2020', 4, 'R$ 2276,08', 'Crédito', 1, 2),
(29, 'Gustavo Alameda Porto', '478.469.888-52', 'gustavoporto@gmail.com', '(21) 97454-6463', '78979-874', 'Rua 45 vista 32 Lote 20', '03/12/2020', '07/01/2021', 3, 'R$ 1544,64', 'Débito', 8, 11),
(30, 'Maria Ana Pereira', '789.945.112-01', 'mari_ana33@gmail.com', '(39) 96444-1214', '78948-945', 'Rodovia Divino casa 33 quadra 8', '02/12/2020', '15/12/2020', 2, 'R$ 1913,68', 'Débito', 15, 14),
(31, 'Eduardo Costa Lima', '798.789.456-12', 'educcolima@hotmail.com', '(77) 96784-5454', '99874-423', 'Rua Governador Limeira, rua 33, quadra 1', '30/11/2020', '30/01/2021', 1, 'R$ 357,04', 'Boleto', 10, 9),
(32, 'Lucas Almeida', '465.944.411-02', 'lucaspierrealmeida@gmail.com', '(61) 99874-4511', '72878-012', 'Rua 45 vista 32 Condominio Bela Vista', '30/11/2020', '23/12/2020', 4, 'R$ 2059,52', 'Crédito', 2, 11),
(33, 'Maria da Conceição', '781.561.211-03', 'Lucaspierras@gmail.com', '(61) 41515-1229', '72878-012', 'Rodovia Divino casa 33', '01/12/2020', '10/12/2020', 2, 'R$ 1138,04', 'Boleto', 1, 2),
(34, 'Diva', '845.465.464-79', 'Lucas@gmail.com', '(78) 69456-4655', '35644-775', 'Rua 45 vista 32 Condominio Bela Vista', '02/12/2020', '07/01/2021', 2, 'R$ 1285,76', 'Boleto', 1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `cidade_destino` varchar(30) DEFAULT NULL,
  `preco` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `destinos`
--

INSERT INTO `destinos` (`id_destino`, `cidade_destino`, `preco`) VALUES
(2, 'São Paulo', '284.51'),
(9, 'Piracicaba', '178.52'),
(10, 'Manaus', '321.44'),
(11, 'Goiânia', '257.44'),
(12, 'Belo Horizonte', '315.22'),
(13, 'São Paulo', '396.48'),
(14, 'Xaxim', '478.42'),
(15, 'Uberlândia', '299.62');

-- --------------------------------------------------------

--
-- Estrutura da tabela `origem`
--

CREATE TABLE `origem` (
  `id_origem` int(11) NOT NULL,
  `cidade_origem` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `origem`
--

INSERT INTO `origem` (`id_origem`, `cidade_origem`) VALUES
(1, 'Brasília'),
(2, 'São Paulo'),
(8, 'Rio de Janeiro'),
(9, 'Piracicaba'),
(10, 'Manaus'),
(11, 'Goiânia'),
(12, 'Belo Horizonte'),
(13, 'São Paulo'),
(14, 'Xaxim'),
(15, 'Uberlândia');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_passageiro`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `idorigem` (`idorigem`),
  ADD KEY `iddestino` (`iddestino`);

--
-- Índices para tabela `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`);

--
-- Índices para tabela `origem`
--
ALTER TABLE `origem`
  ADD PRIMARY KEY (`id_origem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_passageiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `origem`
--
ALTER TABLE `origem`
  MODIFY `id_origem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idorigem`) REFERENCES `origem` (`id_origem`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`iddestino`) REFERENCES `destinos` (`id_destino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
