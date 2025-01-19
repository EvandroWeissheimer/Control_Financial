CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,             -- Identificador único do usuário
    nome VARCHAR(255) NOT NULL,        -- Nome do usuário
    email VARCHAR(255) NOT NULL UNIQUE,-- Email único
    senha VARCHAR(255) NOT NULL,       -- Senha criptografada
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data de criação
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data de última atualização
);

INSERT INTO usuarios (nome, email, senha) 
VALUES 
('João Silva', 'joao@example.com', 'senha123'),
('Maria Oliveira', 'maria@example.com', 'senha456');
