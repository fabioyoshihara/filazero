<?php 

class Loja
{
    private ?int $codigo;
    private string $cnpj;
    private string $nome;
    private string $celular;
    private string $email;
    private string $senha; 
    private string $nomeLojista;
     
    
    public function __construct(?int $codigo, string $cnpj, string $nome, string $celular, string $email, string $senha, string $nomeLojista)
    {
        $this->codigo = $codigo;
        $this->cnpj = $cnpj;
        $this->nome = $nome;
        $this->celular = $celular;
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeLojista = $nomeLojista;
    }


    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getNomelojista(): string
    {
        return $this->nomeLojista;
    }
}
