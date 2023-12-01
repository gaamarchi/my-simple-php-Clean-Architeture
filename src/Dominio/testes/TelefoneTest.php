<?php

namespace src;
use src\Dominio\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testSetDddValid(): void
    {
        $telefone = new Telefone('11', '12345678');
        $this->assertEquals('11', $telefone->getDdd());
    }

    public function testSetDddInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $telefone = new Telefone('123', '12345678');
    }

    public function testSetNumeroValid(): void
    {
        $telefone = new Telefone('11', '12345678');
        $this->assertEquals('12345678', $telefone->getNumero());
    }

    public function testSetNumeroInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $telefone = new Telefone('11', '123');
    }

    public function testToString(): void
    {
        $telefone = new Telefone('11', '12345678');
        $this->assertEquals('(11) 12345678', $telefone->__toString());
    }
}
    
