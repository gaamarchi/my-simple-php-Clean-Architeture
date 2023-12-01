<?php

namespace  src;

use src\Dominio\Aluno\Email;
use PHPUnit\Framework\TestCase;
class EmailTest extends TestCase
{

    public function testEmailNoFormatoInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $email = new Email('emailinvalido');
    }
    public function testEmailNoFormatoValido()
    {
        $email = new Email('EmailValido@mail.com');
        $this->assertSame('EmailValido@mail.com', (string) $email);
    }
}
