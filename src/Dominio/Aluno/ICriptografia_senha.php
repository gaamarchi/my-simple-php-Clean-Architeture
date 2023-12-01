<?php

namespace src\Dominio\Aluno;

interface ICriptografia_senha
{
    public function criptografar(string $senha): string;

 
    public function verificar(string $senhaEmTexto, string $senhaCriptografada): bool;
}