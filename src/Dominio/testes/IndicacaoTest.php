<?php
namespace src;
use src\Dominio\Aluno\Aluno;
use src\Dominio\Aluno\Cpf;
use src\Dominio\Aluno\Email;
use src\Dominio\Indicacao\Indicacao;
use PHPUnit\Framework\TestCase;

class IndicacaoTest extends TestCase
{
    public function testIndicacao(): void
    {
        $indicante = new Aluno(
            new Cpf('123.456.789-10'),
            'Vinicius Dias',
            new Email('vinidias@mail.com'),
        );
        $indicado = new Aluno(
            new Cpf('109.876.543-21'),
            'Joao Ribeiro',
            new Email('joaoRibeiro@mail.com'),
        );
        $indicacao = new Indicacao($indicante, $indicado);
        $this->assertSame($indicante, $indicacao->getIndicante());
        $this->assertSame($indicado, $indicacao->getIndicado());
        $this->assertInstanceOf(\DateTimeImmutable::class, $indicacao->getData());
    }
}
