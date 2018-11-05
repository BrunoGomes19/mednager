<?php

	if(isset($_GET["email"]) && isset($_GET["token"])){

	
	include "config.php";
	
	$email = $_GET["email"];
	
	$token = $_GET["token"];
	
	$tipo = $_GET["tipo"];
	
	$data = $conn->query("SELECT codComprador from comprador where emailComprador='$email' and tokenComprador='$token'");

	if($data->num_rows>0){
		
		header("Location: ../html/ltr/recuperacao.php?token=$token&email=$email&tipo=$tipo");
		
		
	}else{
		
		header("Location: ../html/ltr/error-403");
		
	}
	
	}else{

		header("Location: ../html/ltr/authentication-login.php");

	}

?>