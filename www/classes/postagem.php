<?php
include_once "conexao.php";

class Noticia {
     public $id_postagem;
	   public $id_usuario;
     public $data_postagem;
	   public $conteudo;
	   public $foto;
	 
	 
	 function get($id) {
          //cria objeto conexao
          $conexao = new Conexao();
          //obtem um pdo conectado
          $pdo = $conexao->getConexao(); 
          //analisa a consulta sql
          $st = $pdo->prepare("select * from postagem
									where id_postagem =:id_postagem");
		  $st->bindParam(':id_postagem',$id_postagem);
          //executa a consulta
          $st->execute();
          //armazena o resultado da consulta em um array
          $result = $st->fetchAll();
          //imprime o array
          //print_r($result);
		  //analisa o vetor de resultados
		  $this->id = 0;
		  foreach ($result as $registro) {
		     foreach ($registro as $campo => $valor) {
		       $this->$campo = $valor;
                }	
            }
	    }

		function salvar() {
          //cria objeto conexao
          $conexao = new Conexao();
          //obtem um pdo conectado
          $pdo = $conexao->getConexao(); 
          //analisa a consulta sql
          $st = $pdo->prepare("INSERT INTO postagem
		  (id_usuario, data_postagem, conteudo, foto)
		  VALUES (:id_usuario, :data_postagem, :conteudo, :foto)");
		  $st->bindParam(':id_usuario',$this->id_usuario);
		  $st->bindParam(':data_postagem',$this->data_postagem);
		  $st->bindParam(':conteudo',$this->conteudo);
		  $st->bindParam(':foto',$this->foto);
          //executa a inserção
          return $st->execute();
		  
	 }	
	 //alterado 09/10/2018
	  static function pesquisa() {

       $conexao  = new Conexao();
       $pdo = $conexao->getConexao();
       $stmt = $pdo->prepare("SELECT * FROM postagem");
       $stmt-> execute();
       return $stmt->fetchAll();

	  }
	// fim 09/10/2018	
    
}
?>
