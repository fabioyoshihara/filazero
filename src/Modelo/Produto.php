<?php 

class Produto
{
    private ?int $codigoProduto;
    private int $codigoLoja;
    private string $nome;
    private string $descricao;
    private string $imagem;
    private float $preco;
    private string $tamanho; 
    private int $tempo;
    
     
    public function __construct(?int $codigoProduto, int $codigoLoja, string $nome, string $descricao, string $imagem = "logo_fila_zero.svg", float $preco, string $tamanho, int $tempo,)
    {
        $this->codigoProduto = $codigoProduto;
        $this->codigoLoja = $codigoLoja;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->preco = $preco;
        $this->tamanho = $tamanho;
        $this->tempo = $tempo;
    }

    public function getcodigoProduto(): ?int
    {
        return $this->codigoProduto;
    }

    public function getcodigoLoja(): int
    {
        return $this->codigoLoja;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getPrecoFormatado():string
    {
        return "R$ " . number_format($this->preco, 2);
    }

    public function getImagemDiretorio(): string
    {
        return "img/".$this->imagem;
    }

    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }

    public function getTamanho(): string
    {
        return $this->tamanho;
    }

    public function getTempo(): int
    {
        return $this->tempo;
    }
}
?>