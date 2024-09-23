<?php

class Cliente
{
    private ?int $idcliente;
    
    private string $nomecliente;
    
    private string $sobrenome;
    
    private string $cpf;
    
    private string $email;
    
    private string $celular;

    private string $senha;


    
    public function __construct(?int $idcliente, string $nomecliente, string $sobrenome, string $cpf, string $email, string $celular, string $senha)
    {
        $this->idcliente = $idcliente;
        $this->nomecliente = $nomecliente;
        $this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->celular = $celular;
        $this->senha = $senha;
    }

    public function getIdcliente(): ?int
    {
        return $this->idcliente;
    }

    public function getNomecliente(): string
    {
        return $this->nomecliente;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }


}

?>


