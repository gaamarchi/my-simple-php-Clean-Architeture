<?php

namespace src\Infra\Aluno;

use src\Dominio\Aluno\Aluno;
use src\Dominio\Aluno\Cpf;
use src\Dominio\Aluno\IAlunoRepository;
use src\Dominio\Aluno\Telefone;

class AlunoRepositoryInMemory implements IAlunoRepository
{
    private array $alunos = [];

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        foreach ($this->alunos as $aluno) {
            if ($aluno->getCpf() == $cpf) {
                return $aluno;
            }
        }
        throw new \Exception('Aluno não encontrado');
    }

    /** @return Aluno[] */
    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}