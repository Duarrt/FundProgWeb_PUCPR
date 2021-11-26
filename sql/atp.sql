-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2021 at 08:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pucpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `devolucoes`
--

CREATE TABLE `devolucoes` (
  `id` int(11) NOT NULL,
  `id_emprestimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devolucoes`
--

INSERT INTO `devolucoes` (`id`, `id_emprestimo`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int(11) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emprestimos`
--

INSERT INTO `emprestimos` (`id`, `cod_item`, `id_usuario`, `data_emprestimo`, `data_devolucao`) VALUES
(1, 1, 2, '2021-11-16', '2021-11-30'),
(5, 2, 2, '2021-11-23', '2021-12-27'),
(6, 2, 1, '2021-11-26', NULL),
(7, 2, 1, '2021-11-26', NULL),
(8, 2, 2, '2021-11-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `itens`
--

CREATE TABLE `itens` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itens`
--

INSERT INTO `itens` (`cod`, `nome`, `tipo`) VALUES
(1, 'Livro Antigo', 'Livraria'),
(2, 'Caneta azul', 'Papelaria'),
(3, 'Teste', 'Teste');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contato` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `senha` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `contato`, `admin`, `senha`) VALUES
(1, 'admin', 'Admin@teste.com', '(41)91111-1111', 1, 'admin'),
(2, 'User', 'User@teste.com', '(41)99999-9999', 0, 'user'),
(3, 'Ramon', 'ramon@teste.com', '(41)98888-8888', 1, 'teste'),
(4, 'Joao', 'joao@teste.com', '(41)97777-7777', 0, 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idEmprestimo` (`id_emprestimo`);

--
-- Indexes for table `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idUsuario` (`id_usuario`),
  ADD KEY `fk_codItem` (`cod_item`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devolucoes`
--
ALTER TABLE `devolucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD CONSTRAINT `fk_idEmprestimo` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimos` (`id`);

--
-- Constraints for table `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `fk_codItem` FOREIGN KEY (`cod_item`) REFERENCES `itens` (`cod`),
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
