<?php

namespace  src;
use src\Dominio\Aluno\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfNoFormatoInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $cpf = new Cpf('cpfinvalido');
    }
    public function testCpfNoFormatoValido()
    {
        $cpf = new Cpf('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}