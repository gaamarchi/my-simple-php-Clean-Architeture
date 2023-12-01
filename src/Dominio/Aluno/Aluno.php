<?php

namespace src\Dominio\Aluno;

class Aluno
{
    private Cpf $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;
    private string $senha;
    


    public static function comCpfEmailNome(string $cpf, string $email, string $nome): self
    {
        $aluno = new Aluno(new Cpf($cpf), $nome, new Email($email));
        return $aluno;
    }

    public function __construct(Cpf $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefones = [];
    }
    public function adicionarTelefone(string $ddd, string $numero): self
    {
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    public function getCpf():string
    {
        return $this->cpf;
    }
    public function getNome():string
    {
        return $this->nome;
    }
    public function getEmail():string
    {
        return $this->email;
    }
    public function getTelefones():array
    {
        return $this->telefones;
    }
}

# exemplo de uso
/*
Aluno::comCpfEmailNome('123.456.789-10', 'mail@mal.com', 'Vinicius Dias')
    ->adicionarTelefone('11', '999999999')
    ->adicionarTelefone('11', '999999999');

*/