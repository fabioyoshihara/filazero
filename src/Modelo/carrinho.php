<?php

class Carrinho
{
    private ?int $codigoPedido;
    private string $nomeProduto;
    private int $qtde;
    private float $precoProduto;
    private float $precoTotal;

    public function __construct(?int $codigoPedido, string $nomeProduto, int $qtde, float $precoProduto, float $precoTotal)
    {
        $this->codigoPedido = $codigoPedido;
        $this->nomeProduto = $nomeProduto;
        $this->qtde = $qtde;
        $this->precoProduto = $precoProduto;
        $this->precoTotal = $precoTotal;
    }

    public function getcodigoPedido (): ?int
    {
        return $this->codigoPedido;
    }
    
    public function getnomeProduto (): string
    {
        return $this->nomeProduto;
    }

    public function getqtde (): int
    {
        return $this->qtde;
    }

    public function getprecoProduto (): float
    {
        return $this->precoProduto;
    }

    public function getprecoTotal (): float
    {
        return $this->precoTotal;
    }

}

?>