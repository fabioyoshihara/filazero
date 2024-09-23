<?php
 
class lojaRepositorio
{
    private PDO $pdo;

 
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Loja
            ($dados['cod_loja'],
             $dados['cnpj'],
             $dados['nome_loja'],
             $dados['celular_loja'],
             $dados['email_loja'],
             $dados['senha_loja'],
             $dados['nome_lojista'],
            );
    }        

   
    public function deletar(int $cod_loja)
    {
        $sql = "DELETE FROM loja WHERE cod_loja = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$cod_loja);
        $statement->execute();

    }


    public function salvar(Loja $loja)
    {
        $sql = "INSERT INTO loja (cnpj, nome_loja, celular_loja, email_loja, senha_loja, nome_lojista) VALUES(?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $loja->getCnpj());
        $statement->bindValue(2, $loja->getNome());
        $statement->bindValue(3, $loja->getCelular());
        $statement->bindValue(4, $loja->getEmail());
        $statement->bindValue(5, $loja->getSenha());
        $statement->bindValue(6, $loja->getNomelojista());
        $statement->execute();
    }

    public function buscar(int $cod_loja)
    {
        $sql = "SELECT * FROM loja WHERE cod_loja = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $cod_loja);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }
    
    public function atualizar(Loja $loja)
    {
        $sql = "UPDATE loja SET cnpj = ?, nome_loja = ?, celular_loja = ?, email_loja = ?, senha_loja = ?, nome_lojista = ? WHERE cod_loja = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $loja->getCnpj());
        $statement->bindValue(2, $loja->getNome());
        $statement->bindValue(3, $loja->getCelular());
        $statement->bindValue(4, $loja->getEmail());
        $statement->bindValue(5, $loja->getSenha());
        $statement->bindValue(6, $loja->getNomelojista());
        $statement->bindValue(7, $loja->getCodigo());
        $statement->execute();
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM loja ORDER BY cod_loja";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($loja){
            return $this->formarObjeto($loja);
        },$dados);

        return $todosOsDados;
    }

}
?>
