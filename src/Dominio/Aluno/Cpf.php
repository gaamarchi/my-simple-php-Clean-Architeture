<?php
namespace src\Dominio\Aluno;

class Cpf
{
    private string $numero;
    
    public function __construct(string $numero)
    {
        $this->setNumero($numero);        
    }
    private function setNumero(string $numero)
    {
        $opcoes = [
            'options' => [
                'regexp' => '/[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/'
            ]
        ];
        if (filter_var($numero, FILTER_VALIDATE_REGEXP, $opcoes) === false) {
            throw new \InvalidArgumentException('CPF inválido');
        }
        $this->numero = $numero;
    }
    public function __toString():string
    {
        return $this->numero;
    }

}