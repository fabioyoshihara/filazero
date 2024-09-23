<?php

class Cliente
{
    private ?int $cod_cliente;
    private string $cpf;
    private string $nome;
    private string $sobrenome;
    private string $email;
    private string $celular;
    private string $senha;

    
    public function __construct(?int $cod_cliente, string $cpf, string $nome, string $sobrenome, string $email, string $celular, string $senha)
    {
        $this->cod_cliente = $cod_cliente;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->celular = $celular;
        $this->senha = $senha;
    }
 
    public function getCod_cliente(): ?int
    {
        return $this->cod_cliente;
    }

    public function getNome(): string
    {
        return $this->nome;
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


