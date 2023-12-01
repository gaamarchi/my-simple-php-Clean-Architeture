<?php
namespace src\Dominio\Indicacao;
use src\Dominio\Aluno\Aluno;
class Indicacao
{
    private Aluno $indicante;
    private Aluno $indicado;
    private \DateTimeInterface $data;

    public function __construct(Aluno $indicante, Aluno $indicado)
    {
        $this->indicante = $indicante;
        $this->indicado = $indicado;
        $this->data = new \DateTimeImmutable(); //data atual 
    }
    public function getIndicante(): Aluno
    {
        return $this->indicante;
    }
    public function getIndicado(): Aluno
    {
        return $this->indicado;
    }
    public function getData(): \DateTimeInterface
    {
        return $this->data;
    }

     

}