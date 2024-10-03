<?php

    class PedidoRepositorio
    {
        private PDO $pdo;

 
        public function __construct(PDO $pdo)
        {
        $this->pdo = $pdo;
        }


        private function formarobjeto($dados)
        {
        return new Pedido
            ($dados['cod_produto'],
             $dados['cod_pedido'],
             $dados['data'],
             $dados['cod_status'],
             $dados['cod_cliente']
            );
        }


        public function existe(int $codigoCliente)
        {
            $sql = "SELECT cod_pedido FROM pedido WHERE cod_cliente = ? AND cod_status = 1";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $codigoCliente);
            $statement->execute();

            $result = $statement->fetchColumn(); 
            return $result;
        }   


        public function salvarPedido(Pedido $pedido)
        {
            $sql = "INSERT INTO pedido (data, cod_status, cod_cliente) VALUES (NOW(),?,?) ";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $pedido->getstatusPedido());
            $statement->bindValue(2, $pedido->getcodigoCliente());
            $statement->execute();
        }


        public function salvarProdutoPedido(int $codigoPedido, int $codigoProduto, int $qtde)
        {
            $sql = "INSERT INTO produto_pedido (cod_produto, cod_pedido, qtde) VALUES (?,?,?) ";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $codigoProduto);
            $statement->bindValue(2, $codigoPedido);
            $statement->bindValue(3, $qtde);
            $statement->execute();
        }

        public function existeProdutoPedido(int $codigoPedido, $codigoProduto)
        {
            $sql = "select cod_pedido from produto_pedido where cod_pedido = ? and cod_produto = ?";

            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $codigoPedido);
            $statement->bindValue(2, $codigoProduto);
            $statement->execute();

            $result = $statement->fetchColumn(); 
            return $result;
        } 
        
        public function atualizarProdutoPedido(int $codigoPedido, int $codigoProduto, int $qtde)
        {
            $sql = "update produto_pedido SET qtde = qtde + ? WHERE cod_pedido = ? and cod_produto = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $qtde);
            $statement->bindValue(2, $codigoPedido);
            $statement->bindValue(3, $codigoProduto);
            $statement->execute();
        }

    }  
?>