<?php
include_once "conexao.php";

class Usuario {
     public $id_usuario;
     public $nome;
     public $data_nascimento;
     public $email;
     public $senha;
     
     function get($email) {
          //cria objeto conexao
          $conexao = new Conexao();
          //obtem um pdo conectado
          $pdo = $conexao->getConexao(); 
          //analisa a consulta sql
          $st = $pdo->prepare("select * from usuario where email like :email");
		  $st->bindParam(':email',$email);
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
          $st = $pdo->prepare(
		  "insert into usuario (nome, email, senha, data_nascimento) 
		  values (:nome, :email, :senha, :data_nascimento)");
		  $st->bindParam(':nome',$this->nome);
		  $st->bindParam(':email',$this->email);
		  $st->bindParam(':senha',$this->senha);
          $st->bindParam(':data_nascimento',$this->data_nascimento);
          //executa a inserção
          return $st->execute();
		  
	 }		 

}
?>