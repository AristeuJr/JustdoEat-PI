-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/07/2025 às 15:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

CREATE DATABASE IF NOT EXISTS justdoeat_db;
USE justdoeat_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

 /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` enum('Admin','Cliente','Restaurante') NOT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `horario_abertura` time DEFAULT NULL,
  `horario_fechamento` time DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `perfil`, `cpf_cnpj`, `telefone`, `endereco`, `numero`, `cidade`, `cep`, `horario_abertura`, `horario_fechamento`, `data_cadastro`) VALUES
(1, 'Administrador', 'admin@justdoeat.com', '$2y$10$VB4RLCTiudk0qT/SS8wkR.nW3sRpt2bO2V7wattQU/HqAhNCH8QZW', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 12:48:59'),
(3, 'Ana Silva', 'ana.silva@email.com', '$2y$10$.lo3mfhBG9lT32BPc9EMuOa3lYuWSQRPCh8hMN1wkwrRh0Ig30QHm', 'Cliente', NULL, '	 (11) 98765-4321', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-04 13:40:44'),
(4, 'Sabor da Vila', 'contato@sabordavila.com.br', '$2y$10$Y/bHHcUE1Jr/Q0DcNzGiE.GVPASagRD9Jr6c47.6Kctzqcn2ar4H.', 'Restaurante', '12.345.678/0001-99', '(11) 5555-1234', 'Avenida Paulista', '1500', 'São Paulo', '01311-000', '11:00:00', '22:00:00', '2025-07-04 13:42:30');

--
-- Índices para tabelas despejadas
--

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas `produtos`
--

ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

COMMIT;

 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
