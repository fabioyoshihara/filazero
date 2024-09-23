<?php 

class Pedido
{
    private ?int $codigoPedido;
    private int $codigoCliente;
    private int $statusPedido;
    private string $dataPedido;

    public function __construct(?int $codigoPedido, int $codigoCliente, int $statusPedido, string $dataPedido)
    {
        $this->codigoPedido = $codigoPedido;
        $this->codigoCliente = $codigoCliente;
        $this->statusPedido = $statusPedido;
        $this->dataPedido = $dataPedido;
    }

    public function getcodigoPedido (): ?int
    {
        return $this->codigoPedido;
    }

    public function getcodigoCliente (): int
    {
        return $this->codigoCliente;
    }

    public function getstatusPedido (): int
    {
        return $this->statusPedido;
    }

    public function getdataPedido (): string
    {
        return $this->dataPedido;
    }

}


