<?php

class ProdutoRepositorio
{
    private PDO $pdo;

 
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Produto
            ($dados['cod_produto'],
             $dados['cod_loja'],
             $dados['nome_produto'],
             $dados['descricao'],       
             $dados['imagem'],      
             $dados['preco_produto'],
             $dados['tamanho_porcao'],
             $dados['tempo_preparo']
            );
    }        



    public function buscarTodos()
    {
        $sql = "SELECT * FROM produto ORDER BY preco_produto";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$dados);

        return $todosOsDados;
    }
 

    public function deletar(int $id)
    {
        $sql = "DELETE FROM produto WHERE cod_produto = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();

    }


    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO produto (cod_loja, nome_produto, preco_produto, tamanho_porcao, tempo_preparo, descricao, imagem) VALUES(?,?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getcodigoLoja());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getPreco());
        $statement->bindValue(4, $produto->getTamanho());
        $statement->bindValue(5, $produto->getTempo());
        $statement->bindValue(6, $produto->getDescricao());
        $statement->bindValue(7, $produto->getImagem());
        $statement->execute();
    }

    public function buscar(int $cod_produto)
    {
        $sql = "SELECT * FROM produto WHERE cod_produto = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$cod_produto);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }
    
    public function atualizar(Produto $produto)
{
    $sql = "UPDATE produto SET cod_loja = ?, nome_produto = ?, preco_produto = ?, tamanho_porcao = ?, tempo_preparo = ?, descricao = ?, imagem = ? WHERE cod_produto = ?";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $produto->getcodigoLoja());
    $statement->bindValue(2, $produto->getNome());
    $statement->bindValue(3, $produto->getPreco());
    $statement->bindValue(4, $produto->getTamanho());
    $statement->bindValue(5, $produto->getTempo());
    $statement->bindValue(6, $produto->getDescricao());
    $statement->bindValue(7, $produto->getImagem());
    $statement->bindValue(8, $produto->getcodigoProduto());
    $statement->execute();
}


public function buscarprodutoloja(int $cod_loja)
{
    $sql = "SELECT * FROM produto WHERE cod_loja = ?";
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1,$cod_loja);
    $statement->execute();
    $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

    $todosOsDados = array_map(function ($produto){
        return $this->formarObjeto($produto);
    },$dados);

    return $todosOsDados;
}




}
?>
