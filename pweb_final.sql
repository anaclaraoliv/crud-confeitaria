-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220619.196dad2777
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jun-2022 às 03:27
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pweb_final`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolos`
--

CREATE TABLE `bolos` (
  `imagem` varchar(150) NOT NULL,
  `produto` varchar(30) NOT NULL,
  `descricao` varchar(210) NOT NULL,
  `valor` float NOT NULL,
  `fatias` int(11) NOT NULL,
  `tempo_dias` int(11) NOT NULL,
  `inclusao` varchar(10) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bolos`
--

INSERT INTO `bolos` (`imagem`, `produto`, `descricao`, `valor`, `fatias`, `tempo_dias`, `inclusao`, `categoria`, `ID`) VALUES
('2022-06-13_02-53-46.jpg', 'Floresta Negra', 'Bolo com massa de pão de ló de chocolate, recheado com chantily e cerejas, finalizado com raspas de chocolate ao leite e placa de chocolate ao leite.', 55.2, 32, 2, '2006-07-22', 'Confeitados', 12),
('2022-06-16_04-28-39.webp', 'Bolo de Anjo', 'Massa é feita com merengue, farinha de trigo e fica super levinha, sequinha e com sabor incomparável. A cobertura é opcional, a mesma cobertura de cream cheese perfeita que vai no bolo red velvet.', 25.99, 16, 5, '2006-12-22', 'Tradicionais', 14),
('2022-06-22_02-48-14.jpg', 'Bolo de Cenoura', 'Massa fofinha, aerada e de cor vibrante coroada de uma irresistível cobertura de chocolate.', 28.99, 15, 1, '2006-12-22', 'Tradicionais', 15),
('2022-06-22_03-01-53.jpg', 'Clássico Confeitado', 'Cobetura e recheio em três camadas de leite condensado com granulado colorido e massa com sabor de leite em pó.', 39.99, 42, 2, '06-22-22', 'Confeitados', 25),
('2022-06-22_03-09-33.webp', 'Red Velvet', 'Bolo naked cake com massa de cor vermelha e tradicional, recheado com um leve, saboroso e adocicado creme de cream cheese, finalizado com placa de chocolate ao leite com logo Ofner.', 150, 45, 5, '06-22-22', 'Confeitados', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `nome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`nome`) VALUES
('Casamento'),
('Confeitados'),
('Realista'),
('Tradicionais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data` varchar(10) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `entrega` varchar(10) NOT NULL,
  `ref` varchar(300) NOT NULL,
  `gostou` varchar(300) NOT NULL,
  `mudar` varchar(300) NOT NULL,
  `tema` varchar(300) NOT NULL,
  `topo` varchar(300) NOT NULL,
  `geral` varchar(300) NOT NULL,
  `tipo_resposta` varchar(25) NOT NULL,
  `status_msg` varchar(15) NOT NULL,
  `venda` varchar(7) NOT NULL,
  `data_finalizacao` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id`, `id_produto`, `nome`, `data`, `telefone`, `email`, `entrega`, `ref`, `gostou`, `mudar`, `tema`, `topo`, `geral`, `tipo_resposta`, `status_msg`, `venda`, `data_finalizacao`) VALUES
(9, 12, 'Clara Oliveira', '06-19-22', 0, 'acof993@gmail.com', '2022-06-29', '2022-06-19_22-29-09.jpg', 'A cobertura.', 'Precisa ter leite zero lactose na receita.', 'Sem tema.', 'Nada.', 'Deverá ter granulado colorido.', 'Telefone e WhatsApp', 'Em andamento', 'Não', 'Em andamento'),
(13, 15, 'ANA', '06-20-22', 0, 'clara.of93@gmail.com', '2022-06-22', '2022-06-20_21-21-36.jpg', 'A cobertura.', '', 'Deverá ter o tema da Peppa Pig.', '', '', 'Em andamento', 'Nova', 'Não', 'Em andamento'),
(16, 23, 'Ana', '06-22-22', 2147483647, 'teste@teste.com', '2022-06-22', '2022-06-22_02-16-22.jpg', '', '', '', '', '', 'Em andamento', 'Nova', 'Não', 'Em andamento');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bolos`
--
ALTER TABLE `bolos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`nome`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bolos`
--
ALTER TABLE `bolos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



