<?php

include("../topos/header.php");

$nome = $_GET["nome"];

$sql = "INSERT INTO categorias values (null, '".$nome."')";

if ($conn->query($sql) === TRUE) {

	echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#58da81;border-radius:8px";>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <span style="color:white;">Categoria adicionada com sucesso!</span>
	</div>';
} else {
	echo'<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#f27676;border-radius:8px";>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	 <span style="color:white;">Erro ao adicionar categoria!</span>
}

$conn->close();

?>
