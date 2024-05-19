<?php

/////Repositório de produtos//////
class ProdutoR
{
    private PDO $pdo;

    public function __construct(PDO $pdo ) {
        $this->pdo = $pdo;
        
    }

    public function opecoesCafe() : array {

        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo -> query($sql1);
        $produtosCafe = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
        $dadosCafe = array_map(function ($cafe) {
            return new produto($cafe['id'],
                $cafe['tipo'],
                $cafe['nome'],
                $cafe['descricao'],
                $cafe['imagem'],
                $cafe['preco']
            );
            
        },$produtosCafe);

        return $dadosCafe;
        
    }

    public function opecoesAlmoço () : array {

        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo -> query($sql2);
        $produtuAlmoço = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
        $dadosAlmoço = array_map(function ($Almoço) {
            return new produto($Almoço['id'],
                $Almoço['tipo'],
                $Almoço['nome'],
                $Almoço['descricao'],
                $Almoço['imagem'],
                $Almoço['preco']
            );
            
        },$produtuAlmoço);
        return $dadosAlmoço;  
    }
}
?>