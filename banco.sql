CREATE SCHEMA IF NOT EXISTS AcademicoBD;

CREATE TABLE AcademicoBD.alunos(
    cpf VARCHAR(11) PRIMARY KEY,
    nome TEXT NOT NULL,
    email TEXT NOT NULL
    senha TEXT NOT NULL,
);

CREATE TABLE AcademicoBD.telefones(
    ddd VARCHAR(2),
    numero VARCHAR(9),
    cpf_aluno VARCHAR(11),
    PRIMARY KEY(ddd, numero),
    FOREIGN KEY(cpf_aluno) REFERENCES AcademicoBD.alunos(cpf)
);

CREATE TABLE AcademicoBD.indicacoes(
    cpf_indicante VARCHAR(11),
    cpf_indicado VARCHAR(11),
    PRIMARY KEY(cpf_indicante, cpf_indicado),
    FOREIGN KEY(cpf_indicado) REFERENCES AcademicoBD.alunos(cpf),
    FOREIGN KEY(cpf_indicante) REFERENCES AcademicoBD.alunos(cpf)
);