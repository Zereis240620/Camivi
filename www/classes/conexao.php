<?php
class Conexao {
  function getConexao() { 
     $dbh = null;
     try {
	   $user= 'root';
	   $pass= '';
       $dbh = 
	    new PDO('mysql:host=localhost;dbname=redesocial',
            	 $user, $pass);
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, 
		                   PDO::ERRMODE_EXCEPTION);
     } catch (PDOException $e) {
       print "Error!: " . $e->getMessage() . "<br/>";
       die();
     }
	 return $dbh;
  }
}
?>