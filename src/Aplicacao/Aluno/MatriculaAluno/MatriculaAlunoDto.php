<?php
namespace src\Aplicacao\Aluno\MatriculaAluno;


class MatriculaAlunoDto
{
    public string $cpf;
    public string $nome;
    public string $email;

    public function __construct(string $cpfAluno, string $nomeAluno, string $emailAluno)
    {
        $this->cpf = $cpfAluno;
        $this->nome = $nomeAluno;
        $this->email = $emailAluno;

    }
}