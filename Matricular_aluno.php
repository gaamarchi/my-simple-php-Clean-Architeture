<?php
require 'vendor/autoload.php';
use src\Dominio\Aluno\Aluno;
use \src\Infra\Aluno\AlunoRepositoryInMemory;
use src\Dominio\Aluno\Cpf;
use \src\Infra\Aluno\AlunoRepository;
$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$aluno = Aluno::comCpfEmailNome($cpf, $email, $nome)->adicionarTelefone($ddd, $numero);
$repositorioDeAlunos = new AlunoRepositoryInMemory();
$repositorioDeAlunos->adicionar($aluno);

$cpfObj = new Cpf($cpf);
$alunoBuscado = $repositorioDeAlunos->buscarPorCpf($cpfObj);
echo "Aluno: " . $alunoBuscado->getNome() . PHP_EOL;
echo "CPF: " . $alunoBuscado->getCpf() . PHP_EOL;
