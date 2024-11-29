-- Criar o banco de dados
CREATE DATABASE meu_banco;

-- Selecionar o banco de dados
USE meu_banco;

-- Criar a tabela usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
