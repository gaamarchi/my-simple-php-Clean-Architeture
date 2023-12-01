<?php
namespace src\Infra\Aluno;

use src\Dominio\Aluno\Aluno;
use src\Dominio\Aluno\Cpf;
use src\Dominio\Aluno\IAlunoRepository;
use src\Dominio\Aluno\Telefone;
class AlunoRepository implements IAlunoRepository
{

    public function __construct(\PDO $conexao)
    {
        $this->conexao = $conexao;
    }



    public function adicionar(Aluno $aluno): void
    {
        $sql = 'INSERT INTO alunos VALUES (:cpf, :nome, :email)';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue("cpf",$aluno->getCpf());
        $stmt->bindValue("nome",$aluno->getNome());
        $stmt->bindValue("email",$aluno->getEmail());
        $stmt->execute();

        foreach($aluno ->getTelefones() as $telefones){
            $sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue("ddd",$telefones->getDdd());
            $stmt->bindValue("numero",$telefones->getNumero());
            $stmt->bindValue("cpf_aluno",$aluno->getCpf());
            $stmt->execute();
        }
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $sql = 'SELECT cpf, nome, email FROM alunos WHERE cpf = :cpf';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue("cpf",$cpf);
        $stmt->execute();
        $aluno = $stmt->fetch(\PDO::FETCH_ASSOC);
        $aluno = new Aluno($aluno['cpf'], $aluno['nome'], $aluno['email']);
        $sql = 'SELECT ddd, numero FROM telefones WHERE cpf_aluno = :cpf';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue("cpf",$cpf);
        $stmt->execute();
        $telefones = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($telefones as $telefone){
            $aluno->adicionarTelefone($telefone['ddd'], $telefone['numero']);
        }
        return $aluno;
        
    }

    /** @return Aluno[] */
    public function buscarTodos(): array
    {
        $sql = 'SELECT cpf, nome, email FROM alunos';
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        $alunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $alunos = array_map(function($aluno){
            return new Aluno($aluno['cpf'], $aluno['nome'], $aluno['email']);
        }, $alunos);
        $sql = 'SELECT ddd, numero, cpf_aluno FROM telefones';
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        $telefones = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($telefones as $telefone){
            foreach($alunos as $aluno){
                if($aluno->getCpf() == $telefone['cpf_aluno']){
                    $aluno->adicionarTelefone($telefone['ddd'], $telefone['numero']);
                }
            }
        }
        return $alunos;
    }
}