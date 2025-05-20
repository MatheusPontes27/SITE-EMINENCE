CREATE DATABASE clinica_agendamentos;
USE clinica_agendamentos;

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    dentista VARCHAR(50) NOT NULL,
    paciente_nome VARCHAR(100),
    paciente_telefone VARCHAR(20),
    status ENUM('disponivel', 'reservado') DEFAULT 'disponivel',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
