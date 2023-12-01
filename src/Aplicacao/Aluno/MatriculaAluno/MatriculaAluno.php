<?php
namespace src\Aplicacao\Aluno\MatriculaAluno;

use src\Dominio\Aluno\IAlunoRepository;
use src\Dominio\Aluno\Aluno;

class MatriculaAluno
{
    private IAlunoRepository $RepositorioDeAluno;

    
    public function __construct(IAlunoRepository $IrepositorioDeAlunos)
    {
        $this->RepositorioDeAluno = $IrepositorioDeAlunos;
    }
    public function executa(MatriculaAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfEmailNome($dados->cpf, $dados->email, $dados->nome);
        $this->RepositorioDeAluno->adicionar($aluno);
    }

}