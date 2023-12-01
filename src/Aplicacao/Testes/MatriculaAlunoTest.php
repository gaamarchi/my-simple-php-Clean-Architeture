<?php

namespace src;
use src\Dominio\Aluno\Telefone;
use PHPUnit\Framework\TestCase;
use src\Aplicacao\Aluno\MatriculaAluno\MatriculaAluno;
use src\Dominio\Aluno\Aluno;
use src\Dominio\Aluno\Cpf;
use src\Dominio\Aluno\Email;
use src\Infra\Aluno\AlunoRepositoryInMemory;
use src\Aplicacao\Aluno\MatriculaAluno\MatriculaAlunoDto;


class MatriculaAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatriculaAlunoDto('123.456.789-10', 'Aluno Teste', 'aluno@mail.com');
        $alunoRepository = new AlunoRepositoryInMemory();
        $matriculaAluno = new MatriculaAluno($alunoRepository);
        $matriculaAluno->executa($dadosAluno);
        $aluno = $alunoRepository->buscarPorCpf(new Cpf('123.456.789-10'));
        $this->assertSame('Aluno Teste', $aluno->getNome());
        $this->assertSame('123.456.789-10', (string) $aluno->getCpf());
        $this->assertSame('aluno@mail.com', (string) $aluno->getEmail());
        
    }
}


        