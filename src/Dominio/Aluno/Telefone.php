<?php

namespace src\Dominio\Aluno;
class Telefone
{
    private string $ddd;
    private string $numero;

    public function __construct($ddd, $numero)
    {
        $this->setDdd($ddd);
        $this->setNumero($numero);
    }
    private function setDdd($ddd):void
    {
        $regex = '/^[0-9]{2}$/';
        if(preg_match($regex, $ddd) !== 1)
        {
            throw new \InvalidArgumentException('DDD inválido');
        }
        $this->ddd = $ddd;
    }
    private function setNumero($numero):void
    {
        $regex = '/^[0-9]{8,9}$/';
        if(preg_match($regex, $numero) !== 1)
        {
            throw new \InvalidArgumentException('Número de telefone inválido');
        }
        $this->numero = $numero;
    }
    public function  __toString():string
    {
        return "({$this->ddd}) {$this->numero}";
    }
    public function getNumero():string
    {
        return $this->numero;
    }
    public function getDdd():string
    {
        return $this->ddd;
    }

}