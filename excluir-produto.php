<?php
require "src/conexao-bd.php";
require  "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoR.PHP";


$ProdutoR = new ProdutoR($pdo);
$ProdutoR->deletar($_GET['id']);
?>