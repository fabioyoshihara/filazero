<?php

    class CarrinhoRepositorio
    {
        private PDO $pdo;

 
        public function __construct(PDO $pdo)
        {
        $this->pdo = $pdo;
        }

        private function formarobjeto($dados)
        {
        return new Carrinho
            ($dados['cod_pedido'],
             $dados['nome_produto'],
             $dados['qtde'],
             $dados['preco_produto'],
             $dados['preco']
            );
        }


        public function buscarPedido(int $cod_pedido)
        {
            $sql = "select pedido.cod_pedido, produto.nome_produto, produto_pedido.qtde, produto.preco_produto, produto_pedido.qtde*produto.preco_produto as preco from produto, pedido, produto_pedido where produto_pedido.cod_pedido = pedido.cod_pedido and produto_pedido.cod_produto = produto.cod_produto and pedido.cod_pedido = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $cod_pedido);
            $statement->execute();
            
            $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

            $todosOsDados = array_map(function ($carrinho){
                return $this->formarObjeto($carrinho);
                },$dados);

            return $todosOsDados;
    }



    }        
    
?>