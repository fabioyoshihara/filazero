<?php

    class ClienteRepositorio
    {
        private PDO $pdo;

 
        public function __construct(PDO $pdo)
        {
        $this->pdo = $pdo;
        }

        private function formarobjeto($dados)
        {
        return new Cliente
            ($dados['cod_cliente'],
             $dados['cpf'],
             $dados['nome'],
             $dados['sobrenome'],
             $dados['email'],
             $dados['celular'],
             $dados['senha']
            );
        }

        public function salvar(Cliente $cliente)
        {
            $sql = "INSERT INTO cliente (cpf, nome, sobrenome, email, celular, senha) VALUES (?,?,?,?,?,?)";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $cliente->getCpf());
            $statement->bindValue(2, $cliente->getNome());
            $statement->bindValue(3, $cliente->getSobrenome());
            $statement->bindValue(4, $cliente->getEmail());
            $statement->bindValue(5, $cliente->getCelular());
            $statement->bindValue(6, $cliente->getSenha());
            $statement->execute();
        }

        public function deletar(int $cod_cliente)
        {
            $sql = "DELETE FROM cliente WHERE cod_cliente = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1,$cod_cliente);
            $statement->execute();

        }

        public function atualizar(Cliente $cliente)
        {
            $sql = "UPDATE cliente SET cpf = ?, nome = ?, sobrenome = ?, email = ?, celular = ?, senha = ? WHERE cod_cliente = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $cliente->getCpf());
            $statement->bindValue(2, $cliente->getNome());
            $statement->bindValue(3, $cliente->getSobrenome());
            $statement->bindValue(4, $cliente->getEmail());
            $statement->bindValue(5, $cliente->getCelular());
            $statement->bindValue(6, $cliente->getSenha());
            $statement->bindValue(7, $cliente->getCod_cliente());
            $statement->execute();
        }

        public function buscar(int $cod_cliente)
        {
            $sql = "SELECT * FROM cliente WHERE cod_cliente = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(1, $cod_cliente);
            $statement->execute();

            $dados = $statement->fetch(PDO::FETCH_ASSOC);

            return $this->formarObjeto($dados);
        }

        public function buscarTodos()
        {
            $sql = "SELECT * FROM cliente ORDER BY cod_cliente";
            $statement = $this->pdo->query($sql);
            $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

            $todosOsDados = array_map(function ($cliente){
                return $this->formarObjeto($cliente);
                },$dados);

            return $todosOsDados;
    }


    public function entrar(Cliente $cliente)
    {
        $sql = "SELECT cod_cliente FROM cliente WHERE cpf = ? AND senha = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $cliente->getCpf());
        $statement->bindValue(2, $cliente->getSenha());
        $statement->execute();

        $number_of_rows = $statement->fetchColumn(); 

        return $number_of_rows;
    }


    }        
    
?>