<?php

namespace src\Dominio\Aluno;


interface IAlunoRepository
{
    public function adicionar(Aluno $aluno): void;
    public function buscarPorCpf(Cpf $cpf): Aluno;

    /** @return Aluno[] */
    public function buscarTodos(): array;

}