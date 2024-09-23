<?php



    class ClienteRepositorio
    {
        private PDO $pdo;

 
        public function __construct(PDO $pdo)
        {
        $this->pdo = $pdo;
        }

         private function formarficha($dados)
        {
        return new Cliente
            ($dados['idcliente'],
             $dados['nomecliente'],
             $dados['sobrenome'],
             $dados['cpf'],
             $dados['email'],
             $dados['celular'],
             $dados['senha']
            );
        }

        public function salvar(Cliente $cliente)
        {
            $sql = "INSERT INTO clientes (nomecliente, sobrenome, cpf, email, celular, senha) VALUES (?,?,?,?,?,?)";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $cliente->getNomecliente());
            $statement->bindValue(2, $cliente->getSobrenome());
            $statement->bindValue(3, $cliente->getCpf());
            $statement->bindValue(4, $cliente->getEmail());
            $statement->bindValue(5, $cliente->getCelular());
            $statement->bindValue(6, $cliente->getSenha());
            $statement->execute();
        }




    }        
    
?>