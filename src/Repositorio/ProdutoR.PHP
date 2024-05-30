<?php

/////Repositório de produtos//////
class ProdutoR
{
    private PDO $pdo;

    public function __construct(PDO $pdo ) {
        $this->pdo = $pdo;
        
    }


    private function formarObjrto($dados) 
    {
        return new Produto($dados['id'],
        $dados['tipo'],
        $dados['nome'],
        $dados['descricao'],
        $dados['imagem'],
        $dados['preco']);
        
    }

    public function opecoesCafe() : array {

        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo -> query($sql1);
        $produtosCafe = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
        $dadosCafe = array_map(function ($cafe) {
            return $this->formarObjrto($cafe);
            
        },$produtosCafe);

        return $dadosCafe;
        
    }

    public function opecoesAlmoço () : array {

        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo -> query($sql2);
        $produtuAlmoço = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
        $dadosAlmoço = array_map(function ($Almoço) {
            return $this->formarObjrto($Almoço);
            
        },$produtuAlmoço);
        return $dadosAlmoço;  
    }


    public function buscarTodos () {
        $sql = "SELECT * FROM produtos  ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);


        $todoDados = array_map(function ($produto) {
            return $this->formarObjrto($produto);
            
        },$dados);

        return $todoDados;

        
    }
     ////Excluindo um produto//////
    public function deletar (int $id) {
        $sql = "DELETE FROM produtos WHERE id =?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();
        
    }
}
?>