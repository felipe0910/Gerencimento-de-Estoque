<?php

class Produto{
    private $id;
    private $codigo;
    private $preco;
    private $quantidadeEmEstoque;
    private $nome;
    private $pdo;

    public function __construct(){
        $dns  = "mysql:dbname=gerenciador_estoque;host=localhost";
        $user = "root";
        $pass = "";
       
        try {
            $this->pdo = new PDO($dns, $user, $pass);
        } catch (\Throwable $th) {
            echo "erro ao conectar ao banco";
        }     
    }

    public function mostrarProdutos(){
        $sql = "SELECT *FROM produtos";
        $sql = $this->pdo->prepare($sql);
        
        $sql->execute();

        if( $sql->rowCount() >0 ){
            $dados = $sql->fetchAll();
        }else{
            $dados = array();
        }

        return $dados;
    }
}