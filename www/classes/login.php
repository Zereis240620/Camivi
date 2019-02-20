<?php 
include_once "conexao.php"

session_start();

$btentrar = filter_input(INPUT_POST,'btentrar', FILTER_SANITIZE_STRING );

 if($btentrar) {
   $usuario = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING );
   $senha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING );
   //echo "$usuario - $senha";

   //verificando se campo caracteres do campo não está diferente
   if ((!empty($usuario)) AND (!empty($senha))) {
   	  // GERAR SENHA CRIPTOGRAFADA
   	  //echo password_hash($senha, PASSWORD_DEFAULT);

   	//PESQUISAR USUARIO NO BANCO DE DADOS
   	 $result_usuario = "SELECT id_usuario,nome, email From usuario Where usuario='$usuario' LIMIT 1";
   	 $result_usuario = mysqli_query($conn, $result_usuario);
   	 if ($result_usuario) {

   	 	$row_usuario = mysqli_fetch_assoc($result_usuario);
   	 	if (password_verify($senha, $row_usuario ['senha'])) {
   	 		$_SESSION["id_usuario"] = $row_usuario ["id_usuario"];
   	 		$_SESSION["nome"] = $row_usuario ["nome"];
   	 		$_SESSION["email"] = $row_usuario ["email"];
   	 		header("Location: postagem.php");

   	 	}else{

   	 		$_SESSION['msg'] = "login e senha incorreto !";
 		header("Location: login.php");
   	 	}
   	 }

   }else{
   		$_SESSION['msg'] = "login e senha incorreto !";
 		header("Location: login.php");
   }

 }else{

 	$_SESSION['msg'] = "pagina não redirecionada";
 	header("Location: login.php");

 }

 ?>



//////////////////////////
 <?php 
    if (isset($_SESSION["MSG"])) {
    	echo $_SESSION["msg"];
    	unset($_SESSION["msg"]);
    }


  ?>

<?php

//sair
session_start();

if (!empty($_SESSION["id_usuario"])) {
	echo $_SESSION["nome"] ;

}else{

	header("location: login.php");
}

  ?>
  