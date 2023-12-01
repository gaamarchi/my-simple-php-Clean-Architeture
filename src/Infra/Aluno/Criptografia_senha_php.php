<?php

namespace src\Infra\Aluno;

use src\Dominio\Aluno\Aluno;
use src\Dominio\Aluno\ICriptografia_senha;

class Criptografia_senha_php implements ICriptografia_senha
{
    public function criptografar(string $senha): string
    {
        return password_hash($senha, PASSWORD_ARGON2ID);
    }
    public function verificar(string $senhaEmTexto, string $senhaCriptografada): bool
    {
        return password_verify($senhaEmTexto, $senhaCriptografada);
    }
}